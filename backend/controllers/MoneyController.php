<?php
namespace backend\controllers;
 
use Yii;
use yii\web\Controller;

use backend\models\Money;
use backend\models\MoneySearch;
 
class MoneyController extends Controller
{
   
    /**
     * Lists all Record models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MoneySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
 

    
    
    /**
     * 后台资金增减
     */
    public function actionCreate($userid=0)
    {
        $model = new Money();

        if ( $model->load(Yii::$app->request->post()) ) {

            if(!$model->username ){
                \Yii::$app->getSession()->setFlash('danger', Yii::t('common/money','Username Needed!'));
                return $this->refresh();
            }

            if(!$model->bank ){
                \Yii::$app->getSession()->setFlash('danger', Yii::t('common/money','Bank Needed!'));
                return $this->refresh();
            }

            if(!$model->amount ){
                \Yii::$app->getSession()->setFlash('danger', Yii::t('common/money','Money Amount Needed!'));
                return $this->refresh();
            }


            if(intval($model->amount) < 0 ){
                \Yii::$app->getSession()->setFlash('danger', Yii::t('common/money','Money amount must be great than 0 '));
                return $this->refresh();
            }


            !$model->direction && $model->amount = -$model->amount;
            
            $model->reason ||  $model->reason = Yii::t('common/money','cash');
            $model->note   ||  $model->note = Yii::t('common/money','manual');
           
            $_editor = Yii::$app->user->identity->username;  
            
            $error = '';
            $success = 0;
            
            foreach( explode("\n", trim($model->username)) as $username) 
            {
                    if(! ($username = trim($username)) ){
                        continue;
                    }
                    $user = User::findOne(['username'=>$username]);
                    if(!$user) {
                        $error .= '<br/>'. Yii::t('common', '{username} not exsit', ['username' => $username]);
                        continue;
                    }

                    if(!$model->direction && $model->credit < abs($model->amount)) { 
                            $error .= '<br/>'. Yii::t('common', '{username} balance not enough,current balance is:{money}', [
                                    'username' => $username,
                                    'money'=>$user->money,
                                  
                                ]);
                            continue;
                    }
                    ++$success;

                    User::moneyAdd($username, $model->amount);
                    User::moneyRecord($username, $model->amount ,$model->bank,$_editor, $model->reason, $model->note);
           
            }


            if($error){

                $msg = \Yii::t('common/money','Operation Success {success} users,errors below: {error}',[
                    'success'=>$success,
                    'error'=>$error
                ]);


                \Yii::$app->getSession()->setFlash('danger', $msg);

            }else{

                \Yii::$app->getSession()->setFlash('success', \Yii::t('common/money','Operation Success') );
                return $this->refresh();

            }
            
        } else {
            if($userid) {
                    
                $userids = is_array($userid) ? implode(',', $userid) : $userid;
                    $username = '';
                    $users = User::findAll(['in','userid',$userids]);
                    foreach($users as $user){
                        $username .= $user->username."\n";
                    }
                    $model->username = $username;
            
            }
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    
    /*
     * 后台记录清理
     */
    public function actionClear(){
        $time = mktime(24,0,0) - 90*86400;
        
        Money::deleteAll(['<','addtime',$time]);
       
        $this->success(Yii::t('common/money','Clear Success'));
   
    }


    /**
     * Finds the Record model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Record the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Money::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    
   
     
}
