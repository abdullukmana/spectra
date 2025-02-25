# Panduan Penggunaan Template **Spectra** di CodeIgniter 4

## 1. Instalasi Template
1. Unduh folder `spectra`.
2. Salin dan simpan folder tersebut ke dalam proyek CodeIgniter 4 di direktori `app\Views`.

## 2. Menggunakan Template di File yang Diinginkan
Gunakan sintaks berikut di dalam file yang ingin menggunakan template:

```php
<?= $this->extend('spectra/layout/index') ?>

<?= $this->section('title') ?>Spectra<?= $this->endSection() ?>

<?= $this->section('head') ?>
    
<?= $this->endSection() ?>

<?= $this->section('body') ?>
<main>
    <section class="py-4 px-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-11 col-md-10 col-lg-9 col-xl-8 overflow-auto">
                    
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Gunakan aside jika nilai $showSecondaryLayout adalah true -->
<!-- 
<aside class="sidebar bg-body border-start d-none d-xl-block overflow-auto">
    <div class="container">
        <div class="row">
            <div class="col-12 p-0 pb-5">
                <ul class="list-group gap-0" id="links"></ul>
            </div>
        </div>
    </div>
</aside> 
-->

<?= $this->endSection() ?>

<?= $this->section('footer') ?>
<footer class="bg-body-tertiary border-top p-3 py-5">
    <div class="container">
        <div class="row g-2">
            <div class="col-12 col-md-4 me-auto">
                <p><strong>BoostStore</strong> adalah platform yang menyediakan layanan jual beli item Mobile Legends, jasa joki push rank, serta jual beli akun MLBB dengan aman dan terpercaya.</p>
                <p>Kami berkomitmen untuk memberikan pengalaman transaksi yang mudah, cepat, dan aman bagi para pemain Mobile Legends.</p>
                <p><strong>Versi saat ini:</strong> v1.0.0</p>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <h6 class="font-monospace">Tautan Penting</h6>
                <ul>
                    <li><a href="<?= base_url('') ?>" class="link-primary font-monospace">Home</a></li>
                    <li><a href="<?= base_url('dokumentasi') ?>" class="link-primary font-monospace">Dokumentasi</a></li>
                </ul>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <h6 class="font-monospace">Hubungi Kami</h6>
                <ul>
                    <li><a href="mailto:example@gmail.com" class="link-primary font-monospace">Email kami</a></li>
                    <li><a href="https://wa.me/1234567" class="link-primary font-monospace">WhatsApp Official</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<?= $this->endSection() ?>

<?= $this->section('script') ?>

<?= $this->endSection() ?>
```

## 3. Data yang Dibutuhkan Template
Berikut adalah variabel yang harus disediakan saat menggunakan template:

```php
// Navigasi sidebar
$nav = [
    'Dashboard' => [
        ['title' => 'Home', 'url' => '/home'],
        ['title' => 'Reports', 'url' => '/reports'],
    ],
    '' => [ // Kategori kosong, item akan ditampilkan tanpa accordion
        ['title' => 'Help', 'url' => '/help'],
        ['title' => 'Contact', 'url' => '/contact'],
    ],
    'Settings' => [
        ['title' => 'Profile', 'url' => '/profile'],
        ['title' => 'Security', 'url' => '/security'],
    ],
];

// Daftar tautan pencarian
$links = [
    [
        'id'          => '1',
        'url'         => '/page1',
        'title'       => 'Halaman Utama',
        'description' => 'Deskripsi halaman utama',
        'type'        => 'page'
    ],
    [
        'id'          => '2',
        'url'         => '/section1',
        'title'       => 'Bagian Pertama',
        'description' => 'Deskripsi bagian pertama',
        'type'        => 'section'
    ],
    [
        'id'          => '3',
        'url'         => '/artikel',
        'title'       => 'Artikel Terbaru',
        'description' => 'Deskripsi artikel terbaru',
        'type'        => 'article'
    ],
];

// Mengirim data ke view
$data = [
    "nav"   => $nav,
    "links" => $links,
    'showSecondaryLayout' => false
];
return view("dashboard", $data);
```
