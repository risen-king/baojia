<?php
namespace backend\controllers;

 
use yii\web\Controller;

use backend\models\Pay;
use backend\models\PaySearch;

class PayController extends Controller
{
   /**
     * Lists all Pay models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PaySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('@common/views/pay/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

}
