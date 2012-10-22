<table class="table order_table">
    <thead>
        <tr>
            <th>Product</th>
            <th class="align_right">Price</th>
            <th class="align_right">Discount</th>
            <th class="align_right">Quantity</th>
            <th class="align_right last">Total</th>
        </tr>
    </thead>
    <tbody>
        <? 
            $last_index = $items->count-1;  
        ?>
        <? foreach ($items as $index=>$item): ?>
        <?
            $image_url = $item->product->image_url(0, $item->bundle_master_order_item_id ? 40 : 70, 'auto'); // Make smaller images for bundle items
        ?>
        <tr>
            <td>
                <div class="<?= $item->bundle_master_order_item_id ? 'bundle_item' : null ?>">
                    <? if ($image_url): ?><img align="left" class="product_image" src="<?= $image_url ?>" alt="<?= h($item->product->name) ?>"/><? endif ?>
                    <div class="product_description">
                        <?= $item->output_product_name() ?>
                    </div>
                </div>
            </td>
            <td class="align_right"><?= format_currency($item->single_price) ?></td>
            <td class="align_right"><?= format_currency($item->discount) ?></td>
            <td class="align_right"><?= $item->bundle_master_order_item_id ? $item->get_bundle_item_quantity() : $item->quantity ?></td>
            <td class="align_right last total">
                <? if (!$item->bundle_master_order_item_id): ?>
                    <?= format_currency($item->total_price) ?>
                <? else: ?>
                    <?
                        $master_item = $item->get_master_bundle_order_item();
                        $multiplier = ($master_item && $master_item->quantity > 1) ? ' x '.$master_item->quantity : null;
                    ?>
                    <?= format_currency($item->bundle_item_total).$multiplier ?>
                <? endif ?>
            </td>
        </tr>
            <? if (($item->bundle_master_order_item_id && $index == $last_index) || ($item->bundle_master_order_item_id && !$items[$index+1]->bundle_master_order_item_id)): ?>
            <?
                $master_item = $item->get_master_bundle_order_item();
            ?>
                <? if ($master_item): ?>
                    <tr class="bundle_totals">
                        <td><?= h($master_item->product->name) ?> bundle totals</td>
                        <td class="align_right"><?= format_currency($master_item->get_bundle_single_price()) ?></td>
                        <td class="align_right"><?= format_currency($master_item->get_bundle_discount()) ?></td>
                        <td class="align_right"><?= $master_item->quantity ?></td>
                        <td class="align_right last"><?= format_currency($master_item->get_bundle_total_price()) ?></td>
                    </tr>
                <? endif ?>
            <? endif ?>
        <? endforeach ?>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="4" class="align_right">Subtotal</th>
            <th class="align_right total"><?= format_currency($order->subtotal) ?></th>
        </tr>
        <? foreach ($order->list_item_taxes() as $tax): ?>
            <tr>
                <th class="align_right" colspan="4">Sales tax (<?= ($tax->name) ?>): </th>
                <th class="align_right total"><?= format_currency($tax->total) ?></th>
            </tr>
        <? endforeach ?>  
        <tr>
            <th class="align_right" colspan="4">Shipping</th>
            <th class="align_right total"><?= format_currency($order->shipping_quote) ?></th>
        </tr>
        <? foreach ($order->list_shipping_taxes() as $tax): ?>
            <tr>
                <th class="align_right" colspan="4">Shipping tax (<?= ($tax->name) ?>): </th>
                <th class="align_right total"><?= format_currency($tax->total) ?></th>
            </tr>
        <? endforeach ?>  
        <tr>
            <th class="align_right" colspan="4">Total</th>
            <th class="align_right"><span class="product_price"><?= format_currency($order->total) ?></span></th>
        </tr>
    </tfoot>
</table>​