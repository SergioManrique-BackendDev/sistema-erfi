<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Solicitude $solicitude
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Solicitude'), ['action' => 'edit', $solicitude->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Solicitude'), ['action' => 'delete', $solicitude->id], ['confirm' => __('Are you sure you want to delete # {0}?', $solicitude->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Solicitudes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Solicitude'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="solicitudes view content">
            <h3><?= h($solicitude->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Catalogo') ?></th>
                    <td><?= h($solicitude->catalogo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Medida Producto') ?></th>
                    <td><?= h($solicitude->medida_producto) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pedido') ?></th>
                    <td><?= $solicitude->has('pedido') ? $this->Html->link($solicitude->pedido->id, ['controller' => 'Pedidos', 'action' => 'view', $solicitude->pedido->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($solicitude->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Persona') ?></th>
                    <td><?= $this->Number->format($solicitude->persona) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pagina') ?></th>
                    <td><?= $this->Number->format($solicitude->pagina) ?></td>
                </tr>
                <tr>
                    <th><?= __('Codigo') ?></th>
                    <td><?= $this->Number->format($solicitude->codigo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cantidad') ?></th>
                    <td><?= $this->Number->format($solicitude->cantidad) ?></td>
                </tr>
                <tr>
                    <th><?= __('Precio') ?></th>
                    <td><?= $this->Number->format($solicitude->precio) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha Entrega') ?></th>
                    <td><?= h($solicitude->fecha_entrega) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
