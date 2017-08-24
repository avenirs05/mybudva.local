<?php 

// удаляет H2 из шаблона пагинации
add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
function my_navigation_template( $template, $class ){
	/*
	Вид базового шаблона:
	<nav class="navigation %1$s" role="navigation">
		<h2 class="screen-reader-text">%2$s</h2>
		<div class="nav-links">%3$s</div>
	</nav>
	*/

	return '
	<nav class="navigation %1$s" role="navigation">
		<div class="nav-links">%3$s</div>
	</nav>    
	';
}

function load_style_scripts () 
{
	wp_enqueue_script('jquery_my', get_template_directory_uri() . '/js/jquery-3.1.1.js');
	wp_enqueue_script('jquery_ui_my', get_template_directory_uri() . '/js/jquery-ui.min.js');
	wp_enqueue_style('bootstrap_my', get_template_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_style('jquery_ui_css_my', get_template_directory_uri() . '/css/jquery-ui.min.css');
	wp_enqueue_style('jquery_ui_theme_css_my', get_template_directory_uri() . '/css/jquery-ui.theme.css');
	wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
}

add_action('wp_enqueue_scripts', 'load_style_scripts');

register_sidebar(array(
	'name'          => 'menu',
	'id'            => 'menu-header',
));

register_sidebar(array(
	'name'          => 'right-page',
	'id'            => 'right-page-list',
	'before_widget' => '',
	'after_widget'  => '',
));

add_theme_support( 'post-thumbnails' );

function wp_corenavi() {
	global $wp_query, $wp_rewrite;
	$pages = '';
	$max = $wp_query->max_num_pages;
	if (!$current = get_query_var('paged')) $current = 1;
	$a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
	$a['total'] = $max;
	$a['current'] = $current;
	 
	$total = 0; //1 - выводить текст "Страница N из N", 0 - не выводить
	$a['mid_size'] = 1; //сколько ссылок показывать слева и справа от текущей
	$a['end_size'] = 1; //сколько ссылок показывать в начале и в конце
	$a['prev_text'] = ''; //текст ссылки "Предыдущая страница"
	$a['next_text'] = ''; //текст ссылки "Следующая страница"
	 
	if ($max > 1) echo '<nav class="navigation">';
	if ($total == 1 && $max > 1) $pages = '<span class="pages">Страница ' . $current . ' из ' . $max . '</span>'."\r\n";
	echo $pages . paginate_links($a);
	if ($max > 1) echo '</nav>';
}

// Вывод ID записи в админке 
function true_id($args){
	$args['post_page_id'] = 'ID';
	return $args;
}
function true_custom($column, $id){
	if($column === 'post_page_id'){
		echo $id;
	}
}
 
add_filter('manage_pages_columns', 'true_id', 5);
add_action('manage_pages_custom_column', 'true_custom', 5, 2);
add_filter('manage_posts_columns', 'true_id', 5);
add_action('manage_posts_custom_column', 'true_custom', 5, 2);

