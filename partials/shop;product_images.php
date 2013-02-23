<?
    $posted_options = Shop_ProductHelper::get_default_options($product);
    $images = $product->om('images', $posted_options);
?>
<? if ($images->count): ?>

    <ul class="block-grid two-up" data-clearing>
        <? foreach ($product->images as $key=>$image): ?>
            <li><a rel="product_image" href="<?= $image->getThumbnailPath('auto', 'auto') ?>"><img src="<?= $image->getThumbnailPath(500, 'auto') ?>" data-caption="<?= h($image->title) ?>" alt="" /></a></li>
        <? endforeach ?>
    </ul>  

    <? /* Old school image slider

    <div id="product_images" class="product_images">
        <? foreach ($product->images as $key=>$image): ?>
            <!-- <a title="<?= h($image->title) ?>" class="gallery_image" rel="product_image" href="<?= $image->getThumbnailPath(500, 'auto') ?>"><img src="<?= $image->getThumbnailPath('auto', 'auto') ?>" alt="" /></a> -->
            <img src="<?= $image->getThumbnailPath(500, 'auto') ?>" alt="" data-image-id="<?=$image->id?>" data-image-thumb="<?= $image->getThumbnailPath('auto', 'auto') ?>" />
        <? endforeach ?>
    </div>

    */ ?>

<? endif ?>