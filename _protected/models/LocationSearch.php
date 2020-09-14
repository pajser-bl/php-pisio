<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Location;

/**
 * app\models\LocationSearch represents the model behind the search form about `app\models\Location`.
 */
class LocationSearch extends Location
{
    public $relativeLocation;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'room_id'], 'integer'],
            [['lat', 'lon'], 'number'],
            [['relativeLocation', 'description'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Location::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'lat' => $this->lat,
            'lon' => $this->lon,
            'room_id' => $this->room_id,
            'description' => $this->description,
        ]);

        return $dataProvider;
    }
}
