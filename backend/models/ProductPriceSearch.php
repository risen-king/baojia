<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

use backend\models\ProductPrice;

/**
 * ProductPriceSearch represents the model behind the search form about `backend\models\ProductPrice`.
 */
class ProductPriceSearch extends ProductPrice
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'vol', 'amount'], 'integer'],
            [['date', 'name','symbol',], 'safe'],
            [['close', 'high', 'low', 'open', 'adj_close','change','changed_rate',  'exchange'], 'number'],
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
        $query = ProductPrice::find();

        $query->with('product');

            // add conditions that should always apply here
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=>[
                'defaultOrder' =>[
                    'date' => SORT_DESC
                ]
            ]
        ]);

        $this->load($params);
        
        if($params['symbol']){
             $query->andFilterWhere([
                 'symbol'=>$params['symbol']
             ]);
        }
        
       

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'date' => $this->date,
            'symbol' => $this->symbol,
            'close' => $this->close,
            'adj_close' => $this->adj_close,
            'change' => $this->change,
            'changed_rate' => $this->changed_rate,
            'high' => $this->high,
            'low' => $this->low,
            'open' => $this->open,

            'exchange' => $this->exchange,
            'vol' => $this->vol,
            //'amount' => $this->amount,

        ]);

          //$query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
