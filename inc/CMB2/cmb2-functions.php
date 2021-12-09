<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'edumark_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category Edumark
 * @package  edumark
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/CMB2/CMB2
 */



add_action( 'cmb2_admin_init', 'course_repeatable_group_field_metabox' );
/**
 * Hook in and add a metabox to demonstrate repeatable grouped fields
 */
function course_repeatable_group_field_metabox() {
	$prefix = 'course_group_';

	$cmb_meta = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => esc_html__( 'Course Additional Fields', 'edumark' ),
		'object_types'  => array( 'course' )
		
	) );
	$cmb_meta->add_field( array(
		'name' => esc_html__( 'Trainer’s Name', 'edumark' ),
		'id'   => 'course_trainer',
		'type' => 'text',
	) );
	$cmb_meta->add_field( array(
		'name' => esc_html__( 'Trainer’s Image', 'edumark' ),
		'description' => esc_html__( 'Trainsdf Image', 'edumark' ),
		'id'   => 'course_trainer_img',
		'type' => 'file',
		'query_args' => array(
			'type' => array(
				'image/jpg',
				'image/jpeg',
				'image/png',
			),
		),
		
	) );
	$cmb_meta->add_field( array(
		'name' => esc_html__( 'Trainer’s Designation', 'edumark' ),
		'id'   => 'trainers_designation',
		'type' => 'text',
	) );
	$cmb_meta->add_field( array(
		'name' => esc_html__( 'Trainer’s Text', 'edumark' ),
		'id'   => 'trainers_text',
		'type' => 'textarea',
	) );
	$cmb_meta->add_field( array(
		'name' => esc_html__( 'Regular Course Fee', 'edumark' ),
		'id'   => 'course_fee_regular',
		'type' => 'text',
	) );
	$cmb_meta->add_field( array(
		'name' => esc_html__( 'Discount Course Fee', 'edumark' ),
		'id'   => 'course_fee_discount',
		'type' => 'text',
	) );
	$cmb_meta->add_field( array(
		'name' => esc_html__( 'Rating', 'edumark' ),
		'id'   => 'total_rating',
		'type' => 'text',
	) );
	$cmb_meta->add_field( array(
		'name' => esc_html__( 'Total Videos', 'edumark' ),
		'id'   => 'total_videos',
		'type' => 'text',
	) );
	$cmb_meta->add_field( array(
		'name' => esc_html__( 'Course Duration', 'edumark' ),
		'id'   => 'course_duration',
		'type' => 'text',
	) );
	$cmb_meta->add_field( array(
		'name' => esc_html__( 'Course Highlight Video URL', 'edumark' ),
		'id'   => 'highlight_video_url',
		'type' => 'text_url',
	) );
	$cmb_meta->add_field( array(
		'name' => esc_html__( 'Course Enroll URL', 'edumark' ),
		'id'   => 'course_enroll',
		'type' => 'text_url',
	) );


	/**
	 * Repeatable Field Groups
	 */
	$cmb_group = new_cmb2_box( array(
		'id'           => 'course_outline',
		'title'        => esc_html__( 'Course Outline', 'edumark' ),
		'object_types' => array( 'course' ),
	) );

	// $group_field_id is the field id string, so in this case: $prefix . 'demo'
	$group_field_id = $cmb_group->add_field( array(
		'id'          => 'course_outlines',
		'type'        => 'group',
		'options'     => array(
			'group_title'    => esc_html__( 'Outline {#}', 'edumark' ),
			'add_button'     => esc_html__( 'Add Outline', 'edumark' ),
			'remove_button'  => esc_html__( 'Remove Outline', 'edumark' ),
			'sortable'       => true,
		),
	) );

	/**
	 * Group fields works the same, except ids only need
	 * to be unique to the group. Prefix is not needed.
	 *
	 * The parent field's id needs to be passed as the first argument.
	 */
	$cmb_group->add_group_field( $group_field_id, array(
		'name'       => esc_html__( 'Outline Title', 'edumark' ),
		'id'         => 'lesson_title',
		'type'       => 'text',
		// 'repeatable' => true,
	) );
	$cmb_group->add_group_field( $group_field_id, array(
		'name'       => esc_html__( 'Details', 'edumark' ),
		'id'         => 'lesson_text',
		'type'       => 'textarea',
		// 'repeatable' => true,
	) );


}
