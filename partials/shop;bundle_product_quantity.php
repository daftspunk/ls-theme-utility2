<?
    $selected_options = Shop_BundleHelper::get_selected_options($item, $item_product);
?>

<div class="bundle_item_quantity_control">
    <? if ($item_product->allow_manual_quantity): ?>
        <table class="table add_to_cart_control">
            <tbody>
                <tr>
                    <td>
                        <span class="product_price"><?= format_currency($item_product->get_sale_price($product, $selected_options)) ?></span>
                    </td>
                    <td class="x">x</td>
                    <td class="qty_controls">
                        <div>
                            <input class="input-quantity" type="text" 
                                name="<?= Shop_BundleHelper::get_product_control_name($item, $item_product, 'quantity') ?>" 
                                value="<?= Shop_BundleHelper::get_product_quantity($item, $item_product) ?>"/>                        
                        </div>
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">Price</td>
                    <td colspan="2">Quantity</td>
                </tr>
            </tfoot>
        </table>
    <? else: ?>
        <span class="product_price"><?= format_currency($item_product->get_sale_price($product, $selected_options)) ?></span>
    <? endif ?>

    <!-- This hidden is used by the optional JavaScript-based product price calculator -->
    <input type="hidden" value="<?= $item_product->get_sale_price($product, $selected_options) ?>" class="bundle_item_price"/>
</div>​