<?php
/**
 * /var/www/html/yiiyak/console/runtime/giiant/e0080b9d6ffa35acb85312bf99a557f2
 *
 * @package default
 */


namespace backend\modules\crud\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\crud\models\IcsrOutcome as IcsrOutcomeModel;

/**
 * IcsrOutcome represents the model behind the search form about `backend\modules\crud\models\IcsrOutcome`.
 */
class IcsrOutcome extends IcsrOutcomeModel
{

	/**
	 *
	 * @inheritdoc
	 * @return unknown
	 */
	public function rules() {
		return [
			[['icsr_id', 'icsr_outcome_lkp_id'], 'integer'],
			[['icsr_outcome_date'], 'safe'],
		];
	}


	/**
	 *
	 * @inheritdoc
	 * @return unknown
	 */
	public function scenarios() {
		// bypass scenarios() implementation in the parent class
		return Model::scenarios();
	}


	/**
	 * Creates data provider instance with search query applied
	 *
	 *
	 * @param array   $params
	 * @return ActiveDataProvider
	 */
	public function search($params) {
		$query = IcsrOutcomeModel::find();

		$dataProvider = new ActiveDataProvider([
				'query' => $query,
			]);

		$this->load($params);

		if (!$this->validate()) {
			// uncomment the following line if you do not want to any records when validation fails
			// $query->where('0=1');
			return $dataProvider;
		}

		$query->andFilterWhere([
				'icsr_id' => $this->icsr_id,
				'icsr_outcome_lkp_id' => $this->icsr_outcome_lkp_id,
				'icsr_outcome_date' => $this->icsr_outcome_date,
			]);

		return $dataProvider;
	}


}
