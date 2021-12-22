<?php

class CRM_Frenchpostcodes_Parser {

    protected $street_units = array();

    /**
     * @var CRM_Frenchpostcodes_Parser
     */
    protected static $_singleton;

    /**
     * @return \CRM_Frenchpostcodes_Parser
     */
    public static function singleton() {
        if (!isset(self::$_singleton)) {
        self::$_singleton = new CRM_Frenchpostcodes_Parser();
        }
        return self::$_singleton;
    }

    /**
     * When the country of an address is belgium set the right street_address in the right formatting.
     *
     * @param \CRM_Core_Form $form
     */
    public static function setStreetAddressOnForm(CRM_Core_Form $form) {
        if (!$form instanceof CRM_Contact_Form_Inline_Address && !$form instanceof CRM_Contact_Form_Contact) {
        return;
        }
        // Set the all address Field Values
        $values = $form->getVar('_values');
        $allAddressFields = $form->get_template_vars('allAddressFieldValues');
        $allAddressFields = json_decode($allAddressFields, TRUE);
        if (isset($values['address'])) {
        foreach($values['address'] as $locBlockNo => $address) {
            if ($address['country_id'] == 1076) {
            if ($allAddressFields && isset($allAddressFields['street_address_' . $locBlockNo]) && isset($address['street_address'])) {
                $allAddressFields['street_address_' . $locBlockNo] = $address['street_address'];
            }
            $defaults = array();
            $defaults['address'][$locBlockNo]['street_address'] = $address['street_address'];
            $form->setDefaults($defaults);
            }
        }
        }
        if ($allAddressFields) {
        $form->assign('allAddressFieldValues', json_encode($allAddressFields));
        }
    }


    /**
     * The build form hook retrieves the submitted Street unit which we could use later
     * to glue the address together. CiviCRM somehow adds the street unit to the street address and makes the street unit field empty.
     *
     * @param \CRM_Core_Form $form
     *
     */
    public static function buildAddressForm(CRM_Core_Form $form) {
        if (!$form instanceof CRM_Contact_Form_Inline_Address && !$form instanceof CRM_Contact_Form_Contact) {
        return;
        }

        $parser = self::singleton();
        $parser->street_units = array();

        $submittedValues = $form->exportValues();
        foreach($submittedValues['address'] as $locBlockNo => $address) {
        if (isset($address['country_id']) && $address['country_id'] == 1076) {
            if (isset($address['street_unit'])) {
            $street_unit = $address['street_unit'];
            $parser->street_units[] = $street_unit;
            }
        }
        }
    }
}


?>