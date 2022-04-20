<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Venta $venta
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Ventas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="ventas form content">
            <?= $this->Form->create($venta) ?>
            <fieldset>
                <legend><?= __('Add Venta') ?></legend>
                <?php 
                if($querySolicitud){
                    echo $this->Form->control('persona', [
                        'type' => 'text',
                        'value' => $querySolicitud->Persona->nombre
                    ]);
                    echo $this->Form->control('descripcion');
                    echo $this->Form->control('cantidad', [
                        'value' => $querySolicitud->total
                    ]);
                } else {
                    echo $this->Form->control('persona', [
                        'type' => 'text'
                    ]);
                    echo $this->Form->control('descripcion');
                    echo $this->Form->control('cantidad');
                }
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
