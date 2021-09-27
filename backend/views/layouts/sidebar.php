<?php
    use \hail812\adminlte\widgets;
    use yii\helpers\Html;

    $session = Yii::$app->session;
    $session->open();

?>


<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->



    <a href="<?php echo Yii::$app->urlManagerFrontend->createUrl("");?>" class="brand-link" target ="_blank" data-toggle = "tooltip" title = "Hint">
        <?= Html::img('@web/img/du-logo.png',['alt'=>'DU Logo', 'class'=> 'brand-image img-circle elevation-4']); ?>
        <span class="brand-text font-weight-light">DU IOE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <?= Html::img('@web/img/user1.png',['alt'=>'User image', 'class'=> 'img-circle elevation-2']); ?>
            </div>
            <div class="info">
                <a href="<?php echo Yii::$app->urlManager->createUrl("site/user-details");?>" class="d-block"><?= strtoupper($session->get('username'));?></a>
                <?php if(!Yii::$app->user->isGuest){ ?>
                <?= Html::a('<i class="fas fa-sign-out-alt">Logout</i>', ['site/logout'], ['data-method' => 'post', 'class' => 'd-block']) ?>

                <?php }?>
            </div>

        </div>

        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-5">
            <?php
            echo widgets\Menu::widget([
                'items' => [
                    ['label' => 'Login', 'url' => ['site/login'], 'icon' => 'sign-in-alt', 'visible' => Yii::$app->user->isGuest],
                   /* ['label' => 'Logout', 'url' => ['site/logout',  ['data-method' => 'post']], 'icon' => 'sign-out-alt', 'visible' => !Yii::$app->user->isGuest],*/
                    [
                    'label' => 'Insights',
                    'visible' => !(Yii::$app->user->isGuest),
                    'icon' => 'tachometer-alt',
                    'badge' => '<span class="right badge badge-info">Welcome</span>',
                    'url' => ['/site/insights'],
                    ],
                    ['icon' => ''],
                     ['label' => 'Manage Content','icon' => 'th',  'iconStyle' => 'fa', 'iconClassAdded' => 'text-info'],
                    [
                    'label' => 'IoE Website', 
                    // 'icon' => 'th', 
                    'visible' => !(Yii::$app->user->isGuest),
                    'badge' => '<span class="right badge badge-info">8</span>',
                    'items' => [
                            ['label' => 'Header', 'url' => ['/header'], 'iconStyle' => 'far'],
                            ['label' => 'Slider', 'url' => ['/home-slider'], 'iconStyle' => 'far'],
                            ['label' => 'Governing', 'url' => ['/gov-council'], 'iconStyle' => 'far'],
                            ['label' => 'Leadership', 'url' => ['/leadership'], 'iconStyle' => 'far'],
                            ['label' => 'Updates', 'url' => ['/updates-panel'], 'iconStyle' => 'far'],
                            ['label' => 'News&Events', 'url' => ['/news-events'], 'iconStyle' => 'far'],
                            ['label' => 'Careers', 'url' => ['/career'], 'iconStyle' => 'far'],
                            ['label' => 'Footer', 'url' => ['/footer'], 'iconStyle' => 'far'],
                        ]],
                                        [
                    'label' => 'Delhi Schools', 
                    // 'icon' => 'th', 
                    'visible' => !(Yii::$app->user->isGuest),
                    'badge' => '<span class="right badge badge-info">7</span>',
                    'items' => [
                            ['label' => 'Create School', 'url' => ['/schools/schools'], 'iconStyle' => 'far'],
                            ['label' => 'Header', 'url' => ['/schools/school-header'], 'iconStyle' => 'far'],
                            ['label' => 'Home Page', 'url' => ['/schools/school-home'], 'iconStyle' => 'far'],
                            ['label' => 'Objective', 'url' => ['/schools/school-obj'], 'iconStyle' => 'far'],
                            ['label' => 'Governing', 'url' => ['/schools/school-gov-council'], 'iconStyle' => 'far'],
                            ['label' => 'Office Bearers', 'url' => ['/schools/school-office'], 'iconStyle' => 'far'],
                            ['label' => 'Committee', 'url' => ['/schools/school-committee'], 'iconStyle' => 'far'],
                          
                        ]],
                      [
                    'label' => 'Contact form',
                    'visible' => !(Yii::$app->user->isGuest),
                    'icon' => 'info',
                    'url' => ['/contact-form'],
                    ],
                    // [
                    // 'label' => 'Manage Content', 
                    // 'icon' => 'th', 
                    // 'visible' => !(Yii::$app->user->isGuest),
                    // 'badge' => '<span class="right badge badge-info">2</span>',
                    // 'items' => [
                    //         ['label' => 'Base Website', 'url' => ['/site/content-base'], 'iconStyle' => 'far'],
                    //         ['label' => 'Schools', 'url' => ['/site/content-schools'], 'iconStyle' => 'far'],
                    //     ]],

                /*  ['label' => 'Extra tabs', 'header' => true],
                    ['label' => 'Gii',  'icon' => 'file-code', 'url' => ['/gii'], 'target' => '_blank'],
                    ['label' => 'Debug', 'icon' => 'bug', 'url' => ['/debug'], 'target' => '_blank'],
                    ['label' => 'MULTI LEVEL EXAMPLE', 'header' => true],
                    ['label' => 'Level1'],
                    [
                        'label' => 'Level1',
                        'items' => [
                            ['label' => 'Level2', 'iconStyle' => 'far'],
                            [
                                'label' => 'Level2',
                                'iconStyle' => 'far',
                                'items' => [
                                    ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle'],
                                    ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle'],
                                    ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle']
                                ]
                            ],
                            ['label' => 'Level2', 'iconStyle' => 'far']
                        ]
                    ],
                    ['label' => 'Level1'],
                    ['label' => 'LABELS', 'header' => true],
                    ['label' => 'Important', 'iconStyle' => 'far', 'iconClassAdded' => 'text-danger'],
                    ['label' => 'Warning', 'iconClass' => 'nav-icon far fa-circle text-warning'],
                    ['label' => 'Informational', 'iconStyle' => 'far', 'iconClassAdded' => 'text-info'],*/
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>