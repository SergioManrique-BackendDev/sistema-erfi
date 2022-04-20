<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Resumene[]|\Cake\Collection\CollectionInterface $resumenes
 */
?>
<div class="resumenes index content">
    <?php if (isset($lastResumen)) : ?>
    <div>
        <h3>
            Ultimo Resumen
            <?= $this->Html->link(__('Update'), ['action' => 'add'], ['class' => 'button float-right']) ?>
        </h3>
        <table>
            <tr>
                <th><?= __('Date') ?></th>
                <td><?= h($lastResumen->date) ?></td>
            </tr>
            <tr>
                <th><?= __('Gastos Productos') ?></th>
                <td>$<?= $this->Number->format($lastResumen->gastos_productos) ?></td>
            </tr>
            <tr>
                <th><?= __('Ganancia Bruta') ?></th>
                <td>$<?= $this->Number->format($lastResumen->ganancia_bruta) ?></td>
            </tr>
            <tr>
                <th><?= __('Deuda') ?></th>
                <td>$<?= $this->Number->format($lastResumen->deuda) ?></td>
            </tr>
            <tr>
                <th><?= __('Productos') ?></th>
                <td>$<?= $this->Number->format($lastResumen->producto) ?></td>
            </tr>
            <tr>
                <th><?= __('Cantidad en Bolsa') ?></th>
                <td>$<?= $this->Number->format($lastResumen->cantidad_bolsa) ?></td>
            </tr>
            <tr>
                <th><?= __('Ganancia Final') ?></th>
                <td>$<?= $this->Number->format($lastResumen->ganancia_final) ?></td>
            </tr>
        </table>
    </div>
    <br>
    <?php else : ?>
        <?= $this->Html->link(__('Update'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <?php endif; ?>
    <h3><?= __('Resumenes') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('date') ?></th>
                    <th><?= $this->Paginator->sort('gastos_productos') ?></th>
                    <th><?= $this->Paginator->sort('ganancia_bruta') ?></th>
                    <th><?= $this->Paginator->sort('deuda') ?></th>
                    <th><?= $this->Paginator->sort('producto') ?></th>
                    <th><?= $this->Paginator->sort('cantidad_bolsa') ?></th>
                    <th><?= $this->Paginator->sort('ganancia_final') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resumenes as $resumene): ?>
                <tr>
                    <td><?= h($resumene->date) ?></td>
                    <td>$<?= $this->Number->format($resumene->gastos_productos) ?></td>
                    <td>$<?= $this->Number->format($resumene->ganancia_bruta) ?></td>
                    <td>$<?= $this->Number->format($resumene->deuda) ?></td>
                    <td>$<?= $this->Number->format($resumene->producto) ?></td>
                    <td>$<?= $this->Number->format($resumene->cantidad_bolsa) ?></td>
                    <td>$<?= $this->Number->format($resumene->ganancia_final) ?></td>
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
