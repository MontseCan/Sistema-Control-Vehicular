<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Servicio;

/**
 * ServicioSearch represents the model behind the search form of `app\models\Servicio`.
 */
class ServicioSearch extends Servicio
{
    public $unidadNombre;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ser_id', 'ser_precio', 'ser_kilometraje', 'ser_fkunidad'], 'integer'],
            [['ser_nombre', 'ser_fecha', 'ser_lugar', 'ser_proximo', 'ser_tipo', 'ser_cotizacion', 'ser_factura', 'unidadNombre'], 'safe'],
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
        $query = Servicio::find();

        // add conditions that should always apply here
        $query->joinWith('serFkunidad');

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
            'ser_id' => $this->ser_id,
            'ser_fecha' => $this->ser_fecha,
            'ser_precio' => $this->ser_precio,
            'ser_kilometraje' => $this->ser_kilometraje,
            'ser_fkunidad' => $this->ser_fkunidad,
        ]);

        $query->andFilterWhere(['like', 'ser_nombre', $this->ser_nombre])
            ->andFilterWhere(['like', 'ser_lugar', $this->ser_lugar])
            ->andFilterWhere(['like', 'ser_proximo', $this->ser_proximo])
            ->andFilterWhere(['like', 'ser_tipo', $this->ser_tipo])
            ->andFilterWhere(['like', 'ser_cotizacion', $this->ser_cotizacion])
            ->andFilterWhere(['like', 'ser_factura', $this->ser_factura])
            ->andFilterWhere(['like', 'uni_serie', $this->unidadNombre]);

        return $dataProvider;
    }
}
