<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
/** @var yii\web\View $this */
/** @var backend\models\Departments $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="departments-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model,'branches_branch_id')->dropDownList(
        ArrayHelper::map(\app\models\branches::find()->asArray()->all(),'id','branch_name'),
        ['prompt'=>'Select branch']
    )?>

    <?= $form->field($model, 'department_name')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model,'companies_company_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\Companies::find()->asArray()->all(),'id','company_name'),
        ['prompt'=>'Select company']
    )?>

    <?= $form->field($model, 'department_status')->dropDownList([ 'active' => 'Active', 'inactive' => 'Inactive', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
