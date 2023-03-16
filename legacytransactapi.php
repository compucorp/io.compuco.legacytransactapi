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
 * Implements hook_civicrm_postInstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_postInstall
 */
function legacytransactapi_civicrm_postInstall() {
  _legacytransactapi_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_uninstall
 */
function legacytransactapi_civicrm_uninstall() {
  _legacytransactapi_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function legacytransactapi_civicrm_enable() {
  _legacytransactapi_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_disable
 */
function legacytransactapi_civicrm_disable() {
  _legacytransactapi_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_upgrade
 */
function legacytransactapi_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _legacytransactapi_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_entityTypes
 */
function legacytransactapi_civicrm_entityTypes(&$entityTypes) {
  _legacytransactapi_civix_civicrm_entityTypes($entityTypes);
}

