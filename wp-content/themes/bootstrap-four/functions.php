<?php

include_once 'lib/bootstrap-four-wp-navwalker.php';

global $bootstrap_four_version;

// $bootstrap_four_version = '4.0.0';

// Le sigh...
if ( ! isset( $content_width ) ) $content_width = 837;

// esconde a barra do admin
add_filter('show_admin_bar', '__return_false');

if ( ! function_exists( 'bootstrap_four_widgets_init' ) ) :
	function bootstrap_four_widgets_init() {
		register_sidebar( array(
			'name' => __( 'Right Sidebar', 'bootstrap-four' ),
			'id' => 'right-sidebar',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
			) );
	}
	endif;
	add_action( 'widgets_init', 'bootstrap_four_widgets_init' );


	if ( ! function_exists( 'bootstrap_four_setup' ) ) :
		function bootstrap_four_setup() {

			add_theme_support( 'custom-background', array(
				'default-color' => 'ffffff',
				) );

			add_theme_support( 'automatic-feed-links' );

			add_theme_support( 'title-tag' );

			add_theme_support( 'html5', array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				) );

			register_nav_menus( array(
				'main_menu' => __( 'Main Menu', 'bootstrap-four' ),
      // 'footer_menu' => 'Footer Menu'
				) );

			add_editor_style( 'css/bootstrap.min.css' );
		}
endif; // bootstrap_four_setup
add_action( 'after_setup_theme', 'bootstrap_four_setup' );


if ( ! function_exists( 'bootstrap_four_theme_styles' ) ) :
	function bootstrap_four_theme_styles() {
    // global $bootstrap_four_version;
    // wp_enqueue_style( 'bootstrap-four-font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.4.0' );
    // wp_register_style( 'bootstrap-four-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), $bootstrap_four_version );
    // wp_enqueue_style( 'bootstrap-four-styles', get_stylesheet_uri(), array( 'bootstrap-four-bootstrap' ), '1' );
	}
	endif;
	add_action('wp_enqueue_scripts', 'bootstrap_four_theme_styles');


	if ( ! function_exists( 'bootstrap_four_theme_scripts' ) ) :
		function bootstrap_four_theme_scripts() {
    // global $bootstrap_four_version;
    // wp_enqueue_script( 'bootstrap-four-bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array( 'jquery' ), $bootstrap_four_version, true );
		}
		endif;
		add_action('wp_enqueue_scripts', 'bootstrap_four_theme_scripts');


		function bootstrap_four_nav_li_class( $classes, $item ) {
			$classes[] .= ' nav-item';
			return $classes;
		}
		add_filter( 'nav_menu_css_class', 'bootstrap_four_nav_li_class', 10, 2 );


		function bootstrap_four_nav_anchor_class( $atts, $item, $args ) {
			$atts['class'] .= ' nav-link';
			return $atts;
		}
		add_filter( 'nav_menu_link_attributes', 'bootstrap_four_nav_anchor_class', 10, 3 );


		function bootstrap_four_comment_form_before() {
			echo '<div class="card"><div class="card-block">';
		}
		add_action( 'comment_form_before', 'bootstrap_four_comment_form_before', 10, 5 );


		function bootstrap_four_comment_form( $fields ) {
			$fields['fields']['author'] = '
			<fieldset class="form-group comment-form-email">
				<label for="author">' . __( 'Name *', 'bootstrap-four' ) . '</label>
				<input type="text" class="form-control" name="author" id="author" placeholder="' . __( 'Name', 'bootstrap-four' ) . '" aria-required="true" required>
			</fieldset>';
			$fields['fields']['email'] ='
			<fieldset class="form-group comment-form-email">
				<label for="email">' . __( 'Email address *', 'bootstrap-four' ) . 'Email address *</label>
				<input type="email" class="form-control" id="email" placeholder="' . __( 'Enter email', 'bootstrap-four' ) . '" aria-required="true" required>
				<small class="text-muted">' . __( 'Your email address will not be published.', 'bootstrap-four' ) . '</small>
			</fieldset>';
			$fields['fields']['url'] = '
			<fieldset class="form-group comment-form-email">
				<label for="url">' . __( 'Website *', 'bootstrap-four' ) . '</label>
				<input type="text" class="form-control" name="url" id="url" placeholder="' . __( 'http://example.org', 'bootstrap-four' ) . '">
			</fieldset>';
			$fields['comment_field'] = '
			<fieldset class="form-group">
				<label for="comment">' . __( 'Comment *', 'bootstrap-four' ) . '</label>
				<textarea class="form-control" id="comment" name="comment" rows="3" aria-required="true" required></textarea>
			</fieldset>';
			$fields['comment_notes_before'] = '';
			$fields['class_submit'] = 'btn btn-primary';
			return $fields;
		}
		add_filter( 'comment_form_defaults', 'bootstrap_four_comment_form', 10, 5 );


		function bootstrap_four_comment_form_after() {
			echo '</div><!-- .card-block --></div><!-- .card -->';
		}
		add_action( 'comment_form_after', 'bootstrap_four_comment_form_after', 10, 5 );


/* * * * * * * * * * * * * * *
 * BS4 Utility Functions
 * * * * * * * * * * * * * * */

function bootstrap_four_get_posts_pagination( $args = '' ) {
	global $wp_query;
	$pagination = '';

	if ( $GLOBALS['wp_query']->max_num_pages > 1 ) :

		$defaults = array(
			'total'     => isset( $wp_query->max_num_pages ) ? $wp_query->max_num_pages : 1,
			'current'   => get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1,
			'type'      => 'array',
			'prev_text' => '&laquo;',
			'next_text' => '&raquo;',
			);

	$params = wp_parse_args( $args, $defaults );

	$paginate = paginate_links( $params );

	if( $paginate ) :
		$pagination .= "<ul class='pagination'>";
	foreach( $paginate as $page ) :
		if( strpos( $page, 'current' ) ) :
			$pagination .= "<li class='active'>$page</li>";
		else :
			$pagination .= "<li>$page</li>";
		endif;
		endforeach;
		$pagination .= "</ul>";
		endif;

		endif;

		return $pagination;
	}


	function bootstrap_four_the_posts_pagination( $args = '' ) {
		echo bootstrap_four_get_posts_pagination( $args );
	}

// Filtros que limpam classes do menu Header
add_filter('nav_menu_item_id', 'filter_menu_id');
add_filter( 'nav_menu_css_class', 'filter_menu_li' );
function filter_menu_li(){
    return array('');   
}
function filter_menu_id(){
    return; 
}

//Menu Header
function callMenu(){
	$defaults = array(
		'menu'            => 'default',
		'container'       => 'ul',
    );

	// In the page :
	echo wp_nav_menu( $defaults );
}

//Menu Footer
function callFooter(){
	$defaults = array(
		'menu'            => 'footer',
		'container'       => 'ul',
    );

	// In the page :
	echo wp_nav_menu( $defaults );
}

function showTituloTelas(){
	$tituloTela = new WP_Query( array(
		'order_by'			=> 'date',
		'order'				=> 'DESC',
		'post_type'			=> 'telas',
		'posts_per_page'	=> -1,
	) );

	if( $tituloTela->have_posts() ) {
		while( $tituloTela->have_posts() ) {
			$tituloTela->the_post();

			echo '<h2 class="fish orange" style="display:none;">'. get_the_title() .'</h2>';
		}
	} else {
		echo "<p>Nenhum post encontrado.</p>";
	}
}

function showConteudoTelas(){
	$conteudoTela = new WP_Query( array(
		'order_by'			=> 'date',
		'order'				=> 'DESC',
		'post_type'			=> 'telas',
		'posts_per_page'	=> -1,
	) );

	if( $conteudoTela->have_posts() ) {
		while( $conteudoTela->have_posts() ) {
			$conteudoTela->the_post();
			echo '<div class="swiper-slide">' . get_the_post_thumbnail() . '</div>' ;
		}
	} else {
		echo "<p>Nenhum post encontrado.</p>";
	}
}

function showDescricaoTelas(){
	$descricaoTela = new WP_Query( array(
		'order_by'			=> 'date',
		'order'				=> 'DESC',
		'post_type'			=> 'telas',
		'posts_per_page'	=> -1,
	) );

	if( $descricaoTela->have_posts() ) {
		while( $descricaoTela->have_posts() ) {
			$descricaoTela->the_post();
			echo '<p class="roboto grey" style="display:none;">' . get_the_content() . '</p>' ;
		}
	} else {
		echo "<p>Nenhum post encontrado.</p>";
	}
}

function showDepoimentos(){
	$depoimento = new WP_Query( array(
		'order_by'			=> 'date',
		'order'				=> 'DESC',
		'post_type'			=> 'depoimento',
		'posts_per_page'	=> -1,
	) );

	if( $depoimento->have_posts() ) {
		$contador = 0;

		while ($depoimento->have_posts()) {
			$contador++;

			$depoimento->the_post();
			$cargo = types_render_field( 'cargo', array( 'output' => 'raw'));
			$escola = types_render_field( 'escola', array( 'output' => 'raw'));
			$cliente = types_render_field( 'nome', array( 'output' => 'raw'));

			if($contador == 1){ $cssClass = "active"; }
			else { $cssClass = ""; }

			if($contador == 1){
				echo '<div class="item-depoimento ' . $cssClass . '" style="display:block;">';
			} else {
				echo '<div class="item-depoimento ' . $cssClass . '">';
			}

				echo '<p class="roboto white depoimento-text">' . get_the_content() . '</p>';
				echo '<p class="fish pinkLight autor">' . $cliente . '</p>';
				echo '<span class="roboto pinkLight cargo">' . $cargo . ' | Escola ' . $escola . '</span>';
			echo '</div>';
		}
	}
}