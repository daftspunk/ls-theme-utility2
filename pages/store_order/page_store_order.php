<div id="page_store_order">
    <? if (!$order): ?>
        <p>Order not found</p>
        <p><a class="link_button round" href="<?= root_url('store')?>">Continue shopping</a></p>
    <? else: ?>
        <div class="page_header">
            <h2>Order # <?= $order->id ?></h2>
        </div>       
        <p class="lead">Placed on <?= h($order->order_datetime->format('%x')) ?></p>

        <? $this->render_partial('shop:order_details', array('order'=>$order, 'items'=>$items)) ?>

        <div class="row">
            <div class="six columns">
                <p>
                    <a class="link_button round" href="<?= root_url('store/orders') ?>">Return to the order list</a>
                </p>
            </div>
            <div class="three columns offset-by-three">
                <? if($order->payment_method->has_payment_form() && !$order->payment_processed()): ?>
                    <div class="alert-box alert align_center">This order is not paid</div>
                    <a class="button radius expand" href="<?= root_url('store/pay/'.$order->order_hash) ?>">Pay now</a>
                <? endif ?>
            </div>
        </div>
    <? endif ?>
</div>