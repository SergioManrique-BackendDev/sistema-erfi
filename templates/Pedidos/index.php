<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pedido[]|\Cake\Collection\CollectionInterface $pedidos
 */
?>
<div class="pedidos index content">
    <?= $this->Html->link(__('New Pedido'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Pedidos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('Solicitudes') ?></th>
                    <th><?= $this->Paginator->sort('fecha_compra') ?></th>
                    <th><?= $this->Paginator->sort('costo_compra') ?></th>
                    <th><?= $this->Paginator->sort('costo_venta') ?></th>
                    <th><?= $this->Paginator->sort('abierto') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pedidos as $pedido): ?>
                <tr>
                    <td><?= $this->Number->format($pedido->id) ?></td>
                    <td><?php echo count($pedido['solicitudes']); ?></td>
                    <td><?= h($pedido->fecha_compra) ?></td>
                    <td><?= $this->Number->format($pedido->costo_compra) ?></td>
                    <td><?= $this->Number->format($pedido->costo_venta) ?></td>
                    <td><?php echo $pedido->abierto ? "Si" : "No" ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $pedido->id]) ?>
                        <!--<?= $this->Html->link(__('Edit'), ['action' => 'edit', $pedido->id]) ?>-->
                        <?php if ($pedido->abierto) : ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pedido->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pedido->id)]) ?>
                        <?php endif; ?>
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
