<? if (isset($review_posted)): ?>
    <div class="alert-box success">Your review has been successfully posted.</div>
<? else: ?>
    <p id="review_trigger"><a href="#" class="link_button round" onclick="$('#review_trigger').addClass('hidden'); $('#review_form').removeClass('hidden'); $('#review_title').focus(); Utility.page.init_rating_selector(); return false">Write a review</a></p>

    <div id="review_form" class="hidden">
        <h5>Write a review</h5>
        <?= open_form(array('onsubmit'=>"return $(this).sendRequest('shop:on_addProductReview', {onAfterUpdate: Utility.page.init_effects, extraFields: {no_flash: true}, update:{'product_page': 'shop:product_partial'}})")) ?>
                <div class="row">
                    <div class="eight columns">
                        <label for="review_title">Title</label>
                        <input autocomplete="off" id="review_title" name="review_title" type="text" class="text" />
                    </div>
                    <div class="four columns">
                        <label for="review_title">Rating</label>
                        <div class="rating-selector clearfix">
                            <select class="rating-stars" name="rating">
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                </div>
                <? if (!$this->customer): ?>
                <div class="row">
                    <div class="six columns">
                        <label for="review_author_name">Your name</label>
                        <input autocomplete="off" id="review_author_name" name="review_author_name" type="text" class="text" />
                    </div>
                    <div class="six columns">
                        <label for="review_author_email">Email</label>
                        <input autocomplete="off" id="review_author_email" type="text" class="text" name="review_author_email" />
                    </div>
                </div>
                <? endif ?>
                <label for="review_text">Review</label>
                <textarea autocomplete="off" rows="5" id="review_text" name="review_text"></textarea>
            <p class="clearfix">
                <input type="submit" class="button radius" value="Submit" />
            </p>
        </form>
    </div>
<? endif  ?>