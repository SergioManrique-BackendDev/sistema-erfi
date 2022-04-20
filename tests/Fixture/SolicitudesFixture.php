<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SolicitudesFixture
 */
class SolicitudesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'persona' => 1,
                'pagina' => 1,
                'catalogo' => 'Lorem ipsum dolor sit amet',
                'codigo' => 1,
                'medida_producto' => 'Lorem ipsum dolor sit amet',
                'cantidad' => 1,
                'precio' => 1,
                'fecha_entrega' => '2022-04-14',
                'pedido_id' => 1,
            ],
        ];
        parent::init();
    }
}
