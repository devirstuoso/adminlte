<?php

return [
    'enquiry' => [
        'id' => 'enquiry',
        'name' => 'demo',
        'email' => 'demo@ioe.in',
        'message' => '',
    ],
    'enquiry000001' => [
        'id' => 'enquiry000001',
        'name' => 'devanshu',
        'email' => 'devanshu.mcs19.du@gmail.com',
        'message' => 'hello ioe',
    ],
    'enquiry000002' => [
        'name' => 'user',
        'email' => 'user.01@gmail.com',
        'message' => 'This is important to remember. Love isn\'t like pie. You don\'t need to divide it among all your friends and loved ones. No matter how much love you give, you can always give more. It doesn\'t run out, so don\'t try to hold back giving it as if it may one day run out. Give it freely and as much as you want.',
        'id' => 'enquiry000002',
    ],
    'enquiry000003' => [
        'name' => 'devanshu',
        'email' => 'devanshu.mcs19.du@gmail.com',
        'message' => 'The amber droplet hung from the branch, reaching fullness and ready to drop. It waited. While many of the other droplets were satisfied to form as big as they could and release, this droplet had other plans. It wanted to be part of history. It wanted to be remembered long after all the other droplets had dissolved into history. So it waited for the perfect specimen to fly by to trap and capture that it hoped would eventually be discovered hundreds of years in the future.
She sat in the darkened room waiting. It was now a standoff. He had the power to put her in the room, but not the power to make her repent. It wasn\'t fair and no matter how long she had to endure the darkness, she wouldn\'t change her attitude. At three years old, Sandy\'s stubborn personality had already bloomed into full view.
The day had begun on a bright note. The sun finally peeked through the rain for the first time in a week, and the birds were sinf=ging in its warmth. There was no way to anticipate what was about to happen. It was a worst-case scenario and there was no way out of it.',
        'id' => 'enquiry000003',
    ],
    'enquiry000005' => [
        'name' => 'devanshu',
        'email' => 'devanshu@verma.com',
        'message' => '<?php if (Yii::$app->session->hasFlash(\'success\')): ?>
    <div class="alert alert-success alert-dismissable">
     <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
     <h4><i class="icon fa fa-check"></i>Saved!</h4>
     <?= Yii::$app->session->getFlash(\'success\') ?>
 </div>
<?php endif; ?>

<?php if (Yii::$app->session->hasFlash(\'error\')): ?>
    <div class="alert alert-danger alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <h4><i class="icon fa fa-exclamation"></i>Unable to save!</h4>
        <?= Yii::$app->session->getFlash(\'error\') ?>
    </div>
<?php endif; ?>',
        'id' => 'enquiry000005',
    ],
    'enquiry000006' => [
        'name' => 'devanshu',
        'email' => 'devanshu.mcs19.du@gmail.com',
        'message' => '',
        'id' => 'enquiry000006',
    ],
    'enquiry000007' => [
        'name' => 'devanshu',
        'email' => 'devanshu.mcs19.du@gmail.com',
        'message' => '5


I\'ve tried to search the information according to this, but couldn\'t find any useful ones.. I just created email sending in Yii2 and the email sends as a "My Application", I guess it\'s because standard Yii::$app->name is like that. Could someone tell me how to change it?

yii2
Share
Improve this question
Follow
asked May 20 \'17 at 15:56

MKD
28333 gold badges55 silver badges1414 bronze badges
I understand you, you can not find any place where this var is setted, as you could expect it. – Juan Antonio Mar 18 \'19 at 12:28
Add a comment
1 Answer

16

Yii::$app->name value is assigned in your application config

You can change the id and name attribute in your config file

\'id\' => \'your-applicatio-id\',
\'name\' => \'Your application Name\',
these attributesa are store in different file depend by the template you are using

in basic templae you can set these values in',
        'id' => 'enquiry000007',
    ],
    'enquiry000008' => [
        'name' => 'devanshu',
        'email' => 'devanshuverma158@gmail.com',
        'message' => '',
        'id' => 'enquiry000008',
    ],
    'enquiry000009' => [
        'name' => 'devanshu',
        'email' => 'devanshuverma158@gmail.com',
        'message' => '',
        'id' => 'enquiry000009',
    ],
    'enquiry000010' => [
        'name' => 'devanshu',
        'email' => 'devanshu@gmail.com',
        'message' => '',
        'id' => 'enquiry000010',
    ],
    'enquiry000011' => [
        'name' => '76iu7u6',
        'email' => 'tyjjty@gmail.com',
        'message' => '',
        'id' => 'enquiry000011',
    ],
    'enquiry000012' => [
        'name' => 'get4rh',
        'email' => 'digitalumesh5@gmail.com',
        'message' => 'hi',
        'id' => 'enquiry000012',
    ],
    'enquiry000013' => [
        'name' => 'umesh',
        'email' => 'digitalumesh56@gmail.com',
        'message' => 'hi',
        'id' => 'enquiry000013',
    ],
    'enquiry000014' => [
        'name' => 'dev',
        'email' => 'devanshu@gmail.com',
        'message' => 'wefew',
        'id' => 'enquiry000014',
    ],
    'enquiry000015' => [
        'name' => 'sameer hwa ka jhoka',
        'email' => 'sd.mehta1993@gmail.com',
        'message' => '',
        'id' => 'enquiry000015',
    ],
];