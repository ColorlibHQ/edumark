<?php 
/**
 * @Packge     : Edumark
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

// Block direct access
if( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}

 if ( is_user_logged_in() ) {
    $currentUser = wp_get_current_user();
    $currentUserId = $currentUser->data->ID;
 } else {
    $currentUserId = '';
 }

//  Course meta
 function edumark_course_meta( $id = '' ){
    $prefix = 'course_group_';
    $value = get_post_meta( get_the_ID(), $id, true );
    return $value;
}
//  Course rating
 function edumark_course_rating( $rating = 5 ){
    for ( $i = 1; $i <= $rating; $i++ ) {
        echo '<i class="flaticon-mark-as-favorite-star"></i>';
    }
}

// Call Header
get_header();
    if( function_exists( 'edumark_set_post_views' ) ){
        edumark_set_post_views( get_the_ID() );
    }
    
    if( have_posts() ){
        while( have_posts() ){
        the_post();
        $args = array(
            'post_id' => get_the_ID(),
        );
        $reviews = get_comments( $args );
        $reviewCount = is_array( $reviews ) ?  count( $reviews ) : '';
        
        $courseFeeRegular = edumark_course_meta('course_fee_regular');
        $courseFeeDiscount = edumark_course_meta('course_fee_discount');
        $courseRating = edumark_course_meta('total_rating');
        $totalVideos = edumark_course_meta('total_videos');
        $courseDuration = edumark_course_meta('course_duration');
        $popupVieoUrl = edumark_course_meta('highlight_video_url');
        $courseEnrollUrl = edumark_course_meta('course_enroll');
    ?>  
    
    <!-- bradcam_area_start -->
    <div class="courses_details_banner">
         <div class="container">
             <div class="row">
                 <div class="col-xl-6">
                     <div class="course_text">
                            <h3><?php the_title()?></h3>
                            <div class="prise">
                                <span class="inactive"><?php echo esc_html($courseFeeRegular)?></span>
                                <span class="active"><?php echo esc_html($courseFeeDiscount)?></span>
                            </div>
                            <?php
                                if ( $courseRating ) {
                                    ?>
                                    <div class="rating">
                                        <?php edumark_course_rating($courseRating)?>
                                        <span>(<?php echo esc_html($courseRating)?>)</span>
                                    </div>
                                    <?php
                                }
                            ?>
                            <div class="hours">
                                <div class="video">
                                     <div class="single_video">
                                            <i class="fa fa-clock-o"></i> <span><?php echo esc_html($totalVideos)?></span>
                                     </div>
                                     <div class="single_video">
                                            <i class="fa fa-play-circle-o"></i> <span><?php echo esc_html($courseDuration)?></span>
                                     </div>
                                   
                                </div>
                            </div>
                     </div>
                 </div>
             </div>
         </div>
    </div>
    <!-- bradcam_area_end -->

    <!--================ Start Course Details Area =================-->
    <div class="courses_details_info">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-7">
                    <div class="single_courses">
                        <h3><?php echo esc_html__( 'Objectives', 'edumark' ); ?></h3>
                        <?php the_content()?>
                        <h3 class="second_title"><?php echo esc_html__( 'Course Outline', 'edumark' ); ?></h3>
                    </div>
                    <div class="outline_courses_info">
                        <div id="accordion">
                            <?php
                            $outlines = get_post_meta( get_the_ID(), 'course_outlines', true );
                            if( ! empty( $outlines ) ){
                                foreach( $outlines as $key => $value ){
                                    // $key++;
                                    ?>
                                    <div class="card">
                                        <div class="card-header" id="heading<?=esc_attr( $key )?>">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse<?=esc_attr( $key )?>" aria-expanded="false" aria-controls="collapse<?=esc_attr( $key )?>">
                                                    <i class="flaticon-question"></i> <?=esc_html( $value['lesson_title'] )?>
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapse<?=esc_attr( $key )?>" class="collapse" aria-labelledby="heading<?=esc_attr( $key )?>" data-parent="#accordion">
                                            <div class="card-body">
                                                <?=esc_html( $value['lesson_text'] )?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5">
                    <div class="courses_sidebar">
                        <div class="video_thumb">
                            <?php
                                if( has_post_thumbnail() ){
                                    the_post_thumbnail( 'edumark_course_single_thumb_460x460', array( 'alt' => get_the_title() ) );                 
                                }
                            ?>
                            <a class="popup-video" href="<?php echo esc_url( $popupVieoUrl )?>">
                                <i class="fa fa-play"></i>
                            </a>
                        </div>
                        <div class="author_info">
                            <?php
                                $trainer_img =  get_post_meta( get_the_ID(), 'course_trainer_img', 1 );
                                $trainer_name = get_post_meta( get_the_ID(), 'course_trainer', 1 );
                                $trainer_designation = get_post_meta( get_the_ID(), 'trainers_designation', 1 );
                                $trainer_text = get_post_meta( get_the_ID(), 'trainers_text', 1 );
                            ?>
                            <div class="auhor_header">
                                <div class="thumb">
                                    <?php
                                        if( $trainer_img ) {
                                            echo '<img src="'.esc_url($trainer_img).'">';
                                        }
                                    ?>
                                </div>
                                <div class="name">
                                    <h3><?=esc_html( $trainer_name )?></h3>
                                    <p><?=esc_html( $trainer_designation )?></p>
                                </div>
                            </div>
                            <p class="text_info"><?=wp_kses_post( $trainer_text )?></p>
                            <ul>
                                <li><a href="#"> <i class="fa fa-envelope"></i> </a></li>
                                <li><a href="#"> <i class="fa fa-twitter"></i> </a></li>
                                <li><a href="#"> <i class="ti-linkedin"></i> </a></li>
                            </ul>
                        </div>
                        <a href="<?php echo esc_url( $courseEnrollUrl )?>" class="boxed_btn">Buy Course</a>
                        <div class="feedback_info">
                            <h3>Write your feedback</h3>
                            <p>Your rating</p>
                            <div class='rating-stars text-center'>
                                <ul id='stars'>
                                    <li class='star' title='Poor' data-value='1'>
                                        <i class='flaticon-mark-as-favorite-star'></i>
                                    </li>
                                    <li class='star' title='Fair' data-value='2'>
                                        <i class='flaticon-mark-as-favorite-star'></i>
                                    </li>
                                    <li class='star' title='Good' data-value='3'>
                                        <i class='flaticon-mark-as-favorite-star'></i>
                                    </li>
                                    <li class='star' title='Excellent' data-value='4'>
                                        <i class='flaticon-mark-as-favorite-star'></i>
                                    </li>
                                    <li class='star' title='WOW!!!' data-value='5'>
                                        <i class='flaticon-mark-as-favorite-star'></i>
                                    </li>
                                </ul>
                            </div>
                            
                            <div class='success-box text-right'>
                                <div class='text-message'><span><?php echo esc_html__( 'N/A', 'edumark' ); ?></span></div>
                            </div>
                            
                            <form action="#" method="post" id="reviw_submit">
                                <textarea name="feedback" id="feedback" placeholder="Write your feedback" cols="30" rows="10"></textarea>
                                <input type="hidden" name="ratingvalue" id="ratingvalue" >
                                <input type="hidden" id="reviewajax" value="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ) ?>" >
                                <input type="hidden" name="userid" id="userid" value="<?php echo absint( $currentUserId ) ?>" >
                                <input type="hidden" name="postid" id="postid" value="<?php echo absint( get_the_ID() ); ?>" >
                                <button type="submit" name="subpost" class="boxed_btn"><?php echo esc_html__( 'Submit', 'edumark' ); ?></button>
                            </form>
                        </div>

                        <div class="comments-area mb-30">
                            <?php 
                            if( $reviewCount > 0 ){
                                foreach( $reviews as $review ){ 
                                    $starReview = get_comment_meta( $review->comment_ID, 'edumark_course_review', true );
                                    
                                    ?>
                                    <div class="comment-list">
                                        <div class="single-comment single-reviews justify-content-between d-flex">
                                            <div class="user justify-content-between d-flex">
                                                <div class="thumb">
                                                    <?php echo get_avatar( $review->user_id , 60 ); ?>
                                                </div>
                                                <div class="desc">
                                                    <h5><?php echo $review->comment_author;  ?></h5>
                                                    <?php
                                                    // Star Review ==================
                                                    if (!empty( $starReview )) {
                                                        echo '<div class="star">';
                                                        $i = 1;
                                                        for ($i = 1; $i <= 5; $i++) {

                                                            if ($starReview >= $i) {
                                                                echo '<span class="fa fa-star checked"></span>';
                                                            } else {
                                                                echo '<span class="fa fa-star"></span>';
                                                            }
                                                        }
                                                        echo '</div>';
                                                    } ?>
                                                    </h5>
                                                    <p class="comment"> <?php echo $review->comment_content; ?> </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                                        
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================ End Course Details Area =================-->
    <?php
    }
    }
// Call Footer
get_footer();
