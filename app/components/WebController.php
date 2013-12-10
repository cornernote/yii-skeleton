<?php
/**
 * WebController
 * 
 * Properties and Methods from behavior YdWebControllerBehavior
 * @property string $name
 * @property array $menu
 * @property array $breadcrumbs
 * @property string $pageHeading
 * @property string $pageSubheading
 * @property string $pageIcon
 * @property bool $showNavBar
 * @property bool $isModal
 * @method performValidation() bool performValidation(CActiveRecord|CActiveRecord[] $model)
 * @method performAjaxValidation() void performAjaxValidation(CActiveRecord|CActiveRecord[] $model, string $form)
 * @method loadModel() CActiveRecord loadModel(mixed $id, bool|string $model)
 * @method flashRedirect() void flashRedirect(string $message, string $messageType = 'info', mixed $url)
 * @method addBreadcrumb() void addBreadcrumb(string $name, string|array $link = null)
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

        // init widgets
        if (!$app->request->isAjaxRequest) {
            $app->clientScript->registerCSSFile($app->dressing->getAssetsUrl() . '/css/yii-dressing.css');
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
