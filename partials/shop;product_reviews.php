<?
    // Use $product->list_all_reviews() to get a list of all reviews
    // and $product->list_reviews() to get a list of approved reviews
    //
    $reviews = $product->list_all_reviews();
?>
<? if (!$reviews->count): ?>
    <p>There are no reviews for this product.</p>
<? else: ?>

    <div class="review_list">
        <? foreach ($reviews as $review): ?>
            <blockquote>
                <h6>&ldquo;<?= h($review->title) ?>&rdquo;</h6>
                <? if ($review->rating): ?>
                    <p class="star-rating"><i class="rating-<?= $review->rating*10 ?>"></i></p>
                <? endif ?>
                <p class="content"><?= nl2br(h($review->review_text)) ?></p>
                <cite><?= h($review->author) ?> <small><?= $review->created_at->format('%x') ?></small></cite>
            </blockquote>
        <? endforeach ?>
    </div>

<? endif ?>