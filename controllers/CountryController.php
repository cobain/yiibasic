<?php
/**
 * Created by PhpStorm.
 * User: htzheng
 * Date: 10/2/17
 * Time: 5:28 PM
 */

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Country;

class CountryController extends Controller
{
	public function actionIndex()
	{
		$query = Country::find();

		$pagination = new Pagination([
			'defaultPageSize' => 5,
			'totalCount' => $query->count(),
		]);

		$countries = $query->orderBy('name')
		                   ->offset($pagination->offset)
		                   ->limit($pagination->limit)
		                   ->all();

		return $this->render('index', [
			'countries' => $countries,
			'pagination' => $pagination,
		]);
	}
}