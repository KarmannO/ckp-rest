<?php
/**
 * Created by PhpStorm.
 * User: zenbu
 * Date: 02.06.2017
 * Time: 12:04
 */

    $this->title = 'Регистрация';
    $form = \yii\widgets\ActiveForm::begin([
        'id' => 'signup-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class='col - lg - 3'>{input}</div>\n<div class='col - lg - 8'>{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1-control-label'],
        ],
    ]);
?>

<h4>Личные данные</h4>
<?= $form->field($model, 'second_name')->textInput() ?>
<?= $form->field($model, 'first_name')->textInput() ?>
<?= $form->field($model, 'middle_name')->textInput() ?>
<hr>
<h4>Контактные данные</h4>
<?= $form->field($model, 'username') ?>
<?= $form->field($model, 'phone') ?>
<hr>
<?=
$form->field($model, 'organization')->dropDownList(
    \yii\helpers\ArrayHelper::map(
        \app\models\Organization::find()->all(),
        'id',
        'short_name'
    )
)
?>
<?=
$form->field($model, 'position')->dropDownList(
    \yii\helpers\ArrayHelper::map(
        \app\models\Position::find()->all(),
        'id',
        'title'
    )
)
?>
<?=
$form->field($model, 'degree')->dropDownList(
    \yii\helpers\ArrayHelper::map(
        \app\models\Degree::find()->all(),
        'id',
        'title'
    )
)
?>
<?=
$form->field($model, 'rank')->dropDownList(
    \yii\helpers\ArrayHelper::map(
        \app\models\Rank::find()->all(),
        'id',
        'title'
    )
)
?>

<?= \yii\helpers\Html::submitButton('Регистрация', ['class' => 'btn btn-primary']) ?>

<?php \yii\widgets\ActiveForm::end() ?>
