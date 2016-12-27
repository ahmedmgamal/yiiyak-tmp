<?php
/**
 * /var/www/html/yiiyak/console/runtime/giiant/358b0e44f1c1670b558e36588c267e47
 *
 * @package default
 */


// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace backend\modules\crud\controllers\base;

use backend\modules\crud\models\Company;
use backend\modules\crud\models\Drug;
use backend\modules\crud\models\search\Company as CompanySearch;
use Faker\Provider\cs_CZ\DateTime;
use FPDF;
use mPDF;
use Yii;
use yii\web\Controller;
use yii\web\HttpException;
use yii\helpers\Url;
use dmstr\bootstrap\Tabs;
use backend\modules\crud\models\User;

/**
 * CompanyController implements the CRUD actions for Company model.
 */
class CompanyController extends Controller
{

	/**
	 *
	 * @var boolean whether to enable CSRF validation for the actions in this controller.
	 * CSRF validation is enabled only when both this property and [[Request::enableCsrfValidation]] are true.
	 */
	public $enableCsrfValidation = false;




	/**
	 * Lists all Company models.
	 *
	 * @return mixed
	 */
	public function actionIndex() {

        $searchModel  = new CompanySearch;
		$dataProvider = $searchModel->search($_GET);

		Tabs::clearLocalStorage();

		Url::remember();
		\Yii::$app->session['__crudReturnUrl'] = null;

		return $this->render('index', [
				'dataProvider' => $dataProvider,
				'searchModel' => $searchModel,
			]);
	}


	/**
	 * Displays a single Company model.
	 *
	 * @param integer $id
	 * @return mixed
	 */
	public function actionView($id) {
		\Yii::$app->session['__crudReturnUrl'] = Url::previous();
		Url::remember();
		Tabs::rememberActiveState();

		return $this->render('view', [
				'model' => $this->findModel($id),
			]);
	}


	/**
	 * Creates a new Company model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 *
	 * @return mixed
	 */
	public function actionCreate() {
		$model = new Company;
        $userModel = new User;

        $request = \Yii::$app->request;

        if ($request->isPost){
        $connection = \Yii::$app->db;
        $transaction = $connection->beginTransaction();
        }

		try {
			if ($model->load($_POST) && $model->save() && $userModel->load($_POST) ) {
			   $userModel->company_id = $model->id;
                $userModel->save();
                $transaction->commit();
                return $this->redirect(Url::previous());
			} elseif (!\Yii::$app->request->isPost) {
				$model->load($_GET);
			}

		} catch (\Exception $e) {
		    $transaction->rollBack();
			$msg = (isset($e->errorInfo[2]))?$e->errorInfo[2]:$e->getMessage();
			$model->addError('_exception', $msg);
		}
		return $this->render('create', ['model' => $model , 'userModel' => $userModel]);
	}


	/**
	 * Updates an existing Company model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 *
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($id) {
		$model = $this->findModel($id);

		if ($model->load($_POST) && $model->save()) {
			return $this->redirect(Url::previous());
		} else {
			return $this->render('update', [
					'model' => $model,
				]);
		}
	}


	/**
	 * Deletes an existing Company model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 *
	 * @param integer $id
	 * @return mixed
	 */
	public function actionDelete($id) {
		try {
			$this->findModel($id)->delete();
		} catch (\Exception $e) {
			$msg = (isset($e->errorInfo[2]))?$e->errorInfo[2]:$e->getMessage();
			\Yii::$app->getSession()->addFlash('error', $msg);
			return $this->redirect(Url::previous());
		}


		// TODO: improve detection
		$isPivot = strstr('$id', ',');
		if ($isPivot == true) {
			return $this->redirect(Url::previous());
		} elseif (isset(\Yii::$app->session['__crudReturnUrl']) && \Yii::$app->session['__crudReturnUrl'] != '/') {
			Url::remember(null);
			$url = \Yii::$app->session['__crudReturnUrl'];
			\Yii::$app->session['__crudReturnUrl'] = null;

			return $this->redirect($url);
		} else {
			return $this->redirect(['index']);
		}
	}


	/**
	 * Finds the Company model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 *
	 * @throws HttpException if the model cannot be found
	 * @param integer $id
	 * @return Company the loaded model
	 */
	protected function findModel($id) {
		if (($model = Company::findOne($id)) !== null) {
			return $model;
		} else {
			throw new HttpException(404, 'The requested page does not exist.');
		}
	}

	public function actionFullExport(){
        $company = Yii::$app->user->identity->getCompany()->one();
        $drugs = $company->drugs;
//        $pdf = new FPDF();
////
//        $pdf->AddPage();
//        header('Content-type: text/xml');
        $mpdf = new mPDF();
        $mpdf->Bookmark('Company');
        $companyHtml = $this->generateCompanyHtml($company);
        $drugsHtml = $this->generateDrugsHtml($drugs);
        $mpdf->WriteHTML($companyHtml);
        $mpdf->AddPage();
        $mpdf->Bookmark('Drugs');
        $mpdf->WriteHTML("<div><h2 style=\"text-align: center;\">Company Drugs</h2></div>");
        $mpdf->WriteHTML($drugsHtml);
        $mpdf->Output();

    }
    private function generateCompanyHtml($company){
        $companyDate = date_create($company->end_date);
	    $html = "<div>";
        $html .= "<div style='width: 100%;text-align: center;'><img src='{$company->license_image_url}' width='150px' height='150px' /></div>";
        $html .= "<h2><strong>Company Name:</strong> ".$company->name."</h2>";
        $html .= "<p><strong>Company Short Name:</strong> ".$company->name."</p>";
        $html .= "<p><strong>License No#:</strong> ".$company->license_no."</p>";
        $html .= "<p><strong>End Date:</strong> ".date_format($companyDate,'d-m-Y') ."</p>";
        $html .="<p><strong>Address:</strong> ".$company->adderess."</p>";
        return $html;
    }
    private function generateDrugsHtml($drugs){
        $html = "<div>";
        $html .= "<table style='border: 1px solid black;width:100%;border-collapse: collapse;'>";
        $html .= "<thead>";
        $html .= "<tr>";
        $html .= "<th style='border:1px solid black'>Generic Name</th>";
        $html .= "<th style='border:1px solid black'>Trade Name</th>";
        $html .= "<th style='border:1px solid black'>Dosage Form</th>";
        $html .= "<th style='border:1px solid black'>Strength</th>";
        $html .= "<th style='border:1px solid black'>Manufacturer</th>";
        $html .= "<th style='border:1px solid black'>Manufacturer</th>";
        $html .= "</tr>";
        $html .= "</thead>";
        $html .="<tbody>";
        foreach ($drugs as $drug){
            $html .= "<tr>";
            $html .= "<td style='border:1px solid black'>{$drug->generic_name}</td>";
            $html .= "<td style='border:1px solid black'>{$drug->trade_name}</td>";
            $html .= "<td style='border:1px solid black'>{$drug->composition}</td>";
            $html .= "<td style='border:1px solid black'>{$drug->strength}</td>";
            $html .= "<td style='border:1px solid black'>{$drug->manufacturer}</td>";
            $html .= "<td style='border:1px solid black'>{$drug->routeLkp->description}</td>";
            $html .= "</tr>";

        }
        $html .="</tbody>";
        $html .= "</table>";
        $html .= "</div>";
        return $html;
    }

}
