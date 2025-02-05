<style>
    .same-size-button {
        width: 100%;
        padding: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .same-size-button i {
        margin-right: 5px;
    }

    
</style>

<div class="container mt-4">
    <div class="row">
        <aside class="col-md-3">
            <div class="card bg-warning">
                <div class="card-header fw-bold text-center">
                    <?= __('Actions') ?>
                </div>
                <ul class="list-group list-group-flush text-center">
                    <li class="list-group-item">
                        <?= $this->Html->link(__('<i class="fa-solid fa-pen-to-square"></i> Edit'), ['action' => 'edit', $category->id], ['class' => 'btn bg-warning-subtle btn-block same-size-button', 'escape' => false]) ?>
                    </li>
                    <li class="list-group-item">
                        <?= $this->Form->postLink(__('<i class="fa-solid fa-eraser"></i> Delete'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete category: {0}?', $category->category), 'class' => 'btn bg-warning-subtle btn-block same-size-button', 'escape' => false]) ?>
                    </li>
                    <li class="list-group-item">
                        <?= $this->Html->link(__('<i class="fa-solid fa-plus"></i> Category'), ['action' => 'add'], ['class' => 'btn bg-warning-subtle btn-block same-size-button', 'escape' => false]) ?>
                    </li>
                    <li class="list-group-item">
                        <?= $this->Html->link(__('<i class="fa-solid fa-clipboard-list"></i> Category'), ['action' => 'index'], ['class' => 'btn bg-warning-subtle btn-block same-size-button', 'escape' => false]) ?>
                    </li>
                    <li class="list-group-item">
                        <?= $this->Html->link(__('<i class="fa-solid fa-clipboard-list"></i> Hadith'), ['controller' => 'Hadiths', 'action' => 'index'], ['class' => 'btn bg-warning-subtle btn-block same-size-button', 'escape' => false]) ?>
                    </li>
                </ul>

            </div>
        </aside>
        <div class="col-md-9">
            <div class="card bg-warning-subtle">
                <div class="card-header">
                    <h3><?= __('View Category: '), h($category->category) ?></h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th><?= __('Created') ?></th>
                            <td><?= h($category->created) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Modified') ?></th>
                            <td><?= h($category->modified) ?></td>
                        </tr>
                    </table>

                    <div class="related mt-4">
                        <h4><?= __('Related Hadiths') ?></h4>
                        <?php if (!empty($category->hadiths)) : ?>
                            <div class="table-responsive">
                                <table class="table table-striped-columns border border-2 border-warning-subtle">
                                    <thead>
                                        <tr>
                                            <th><?= __('Hadith') ?></th>
                                            <th><?= __('Status') ?></th>
                                            <th><?= __('Created') ?></th>
                                            <th><?= __('Modified') ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($category->hadiths as $hadith) : ?>
                                            <tr>
                                                <td class="hadith-text">
                                                    <?= $this->Html->link(
                                                        h($hadith->text),
                                                        ['controller' => 'Hadiths', 'action' => 'view', $hadith->id],
                                                        ['class' => 'text-black text-decoration-none', 'escape' => false, 'data-bs-toggle' => 'modal', 'data-bs-target' => '#hadithModal' . $hadith->id]
                                                    ) ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($hadith->status == 1) {
                                                        echo '<span class="badge bg-success">Sahih</span>';
                                                    } elseif ($hadith->status == 2) {
                                                        echo '<span class="badge bg-warning text-dark">Hasan</span>';
                                                    } else {
                                                        echo '<span class="badge bg-danger">Dhaif</span>';
                                                    }
                                                    ?>
                                                </td>
                                                <td><?= h($hadith->created) ?></td>
                                                <td><?= h($hadith->modified) ?></td>
                                            </tr>

                                            <div class="modal fade" id="hadithModal<?= $hadith->id ?>" tabindex="-1" aria-labelledby="hadithModalLabel<?= $hadith->id ?>" aria-hidden="true">
                                                <div class="modal-dialog modal-xl">  <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="hadithModalLabel<?= $hadith->id ?>">Hadith</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p><?= h($hadith->text) ?></p>
                                                        </div>
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="hadithModalLabel<?= $hadith->id ?>">Reference</h1>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p><?= h($hadith->reference) ?></p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>