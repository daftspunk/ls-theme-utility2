<?
    if ($product && $product->options->count):
        $control_name = Shop_BundleHelper::get_product_control_name($item, $item_product, 'options');
?>
    <? foreach ($product->options as $option): ?>
    <tr>
        <th><?= h($option->name) ?>:</th>
        <td>
            <select 
                name="<?= $control_name.'['.$option->option_key.']' ?>"
                class="expand" 
                onchange="$(this).getForm().sendRequest('on_action', {update: {'product_bundle_items': 'shop:bundle'}, onAfterUpdate: Utility.page.init_effects})">
                <?
                    $values = $option->list_values();
                    foreach ($values as $value):      
                        $is_selected = Shop_BundleHelper::is_product_option_selected($option, $value, $item, $item_product);
                ?>
                    <option <?= option_state($is_selected, true) ?> value="<?= h($value) ?>"><?= h($value) ?></option>
                <? endforeach ?>
            </select>
        </td>
    </tr>
    <? endforeach ?>
<? endif ?>​