<?php
/**
 * WebController
 *
 * @author Brett O'Donnell <cornernote@gmail.com>
 * @author Zain Ul abidin <zainengineer@gmail.com>
 * @copyright 2013 Mr PHP
 * @link https://github.com/cornernote/yii-skeleton
 * @license http://www.gnu.org/copyleft/gpl.html 
 */
class WebController extends Controller
{
    /**
     * @var string the default layout for the controller view.
     */
    public $layout = 'dressing.views.layouts.default';

    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();

    /**
     * @var
     */
    public $pageHeading;

    /**
     * @var
     */
    public $pageSubheading;

    /**
     * @var
     */
    public $pageIcon;

    /**
     * @var
     */
    public $showNavBar = true;

    /**
     * @var bool
     */
    public $isModal;

    /**
     * @var
     */
    protected $loadModel;

    /**
     * Initializes the controller.
     */
    public function init()
    {
        parent::init();
        $app = Yii::app();
        $user = $app->user;

        // set user theme
        if ($user->user && $user->user->asa('EavBehavior'))
            if ($theme = $user->user->getEavAttribute('theme'))
                $app->setTheme($theme);

        // set the heading from the title
        if ($this->pageHeading === null)
            $this->pageHeading = $this->pageTitle;

        // decide if this is a modal
        if ($this->isModal === null)
            $this->isModal = $app->getRequest()->isAjaxRequest;

        // register yii-dressing style
        $app->clientScript->registerCSSFile($app->dressing->getAssetsUrl() . '/css/yii-dressing.css');

        // init widgets
        if (!$app->request->isAjaxRequest) {
            $this->widget('dressing.widgets.YdModal');
            $this->widget('dressing.components.YdFancyBox');
            $this->widget('dressing.widgets.YdQTip');
        }
    }

    /**
     * Gets the humanized name of the controller
     *
     * @param bool $plural
     * @return mixed
     */
    public function getName($plural = false)
    {
        return ucwords(trim(strtolower(str_replace(array('-', '_', '.'), ' ', preg_replace('/(?<![A-Z])[A-Z]/', ' \0', str_replace('Controller', '', get_class($this))))))) . ($plural ? 's' : '');
    }

    /**
     * Performs the AJAX validation for one or more CActiveRecord models
     *
     * @param $model CActiveRecord|CActiveRecord[]
     * @param $form
     */
    protected function performAjaxValidation($model, $form)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === $form) {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    /**
     * Performs validation for one or more CActiveRecord models
     *
     * @param $model CActiveRecord|CActiveRecord[]
     * @return bool
     */
    protected function performValidation($model)
    {
        if (!is_array($model)) {
            $model = array($model);
        }
        $valid = true;
        /** @var CActiveRecord[] $model */
        foreach ($model as $_model) {
            if (!$_model->validate()) {
                $valid = false;
            }
        }
        return $valid;
    }

    /**
     * Loads a CActiveRecord or throw a CHTTPException
     *
     * @param $id
     * @param bool|string $model
     * @return CActiveRecord
     * @throws CHttpException
     */
    public function loadModel($id, $model = false)
    {
        if (!$model)
            $model = str_replace('Controller', '', get_class($this));
        if ($this->loadModel === null) {
            $this->loadModel = CActiveRecord::model($model)->findbyPk($id);
            if ($this->loadModel === null)
                throw new CHttpException(404, Yii::t('dressing', 'The requested page does not exist.'));
        }
        return $this->loadModel;
    }

    /**
     * Gives the user a flash message and then redirects them
     *
     * @param $message
     * @param $messageType
     * @param null $url
     */
    protected function flashRedirect($message, $messageType = 'info', $url = null)
    {
        Yii::app()->user->addFlash($message, $messageType);
        if (!Yii::app()->request->isAjaxRequest) {
            $this->redirect($url ? $url : Yii::app()->returnUrl->getUrl());
        }
        Yii::app()->end();
    }

}
