<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Gasto $gasto
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Gasto'), ['action' => 'edit', $gasto->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Gasto'), ['action' => 'delete', $gasto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gasto->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Gastos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Gasto'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="gastos view content">
            <h3><?= h($gasto->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($gasto->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cantidad') ?></th>
                    <td><?= $this->Number->format($gasto->cantidad) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Descripcion') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($gasto->descripcion)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
