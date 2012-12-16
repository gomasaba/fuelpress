<?php 
/**
 * Term Model
 * 
 * @package    Fuelpress
 * @version    1.0
 * @author     ootatter
 * @license    MIT License
 */

namespace Fuelpress;

class Term extends Model_App{

	protected static $_table_name = 'terms';

	protected static $_primary_key = array('term_id');

	protected static $_properties = array(
		'term_id',
		'name',
		'slug',
		'term_group',
	);

	protected static $_has_one = array(
		'TermTaxonomy' => array(
			'key_from' => 'term_id',
			'model_to' => 'TermTaxonomy',
			'key_to' => 'term_id',
		),
	);

	public static function getCategoryIDbySlug($slug)
	{
		if(is_array($slug))
		{
			$term = static::find('all',array(
				'select'=>'term_id',
				'where'=>array(
					array('slug', 'in', $slug)
				)
			));
		}else{
			$term = static::find('all',array(
				'select'=>'term_id',
				'where'=>array(
					'slug'=>$slug,
				)
			));			
		}
		if($term){
			foreach ($term as $key => $value) {
				$return[] = $value->term_id;
			}
			return $return;
		}
	}


}
