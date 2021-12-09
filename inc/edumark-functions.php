<?php 
/**
 * @Packge     : Edumark
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
    // Block direct access
    if( !defined( 'ABSPATH' ) ){
        exit( 'Direct script access denied.' );
    }

/*=========================================================
	Theme option callback
=========================================================*/
function edumark_opt( $id = null, $default = '' ) {
	
	$opt = get_theme_mod( $id, $default );
	
	$data = '';
	
	if( $opt ) {
		$data = $opt;
	}
	
	return $data;
}


/*=========================================================
	Custom meta id callback
=========================================================*/
function edumark_meta( $id = '' ){
    
    $value = get_post_meta( get_the_ID(), '_edumark_'.$id, true );
    
    return $value;
}


/*=========================================================
	User Review Submission
=========================================================*/

add_action( 'wp_ajax_course_star_review', 'edumark_course_star_review' );
add_action( 'wp_ajax_nopriv_course_star_review', 'edumark_course_star_review' );
function edumark_course_star_review() {

	if( isset( $_POST['userdata'] ) ){
		if( is_user_logged_in() ){

			parse_str( $_POST['userdata'], $getData );

			$userdata = get_user_by( 'id',  $getData['userid'] );
			$time = current_time('mysql');
		
			$data = array(
				'comment_post_ID' => absint( $getData['postid'] ),
				'comment_author' => $userdata->data->user_login,
				'comment_author_email' => $userdata->data->user_email,
				'comment_content' => wp_kses_post( $getData['feedback'] ),
				'user_id' => $userdata->data->ID,
				'comment_date' => $time,
				'comment_approved' => 1,
			);

			$commentsId = wp_insert_comment($data);


			$args = array(
				'post_id' => absint( $getData['postid'] ),
			);
			$reviews = get_comments( $args );
			 $reviewCount = count( $reviews );

			$avgreview = get_post_meta( absint( $getData['postid'] ), 'edumark_course_avgreview', true );

			$avgreview =  $avgreview +  $getData['ratingvalue'];

			update_post_meta( absint( $getData['postid'] ), 'edumark_course_avgreview', $avgreview );

			update_comment_meta( absint( $commentsId ), 'edumark_course_review', $getData['ratingvalue'] );

			echo 'success';
		}else{
			echo 'Error';
		}


	}


	die();
}




/*=========================================================
	Blog Date Permalink
=========================================================*/
function edumark_blog_date_permalink(){
	
	$year  = get_the_time('Y'); 
    $month_link = get_the_time('m');
    $day   = get_the_time('d');

    $link = get_day_link( $year, $month_link, $day);
    
    return $link; 
}



/*========================================================
	Blog Excerpt Length
========================================================*/
if ( ! function_exists( 'edumark_excerpt_length' ) ) {
	function edumark_excerpt_length( $limit = 30 ) {

		$excerpt = explode( ' ', get_the_excerpt() );
		
		// $limit null check
		if( !null == $limit ){
			$limit = $limit;
		}else{
			$limit = 30;
		}
        
        
		if ( count( $excerpt ) >= $limit ) {
			array_pop( $excerpt );
			$exc_slice = array_slice( $excerpt, 0, $limit );
			$excerpt = implode( " ", $exc_slice ).' ...';
		} else {
			$exc_slice = array_slice( $excerpt, 0, $limit );
			$excerpt = implode( " ", $exc_slice );
		}
		
		$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
		return $excerpt;

	}
}


/*==========================================================
	Comment number and Link
==========================================================*/
if ( ! function_exists( 'edumark_posted_comments' ) ) {
    function edumark_posted_comments(){
        
        $comments_num = get_comments_number();
        if( comments_open() ){
            if( $comments_num == 0 ){
                $comments = esc_html__('No Comments','edumark');
            } elseif ( $comments_num > 1 ){
                $comments= $comments_num . esc_html__(' Comments','edumark');
            } else {
                $comments = esc_html__( '1 Comment','edumark' );
            }
            $comments = '<i class="ti-comments"></i> '. $comments;
        } else {
            $comments = esc_html__( 'Comments are closed', 'edumark' );
        }
        
        return $comments;
    }
}


/*===================================================
	Post embedded media
===================================================*/
function edumark_embedded_media( $type = array() ){
    
    $content = do_shortcode( apply_filters( 'the_content', get_the_content() ) );
    $embed   = get_media_embedded_in_content( $content, $type );
        
    if( in_array( 'audio' , $type) ){
    
        if( count( $embed ) > 0 ){
            $output = str_replace( '?visual=true', '?visual=false', $embed[0] );
        }else{
           $output = '';
        }
        
    }else{
        
        if( count( $embed ) > 0 ){

            $output = $embed[0];
        }else{
           $output = ''; 
        }
        
    }
    
    return $output;
}


/*===================================================
	WP post link pages
====================================================*/
function edumark_link_pages(){
    wp_link_pages( array(
    'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'edumark' ) . '</span>',
    'after'       => '</div>',
    'link_before' => '<span>',
    'link_after'  => '</span>',
    'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'edumark' ) . ' </span>%',
    'separator'   => '<span class="screen-reader-text">, </span>',
    ) );
}


/*====================================================
	Theme logo
====================================================*/
function edumark_theme_logo( $class = '' ) {

    $siteUrl = home_url('/');
    // site logo
		
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$imageUrl = wp_get_attachment_image_src( $custom_logo_id , 'edumark_logo_154x36' );

	$siteLogo = '';
	if( !empty( $imageUrl[0] ) ){
		$siteLogo = '<a class="'.esc_attr( $class ).'" href="'.esc_url( $siteUrl ).'"><img src="'.esc_url( $imageUrl[0] ).'" alt="edumark logo"></a>';
	}else{
		$default_logo_url = EDUMARK_DIR_ASSETS_URI . 'img/logo.png';
		$siteLogo = '<a class="'.esc_attr( $class ).'" href="'.esc_url( $siteUrl ).'"><img src="'.esc_url( $default_logo_url ).'" alt="edumark logo"></a>';
	}
	
	return wp_kses_post( $siteLogo );
	
}


/*================================================
    Page Title Bar
================================================*/
function edumark_page_titlebar() {
	if ( ! is_page_template( 'template-builder.php' ) ) {
		?>
        <section class="hero-banner">
            <div class="container">
				<h2>
				<?php
				if ( is_category() ) {
					single_cat_title( __('Category: ', 'edumark') );

				} elseif ( is_tag() ) {
					single_tag_title( 'Tag Archive for - ' );

				} elseif ( is_archive() ) {
					echo get_the_archive_title();

				} elseif ( is_page() ) {
					echo get_the_title();

				} elseif ( is_search() ) {
					echo esc_html__( 'Search for: ', 'edumark' ) . get_search_query();

				} elseif ( ! ( is_404() ) && ( is_single() ) || ( is_page() ) ) {
					echo  get_the_title();

				} elseif ( is_home() ) {
					echo esc_html__( 'Blog', 'edumark' );

				} elseif ( is_404() ) {
					echo esc_html__( '404 error', 'edumark' );

				}
				?>
				</h2>
            </div>
        </section>
		<?php
	}
}



/*================================================
	Blog pull right class callback
=================================================*/
function edumark_pull_right( $id = '', $condation ){
    
    if( $id == $condation ){
        return ' '.'order-last';
    }else{
        return;
    }
    
}



/*======================================================
	Inline Background
======================================================*/
function edumark_inline_bg_img( $bgUrl ){
    $bg = '';

    if( $bgUrl ){
        $bg = 'style="background-image:url('.esc_url( $bgUrl ).')"'; 
    }

    return $bg;
}


/*======================================================
	Blog Category
======================================================*/
function edumark_featured_post_cat(){

	if ( 'course' != get_post_type() ) {
		$categories = get_the_category(); 
		
		if( is_array( $categories ) && count( $categories ) > 0 ){
			$getCat = [];
			foreach ( $categories as $value ) {
	
				if( $value->slug != 'featured' ){
					$getCat[] = '<a href="'.esc_url( get_category_link( $value->term_id ) ).'" class="btn_4">'.esc_html( $value->name ).'</a>';
				}   
			}
	
			return implode( ', ', $getCat );
		}
	} else {
		$categories = get_the_terms( get_the_ID(), "course-cat");
		return '<a href="'.get_category_link( $categories[0]->term_id ).'" class="btn_4">'. $categories[0]->name .'</a>';
	}
         
}


/*=======================================================
	Customize Sidebar Option Value Return
========================================================*/
function edumark_sidebar_opt(){

    $sidebarOpt = edumark_opt( 'edumark_blog_layout' );
    $sidebar = '1';
    // Blog Sidebar layout  opt
    if( is_array( $sidebarOpt ) ){
        $sidebarOpt =  $sidebarOpt;
    }else{
        $sidebarOpt =  json_decode( $sidebarOpt, true );
    }
    
    
    if( !empty( $sidebarOpt['columnsCount'] ) ){
        $sidebar = $sidebarOpt['columnsCount'];
    }


    return $sidebar;
}


/**================================================
	Themify Icon
 =================================================*/
function edumark_themify_icon(){
    return[
        'cap'     => __('Icon Cap', 'edumark'),
        'bag'     => __('Icon Bag', 'edumark'),
        'shirt'   => __('Icon T-shirt', 'edumark'),
        'cafe'    => __('Icon Cafe', 'edumark'),
    ];
}


/*===========================================================
	Set contact form 7 default form template
============================================================*/
function edumark_contact7_form_content( $template, $prop ) {
    
    if ( 'form' == $prop ) {

        $template =
            '<div class="row"><div class="col-12"><div class="form-group">[textarea* your-message id:message class:form-control class:w-100 rows:9 cols:30 placeholder "Message"]</div></div><div class="col-sm-6"><div class="form-group">[text* your-name id:name class:form-control placeholder "Enter your  name"]</div></div><div class="col-sm-6"><div class="form-group">[email* your-email id:email class:form-control placeholder "Enter your email"]</div></div><div class="col-12"><div class="form-group">[text your-subject id:subject class:form-control placeholder "Subject"]</div></div></div><div class="form-group mt-3">[submit class:button class:button-contactForm class:boxed-btn "Send Message"]</div>';

        return $template;

    } else {
    return $template;
    } 
}
add_filter( 'wpcf7_default_template', 'edumark_contact7_form_content', 10, 2 );



/*============================================================
	Pagination
=============================================================*/
function edumark_blog_pagination(){
	echo '<nav class="blog-pagination justify-content-center d-flex">';
        the_posts_pagination(
            array(
                'mid_size'  => 2,
                'prev_text' => __( '<span class="ti-angle-left"></span>', 'edumark' ),
                'next_text' => __( '<span class="ti-angle-right"></span>', 'edumark' ),
                'screen_reader_text' => ' '
            )
        );
	echo '</nav>';
}


/*=============================================================
	Course Single Post Navigation
=============================================================*/
if( ! function_exists('edumark_course_single_post_navigation') ) {
	function edumark_course_single_post_navigation() {
		$slim_left_icon = EDUMARK_DIR_ICON_IMG_URI . 'slim-left.svg';
		$slim_right_icon = EDUMARK_DIR_ICON_IMG_URI . 'slim-right.svg';
		// Start nav Area
		if( get_next_post_link() || get_previous_post_link()   ) {
			
			if( get_next_post_link() ){
				$nextPost = get_next_post();
				?>
				<div class="pre_icon float-left">
					<a href="<?php the_permalink(  absint( $nextPost->ID )  ) ?>"><img src="<?php echo esc_url( $slim_left_icon )?>" alt="slim left icon"> <?php echo esc_html__( 'previous', 'edumark' ); ?></a> 
				</div>
				<?php
			}
			
			if( get_previous_post_link() ){
				$prevPost = get_previous_post();
				?>
				<div class="next_icon float-right">
					<a href="<?php the_permalink(  absint( $prevPost->ID )  ) ?>"> <?php echo esc_html__( 'next', 'edumark' ); ?> <img src="<?php echo esc_url( $slim_right_icon )?>" alt="slim right icon"> </a> 
				</div>
				<?php
			}
		}

	}
}


/*=============================================================
	Blog Single Post Navigation
=============================================================*/
if( ! function_exists('edumark_blog_single_post_navigation') ) {
	function edumark_blog_single_post_navigation() {

		// Start nav Area
		if( get_next_post_link() || get_previous_post_link()   ):
			?>
			<div class="navigation-area">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
						<?php
						if( get_next_post_link() ){
							$nextPost = get_next_post();

							if( has_post_thumbnail() ){
								?>
								<div class="thumb">
									<a href="<?php the_permalink(  absint( $nextPost->ID )  ) ?>">
										<?php echo get_the_post_thumbnail( absint( $nextPost->ID ), 'edumark_np_thumb', array( 'class' => 'img-fluid' ) ) ?>
									</a>
								</div>
								<?php
							} ?>
							<div class="arrow">
								<a href="<?php the_permalink(  absint( $nextPost->ID )  ) ?>">
									<span class="ti-arrow-left text-white"></span>
								</a>
							</div>
							<div class="detials">
								<p><?php echo esc_html__( 'Prev Post', 'edumark' ); ?></p>
								<a href="<?php the_permalink(  absint( $nextPost->ID )  ) ?>">
									<h4><?php echo wp_trim_words( get_the_title( $nextPost->ID ), 4, ' ...' ); ?></h4>
								</a>
							</div>
							<?php
						} ?>
					</div>
					<div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
						<?php
						if( get_previous_post_link() ){
							$prevPost = get_previous_post();
							?>
							<div class="detials">
								<p><?php echo esc_html__( 'Next Post', 'edumark' ); ?></p>
								<a href="<?php the_permalink(  absint( $prevPost->ID )  ) ?>">
									<h4><?php echo wp_trim_words( get_the_title( $prevPost->ID ), 4, ' ...' ); ?></h4>
								</a>
							</div>
							<div class="arrow">
								<a href="<?php the_permalink(  absint( $prevPost->ID )  ) ?>">
									<span class="ti-arrow-right text-white"></span>
								</a>
							</div>
							<div class="thumb">
								<a href="<?php the_permalink(  absint( $prevPost->ID )  ) ?>">
									<?php echo get_the_post_thumbnail( absint( $prevPost->ID ), 'edumark_np_thumb', array( 'class' => 'img-fluid' ) ) ?>
								</a>
							</div>
							<?php
						} ?>
					</div>
				</div>
			</div>
		<?php
		endif;

	}
}


/*=======================================================
	Author Bio
=======================================================*/
function edumark_author_bio(){
	$avatar = get_avatar( absint( get_the_author_meta( 'ID' ) ), 90 );
	?>
	<div class="blog-author">
		<div class="media align-items-center">
			<?php
			if( $avatar  ) {
				echo wp_kses_post( $avatar );
			}
			?>
			<div class="media-body">
				<a href="<?php echo esc_url( get_author_posts_url( absint( get_the_author_meta( 'ID' ) ) ) ); ?>"><h4><?php echo esc_html( get_the_author() ); ?></h4></a>
				<p><?php echo esc_html( get_the_author_meta('description') ); ?></p>
			</div>
		</div>
	</div>
	<?php
}


/*===================================================
 Edumark Comment Template Callback
 ====================================================*/
function edumark_comment_callback( $comment, $args, $depth ) {

	if ( 'div' === $args['style'] ) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'li';
		$add_below = 'div-comment';
	}
	?>
	<<?php echo esc_attr( $tag ); ?> <?php comment_class( ( empty( $args['has_children'] ) ? '' : 'parent').' comment-list' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-list">
	<?php endif; ?>
		<div class="single-comment">
			<div class="user d-flex">
				<div class="thumb">
					<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
				</div>
				<div class="desc">
					<div class="comment">
						<?php comment_text(); ?>
					</div>

					<div class="d-flex justify-content-between">
						<div class="d-flex align-items-center">
							<h5 class="comment_author"><?php printf( __( '<span class="comment-author-name">%s</span> ', 'edumark' ), get_comment_author_link() ); ?></h5>
							<p class="date"><?php printf( __('%1$s at %2$s', 'edumark'), get_comment_date(),  get_comment_time() ); ?><?php edit_comment_link( esc_html__( '(Edit)', 'edumark' ), '  ', '' ); ?> </p>
							<?php if ( $comment->comment_approved == '0' ) : ?>
								<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'edumark' ); ?></em>
								<br>
							<?php endif; ?>
						</div>

						<div class="reply-btn">
							<?php comment_reply_link(array_merge( $args, array( 'add_below' => $add_below, 'depth' => 1, 'max_depth' => 5, 'reply_text' => 'Reply' ) ) ); ?>
						</div>
					</div>

				</div>
			</div>
		</div>
	<?php if ( 'div' != $args['style'] ) : ?>
		</div>
	<?php endif; ?>
	<?php
}
// add class comment reply link
add_filter('comment_reply_link', 'edumark_replace_reply_link_class');
function edumark_replace_reply_link_class( $class ) {
	$class = str_replace("class='comment-reply-link", "class='btn-reply comment-reply-link text-uppercase", $class);
	return $class;
}



/*=========================================================
    Latest Blog Post For Elementor Section
===========================================================*/
function edumark_latest_blog( $pNumber = 3, $excerpt_limit = 8, $post_order = 'DESC' ){
	
	$lBlog = new WP_Query( array(
        'post_type'      => 'post',
		'posts_per_page' => $pNumber,
		'order'			 => $post_order
    ) );

    if( $lBlog->have_posts() ){
        while( $lBlog->have_posts() ){
			$lBlog->the_post();
			?>
			<div class="col-xl-4 col-md-4">
				<div class="single_latest_blog">
					<div class="thumb">
						<?php
							if( has_post_thumbnail() ){
								the_post_thumbnail( 'edumark_home_blog_thumb_362x240', ['alt' => get_the_title() ] );
							}
						?>
					</div>
					<div class="content_blog">
						<div class="date">
							<p><?php echo get_the_date('j M, Y')?> in <?php echo edumark_featured_post_cat(); ?></p>
						</div>
						<div class="blog_meta">
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						</div>
						<p class="blog_text">
							<?php echo edumark_excerpt_length( $excerpt_limit ) ?>
						</p>
					</div>
				</div>
			</div>
			<?php
		}
    }

}



/*=========================================================
    Share Button Code
===========================================================*/
function edumark_social_sharing_buttons( $ulClass = '', $tagLine = '' ) {

	// Get page URL
	$URL = get_permalink();
	$Sitetitle = get_bloginfo('name');

	// Get page title
	$Title = str_replace( ' ', '%20', get_the_title());

	// Construct sharing URL without using any script
	$twitterURL = 'https://twitter.com/intent/tweet?text='.esc_html( $Title ).'&amp;url='.esc_url( $URL ).'&amp;via='.esc_html( $Sitetitle );
	$facebookURL= 'https://www.facebook.com/sharer/sharer.php?u='.esc_url( $URL );
	$linkedin   = 'https://www.linkedin.com/shareArticle?mini=true&url='.esc_url( $URL ).'&title='.esc_html( $Title );
	$pinterest  = 'http://pinterest.com/pin/create/button/?url='.esc_url( $URL ).'&description='.esc_html( $Title );;

	// Add sharing button at the end of page/page content
	$content = '';
	$content  .= '<ul class="'.esc_attr( $ulClass ).'">';
	$content .= $tagLine;
	$content .= '<li><a href="' . esc_url( $facebookURL ) . '" target="_blank"><i class="ti-facebook"></i></a></li>';
	$content .= '<li><a href="' . esc_url( $twitterURL ) . '" target="_blank"><i class="ti-twitter-alt"></i></a></li>';
	$content .= '<li><a href="' . esc_url( $pinterest ) . '" target="_blank"><i class="ti-pinterest"></i></a></li>';
	$content .= '<li><a href="' . esc_url( $linkedin ) . '" target="_blank"><i class="ti-linkedin"></i></a></li>';
	$content .= '</ul>';

	return $content;

}



/*================================================
	Projects Return data 
================================================ */
function return_tab_data( $getTags, $menu_tabs ) {
	$y = [];
	foreach ( $getTags as $val ) {

		$t = [];

		foreach( $menu_tabs as $data ) {
			if( $data['label'] == $val ) {
				$t[] = $data;
			}
		}

		$y[$val] = $t;

	}

	return $y;
}

/*=========================================================
	Body support function
=========================================================*/
if ( ! function_exists( 'wp_body_open' ) ) {
    /**
     * Fire the wp_body_open action.
     *
     * Added for backwards compatibility to support WordPress versions prior to 5.2.0.
     */
    function wp_body_open() {
        /**
         * Triggered after the opening <body> tag.
         */
        do_action( 'wp_body_open' );
    }
}

/*=========================================================
    Course Section
========================================================*/
function edumark_special_courses( $cNumber = 3, $cOrder, $excerpt_limit = 15 ){

	$courses = new WP_Query( array(
		'post_type' => 'course',
		'posts_per_page'=> $cNumber,
		'order'			=> $cOrder

	) );
	if( $courses->have_posts() ) {
		while ( $courses->have_posts() ) {
			$courses->the_post();
			$args = array(
				'post_id' => get_the_ID(),
			);
			$reviews = get_comments( $args );
			$reviewCount = is_array( $reviews ) ? count( $reviews ) : '';
			$categories = get_the_terms( get_the_ID(), "course-cat");
			$trainer = get_post_meta( get_the_ID(), 'course_trainer', true );
			$trainer_img = get_post_meta( get_the_ID(), 'course_trainer_img_id', true );
			$trainer_img = wp_get_attachment_image( $trainer_img, 'edumark_course_author_img_50x50' );
			$courseFee = get_post_meta( get_the_ID(), 'course_fee', true );
			?>

			<div class="col-sm-6 col-lg-4">
				<div class="single_special_cource">
					<?php 
						the_post_thumbnail( 'edumark_special_course_360x313', [ 'class' => 'special_img', 'alt' => get_the_title() ] );
					?>

					<div class="special_cource_text">
						<?php
							$categories = get_the_terms( get_the_ID(), "course-cat");
							echo '<a href="'.get_category_link( $categories[0]->term_id ).'" class="btn_4">'. $categories[0]->name .'</a>';
						?>
						<h4><?php echo esc_html( $courseFee )?></h4>
						<a href="<?php the_permalink(); ?>"><h3><?php the_title() ?></h3></a>
						<p><?php echo edumark_excerpt_length( $excerpt_limit ) ?></p>
						<div class="author_info">
							<div class="author_img">
								<?php echo $trainer_img?>
								<div class="author_info_text">
									<p><?php echo esc_html( 'Conduct by: ', 'edumark' )?></p>
									<h5><?php echo esc_html( $trainer )?></h5>
								</div>
							</div>
							<div class="author_rating">
								<?php
									$total = get_post_meta( absint( get_the_ID() ), 'edumark_course_avgreview', true ); 
									if( $reviewCount ) {
										$average = $total / $reviewCount;
										$average_review = number_format( $average, 1, ".", "." );
									} else {
										$average_review = 'N/A';
									}
								
									// Star Review ==================
									$review = ceil( $average_review );
									echo '<div class="rating">';
										if ( $review != 'N/A' ) {
											$i = 1;
											for ($i = 1; $i <= 5; $i++) {
												if ($review >= $i) {
													echo '<span class="fa fa-star checked"></span>';
												} else {
													echo '<span class="fa fa-star"></span>';
												}
											}
										} else {
											for ($i = 1; $i <= 5; $i++) {
												echo '<span class="fa fa-star"></span>';
											}
										}
									echo '</div>';
								?>

								<p><?php echo $average_review . esc_html( ' Ratings', 'edumark' );?></p>
							</div>
						</div>
					</div>

				</div>
			</div>
		<?php
		
		}
	}
}


/*==========================================================
 *  Flaticon Icon List
=========================================================*/
function edumark_flaticon_list(){
    return(
        array(
            'flaticon-art-and-design' 		=> 'Flaticon Art & Design',
            'flaticon-business-and-finance' => 'Flaticon Business & Finance',
            'flaticon-premium' 				=> 'Flaticon Premium',
            'flaticon-crown' 				=> 'Flaticon Crown',
        )
    );
}

// Disables the block editor from managing widgets in the Gutenberg plugin.
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
// Disables the block editor from managing widgets.
add_filter( 'use_widgets_block_editor', '__return_false' );

