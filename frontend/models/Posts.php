<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "afri_posts".
 *
 * @property integer $id
 * @property string $posted_by
 * @property string $title
 * @property string $body
 * @property string $image
 * @property string $created_at
 */
class Posts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['posted_by','title', 'body'], 'required'],
            [['body'], 'string'],
            [['created_at', 'image'], 'safe'],
            [['posted_by', 'title'], 'string', 'max' => 100],
            [['image'], 'string', 'max' => 200],
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
            'created_at' => 'Created At',
        ];
    }
}
