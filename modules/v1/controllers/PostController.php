<?php


namespace app\modules\v1\controllers;

use Yii;
use Exception;

class PostController  extends BaseController
{
    public $modelClass = 'app\modules\v1\models\Post';

    public function actionIndex()
    {
        $request = Yii::$app->request;
        $fields = getEmptyFields($request);
        if ($fields['fields']) return getApiResponse(400, 'FieldRequired', 'Поле не может быть пустым', $fields);
        $queryParams =  getQueryParams($request);
        $modelClass = $this->modelClass;
        try {
            $query = $modelClass::find()->where($queryParams['query'])
                ->offset($queryParams['offset'])->limit($queryParams['limit'])->all();
            if ($query) {
                return getApiResponse(200, 'Success', 'Успешно', $query);
            } else {
                return getApiResponse(404,'RecordNotFound', 'Запись не найдена');
            }
        } catch (Exception $exception) {
            return getApiResponse(500,'GeneralInternalError', 'Произошла ошибка');
        }
    }

    public function actionError()
    {
        return getApiResponse(404,'UrlNotFound', 'URL не найден');
    }
}
