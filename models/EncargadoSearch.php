<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Encargado;

/**
 * EncargadoSearch represents the model behind the search form of `app\models\Encargado`.
 */
class EncargadoSearch extends Encargado
{
    public $empresaNombre;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['enc_id', 'enc_telefono', 'enc_fkempresa', 'enc_fkuser'], 'integer'],
            [['enc_foto', 'enc_nombre', 'enc_paterno', 'enc_materno', 'empresaNombre'], 'safe'],
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
        $query = Encargado::find();

        // add conditions that should always apply here
        $query->joinWith('encFkempresa');

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
            'enc_id' => $this->enc_id,
            'enc_telefono' => $this->enc_telefono,
            'enc_fkempresa' => $this->enc_fkempresa,
            'enc_fkuser' => $this->enc_fkuser,
        ]);

        $query->andFilterWhere(['like', 'enc_foto', $this->enc_foto])
            ->andFilterWhere(['like', 'enc_nombre', $this->enc_nombre])
            ->andFilterWhere(['like', 'enc_paterno', $this->enc_paterno])
            ->andFilterWhere(['like', 'enc_materno', $this->enc_materno])
            ->andFilterWhere(['like', 'emp_nombre', $this->empresaNombre]);

        return $dataProvider;
    }
}
