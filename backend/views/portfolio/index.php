<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <h1>My works</h1>

    <p>
        <?= Html::a('Create portfolio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'title',
            'description',
            'image',
            'url',
            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{delete}'
            ],
        ],

    ]); ?>
</div>
