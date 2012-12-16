<?php
/**
 * App Model
 * 
 * @package    Fuelpress
 * @version    1.0
 * @author     ootatter
 * @license    MIT License
 */

namespace Fuelpress;

class Model_App extends \Orm\Model
{

	protected static $_db;

	public static function _init(){
		static::$_db = \Database_Connection::instance('fuelpress');
		static::$_table_name = \DB::table_prefix(static::$_table_name,'fuelpress');
	}

}