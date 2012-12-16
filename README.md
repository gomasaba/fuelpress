FuelPress
=======

はじめに、
---------

Fuelphpからwordpresを扱っちゃうぞと思ってpackage化してみようかなと。

まだ未実装が多数あります! 

modelファイルを作る手間が省けたぞ！と思ってもらえればと。



使い方としては、、、
---------

appの

db.php
```php
	'fuelplress'=>array(
		'type'        => 'pdo',
		'connection'  => array(
			'persistent' => false,
		),
		'identifier'   => '`',
		'table_prefix' => 'wp_',
		'charset'      => 'utf8',
		'enable_cache' => false,
		'profiling'    => true,
	),
```


routes.php
```php
	'post/(\d+)' =>'post/detail/$1',
	'archive/(:any)' =>'post/archive/$1',
```

class/controller/post.php
```php
	class Controller_Post extends Controller_App
	{
		public function action_detail($id)
		{
			$post = \Fuelpress\Post::find_publish($id);
			return Response::forge($this->Theme->view('post/detail',array(
					'post'=>$post,
			),false));

		}
		public function action_archive($slug,$page=1)
		{
			$cat = \Fuelpress\Term::find('first',array('where'=>array('slug'=>$slug)));
			if($cat){
				$term_id = \Fuelpress\Term::getCategoryIDbySlug($slug);
				$posts = \Fuelpress\Post::panination(array(
									'category_id'=>$term_id,
				),$page);
				return Response::forge($this->Theme->view('post/archive',array(
						'posts'=>$posts,
						'category'=>$cat,
				),false));

			}
		}
	}
```
