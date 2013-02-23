<div class="row">
    <? if (!Phpr::$request->getField('register_success')): ?>
        <div class="four columns">
            <div class="separator right">
                <h3>Login</h3>
                <p>Sign in here or use the Register form if you don't have an account.</p>

                <? $this->render_partial('account:login_form', array('redirect'=>root_url('/'))) ?>
            </div>
        </div>
        <div class="six columns end">
            <h3>Register</h3>
            <p>Please specify your name and email address and click Submit. We will send you confirmation email with your password.</p>

            <?= open_form(array('onsubmit'=>"return $(this).sendRequest('shop:on_signup')", 'class'=>'nice')) ?>
                <?= flash_message() ?>
                <div class="row">
                    <div class="six columns">
                        <label for="first_name">First Name</label>
                        <input name="first_name" id="first_name" type="text" class="input-text expand"/>
                    </div>
                    <div class="six columns">
                        <label for="last_name">Last Name</label>
                        <input name="last_name" id="last_name" type="text" class="input-text expand"/>
                    </div>
                </div>
                <div class="row">
                    <div class="twelve columns">
                        <label for="signup_email">Email</label>
                        <input id="signup_email" type="text" name="email" value="<?= h(post('email')) ?>" class="input-text expand"/>
                    </div>
                </div>
                <p><input type="submit" class="nice button radius" value="Register"/></p>
                <input type="hidden" name="redirect" value="<?= root_url('/account/login').'?register_success=1' ?>"/>
            </form>
        </div>
    <? else: ?>
        <h3>Thank you!</h3>
        <p>We just sent you a confirmation email message with your password. Please <a href="<?= root_url('/account/login') ?>">sign in</a> using your email and password.</p>
        <p><a class="link_button round" href="<?= root_url('account/login')?>">Login</a></p>
    <? endif ?>
</div>
