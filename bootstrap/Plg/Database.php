<?php
namespace Plg;
use Illuminate\Database\Capsule\Manager;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

class Database extends Manager
{	
	public static function setClien(array $arr){
		$thisDB = new Manager();
		$thisDB->addConnection([
		    'driver'    => $arr['DB_DRIVER'],
		    'host'      => $arr['DB_HOST'],
		    'database'  => $arr['DB_DATABASE'],
		    'username'  => $arr['DB_USERNAME'],
		    'password'  => $arr['DB_PASSWORD'],
		    'charset'   => $arr['DB_CHARSET'],
		    'collation' => $arr['DB_COLLATION'],
		    'prefix'    => $arr['DB_PREFIX'],
		]);
		$thisDB->setEventDispatcher(new Dispatcher(new Container));
		$thisDB->setAsGlobal();

		// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
		$thisDB->bootEloquent();
	}
}