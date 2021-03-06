<?php

/**
 * AccountController
 */
class AccountController extends WebController
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
                'actions' => array('login', 'lostPassword', 'resetPassword', 'signup', 'activate', 'resendActivation', 'hybridAuth'),
                'users' => array('?'),
            ),
            array('allow',
                'actions' => array('index', 'logout', 'update', 'password'),
                'users' => array('@'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    /**
     * Declares class-based actions.
     * @return array
     */
    public function actions()
    {
        return array(
            'signup' => array(
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
            'view' => array(
                'class' => 'account.actions.AccountViewAction',
            ),
            'update' => array(
                'class' => 'account.actions.AccountUpdateAction',
            ),
            'password' => array(
                'class' => 'account.actions.AccountChangePasswordAction',
            ),
            'hybridAuth' => array(
                'class' => 'account.actions.AccountHybridAuthAction',
            ),
        );
    }

}
