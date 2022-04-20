<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ResumenesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ResumenesTable Test Case
 */
class ResumenesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ResumenesTable
     */
    protected $Resumenes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Resumenes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Resumenes') ? [] : ['className' => ResumenesTable::class];
        $this->Resumenes = $this->getTableLocator()->get('Resumenes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Resumenes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ResumenesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
