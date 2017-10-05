<?php
/**
 * Created by PhpStorm.
 * User: htzheng
 * Date: 10/2/17
 * Time: 12:33 PM
 */

namespace app\models;

use Yii;
use yii\base\Model;

class EntryForm extends Model
{
	public $name;
	public $email;

	public function rules()
	{
		return [
			[['name', 'email'], 'required'],
			['email', 'email'],
		];
	}
}