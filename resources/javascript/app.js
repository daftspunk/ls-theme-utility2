requirejs.config({
    paths: {
        vendor: '../vendor',
        'utility/popup': 'utility/jquery.utility.popup'
    }
});

function init_effects() {
    init_price_calculator();
    $.fn.foundationCustomForms && $.foundation.customForms.appendCustomMarkup();
    $.utility.forms && $(document).forms('refresh');
    $('td.qty_controls input.input-quantity').change(update_product_price);
}

function get_extra_option_price(option) {
    var price = jQuery('input.extra_option_price', $(option).parents('td')).val();
    if (!isNaN(price))
        return parseFloat(price);
        
    return 0;
}

function update_product_price() {
    var extra_price = 0;
    $("input.extra_option_cb:checked").each(function(){
        extra_price += get_extra_option_price(this);
    });
    
    var bundle_price = 0;
    
    $("input.bundle_item_price").each(function(i, e){
        var $e = $(e);
        if ($e.parent().is(':visible')) {
            var price = parseFloat($e.val());
            
            var product_parameters = $e.parent().closest('div.product_parameters');
            product_parameters.find('input.bundle_extra_option_cb:checked').each(function(){
                price += get_extra_option_price(this);
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

function init_price_calculator() {
    $("input.extra_option_cb").click(update_product_price);
    $("input.bundle_extra_option_cb").click(update_product_price);
    
    update_product_price();
}

function init_rating_selector() {
    $('.rating-selector').star_rating({
        input_type: "select",
        cancel_value: 0,
        cancel_show: true
    });
}

/* Page load handler
------------------------------------------------------------------------ */

$(document).ready(function() {
    init_effects();

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
            
        update_product_price();
    })
});

/* Extend the Number class with the formatNumber method for formatting 
     currency values
------------------------------------------------------------------------ */

Number.prototype.formatNumber = function(c, d, t) {
    var n = this, c = isNaN(c = Math.abs(c)) ? 2 : c, 
    d = d == undefined ? "," : d, 
    t = t == undefined ? "." : t, 
    s = n < 0 ? "-" : "", 
    i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", 
    j = (j = i.length) > 3 ? j % 3 : 0;
    
    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
}