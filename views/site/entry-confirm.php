<?php
/**
 * Created by PhpStorm.
 * User: htzheng
 * Date: 10/2/17
 * Time: 12:30 PM
 */

use yii\helpers\Html;
?>
<p>You have entered the following information:</p>

<ul>
	<li><label>Name</label>: <?= Html::encode($model->name) ?></li>
	<li><label>Email</label>: <?= Html::encode($model->email) ?></li>
</ul>