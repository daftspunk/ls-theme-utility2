<div id="page_store_checkout_start">
    <? if (Shop_Cart::get_item_total_num() != 0): ?>
        <div class="row">
            <div class="four columns">
                <div class="separator right">
                    <h3>Existing customers</h3>
                    <p>Please sign in with your existing account.</p>
                    <? $this->render_partial('account:login_form', array('redirect'=>root_url('store/checkout'))) ?>
                    <p>
                        Don’t have an account? 
                        <a href="<?= root_url('account/login') ?>">Register!</a>
                    </p>
                </div>
            </div>
            <div class="eight columns">
                <h3>New customers</h3>
                <p>If you do not have an account and you do not want to register, you may checkout as a guest.</p>
                <p>
                    <a class="button radius" href="<?= root_url('store/checkout') ?>">Checkout as Guest</a>
                </p>
                <h5>Why register?</h5>
                <p>Registration allows you to avoid filling in billing and shipping forms every time you checkout on this website.</p>
            </div>
        </div>
    <? else: ?>
        <p>Your cart is empty.</p>
        <p><a class="link_button" href="<?= root_url('store')?>">Continue shopping</a></p>
    <? endif ?>
</div>