<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
//use frontend\assets\CssAsset;
use common\components\languageSwitcher;

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
                    'brandLabel' => 'UIBrush',
                    'brandUrl' => Yii::$app->homeUrl,
                    'options' => [
                        'class' => 'navbar-inverse navbar-fixed-top navbar-logo',
                    ],
                ]);
                $logout = '';
                $login = '';
                $signup = '';
                $user = '';
                if (!\Yii::$app->user->isGuest) {
                    $logout = ['label' => \Yii::t('text','Logout'), 'url' => ['/site/logout']];
                    $user = ['label' => \Yii::t('text','User'), 'url' => ['/site/usersection']];
                }
                else
                {
                    $login = ['label' => \Yii::t('text','Login'), 'url' => ['/site/login']];
                    $signup = ['label' => \Yii::t('text','Sign up'), 'url' => ['/site/signup']];
                }
                $menuItems = [
                    ['label' => \Yii::t('text','Home'), 'url' => ['/#hero']],
                    ['label' => \Yii::t('text','About us'), 'url' => ['/#about']],
                    ['label' => \Yii::t('text','Portfolio'), 'url' => ['/#portfolio']],
//                    ['label' => \Yii::t('text','Services'), 'url' => ['/#services']],
                    $user, $login, $signup, $logout,
//                    ['label' => \Yii::t('text','Contuct Us'), 'url' => ['/#contact']],
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
        <div style="position: fixed; top: 8px; left: 10px; z-index: 9999;">
            <?= languageSwitcher::Widget() ?>
        </div>
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
