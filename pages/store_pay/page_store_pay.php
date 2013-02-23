<? if (!$order): ?>
    <p>Order not found.</p>
<? else: ?>
    <div class="page_header">
        <h2>Order # <?= $order->id ?></h2>
    </div>

    <? $this->render_partial('shop:order_details', array('order'=>$order, 'items'=>$order->items)) ?>

    <h5>Please choose a payment method</h5>

    <?= open_form(array('class'=>'custom')) ?>
        <? $payment_methods = Shop_PaymentMethod::list_applicable(
             $order->billing_country_id,
             $order->total) ?>

        <div class="payment_methods">
            <? foreach ($payment_methods as $payment_method): ?>
                <label for="<?= 'payment_method'.$payment_method->id ?>">
                    <input 
                        <?= radio_state($payment_method->id == $order->payment_method_id) ?> 
                        type="radio" 
                        value="<?= $payment_method->id ?>" 
                        name="payment_method" 
                        id="<?= 'payment_method'.$payment_method->id ?>"
                        onchange="$(this).getForm().sendRequest('shop:on_updatePaymentMethod', {
                             update: {'payment_form': 'shop:payment_form'}
                         })"/>
                    <?= h($payment_method->name) ?>
                </label>
            <? endforeach ?>
        </div>
    </form>

    <div class="row">
        <div class="six columns end">
            <div id="payment_form"><? $this->render_partial('shop:payment_form') ?></div>
        </div>
    </div>

<? endif ?>
