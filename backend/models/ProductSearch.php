<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Product;

/**
 * ProductSearch represents the model behind the search form about `backend\models\Product`.
 */
class ProductSearch extends Product
{
    
   
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['symbol', 'code', 'name','catname'], 'safe'],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
      
         $_lables = (new Product)->attributeLabels();
        
         return $_lables;
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
        $query = Product::find();
        
        $query->joinWith(['category']); 

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        $dataProvider->setSort([
            'attributes' => [
                'symbol',
                'name',
                /* 其它字段不要动 */    
                /*  下面这段是加入的 */
                'catname' => [
                    'asc' => ['category.catname' => SORT_ASC],
                    'desc' => ['category.catname' => SORT_DESC],
                ],
              
            ]
        ]); 

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,

        ]);

        $query->andFilterWhere(['like', 'symbol', $this->symbol])
            ->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'name', $this->name]);
        
         $query->andFilterWhere(['like', 'category.catname', $this->catname]) ; 

         return $dataProvider;
    }
    
    
      public  static function getTop5($order=[]){
   
        $query = Product::find();
        $query->joinWith(['category']); 
        
        if(!$order){
            $order=  ['price' => SORT_DESC];
        }
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                  'pageSize' => 5,
            ],
         'sort' => false
        ]);
        
        $query->limit(5)->orderBy($order);
        
        return $dataProvider;
    }
}
