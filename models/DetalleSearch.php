<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Detalle;

/**
 * DetalleSearch represents the model behind the search form of `app\models\Detalle`.
 */
class DetalleSearch extends Detalle
{
    public $unidadNombre;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['det_id', 'det_fkunidad'], 'integer'],
            [['det_comentario', 'det_asiento', 'det_cinturon', 'det_claxon', 'det_tablero', 'det_clima', 'det_antena', 'det_encendedor', 'det_tapete', 'det_carroceria', 'det_trasera', 'det_delantera', 'det_tapon', 'det_parabrisa', 'det_limparabrisa', 'det_aceite', 'det_rines', 'det_retrovisores', 'det_liqfreno', 'det_anticongelante', 'det_hidraulico', 'det_combustible', 'det_luces', 'det_lucDelantera', 'det_lucDireccional', 'det_reversa', 'det_lucInterior', 'det_encendido', 'det_velocidad', 'det_freno', 'det_mano', 'det_sensor', 'det_fecha', 'unidadNombre'], 'safe'],
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
        $query = Detalle::find();

        // add conditions that should always apply here
        $query->joinWith('detFkunidad');

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
            'det_id' => $this->det_id,
            'det_fecha' => $this->det_fecha,
            'det_fkunidad' => $this->det_fkunidad,
        ]);

        $query->andFilterWhere(['like', 'det_comentario', $this->det_comentario])
            ->andFilterWhere(['like', 'det_asiento', $this->det_asiento])
            ->andFilterWhere(['like', 'det_cinturon', $this->det_cinturon])
            ->andFilterWhere(['like', 'det_claxon', $this->det_claxon])
            ->andFilterWhere(['like', 'det_tablero', $this->det_tablero])
            ->andFilterWhere(['like', 'det_clima', $this->det_clima])
            ->andFilterWhere(['like', 'det_antena', $this->det_antena])
            ->andFilterWhere(['like', 'det_encendedor', $this->det_encendedor])
            ->andFilterWhere(['like', 'det_tapete', $this->det_tapete])
            ->andFilterWhere(['like', 'det_carroceria', $this->det_carroceria])
            ->andFilterWhere(['like', 'det_trasera', $this->det_trasera])
            ->andFilterWhere(['like', 'det_delantera', $this->det_delantera])
            ->andFilterWhere(['like', 'det_tapon', $this->det_tapon])
            ->andFilterWhere(['like', 'det_parabrisa', $this->det_parabrisa])
            ->andFilterWhere(['like', 'det_limparabrisa', $this->det_limparabrisa])
            ->andFilterWhere(['like', 'det_aceite', $this->det_aceite])
            ->andFilterWhere(['like', 'det_rines', $this->det_rines])
            ->andFilterWhere(['like', 'det_retrovisores', $this->det_retrovisores])
            ->andFilterWhere(['like', 'det_liqfreno', $this->det_liqfreno])
            ->andFilterWhere(['like', 'det_anticongelante', $this->det_anticongelante])
            ->andFilterWhere(['like', 'det_hidraulico', $this->det_hidraulico])
            ->andFilterWhere(['like', 'det_combustible', $this->det_combustible])
            ->andFilterWhere(['like', 'det_luces', $this->det_luces])
            ->andFilterWhere(['like', 'det_lucDelantera', $this->det_lucDelantera])
            ->andFilterWhere(['like', 'det_lucDireccional', $this->det_lucDireccional])
            ->andFilterWhere(['like', 'det_reversa', $this->det_reversa])
            ->andFilterWhere(['like', 'det_lucInterior', $this->det_lucInterior])
            ->andFilterWhere(['like', 'det_encendido', $this->det_encendido])
            ->andFilterWhere(['like', 'det_velocidad', $this->det_velocidad])
            ->andFilterWhere(['like', 'det_freno', $this->det_freno])
            ->andFilterWhere(['like', 'det_mano', $this->det_mano])
            ->andFilterWhere(['like', 'det_sensor', $this->det_sensor])
            ->andFilterWhere(['like', 'uni_serie', $this->unidadNombre]);

        return $dataProvider;
    }
}
