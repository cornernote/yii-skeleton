<?php

/**
 * SiteController
 */
class SiteController extends YdWebController
{

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow',
                'actions' => array('index', 'page', 'error', 'login', 'logout', 'lostPassword', 'resetPassword', 'signUp', 'activate', 'resendActivation', 'hybridAuth'),
                'users' => array('*'),
            ),
            array('allow',
                'actions' => array('overview', 'account', 'updateAccount', 'changePassword'),
                'users' => array('@'),
            ),
            array('allow',
                'actions' => array('clearCache'),
                'roles' => array('admin'),
            ),
            array('deny', 'users' => array('*')),
        );
    }


    /**
     * Declares class-based actions.
     * @return array
     */
    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
            // account actions
            'signUp' => array(
                'class' => 'account.actions.AccountSignUpAction',
            ),
            'activate' => array(
                'class' => 'account.actions.AccountActivateAction',
            ),
            'resendActivation' => array(
                'class' => 'account.actions.AccountResendActivationAction',
            ),
            'lostPassword' => array(
                'class' => 'account.actions.AccountLostPasswordAction',
            ),
            'resetPassword' => array(
                'class' => 'account.actions.AccountResetPasswordAction',
            ),
            'login' => array(
                'class' => 'account.actions.AccountLoginAction',
            ),
            'logout' => array(
                'class' => 'account.actions.AccountLogoutAction',
            ),
            'account' => array(
                'class' => 'account.actions.AccountViewAction',
            ),
            'updateAccount' => array(
                'class' => 'account.actions.AccountUpdateAction',
            ),
            'changePassword' => array(
                'class' => 'account.actions.AccountChangePasswordAction',
            ),
            'hybridAuth' => array(
                'class' => 'account.actions.AccountHybridAuthAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex()
    {
        $this->render('index');
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Clears site cache
     */
    public function actionClearCache()
    {
        // cache
        cache()->flush();
        cache('apc')->flush();
        cache('db')->flush();
        cache('file')->flush();

        // assets
        if (!Yii::app()->getAssetManager()->linkAssets) {
            YdFileHelper::removeDirectory(Yii::app()->getAssetManager()->basePath, false);
        }

        // all done
        user()->addFlash(t('Server cache has been cleared.'), 'success');
        $this->redirect(Yii::app()->returnUrl->getUrl());
    }
    
}
