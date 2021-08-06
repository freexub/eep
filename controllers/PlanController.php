<?php

namespace app\controllers;

use Yii;
use app\models\Plan;
use app\models\PlanSearch;
use app\models\PlanReviewer;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;
use Da\QrCode\QrCode;
use PhpOffice\PhpWord\TemplateProcessor;

/**
 * PlanController implements the CRUD actions for Plan model.
 */
class PlanController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Plan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $userId = Yii::$app->user->getId();
        $searchModel = new PlanSearch();

        if (Yii::$app->authManager->getRolesByUser($userId)['admin']) {
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        } else {
            $cathedra = PlanReviewer::findOne(['user_id' => $userId])['cathedra_id'];
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $cathedra);
        }
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Plan model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Plan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Plan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Plan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Plan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (Yii::$app->authManager->getRolesByUser(Yii::$app->user->getId())['admin']) {  
            $this->findModel($id)->delete();
            return $this->redirect(['index']);
        } else {
            throw new ForbiddenHttpException("Недостаточно прав.");
        }
    }

    public function actionCertificate($id)
    {
        if ($this->findModel($id)['status_id'] == 3) {
            $pdf = $id . '.pdf';
            if (!file_exists(Yii::getAlias('@webroot/certificates/') . $pdf)) {
                $this->generateCertificate($id);
            }
            return $this->render('certificate', ['pdf' => $pdf]);
        } else {
            throw new ForbiddenHttpException("ЭУИ ещё не проверено.");
        }
    }

    protected function generateCertificate($id)
    {
        $months = [
            '01' => [
                'ru' => "января",
                'en' => "january",
                'kz' => "қаңтар",
            ],
            '02' => [
                'ru' => "ферваря",
                'en' => "february",
                'kz' => "ақпан",
            ],
            '03' => [
                'ru' => "марта",
                'en' => "march",
                'kz' => "наурыз",
            ],
            '04' => [
                'ru' => "апреля",
                'en' => "april",
                'kz' => "сәуір",
            ],
            '05' => [
                'ru' => "мая",
                'en' => "may",
                'kz' => "мамыр",
            ],
            '06' => [
                'ru' => "июня",
                'en' => "june",
                'kz' => "маусым",
            ],
            '07' => [
                'ru' => "июля",
                'en' => "july",
                'kz' => "шілде",
            ],
            '08' => [
                'ru' => "августа",
                'en' => "august",
                'kz' => "тамыз",
            ],
            '09' => [
                'ru' => "сентября",
                'en' => "september",
                'kz' => "қыркүйек",
            ],
        ];

        $model = $this->findModel($id);
        $id = $model->id;
        if ($model->type->name == 'МООК') {
            $type = 'МООК';
        } else {
            $type = 'ВУ';
            $lessonType = substr($model->type->name, 6);
        }
        $certificatePath = Yii::getAlias('@webroot/certificates/') . $id;

        $qrCode = (new QrCode($id))
        ->setSize(150)
        ->setMargin(0)
        ->setForegroundColor(0, 0, 0);
        $templateProcessor = new TemplateProcessor('templates/' . $type  . '_' . $model->languages->short_name . '.docx');
        $templateProcessor->setValues([
            'number' =>  $id,
            'name' =>  $model->name,
            'lessonType' =>  isset($lessonType) ? ($lessonType) : (''),
            // 'teacherName' =>  $teacherName,
            // 'teacherName2' =>  isset($values['teacherName2']) ? ($values['teacherName2']) : (''),
            // 'teacherName3' =>  isset($values['teacherName3']) ? ($values['teacherName3']) : (''),
            'department' =>  $model->cathedra->name,
            'discipline' =>  $model->discipline,
            // 'speciality' =>  $speciality,
            // 'speciality2' =>  isset($values['speciality2']) ? ($values['speciality2']) : (''),
            // 'speciality3' =>  isset($values['speciality3']) ? ($values['speciality3']) : (''),
            // 'day' =>  isset($values['day']) ? ($values['day']) : (date('d')),
            // 'month' => isset($values['month']) ? ($months[$values['month']][$lang]) : ($months[date('m')][$lang]),
            // 'year' =>  isset($values['year']) ? ($values['year']) : (date('y')),
            // 'amount' =>  isset($values['amount']) ? ($values['amount']) : (''),
        ]);
        $templateProcessor->setImageValue('qrCode', $qrCode->writeDataUri());
        $templateProcessor->saveAs($certificatePath . '.docx');
        exec('"' . Yii::$app->params['libreOfficePath'] . '"' . ' --convert-to pdf "' . $certificatePath . '.docx" --outdir "' . Yii::getAlias('@webroot/certificates/') . '"');
        unlink($certificatePath . '.docx');
    }

    /**
     * Finds the Plan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Plan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Plan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
