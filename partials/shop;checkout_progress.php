<?
    $steps = array(
        'billing_info' => 'Billing Information',
        'shipping_info' => 'Shipping Information',
        'shipping_method' => 'Shipping Method',
        'review' => 'Review and Pay'
    );
    
    if (!$shipping_required)
        unset($steps['shipping_method']);
?>

<ol class="progress-tracker four-up">
    <?
        $current_found = false;
        $index = 0;
    ?>
    <? foreach ($steps as $step=>$name): ?>
        <?
            $is_current = $checkout_step == $step;
            $current_found = $current_found || $is_current;
            $index++;
        ?>
        <li class="<?=(!$current_found || $is_current)?'active':''?>">
            <em><?=$index?></em>
            <span>
                <? if ($current_found): ?>
                    <?= $name ?>
                <? else: ?>
                    <a href="#" 
                        onclick="return $(this).getForm().sendRequest('on_action', {
                            update:{'p_checkout_partial': 'shop:checkout_partial'}, 
                            onAfterUpdate: refresh_custom_forms, 
                            extraFields: {'move_to': '<?= $step ?>'}})">
                        <?= h($name) ?>
                    </a>
                <? endif ?>
            </span>
        </li>
    <? endforeach ?>
</ol>
