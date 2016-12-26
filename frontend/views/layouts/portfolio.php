<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
//use frontend\assets\CssAsset;
use frontend\widgets\Alert;

/* @var $this \yii\web\View */
/* @var $content string */
AppAsset::register($this);
//CssAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">
    <?php
                NavBar::begin([
                    'brandLabel' => 'UIBrushspan',
                    'brandUrl' => Yii::$app->homeUrl,
                    'options' => [
                        'class' => 'navbar-inverse navbar-fixed-top navbar-logo',
                    ],
                ]);
                $menuItems = [
                    ['label' => 'Home', 'url' => ['/#hero']],
                    ['label' => 'About us', 'url' => ['/#about']],
                    ['label' => 'Portfolio', 'url' => ['/#portfolio']],
                    ['label' => 'Services', 'url' => ['/#services']],
                    ['label' => 'Contuct Us', 'url' => ['/#contact']],
                ];
                echo Nav::widget([
                    'options' => ['class' => 'navbar-nav navbar-right navigation menu'],
                    'items' => $menuItems,
                ]);
                NavBar::end();
    ?>

        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ])  ?>
        <?= $content ?>

</div>

<footer class="footer">
    <div class="wrapper">
        <span class="copyright">Copyright © 2014 UIBrush.</span>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
