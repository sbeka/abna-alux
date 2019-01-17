<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Menu;

/**
 * MenuSearch represents the model behind the search form of `common\models\Menu`.
 */
class MenuSearch extends Menu
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'text', 'status', 'top', 'middle', 'footer', 'sort_top', 'sort_middle', 'sort_footer'], 'integer'],
            [['name', 'title', 'description', 'keywords', 'url'], 'safe'],
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
    public function searchTop($params)
    {
        $query = Menu::find();

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
            'text' => $this->text,
            'status' => $this->status,
            'top' => $this->top,
            'middle' => $this->middle,
            'footer' => $this->footer,
            'sort_top' => $this->sort_top,
            'sort_middle' => $this->sort_middle,
            'sort_footer' => $this->sort_footer,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'keywords', $this->keywords])
            ->andFilterWhere(['like', 'top', 1])
            ->andFilterWhere(['like', 'url', $this->url]);

        $query->orderBy('sort_top ASC');

        return $dataProvider;
    }

    public function searchMiddle($params)
    {
        $query = Menu::find();

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
            'text' => $this->text,
            'status' => $this->status,
            'top' => $this->top,
            'middle' => $this->middle,
            'footer' => $this->footer,
            'sort_top' => $this->sort_top,
            'sort_middle' => $this->sort_middle,
            'sort_footer' => $this->sort_footer,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'keywords', $this->keywords])
            ->andFilterWhere(['like', 'middle', 1])
            ->andFilterWhere(['like', 'url', $this->url]);

        $query->orderBy('sort_middle ASC');

        return $dataProvider;
    }

    public function searchFooter($params)
    {
        $query = Menu::find();

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
            'text' => $this->text,
            'status' => $this->status,
            'top' => $this->top,
            'middle' => $this->middle,
            'footer' => $this->footer,
            'sort_top' => $this->sort_top,
            'sort_middle' => $this->sort_middle,
            'sort_footer' => $this->sort_footer,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'keywords', $this->keywords])
            ->andFilterWhere(['like', 'footer', 1])
            ->andFilterWhere(['like', 'url', $this->url]);

        $query->orderBy('sort_footer ASC');

        return $dataProvider;
    }
}
