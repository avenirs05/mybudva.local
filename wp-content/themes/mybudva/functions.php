<?php 

function load_style_scripts () 
{
	wp_enqueue_script('jquery_my', get_template_directory_uri() . '/js/jquery-3.1.1.js');
	wp_enqueue_script('jquery_ui_my', get_template_directory_uri() . '/js/jquery-ui.min.js');
	// wp_enqueue_script('jquery_my', get_template_directory_uri() . '/js/bootstrap.js');

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

// Нумерация записей wordpress
// function PostNumbers() {
// 	    global $wpdb;
// 	    $querystr = "SELECT $wpdb->posts.* FROM $wpdb->posts WHERE $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type = 'post' ";
// 	    $pageposts = $wpdb->get_results($querystr, OBJECT);
// 	        $counts = 0 ;
// 		if ($pageposts):
// 		    foreach ($pageposts as $post):
// 		        setup_postdata($post);
// 		        $counts++;
// 		        add_post_meta($post->ID, 'post_numb', $counts, true);
// 		        update_post_meta($post->ID, 'post_numb', $counts);
// 		    endforeach;
// 		endif;
// } 
 
// add_action ( 'publish_post', 'PostNumbers' );
// add_action ( 'deleted_post', 'PostNumbers' );
// add_action ( 'edit_post', 'PostNumbers' );
// Нумерация записей wordpress


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
// Вывод ID записей в админке 


// if ( ! function_exists( 'red_book_cp' ) ) {
 
// function red_book_cp() 
//     { 
//         $labels = array(
//             'name'                => _x( 'Красная книга', 'Post Type General Name', 'red_book' ),
//             'singular_name'       => _x( 'Красная книга', 'Post Type Singular Name', 'red_book' ),
//             'menu_name'           => __( 'Красная Книга', 'red_book' ),
//             'parent_item_colon'   => __( 'Родительский:', 'red_book' ),
//             'all_items'           => __( 'Все записи', 'red_book' ),
//             'view_item'           => __( 'Просмотреть', 'red_book' ),
//             'add_new_item'        => __( 'Добавить новую запись в Красную Книгу', 'red_book' ),
//             'add_new'             => __( 'Добавить новую', 'red_book' ),
//             'edit_item'           => __( 'Редактировать запись', 'red_book' ),
//             'update_item'         => __( 'Обновить запись', 'red_book' ),
//             'search_items'        => __( 'Найти запись', 'red_book' ),
//             'not_found'           => __( 'Не найдено', 'red_book' ),
//             'not_found_in_trash'  => __( 'Не найдено в корзине', 'red_book' ),
//         );
//         $args = array(
//             'labels'              => $labels,
//             'supports'            => array( 'title', 'editor', 'excerpt', ),
//             'taxonomies'          => array( 'red_book_tax' ), // категории, которые мы создадим ниже
//             'public'              => true,
//             'menu_position'       => 5,
//             'menu_icon'           => 'dashicons-book',
//         );
//         register_post_type( 'red_book', $args ); 
//     } 
//     add_action( 'init', 'red_book_cp', 0 ); 
// }
 
// if ( ! function_exists( 'red_book_tax' ) ) 
// {
// 	function red_book_tax() 
// 	{ 
// 		$labels = array(
// 			'name' 					=> _x( 'Категории Красной книги', 'Taxonomy General Name', 'red_book' ),
// 			'singular_name' 		=> _x( 'Категория Красной книги', 'Taxonomy Singular Name', 'red_book' ),
// 			'menu_name'     		=> __( 'Категории', 'red_book' ),
// 			'all_items'     		=> __( 'Категории', 'red_book' ),
// 			'parent_item' 			=> __( 'Родительская категория Книги', 'red_book' ),
// 			'parent_item_colon' 	=> __( 'Родительская категория Книги:', 'red_book' ),
// 			'new_item_name'     	=> __( 'Новая категория', 'red_book' ),
// 			'add_new_item'      	=> __( 'Добавить новую категорию', 'red_book' ),
// 			'edit_item' 			=> __( 'Редактировать категорию', 'red_book' ),
// 			'update_item' 			=> __( 'Обновить категорию', 'red_book' ),
// 			'search_items' 			=> __( 'Найти', 'red_book' ),
// 			'add_or_remove_items'   => __( 'Добавить или удалить категорию', 'red_book' ),
// 			'choose_from_most_used' => __( 'Поиск среди популярных', 'red_book' ),
// 			'not_found' 			=> __( 'Не найдено', 'red_book' ), 
// 			); 
// 		$args = array( 
// 			'labels' => $labels, 
// 			'hierarchical' => true,
// 			'public' => true,
//         ); 
//         register_taxonomy( 'red_book_tax', array( 'red_book' ), $args ); 
//     } 
//     add_action( 'init', 'red_book_tax', 0 ); 
// }
 









