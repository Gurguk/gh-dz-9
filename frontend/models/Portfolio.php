<?php
namespace frontend\models;

use yii\db\ActiveRecord;
use yii\data\ActiveDataProvider;

class Portfolio extends ActiveRecord
{
    /**
     * Portfolio
     */
    public static function tableName()
    {
        return 'portfolio';
    }

    public function rules(){
        return [
            [['title', 'description', 'image', 'url'], 'required'],
            [['image'], 'file'],
        ];
    }
}