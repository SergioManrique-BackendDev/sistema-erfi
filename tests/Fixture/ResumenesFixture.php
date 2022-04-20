<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ResumenesFixture
 */
class ResumenesFixture extends TestFixture
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
                'date' => '2022-04-13',
                'gastos_productos' => 1,
                'ganancia_bruta' => 1,
                'deuda' => 1,
                'producto' => 1,
                'ganancia_actual' => 1,
                'cantidad_bolsa' => 1,
                'ganancia_final' => 1,
            ],
        ];
        parent::init();
    }
}
