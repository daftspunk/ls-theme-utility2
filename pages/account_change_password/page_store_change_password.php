<div id="page_store_change_password">
    <div class="row">
        <div class="six columns end">
        <? if (!Phpr::$request->getField('success')): ?>
            <?= open_form(array('onsubmit'=>"return $(this).sendRequest('shop:on_changePassword')")) ?>

                <label for="old_password">Old password</label>
                <input id="old_password" type="password" name="old_password" class="text"/>

                <div class="row">
                    <div class="six columns">
                        <label for="password">New password</label>
                        <input id="password" type="password" name="password" class="text"/>
                    </div>
                        <label for="password_confirm">Password confirmation</label>
                        <input id="password_confirm" type="password" name="password_confirm" class="text"/>
                    </div>
                </div>

                <p><input type="submit" value="Submit" class="button radius"/></p>
                <input type="hidden" name="redirect" value="<?= root_url('/store/change-password').'?success=1' ?>"/>
            </form>    
        <? else: ?>
            <p>Your password has been successfully updated.</p>
            <p><a class="link_button round" href="<?= root_url('store')?>">Continue shopping</a></p>
        <? endif ?>
        </div>
    </div>
</div>