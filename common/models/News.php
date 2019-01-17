<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $keywords
 * @property string $url
 * @property string $title_opisanie
 * @property string $text_opisanie
 * @property string $img
 * @property string $text
 * @property int $data
 * @property int $status
 */
class News extends \yii\db\ActiveRecord
{
    public $path = 'images/news/';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['url', 'title_opisanie', 'text_opisanie', 'text', 'data', 'status'], 'required'],
            [['description', 'text_opisanie', 'text'], 'string'],
            [['status'], 'integer'],
            [['title', 'keywords', 'url', 'title_opisanie', 'img'], 'string', 'max' => 255],
            [['img'], 'file', 'extensions'=>'jpg, gif, png, jpeg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'keywords' => 'Keywords',
            'url' => 'Url',
            'title_opisanie' => 'Заголовок в описании',
            'text_opisanie' => 'Текст в описании',
            'img' => 'Картинка',
            'text' => 'Текст',
            'data' => 'Дата',
            'status' => 'Статус',
        ];
    }

    public function upload()
    {
        $time = time();
        $this->img->saveAs($this->path. $time . $this->img->baseName . '.' . $this->img->extension);
        return $time . $this->img->baseName . '.' . $this->img->extension;
    }
}
