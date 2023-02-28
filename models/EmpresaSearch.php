<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Empresa;

/**
 * EmpresaSearch represents the model behind the search form of `app\models\Empresa`.
 */
class EmpresaSearch extends Empresa
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['emp_id'], 'integer'],
            [['emp_nombre', 'emp_correo', 'emp_rfc', 'emp_logo', 'emp_fiscal', 'emp_comercial'], 'safe'],
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
        $query = Empresa::find();

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
            'emp_id' => $this->emp_id,
        ]);

        $query->andFilterWhere(['like', 'emp_nombre', $this->emp_nombre])
            ->andFilterWhere(['like', 'emp_correo', $this->emp_correo])
            ->andFilterWhere(['like', 'emp_rfc', $this->emp_rfc])
            ->andFilterWhere(['like', 'emp_logo', $this->emp_logo])
            ->andFilterWhere(['like', 'emp_fiscal', $this->emp_fiscal])
            ->andFilterWhere(['like', 'emp_comercial', $this->emp_comercial]);

        return $dataProvider;
    }
}
