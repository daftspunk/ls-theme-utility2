<? if ($product && $product->extra_options->count): ?>
    <?
        $control_name = Shop_BundleHelper::get_product_control_name($item, $item_product, 'extra_options');
    ?>
    <table class="bundle_product_extra_options">
        <? foreach ($product->extra_options as $option): ?>
            <?
                $is_checked = Shop_BundleHelper::is_product_extra_option_selected($option, $item, $item_product);
            ?>
            <tr>
                <th>
                    <label for="bundle_extra_option_<?= $option->id ?>">
                        <input 
                            name="<?= $control_name.'['.$option->option_key.']' ?>" 
                            class="bundle_extra_option_cb"
                            <?= checkbox_state($is_checked) ?> 
                            id="bundle_extra_option_<?= $option->id ?>" 
                            value="1" 
                            type="checkbox" />
                            
                        <?= h($option->description) ?>:
                        <? if ($option->price > 0): ?>
                            <span class="price">+ <?= format_currency($option->get_price($product)) ?></span>
                        <? else: ?>
                            <span class="price">free</span>
                        <? endif ?>
                    </label>
                    <!-- This hidden is used by the optional JavaScript-based product price calculator -->
                    <input type="hidden" value="<?= $option->get_price($product) ?>" class="extra_option_price" />                        
                </th>
            </tr>
        <? endforeach ?>
    </table>
<? endif ?>​