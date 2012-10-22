<h3>Shipping Method</h3>
<p class="lead">Please select a shipping option</p>

<? if (count($shipping_options)): ?>
    <? foreach ($shipping_options as $option): ?>
        <? if ($option->multi_option): ?>
            <? foreach ($option->sub_options as $sub_option): ?>
                    <label for="<?= 'option'.$sub_option->id ?>">
                        <input <?= radio_state($option->id == $shipping_method->id && $sub_option->id == $shipping_method->sub_option_id) ?>
                            id="<?= 'option'.$sub_option->id ?>" type="radio" name="shipping_option" 
                            value="<?= $sub_option->id ?>" />
                        <?= h($option->name) ?> - <?= h($sub_option->name) ?>: <strong><?= !$sub_option->is_free ? format_currency($sub_option->quote) : 'free' ?></strong>
                    </label>
                </li>
            <? endforeach ?>
        <? else: ?>
            <label for="<?= 'option'.$option->id ?>">
                <input <?= radio_state($option->id == $shipping_method->id) ?> id="<?= 'option'.$option->id ?>" type="radio" name="shipping_option" value="<?= $option->id ?>" />
                <?= h($option->name) ?>: <strong><?= !$option->is_free ? format_currency($option->quote) : 'free' ?></strong>
            </label>
        <? endif ?>
    <? endforeach ?>
    
    <input type="hidden" name="checkout_step" value="<?= $checkout_step ?>"/>
    <hr />
    <p class="align_right"><input type="submit" value="Place Order and Pay" class="button radius" /></p>
<? else: ?>
    <p>There are no shipping options available for your location.</p>
<? endif ?>