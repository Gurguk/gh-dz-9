<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
//
///* @var $this yii\web\View */
///* @var $form yii\bootstrap\ActiveForm */
///* @var $model \frontend\models\ContactForm */
//
//$this->title = 'Contact';
//$this->params['breadcrumbs'][] = $this->title;

//?>


<section id="contact" class="contact">
    <div class="wrapper">
        <h2 class="section-title"><?php echo \Yii::t('text','Contuct Us')?></h2>
        <p class="section-description">Lorem ipsum dolor sit amet tetuer adipiscing elit,
            sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna.</p>
        <div class="content">
            <div class="contact-info">
                <h3 class="title">Contact Info</h3>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed nonummy nibh euismod
                    tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam,
                    quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea
                    commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit
                    esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero accumsan
                    et.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, </p>
                <div class="address">
                    <h4>Address</h4>
                    1931 Dawson Drive,
                    15th Avenue,
                    Little Rock, AR 72211
                </div>
            </div>
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                <ul>
                    <li style="margin: 0;">
                        <?= $form->field($model, 'name')->textInput(['placeholder' => 'Name', 'class' => 'contact_input'])->label(''); ?>
                        <?= $form->field($model, 'email')->textInput(['placeholder' => 'E-Mail', 'class' => 'contact_input'])->label('');  ?>
                    </li>
                    <li style="margin: 0;">
                        <?= $form->field($model, 'subject')->textInput(['placeholder' => 'Subject', 'class' => 'contact_input'])->label('') ?>
                    </li>
                    <li style="margin: 0;">
                        <?= $form->field($model, 'body')->textArea(['rows' => 6, 'placeholder' => 'Message', 'class' => 'contact_input'])->label('') ?>
                    </li>
                </ul>
            <?php ActiveForm::end(); ?>

        </div>
    </div>
</section>

