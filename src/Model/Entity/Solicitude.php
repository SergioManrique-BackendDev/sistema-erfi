<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Solicitude Entity
 *
 * @property int $id
 * @property int $persona
 * @property int $pagina
 * @property string $catalogo
 * @property int $codigo
 * @property string $medida_producto
 * @property int $cantidad
 * @property int $precio
 * @property \Cake\I18n\FrozenDate $fecha_entrega
 * @property int $pedido_id
 *
 * @property \App\Model\Entity\Pedido $pedido
 */
class Solicitude extends Entity
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
        'persona' => true,
        'pagina' => true,
        'catalogo' => true,
        'codigo' => true,
        'medida_producto' => true,
        'cantidad' => true,
        'precio' => true,
        'fecha_entrega' => true,
        'pedido_id' => true,
        'pedido' => true,
    ];
}
