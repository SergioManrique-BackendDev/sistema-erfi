<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Solicitude $solicitude
 * @var \Cake\Collection\CollectionInterface|string[] $pedidos
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Solicitudes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="solicitudes form content">
            <?= $this->Form->create($solicitude) ?>
            <fieldset>
                <legend><?= __('Add Solicitude') ?></legend>
                <?php
                    echo $this->Form->control('persona', [
                        'type' => 'text'
                    ]);
                    echo $this->Form->control('pagina');
                    echo $this->Form->control('catalogo');
                    echo $this->Form->control('codigo');
                    echo $this->Form->control('medida_producto');
                    echo $this->Form->control('cantidad');
                    echo $this->Form->control('precio');
                    echo $this->Form->control('pedido_id', [
                        'type' => 'hidden',
                        'value' => $pedidoId
                    ]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
