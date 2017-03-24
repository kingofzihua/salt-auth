# salt-auth


## Modify laravel user authentication mode

### composer.json
**composer **

     $ composer require kingofzihua/salt-auth dev-master

### provider
**修改 app/config/app.php 文件, 在 providers 数组里面添加:**

	Kingofzihua\SaltAuth\ServiceProvider\SaltAuthServiceProvider::class



### add in your User Model
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
