<!--Modal search-->
<div class="modal fade" id="search" tabindex="-1" aria-labelledby="settingsLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen-sm-down modal-dialog-scrollable">
        <div class="modal-content position-sticky bottom-0">
            <div class="modal-header p-2 d-flex gap-1 bg-light-subtle">
                <div class="input-group bg-transparent" role="search">
                    <span class="input-group-text bg-transparent d-flex align-items-center justify-content-center" id="basic-addon1">
                        <i class="bi bi-search"></i>
                    </span>
                    <input id="searchInput" autocomplete="off" type="text" class="form-control border shadow-none border-start-0 font-monospace bg-transparent" placeholder="Search here" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <button data-bs-dismiss="modal" aria-label="Close" class="btn bg-transparent border d-sm-none" type="button" id="button-addon2">
                    Close
                </button>
            </div>
            <div class="modal-body p-2 bg-light-subtle">
                <div class="container">
                    <div class="row">
                        <div class="col-12 p-0">
                            <div class="list-group" id="list-group"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer p-2 justify-content-start gap-4 d-none d-sm-flex">
                <small><span class="badge border bg-light text-dark me-2"><i class="bi bi-arrow-return-left"></i></span> to select</small>
                <small><span class="badge border bg-light text-dark me-2"><i class="bi bi-arrow-up"></i><i class="bi bi-arrow-down"></i></i></span> to navigate</small>
                <small><span class="badge border bg-light text-dark me-2">esc</span> to close</small>
            </div>
        </div>
    </div>
</div>