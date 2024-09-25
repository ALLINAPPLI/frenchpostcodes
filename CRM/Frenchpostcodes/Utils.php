<?php
  
  class CRM_Frenchpostcodes_Utils {
  
    /**
     * récupération du nom machine du champ personnalisé
     * @return string
     * @throws \CRM_Core_Exception
     * @throws \Civi\API\Exception\UnauthorizedException
     */
    public static function getCustomfieldByNameMachine() {
      $stringCustomField = 'custom_';
      $customFields = \Civi\Api4\CustomField::get(FALSE)
        ->addSelect('id')
        ->addWhere('name', '=', 'Saisie_Adresse_api_BAN')
        ->execute()
        ->first();
      
      return $stringCustomField . $customFields['id'];
    }
    
    public static function getUFGroupApiBan() {
      $uFGroups = \Civi\Api4\UFGroup::get(FALSE)
        ->addSelect('id')
        ->addWhere('name', '=', 'Profil_adresse_avec_API_BAN')
        ->execute()
        ->first();
      
      return $uFGroups['id'];
    }
  
    /**
     * récupération de la lattitude et de la longitude suite au call vers l'API BAN
     * @param $stringResponse
     * @return array
     */
    public static function getLatLonAfterSubmitForm($stringResponse) {
      $arrayResponse = explode('/', $stringResponse);
      $arrayTrim = array_map('trim',$arrayResponse);
      $latLon = array_splice($arrayTrim,-2,2);
      return $latLon;
    }
  
  }