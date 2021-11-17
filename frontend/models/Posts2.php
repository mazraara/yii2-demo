<?php

namespace frontend\models;

use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "posts".
 *
 * @property integer $id
 * @property string $posted_by
 * @property string $title
 * @property string $body
 * @property string $image
 * @property integer $status
 * @property string $slug
 * @property string $created_at
 */
class Posts2 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title',
                'ensureUnique' => true
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'body', 'slug'], 'required'],
            [['body'], 'string'],
            [['status'], 'integer'],
            [['posted_by', 'image', 'created_at'], 'safe'],
            [['title'], 'string', 'max' => 100],
            [['image'], 'string', 'max' => 200],
            [['slug'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'posted_by' => 'Posted By',
            'title' => 'Title',
            'body' => 'Body',
            'image' => 'Image',
            'status' => 'Status',
            'slug' => 'Slug',
            'created_at' => 'Created At',
        ];
    }

    public static function getDb()
    {
        $database = 'db2';
        return Yii::$app->$database;
    }

    public static function setDatabase($database)
    {
        self::$database = $database;
    }
}
