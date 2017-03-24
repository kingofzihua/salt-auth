<?php

namespace Kingofzihua\SaltAuth\ServiceProvider;

use Illuminate\Auth\AuthServiceProvider as ServiceProvider;
use Kingofzihua\SaltAuth\AuthManager;

/**
 * Class SaltAuthServiceProvider
 * 注册一个Salt 服务提供商
 * @package App\Providers
 * @auth kingofzihua
 */
class SaltAuthServiceProvider extends ServiceProvider
{
    /**
     * 重写掉 laravel 中的Auth 注册容器
     * Register the authenticator services.
     *
     * @return void
     */

    protected function registerAuthenticator()
    {
        $this->app->singleton('auth', function ($app) {
            // Once the authentication service has actually been requested by the developer
            // we will set a variable in the application indicating such. This helps us
            // know that we need to set any queued cookies in the after event later.
            $app['auth.loaded'] = true;

            return new AuthManager($app);
        });

        $this->app->singleton('auth.driver', function ($app) {
            return $app['auth']->guard();
        });
    }
}
