<?php
  
  class CRM_Frenchpostcodes_Utils {
  
    public static function getCustomfieldByNameMachine() {
      $stringCustomField = 'custom_';
      $customFields = \Civi\Api4\CustomField::get(FALSE)
        ->addSelect('id')
        ->addWhere('name', '=', 'Saisie_Adresse_api_BAN')
        ->execute()
        ->first();
      
      return $stringCustomField . $customFields['id'];
    }
    
    public static function getLatLonAfterSubmitForm($stringResponse) {
      $arrayResponse = explode('/', $stringResponse);
      $arrayTrim = array_map('trim',$arrayResponse);
      $latLon = array_splice($arrayTrim,-2,2);
      return $latLon;
    }
  }