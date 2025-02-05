<div class="container mt-4">  <div class="row">
        <aside class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <?= __('Actions') ?>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?= $this->Html->link(__('List Categories'), ['action' => 'index'], ['class' => 'text-decoration-none']) ?></li>
                </ul>
            </div>
        </aside>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h3><?= __('Add Category') ?></h3>
                </div>
                <div class="card-body">
                    <?= $this->Form->create($category) ?>  <fieldset>
                        <?php
                            echo $this->Form->control('category', ['class' => 'form-control']);
                        ?>
                    </fieldset>
                    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary mt-2']) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>