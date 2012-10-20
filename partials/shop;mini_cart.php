<?
    $item_num = Shop_Cart::get_item_total_num();
    $account_link = ($this->customer) ? root_url('store/orders') : root_url('account/login');
?>
<div class="panel mini_cart align_center">
    <a href="<?= root_url('store/cart') ?>" class="first active"><i class="icon-shopping-cart"></i> Items: </a>
    <span class="item_num"><?= $item_num ?></span>
    <span class="divider">|</span>
    <span class="subtotal"><?= format_currency(Shop_Cart::total_price()) ?></span>
</div>