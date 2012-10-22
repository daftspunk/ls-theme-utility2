<?= flash_message() ?>

<? 
    $items = Shop_Cart::list_active_items(); 
    $item_num = count($items);
    if ($item_num):
        $last_index = count($items)-1;
?>
    <?= open_form() ?>
        <input type="hidden" name="redirect" value="<?= root_url('/store/checkout-start') ?>" />
        <table class="table product_table">
            <thead>
                <tr>
                    <th class="item">Product</th>
                    <th class="align_right">Price</th>
                    <th class="align_right">Discount</th>
                    <th class="align_right">Quantity</th>
                    <th class="align_right last">Total</th>
                    <th class="controls">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <? foreach ($items as $index=>$item): ?>
                    <?
                        $bundle_item = $item->get_bundle_item();
                        $bundle_item_product = $item->get_bundle_item_product();
                        $images = $item->om('images');

                        // Make smaller images for bundle items
                        $image_url = $images->count ? $images->first->getThumbnailPath($bundle_item ? 40 : 70, 'auto') : null; 
                        $options_str = $item->options_str();
                    ?>
                    <tr>
                        <!-- Product -->
                        <td class="qty_shift">
                            <div class="<?= $bundle_item ? 'bundle_item' : null ?>">
                                <? if ($image_url): ?><img align="left" class="product_image" src="<?= $image_url ?>" alt="<?= h($item->product->name) ?>"/><? endif ?>
                                <div class="product_description">
                                    <strong><?= h($item->product->name) ?></strong>
                                    <? if (strlen($options_str)): ?><br/><?= h($options_str) ?><? endif ?>
                                    <? foreach ($item->extra_options as $option): ?>
                                        <br/> + <?= h($option->description) ?>
                                    <? endforeach ?>
                                </div>
                            </div>
                        </td>
                        <!-- Price -->
                        <td class="align_right qty_shift"><?= format_currency($item->single_price()) ?></td>

                        <!-- Discount -->
                        <td class="align_right qty_shift"><?= format_currency($item->discount()) ?></td>

                        <!-- Quantity -->
                        <td <? if (!$bundle_item_product || $bundle_item_product->allow_manual_quantity): ?>class="align_right qty_controls"<? else: ?>class="align_right qty_shift"<? endif ?>>
                            <? if (!$bundle_item_product || $bundle_item_product->allow_manual_quantity): ?>
                                <div class="float_right">
                                    <input type="text" name="item_quantity[<?= $item->key ?>]" class="input-quantity" 
                                        value="<?= $item->get_quantity() ?>" 
                                        onkeydown="if ((event.keyCode ? event.keyCode : event.which) == 13) $(this).getForm().sendRequest('on_action', {
                                            onAfterUpdate: Utility.page.init_effects, 
                                            update: {'p_shop_cart_partial': 'shop:cart_partial', 'mini_cart': 'shop:mini_cart'}
                                        })"/>
                                </div>
                            <? else: ?>
                                <?= $item->get_quantity() ?>
                            <? endif ?>
                        </td>

                        <!-- Total -->
                        <td class="align_right last qty_shift total">
                            <? if (!$item->is_bundle_item()): ?>
                                <?= format_currency($item->total_price()) ?>
                            <? else:
                                $master_item = $item->get_master_bundle_item();
                                $multiplier = ($master_item && $master_item->quantity > 1) ? ' x '.$master_item->quantity : null;
                            ?>
                                <?= format_currency($item->bundle_item_total_price()).$multiplier ?>
                            <? endif  ?>
                        </td>

                        <!-- Controls -->
                        <td class="qty_shift controls">
                            <? if (!$bundle_item || !$bundle_item->is_required): ?>
                                <a href="#" class="delete_row" title="Remove" 
                                    onclick="return $(this).getForm().sendRequest('shop:on_deleteCartItem', {onAfterUpdate: Utility.page.init_effects, 
                                        update: {'p_shop_cart_partial': 'shop:cart_partial', 'mini_cart': 'shop:mini_cart'}, 
                                        confirm: 'Do you really want to remove this item from cart?', 
                                        extraFields: {key: '<?= $item->key ?>'}
                                    })">
                                    <i class="icon-remove-circle"></i>
                                </a>
                            <? endif ?>
                        </td>
                    </tr>
                    
                    <? if (($bundle_item && $index == $last_index) || ($bundle_item && $bundle_item->id && !$items[$index+1]->get_bundle_item())): ?>
                        <?
                            $master_item = $item->get_master_bundle_item();
                        ?>
                        <? if ($master_item): ?>
                            <tr class="bundle_totals">
                                <td class="qty_shift"><?= h($master_item->product->name) ?> bundle totals</td>
                                <td class="align_right qty_shift"><?= format_currency($master_item->bundle_single_price()) ?></td>
                                <td class="align_right qty_shift"><?= format_currency($master_item->bundle_total_discount()) ?></td>
                                <td class="align_right qty_shift"><?= $master_item->quantity ?></td>
                                <td class="align_right qty_shift last"><?= format_currency($master_item->bundle_total_price()) ?></td>
                                <td class="qty_shift controls"></td>
                            </tr>
                        <? endif; ?>
                    <? endif ?>
                    
                <? endforeach ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4"><div class="cart_subtotal_label align_right">SUBTOTAL</div></th>
                    <th colspan="2"><div class="cart_subtotal align_right"><?= format_currency($estimated_total) ?></div></th>
                </tr>
            </tfoot>
        </table>
    
        <div class="row">
            <div class="five columns">

                <!-- Shipping Estimator -->
                <? $this->render_partial('shop:shipping_cost_estimator') ?>

            </div>
            <div class="four columns offset-by-three align_right">

                <!-- Coupon -->
                <div class="row">
                    <div class="seven columns offset-by-five">
                        <label class="label" for="coupon_code">Do you have a coupon?</label>
                        <input type="text" id="coupon_code" value="<?= h($coupon_code) ?>" placeholder="COUPON" name="coupon" 
                            onkeydown="if ((event.keyCode ? event.keyCode : event.which) == 13) $(this).getForm().sendRequest('on_action', {
                                onAfterUpdate: Utility.page.init_effects, 
                                update: {'p_shop_cart_partial': 'shop:cart_partial', 'mini_cart': 'shop:mini_cart'}
                            })"/>
                    </div>
                </div>

                <!-- Apply Changes -->
                <a href="#" class="secondary button radius" 
                    onclick="return $(this).getForm().sendRequest('on_action', {
                        onAfterUpdate: Utility.page.init_effects, 
                        update: {'p_shop_cart_partial': 'shop:cart_partial', 'mini_cart': 'shop:mini_cart'}
                    })">
                    Apply changes
                </a>

                <!-- Checkout -->
                <a href="<?= root_url('/store/checkout-start') ?>" class="button radius" onclick="return $(this).getForm().sendRequest('shop:on_setCouponCode')">Check out</a>
                
            </div>
        </div>
    </form>
<? else: ?>
    <p>Your cart is empty.</p>
    <p><a class="link_button" href="<?= root_url('store')?>">Continue shopping</a></p>
<? endif ?>​