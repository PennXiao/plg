# plg

### 框架依赖(基于) ###

PHP version 7.2.* 

包管理软件 [Composer](https://getcomposer.org/ "Composer autoload") inline link.

插件来源 [Symfony](https://symfony.com/ "symfony") inline link. 中文网站 [symfonychina](http://symfonychina.com/ "中文翻译站")

框架Laravel [laravel.com](https://laravel.com/docs "Laravel框架")

### 部署框架步骤 ###
```
# git clone git@github.com:PennXiao/plg.git

# php composer.phar install
	
# php composer.phar update

# php composer.phar validate
```
### 路由 ###

使用 [Symfony/Routing](https://symfony.com/doc/current/routing.html "symfony路由组件") 路由组件进行路由调度.  

框架路由的初始化在 **bootstrap/routes.php** 中载入路由的所有配置

路由的配置载入来源在 **config/routes.yml** 文件中


### 钩子 ###

* 框架初始化时候会加载 **.env** 可使用PHP原生方法获取

* 加载框架前设置了数据库参数

* 接收控制器返回参数后进行统一设置Response
 
### 控制器 ###

由路由导入控制器路径

```
route:
    path:     /
    defaults: { _controller: '\App\Controller\HomeController::index' }
```

### 数据库与模型 ###

使用 illuminate/database [illuminate/database](https://github.com/illuminate/database "数据库组件") ORM 。. 

插件初始化运行在 **bootstrap/Plg/Database.php** 中调度

Laravel 官方文档 [laravel.com](https://laravel.com/docs/database "Laravel数据库") 使用详情 

### 视图 ###

使用 [Twig/Twig]( https://github.com/twigphp/Twig "模板")

调度在 Plg\View 类中


