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
     * @return array
     */
    public function behaviors()
    {
        return array(
            'webController' => array(
                'class' => 'dressing.behaviors.YdWebControllerBehavior',
            ),
        );
    }
    
}
