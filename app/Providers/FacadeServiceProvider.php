<?php
/**
 * Created by PhpStorm.
 * User: grodas.p35
 * Date: 9/14/2018
 * Time: 19:19
 */

namespace App\Providers;


use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class FacadeServiceProvider extends ServiceProvider
{


    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $facades = [
            /*
            'facade.ancestor' => [
                'initializer' => function ($app) {
                    return new \App\Helpers\HelperClass();
                },
                'alias' => [
                    'alias' => 'Accounts',
                    'facadeClass' => \App\Facades\HelperClass::class
                ]
            ],
            */
            'custom' => [
                'initializer' => function ($app) {
                    return new \App\Helpers\Custom();
                },
                'alias' => [
                    'alias' => 'Custom',
                    'facadeClass' => \App\Facades\Custom::class
                ]
            ],
        ];

        foreach ($facades as $ancestor => $facade) {
            $this->registerFacade($ancestor, $facade['initializer']);
            if (isset($facade['alias'])) {
                $alias = $facade['alias'];
                $this->registerAlias($alias['alias'], $alias['facadeClass']);
            }
        }
    }

    /**
     * Register a shared binding in the container.
     *
     * @param  string  $abstract
     * @param  \Closure|string|null  $concrete
     * @return void
     */
    protected function registerFacade($abstract, $concrete)
    {
        $this->app->singleton($abstract, $concrete);
    }

    /**
     * Add an alias to the loader.
     *
     * @param  string  $class
     * @param  string  $alias
     * @return void
     */
    protected function registerAlias($class, $alias)
    {
        $this->app->booting(function() use ($class, $alias) {
            $loader = AliasLoader::getInstance();
            $loader->alias($class, $alias);
        });
    }
}
