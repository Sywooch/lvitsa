<?php
use yii\helpers\Html;
?>

<div class="row">

<div class="col-lg-10 col-lg-offset-1">
<h2>Состояние корзины</h2>
<table id="modal-order" class="table table-hover">
    <tbody>
    <tr>
        <th>№</th>
        <th>Наименование</th>
        <th>Количество</th>
        <th>Цена</th>
        <th colspan="2">Сумма</th>
    </tr>
    <?php $number = 1; ?>
    <?php foreach ($positionsInCart as $key => $value): ?>
        <tr>
            <td><?= $number ?></td>
            <td><?= $value->name ?></td>
            <td><?= $value->getQuantity() ?></td>
            <td><?= $value->price ?></td>
            <td><?= $value->getQuantity() * $value->price ?></td>
<!--            <td>-->
<!--               <span class="glyphicon glyphicon-remove-circle product-delete" data-id="--><?//= $value->id?><!--"></span>-->
<!--            </td>-->
            <?php $totalCartCost += $value->getQuantity() * $value->price; ?>
        </tr>
        <?php ++$number; ?>
    <?php endforeach; ?>
    <tr class="order-cost">
        <td colspan="3"></td>
        <td>Сумма</td>
        <td colspan="2"><?= $totalCartCost ?></td>
    </tr>
    </tbody>
</table>

    <div class="row cart-buttons">
        <div class="col-lg-8">
            <?= Html::a('Продолжить покупки','#',['id'=>'back-to-shop'])?>
        </div>
        <div class="col-lg-4">
            <?= Html::a('Оформить заказ','/cart/index',['class'=>'btn btn-success'])?>
        </div>
    </div>



    </div>
</div>

<script>
    $("#back-to-shop").click(function(e){
        e.preventDefault();
        $("#myModal").modal('hide');
    });
</script>
