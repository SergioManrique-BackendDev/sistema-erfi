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
            <?= $this->Html->link(__('Edit Resumene'), ['action' => 'edit', $resumene->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Resumene'), ['action' => 'delete', $resumene->id], ['confirm' => __('Are you sure you want to delete # {0}?', $resumene->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Resumenes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Resumene'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="resumenes view content">
            <h3><?= h($resumene->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($resumene->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Gastos Productos') ?></th>
                    <td><?= $this->Number->format($resumene->gastos_productos) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ganancia Bruta') ?></th>
                    <td><?= $this->Number->format($resumene->ganancia_bruta) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deuda') ?></th>
                    <td><?= $this->Number->format($resumene->deuda) ?></td>
                </tr>
                <tr>
                    <th><?= __('Producto') ?></th>
                    <td><?= $this->Number->format($resumene->producto) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ganancia Actual') ?></th>
                    <td><?= $this->Number->format($resumene->ganancia_actual) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cantidad Bolsa') ?></th>
                    <td><?= $this->Number->format($resumene->cantidad_bolsa) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ganancia Final') ?></th>
                    <td><?= $this->Number->format($resumene->ganancia_final) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date') ?></th>
                    <td><?= h($resumene->date) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
