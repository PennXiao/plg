<?php
namespace Plg;
use Illuminate\Database\Capsule\Manager;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

class Database extends Manager
{	
	public static function setClien(){
		$thisDB = new Manager();
		$thisDB->addConnection([
		    'driver'    => 'mysql',
		    'host'      => '192.168.1.160',
		    'database'  => 'ga_debo',
		    'username'  => 'root',
		    'password'  => '123456',
		    'charset'   => 'utf8',
		    'collation' => 'utf8_general_ci',
		    'prefix'    => '',
		]);
		$thisDB->setEventDispatcher(new Dispatcher(new Container));
		$thisDB->setAsGlobal();

		// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
		$thisDB->bootEloquent();
	}
}