<?php
namespace backend\controllers;

use Yii;
 
use yii\web\Controller;

use backend\models\Credit;
use backend\models\CreditSearch;
use backend\models\User;

 
class CreditController extends Controller
{
     
    
    /**
     * Lists all Credit models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CreditSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

 
  
    /**
     * 手工增加/减少积分
     */
    public function actionCreate()
    {

        $model = new Credit();

        if ( $model->load(Yii::$app->request->post()) ){

            if(!$model->username ){
                \Yii::$app->getSession()->setFlash('danger', Yii::t('common/money','Username Needed!'));
                return $this->refresh();
            }


            if(intval($model->amount) <= 0 ){
                \Yii::$app->getSession()->setFlash('danger', Yii::t('common/money','Credit  amount must be great than 0 '));
                return $this->refresh();
            }

            !$model->direction && $model->amount = -$model->amount;

            $model->reason ||  $model->reason = Yii::t('common/money','prize');
            $model->note ||  $model->note = Yii::t('common/money','manual');

            $_editor = Yii::$app->user->identity->username;

            $_credit_name = isset(Yii::$app->params['credit_name']) && Yii::$app->params['credit_name'] ? Yii::$app->params['credit_name'] : Yii::t('common/money','credit');

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

                    $error .= '<br/>'. Yii::t('common', '{username} {creditname} not enough,current {creditname} is:{credit}', [
                            'username' => $username,
                            'creditname'=>$_credit_name,
                            'credit'=>$user->credit
                        ]);
                    continue;
                }
                ++$success;

                User::creditAdd($username, $model->amount);
                User::creditRecord($username, $model->amount ,$_editor, $model->reason, $model->note);

            }



            if($error){

                $msg = Yii::t('common/money','Operation Success {success} users,errors below: {error}',[
                    'success'=>$success,
                    'error'=>$error
                ]);


                \Yii::$app->getSession()->setFlash('danger', $msg);

            }else{

                \Yii::$app->getSession()->setFlash('success', \Yii::t('common/money','Operation Success') );
                return $this->refresh();

            }

        }else{
            $model->reason = Yii::t('common/money','cash');

            $model->note =   Yii::t('common/money','prize');

            $userid = Yii::$app->request->get('userid');
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
 
    //清理90天之外的积分
    public function actionClear(){
        $time = mktime(24,0,0) - 90*86400;
        
        Credit::deleteAll(['<','addtime',$time]);
       
        $this->success(Yii::t('common/money','Clear Success'));
   
    }
    
    
      /**
     * Finds the Credit model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Credit the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Credit::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    
     /**
     * Creates a new Credit model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionBuy()
    {
       
        
        $user = Yii::$app->user->identity;
        $_username = $user->username;
        $_money = $user->money;
        
        $prices_arr = Yii::$app->params['credit']['buy'];
        $_credits = array_keys($prices_arr);
        $_amounts = array_values($prices_arr);
        
        $model = new Credit();
        if ( Yii::$app->request->isPost ) 
        {
            $model->load(Yii::$app->request->post()); 
            
            
            if( array_key_exists($model->type, $_amounts) ){
                $this->error( Yii::t('common/user','credit_msg_buy_amount') );
            }
            
            $amount = $_amounts[$model->type];
            $credit = $_credits[$model->type];
            
            if(  !$user::isPayword($_username,$model->password) ){
                $this->error(Yii::t('common/user','error_payword'));
            }
          
            if($amount > 0) 
            {
                if( $_money < $amount ){
                    $this->error(Yii::t('common/user','money_not_enough'),['/charge/pay','reason'=>'credit','amount'=>$amount-$user->money]);
                }
                $user::moneyAdd($_username, -$amount);
                
                $reason = Yii::t('common/user','buy').Yii::t('common/user','credit_name');
                $credit_unit = Yii::t('common/user','credit_unit');
                $bank = Yii::t('common','in_site');
                $user::moneyRecord($_username, -$amount, $bank, 'system',$reason, $credit.$credit_unit );
                if($credit > 0) {
                    $user::creditAdd($_username, $credit);
                    $user::creditRecord($_username, $credit,    'system', $reason, $amount.$credit_unit );
                }
            }
           
            
            $this->success(Yii::t('common/user','credit_msg_buy_success'),['index']);
       
        } 
        else 
        {
            $selector  = [];
            foreach($_credits as $key =>$val){
                $selector[$key] = $_credits[$key].Money::unitName() .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$_amounts[$key].Money::unitName();
            }
            $model->type = 3;
            return $this->render('@common/views/credit/buy', [
                'model' => $model,
                'user'=>$user,
                'selector'=>$selector
            ]);
        }
    }
 
     
}
