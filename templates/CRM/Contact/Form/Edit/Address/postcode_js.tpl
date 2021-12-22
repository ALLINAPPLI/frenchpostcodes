{*
 * File for the inline address block french
 *}

{literal}
   <script type="text/javascript">
      function insert_row_fr_{/literal}{$blockId}{literal}() {
         var zipcodesfr = {/literal}{$zipcodesss}{literal};
         init_postcodeBlock_fr('{/literal}{$blockId}{literal}', '#address_table_{/literal}{$blockId}{literal}', zipcodesfr);
      }

      cj(function(e) {
         insert_row_fr_{/literal}{$blockId}{literal}();
      });

   </script>
{/literal}