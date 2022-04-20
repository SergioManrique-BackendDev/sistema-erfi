<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pedido $pedido
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <!--
            <?= $this->Html->link(__('Edit Pedido'), ['action' => 'edit', $pedido->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Pedido'), ['action' => 'delete', $pedido->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pedido->id), 'class' => 'side-nav-item']) ?>
            -->
            <?= $this->Html->link(__('List Pedidos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <!--<?= $this->Html->link(__('New Pedido'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>-->
            
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="pedidos view content">
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($pedido->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Costo Compra') ?></th>
                    <td><?= $this->Number->format($pedido->costo_compra) ?></td>
                </tr>
                <tr>
                    <th><?= __('Costo Venta') ?></th>
                    <td><?= $this->Number->format($pedido->costo_venta) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha Compra') ?></th>
                    <td><?= h($pedido->fecha_compra) ?></td>
                </tr>
                <tr>
                    <th><?= __('Abierto') ?></th>
                    <td><?php echo $pedido->abierto ? "Si" : "No" ?></td>
                </tr>
            </table>

            <br>
            <?php if ($pedido['abierto']) : ?>
            <div style='display: flex; justify-content: space-evenly;'>
                <form method='get' action='
                <?php echo $this->Url->build([
                    'controller' => 'Solicitudes',
                    'action' => 'add'
                ]);
                ?>
                '>
                <?php
                        echo $this->Form->control('pedido_id',[
                            'type' => 'hidden',
                            'value' => $pedido->id
                        ]);
                        echo $this->Form->button(__('New Solicitud'));
                ?>
                </form>
                <form method='get' action='
                <?php echo $this->Url->build([
                    'controller' => 'Pedidos',
                    'action' => 'print'
                ]);
                ?>
                '>
                <?php
                        echo $this->Form->control('pedido_id',[
                            'type' => 'hidden',
                            'value' => $pedido->id
                        ]);
                        echo $this->Form->button(__('Print Pedido'));
                ?>
                </form>
                <form method='get' action='
                <?php echo $this->Url->build([
                    'controller' => 'Pedidos',
                    'action' => 'close'
                ]);
                ?>
                '>
                <?php
                        echo $this->Form->control('pedido_id',[
                            'type' => 'hidden',
                            'value' => $pedido->id
                        ]);
                        echo $this->Form->button(__('Close Pedido'));
                ?>
                </form>
            </div>
            <?php endif; ?>

            <div class="related">
                <h4><?= __('Solicitudes') ?></h4>
                <?php if (!empty($pedido->solicitudes)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Persona') ?></th>
                            <th><?= __('Codigo') ?></th>
                            <?php if ($pedido['abierto']) : ?>
                            <th><?= __('Pagina') ?></th>
                            <th><?= __('Catalogo') ?></th>
                            <th><?= __('Medida') ?></th>
                            <?php else : ?>
                            <th><?= __('Fecha Entrega') ?></th>
                            <?php endif; ?>
                            <th><?= __('Cantidad') ?></th>
                            <th><?= __('Precio') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($pedido->solicitudes as $solicitudes) : ?>
                        <tr>
                            <td><?php echo $solicitudes->Persona->nombre ?></td>
                            <td><?= h($solicitudes->codigo) ?></td>
                            <?php if ($pedido['abierto']) : ?>
                            <td><?= h($solicitudes->pagina) ?></td>
                            <td><?= h($solicitudes->catalogo) ?></td>
                            <td><?= h($solicitudes->medida_producto) ?></td>
                            <?php else : ?>
                            <td><?= h($solicitudes->fecha_entrega) ?></td>
                            <?php endif; ?>
                            <td><?= h($solicitudes->cantidad) ?></td>
                            <td><?= h($solicitudes->precio) ?></td>
                            <td class="actions">
                                <!--<?= $this->Html->link(__('View'), ['controller' => 'Solicitudes', 'action' => 'view', $solicitudes->id]) ?>-->
                                <?php if ($pedido['abierto']) : ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Solicitudes', 'action' => 'edit', $solicitudes->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Solicitudes', 'action' => 'delete', $solicitudes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $solicitudes->id)]) ?>
                                <?php elseif (!$solicitudes->fecha_entrega) : ?>
                                <?= $this->Html->link(__('Deliver'), ['controller' => 'Solicitudes', 'action' => 'deliver', $solicitudes->id]) ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>


        </div>
    </div>
</div>
