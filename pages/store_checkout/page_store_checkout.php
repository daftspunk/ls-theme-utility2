<div id="page_store_checkout">
    <div class="page_header">
        <h2><?= h($this->page->title) ?></h2>
    </div>    
    <? if (Shop_Cart::get_item_total_num() != 0): ?>
        <div id="p_checkout_partial"><? $this->render_partial('shop:checkout_partial') ?></div>
    <? else: ?>
        <p>Your cart is empty.</p>
        <p><a class="link_button round" href="<?= root_url('store')?>">Continue shopping</a></p>
    <? endif ?>
</div>