<?php

use yii\widgets\ActiveForm;
use app\models\FillForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model FillForm */
/* @var $form ActiveForm */

$this->title = 'TestTask';
?>
<div class="site-index">

    <div class="body-content">

        <h2>Заливка</h2>
        <?php $form = ActiveForm::begin() ?>

            <?= $form->field($model, 'id_tank')->textInput(['disabled' => true]) ?>
            <?= $form->field($model, 'employee')->textInput(['placeholder' => 'Имя сотрудника']) ?>
            <?= $form->field($model, 'liters')->input('number', ['max' => '300', 'min' => '1', 'value' => '1']) ?>

            <div class="form-group">
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-info']) ?>
            </div>

        <?php ActiveForm::end() ?>

        <hr/>

        <h2>Цистерны</h2>

        <div class="tank-items">
            <div class="tank-item">
                <label class="h5" for="tank-1">Танк: 1</label>
                <div id="tank-1" class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="300" aria-valuemin="0" aria-valuemax="300">100%</div>
                </div>
            </div>
            <div class="tank-item">
                <label class="h5" for="tank-2">Танк: 2</label>
                <div id="tank-2" class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="225" aria-valuemin="0" aria-valuemax="300">75%</div>
                </div>
            </div>
            <div class="tank-item">
                <label class="h5" for="tank-3">Танк: 3</label>
                <div id="tank-3" class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="225" aria-valuemin="0" aria-valuemax="300">75%</div>
                </div>
            </div>
            <div class="tank-item">
                <label class="h5" for="tank-4">Танк: 4</label>
                <div id="tank-4" class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="150" aria-valuemin="0" aria-valuemax="300">50%</div>
                </div>
            </div>
            <div class="tank-item">
                <label class="h5" for="tank-5">Танк: 5</label>
                <div id="tank-5" class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 10%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="300">10%</div>
                </div>
            </div>
        </div>

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
