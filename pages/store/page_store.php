<div id="page_store">
    <div class="page_header">
        <h3><?= h($this->page->title) ?></h3>
    </div>    
    <ul class="no-bullet">
        <?
            $root_categories = Shop_Category::create()->where('category_id is null')->order('front_end_sort_order')->find_all();
        ?>
        <? foreach ($root_categories as $root_category): ?>
            <?
                $subcategories = $root_category->list_children('front_end_sort_order');
            ?>
            <li>
                <div class="row">
                    <div class="two columns">
                        <a href="<?= $root_category->page_url('store/category') ?>"><img src="<?= $root_category->image_url(0, 'auto', 200) ?>"/></a>
                    </div>
                    <div class="ten columns">
                        <h4><a href="<?= $root_category->page_url('store/category') ?>"><?= h($root_category->name) ?></a></h4>
                        <? foreach ($subcategories as $subcategory):  ?>
                            <a class="link_button round" href="<?= $subcategory->page_url('store/category') ?>"><?= h($subcategory->name) ?></a>
                        <? endforeach ?>
                    </div>
                </div>
            </li>
        <? endforeach ?>
    </ul>
</div>