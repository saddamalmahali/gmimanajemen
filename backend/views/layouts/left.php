<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<aside class="main-sidebar">

    <section class="sidebar">

        
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Preferences', 'options' => ['class' => 'header']],
                    ['label' => 'Satuan', 'icon' => 'fa fa-gift', 'url' => ['/preferences/satuan']],
                    ['label' => 'Konversi Satuan', 'icon' => 'fa fa-balance-scale', 'url' => ['/preferences/konversi-satuan']],

					['label' => 'Keuangan', 'options' => ['class' => 'header']],
					['label' => 'Pembayaran Kredit', 'icon' => 'fa fa-credit-card', 'url' => ['/keuangan/bayar-kredit']],
					
					
                    ['label' => 'Bagian Produksi', 'options' => ['class' => 'header']],
                    ['label' => 'Dashboard', 'icon' => 'fa fa-desktop', 'url' => ['/produksi']],
                    ['label' => 'Transaksi', 'icon' => 'fa fa-money', 'url' => '#', 'items' => [
                        ['label' => 'Supplier', 'icon' => 'fa fa-street-view', 'url' => ['/produksi/supplier']],
                        ['label' => 'Pembelian', 'icon' => 'fa fa-shopping-bag', 'url' => ['/produksi/pembelian']],
                    ]],

                    ['label' => 'Proses', 'icon'=>'fa fa-line-chart', 'url'=>'#', 'items' => [
                        ['label' => 'Proses 1', 'icon' => 'fa fa-recycle', 'url' => ['/produksi/proses-1']],
                        ['label' => 'Proses 2', 'icon' => 'fa fa-random', 'url' => ['/produksi/proses-2']],
                        ['label' => 'Finalisasi', 'icon' => 'fa fa-ship', 'url' => ['#']],
                    ]],

                    ['label' => 'Gudang', 'options' => ['class' => 'header']],
                    ['label' => 'Master Data', 'icon' => 'fa fa-file-text-o', 'url' => '#', 'items' => [
                        ['label' => 'Kategori', 'icon' => 'fa fa-folder-o', 'url' => ['/gudang/kategori']],
                        ['label' => 'Barang', 'icon' => 'fa fa-archive', 'url' => ['/gudang/barang']],
                    ]],
                    ['label' => 'Keluar/Masuk Barang', 'icon' => 'fa fa-exchange', 'url' => '#', 'items' => [
                        ['label' => 'Penerimaan Barang', 'icon' => 'fa fa-download', 'url' => ['/gudang/masuk-barang']],
                        ['label' => 'Keluar Barang Kimia', 'icon' => 'fa fa-external-link', 'url' => ['/gudang/barang-keluar']],
                        ['label' => 'Keluar Barang Mentah', 'icon' => 'fa fa-external-link', 'url' => ['/gudang/barang-keluar-mentah']],
                    ]],
                    ['label' => 'Stok Barang', 'icon' => 'fa fa-retweet', 'url' => '#', 'items' => [
                        ['label' => 'Stok Bahan Kimia', 'icon' => 'fa fa-archive', 'url' => ['/gudang/stok-bahan-kimia']],
                        ['label' => 'Barang Mentah', 'icon' => 'fa fa-building-o', 'url' => ['/gudang/stok-bahan-mentah']],
                        ['label' => 'Barang Jadi', 'icon' => 'fa fa-check-square-o', 'url' => ['#']],
                    ]],



                ],
            ]
        ) ?>

    </section>

</aside>
