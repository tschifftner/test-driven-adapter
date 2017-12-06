<?php

namespace ts;

use PHPUnit\Framework\TestCase;

class AdapterTest extends TestCase
{
    protected $_customerData = [['name' => 'John', 'nachname' => 'Doe'], ['name' => 'Laura', 'nachname' => 'Bour']];
    protected $_customerCsvData = 'name,nachname
John,Doe
Laura,Bour
';
    /**
     * @var ExportHandler
     */
    protected $_exportHandler;

    public function setUp()
    {
        $this->_exportHandler = new ExportHandler();
    }

    public function testEmptyDataReturnsFalse()
    {
        $this->assertFalse($this->_exportHandler->hasExportData());
    }

    public function testNonEmptyDataReturnsTrue()
    {
        $this->_exportHandler->setExportData($this->_customerData);

        $this->assertTrue($this->_exportHandler->hasExportData());
    }

    public function testThrowErrorWhenWrongDataTypeIsSet()
    {
        $this->expectException('Error');
        $this->_exportHandler->setExportData('string');
    }

    public function testSetExportAdapter()
    {
        $this->_exportHandler->setAdapter(new Csv());
        $this->assertTrue($this->_exportHandler->hasAdapter());
    }

    public function testCustomerIsExportedInCsv()
    {
        $this->_exportHandler->setAdapter(new Csv());
        $this->assertSame($this->_customerCsvData, $this->_exportHandler->export());
    }
}