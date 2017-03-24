# salt-auth
Modify laravel user authentication mode
1. composer.json#

"kingofzihua/salt-auth": "dev-master"
2. install#

composer update
3. provider#

修改 app/config/app.php 文件, 在 providers 数组里面添加:

Kingofzihua\SaltAuth\ServiceProvider\SaltAuthServiceProvider::class
