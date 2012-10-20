<? if (isset($option) || isset($option_name)): ?>
    <?
        if (!isset($option))
            $option = $product->options->find_by('name', $option_name);

        $option_key = $option->option_key;
        $control_name = 'product_options['.$option_key.']';
        $posted_options = Shop_ProductHelper::get_default_options($product);
        $posted_value = isset($posted_options[$option_key]) ? $posted_options[$option_key] : null;
    ?>
    <div class="fancy_product_option">
        <h5>Select your <?= h(mb_strtolower($option->name)) ?></h5>
        <table class="fancy_selector">
            <thead>
                <tr>
                    <th class="first"><?= h($option->name) ?></th>
                    <th class="number">Price</th>
                    <th class="last number">Stock</th>
                </tr>
            </thead>
            <tbody>
                <?
                    $values = $option->list_values();
                ?>
                <? foreach ($values as $value): ?>        
                    <?
                        $is_current = $posted_value == $value;
                        $click_handler = "return $(this).getForm().sendRequest('on_action', {onAfterUpdate: Utility.page.init_effects, update: {'product_page': 'shop:product_partial'}, extraFields: { product_options: { '".$option_key."': '".h($value)."' } } })";
                        $posted_options[$option_key] = $value;
                    ?>
                    <tr onclick="<?= $click_handler ?>" class="<?= $is_current ? 'current' : null ?> <?= zebra('special_option') ?>">
                        <th>
                            <a onclick="<?= $click_handler ?>" href="#">
                                <?= h($value) ?>
                                <? if ($is_current): ?><span class="marker">&nbsp;</span><? endif ?>
                            </a>
                        </th>
                        <td class="number"><a onclick="<?= $click_handler ?>" href="#"><?= format_currency($product->om('price', $posted_options)) ?></a></td>
                        <td class="number"><a onclick="<?= $click_handler ?>" href="#"><?= $product->om('in_stock', $posted_options) ?></a></td>
                    </tr>
                <? endforeach ?>
            </tbody>
        </table>
    </div>
    <input type="hidden" value="<?=$posted_value?>" name="<?= $control_name ?>"/>
<? endif ?>