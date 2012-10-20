<?
    $posted_options = Shop_ProductHelper::get_default_options($product);
    $images = $product->om('images', $posted_options);
?>
<? if ($images->count): ?>
    <div id="product_images" class="product_images">
        <? foreach ($product->images as $key=>$image): ?>
            <a title="<?= h($image->title) ?>" class="gallery_image" rel="product_image" href="<?= $image->getThumbnailPath(500, 'auto') ?>"><img src="<?= $image->getThumbnailPath('auto', 'auto') ?>" alt="" /></a>
        <? endforeach ?>
    </div>
    <script>
        $(function(){ $('#product_images').orbit({timer:true, directionalNav:false, bullets:true}); })
    </script>
<? endif ?>