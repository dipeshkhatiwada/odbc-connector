<?php

namespace Dipeshkhatiwada\OdbcConnector\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class ODBCProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('odbc_connection', function ($app) {
            $user = Config::get('database.connections.odbc-connection.username');
            $password = Config::get('database.connections.odbc-connection.password');
            $host = Config::get('database.connections.odbc-connection.host');
            $port = Config::get('database.connections.odbc-connection.port');
            $odbcDriver = Config::get('database.connections.odbc-connection.odbc-driver');
            $dsn = 'Driver=' . $odbcDriver . ';Host=' .$host . ';Port=' . $port . ';AuthenticationType=Plain;useEncryption=false';
            return odbc_connect($dsn, $user, $password);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
