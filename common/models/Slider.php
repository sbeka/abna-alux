<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "slider".
 *
 * @property int $id
 * @property string $title1
 * @property string $title2
 * @property string $title3
 * @property string $img
 * @property int $category_id
 * @property int $sort
 */
class Slider extends \yii\db\ActiveRecord
{
    public $files;
    public $path = 'images/slider/';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slider';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title1', 'title2', 'title3', 'img', 'category_id', 'sort'], 'required'],
            [['category_id', 'sort'], 'integer'],
            [['title1', 'title2', 'title3', 'img'], 'string', 'max' => 255],
            ['files', 'each', 'rule' => ['image']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title1' => 'Заголовок',
            'title2' => 'Текст 1',
            'title3' => 'Текст 2',
            'img' => 'Картинка',
            'category_id' => 'Меню',
            'sort' => 'Сортировка',
        ];
    }

    public function upload()
    {
        $time = time();
        $this->img->saveAs($this->path. $time . $this->img->baseName . '.' . $this->img->extension);
        return $time . $this->img->baseName . '.' . $this->img->extension;
    }

    public function beforeSave($insert){
        if($this->isNewRecord) {
            $model = Slider::find()->orderBy('sort DESC')->one();
            if (!$model || $this->id != $model->id) {
                $this->sort = $model->sort + 1;
            }
        }
        return parent::beforeSave($insert);
    }
}
