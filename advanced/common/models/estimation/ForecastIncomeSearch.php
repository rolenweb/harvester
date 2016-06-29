<?php

namespace common\models\estimation;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\estimation\ForecastIncome;

/**
 * ForecastIncomeSearch represents the model behind the search form about `common\models\estimation\ForecastIncome`.
 */
class ForecastIncomeSearch extends ForecastIncome
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'domain_id', 'income', 'created_at', 'updated_at'], 'integer'],
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
        $query = ForecastIncome::find();

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
            'domain_id' => $this->domain_id,
            'income' => $this->income,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        return $dataProvider;
    }
}
