<?php

/**
 *  _   __ __ _____ _____ ___  ____  _____
 * | | / // // ___//_  _//   ||  __||_   _|
 * | |/ // /(__  )  / / / /| || |     | |
 * |___//_//____/  /_/ /_/ |_||_|     |_|
 * @link https://vistart.name/
 * @copyright Copyright (c) 2016 vistart
 * @license https://vistart.name/license/
 */
/* @var $this yii\web\View */
/* @var $groups common\models\user\relation\FollowGroup[] */
use rho_contact\widgets\contact\PanelWidget;
use Faker\Factory;

$this->title = 'Contacts';
?>
<?= PanelWidget::widget(['models' => Yii::$app->user->identity->follows, 'groups' => $groups, 'getItemUrl' => 'contact/gets', 'getCountUrl' => ['contact/gets', 'list' => 1]]) ?>
<?= var_dump(Yii::$app->request->resolve()) ?>
<?php $faker = Factory::create('zh_CN'); ?>
<?= $faker->name ?>
<br>
<?= $faker->lastName . $faker->firstNameMale ?>