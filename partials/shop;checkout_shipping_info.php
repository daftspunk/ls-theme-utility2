<h3>Shipping Information</h3>
<p class="lead">Please enter your shipping name and address</p>

<p><a href="javascript:;" class="link_button" 
    onclick="return $(this).getForm().sendRequest('shop:on_copyBillingInfo', {update:{'p_checkout_partial': 'shop:checkout_partial'}})">
    <i class="icon-copy"></i> Copy billing information</a>
<p>

<div class="row">
    <div class="six columns">
        <label for="first_name">First Name</label>
        <input autocomplete="off" id="first_name" name="first_name" type="text" class="text" value="<?= h($shipping_info->first_name) ?>"/>
    </div>
    <div class="six columns">
        <label for="last_name">Last Name</label>
        <input autocomplete="off" id="last_name" name="last_name" type="text" class="text" value="<?= h($shipping_info->last_name) ?>"/>
    </div>
</div>
        
<div class="row">
    <div class="six columns">
        <label for="company">Company</label>
        <input autocomplete="off" id="company" type="text" value="<?= h($shipping_info->company) ?>" class="text" name="company"/>
    </div>
    <div class="six columns">
        <label for="phone">Phone</label>
        <input autocomplete="off" id="phone" type="text" class="text" value="<?= h($shipping_info->phone) ?>" name="phone"/>
    </div>
</div>

<label for="street_address">Street Address</label>
<textarea rows="2" id="street_address" name="street_address"><?= h($shipping_info->street_address) ?></textarea>

<div class="row">
    <div class="six columns">
        <label for="city">City</label>
        <input autocomplete="off" id="city" type="text" class="text" name="city" value="<?= h($shipping_info->city) ?>"/>
    </div>
    <div class="six columns">
        <label for="zip">Zip/Postal Code</label>
        <input autocomplete="off" id="zip" type="text" class="text" name="zip" value="<?= h($shipping_info->zip) ?>"/>
    </div>
</div>


 
<div class="row">
    <div class="six columns">
        <label for="country">Country</label>
        <select autocomplete="off" id="country" name="country" onchange="return $('#country').getForm().sendRequest('shop:on_updateStateList', {
                extraFields: {'country': $('#country').val(), 'control_name': 'state', 'control_id': 'state', 'current_state': '<?= $shipping_info->state ?>'},
                update: {'shipping_states': 'shop:state_selector'}
            })">
            <? foreach ($countries as $country): ?>
            <option <?= option_state($shipping_info->country, $country->id) ?> value="<?= h($country->id) ?>"><?= h($country->name) ?></option>
            <? endforeach ?>
        </select>
    </div>
    <div class="six columns">
        <label for="state">State</label>
        <div id="shipping_states">
            <?= $this->render_partial('shop:state_selector', array('states'=>$states, 'control_id'=>'state', 'control_name'=>'state', 'current_state'=>$shipping_info->state)) ?>
        </div>
    </div>
</div>

<input type="hidden" name="checkout_step" value="<?= $checkout_step ?>"/>
<hr />
<p class="align_right">
    <input type="submit" value="Next" class="button radius" />
</p>