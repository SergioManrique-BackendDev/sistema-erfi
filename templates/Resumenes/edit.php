<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Resumene $resumene
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $resumene->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $resumene->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Resumenes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="resumenes form content">
            <?= $this->Form->create($resumene) ?>
            <fieldset>
                <legend><?= __('Edit Resumene') ?></legend>
                <?php
                    echo $this->Form->control('date');
                    echo $this->Form->control('gastos_productos');
                    echo $this->Form->control('ganancia_bruta');
                    echo $this->Form->control('deuda');
                    echo $this->Form->control('producto');
                    echo $this->Form->control('ganancia_actual');
                    echo $this->Form->control('cantidad_bolsa');
                    echo $this->Form->control('ganancia_final');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
