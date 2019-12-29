<?php


namespace app\modules\v1\controllers;

use Yii;
use yii\rest\Controller;
use Exception;
use yii\web\Response;

class PostController  extends Controller
{
    public $modelClass = 'app\modules\v1\models\Post';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator'] = [
            'class' => 'yii\filters\ContentNegotiator',
            'formats' => [
                'application/json' => Response::FORMAT_JSON,
            ]
        ];
        return $behaviors;
    }

    public function actionIndex()
    {
        $request = Yii::$app->request;
        $userId = $request->get('userId') ? $request->get('userId') : $request->getBodyParam('userId');
        if (!$userId) {
            Yii::$app->response->statusCode = 400;
            return [
                'status' => 'Bad Request',
                "message"=> 'Пропущен параметр userId',
                'data' => [],
            ];
        }
        $limit = $request->get('limit', 20);
        $offset = $request->get('offset', 0);

        $modelClass = $this->modelClass;
        //$query = new Query;
        try {
            $query = $modelClass::find()->where(['userId' => $userId])->offset($offset)->limit($limit)->all();
            if ($query) {
                Yii::$app->response->statusCode = 200;
                $response = [
                    'status' => 'Success',
                    'message'=> 'Успешно',
                    'data' => $query,
                ];
            } else {
                Yii::$app->response->statusCode = 404;
                $response = [
                    'status' => 'RecordNotFound',
                    'message'=> 'Запись не найдена',
                    'data' => [],
                ];
            }
        } catch (Exception $exception) {
            Yii::$app->response->statusCode = 500;
            $response = [
                'status' => 'GeneralInternalError',
                'message'=> 'Произошла ошибка',
                'data' => [],
            ];
        }
        return $response;
    }

    public function actionError()
    {
        Yii::$app->response->statusCode = 404;
        return [
            'status' => 'UrlNotFound',
            "message"=> 'URL не найден',
            'data' => [],
        ];
    }
}
