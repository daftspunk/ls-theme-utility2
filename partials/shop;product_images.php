<?
    $posted_options = Shop_ProductHelper::get_default_options($product);
    $images = $product->om('images', $posted_options);
?>
<? if ($images->count): ?>
    <div id="product_images" class="product_images">
        <? foreach ($product->images as $key=>$image): ?>
            <!-- <a title="<?= h($image->title) ?>" class="gallery_image" rel="product_image" href="<?= $image->getThumbnailPath(500, 'auto') ?>"><img src="<?= $image->getThumbnailPath('auto', 'auto') ?>" alt="" /></a> -->
            <img src="<?= $image->getThumbnailPath(500, 'auto') ?>" alt="" data-image-id="<?=$image->id?>" data-thumb-image="<?= $image->getThumbnailPath('auto', 'auto') ?>" />
        <? endforeach ?>
    </div>
    <script>
        require(['behaviors/portfolio'], function(p){ p($('#product_images')); });
    </script>
<? endif ?>