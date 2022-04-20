<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Abono $abono
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $abono->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $abono->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Abonos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="abonos form content">
            <?= $this->Form->create($abono) ?>
            <fieldset>
                <legend><?= __('Edit Abono') ?></legend>
                <?php
                    echo $this->Form->control('persona');
                    echo $this->Form->control('cantidad');
                    echo $this->Form->control('fecha');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
