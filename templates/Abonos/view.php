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
            <?= $this->Html->link(__('Edit Abono'), ['action' => 'edit', $abono->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Abono'), ['action' => 'delete', $abono->id], ['confirm' => __('Are you sure you want to delete # {0}?', $abono->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Abonos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Abono'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="abonos view content">
            <h3>Abono de <?= h($abono->Persona['nombre']) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($abono->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cantidad') ?></th>
                    <td>$<?= $this->Number->format($abono->cantidad) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha') ?></th>
                    <td><?php echo $abono->fecha->format('d/m/Y') ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
