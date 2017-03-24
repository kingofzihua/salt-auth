# Laravel Auth extend [salt]
@(salt)[password|auth]
## install

### composer.json
**composer**

     $ composer require kingofzihua/salt-auth 1.0.0

### provider
**修改 app/config/app.php 文件, 在 providers 数组里面添加:**

	Kingofzihua\SaltAuth\ServiceProvider\SaltAuthServiceProvider::class


## Model
### add App\User
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
### edit App\Http\Controllers\Auth\RegisterController
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

## Database  Migrations
### edit Users_table
```php
   /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('salt'); //Random string
            $table->rememberToken();
            $table->timestamps();
        });
    }
```
