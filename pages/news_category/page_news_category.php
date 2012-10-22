<? if ($category): ?>
    <? foreach ($post_list as $post): ?>
        <h3><a href="<?= root_url('news/post/'.$post->url_title) ?>"><?= h($post->title) ?></a></h3>
        <p class="light">
            Published by <?= h($post->author_first_name.' '.substr($post->author_last_name, 0, 1).'.') ?>
            on <?= $post->published_date->format('%F') ?>.
            Comments: <?= $post->approved_comment_num ?>
        </p>
        <p><?= h($post->description) ?> <a href="<?= root_url('news/post/'.$post->url_title) ?>">Read more...</a></p>
    <? endforeach ?>
    
    <hr />
    <div id="p_site_pagination">
        <? $this->render_partial('site:pagination', array('pagination'=>$pagination, 'base_url'=>root_url('news/category/'.$category->url_name))); ?>
    </div>
<? else: ?>
    <p>Category not found.</p>
    <p><a class="link_button" href="<?= root_url('news')?>">Return to the News page</a></p>
<? endif ?>