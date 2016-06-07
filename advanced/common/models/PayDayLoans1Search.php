<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PayDayLoans1;

/**
 * PayDayLoans1Search represents the model behind the search form about `common\models\PayDayLoans1`.
 */
class PayDayLoans1Search extends PayDayLoans1
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at'], 'integer'],
            [['title', 'street_address', 'city_state', 'phone', 'website', 'open_details', 'description', 'extra_phones', 'years_in_business', 'brands', 'payment', 'categories'], 'safe'],
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
        $query = PayDayLoans1::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'street_address', $this->street_address])
            ->andFilterWhere(['like', 'city_state', $this->city_state])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'website', $this->website])
            ->andFilterWhere(['like', 'open_details', $this->open_details])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'extra_phones', $this->extra_phones])
            ->andFilterWhere(['like', 'years_in_business', $this->years_in_business])
            ->andFilterWhere(['like', 'brands', $this->brands])
            ->andFilterWhere(['like', 'payment', $this->payment])
            ->andFilterWhere(['like', 'categories', $this->categories]);

        return $dataProvider;
    }
}
