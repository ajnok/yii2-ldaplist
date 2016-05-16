<?php
/**
 * Created by PhpStorm.
 * User: ajnok
 * Date: 5/16/2016 AD
 * Time: 23:38
 */

namespace ajnok\ldaplist\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}