<? if ($product->options->count): ?>
    <? 
        $exclude = isset($exclude) ? $exclude : array();
    ?>
    <table class="table product_options">
        <? foreach ($product->options as $option): ?>
        <?
            if (in_array($option, $exclude)) continue;
            $control_name = 'product_options['.$option->option_key.']';
            $posted_options = Shop_ProductHelper::get_default_options($product);
            $posted_value = isset($posted_options[$option->option_key]) ? $posted_options[$option->option_key] : null;
        ?>
        <tr>
            <th><?= h($option->name) ?>:</th>
            <td>
                <select 
                    name="<?= $control_name ?>" 
                    class="expand" 
                    onchange="return $(this).getForm().sendRequest('on_action', {onAfterUpdate: Page.init_effects, update: {'product_page': 'shop:product_partial'}})">
                    <?
                        $values = $option->list_values();
                    ?>
                    <? foreach ($values as $value): ?>
                    <option <?= option_state($posted_value, $value) ?> value="<?= h($value) ?>"><?= h($value) ?></option>
                    <? endforeach ?>
                </select>
            </td>
        </tr>
        <? endforeach ?>
    </table>
<? endif ?>