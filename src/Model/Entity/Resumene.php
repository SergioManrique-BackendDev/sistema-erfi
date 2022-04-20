<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Resumene Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $date
 * @property int $gastos_productos
 * @property int $ganancia_bruta
 * @property int $deuda
 * @property int $producto
 * @property int $ganancia_actual
 * @property int $cantidad_bolsa
 * @property int $ganancia_final
 */
class Resumene extends Entity
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
        'date' => true,
        'gastos_productos' => true,
        'ganancia_bruta' => true,
        'deuda' => true,
        'producto' => true,
        'ganancia_actual' => true,
        'cantidad_bolsa' => true,
        'ganancia_final' => true,
    ];
}
