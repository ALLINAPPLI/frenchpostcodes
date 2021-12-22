{*
 * File for the address block on the contact edit page
 *}

{literal}
    <script type="text/javascript">

        function init_postcode_contact_form() {
            var zipcodesfr = {/literal}{$zipcodesss}{literal};
            var addressBlocks = cj('.crm-edit-address-block');
            addressBlocks.each(function(index, item) {
                var block = cj(item).attr('id').replace('Address_Block_', '');
                init_postcodeBlock_fr(block, 'table#address_table_'+block, zipcodesfr);
            });
        }

        cj(function() {
            zipcodes_reset();
            init_postcode_contact_form();
        });

    </script>
{/literal}