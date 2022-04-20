<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pedido Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $fecha_compra
 * @property int $costo_compra
 * @property int $costo_venta
 *
 * @property \App\Model\Entity\Solicitude[] $solicitudes
 */
class Pedido extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'fecha_compra' => true,
        'costo_compra' => true,
        'costo_venta' => true,
        'solicitudes' => true,
    ];
}
