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
            <?= $this->Html->link(__('List Abonos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="abonos form content">
            <?= $this->Form->create($abono) ?>
            <fieldset>
                <legend><?= __('Add Abono') ?></legend>
                <?php
                    echo $this->Form->control('persona', [
                        'type' => 'text'
                    ]);
                    echo $this->Form->control('cantidad');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
