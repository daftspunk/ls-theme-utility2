<div id="page_store_receipt">
    <? if (!$order): ?>
        <p>Order not found</p>
    <? else: ?>
        <div class="page_header">
            <h2>Order # <?= $order->id ?></h2>
        </div>       
        <p class="lead">Placed on <?= h($order->order_datetime->format('%x')) ?></p>
        
        <? if ($payment_processed): ?>
            <div class="alert-box success">This order is PAID now. Thank you!</div>
        <? else:?>
            <div class="alert-box alert">This order is NOT PAID.</div>
        <? endif ?>
        
        <? $this->render_partial('shop:order_details', array('order'=>$order, 'items'=>$items)) ?>

        <p><a class="link_button" href="<?= root_url('store')?>">Continue shopping</a></p>
    <? endif ?>
</div>