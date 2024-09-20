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
    
    public static function createAddressForContact($trimResponse,$contactId,$location,$primary) {
      $addAddress = \Civi\Api4\Address::create(FALSE)
        ->addValue('location_type_id', $location)
        ->addValue('contact_id', $contactId)
        ->addValue('is_primary', $primary)
        ->addValue('street_address', $trimResponse[2])
        ->addValue('city', $trimResponse[0])
        ->addValue('postal_code', $trimResponse[1])
        ->execute();
    }
  
    public static function checkAddressContact($trimResponse,$contactId) {
      $addresses = \Civi\Api4\Address::get(FALSE)
        ->addSelect('*', 'custom.*')
        ->addWhere('contact_id', '=', $contactId)
        ->execute();
      
      if(empty($addresses)) {
        self::createAddressForContact($trimResponse,$contactId,3,TRUE);
      } else {
        foreach ($addresses as $key => $value) {
          if($value['street_address'] !== $trimResponse[2]
             && $value['city'] !== $trimResponse[0]
             && $value['postal_code'] !== $trimResponse[1]) {
            self::createAddressForContact($trimResponse,$contactId,4,FALSE);
          }
        }
      
      }
    }
    
    public static function retrieveContactIdOfProfile($stringResponse,$emailContactProfil) {
      $arrayResponse = explode('/', $stringResponse);
      $arrayTrim = array_map('trim',$arrayResponse);
  
      $contact = \Civi\Api4\Contact::get(FALSE)
        ->addSelect('*')
        ->addWhere('email_primary.email', '=', $emailContactProfil)
        ->execute()
        ->first();
      
      if(!empty($contact)) {
        $contact_id = $contact['id'];
        self::checkAddressContact($arrayTrim,$contact_id);
      } else {
        Civi::log()->debug('Contact doesn\'t exist in database');
      }
      
    }
  }