<?
    $group = Shop_CustomGroup::create()->find_by_code($group_code);
?>
<? if ($group): ?>

<div class="product_list">
    <ul class="block-grid">
        <? foreach ($group->products as $index=>$product): ?>
            <li>
                <div class="product_image">
                    <a href="<?= $product->page_url('store/product') ?>">
                        <? if ($product->is_discounted()):  ?>
                            <span class="on_sale">On sale!</span>
                        <? endif ?>
                        <img src="<?= $product->image_url(0, 160, 'auto') ?>" alt=""/>
                    </a>
                </div> 
                <h4><a href="<?= $product->page_url('store/product') ?>"><?= h($product->name) ?></a></h4>
                
                <!-- Add to Cart -->
                <?= open_form() ?>
                    <p>
                        <span class="product_price"><?= format_currency($product->get_discounted_price()) ?></span>
                        <a href="#" 
                            class="tiny button radius" 
                            onclick="return $(this).getForm().sendRequest('shop:on_addToCart', { 
                                onSuccess: function(){ custom_alert('The product has been added to the cart'); }, 
                                update: {'mini_cart': 'shop:mini_cart'}
                            })">
                            Add to cart
                        </a>
                    </p>
                    <input type="hidden" name="product_id" value="<?= $product->id ?>"/>
                    <input type="hidden" name="no_flash" value="1"/>
                </form>

                <!-- Product Short Description -->
                <p><?= h($product->short_description) ?></p>

                <!-- Rating -->
                <? if ($product->rating_all):  ?>
                    <p class="star-rating">
                        <i class="rating-<?= $product->rating_all*10 ?>"></i> 
                        <span> based on <?= $product->rating_all_review_num ?> reviews</span>
                    </p>
                <? endif ?>

                <!-- Learn more -->
                <p><a href="<?= $product->page_url('store/product') ?>" class="link_button round">
                    Learn more about <?= h($product->name) ?>
                </a></p>
            </li>
        <? endforeach  ?>
    </ul>
</div>

<? else:  ?>

    <div class="alert-box">
        The product group <strong><?=$group_code?></strong> was not found. Please create this group on the Shop/Products/Product Groups page.
        <a href="" class="close">&times;</a>
    </div>

<? endif  ?>