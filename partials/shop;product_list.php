<?
    if (isset($paginate) && $paginate)
    {
        $page_index = isset($page_index) ? $page_index-1 : 0;
        $records_per_page = isset($records_per_page) ? $records_per_page : 3;
        $pagination = $products->paginate($page_index, $records_per_page);
    }
    else
        $pagination = null;

    $view_mode = isset($view_mode) ? $view_mode : 'list';
?>
<div class="product_list">
    <ul class="block-grid <?=($view_mode=='table')?'two-up':'one-up'?> mobile-one-up">
    <?
        $products = $products instanceof Db_ActiveRecord ? $products->find_all() : $products;
        foreach ($products as $index=>$product):
            $is_discounted = $product->is_discounted();
            $image_url = $product->image_url(0, 150, 'auto');
    ?>
        <li>
            <div class="row">

                <!-- Product Image -->
                <div class="two columns product_image">
                    <? if ($image_url): ?>
                        <? if ($product->is_discounted()):  ?>
                            <span class="on_sale">On sale!</span>
                        <? endif ?>
                        <a href="<?= $product->page_url('store/product') ?>"><img src="<?= $image_url ?>" alt="<?= h($product->name) ?>"/></a>
                    <? endif  ?>
                </div>

                <!-- Product Description -->
                <div class="ten columns">
                    <h5><a href="<?= $product->page_url('store/product') ?>"><?= h($product->name) ?></a></h5>
                    <p><?= h($product->short_description) ?></p>
                    
                    <!-- Rating -->
                    <? if ($product->rating_all):  ?>
                        <p class="star-rating">
                            <i class="rating-<?= $product->rating_all*10 ?>"></i> 
                            <span> based on <?= $product->rating_all_review_num ?> reviews</span>
                        </p>
                    <? endif ?>
                    
                    <p><a href="<?= $product->page_url('store/product') ?>" class="link_button">Learn more about <?= h($product->name) ?></a></p>
                </div>
                
            </div>
        </li>
    <? endforeach ?>
    </ul>

    <? if ($pagination): ?>
        <div class="view_controls">
            <? $this->render_partial('site:pagination', array('pagination'=>$pagination, 'base_url'=>$pagination_base_url)); ?>
        </div>
    <? endif ?>
</div>
