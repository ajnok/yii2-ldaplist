<?php
/**
 * Created by PhpStorm.
 * User: ajnok
 * Date: 5/17/2016 AD
 * Time: 00:12
 */

namespace ajnok\ldaplist\controllers;

use yii\web\Controller;

class ManageController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}