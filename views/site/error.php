<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use Yii;

Yii::$app->response->statusCode = 500;
return [
    'status' => 'RecordNotFound',
    "message"=> 'Запист не найдена',
    'data' => '',
];

