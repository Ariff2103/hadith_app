<style>
    .same-size-button {
        width: 100%; /* Or a specific pixel width, e.g., width: 150px; */
        /* Optional: Add padding if the icons/text are too close to the edge */
        padding: 10px; /* Adjust as needed */
        display: flex;        /* Use flexbox for alignment */
        align-items: center;  /* Vertically center content */
        justify-content: center; /* Horizontally center content */
    }

    .same-size-button i {  /* Style the icon specifically */
        margin-right: 5px; /* Add some space between icon and text */
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
                        <?= $this->Html->link(__('<i class="fa-solid fa-pen-to-square"></i> Edit'), ['action' => 'edit', $hadith->id], ['class' => 'btn bg-warning-subtle btn-block same-size-button', 'escape' => false])?>
                    </li>
                    <li class="list-group-item">
                        <?= $this->Html->link(__('<i class="fa-solid fa-plus"></i> Add'), ['action' => 'add'], ['class' => 'btn bg-warning-subtle btn-block same-size-button', 'escape' => false])?>
                    </li>
                    <li class="list-group-item">
                        <?= $this->Form->postLink(__('<i class="fa-solid fa-eraser"></i> Delete'), ['action' => 'delete', $hadith->hadith], ['confirm' => __('Are you sure you want to delete the hadith?', $hadith->category), 'class' => 'btn bg-warning-subtle btn-block same-size-button', 'escape' => false])?>
                    </li>
                    <li class="list-group-item">
                        <?= $this->Html->link(__('<i class="fa-solid fa-arrow-left"></i> Back'), ['controller' => 'Hadiths', 'action' => 'index'], ['class' => 'btn bg-warning-subtle btn-block same-size-button', 'escape' => false]) ?>
                    </li>
                    <li class="list-group-item">
                        <?= $this->Html->link(__('<i class="fa-solid fa-clipboard-list"></i> Category'), ['controller' => 'Categories','action' => 'index'], ['class' => 'btn bg-warning-subtle btn-block same-size-button', 'escape' => false])?>
                    </li>
                </ul>
            </div>
        </aside>
        <div class="col-md-9">  <div class="card bg-warning-subtle">
                <div class="card-header bg-warning">
                    <h3><?= __('View Hadith') ?></h3>
                </div>
                <div class="card-body">
                    <div class="mb-3">  <strong><?= __('Hadith') ?></strong>
                        <blockquote>
                            <?= $this->Text->autoParagraph(h($hadith->text)); ?>
                        </blockquote>
                    </div>
                    <table class="table table-borderless">  <tr>
                            <th><?= __('Reference') ?></th>
                            <td><?= h($hadith->reference) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Category') ?></th>
                            <td><?= $hadith->has('category') ? $this->Html->link($hadith->category->category, ['controller' => 'Categories', 'action' => 'view', $hadith->category->id], ['class' => 'text-decoration-none']) : '' ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Status') ?></th>
                            <td>
                                <?php 
                                    if ($hadith->status == 1) {
                                        echo '<span class="badge bg-success">Sahih</span>';
                                    } elseif ($hadith->status == 2) {
                                        echo '<span class="badge bg-warning text-dark">Hasan</span>';
                                    } else {
                                        echo '<span class="badge bg-danger">Daif</span>';
                                    }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th><?= __('Created') ?></th>
                            <td><?= h($hadith->created) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Modified') ?></th>
                            <td><?= h($hadith->modified) ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>