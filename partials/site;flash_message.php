<? if (strlen($message)): ?>
	<div class="alert-box success">
	    <?= h($message) ?>
	    <a href="javascript:;" class="close">&times;</a>
	</div>
<? endif ?>