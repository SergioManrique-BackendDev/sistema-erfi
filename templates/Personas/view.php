<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Persona $persona
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <!--<?= $this->Html->link(__('Edit Persona'), ['action' => 'edit', $persona->id], ['class' => 'side-nav-item']) ?>-->
            <!--<?= $this->Form->postLink(__('Delete Persona'), ['action' => 'delete', $persona->id], ['confirm' => __('Are you sure you want to delete # {0}?', $persona->id), 'class' => 'side-nav-item']) ?>-->
            <?= $this->Html->link(__('List Personas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <!--<?= $this->Html->link(__('New Persona'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>-->
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="personas view content">
            <h3><?= h("$persona->id. $persona->nombre") ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($persona->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($persona->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Deuda') ?></th>
                    <td>$<?= $this->Number->format($persona->deuda) ?></td>
                </tr>
                <tr>
                    <th><?= __('Venta Total') ?></th>
                    <td>$<?= $this->Number->format($ventaTotal) ?></td>
                </tr>
            </table>
            <br>
            <h3>Ventas</h3>
            <table>
                <thead>
                    <tr>
                        <th><?= __('id') ?></th>
                        <th><?= __('Descripcion') ?></th>
                        <th><?= __('Cantidad') ?></th>
                        <th><?= __('Fecha') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($persona['ventas'] as $venta): ?>
                    <tr>
                        <td><?= $this->Number->format($venta->id) ?></td>
                        <td><?= h($venta->descripcion) ?></td>
                        <td>$<?= $this->Number->format($venta->cantidad) ?></td>
                        <td><?= h($venta->fecha->format('d/m/Y')) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <br>
            <h3>Abonos</h3>
            <table>
                <thead>
                    <tr>
                        <th><?= __('id') ?></th>
                        <th><?= __('Cantidad') ?></th>
                        <th><?= __('Fecha') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($persona['abonos'] as $abono): ?>
                    <tr>
                        <td><?= $this->Number->format($abono->id) ?></td>
                        <td>$<?= $this->Number->format($abono->cantidad) ?></td>
                        <td><?= h($abono->fecha->format('d/m/Y')) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
