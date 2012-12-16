<?php
/**
 * 
 *
 * @package    Fuelpress
 * @version    1.0
 * @author     ootatter
 * @license    MIT License
 */

Autoloader::add_core_namespace('Fuelpress');

Autoloader::add_classes(array(
	'Fuelpress\\Model_App'				=> __DIR__.'/classes/model/app.php',
	'Fuelpress\\Post'					=> __DIR__.'/classes/model/post.php',
	'Fuelpress\\Comment'				=> __DIR__.'/classes/model/coment.php',
	'Fuelpress\\Commentmeta'			=> __DIR__.'/classes/model/commentmeta.php',
	'Fuelpress\\Link'					=> __DIR__.'/classes/model/link.php',
	'Fuelpress\\PostMeta'				=> __DIR__.'/classes/model/post_meta.php',
	'Fuelpress\\Relationship'			=> __DIR__.'/classes/model/relationship.php',
	'Fuelpress\\Term'					=> __DIR__.'/classes/model/term.php',
	'Fuelpress\\TermRelationship'		=> __DIR__.'/classes/model/term_relationship.php',
	'Fuelpress\\TermTaxonomy'			=> __DIR__.'/classes/model/term_taxonomy.php',
	'Fuelpress\\User'					=> __DIR__.'/classes/model/user.php',
	'Fuelpress\\UserMeta'				=> __DIR__.'/classes/model/usermeta.php',
));

/* End of file bootstrap.php */