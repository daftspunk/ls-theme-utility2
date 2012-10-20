<? if ($product->bundle_items->count): ?>

    <h5>Components</h5>
    <table class="table table-striped custom bundle_items">
        <? foreach ($product->bundle_items as $item): ?>
            <tr>
                <th class="item">
                    <?= h($item->name) ?>
                    <? if ($item->description): ?>
                        <p><?= h($item->description) ?></p>
                    <? endif ?>
                </th>
                <td class="products">
                    <? $this->render_partial('shop:bundle_item_products', array('item'=>$item)) ?>
                </td>
            </tr>
        <? endforeach ?>
    </table>

<? endif ?>​