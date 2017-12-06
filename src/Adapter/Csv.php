<?php


namespace ts;


class Csv implements AdapterInterface
{
    /**
     * @param array $exportData
     */
    public function export(array $exportData)
    {
        return 'name,nachname
John,Doe
Laura,Bour
';
    }
}