<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Abono[]|\Cake\Collection\CollectionInterface $abonos
 */
?>
<div class="abonos index content">
    <?= $this->Html->link(__('New Abono'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Abonos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('persona') ?></th>
                    <th><?= $this->Paginator->sort('cantidad') ?></th>
                    <th><?= $this->Paginator->sort('fecha') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($abonos as $abono): ?>
                <tr>
                    <td><?= $this->Number->format($abono->id) ?></td>
                    <td><?php echo $abono->Persona['nombre'] ?></td>
                    <td>$<?= $this->Number->format($abono->cantidad) ?></td>
                    <td><?php debug($abono->fecha); echo $abono->fecha ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $abono->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $abono->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $abono->id], ['confirm' => __('Are you sure you want to delete # {0}?', $abono->id)]) ?>
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
