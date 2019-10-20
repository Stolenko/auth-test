<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\forms\RegisterForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\User;
use kartik\date\DatePicker;
use borales\extensions\phoneInput\PhoneInput;

$this->title = 'Register';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login col-md-8">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
    ]); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'firstName')->textInput() ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'lastName')->textInput() ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'gender')->radioList(User::GENDERS) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'birthDay')->widget(DatePicker::class, [
                'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-m-d'
                ],
            ]) ?>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'phone')->widget(PhoneInput::class, [
                'jsOptions' => [
                    'allowExtensions' => true,
                    'preferredCountries' => ['ru', 'ua', 'kz'],
                ]
            ]); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'email')->textInput() ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'ua')->checkbox() ?>
        </div>
    </div>

    <div class="form-group">
        <div>
            <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>
