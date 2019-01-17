<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "section".
 *
 * @property int $id
 * @property string $name
 * @property string $title
 * @property string $text
 * @property int $category_id
 * @property int $sort
 */
class Section extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'section';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'title', 'text', 'category_id', 'sort'], 'required'],
            [['text'], 'string'],
            [['category_id', 'sort'], 'integer'],
            [['name', 'title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'title' => 'Title',
            'text' => 'Text',
            'category_id' => 'Category ID',
            'sort' => 'Sort',
        ];
    }

    public function beforeSave($insert){
        if($this->isNewRecord) {
            $model = Section::find()->orderBy('sort DESC')->one();
            if ($this->id != $model->id) {
                $this->sort = $model->sort + 1;
            }
        }
        return parent::beforeSave($insert);
    }
}
