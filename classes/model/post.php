<?php 
/**
 * Post Model
 * 
 * @package    Fuelpress
 * @version    1.0
 * @author     ootatter
 * @license    MIT License
 */

namespace Fuelpress;
class Post extends Model_App{

	protected static $_primary_key = array('ID');

	protected static $_table_name = 'posts';

	public static $limit = 5;

	protected static $_properties = array(
					'ID',
					'post_author',
					'post_date',
					'post_date_gmt',
					'post_content',
					'post_title',
					'post_excerpt',
					'post_status',
					'comment_status',
					'ping_status',
					'post_password',
					'post_name',
					'to_ping',
					'pinged',
					'post_modified',
					'post_modified_gmt',
					'post_content_filtered',
					'post_parent',
					'guid',
					'menu_order',
					'post_type',
					'post_mime_type',
					'comment_count',
	);
	protected static $_has_one = array(
		'user' => array(
			'key_from' => 'post_author',
			'model_to' => 'User',
			'key_to' => 'ID',
		),
	);
	protected static $_has_many = array(
		'post_meta' => array(
			'key_from' => 'id',
			'model_to' => 'PostMeta',
			'key_to' => 'post_id',
		),
	);

	public static function find_publish($id){
		$post =  static::find($id,array(
			'where'=>array(
				'post_status'=>'publish',
				array('post_date','<=', \DB::expr('now()')),
			),
			'related'=>'user',
		));
		if($post){
			$post = $post->to_array();
			$cat = static::getCategory($post['ID']);
			$post['category'] = $cat;
		}
		return $post;
	}

	public static function getCategory($post_id)
	{
		$query = \DB::select('*')->from(TermRelationship::table());
		$query->where('object_id',$post_id);
		$query->join(TermTaxonomy::table());
		$query->on(TermTaxonomy::table().'.term_taxonomy_id','=',TermRelationship::table().'.term_taxonomy_id');
		$query->join(Term::table());
		$query->on(Term::table().'.term_id','=',TermTaxonomy::table().'.term_id');
		$result = $query->execute();
		return $result->as_array();
	}

	public static function panination($condition,$page){
		$query = \DB::select('*')->from(static::$_table_name);
		if ($page > 1) {
			$offset = ($page - 1) * static::$limit;
		}else{
			$offset = 0;
		}
		if(array_key_exists('category_id',$condition)){
			$post_id = TermRelationship::getPostID($condition['category_id']);
			$query->where('ID','in',$post_id);
		}
		$query->where('post_status','publish');
		$query->where('post_date','<=', \DB::expr('now()'));
		$query->order_by('post_date','desc');
		$query->limit(static::$limit);
		$query->offset($offset);
		$result = $query->execute();
		$return['count'] = \DB::count_last_query();
		$return['result'] = $result->as_array();
		return $return;
	}
}
