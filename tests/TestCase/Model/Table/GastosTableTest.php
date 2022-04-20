<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GastosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GastosTable Test Case
 */
class GastosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\GastosTable
     */
    protected $Gastos;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Gastos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Gastos') ? [] : ['className' => GastosTable::class];
        $this->Gastos = $this->getTableLocator()->get('Gastos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Gastos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\GastosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
