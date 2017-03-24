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
