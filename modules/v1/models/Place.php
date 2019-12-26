<?php


namespace app\modules\v1\models;

use yii\mongodb;
use yii\behaviors\TimestampBehavior;


class Place extends \yii\mongodb\ActiveRecord
{
    /**
     * @return string the name of the mongodb collection associated with this ActiveRecord class.
     */
    public static function collectionName()
    {
        return 'places';
    }

    /**
     * @return array list of attribute names to create properties for.
     */
    public function attributes()
    {
        return ['_id', 'name', 'city', 'street', 'category'];
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

    /**
     * Set rules for all properties that you want to set via the API endpoint
     * @return type
     */



    /**
     * Describes which fields to return for queries against a Token(s)
     * @return array
     */
    public function fields()
    {
        return [
            'id' => function ()   {
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
