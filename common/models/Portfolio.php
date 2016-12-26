<?php
namespace common\models;

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

    public function search($params)
    {
        $query = Portfolio::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }
        $query->andFilterWhere([
            'id' => $this->id,
        ]);
        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'url', $this->url]);

        return $dataProvider;
    }
}