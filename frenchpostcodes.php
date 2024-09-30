<?php

require_once 'frenchpostcodes.civix.php';

use CRM_Frenchpostcodes_ExtensionUtil as E;

/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/
 */
function frenchpostcodes_civicrm_config(&$config): void {
  _frenchpostcodes_civix_civicrm_config($config);
  CRM_Core_Resources::singleton()->addScriptFile('frenchpostcodes', 'js/hide-custom-field.js');
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function frenchpostcodes_civicrm_install(): void {
  _frenchpostcodes_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function frenchpostcodes_civicrm_enable(): void {
  _frenchpostcodes_civix_civicrm_enable();
}
  
  function frenchpostcodes_civicrm_buildForm($formName, &$form) {
    if ($formName == 'CRM_Contact_Form_Contact') {
      CRM_Core_Resources::singleton()->addScriptFile('frenchpostcodes', 'postcodes.js');
      CRM_Frenchpostcodes_Parser::buildAddressForm($form);
      CRM_Frenchpostcodes_Parser::setStreetAddressOnForm($form);
    }
    if ($formName == 'CRM_Contact_Form_Inline_Address') {
      CRM_Frenchpostcodes_Parser::buildAddressForm($form);
      CRM_Frenchpostcodes_Parser::setStreetAddressOnForm($form);
    }
    
    $idUFGroup = CRM_Frenchpostcodes_Utils::getUFGroupApiBan();
    if($formName == 'CRM_Profile_Form_Edit' && $form->getVar('_gid') == $idUFGroup || $formName == 'CRM_Contribute_Form_Contribution_Main') {
      CRM_Core_Resources::singleton()->addScriptFile('frenchpostcodes', 'postcodes.js');
    }
  }
  
  function frenchpostcodes_civicrm_alterContent(  &$content, $context, $tplName, &$object ) {
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
    
    if($object instanceof CRM_Profile_Form_Edit) {
      $template_fr = CRM_Core_Smarty::singleton();
      $template_fr->assign('zipcodesss', json_encode(frenchcodepostaux_get_all()));
      $content .= $template_fr->fetch('CRM/postcode_profile.tpl');
    }
    
    if($object instanceof CRM_Contribute_Form_Contribution_Main) {
      $template_fr = CRM_Core_Smarty::singleton();
      $template_fr->assign('zipcodesss', json_encode(frenchcodepostaux_get_all()));
      $content .= $template_fr->fetch('CRM/postcode_profile.tpl');
    }
  }
  
  function frenchcodepostaux_get_all() { }
  
  function frenchpostcodes_civicrm_pageRun( &$page ) {
    if ($page instanceof CRM_Contact_Page_View_Summary) {
      CRM_Core_Resources::singleton()->addScriptFile('frenchpostcodes', 'postcodes.js');
    }
  }
