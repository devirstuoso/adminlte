<?php
namespace common\widgets;

use Yii;



/**
 * Alert widget renders a message from session flash. All flash messages are displayed
 * in the sequence they were assigned using setFlash. You can set message as following:
 *
 * ```php
 * Yii::$app->session->setFlash('error', 'This is the message');
 * Yii::$app->session->setFlash('success', 'This is the message');
 * Yii::$app->session->setFlash('info', 'This is the message');
 * ```
 *
 * Multiple messages could be set as follows:
 *
 * ```php
 * Yii::$app->session->setFlash('error', ['Error 1', 'Error 2']);
 * ```
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @author Alexander Makarov <sam@rmcreative.ru>
 */
class Alert extends \yii\bootstrap\Widget
{
    /**
     * @var array the alert types configuration for the flash messages.
     * This array is setup as $key => $value, where:
     * - key: the name of the session flash variable
     * - value: the bootstrap alert type (i.e. danger, success, info, warning)
     */
    protected $size = ' alert alert-lg alert-dismissable';
    public $alertTypes = [
        'error'   => 'alert-danger',
        'danger'  => 'alert-danger',
        'success' => 'alert-success',
        'info'    => 'alert-info',
        'warning' => 'alert-warning'
    ];

    public $alertMsg = [
        'error'   => '<h3><i class="icon fa fa-esclamation"></i> Error</h3>',
        'danger'  => '<h3><i class="icon fa fa-esclamation"></i> Danger</h3>',
        'success' => '<h3><i class="icon fa fa-check"></i> Success</h3>',
        'info'    => '<h3><i class="fas fa-info"></i> Info</h3>',
        'warning' => '<h3><i class="fas fa-exclamation"></i> Warning</h3>'
    ];


    /**
     * @var array the options for rendering the close button tag.
     * Array will be passed to [[\yii\bootstrap\Alert::closeButton]].
     */
    public $closeButton = ['label' =>'<i class="fas fa-times-circle"></i>'];


    /**
     * {@inheritdoc}
     */
    public function run()
    {
        $session = Yii::$app->session;
        $flashes = $session->getAllFlashes();
        $appendClass = isset($this->options['class']) ? ' ' . $this->options['class'] : '';

        foreach ($flashes as $type => $flash) {
            if (!isset($this->alertTypes[$type])) {
                continue;
            }

            foreach ((array) $flash as $i => $message) {
                echo \yii\bootstrap4\Alert::widget([
                    'body' =>  $this->alertMsg[$type] . $message,
                    'closeButton' => $this->closeButton,
                    'options' => array_merge($this->options, [
                        'id' => $this->getId() . '-' . $type . '-' . $i,
                        'class' => $this->alertTypes[$type] . $this->size . $appendClass,
                    ]),
                ]);
            }

            $session->removeFlash($type);
        }
    }
}

?>

<style type="text/css">
    .alert-lg{
        min-height: 8vh;
        font-size: 1.1rem;
        align-items: center;
        display: block;
    }
</style>

