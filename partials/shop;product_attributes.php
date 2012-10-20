<?
  if ($product->properties->count):
?>
  <table class="product_attributes">
    <? foreach ($product->properties as $attribute): ?>
    <tr>
      <th><?= h($attribute->name) ?>:</th>
      <td><?= h($attribute->value) ?></td>
    </tr>
    <? endforeach ?>
  </table>
<? endif ?>