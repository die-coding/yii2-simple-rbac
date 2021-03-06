<?php

namespace juliardi\simplerbac\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use juliardi\simplerbac\models\RbacAccessRules;

/**
 * RbacAccessRulesSearch represents the model behind the search form about `juliardi\simplerbac\models\RbacAccessRules`.
 */
class RbacAccessRulesSearch extends RbacAccessRules
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'role_id', 'route_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = RbacAccessRules::find();

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
            'role_id' => $this->role_id,
            'route_id' => $this->route_id,
        ]);

        return $dataProvider;
    }
}
