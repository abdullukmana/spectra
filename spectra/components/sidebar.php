<?php
function makeValidId($string) {
    $string = strtolower(trim($string));
    $string = preg_replace('/[^a-z0-9]+/', '-', $string);
    return is_numeric($string[0] ?? '') ? 'id-' . $string : $string;
}
?>
<div class="sidebar offcanvas-sm offcanvas-start border-end" tabindex="-1" id="sidebar" aria-labelledby="offcanvasLabel">
    <div class="offcanvas-header border-bottom">
        <?= $this->include('spectra/components/brand_header') ?>
        <button type="button" class="btn-close shadow-none" data-bs-target="#sidebar" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-0 h-100">
        <div class="container h-100">
            <div class="row h-100 flex-column flex-nowrap">
                <div class="col-12 flex-grow-1 flex-shrink-1 p-0 pb-5 overflow-auto">
                    <?php if (!empty($nav) && is_array($nav)): ?>
                        <?php foreach ($nav as $category => $items): ?>
                            <ul class="list-group gap-0">
                                <?php if (!empty($category)): ?>
                                    <?php $categoryId = makeValidId(esc($category)); ?>
                                    <div class="accordion" id="<?= $categoryId ?>Accordion"> 
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button font-monospace" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $categoryId ?>" aria-expanded="true" aria-controls="collapse<?= $categoryId ?>">
                                                    <small class="chevron"><i class="bi bi-chevron-down"></i></small>
                                                    <h6 class="m-0 ms-3" data-bs-toggle="tooltip" data-bs-title="<?= esc($category) ?>"><?= esc($category) ?></h6>
                                                </button>
                                            </h2>
                                            <div id="collapse<?= $categoryId ?>" class="accordion-collapse collapse show" data-bs-parent="#<?= $categoryId ?>Accordion">
                                                <div class="accordion-body">
                                                    <?php if (!empty($items) && is_array($items)): ?>
                                                        <?php foreach ($items as $item): ?>
                                                            <?php if (!empty($item['title']) && !empty($item['url'])): ?>
                                                                <a data-bs-toggle="tooltip" data-bs-title="<?= esc($item['title']) ?>" href="<?= esc($item['url']) ?>" class="list-group-item list-group-item-action font-monospace d-flex align-items-center <?= current_url() == esc($item['url']) ? 'disabled active' : '' ?>" aria-current="<?= current_url() == esc($item['url']) ? 'true' : 'false' ?>">
                                                                    <small><i class="bi bi-square-fill me-3 text-body"></i></small>
                                                                    <p class="m-0 flex-grow-1 text-truncate text-body">
                                                                        <?= esc($item['title']) ?>
                                                                    </p>
                                                                </a>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <?php if (!empty($items) && is_array($items)): ?>
                                        <?php foreach ($items as $item): ?>
                                            <?php if (!empty($item['title']) && !empty($item['url'])): ?>
                                                <a data-bs-toggle="tooltip" data-bs-title="<?= esc($item['title']) ?>" href="<?= esc($item['url']) ?>" class="list-group-item list-group-item-action font-monospace d-flex align-items-center <?= current_url() == esc($item['url']) ? 'disabled active' : '' ?>" aria-current="<?= current_url() == esc($item['url']) ? 'true' : 'false' ?>">
                                                    <?php if (current_url() != esc($item['url'])): ?>
                                                        <small><i class="bi bi-square-fill me-3 text-body"></i></small>    
                                                    <?php endif; ?>   
                                                    <p class="m-0 flex-grow-1 <?= current_url() == esc($item['url']) ? '' : 'text-truncate' ?> text-body">
                                                        <?= esc($item['title']) ?>
                                                    </p>
                                                </a>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </ul>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div class="col-12 flex-shrink-1 p-0">
                    <ul class="list-group gap-0 border-top">
                        <?php if (function_exists('auth') && auth()->loggedIn()): ?>
                            <a href="<?= base_url('logout') ?>" class="list-group-item list-group-item-action font-monospace d-flex align-items-center">
                                <small><i class="bi bi-square-fill me-3 text-body"></i></small>    
                                <p class="m-0 flex-grow-1 text-body">
                                    Logout
                                </p>
                            </a>
                        <?php else: ?>
                            <a href="<?= base_url('login') ?>" class="list-group-item list-group-item-action font-monospace d-flex align-items-center">
                                <small><i class="bi bi-square-fill me-3 text-body"></i></small>      
                                <p class="m-0 flex-grow-1 text-body">
                                    Login
                                </p>
                            </a>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
