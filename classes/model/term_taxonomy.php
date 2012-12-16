<?php 
/**
 * TermTaxonomy Model
 * 
 * @package    Fuelpress
 * @version    1.0
 * @author     ootatter
 * @license    MIT License
 */

namespace Fuelpress;

class TermTaxonomy extends Model_App{

	protected static $_table_name = 'term_taxonomy';

	protected static $_primary_key = array('term_taxonomy_id');

	protected static $_properties = array(
		'term_taxonomy_id',
		'term_id',
		'taxonomy',
		'description',
		'parent',
		'count',
	);
	
	protected static $_has_many = array(
		'Term' => array(
		'key_from' => 'term_id',
		'model_to' => 'Model\Term',
		'key_to' => 'post_id',
		'cascade_save' => true,
		'cascade_delete' => false,
		)
	);

}
