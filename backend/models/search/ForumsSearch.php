<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Forums;

/**
 * ForumsSearch represents the model behind the search form of `common\models\Forums`.
 */
class ForumsSearch extends Forums
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'data', 'status'], 'integer'],
            [['title', 'description', 'keywords', 'url', 'title_opisanie', 'text_opisanie', 'img', 'text'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Forums::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'data' => $this->data,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'keywords', $this->keywords])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'title_opisanie', $this->title_opisanie])
            ->andFilterWhere(['like', 'text_opisanie', $this->text_opisanie])
            ->andFilterWhere(['like', 'img', $this->img])
            ->andFilterWhere(['like', 'text', $this->text]);

        return $dataProvider;
    }
}
