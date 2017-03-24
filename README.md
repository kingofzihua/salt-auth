# salt-auth

## install

### composer.json
**composer**

     $ composer require kingofzihua/salt-auth dev-master

### provider
**修改 app/config/app.php 文件, 在 providers 数组里面添加:**

	Kingofzihua\SaltAuth\ServiceProvider\SaltAuthServiceProvider::class


## Model
### App\User
```php
   /**
     * get User salt
     * @return mixed
     */
    public function getAuthSalt()
    {
        return $this->salt;
    }
```


## Controller
### App\Http\Controllers\Auth\RegisterController
```php

	use Illuminate\Support\Str;
    
	/**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        $salt = Str::random(6);
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'] . $salt),
            'salt' => $salt,
        ]);
    }
```
