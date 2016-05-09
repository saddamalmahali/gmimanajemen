<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/avatar5.png" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

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
                    ['label' => 'Preferences', 'options' => ['class' => 'header']],
                    ['label' => 'Satuan', 'icon' => 'fa fa-gift', 'url' => ['/preferences/satuan']],
                    ['label' => 'Konversi Satuan', 'icon' => 'fa fa-balance-scale', 'url' => ['/preferences/konversi-satuan']],


                    ['label' => 'Bagian Produksi', 'options' => ['class' => 'header']],
                    ['label' => 'Dashboard', 'icon' => 'fa fa-desktop', 'url' => ['/produksi']],
                    ['label' => 'Transaksi', 'items' => [
                        ['label' => 'Supplier', 'icon' => 'fa fa-street-view', 'url' => ['/produksi/supplier']],
                        ['label' => 'Pembelian', 'icon' => 'fa fa-shopping-bag', 'url' => ['/produksi/pembelian']],
                    ]],

                    ['label' => 'Gudang', 'options' => ['class' => 'header']],
                    ['label' => 'Master Data', 'icon' => 'fa fa-file-code-o', 'items' => [
                        ['label' => 'Kategori', 'icon' => 'fa fa-folder-o', 'url' => ['/gudang/kategori']],
                        ['label' => 'Barang', 'icon' => 'fa fa-archive', 'url' => ['/gudang/barang']],
                    ]],
                    ['label' => 'Keluar/Masuk Barang', 'icon' => 'fa fa-file-code-o', 'items' => [
                        ['label' => 'Penerimaan Barang', 'icon' => 'fa fa-download', 'url' => ['#']],
                        ['label' => 'Keluar Barang', 'icon' => 'fa fa-external-link', 'url' => ['#']],
                    ]],


                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Same tools',
                        'icon' => 'fa fa-share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug'],],
                            [
                                'label' => 'Level One',
                                'icon' => 'fa fa-circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Two', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'fa fa-circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                                            ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
