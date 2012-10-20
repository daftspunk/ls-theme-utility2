<div id="page_pass_restore">
    <div class="page_header">
        <h3><?= h($this->page->title) ?></h3>
    </div>
    <? if (!Phpr::$request->getField('success')): ?>
        <div class="row">
            <div class="six columns end">
                <p>Please specify your email address and click Submit. We will send you a message with new password.</p>
                <?= open_form(array('onsubmit'=>"return $(this).sendRequest('shop:on_passwordRestore')")) ?>
                    <label for="email">Email</label>
                    <input id="email" type="text" name="email" value="<?= h(post('email')) ?>" class="text"/>
                    <p><input type="submit" class="button radius" value="Restore Password" /></p>
                    <input type="hidden" name="redirect" value="<?= root_url('/account/password-restore').'?success=1' ?>" />
                </form>    
            </div>
        </div>
    <? else: ?>
        <p>Thank you! We just sent you an email message with your new password.</p>
        <p><a class="link_button" href="<?= root_url('account/login')?>">Login</a></p>
    <? endif ?>
</div>