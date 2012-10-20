<? if ($item_product && $product): ?>  
    <div class="product_parameters">
        <div class="row">
            <div class="two columns">
                <?
                    $selected_options = Shop_BundleHelper::get_selected_options($item, $item_product);
                ?>    
                <? if ($product->om('images', $selected_options)->count): ?>
                    <a class="gallery_image" rel="product_image" 
                        title="<?= h($product->om('images', $selected_options)->first->title) ?>" 
                        href="<?= $product->om('images', $selected_options)->first->getThumbnailPath(500, 'auto') ?>">
                        <img src="<?= $product->om('images', $selected_options)->first->getThumbnailPath(100, 'auto') ?>" alt="" />
                    </a>
                <? endif ?>
            </div>
            <div class="nine columns end">  
                <? if ($product && ($product->grouped_products->count || $product->options->count)): ?>
                    <table class="bundle_product_options">
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
    </div>
<? endif ?>​