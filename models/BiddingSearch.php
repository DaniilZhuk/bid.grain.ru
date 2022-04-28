<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Bidding;
use app\models\User;
/**
 * BiddingSearch represents the model behind the search form of `app\models\Bidding`.
 */
class BiddingSearch extends Bidding
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_price', 'admin_price'], 'required'],
            [['user_price', 'admin_price', 'comment'], 'string', 'max' => 255],
            [['id_user', 'id_admin', 'id_bid' , 'id_response'], 'integer'],
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
        $query = Bidding::find()->orderBy(['id'=>SORT_DESC]);

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
            'end_date' => $this->end_date,
        ]);
        
        $query->andFilterWhere(['like', 'id_user', $this->id_user])
            ->andFilterWhere(['like', 'id_admin', $this->id_admin])
            ->andFilterWhere(['like', 'id_bid', $this->id_bid])
            ->andFilterWhere(['like', 'id_response', $this->id_response])
            ->andFilterWhere(['like', 'user_price', $this->user_price])
            ->andFilterWhere(['like', 'admin_price', $this->admin_price])
            ->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
