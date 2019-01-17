<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "seminars".
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
 * @property int $sort
 * @property int $status
 */
class Seminars extends \yii\db\ActiveRecord
{
    public $path = 'images/seminars/';
    public $hours;
    public $minutes;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'seminars';
    }

//    public function behaviors(){
//        return [
//            [
//                'class' => TimestampBehavior::className(),
//                'attributes' => [
//                    ActiveRecord::EVENT_BEFORE_INSERT => ['data'],
//                    ActiveRecord::EVENT_BEFORE_UPDATE => ['data'],
//                ],
////                // если вместо метки времени UNIX используется datetime:
//                'value' => $this->data,
//            ],
//        ];
//    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['url', 'title_opisanie', 'text_opisanie', 'text', 'data', 'status', 'hours', 'minutes'], 'required'],
            [['description', 'text_opisanie', 'text', 'opisanie', 'individualizacia', 'dla_kogo', 'prodolzhitelnost', 'dop_info', 'dop_text'], 'string'],
            [['status', 'hours', 'minutes'], 'integer'],
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
            'hours' => 'Часов',
            'minutes' => 'Минут',
            'opisanie' => 'Описание',
            'individualizacia' => 'Индивидуализация',
            'dla_kogo' => 'Для кого мастер-класс',
            'prodolzhitelnost' => 'Продолжительность',
            'dop_info' => 'Дополнительная инвормация',
            'dop_text' => 'Текст в самом низу страницы',
        ];
    }

    public function getMasterClassTasksImg()
    {
        return $this->hasMany(MasterClassTasksImg::className(), ['category_id' => 'id'])->
        orderBy(['sort' => SORT_ASC]);
    }

    public function getMasterClassTasks()
    {
        return $this->hasMany(MasterClassTasks::className(), ['category_id' => 'id'])->
        orderBy(['sort' => SORT_ASC]);
    }

    public function getCorporateProjects()
    {
        return $this->hasMany(CorporateProjects::className(), ['category_id' => 'id'])->
        orderBy(['sort' => SORT_ASC]);
    }

    public function getSection()
    {
        return $this->hasMany(Section::className(), ['category_id' => 'id'])->
        orderBy(['sort' => SORT_ASC]);
    }

    public function getClientCenteredness()
    {
        return $this->hasMany(ClientCenteredness::className(), ['category_id' => 'id'])->
        orderBy(['sort' => SORT_ASC]);
    }

    public function upload()
    {
        $time = time();
        $this->img->saveAs($this->path. $time . $this->img->baseName . '.' . $this->img->extension);
        return $time . $this->img->baseName . '.' . $this->img->extension;
    }
}
