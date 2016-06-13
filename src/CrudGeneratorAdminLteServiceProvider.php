<?php

namespace Goszowski\CrudGeneratorAdminLte;

use Illuminate\Support\ServiceProvider;

class CrudGeneratorAdminLteServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/crudgenerator_admin_lte.php' => config_path('crudgenerator_admin_lte.php'),
        ]);

        $this->publishes([
            __DIR__ . '/../publish/app.blade.php' => base_path('resources/views/layouts/app.blade.php'),
        ]);

        $this->publishes([
            __DIR__ . '/stubs/' => base_path('resources/crud-generator-admin-lte/'),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->commands(
            'Goszowski\CrudGeneratorAdminLte\Commands\CrudCommand',
            'Goszowski\CrudGeneratorAdminLte\Commands\CrudControllerCommand',
            'Goszowski\CrudGeneratorAdminLte\Commands\CrudModelCommand',
            'Goszowski\CrudGeneratorAdminLte\Commands\CrudMigrationCommand',
            'Goszowski\CrudGeneratorAdminLte\Commands\CrudViewCommand',
            'Goszowski\CrudGeneratorAdminLte\Commands\CrudLangCommand'
        );
    }
}
