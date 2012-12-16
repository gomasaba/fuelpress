<?php 
/**
 * Postmeta Model
 * 
 * @package    Fuelpress
 * @version    1.0
 * @author     ootatter
 * @license    MIT License
 */

namespace Fuelpress;

class PostMeta extends Model_App{

	protected static $_table_name = 'postmeta';

	protected static $_properties = array(
		'meta_id',
		'post_id',
		'meta_key',
		'meta_value',
	);


}