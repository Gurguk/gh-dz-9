<?php
use yii\helpers\Html;

$this->title = 'User info';
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Personal page</p>
    <p><?php echo $user_information['firstname']?></p>
    <p><?php echo $user_information['lastname']?></p>
</div>
