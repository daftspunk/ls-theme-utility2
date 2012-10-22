<div class="row">
    <div class="three columns">
        <p>Foundation</p>
    </div>
    <div class="nine columns">
        <ul class="link-list float_right">
            <?
                foreach ($this->page->navigation_root_pages() as $page):
            ?>
                <li><a href="<?= root_url($page->url) ?>"><?= h($page->navigation_label()) ?></a></li>
            <? endforeach ?>
            <li><a class="facebook" href="http://facebook.com"><i class="icon-facebook"></i>Facebook</a></li>
            <li><a class="twitter" href="http://twitter.com"><i class="icon-twitter"></i>Twitter</a></li>
        </ul>
    </div>
</div>