<? if ($item_product && $product): ?>  
    <div class="grid_8 alpha product_parameters">
        <div class="grid_1 alpha">
            <?
                $selected_options = Shop_BundleHelper::get_selected_options($item, $item_product);
            ?>    
        
            <? if ($product->om('images', $selected_options)->count): ?>
                <a title="<?= h($product->om('images', $selected_options)->first->title) ?>" class="gallery_image" rel="product_image" href="<?= $product->om('images', $selected_options)->first->getThumbnailPath(500, 'auto') ?>"><img src="<?= $product->om('images', $selected_options)->first->getThumbnailPath(50, 'auto') ?>" alt="" /></a>
            <? endif ?>
        </div>
        <div class="grid_7 omega">  
            <?
                if ($product && ($product->grouped_products->count || $product->options->count)):
            ?>
                <table class="product_attributes">
                    <? 
                        $this->render_partial('shop:bundle_product_options', array('product'=>$product, 'item'=>$item, 'item_product'=>$item_product));
                    ?>
                </table>
            <? endif ?>

            <? 
                $this->render_partial('shop:bundle_product_extras', array('product'=>$product, 'item'=>$item, 'item_product'=>$item_product));
                $this->render_partial('shop:bundle_product_quantity', array('product'=>$product, 'item'=>$item, 'item_product'=>$item_product));
            ?>
        </div>
    </div>
<? endif ?>​