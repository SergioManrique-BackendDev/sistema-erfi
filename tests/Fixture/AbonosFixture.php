<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AbonosFixture
 */
class AbonosFixture extends TestFixture
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
                'cantidad' => 1,
                'fecha' => '2022-04-13',
            ],
        ];
        parent::init();
    }
}
