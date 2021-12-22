<?php

require_once 'frenchcodepostaux.civix.php';
// phpcs:disable
use CRM_Frenchcodepostaux_ExtensionUtil as E;
// phpcs:enable

/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/
 */
function frenchcodepostaux_civicrm_config(&$config) {
  _frenchcodepostaux_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_xmlMenu
 */
function frenchcodepostaux_civicrm_xmlMenu(&$files) {
  _frenchcodepostaux_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function frenchcodepostaux_civicrm_install() {
  _frenchcodepostaux_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_postInstall
 */
function frenchcodepostaux_civicrm_postInstall() {
  _frenchcodepostaux_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_uninstall
 */
function frenchcodepostaux_civicrm_uninstall() {
  _frenchcodepostaux_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function frenchcodepostaux_civicrm_enable() {
  _frenchcodepostaux_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_disable
 */
function frenchcodepostaux_civicrm_disable() {
  _frenchcodepostaux_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_upgrade
 */
function frenchcodepostaux_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _frenchcodepostaux_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_managed
 */
function frenchcodepostaux_civicrm_managed(&$entities) {
  _frenchcodepostaux_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_caseTypes
 */
function frenchcodepostaux_civicrm_caseTypes(&$caseTypes) {
  _frenchcodepostaux_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_angularModules
 */
function frenchcodepostaux_civicrm_angularModules(&$angularModules) {
  _frenchcodepostaux_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_alterSettingsFolders
 */
function frenchcodepostaux_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _frenchcodepostaux_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_entityTypes
 */
// function frenchcodepostaux_civicrm_entityTypes(&$entityTypes) {
//   _frenchcodepostaux_civix_civicrm_entityTypes($entityTypes);
// }

/**
 * Implements hook_civicrm_themes().
 */
function frenchcodepostaux_civicrm_themes(&$themes) {
  _frenchcodepostaux_civix_civicrm_themes($themes);
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_preProcess
 */
//function frenchcodepostaux_civicrm_preProcess($formName, &$form) {
//}

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_navigationMenu
 */
//function frenchcodepostaux_civicrm_navigationMenu(&$menu) {
//}

function frenchcodepostaux_civicrm_buildForm($formName, &$form) {
  if ($formName == 'CRM_Contact_Form_Contact') {
    CRM_Core_Resources::singleton()->addScriptFile('frenchcodepostaux', 'postcodes.js');
    CRM_Frenchpostcodes_Parser::buildAddressForm($form);
    CRM_Frenchpostcodes_Parser::setStreetAddressOnForm($form);
  }
  if ($formName == 'CRM_Contact_Form_Inline_Address') {
    CRM_Frenchpostcodes_Parser::buildAddressForm($form);
    CRM_Frenchpostcodes_Parser::setStreetAddressOnForm($form);
  }
}


function frenchcodepostaux_civicrm_alterContent(  &$content, $context, $tplName, &$object ) {
  if ($object instanceof CRM_Contact_Form_Inline_Address) {
    $locBlockNo_fr = CRM_Utils_Request::retrieve('locno', 'Positive', CRM_Core_DAO::$_nullObject, TRUE, NULL, $_REQUEST);
    $template_fr = CRM_Core_Smarty::singleton();
    $template_fr->assign('blockId', $locBlockNo_fr);
    $template_fr->assign('zipcodesss',json_encode(frenchcodepostaux_get_all()));
    $content .= $template_fr->fetch('CRM/Contact/Form/Edit/Address/postcode_js.tpl');
  }
  if ($object instanceof CRM_Contact_Form_Contact) {
    $template_fr = CRM_Core_Smarty::singleton();
    $template_fr->assign('zipcodesss', json_encode(frenchcodepostaux_get_all()));
    $content .= $template_fr->fetch('CRM/Contact/Form/Edit/postcode_contact_js.tpl');
  }
}

function frenchcodepostaux_get_all() { }

function frenchcodepostaux_civicrm_pageRun( &$page ) {
  if ($page instanceof CRM_Contact_Page_View_Summary) {
    CRM_Core_Resources::singleton()->addScriptFile('frenchcodepostaux', 'postcodes.js');
  }
}