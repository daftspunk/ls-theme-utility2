<? if (isset($review_posted)): ?>
  <p class="flash success">Your review has been successfully posted.</p>
<? else: ?>
  <p id="review_trigger"><a href="#" class="link_button" onclick="$('#review_trigger').addClass('hidden'); $('#review_form').removeClass('hidden'); $('#review_title').focus(); init_rating_selector(); return false">Write a review</a></p>

  <div id="review_form" class="hidden">
    <h5 class="bottom_border">Write a review</h5>
    
    <?= open_form(array('onsubmit'=>"return $(this).sendRequest('shop:on_addProductReview', {onAfterUpdate: init_effects, extraFields: {no_flash: true}, update:{'product_page': 'shop:product_partial'}})")) ?>
      <ul class="form clearfix">
        <li class="field">
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
        </li>
        <li class="field text">
          <label for="review_title">Title</label>
          <input autocomplete="off" id="review_title" name="review_title" type="text" class="text"/>
        </li>
        <? if (!$this->customer): ?>
          <li class="field text left">
            <label for="review_author_name">Your name</label>
            <input autocomplete="off" id="review_author_name" name="review_author_name" type="text" class="text"/>
          </li>
          <li class="field text right">
            <label for="review_author_email">Email</label>
            <input autocomplete="off" id="review_author_email" type="text" class="text" name="review_author_email"/>
          </li>
        <? endif ?>
        <li class="field text">
          <label for="review_text">Review</label>
          <textarea autocomplete="off" rows="5" id="review_text" name="review_text"></textarea>
        </li>
      </ul>
      <p class="clearfix">
        <input type="submit" class="button_control" value="Submit"/>
      </p>
    </form>
  </div>
<? endif  ?>