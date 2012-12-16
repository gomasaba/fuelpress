<?php 
/**
 * Commentmeta Model
 * 
 * @package    Fuelpress
 * @version    1.0
 * @author     ootatter
 * @license    MIT License
 */

namespace Fuelpress;

class Commentmeta extends Model_App{

	protected static $_table_name = 'commentmeta';

	protected static $_properties = array(
		'meta_id',
		'comment_id',
		'meta_key',
		'meta_value',
	);


}
