<?php
/**
 * Created by PhpStorm.
 * User: ajnok
 * Date: 5/16/2016 AD
 * Time: 23:32
 */

namespace ajnok\ldaplist;

use Yii;
class Module extends \yii\base\Module
{
    public function init()
    {
        parent::init();
        $this->_registerTranslations();
    }
    private function _registerTranslations()
    {
        if (!isset(Yii::$app->i18n->translations['ldaplist'])) {
            Yii::$app->i18n->translations['ldaplist'] = [
                'class' => 'yii\i18n\PhpMessageSource',
                'sourceLanguage' => 'en-US',
                'basePath' => '@ajnok/ldaplist/messages',
            ];
        }
    }

}