<?
    $posted_options = Shop_ProductHelper::get_default_options($product);    
?>
<table class="table add_to_cart_control">
    <tbody>
        <tr>
            <td>
                <span class="product_price" id="product_price">
                    <?= format_currency($product->om('sale_price', $posted_options)) ?>
                </span>
                <!-- This hidden is used by the optional JavaScript-based product price calculator -->
                <input type="hidden" value="<?= $product->om('sale_price', $posted_options) ?>" id="base_product_price"/>
            </td>
            <td class="x">x</td>
            <td class="qty_controls">
                <div>
                    <input class="input-quantity" type="text" name="product_cart_quantity" value="<?= post('product_cart_quantity', 1) ?>" />
                </div>
            </td>
            <td>
                <a href="#" class="button small radius" 
                    onclick="return $(this).getForm().sendRequest('shop:on_addToCart', {onAfterUpdate: Utility.page.init_effects, 
                        update: {'mini_cart': 'shop:mini_cart', 'product_page': 'shop:product_partial'}
                    })">
                    Add to cart
                </a>
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
<? if ($product->is_discounted()): ?>
    <p>
        <span class="label_on_sale label radius success"><i class="icon-thumbs-up"></i> This product is on sale!</span> Original price: 
        <span class="original_price"><?= format_currency($product->om('price', $posted_options)) ?></span>
    </p>
<? endif ?>