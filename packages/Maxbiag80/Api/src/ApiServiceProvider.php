<?php

namespace Maxbiag80\Api;

use Illuminate\Support\ServiceProvider;

class ApiServiceProvider extends ServiceProvider {

    const DEFAULT_CRUD_REPOSITORY_IMPL = 'mock';

    private static $CRUDRepositoryConfig = [
        'mock' => 'Maxbiag80\Api\Repos\CRUDRepositoryMock'
    ];

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot() {
        require __DIR__ . '/Http/routes.php';
        
        $this->publishes([
            __DIR__.'/config/config.php' => config_path('api.php'),
        ]);
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register() {
        $this->app->bind('Maxbiag80\Api\Repos\CRUDRepository', $this->getCRUDRepositoryImpl());
    }
    
    private function getCRUDRepositoryImpl() {
        $key = config('api.repositoryType', self::DEFAULT_CRUD_REPOSITORY_IMPL);
        if (array_key_exists($key, self::$CRUDRepositoryConfig)) {
            return self::$CRUDRepositoryConfig[$key];
        }
        return self::$CRUDRepositoryConfig[self::DEFAULT_CRUD_REPOSITORY_IMPL];
    }
    
}
