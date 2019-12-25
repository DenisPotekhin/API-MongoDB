<?php


namespace app\modules\v1\controllers;

use Yii;
use yii\mongodb\Query;

class PostController  extends \yii\rest\Controller
{
    /**
     * @inheritdoc
     */
    public $modelClass = 'app\modules\v1\models\Post';

    /**
     * Simple action that just returns text that will be serialized to the
     * format required by the request.
     *
     * @return string
     */
    public function actionIndex($id)
    {
        $modelClass = $this->modelClass;
        $query = $modelClass::findOne(['_id' => $id]);

//        $query = new Query;
//        $row = $query->from('posts')
//            ->where(['_id' => $id]) // implicit typecast to [[\MongoDB\BSON\ObjectID]]
//            ->one();
        if ($query) {
            Yii::$app->response->statusCode = 200;
            $response = [
                'posts' => $query,
            ];
        } else {
            Yii::$app->response->statusCode = 500;
            $response = [
                'HTTP status code 500' => 'Nedefinovaná chyba',
            ];
        }
        return $response;
    }
}
