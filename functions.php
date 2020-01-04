<?php
declare(strict_types = 1);
use \yii\web\Request;

function getApiResponse(
    int $code,
    string $status,
    string $message,
    array $data = []
): array
{
    Yii::$app->response->statusCode = $code;

    return [
        'status' => $status,
        'message'=> $message,
        'data' => $data
    ];
}

function getEmptyFields(Request $request): array
{
    $fields = [];
    foreach (Yii::$app->params['requiredApiParam'] as $requiredParam) {
        if (!$request->get($requiredParam)) {
            $fields[] = $requiredParam;
        }
    }

    return [
        'fields' => $fields
    ];
}

function getQueryParams(Request $request): array
{
    $queryParams = [];
    foreach (Yii::$app->params['requiredApiParam'] as $requiredParam) {
        $queryParams['query'][$requiredParam] = $request->get($requiredParam);
    }

    $queryParams['limit'] =
        $request->get('limit', Yii::$app->params['limit']);
    $queryParams['offset'] =
        $request->get('offset', Yii::$app->params['offset']);

    return $queryParams;
}
