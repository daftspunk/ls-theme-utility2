<div class="page_header">
    <h2><?= h($this->page->title) ?></h2>
</div>
<? if ($category): ?>
    <?
        $subcategories = $category->list_children('front_end_sort_order');
        
        $has_subcategories = $subcategories->count;
        $has_products = $category->eval_num_of_products();
    ?>
    <? if ($category->short_description): ?>
        <p><?= h($category->short_description) ?></p>
    <? endif ?>

    <? if ($has_subcategories): ?>
        <h4>Shop by subcategory</h4>
        <ul class="link-list">
            <? foreach ($subcategories as $subcategory):  ?>
                <li><a class="link_button round" href="<?= $subcategory->page_url('store/category') ?>"><?= h($subcategory->name) ?></a></li>
            <? endforeach ?>
        </ul>
    <? endif ?>
    
    <? if ($has_products): ?>
        <? if ($has_subcategories): ?>
            <h4>Shop by product</h4>
        <? endif ?>
        <div id="category_products">
            <? $this->render_partial('shop:category_products') ?>
        </div>
    <? endif  ?>
    
    <? if (!$has_subcategories && !$has_products): ?>
        <p>This category does not contain any products or subcategories.</p>
        <p><a class="link_button round" href="<?= root_url('store')?>">Return to the Store</a></p>
    <? endif ?>
<? else: ?>
    <h3>Category not found</h3>
    <p>We are sorry, the specified category cannot be found.</p>    
    <p><a class="link_button round" href="<?= root_url('store')?>">Return to the Store</a></p>
<? endif ?>
