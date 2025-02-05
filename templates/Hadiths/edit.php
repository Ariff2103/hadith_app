<div class="container mt-4">
    <div class="row">
        <aside class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <?= __('Actions') ?>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $hadith->id],
                            ['confirm' => __('Are you sure you want to delete # {0}?', $hadith->id), 'class' => 'text-decoration-none']
                        ) ?>
                    </li>
                    <li class="list-group-item"><?= $this->Html->link(__('List Hadiths'), ['action' => 'index'], ['class' => 'text-decoration-none']) ?></li>
                </ul>
            </div>
        </aside>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h3><?= __('Edit Hadith') ?></h3>
                </div>
                <div class="card-body">
                    <?= $this->Form->create($hadith) ?>
                    <fieldset>
                        <?php
                            echo $this->Form->control('text', ['class' => 'form-control']);
                            echo $this->Form->control('reference', ['class' => 'form-control']);
                            echo $this->Form->control('category_id', ['options' => $categories, 'class' => 'form-control']);
                            echo $this->Form->control('status', ['class' => 'form-control']); // Add form-control class
                        ?>
                    </fieldset>
                    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary mt-2']) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>