<style>
    .sortable-header a {
        text-decoration: none; /* Remove underline */
        color: #007bff
        ;       /* Bootstrap success color (#28a745) */
    }

    .sortable-header a:hover {
        color:rgb(0, 92, 191)
        ;       /* Darker success color on hover */
    }
</style>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="text-primary fw-bold"><?= __('Category') ?></h3>
        <div>
            <?= $this->Html->link(__('Add Category'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
            <?= $this->Html->link(__('List Hadith'), ['controller' => 'Hadiths', 'action' => 'index'], ['class' => 'btn btn-secondary ms-2']) ?>
        </div>
    </div>

    <div class="table-responsive border border-2 border-primary-subtle rounded-3">
        <table class="table table-striped table-bordered">
            <thead class="table-warning">
                <tr class="text-center">
                    <th class="sortable-header"><?= $this->Paginator->sort('id', 'No') ?></th>  
                    <th class="sortable-header"><?= $this->Paginator->sort('category') ?></th>
                    <th class="sortable-header"><?= $this->Paginator->sort('created') ?></th>
                    <th class="sortable-header"><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category): ?>
                <tr>
                    <td><?= $this->Number->format($category->id) ?></td>
                    <td><?= h($category->category) ?></td>
                    <td><?= h($category->created) ?></td>
                    <td><?= h($category->modified) ?></td>
                    <td class="actions text-center text-nowrap">  <?= $this->Html->link(__('<i class="fa-solid fa-eye"></i>'), ['action' => 'view', $category->id], ['class' => 'btn btn-info btn-sm me-1', 'escape' => false]) ?>
                        <?= $this->Html->link(__('<i class="fa-solid fa-pen-to-square"></i>'), ['action' => 'edit', $category->id], ['class' => 'btn btn-primary btn-sm me-1', 'escape' => false]) ?>
                        <?= $this->Form->postLink(__('<i class="fa-solid fa-eraser"></i>'), ['action' => 'delete', $category->id], [
                            'confirm' => __('Are you sure you want to delete # {0}?', $category->id),
                            'class' => 'btn btn-danger btn-sm', 'escape' => false
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
                <?= $this->Paginator->prev('< ' . __('Previous'), ['class' => 'page-link']) ?>
                <?= $this->Paginator->numbers(['class' => 'page-link']) ?>
                <?= $this->Paginator->next(__('Next') . ' >', ['class' => 'page-link']) ?>
                <?= $this->Paginator->last(__('Last') . ' >>', ['class' => 'page-link']) ?>
            </ul>
        </div>
        <p class="mb-0 text-muted"><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>