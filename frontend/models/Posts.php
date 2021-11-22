<?php

namespace frontend\models;

use common\models\User;
use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "afri_posts".
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
class Posts extends \yii\db\ActiveRecord
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
            [['image'],'file','skipOnEmpty'=>false,'extensions'=>'jpg,png,gif']
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

    public function getPoster()
    {
        return $this->hasOne(User::class, ['id' => 'posted_by']);
    }
}
