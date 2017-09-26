<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;


use backend\models\Charge;

/**
 * FinanceChargeSearch represents the model behind the search form about `common\models\FinanceCharge`.
 */
class ChargeSearch extends Charge
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['itemid', 'sendtime', 'receivetime', 'status'], 'integer'],
            [['username', 'bank', 'editor', 'note'], 'safe'],
            [['amount', 'fee', 'money'], 'number'],
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
        $query = Charge::find();

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
            'money' => $this->money,
            'sendtime' => $this->sendtime,
            'receivetime' => $this->receivetime,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'bank', $this->bank])
            ->andFilterWhere(['like', 'editor', $this->editor])
            ->andFilterWhere(['like', 'note', $this->note]);

        return $dataProvider;
    }
}
