<?
    $fancy_option = $product->options->first();
?>
<div class="row">
    <div class="three columns product_image">

        <!-- Product Images -->
        <? if ($product->is_discounted()): ?>
            <span class="on_sale">On sale!</span>
        <? endif ?>
        <? $this->render_partial('shop:product_images') ?>

        <!-- Product Attributes -->
        <? $this->render_partial('shop:product_attributes') ?>

    </div>
    <div class="nine columns">

        <!-- Product Short Description -->
        <p class="lead"><?= h($product->short_description) ?></p>

        <!-- Rating -->
        <? if ($product->rating_all): ?>
            <p class="star-rating">
                <i class="rating-<?= $product->rating_all*10 ?>"></i> 
                <span> based on <?= $product->rating_all_review_num ?> reviews</span>
            </p>
        <? endif ?>

        <?= flash_message() ?>
        
        <?= open_form(array('class'=>'custom')) ?>
            <div class="product_panel">

                <!-- Product Long Description -->
                <? if ($product->options->count): ?>
                    <div class="row">
                        <div class="six columns">
                            <?= $product->description ?>
                        </div>
                        <div class="six columns">
                            <!-- Fancy Product Option -->
                            <? $this->render_partial('shop:product_option_fancy', array('option'=>$fancy_option)) ?>
                        </div>
                    </div>
                <? else: ?>
                    <?= $product->description ?>
                <? endif ?>

                <?
                    $posted_options = Shop_ProductHelper::get_default_options($product);
                    $disabled = $product->om('disabled', $posted_options);
                ?>

                <!-- Product Options and Extras -->
                <? $this->render_partial('shop:product_options', array('exclude'=>array($fancy_option))) ?>
                <? $this->render_partial('shop:product_extra_options') ?>

                <!-- Out of stock -->
                <? if ($product->om('is_out_of_stock') && !$product->allow_pre_order): ?>
                    <div class="alert-box alert">
                        This product is temporarily unavailable. 
                        <? if ($product->om('expected_availability_date', $posted_options)): ?>
                            The expected availability date is <strong><?= $product->om('expected_availability_date', $posted_options)->format('%x') ?></strong>
                        <? endif ?>
                    </div>

                <!-- Product Unavailable -->
                <? elseif ($disabled): ?>
                    <div class="alert-box alert">Sorry, this product combination is not available.</div>

                <!-- Add to Cart -->
                <? else: ?>
                    <? if (!$product->bundle_items->count): ?>
                        <? $this->render_partial('shop:add_to_cart_control') ?>
                    <? endif ?>
                <? endif ?>
            </div>

            <!-- Product Components -->
            <? if ($product->bundle_items->count): ?>
                <div class="bundle_items">
                    <div id="product_bundle_items"><? $this->render_partial('shop:bundle') ?></div>
                    <? $this->render_partial('shop:add_to_cart_control') ?>
                </div>
            <? endif ?>
            
        </form>
        
        <!-- Product Review -->
        <? $this->render_partial('shop:product_reviews') ?>
        <? $this->render_partial('shop:add_review_form') ?>  

    </div>​
</div>