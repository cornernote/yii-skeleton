<?php

/**
 * ToolController
 *
 * @author Brett O'Donnell <cornernote@gmail.com>
 * @author Zain Ul abidin <zainengineer@gmail.com>
 * @copyright 2013 Brett O'Donnell <cornernote@gmail.com>, Zain Ul abidin <zainengineer@gmail.com>
 * @link https://github.com/cornernote/yii-skeleton
 * @license http://www.gnu.org/copyleft/gpl.html
 */
class ToolController extends YdWebController
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
                'actions' => array('index', 'clearCache', 'generateProperties'),
                'roles' => array('admin'),
            ),
            array('deny', 'users' => array('*')),
        );
    }

    /**
     * @return array
     */
    public function actions()
    {
        return array(
            'generateProperties' => array(
                'class' => 'dressing.actions.YdGeneratePropertiesAction',
            ),
        );
    }

    /**
     *
     */
    public function actionIndex()
    {
        $this->render('dressing.views.tool.index');
    }

    /**
     *
     */
    public function actionClearCache()
    {
        // cache
        cache()->flush();
        cache('db')->flush();
        cache('file')->flush();

        // assets
        YdFileHelper::removeDirectory(app()->getAssetManager()->basePath, false);

        // all done
        user()->addFlash(t('Server cache has been cleared.'), 'success');
        $this->redirect(Yii::app()->returnUrl->getUrl());
    }

}

