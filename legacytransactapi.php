<?php

require_once 'legacytransactapi.civix.php';
// phpcs:disable
use CRM_Legacytransactapi_ExtensionUtil as E;
// phpcs:enable

/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/
 */
function legacytransactapi_civicrm_config(&$config) {
  _legacytransactapi_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function legacytransactapi_civicrm_install() {
  _legacytransactapi_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function legacytransactapi_civicrm_enable() {
  _legacytransactapi_civix_civicrm_enable();
}
