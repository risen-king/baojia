<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;


use backend\models\Cash;

/**
 * CashSearch represents the model behind the search form about `common\models\Cash`.
 */
class CashSearch extends Cash
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['itemid', 'addtime', 'edittime', 'status'], 'integer'],
            [['username', 'bank', 'account', 'truename', 'ip', 'editor', 'note'], 'safe'],
            [['amount', 'fee'], 'number'],
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
        $query = Cash::find();

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
            'fee' => $this->fee,
            'addtime' => $this->addtime,
            'edittime' => $this->edittime,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'bank', $this->bank])
            ->andFilterWhere(['like', 'account', $this->account])
            ->andFilterWhere(['like', 'truename', $this->truename])
            ->andFilterWhere(['like', 'ip', $this->ip])
            ->andFilterWhere(['like', 'editor', $this->editor])
            ->andFilterWhere(['like', 'note', $this->note]);

        return $dataProvider;
    }
}
