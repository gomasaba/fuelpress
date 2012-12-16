<?php 
/**
 * Usermeta Model
 * 
 * @package    Fuelpress
 * @version    1.0
 * @author     ootatter
 * @license    MIT License
 */

namespace Fuelpress;

class Usermeta extends Model_App{

	protected static $_table_name = 'usermeta';

	protected static $_properties = array(
		'umeta_id',
		'user_id',
		'meta_key',
		'meta_value',
	);

}
