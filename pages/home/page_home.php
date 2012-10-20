<div id="page_home">
    <div class="row">
        <div class="eight columns">
            <? content_block('intro', 'Intro Block') ?>
        </div>
        <div class="four columns">
            <h3>Featured products</h3>
            <p class="lead">Best products from our catalog</p>
            <? $this->render_partial('shop:custom_group', array('group_code'=>'featured_products')) ?>
            <a href="<?=root_url('store')?>" class="link_button round">See our full range of products</a>
        </div>
    </div>
</div>