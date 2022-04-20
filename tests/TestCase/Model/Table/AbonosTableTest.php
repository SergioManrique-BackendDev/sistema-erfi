<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AbonosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AbonosTable Test Case
 */
class AbonosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AbonosTable
     */
    protected $Abonos;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Abonos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Abonos') ? [] : ['className' => AbonosTable::class];
        $this->Abonos = $this->getTableLocator()->get('Abonos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Abonos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AbonosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
