<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CompanyCard;

/**
 * CompanycardSearch represents the model behind the search form of `common\models\CompanyCard`.
 */
class CompanycardSearch extends CompanyCard
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['contacts', 'address', 'email', 'instagram_link', 'facebook_link', 'linkedin_link', 'youtube_link', 'Why_us_uz', 'Why_us_ru', 'regular_customers', 'created_at', 'updated_at'], 'safe'],
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
     * @param string|null $formName Form name to be used into `->load()` method.
     *
     * @return ActiveDataProvider
     */
    public function search($params, $formName = null)
    {
        $query = CompanyCard::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, $formName);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'contacts', $this->contacts])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'instagram_link', $this->instagram_link])
            ->andFilterWhere(['like', 'facebook_link', $this->facebook_link])
            ->andFilterWhere(['like', 'linkedin_link', $this->linkedin_link])
            ->andFilterWhere(['like', 'youtube_link', $this->youtube_link])
            ->andFilterWhere(['like', 'Why_us_uz', $this->Why_us_uz])
            ->andFilterWhere(['like', 'Why_us_ru', $this->Why_us_ru])
            ->andFilterWhere(['like', 'regular_customers', $this->regular_customers]);

        return $dataProvider;
    }
}
