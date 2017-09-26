<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= !Yii::$app->user->isGuest ?   Yii::$app->user->identity->username  : 'Guest' ;?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    
                   
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    
                    [
                        'label' => '产品管理',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => '产品列表', 'icon' => 'file-code-o', 'url' => ['/product'],],
                            ['label' => '分类列表', 'icon' => 'dashboard', 'url' => ['/category'],],
                           
                        ],
                    ],
                    
                    [
                        'label' => '资讯管理',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => '资讯管理', 'icon' => 'file-code-o', 'url' => ['/article'],],
                            ['label' => '分类管理', 'icon' => 'dashboard', 'url' => ['/artcat'],],
                           
                        ],
                    ],
                    
                     [
                        'label' => '会员管理',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => '会员列表', 'icon' => 'file-code-o', 'url' => ['/member'],],
                            ['label' => '会员组列表', 'icon' => 'dashboard', 'url' => ['/group'],],
                           
                        ],
                    ],
                    
                    [
                        'label' => '财务管理',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => '资金管理', 'icon' => 'file-code-o', 'url' => ['/money'],],
                            ['label' => '积分管理', 'icon' => 'file-code-o', 'url' => ['/credit'],],
                            ['label' => '充值记录', 'icon' => 'dashboard', 'url' => ['/charge'],],
                            ['label' => '提现记录', 'icon' => 'dashboard', 'url' => ['/cash'],],
                           
                        ],
                    ],
                    
                    
                    [
                        'label' => '管理员管理',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => '管理员列表', 'icon' => 'file-code-o', 'url' => ['/admin/user'],],
                            ['label' => '分配权限', 'icon' => 'dashboard',    'url' => ['/admin/assignment'],],
                            ['label' => '角色列表', 'icon' => 'dashboard', 'url' => ['/admin/role'],],
                            ['label' => '权限列表', 'icon' => 'dashboard', 'url' => ['/admin/permission'],],
                            ['label' => '路由列表', 'icon' => 'dashboard', 'url' => ['/admin/route'],],
                            ['label' => '规则列表', 'icon' => 'dashboard', 'url' => ['/admin/rule'],],
                            ['label' => '菜单列表', 'icon' => 'dashboard', 'url' => ['/admin/menu'],],
                           
                        ],
                    ],
                    
                ],
            ]
        ) ?>

    </section>

</aside>
