<?php

namespace Kingofzihua\SaltAuth\Providers;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;

/**
 * Class SaltAuthProvider
 * SaltAuth 的服务容器
 * @auth kingofizhua
 * @desc 重写掉 laravel 中自带的 Auth 中的方法
 * @package App\Providers
 */
class SaltAuthProvider extends EloquentUserProvider
{
    /**
     * Validate a user against the given credentials.
     * 重写掉 laravel 中自带的 Auth 验证密码得方式
     * @param  \Illuminate\Contracts\Auth\Authenticatable $user
     * @param  array $credentials
     * @return bool
     */
    public function validateCredentials(UserContract $user, array $credentials)
    {
        $plain = $credentials['password']; //用户输入的密码
        $salt = $user->getAuthSalt(); //获取用户的Salt 这个要在User Model 中 写
        return $this->hasher->check($plain . $salt, $user->getAuthPassword());
    }
}
