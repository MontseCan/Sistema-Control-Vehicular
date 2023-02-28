<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Registro;

/**
 * RegistroSearch represents the model behind the search form of `app\models\Registro`.
 */
class RegistroSearch extends Registro
{
    public $unidadNombre;
    public $unidadModelo;
    public $detalleFechaE;
    public $detalleFechaS;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['reg_id', 'reg_fkunidad', 'reg_fkdetalleE', 'reg_fkdetalleS', ], 'integer'],
            [['reg_entradaFecha', 'reg_salidaFecha', 'reg_conductor',  'unidadNombre','unidadModelo', 'detalleFechaE', 'detalleFechaS'], 'safe'],
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
        $query = Registro::find();

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
            'reg_id' => $this->reg_id,
            'reg_entradaFecha' => $this->reg_entradaFecha,
            'reg_fkunidad' => $this->reg_fkunidad,
            'reg_fkdetalleE' => $this->reg_fkdetalleE,
            'reg_fkdetalleS' => $this->reg_fkdetalleS,
        ]);

        $query->andFilterWhere(['like', 'reg_salidaFecha', $this->reg_salidaFecha])
            ->andFilterWhere(['like', 'reg_conductor', $this->reg_conductor])
            ->andFilterWhere(['like', 'uni_serie', $this->unidadNombre])
            ->andFilterWhere(['like', 'uni_modelo', $this->unidadModelo])
            ->andFilterWhere(['like', 'det_fecha', $this->detalleFechaE])
            ->andFilterWhere(['like', 'det_fecha', $this->detalleFechaS]);

        return $dataProvider;
    }
}
