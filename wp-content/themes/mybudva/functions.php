<?php 

/**
 * WordPress Bootstrap Pagination
 */

function mybudva_pagination( $args = array() ) {
    
    $defaults = array(
        'range'           => 4,
        'custom_query'    => FALSE,
        'previous_string' => __( 'Previous', 'text-domain' ),
        'next_string'     => __( 'Next', 'text-domain' ),
        'before_output'   => '<div class="post-nav"><ul class="pager">',
        'after_output'    => '</ul></div>'
    );
    
    $args = wp_parse_args( 
        $args, 
        apply_filters( 'wp_bootstrap_pagination_defaults', $defaults )
    );
    
    $args['range'] = (int) $args['range'] - 1;
    if ( !$args['custom_query'] )
        $args['custom_query'] = @$GLOBALS['wp_query'];
    $count = (int) $args['custom_query']->max_num_pages;
    $page  = intval( get_query_var( 'paged' ) );
    $ceil  = ceil( $args['range'] / 2 );
    
    if ( $count <= 1 )
        return FALSE;
    
    if ( !$page )
        $page = 1;
    
    if ( $count > $args['range'] ) {
        if ( $page <= $args['range'] ) {
            $min = 1;
            $max = $args['range'] + 1;
        } elseif ( $page >= ($count - $ceil) ) {
            $min = $count - $args['range'];
            $max = $count;
        } elseif ( $page >= $args['range'] && $page < ($count - $ceil) ) {
            $min = $page - $ceil;
            $max = $page + $ceil;
        }
    } else {
        $min = 1;
        $max = $count;
    }
    
    $echo = '';
    $previous = intval($page) - 1;
    $previous = esc_attr( get_pagenum_link($previous) );
    
    $firstpage = esc_attr( get_pagenum_link(1) );
    if ( $firstpage && (1 != $page) )
        $echo .= '<li class="previous"><a href="' . $firstpage . '">' . __( 'First', 'text-domain' ) . '</a></li>';

    if ( $previous && (1 != $page) )
        $echo .= '<li><a href="' . $previous . '" title="' . __( 'previous', 'text-domain') . '">' . $args['previous_string'] . '</a></li>';
    
    if ( !empty($min) && !empty($max) ) {
        for( $i = $min; $i <= $max; $i++ ) {
            if ($page == $i) {
                $echo .= '<li class="active"><span class="active">' . str_pad( (int)$i, 2, '0', STR_PAD_LEFT ) . '</span></li>';
            } else {
                $echo .= sprintf( '<li><a href="%s">%002d</a></li>', esc_attr( get_pagenum_link($i) ), $i );
            }
        }
    }
    
    $next = intval($page) + 1;
    $next = esc_attr( get_pagenum_link($next) );
    if ($next && ($count != $page) )
        $echo .= '<li><a href="' . $next . '" title="' . __( 'next', 'text-domain') . '">' . $args['next_string'] . '</a></li>';
    
    $lastpage = esc_attr( get_pagenum_link($count) );
    if ( $lastpage ) {
        $echo .= '<li class="next"><a href="' . $lastpage . '">' . __( 'Last', 'text-domain' ) . '</a></li>';
    }

    if ( isset($echo) )
        echo $args['before_output'] . $echo . $args['after_output'];
}
/**
 * WordPress Bootstrap Pagination
 */


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
 









