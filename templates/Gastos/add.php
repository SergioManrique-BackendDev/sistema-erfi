<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Gasto $gasto
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Gastos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="gastos form content">
            <?= $this->Form->create($gasto) ?>
            <fieldset>
                <legend><?= __('Add Gasto') ?></legend>
                <?php
                    echo $this->Form->control('descripcion');
                    echo $this->Form->control('cantidad');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
