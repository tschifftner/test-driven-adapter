<?php


namespace ts;


class ExportHandler
{
    protected $_exportData = [];

    protected $_adapter;

    /**
     * @return bool
     */
    public function hasExportData()
    {
        return (bool) count($this->_exportData);
    }

    /**
     * @param array $array
     * @return $this
     */
    public function setExportData(array $array)
    {
        $this->_exportData = $array;
        return $this;
    }

    /**
     * @return array
     */
    public function getExportData()
    {
        return $this->_exportData;
    }

    /**
     * @return AdapterInterface
     */
    public function getAdapter()
    {
        return $this->_adapter;
    }

    /**
     * @param AdapterInterface $adapter
     */
    public function setAdapter(AdapterInterface $adapter)
    {
        $this->_adapter = $adapter;
    }

    /**
     * @return bool
     */
    public function hasAdapter()
    {
        return !is_null($this->_adapter);
    }

    /**
     * @return string
     */
    public function export()
    {
        return $this->getAdapter()->export($this->getExportData());
    }
}