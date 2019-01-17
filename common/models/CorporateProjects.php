<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "corporate_projects".
 *
 * @property int $id
 * @property string $name
 * @property int $text
 * @property string $category_id
 * @property int $sort
 */
class CorporateProjects extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'corporate_projects';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'text', 'category_id', 'sort'], 'required'],
            [['text'], 'string'],
            [['sort'], 'integer'],
            [['name', 'category_id'], 'string', 'max' => 255],
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
            'category_id' => 'Категория',
            'sort' => 'Сортировка',
        ];
    }

    public function beforeSave($insert){
        if($this->isNewRecord) {
            $model = CorporateProjects::find()->orderBy('sort DESC')->one();
            if ($this->id != $model->id) {
                $this->sort = $model->sort + 1;
            }
        }
        return parent::beforeSave($insert);
    }
}
