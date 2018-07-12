# plg

### 框架依赖(基于) ###
包管理软件 [Composer](https://getcomposer.org/ "Composer autoload") inline link.

插件来源 [Symfony](https://symfony.com/ "symfony") inline link. 中文网站 [symfonychina](http://symfonychina.com/ "中文翻译站")

### 部署框架 ###
```
# git clone git@github.com:PennXiao/plg.git
	
# composer update
```
### 路由 ###

官方文档 [Symfony/Routing](https://symfony.com/doc/current/routing.html "symfony路由组件") inline link.  

路由的初始化在 **bootstrap/routes.php** 中调度

在 **config/routes.yml** 文件中配置
### 钩子 ###

框架初始化时候会加载 **.env** 赋值给``$_ENV`` or ``$_SERVER`` 
或者使用函数
``` 
getenv("APP_DEBUG") #使用本函数获取配置值或者使用全局变量

``` 

### 控制器 ###

控制器语路由命名空间注意对应


### 数据库与模型 ###

illuminate/database [illuminate/database](https://github.com/illuminate/database "数据库组件") inline link. 

数据库的初始化在 **bootstrap/Plg/Database.php** 中调度

官方文档 [laravel.com](https://laravel.com/docs/database "Laravel数据库") 

