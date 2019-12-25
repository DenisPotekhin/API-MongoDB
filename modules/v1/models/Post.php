<?php


namespace app\modules\v1\models;

use yii\behaviors\TimestampBehavior;


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
        return ['_id', 'text', 'createdAt'];
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
            '_id',
            'text',
            /*
            'timePassed' => function ()   {
                return time() - ($this->createdAt);
            },
            */
            'createdAt',
        ];
    }
}
