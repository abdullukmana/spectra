<nav class="navbar bg-body">
    <div class="container-fluid gap-1 gap-sm-2 gap-md-3">
        <?= $this->include('spectra/components/brand_header') ?>
        <div class="input-group w-auto mb-0 p-0">
            <button data-bs-toggle="modal" data-bs-target="#search" class="btn btn-costum-primary h-100 border d-flex align-items-center gap-3" type="button" id="button-addon1">
                <i class="bi bi-search"></i>
                <span class="me-0 me-md-4 me-xl-5 d-none d-sm-inline-block">Search</span>
                <code class="badge border bg-body-tertiary text-body d-none d-sm-inline-block">Ctrl K</code>
            </button>
        </div>
        <button class="btn btn-costum-primary border d-sm-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>