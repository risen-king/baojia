<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;

use backend\models\Charge;
use backend\models\ChargeSearch;

/**
 *  充值操作
 */
class ChargeController extends Controller
{
         /**
     * Lists all Charge models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ChargeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
     /**
     * Updates an existing Charge model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionPay()
    {
   
        
        if(Yii::$app->request->isPost){
            
        }else{
            $model = new Charge();
            return $this->render('pay', [
                'model' => $model,
            ]);
        }
         
    }

    

    

    /**
     * Finds the Charge model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Charge the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Charge::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
  
}
