<?
    // This checkout page implements the simplified checkout process described here:
    // http://lemonstandapp.com/docs/combining_the_payment_method_order_review_and_pay_pages/

    $handler = $checkout_step != 'shipping_method' ? 'on_action' : 'place_order_and_pay';
    
    if ($checkout_step != 'shipping_method')
    {
        $handler = 'on_action';
        
        if ($checkout_step == 'shipping_info' && !$shipping_required)
        $handler = 'place_order_and_pay';
    }  else
        $handler = 'place_order_and_pay';
    
?>
<?= open_form(array(
    'class' => 'custom',
    'onsubmit'=>"return $(this).sendRequest('$handler', {
        onAfterUpdate: refresh_custom_forms,
        update:{'p_checkout_partial': 'shop:checkout_partial'}
    })")) 
?>
    <? $this->render_partial('shop:checkout_progress') ?>
    <div class="row">
        <div class="eight columns">
            <div class="separator right shadow">
                <?
                    switch ($checkout_step)
                    {
                        case 'billing_info': $this->render_partial('shop:checkout_billing_info'); break;
                        case 'shipping_info': $this->render_partial('shop:checkout_shipping_info'); break;
                        case 'shipping_method': $this->render_partial('shop:checkout_shipping_method'); break;
                    }
                ?>
            </div>
        </div>
        <div class="four columns">
            <? $this->render_partial('shop:checkout_summary') ?>
        </div>
    </div>
    <input name="auto_skip_shipping" value="1" type="hidden"/>
    <input name="auto_skip_to" value="review" type="hidden"/>
</form>