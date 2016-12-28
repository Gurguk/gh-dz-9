<?php
namespace common\models;

use yii\db\ActiveRecord;
use yii\data\ActiveDataProvider;
use yii\helpers\Console;
use Yii;
/**
 * Portfolio
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $image
 * @property string $url
 */

class Portfolio extends ActiveRecord
{

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

    public function addDemo()
    {
        $postModel = new Portfolio();
        Console::startProgress(0,100);
        $i = 1;
        while($i<=100){
            $rows = [];
            $j=1;
            while($j<=10){
                $rows[] = [
                    'id',
                    'title' => 'Title ' . $i . '-' . $j,
                    'description' => 'Description ' . $i . '-' . $j,
                    'image' => 'Image' . $i . '-' . $j,
                    'url' => 'Url ' . $i . '-' . $j
                ];
                $j++;
            }
            Yii::$app->db->createCommand()->batchInsert(Portfolio::tableName(), $postModel->attributes(), $rows)->execute();
            Console::updateProgress($i,100);
            $i++;
        }
        Console::endProgress("end".PHP_EOL);

    }
}