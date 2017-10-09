<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

use backend\models\Credit;

/**
 * CreditSearch represents the model behind the search form about `common\models\Credit`.
 */
class CreditSearch extends Credit
{
    public $income;
    public $outcome;
    
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['itemid', 'amount','income','outcome', 'balance'], 'integer'],
            [['itemid', 'amount','income','outcome', 'balance'], 'integer'],

            [['username', 'reason', 'note', 'editor'], 'safe'],
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
        $query = Credit::find();

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
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'reason', $this->reason])
            ->andFilterWhere(['like', 'note', $this->note])
            ->andFilterWhere(['like', 'editor', $this->editor]);

        return $dataProvider;
    }
}
