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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $gasto->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $gasto->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Gastos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="gastos form content">
            <?= $this->Form->create($gasto) ?>
            <fieldset>
                <legend><?= __('Edit Gasto') ?></legend>
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
