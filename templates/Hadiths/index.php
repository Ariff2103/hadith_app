<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Hadith> $hadiths
 */
?>
<!-- cdn font awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    .sortable-header a {
        text-decoration: none; /* Remove underline */
        color: #28a745;       /* Bootstrap success color (#28a745) */
    }

    .sortable-header a:hover {
        color: #1e7e34;       /* Darker success color on hover */
    }
</style>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="text-success fw-bold"><?= __('Hadith') ?></h3>
        <div>
            <?= $this->Html->link(__('Add Hadith'), ['action' => 'add'], ['class' => 'btn btn-success']) ?>
            <?= $this->Html->link(__('List Category'), ['controller' => 'Categories', 'action' => 'index'], ['class' => 'btn btn-secondary ms-2']) ?>
        </div>
    </div>

    <div class="table-responsive border border-2 border-success-subtle rounded-3">
    <table class="table table-striped table-bordered">
        <thead class="table-warning">
            <tr class="text-center">
                <th>No.</th>  <th class="sortable-header"><?= $this->Paginator->sort('hadith', 'Hadith') ?></th>
                <th class="sortable-header"><?= $this->Paginator->sort('reference', 'Reference') ?></th>
                <th class="sortable-header"><?= $this->Paginator->sort('category_id', 'Category') ?></th>
                <th class="sortable-header"><?= $this->Paginator->sort('status', 'Status') ?></th>
                <th class="sortable-header"><?= $this->Paginator->sort('created', 'Created') ?></th>
                <th class="sortable-header"><?= $this->Paginator->sort('modified', 'Modified') ?></th>
                <th><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php $counter = 1; // Initialize the counter ?>
            <?php foreach ($hadiths as $hadith): ?>
            <tr>
                <td><span class="text-center d-block"><?= $counter++ ?></span></td> 
                <td><span class="text-center d-block"><?= $this->Html->link($hadith->text, ['action' => 'view', $hadith->id], ['class' => 'text-black text-decoration-none', 'escape' => false]) ?></span></td>
                <td><?= h($hadith->reference) ?></td>
                <td>
                    <?= $hadith->has('category') ? 
                        $this->Html->link($hadith->category->category, ['controller' => 'Categories', 'action' => 'view', $hadith->category->id], ['class' => 'text-decoration-none']) : 
                        '<span class="text-muted">N/A</span>' 
                    ?>
                </td>
                <td>
                    <?php 
                        $statusClass = '';
                        if ($hadith->status == 1) {
                            $statusClass = 'bg-success';
                            $statusText = 'Sahih';
                        } elseif ($hadith->status == 2) {
                            $statusClass = 'bg-warning text-dark';
                            $statusText = 'Hasan';
                        } else {
                            $statusClass = 'bg-danger';
                            $statusText = 'Dhaif';
                        }
                        echo '<span class="badge ' . $statusClass . '">' . $statusText . '</span>';
                    ?>
                </td>
                <td><?= h($hadith->created) ?></td>
                <td><?= h($hadith->modified) ?></td>
                <td class="text-center">
                    <?= $this->Html->link('<i class="fa-solid fa-eye"></i> View', ['action' => 'view', $hadith->id], ['class' => 'btn btn-info btn-sm me-1 mt-1 mb-1', 'escape' => false]) ?>
                    <?= $this->Html->link('<i class="fa-solid fa-pen-to-square"></i> Edit', ['action' => 'edit', $hadith->id], ['class' => 'btn btn-primary btn-sm me-1 mb-1', 'escape' => false]) ?>
                    <?= $this->Form->postLink('<i class="fa-solid fa-eraser"></i> Del.', ['action' => 'delete', $hadith->id], [
                        'confirm' => __('Are you sure you want to delete the hadiths?', $hadith->hadiths),
                        'class' => 'btn btn-danger btn-sm me-1',
                        'escape' => false
                    ]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

    <div class="d-flex justify-content-between align-items-center mt-3">
        <div>
            <ul class="pagination mb-0">
                <?= $this->Paginator->first('<< ' . __('First'), ['class' => 'page-link']) ?>
                <?= $this->Paginator->prev('< ' . __('Previous'), ['class' => 'page-link text-decoration-none']) ?>
                <?= $this->Paginator->numbers(['class' => 'page-link']) ?>
                <?= $this->Paginator->next(__('Next') . ' >', ['class' => 'page-link text-decoration-none']) ?>
                <?= $this->Paginator->last(__('Last') . ' >>', ['class' => 'page-link']) ?>
            </ul>
        </div>
        <p class="mb-0 text-muted"><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>