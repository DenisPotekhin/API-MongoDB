<?php


namespace app\modules\v1\models;

use yii\behaviors\TimestampBehavior;


class Place extends \yii\mongodb\ActiveRecord
{
    public static function collectionName()
    {
        return 'places';
    }

    public function attributes()
    {
        return ['_id', 'name', 'city', 'street', 'category'];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),		// Auto timestamp created and updated properties
        ];
    }

    public function fields()
    {
        return [
            'id' => function () {
                return $this->_id;
            },
            'name',
            'city',
            'street',
            'category',
        ];
    }

    public function getPost()
    {
        return $this->hasMany(Post::className(), ['placeId' => (string) ('_id')]);
    }

}
