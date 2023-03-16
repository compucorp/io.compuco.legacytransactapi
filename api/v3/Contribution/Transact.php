<?php

/**
 * @package CiviCRM_APIv3
 */

/**
 * Adjusts Metadata for Transact action.
 *
 * The metadata is used for setting defaults, documentation & validation.
 *
 * @param array $params
 *   Array of parameters determined by getfields.
 */
function _civicrm_api3_contribution_transact_spec(&$params) {
  $fields = civicrm_api3('Contribution', 'getfields', ['action' => 'create']);
  $params = array_merge($params, $fields['values']);
  $params['receive_date']['api.default'] = 'now';
}

/**
 * Processes a transaction and record it against the contact.
 *
 * The implementation for this API is based on:
 * - https://docs.civicrm.org/dev/en/latest/financial/orderAPI/#transitioning-from-contributiontransact-api-to-order-api
 * - https://lab.civicrm.org/extensions/contributiontransactlegacy/
 *
 * @deprecated
 *
 * @param array $params
 *   Input parameters.
 *
 * @return array
 *   contribution of created or updated record (or a civicrm error)
 */
function civicrm_api3_contribution_transact($params) {
  //Set contribution status to Pending for supporting CiviCRM version prior 5.39.
  //As version 5.39 onward, contribution status will be default to "Pending" and anything we do pass in will be ignored).
  //https://docs.civicrm.org/dev/en/latest/financial/orderAPI/#step-1
  $params['contribution_status_id'] = 'Pending';

  $order = civicrm_api3('Order', 'create', $params);
  try {
    $payResult = civicrm_api3('PaymentProcessor', 'pay', [
      'payment_processor_id' => $params['payment_processor_id'],
      'amount' => $params['total_amount'],
      'contribution_id' => $order['id'],
      'contact_id' => $params['contact_id'],
      'contribution_recur_id' => $params['contribution_recur_id'] ?? NULL,
      'invoice_id' => $params['invoice_id'],
    ]);

    if ($payResult['values'][0]['payment_status'] === 'Completed') {
      civicrm_api3('Payment', 'create', [
        'contribution_id' => $order['id'],
        'total_amount' => $params['total_amount'],
        'payment_instrument_id' => $params['payment_instrument_id'],
        'trxn_id' => $payResult['values'][0]['trxn_id'],
        'fee_amount' => $payResult['values'][0]['fee_amount'],
        'payment_processor_id' => $params['payment_processor_id'],
        'is_send_contribution_notification' => $params['is_email_receipt'] ?? FALSE,
      ]);
    }
  }
  catch (Exception $e) {
    return ['error_message' => $e->getMessage()];
  }

  return civicrm_api3('Contribution', 'getsingle', ['id' => $order['id']]);
}
