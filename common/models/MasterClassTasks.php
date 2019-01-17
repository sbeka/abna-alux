<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "master_class_tasks".
 *
 * @property int $id
 * @property string $name
 * @property string $text
 * @property string $img
 * @property int $category_id
 * @property int $sort
 */
class MasterClassTasks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'master_class_tasks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'text', 'price', 'category_id', 'sort'], 'required'],
            [['text'], 'string'],
            [['category_id', 'sort'], 'integer'],
            [['name', 'price'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'text' => 'Текст',
            'price' => 'Цена',
            'category_id' => 'Категория',
            'sort' => 'Сортировка',
        ];
    }

    public function beforeSave($insert){
        if($this->isNewRecord) {
            $model = MasterClassTasks::find()->orderBy('sort DESC')->one();
            if ($this->id != $model->id) {
                $this->sort = $model->sort + 1;
            }
        }
        return parent::beforeSave($insert);
    }
}
