<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Unidad;

/**
 * UnidadSearch represents the model behind the search form of `app\models\Unidad`.
 */
class UnidadSearch extends Unidad
{
    public $empresaNombre;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uni_id', 'uni_extintor', 'uni_cruz', 'uni_gato', 'uni_manual', 'uni_cable', 'uni_rines', 'uni_fkempresa'], 'integer'],
            [['uni_foto', 'uni_descripcion', 'uni_modelo', 'uni_marca', 'uni_serie', 'uni_motor', 'uni_tenencia','uni_anio', 'uni_color', 'uni_placa', 'uni_tarjeta', 'uni_comentario', 'empresaNombre'], 'safe'],
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
        $query = Unidad::find();

        // add conditions that should always apply here
        $query->joinWith('uniFkempresa');


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
            'uni_id' => $this->uni_id,
            'uni_anio' => $this->uni_anio,
            'uni_tenencia' => $this->uni_tenencia,
            'uni_extintor' => $this->uni_extintor,
            'uni_cruz' => $this->uni_cruz,
            'uni_gato' => $this->uni_gato,
            'uni_manual' => $this->uni_manual,
            'uni_cable' => $this->uni_cable,
            'uni_rines' => $this->uni_rines,
            'uni_fkempresa' => $this->uni_fkempresa,
        ]);

        $query->andFilterWhere(['like', 'uni_foto', $this->uni_foto])
            ->andFilterWhere(['like', 'uni_descripcion', $this->uni_descripcion])
            ->andFilterWhere(['like', 'uni_modelo', $this->uni_modelo])
            ->andFilterWhere(['like', 'uni_marca', $this->uni_marca])
            ->andFilterWhere(['like', 'uni_serie', $this->uni_serie])
            ->andFilterWhere(['like', 'uni_motor', $this->uni_motor])
            ->andFilterWhere(['like', 'uni_color', $this->uni_color])
            ->andFilterWhere(['like', 'uni_placa', $this->uni_placa])
            ->andFilterWhere(['like', 'uni_tarjeta', $this->uni_tarjeta])
            ->andFilterWhere(['like', 'uni_comentario', $this->uni_comentario])
            ->andFilterWhere(['like', 'emp_nombre', $this->empresaNombre]);

        return $dataProvider;
    }
}
