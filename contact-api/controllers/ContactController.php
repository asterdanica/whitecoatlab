<?php

namespace app\controllers;
use app\models\Contact;
use Yii;

class ContactController extends yii\rest\ActiveController
{
    public $modelClass = 'app\models\Contact';
    
    public function actionIndex()
    {   $contacts = Contact::find()->all();
       // return $this->render('index');
        return $this->asJson($contacts);
    }

    private function errorResponse($message) {
                                
        // set response code to 400
        Yii::$app->response->statusCode = 400;
    
        return $this->asJson(['error' => $message]);
    }

}
