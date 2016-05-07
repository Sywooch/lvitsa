<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\Alert;
use app\components\FeatureProductsWidget\FeatureProducts;

$this->title = 'Корзина покупателя';
$this->registerMetaTag(['name' => 'description', 'content' => 'Корзина покупателя']);

?>
<?php $this->params['breadcrumbs'][] = 'корзина'; ?>
<div class="col-md-3 hidden-sm hidden-xs">
    <div class="row popular-products">
        <h3 class="col-sm-12">Рекоммендуем</h3>
        <?= FeatureProducts::widget(['feature'=>'recommend']) ?>
    </div>
</div>


<div class="col-lg-9 col-sm-12">
    <h3 class="cart-title">Корзина покупателя</h3>

    <?php if (empty ($positionsInCart) && !empty(Yii::$app->session->getFlash('success'))): ?>
        <?= \common\widgets\Alert::widget() ?>
    <?php elseif (empty ($positionsInCart)): ?>
        <p></p>
        <h3>Корзина пуста</h3>
    <?php else: ?>
        <table id="order" class="table table-hover">
            <tbody>
            <tr>
                <th class='hidden-xs'>№</th>
                <th>Наименование</th>
                <th class='hidden-xs'>Размеры</th>
                <th>Кол-во</th>
                <th class='hidden-xs'>Цена</th>
                <th>Сумма</th>
                <th></th>
            </tr>
            <?php $number = 1; ?>
            <?php foreach ($positionsInCart as $key => $value): ?>
                <tr>
                    <td class='hidden-xs'><?= $number ?></td>
                    <td><?= $value->name ?></td>
                    <td class='hidden-xs'><?php //for($i=0;$i<count($value->size);$i++) {
                        echo implode(',', $value->size);
                        //} ?>
                    <td><?= $value->getQuantity() ?></td>
                    <td class='hidden-xs'><?= round($value->price * 26.5, -1) ?></td>
                    <td><?= $value->getQuantity() * (round($value->price * 26.5, -1)) ?></td>
                    <td>
                        <a href="/cart/delete?id=<?= $value->id ?>"><span
                                class="glyphicon glyphicon-remove-circle product-delete"></span></a>
                    </td>
                    <a href=""></a>
                    <?php $totalCartCost += $value->getQuantity() * (round($value->price * 26.5, -1)); ?>
                </tr>
                <?php ++$number; ?>
            <?php endforeach; ?>
            <tr class="order-cost">
                <td colspan="4" class='hidden-xs'></td>
                <td class='hidden-xs'>Общая сумма</td>
                <td class='hidden-xs'><?= $totalCartCost ?>грн</td>
            </tr>
            <tr class="visible-xs order-cost">
                <td colspan='2'>Общая сумма</td>
                <td><?= $totalCartCost ?></td>
            </tr>
            </tbody>
        </table>


        <div class="row confirm-order">
            <div class="cart-form-head">ОФОРМЛЕНИЕ ЗАКАЗА</div>
            <div class="col-lg-8 col-lg-offset-2 cart-form">
                <?php $form = ActiveForm::begin(); ?>
                <?= $form->field($order, 'name') ?>
                <?= $form->field($order, 'phone') ?>
                <?= $form->field($order, 'email') ?>
                <?= $form->field($order, 'comment')->textarea() ?>
                <div class="form-group">
                    <?= Html::submitButton('Подтвердить', ['class' => 'btn btn-success btn-lg col-lg-offset-4', 'name' => 'signup-button']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    <?php endif; ?>
</div>





