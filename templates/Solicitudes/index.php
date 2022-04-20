<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Solicitude[]|\Cake\Collection\CollectionInterface $solicitudes
 */
?>
<div class="solicitudes index content">
    <?= $this->Html->link(__('New Solicitude'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Solicitudes') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('persona') ?></th>
                    <th><?= $this->Paginator->sort('pagina') ?></th>
                    <th><?= $this->Paginator->sort('catalogo') ?></th>
                    <th><?= $this->Paginator->sort('codigo') ?></th>
                    <th><?= $this->Paginator->sort('medida_producto') ?></th>
                    <th><?= $this->Paginator->sort('cantidad') ?></th>
                    <th><?= $this->Paginator->sort('precio') ?></th>
                    <th><?= $this->Paginator->sort('fecha_entrega') ?></th>
                    <th><?= $this->Paginator->sort('pedido_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($solicitudes as $solicitude): ?>
                <tr>
                    <td><?= $this->Number->format($solicitude->id) ?></td>
                    <td><?= $this->Number->format($solicitude->persona) ?></td>
                    <td><?= $this->Number->format($solicitude->pagina) ?></td>
                    <td><?= h($solicitude->catalogo) ?></td>
                    <td><?= $this->Number->format($solicitude->codigo) ?></td>
                    <td><?= h($solicitude->medida_producto) ?></td>
                    <td><?= $this->Number->format($solicitude->cantidad) ?></td>
                    <td><?= $this->Number->format($solicitude->precio) ?></td>
                    <td><?= h($solicitude->fecha_entrega) ?></td>
                    <td><?= $solicitude->has('pedido') ? $this->Html->link($solicitude->pedido->id, ['controller' => 'Pedidos', 'action' => 'view', $solicitude->pedido->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $solicitude->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $solicitude->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $solicitude->id], ['confirm' => __('Are you sure you want to delete # {0}?', $solicitude->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
