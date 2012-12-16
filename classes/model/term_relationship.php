<?php 
/**
 * TermRelationship Model
 * 
 * @package    Fuelpress
 * @version    1.0
 * @author     ootatter
 * @license    MIT License
 */

namespace Fuelpress;

class TermRelationship extends Model_App{

	protected static $_table_name = 'term_relationships';

	protected static $_primary_key = array('object_id');

	protected static $_properties = array(
		'object_id',
		'term_taxonomy_id',
		'term_order',
	);

	protected static $_belongs_to = array(
		'Post' => array(
			'key_from' => 'post_id',
			'model_to' => 'Model\Post',
			'key_to' => 'post_id',
		),
	);

	public static function getPostID($term_id){
		$query = \DB::select('object_id')->from(static::$_table_name);
		$query->where('term_taxonomy_id','in',$term_id);
		$result = $query->execute();
		$return = array();
		foreach ($result->as_array() as $key => $value) {
			$return[] = $value['object_id'];
		}
		return $return;
	}

}
