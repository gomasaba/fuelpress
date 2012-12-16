<?php 
/**
 * Post Model
 * 
 * @author ootatter
 * @package fuelpress
 */

namespace Fuelpress;

class Relationship extends Model_App{

	protected static $_table_name = 'posts';

	protected static $_properties = array(
		'meta_id',
		'post_id',
		'meta_key',
		'meta_value',
	);

}
