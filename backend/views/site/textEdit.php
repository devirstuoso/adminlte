<?php
use kartik\editors\Summernote;


echo Summernote::widget([
    'name' => 'blog_post',
    'value' => '',
    'useKrajeeStyle' => false,
    'useKrajeePresets' => true,
    'enableFullScreen' => false,
    'enableCodeView' => false,
    'enableHelp' => false,
    'enableHintEmojis' => true,
    'hintMentions' => ['devanshu', 'institute of Eminence', 'University of Delhi', 'DU', 'IOE']
]);
?>