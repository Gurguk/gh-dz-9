<?php

use yii\db\Migration;
use common\models\User;

class m170115_183611_portfolio_permision extends Migration
{

    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        $createPortfolio = $auth->createPermission(User::PERMISION_CREATE_PORTFOLIO);
        $createPortfolio->description = 'Create a portfolio';
        $auth->add($createPortfolio);

        $updatePortfolio = $auth->createPermission(User::PERMISION_UPDATE_PORTFOLIO);
        $updatePortfolio->description = 'Update portfolio';
        $auth->add($updatePortfolio);

        $manager= $auth->createRole(User::ROLE_MANAGER);
        $auth->add($manager);
        $auth->addChild($manager, $createPortfolio);

        $admin = $auth->createRole(User::ROLE_ADMIN);
        $auth->add($admin);
        $auth->addChild($admin, $updatePortfolio);
        $auth->addChild($admin, $manager);

    }

    public function safeDown()
    {
        $auth = Yii::$app->authManager;

        $admin = $auth->getRole(User::ROLE_ADMIN);
        $manager = $auth->getRole(User::ROLE_MANAGER);
        $createPermision = $auth->getPermission(User::PERMISION_CREATE_PORTFOLIO);
        $updatePortfolio = $auth->getPermission(User::PERMISION_UPDATE_PORTFOLIO);
        $auth->remove($admin);
        $auth->remove($manager);
        $auth->remove($createPermision);
        $auth->remove($updatePortfolio);
    }

}
