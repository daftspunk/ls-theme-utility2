var Utility = (function(util, $){

    util.page = (function(page, $) {

        page.constructor = $(function() {
            
            page.init_effects();

            $('.bundle_product_selector').live('change', function(event){
                var parent = $(event.currentTarget).closest('li');
                if (event.currentTarget.checked) {
                    parent.find('div.bundle_product_parameters').removeClass('hidden');
                    if ($(event.currentTarget).attr('type') == 'radio') {
                        var parent_product = parent.closest('ul');
                        parent_product.find('div.bundle_product_parameters').each(function(i, e){
                            var $e = $(e);
                            var current_parent = $e.closest('li')[0];
                            if (current_parent != parent[0])
                                $e.addClass('hidden');
                        })
                    }
                }
                else
                    parent.find('div.bundle_product_parameters').addClass('hidden');
                    
                page.update_product_price();
            });

        });

        page.init_effects = function() {
            $('#product_images').portfolio('destroy');
            $('#product_images').portfolio({ thumb_mode: 'orbit' });
            page.init_price_calculator();
            refresh_custom_forms();
            $.utility.forms && $(document).forms() && $(document).forms('refresh');
            $('td.qty_controls input.input-quantity').change(page.update_product_price);
        }

        page.get_extra_option_price = function(option) {
            var price = jQuery('input.extra_option_price', $(option).parents('table')).val();
            if (!isNaN(price))
                return parseFloat(price);
                
            return 0;
        }

        page.update_product_price = function() {
            var extra_price = 0;
            $("input.extra_option_cb:checked").each(function(){
                extra_price += page.get_extra_option_price(this);
            });
            
            var bundle_price = 0;
            
            $("input.bundle_item_price").each(function(i, e){
                var $e = $(e);
                if ($e.parent().is(':visible')) {
                    var price = parseFloat($e.val());
                    
                    var product_parameters = $e.parent().closest('div.product_parameters');
                    product_parameters.find('input.bundle_extra_option_cb:checked').each(function(){
                        price += page.get_extra_option_price(this);
                    });

                    /*
                     * You may need to update the next line for other currencies
                     */

                    product_parameters.find('.product_price').text('$' + parseFloat(price).formatNumber(2, '.', ''));
                    
                    var quantity = 1;
                    var quantity_control = $e.closest('div.bundle_item_quantity_control').find('td.qty_controls input.input-quantity');
                    if (quantity_control.length) {
                        quantity = quantity_control.val().trim();
                        if (!(/^[0-9]+$/.test(quantity)))
                            quantity = 1;
                    }
                    
                    if (!isNaN(price))
                        bundle_price += parseFloat(price)*quantity;
                }
            });
            
            var updated_price = parseFloat($("#base_product_price").val()) + extra_price + bundle_price;

            /*
             * You may need to update the next line for other currencies
             */

            $('#product_price').text('$' + updated_price.formatNumber(2, '.', ''));
        }

        page.init_price_calculator = function() {
            $("input.extra_option_cb").change(function() { page.update_product_price(); });
            $("input.bundle_extra_option_cb").change(function() { page.update_product_price(); });
            
            page.update_product_price();
        }

        page.init_rating_selector = function() {
            $('.rating-selector').star_rating({
                input_type: "select",
                cancel_value: 0,
                cancel_show: true
            });
        }

        return page;
    }(util.page || {}, jQuery));
    

    return util;
}(Utility || {}, jQuery));