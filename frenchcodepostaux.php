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
//
//}

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_navigationMenu
 */
//function frenchcodepostaux_civicrm_navigationMenu(&$menu) {
//  _frenchcodepostaux_civix_insert_navigation_menu($menu, 'Mailings', array(
//    'label' => E::ts('New subliminal message'),
//    'name' => 'mailing_subliminal_message',
//    'url' => 'civicrm/mailing/subliminal',
//    'permission' => 'access CiviMail',
//    'operator' => 'OR',
//    'separator' => 0,
//  ));
//  _frenchcodepostaux_civix_navigationMenu($menu);
//}

// function frenchcodepostaux_civicrm_buildForm($formName, &$form) {
//   //  if ($formName == 'CRM_Contact_Form_Contact') {
//   //    CRM_Core_Resources::singleton()->addScriptFile('belgianpostcodes', 'postcodes.js');
//   //    CRM_Belgianpostcodes_Parser::buildAddressForm($form);
//   //    CRM_Belgianpostcodes_Parser::setStreetAddressOnForm($form);

//   //  }
//   if ($formName == 'CRM_Contact_Form_Inline_Address') {
//     CRM_Frenchcodepostaux_Parser::buildAddressForm($form);
//     CRM_Frenchcodepostaux_Parser::setStreetAddressOnForm($form);
//   }
// }


function frenchcodepostaux_civicrm_alterContent(  &$content, $context, $tplName, &$object ) {
  //if ($object instanceof CRM_Contact_Form_Inline_Address) {
    //CRM_Utils_Request Gere les requête http : https://doc.symbiotic.coop/dev/civicrm/v5.20/phpdoc/CRM_Utils_Request.html#method_retrieve

    $locBlockNo_fr = CRM_Utils_Request::retrieve('locno', 'Positive', CRM_Core_DAO::$_nullObject, FALSE, NULL, $_REQUEST);
    $template_fr = CRM_Core_Smarty::singleton();
    $template_fr->assign('blockId', $locBlockNo_fr);
    $template_fr->assign('zipcodesss',json_encode(frenchcodepostaux_get_all()));
    $content .= $template_fr->fetch('CRM/Contact/Form/Edit/Address/postcode_js.tpl');
    //$content .= $template_fr->fetch('template_frs/Address/postcode_js.tpl'); 
  //}
  //   if ($object instanceof CRM_Contact_Form_Contact) {
  //     $template_fr = CRM_Core_Smarty::singleton();
  //     $template_fr->assign('zipcodes', json_encode(frenchcodepostaux_get_all()));
  //    $content .= $template_fr->fetch('CRM/Contact/Form/Edit/postcode_contact_js.tpl');
  //  }
}



//call sql data code post french 
function frenchcodepostaux_get_all() {
//   //call api
//   // var_dump($_GET['callapi']);
//   // var_dump($_POST['callapi']);
//   $call=$_POST['searchTerm'];
// 	$curl = curl_init();
// 	//var_dump($curl);
// 	curl_setopt_array($curl, [
// 		//CURLOPT_URL => "https://datanova.laposte.fr/api/records/1.0/search/?dataset=laposte_hexasmal&q=$call&facet=code_commune_insee&facet=nom_de_la_commune&facet=code_postal&facet=ligne_5",
// 		CURLOPT_RETURNTRANSFER => true
// 	]);
// 	$data = curl_exec($curl);
// 	if( $data === false || curl_getinfo($curl, CURLINFO_HTTP_CODE) !== 200){
// 		return null;
// 	}
// 	$zipcodes =[];
// 	$data = json_decode($data, true);
// 	foreach($data['records'] as $codepostaux) {
// 		$zipcodes[] = [
// 		'zip' => $codepostaux['fields']['code_postal'],
// 		'city' => $codepostaux['fields']['nom_de_la_commune']
// 		];
// 	}
// 	//var_dump($zipcodes);
// 	return $zipcodes;
}


// if (isset($_GET['call'])) {
//   $getZip = frenchcodepostaux_get_all($_GET['call']);
//   $zipList = [];
//   $data = json_decode($getZip, true);
//   foreach($data as $zip){
//   $zipList[] = [
//       'zip' => $zip['fields']['code_postal'],
//     ]; 
//   }
//   echo json_encode($zipList);
//   var_dump($zipList);
// }

// function frenchcodepostaux_get_all() {
//   $location_qry_str = "
//     SELECT Nom_commune, Code_postal
//     FROM frenchcodeposte
//     ORDER BY `Nom_commune`, `Code_postal` ASC";
//   $zipcodes = array();
//   $dao = CRM_Core_DAO::executeQuery($location_qry_str);
//   while ($dao->fetch()) {
//     $zipcodes[$dao->Code_postal.' '.$dao->Nom_commune] = array('zip' => $dao->Code_postal, 'city' => $dao->Nom_commune);
//   }
//   return $zipcodes;
// }

function frenchcodepostaux_civicrm_pageRun( &$page ) {
  if ($page instanceof CRM_Contact_Page_View_Summary) {
    CRM_Core_Resources::singleton()->addScriptFile('frenchcodepostaux', 'postcodes.js');
  }
 }