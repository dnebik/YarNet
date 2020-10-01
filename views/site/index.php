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

error_log('History: ' . print_r($fillHistory, true));
?>
<div class="site-index">

    <div class="body-content">

<!--    [ФОРМА ЗАЛИВКИ]    -->
        <h2>Заливка</h2>
        <?php $form = ActiveForm::begin() ?>

            <?= $form->field($model, 'id_tank')->textInput(['disabled' => true]) ?>
            <?= $form->field($model, 'employee')->textInput(['placeholder' => 'Имя сотрудника']) ?>
            <?= $form->field($model, 'liters')->input('number', ['max' => '300', 'min' => '1']) ?>

            <div class="form-group">
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-info', 'id' => 'success', 'disabled' => true ]) ?>
            </div>

        <?php ActiveForm::end() ?>
<!--    [ФОРМА ЗАЛИВКИ]    -->

        <hr/>

<!--    [ОТОБРАЖАЕМ СТАТУС ЦИСТЕРН]    -->
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
<!--    [ОТОБРАЖАЕМ СТАТУС ЦИСТЕРН]    -->


        <hr/>

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
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                <td>@fat</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
                <td>@twitter</td>
            </tr>
            </tbody>
        </table>

    </div>


</div>
