<?php

namespace Dipeshkhatiwada\OdbcConnector;


class ODBC {
    protected mixed $ODBCConnection;

    public function __construct()
    {
        $this->ODBCConnection = app('odbc_connection');
    }

    public function getData($SQLQuery): array
    {

        $result = odbc_exec($this->ODBCConnection, query_string: $SQLQuery);
        $recordSet = [];
        while ($row = odbc_fetch_array($result)) {
            $recordSet[] = array_values($row);
        }
        return $recordSet;
    }
}