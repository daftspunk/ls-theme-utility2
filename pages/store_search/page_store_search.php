<div id="page_store_search">
    <div class="page_header">
        <h2><?= h($this->page->title) ?></h2>
    </div>
    <? if (strlen($query)): ?>
        <p class="lead">Products found: <?= $pagination->getRowCount() ?></p>

        <? $this->render_partial('shop:product_list', array('products'=>$products, 'paginate'=>false)) ?>

        <? if ($pagination->getRowCount()):  ?>
            <div id="p_site_pagination">
                <? $this->render_partial('site:pagination', array('pagination'=>$pagination, 'base_url'=>root_url('/store/search'), 'suffix'=>'?query='.urlencode($query).'&amp;records='.urlencode($records))) ?>
            </div>
        <? endif ?>
    <? else: ?>
        <p>Please enter a search query to the <strong>Find products</strong> field and hit Enter.</p>
    <? endif ?>
</div>