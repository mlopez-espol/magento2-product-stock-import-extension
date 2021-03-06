<?php
/**
 * Claudiucreanga_Import extension
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the MIT License
 * that is bundled with this package in the file LICENSE
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/mit-license.php
 *
 * @category  Claudiucreanga
 * @package   Claudiucreanga_Import
 * @copyright 2016 Claudiucreanga
 * @license   http://opensource.org/licenses/mit-license.php MIT License
 * @author    Claudiu Creanga
 */

namespace Claudiucreanga\Import\Test\Unit\Model;

use Magento\Framework\App\Filesystem\DirectoryList;
use Claudiucreanga\Import\Cron\Paths;

class PathsTest extends \PHPUnit_Framework_TestCase
{
	/**
     * @var string
     */
    const VAR_PATH = '/magento2/var';

	/**
	 * @var string
	 */
	const INTEGRATION_DIRECTORY = "import_integration";

	/**
	 * @var string
	 */
	const PROCESSING_DIRECTORY_PRODUCTS = "products_processing";

	/**
	 * @var string
	 */
	const PROCESSED_DIRECTORY_PRODUCTS = "products_processed";

	/**
	 * @var string
	 */
	const PROCESSING_DIRECTORY_STOCK = "stock_processing";

	/**
	 * @var string
	 */
	const PROCESSED_DIRECTORY_STOCK = "stock_processed";
    
    /**
     * @var \Claudiucreanga\Import\Cron\Paths;
     */
    protected $paths;
        
    /**
     * @var \Magento\Framework\App\Filesystem\DirectoryList;
     */
    protected $directory_list;
    
    /**
     * setup tests
     */
    protected function setUp()
    {

        /** @var \PHPUnit_Framework_MockObject_MockObject|DirectoryList $directory_list */
        $directoryListMock = $this->getMockBuilder(DirectoryList::class)
            ->disableOriginalConstructor()
            ->getMock();

	    $directoryListMock->expects($this->once())
		    ->method('getPath')
		    ->with('var')
		    ->willReturn(self::VAR_PATH);

        $this->paths = new Paths(
	        $directoryListMock
        );
    }
    
    /**
     * @test Claudiucreanga\Import\Cron\Paths::getVarFolderPath()
     */
    public function testGetVarFolderPath()
    {
        $this->assertEquals(self::VAR_PATH, $this->paths->getVarFolderPath());
    }

	/**
	 * @test Claudiucreanga\Import\Cron\Paths::getIntegrationDirectory()
	 */
	public function testGetIntegrationDirectory()
	{
		$this->assertEquals(self::VAR_PATH."/".self::INTEGRATION_DIRECTORY, $this->paths->getIntegrationDirectory());
	}

	/**
     * @test Claudiucreanga\Import\Cron\Paths::getProductsProcessedDirectory()
     */
    public function testGetProductsProcessedDirectory()
    {
        $this->assertEquals(self::VAR_PATH."/".self::INTEGRATION_DIRECTORY."/".self::PROCESSED_DIRECTORY_PRODUCTS, $this->paths->getProductsProcessedDirectory());
    }

    /**
     * @test Claudiucreanga\Import\Cron\Paths::getProductsProcessedDirectory()
     */
    public function testGetProductsProcessingDirectory()
    {
        $this->assertEquals(self::VAR_PATH."/".self::INTEGRATION_DIRECTORY."/".self::PROCESSING_DIRECTORY_PRODUCTS, $this->paths->getProductsProcessingDirectory());
    }

	/**
     * @test Claudiucreanga\Import\Cron\Paths::getStockProcessedDirectory()
     */
    public function testGetStockProcessedDirectory()
    {
        $this->assertEquals(self::VAR_PATH."/".self::INTEGRATION_DIRECTORY."/".self::PROCESSED_DIRECTORY_STOCK, $this->paths->getStockProcessedDirectory());
    }

    /**
     * @test Claudiucreanga\Import\Cron\Paths::getStockProcessedDirectory()
     */
    public function testGetStockProcessingDirectory()
    {
        $this->assertEquals(self::VAR_PATH."/".self::INTEGRATION_DIRECTORY."/".self::PROCESSING_DIRECTORY_STOCK, $this->paths->getStockProcessingDirectory());
    }
}
