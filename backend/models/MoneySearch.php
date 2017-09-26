<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;


use backend\models\Money;

/**
 * RecordSearch represents the model behind the search form about `common\models\Record`.
 */
class MoneySearch extends Money
{
    public $income;
    public $outcome;
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['itemid', 'addtime'], 'integer'],
            [['username', 'bank', 'reason', 'note', 'editor'], 'safe'],
            [['amount', 'balance','income','outcome'], 'number'],
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
        $query = Money::find();

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
            'itemid' => $this->itemid,
            'amount' => $this->amount,
            'balance' => $this->balance,
            'addtime' => $this->addtime,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'bank', $this->bank])
            ->andFilterWhere(['like', 'reason', $this->reason])
            ->andFilterWhere(['like', 'note', $this->note])
            ->andFilterWhere(['like', 'editor', $this->editor]);

        return $dataProvider;
    }
}
