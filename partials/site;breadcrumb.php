<? if (isset($category) && $category instanceof Shop_Category):
    $parent_categories = $category->get_parents(true);
?>
    <ul class="breadcrumbs">
        <li><a href="<?= root_url('store') ?>">Store</a></li>
        <? foreach ($parent_categories as $parent_category): ?>
            <li class="<?= $parent_category->id == $category->id ? 'last' : null ?>">
                <? if ($parent_category->id != $category->id): ?><a href="<?= $parent_category->page_url('store/category') ?>"><? else: ?><span><? endif ?>
                <?= h($parent_category->name) ?>
                <? if ($parent_category->id != $category->id): ?></a><? else: ?></span><? endif ?>
            </li>
        <? endforeach ?>
    </ul>
<? elseif (isset($category) && $category instanceof Blog_Category): ?>
    <ul class="breadcrumbs">
        <li><a href="<?= root_url('News') ?>">News</a></li>
        <li class="current"><span><?= h($category->name) ?></span></li>
    </ul>
<? elseif (isset($product) && $product instanceof Shop_Product):
    $product_categories = $product->category_list->objectArray;

    if (!function_exists('sort_product_categories')) 
    {
        function sort_product_categories($a, $b, $c='front_end_sort_order') { if ($a->$c == $b->$c) return 0; return ($a->$c < $b->$c) ? 1 : -1; }
    }

    usort ($product_categories, 'sort_product_categories');
    $parent_categories = $product_categories[0]->get_parents(true);
?>
    <ul class="breadcrumbs">
        <li><a href="<?= root_url('store') ?>">Store</a></li>
        <? foreach ($parent_categories as $parent_category): ?>
            <li>
                <a href="<?= $parent_category->page_url('store/category') ?>"><?= h($parent_category->name) ?></a>
            </li>
        <? endforeach ?>
        <li class="current"><span><?= h($product->name) ?></span></li>
    </ul>
<? endif ?>