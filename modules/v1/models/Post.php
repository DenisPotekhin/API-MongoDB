<?php

namespace app\modules\v1\models;

use yii\behaviors\TimestampBehavior;
use yii;

class Post extends \yii\mongodb\ActiveRecord
{
    /**
     * @return string the name of the mongodb collection associated with this ActiveRecord class.
     */
    public static function collectionName()
    {
        return 'posts';
    }

    /**
     * @return array list of attribute names to create properties for.
     */
    public function attributes()
    {
        return ['_id', 'placeId', 'text', 'userId', 'createdAt', 'timePassed'];
    }

    /**
     * @inheritdoc
     */
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
            'place' => function () {
                return $this->place;
            },
            // NOTE: анонимная функция, возвращает объект класса User, используя метод hasOne
            // можно было бы просто использовать return $this->user. Но у нас запрос возвращающий все записи
            // для выбранного пользователя. В каждой записи будут данные одного и того же пользователя. Чтобы не делать
            // каждый раз запрос к коллекции, используем кэш. Ключом является userId.
            'user' => function () {
                $user = yii::$app->cache->get($this->userId);
                if (!$user) {
                    $user = $this->user;
                    yii::$app->cache->set($this->userId, $user, 3600);
                }
                return $user;
            },
            'text',
            'timePassed' => function () {
                return (time() - $this->createdAt);
            },
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), [(string) '_id' => 'userId']);
    }

    public function getPlace()
    {
        return $this->hasOne(Place::className(), [(string) '_id' => 'placeId']);
    }
}
