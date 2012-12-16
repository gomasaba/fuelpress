<?php 
/**
 * Link Model
 * 
 * @author ootatter
 * @package fuelpress
 */

namespace Fuelpress;

class Link extends Model_App{

	protected static $_table_name = 'links';

	protected static $_properties = array(
		'link_id',
		'link_url',
		'link_name',
		'link_image',
		'link_target',
		'link_description',
		'link_visible',
		'link_owner',
		'link_rating',
		'link_updated',
		'link_rel',
		'link_notes',
		'link_rss',
	);



}
