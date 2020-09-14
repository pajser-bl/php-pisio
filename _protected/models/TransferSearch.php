<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Transfer;

/**
 * app\models\TransferSearch represents the model behind the search form about `app\models\Transfer`.
 */
 class TransferSearch extends Transfer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'asset', 'person_from', 'person_to', 'location_from', 'location_to'], 'integer'],
            [['date'], 'safe'],
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
        $query = Transfer::find();

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
            'date' => $this->date,
            'asset' => $this->asset,
            'person_from' => $this->person_from,
            'person_to' => $this->person_to,
            'location_from' => $this->location_from,
            'location_to' => $this->location_to,
        ]);

        return $dataProvider;
    }
}
