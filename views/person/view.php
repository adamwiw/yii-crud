<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Person */

$this->title = $model->firstname;
$this->params['breadcrumbs'][] = ['label' => 'People', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="person-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'firstname' => $model->firstname, 'lastname' => $model->lastname, 'dob' => $model->dob], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'firstname' => $model->firstname, 'lastname' => $model->lastname, 'dob' => $model->dob], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'firstname',
            'lastname',
            'dob',
            'zip',
        ],
    ]) ?>

</div>
