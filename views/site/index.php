<?php

use yii\widgets\ActiveForm;
use app\models\FillForm;
use yii\helpers\Html;
use app\models\Tank;
use app\models\FillHistory;

/* @var $this yii\web\View */
/* @var $model FillForm */
/* @var $form ActiveForm */
/* @var $tanks Tank; */
/* @var $fillHistory FillHistory; */

$this->title = 'TestTask';
?>
<div class="site-index">

    <div class="body-content">

<!--    [ФОРМА ЗАЛИВКИ]    -->
        <h2>Заливка</h2>
        <?php $form = ActiveForm::begin() ?>

            <?= $form->field($model, 'id_tank')->textInput(['readonly' => true]) ?>
            <?= $form->field($model, 'employee')->textInput(['placeholder' => 'Имя сотрудника']) ?>
            <?= $form->field($model, 'liters')->input('number', ['max' => '300', 'min' => '1']) ?>

            <div class="form-group">
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-info', 'id' => 'success', 'disabled' => true ]) ?>
            </div>

        <?php ActiveForm::end() ?>
<!--    [ФОРМА ЗАЛИВКИ]    -->

        <hr/>

<!--    [СТАТУС ЦИСТЕРН]    -->
        <h2>Цистерны</h2>
        <div class="tank-items">
            <? foreach ($tanks as $tank) { ?>
                <div class="tank-item">
                    <label class="h5" for="tank-<?=$tank->id?>">Цистерна: <?=$tank->id?></label>
                    <div id="tank-<?=$tank->id?>" class="progress">
                        <div
                                class="progress-bar"
                                role="progressbar"
                                style="width: <?= ($tank->fullness * 100) / $tank->quantity?>%;"
                                aria-valuenow="<?=$tank->fullness?>"
                                aria-valuemin="0"
                                aria-valuemax="<?=$tank->quantity?>"
                        ><?=$tank->fullness."/".$tank->quantity?></div>
                    </div>
                </div>
            <? } ?>
        </div>
<!--    [СТАТУС ЦИСТЕРН]    -->

        <hr/>

<!--    [ИСТОРИЯ ОПЕРАЦИЙ]    -->
        <h2>История операций</h2>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Сотрудник</th>
                <th scope="col">Цистерна</th>
                <th scope="col">Литры</th>
                <th scope="col">Дата</th>
            </tr>
            </thead>
            <tbody>
            <? $i = 1; ?>
            <? foreach ($fillHistory as $item) { ?>
                <tr>
                    <th scope="row"><?=$i++?></th>
                    <td><?=$item->employee?></td>
                    <td><?=$item->tank?></td>
                    <td><?=$item->liters?></td>
                    <td><?=$item->date?></td>
                </tr>
            <? } ?>
            </tbody>
        </table>
<!--    [ИСТОРИЯ ОПЕРАЦИЙ]    -->
    </div>
</div>
