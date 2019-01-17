<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "client_centeredness".
 *
 * @property int $id
 * @property string $name
 * @property string $text
 * @property string $img
 * @property int $category_id
 * @property int $sort
 */
class ClientCenteredness extends \yii\db\ActiveRecord
{
    public $files;
    public $path = 'images/clientcenteredness/';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client_centeredness';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'text', 'img', 'category_id', 'sort'], 'required'],
            [['text'], 'string'],
            [['category_id', 'sort'], 'integer'],
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
            'category_id' => 'Category ID',
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
            $model = ClientCenteredness::find()->orderBy('sort DESC')->one();
            if ($this->id != $model->id) {
                $this->sort = $model->sort + 1;
            }
        }
        return parent::beforeSave($insert);
    }
}
