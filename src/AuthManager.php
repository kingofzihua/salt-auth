<?php

namespace Kingofzihua\SaltAuth;

use Illuminate\Auth\AuthManager as SysAuthManager;
use Kingofzihua\SaltAuth\Providers\SaltAuthProvider;

class AuthManager extends SysAuthManager
{

    /**
     * Create an instance of the Eloquent user provider.
     *
     * @param  array $config
     * @return \Illuminate\Auth\EloquentUserProvider
     */
    protected function createEloquentProvider($config)
    {
        return new SaltAuthProvider($this->app['hash'], $config['model']);
    }
}
