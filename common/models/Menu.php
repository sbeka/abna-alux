<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property int $id
 * @property string $name
 * @property string $title
 * @property string $description
 * @property string $keywords
 * @property string $url
 * @property int $text
 * @property int $sort
 * @property int $status
 * @property int $top
 * @property int $middle
 * @property int $footer
 * @property int $sort_top
 * @property int $sort_middle
 * @property int $sort_footer
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'url', 'text', 'status', 'top', 'middle', 'footer'], 'required'],
            [['text', 'description', 'title4'], 'string'],
            [['status', 'top', 'middle', 'footer', 'sort_top', 'sort_middle', 'sort_footer'], 'integer'],
            [['name', 'title', 'keywords', 'url', 'title1', 'title2', 'title3'], 'string', 'max' => 255],
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
            'title' => 'Title',
            'description' => 'Description',
            'keywords' => 'Keywords',
            'url' => 'Url',
            'text' => 'Текст',
            'status' => 'Статус',
            'top' => 'Верхнее меню',
            'middle' => 'Среднее меню',
            'footer' => 'Меню в футере',
            'sort_top' => 'Sort Top',
            'sort_middle' => 'Sort Middle',
            'sort_footer' => 'Sort Footer',
            'title1' => 'Заголовок',
            'title2' => 'Проведенных мероприятий',
            'title3' => 'Учеников нашей школы',
            'title4' => 'Жирный текст в описании',
        ];
    }

    public function beforeSave($insert){
        if($this->isNewRecord) {
            if($this->top) {
                $model = Menu::find()->orderBy('sort_top DESC')->one();
                if ($this->id != $model->id) {
                    $this->sort_top = $model->sort_top + 1;
                }
            }
            if($this->middle) {
                $model = Menu::find()->orderBy('sort_middle DESC')->one();
                if ($this->id != $model->id) {
                    $this->sort_middle = $model->sort_middle + 1;
                }
            }
            if($this->footer) {
                $model = Menu::find()->orderBy('sort_footer DESC')->one();
                if ($this->id != $model->id) {
                    $this->sort_footer = $model->sort_footer + 1;
                }
            }
        }
        return parent::beforeSave($insert);
    }
}
