<?php
/**
 * Created by PhpStorm.
 * User: dima
 * Date: 27.12.16
 * Time: 16:24
 */

namespace console\controllers;


use yii\console\Controller;
use common\models\Portfolio;
use Yii;

class CronController extends Controller {

    public function actionPush() {
        $model = new Portfolio();
        $model->addDemo();
    }

} 