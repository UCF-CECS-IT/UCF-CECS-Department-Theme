<?php

/**
 * Dynamically populates sidebar_selector checkbox with the contents of the
 * Sidebar option page.
 *
 * @param array $field
 * @return array
 *
 * @since 1.0.0
 */
function acf_load_sidebar_field_choices( $field ) {

    // reset choices
    $field['choices'] = array();

	$sidebars = get_field( 'sidebars', 'option' );

    foreach( $sidebars as $sidebar ) {
		$name = $sidebar['name'];
		$field['choices'][ $name ] = $name;
  	}

    // return the field
    return $field;

}

add_filter('acf/load_field/name=sidebar_selector', 'acf_load_sidebar_field_choices');

/**
 * This adds:
 *
 * Sidebar Selector Field	-	Adds Sidebar checkbox that is dynamically
 * 								populated with acf_load_sidebar_field_choices
 * Sidebar settings page	-	Repeater to create all selectable sidebars
 *
 * @since 1.0.0
 */
if( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array(
		'key' => 'group_627411c524873',
		'title' => 'Sidebar Selector',
		'fields' => array(
			array(
				'key' => 'field_627411dfe30b6',
				'label' => 'Sidebar(s)',
				'name' => 'sidebar_selector',
				'type' => 'checkbox',
				'instructions' => 'Select which sidebars, if any, should be displayed on this page.',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array(
					'Test' => 'Test',
					'Second' => 'Second',
				),
				'allow_custom' => 0,
				'default_value' => array(
				),
				'layout' => 'vertical',
				'toggle' => 0,
				'return_format' => 'value',
				'save_custom' => 0,
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
				),
			),
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'side',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'show_in_rest' => 0,
	));

	acf_add_local_field_group(array(
		'key' => 'group_62741a5412c41',
		'title' => 'Theme Sidebar Settings',
		'fields' => array(
			array(
				'key' => 'field_62741a7599a22',
				'label' => 'Sidebars',
				'name' => 'sidebars',
				'type' => 'repeater',
				'instructions' => 'Please do not change the names of sidebars once they are in use. Pages look up sidebars by name, so making a name change will remove it from all pages where it is selected.',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'collapsed' => '',
				'min' => 0,
				'max' => 0,
				'layout' => 'row',
				'button_label' => '',
				'sub_fields' => array(
					array(
						'key' => 'field_62741a8999a23',
						'label' => 'Name',
						'name' => 'name',
						'type' => 'text',
						'instructions' => '',
						'required' => 1,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
					array(
						'key' => 'field_62741a9899a24',
						'label' => 'Content',
						'name' => 'content',
						'type' => 'wysiwyg',
						'instructions' => '',
						'required' => 1,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'tabs' => 'all',
						'toolbar' => 'full',
						'media_upload' => 1,
						'delay' => 0,
					),
				),
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options-sidebar',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'show_in_rest' => 0,
	));

endif;
