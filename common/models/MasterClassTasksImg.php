<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "master_class_tasks_img".
 *
 * @property int $id
 * @property string $name
 * @property string $text
 * @property string $img
 * @property int $sort
 */
class MasterClassTasksImg extends \yii\db\ActiveRecord
{
    public $files;
    public $path = 'images/masterclasstasks/';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'master_class_tasks_img';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'text', 'img', 'sort'], 'required'],
            [['text'], 'string'],
            [['sort', 'category_id'], 'integer'],
            [['name', 'img'], 'string', 'max' => 255],
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
            'name' => 'Name',
            'text' => 'Text',
            'img' => 'Img',
            'sort' => 'Sort',
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
            $model = MasterClassTasksImg::find()->orderBy('sort DESC')->one();
            if ($this->id != $model->id) {
                $this->sort = $model->sort + 1;
            }
        }
        return parent::beforeSave($insert);
    }
}
