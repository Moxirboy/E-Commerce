<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Branches $model */
/** @var app\models\Branches $companies */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="branches-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model,'companies_company_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\Companies::find()->asArray()->all(),'id','company_name'),
        ['prompt'=>'Select company']
    )?>
    <?= $form->field($model, 'branch_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'branch_address')->textInput(['maxlength' => true]) ?>



    <?= $form->field($model, 'branch_status')->dropDownList([ 'active' => 'Active', 'inactive' => 'Inactive', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
