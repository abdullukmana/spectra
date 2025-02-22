<!doctype html>
<html lang="en">
    <head>
        <title><?= $this->renderSection('title') ?></title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <!-- Untuk Chrome & Opera -->
        <meta name="theme-color" content="#1C1C1C"/>
        <!-- Untuk Safari iOS -->
        <meta name="apple-mobile-web-app-status-bar-style" content="#1C1C1C"/>
        <!-- Untuk Windows Phone -->
        <meta name="msapplication-navbutton-color" content="#1C1C1C"/>
        <link rel="icon" href="favicon.ico" type="image/x-icon" />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        
        <?= $this->include('spectra/assets/css/index') ?>
        <?= $this->renderSection('head') ?>

    </head>

    <body data-bs-theme="system">
        <header class="border-bottom px-2 position-sticky top-0">
        <?= $this->include('spectra/components/nav') ?>
        </header>

        <div style="z-index: 10000;" class="loader-section position-fixed top-0 bottom-0 start-0 end-0 bg-body d-flex align-items-center justify-content-center">
            <div class="loader"></div>
        </div>

        <?php 
            $showSecondaryLayout = isset($showSecondaryLayout) ? $showSecondaryLayout : false; 
        ?>
        <div class="container-fluid primary-layout-grid p-0">
            <?= $this->include('spectra/components/sidebar') ?>
            <?php if($showSecondaryLayout): ?>
                <div class="secondary-layout-grid">
                    <?= $this->renderSection('body') ?>    
                </div>
            <?php else: ?>
                <?= $this->renderSection('body') ?>    
            <?php endif; ?>
        </div>

        <?= $this->renderSection('footer') ?>  

        <?= $this->include('spectra/components/search') ?>

        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
        <script src="https://cdn.jsdelivr.net/npm/@docsearch/js@3"></script>

        <?= $this->include('spectra/assets/js/playground/index') ?>
        <?= $this->renderSection('script') ?>
    </body>
</html>
