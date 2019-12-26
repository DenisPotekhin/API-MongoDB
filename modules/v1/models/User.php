<?php


namespace app\modules\v1\models;

use yii\behaviors\TimestampBehavior;


class User extends \yii\mongodb\ActiveRecord
{
    public static function collectionName()
    {
        return 'users';
    }

    public function attributes()
    {
        return ['_id', 'firstName', 'secondName'];
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
            'firstName',
            'secondName',
        ];
    }

    public function getPost()
    {
        return $this->hasMany(Post::className(), ['userId' => (string) ('_id')]);
    }

}
