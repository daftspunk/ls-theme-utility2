<!-- <ul class="receipt_data totals"> -->
<div class="checkout_summary">
    <ul class="block-grid one-up mobile-three-up">
        <li>
            <h6>Subtotal</h6>
            <p><?= format_currency($cart_total) ?></p>
        </li>
        <? if ($discount): ?>
        <li>
            <h6>Applied discount</h6>
            <p class="align_right light"><?= format_currency($discount) ?></p>
        </li>
        <? endif?>
        <li>
            <h6>Tax</h6>
            <p><?= format_currency($estimated_tax) ?></p>
        </li>
        <li>
            <h6>Estimated total</h6>
            <p><span class="product_price"><?= format_currency($estimated_total) ?></span></p>
        </li>
        <? 
            $bill_info_str = $billing_info->as_string();
            $ship_info_str = $shipping_info->as_string();
            
            $apress_matches = $billing_info->equals($shipping_info);
        ?>
        <? if ($bill_info_str): ?>
            <li>
                <h6><? if (!$apress_matches): ?>Bill to<? else: ?>Bill and ship to<? endif ?></h6>
                <p><?= h($bill_info_str) ?></p>
            </li>
        <? endif ?>

        <? if ($ship_info_str && !$apress_matches): ?>
            <li>
                <h6>Ship to</h6>
                <p><?= h($ship_info_str) ?></p>
            </li>
        <? endif ?>

        <? if ($shipping_method->id): ?>
            <li>
                <h6>Shipping method</h6>
                <p><?= h($shipping_method->name) ?></p>
            </li>
        <? endif ?>

        <? if ($payment_method->id): ?>
            <li>
                <h6>Payment method</h6>
                <p><?= h($payment_method->name) ?></p>
            </li>
        <? endif ?>
    </ul>

</div>