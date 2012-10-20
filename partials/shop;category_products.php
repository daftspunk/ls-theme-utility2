<?
    /*
     * Process product list sorting and view mode updates.
     *
     * Save the category product sorting mode if it has been changed.
     */
    if (post('sorting'))
        Cms_VisitorPreferences::set('cat_sorting_'.$category->id, post('sorting'));

    /*
     * Save the view mode if it has been changed.
     */
    if (post('view_mode'))
        Cms_VisitorPreferences::set('cat_view_'.$category->id, post('view_mode'));

    /*
     * Load the product sorting and view modes.
     */
    $sorting_preferences = Cms_VisitorPreferences::get('cat_sorting_'.$category->id, 'name');
    $view_mode = Cms_VisitorPreferences::get('cat_view_'.$category->id, 'list');

    $sort_options = array('name'=>'Name', 'price'=>'Price');
    $view_mode_options = array('list'=>'List', 'table'=>'Table');
?>
<div class="category_products">
    <?= open_form() ?>
        <? 
            $products = $category->list_products(array('sorting'=>array($sorting_preferences)));
            $pagination = $products->paginate($this->request_param(1, 0)-1, 6);
        ?>
            
        <div class="separator bottom">
            <? $this->render_partial('shop:product_list', array('products'=>$products,  'view_mode'=>$view_mode)) ?>
        </div>

        <div class="row">
            <div class="six columns mobile-two">

                <!-- Pagination -->
                <? $this->render_partial('site:pagination', array('pagination'=>$pagination, 'base_url'=>$category->page_url('store/category'))) ?>

            </div>
            <div class="six columns mobile-two">

                <div class="row">

                    <!-- View mode -->
                    <div class="six columns hide-for-small">
                        <dl class="sub-nav">
                            <dt>View mode</dt>
                            <? foreach ($view_mode_options as $option_id=>$option_name): ?>
                                <?
                                    $is_current = $view_mode == $option_id;
                                    $onclick = ($is_current) 
                                        ? "return false" 
                                        : "return $(this).getForm().sendRequest('on_action', {extraFields: {view_mode: '".$option_id."'}, update: {'category_products': 'shop:category_products'}})";
                                ?>
                                <dd class="<?= $is_current ? 'active' : null ?>">
                                    <a href="#" onclick="<?=$onclick?>"><?= $option_name ?></a>
                                </dd>
                            <? endforeach ?>
                        </dl>
                    </div>

                    <!-- Sorting -->
                    <div class="six columns">
                        <dl class="sub-nav">
                            <dt>Sorting</dt>

                            <? foreach ($sort_options as $option_id=>$option_name): ?>
                                <?
                                    $is_current = $sorting_preferences == $option_id;
                                    $onclick = ($is_current)
                                        ? "return false"
                                        : "return $(this).getForm().sendRequest('on_action', {extraFields: {sorting: '".$option_id."'}, update: {'category_products': 'shop:category_products'}})";
                                ?>
                                <dd class="<?= $is_current ? 'active' : null  ?>">
                                    <a href="#" onclick="<?=$onclick?>"><?= $option_name ?></a>
                                </dd>
                            <? endforeach ?>
                        </dl>
                    </div>

                </div>

            </div>
        </div>

    </form>
</div>