<?php

if( ! class_exists('acf_field_post_content') ) :

class acf_field_post_content extends acf_field_text {
	
	
	/*
	*  initialize
	*
	*  This function will setup the field type data
	*
	*  @type	function
	*  @date	5/03/2014
	*  @since	5.0.0
	*
	*  @param	n/a
	*  @return	n/a
	*/
	
	function initialize() {
		
		// vars
		$this->name = 'post_content';
		$this->label = __("Content",FEA_NS);
        $this->category = __( "Post", FEA_NS );
		$this->defaults = array(
			'data_name'     => 'content',
            'field_type'    => 'wysiwyg',
			'tabs'			=> 'all',
			'toolbar'		=> 'full',
			'media_upload' 	=> 1,
			'default_value'	=> '',
			'delay'			=> 0,
			'new_lines'		=> '',
			'maxlength'		=> '',
			'placeholder'	=> '',
			'rows'			=> ''
		);
        add_filter( 'acf/update_value/type=' . $this->name,  [ $this, 'pre_update_value'], 9, 3 );      
		
	}

	function load_field( $field ){
        $field['name'] = $field['type'];
        return $field;
    }

    function prepare_field( $field ){
		if( feadmin_edit_mode() ){
			$field['media_buttons'] = false;
		}
        $field['type'] = $field['field_type'];
        return $field;
    }

    public function load_value( $value, $post_id = false, $field = false ){
		if( feadmin_edit_mode() && get_the_ID() == $post_id ){
			return '';
		}
        if( $post_id && is_numeric( $post_id ) ){  
            $edit_post = get_post( $post_id );
            $value = $edit_post->post_content;
        }
        return $value;
    }

    function pre_update_value( $value, $post_id = false, $field = false ){
        if( $post_id && is_numeric( $post_id ) ){  
            $post_to_edit = [
                'ID' => $post_id,
            ];
            $post_to_edit['post_content'] = $value;
            remove_action( 'acf/save_post', '_acf_do_save_post' );
            wp_update_post( $post_to_edit );
            add_action( 'acf/save_post', '_acf_do_save_post' );

        }
        return $value;
    }

    function update_value( $value, $post_id = false, $field = false ){
        return null;
    }

    function render_field_settings( $field ){
        acf_render_field_setting( $field, array(
            'label'			=> __('Appearance', FEA_NS),
            'name'			=> 'field_type',
            'type'			=> 'radio',
            'choices'		=> array(
                'wysiwyg' => __( 'Wysiwyg', FEA_NS ),
                'textarea' => __( 'Text Area', FEA_NS ),
            ),
        ) ); 

        // vars
		$toolbars = $this->get_toolbars();
		$choices = array();
		
		if( !empty($toolbars) ) {
		
			foreach( $toolbars as $k => $v ) {
				
				$label = $k;
				$name = sanitize_title( $label );
				$name = str_replace('-', '_', $name);
				
				$choices[ $name ] = $label;
			}
		}
		
		
		// default_value
		acf_render_field_setting( $field, array(
			'label'			=> __('Default Value',FEA_NS),
			'instructions'	=> __('Appears when creating a new post',FEA_NS),
			'type'			=> 'textarea',
			'name'			=> 'default_value',
		));
		
		
		// tabs
		acf_render_field_setting( $field, array(
			'label'			=> __('Tabs',FEA_NS),
			'instructions'	=> '',
			'type'			=> 'select',
			'name'			=> 'tabs',
			'choices'		=> array(
				'all'			=>	__("Visual & Text",FEA_NS),
				'visual'		=>	__("Visual Only",FEA_NS),
				'text'			=>	__("Text Only",FEA_NS),
            ),
            'conditions'	=> array(
                array(
                    array(
                        'field'		=> 'field_type',
                        'operator'	=> '==',
                        'value'		=> 'wysiwyg'
                    ),
                ),
			),
		));
		
		
		// toolbar
		acf_render_field_setting( $field, array(
			'label'			=> __('Toolbar',FEA_NS),
			'instructions'	=> '',
			'type'			=> 'select',
			'name'			=> 'toolbar',
			'choices'		=> $choices,
            'conditions'	=> array(
                array(
                    array(
                        'field'		=> 'field_type',
                        'operator'	=> '==',
                        'value'		=> 'wysiwyg'
                    ),
                    array(
                        'field'		=> 'tabs',
                        'operator'	=> '!=',
                        'value'		=> 'text'
                    )
                ),
			),
		));
		
		
		// media_upload
		acf_render_field_setting( $field, array(
			'label'			=> __('Show Media Upload Buttons?',FEA_NS),
			'instructions'	=> '',
			'name'			=> 'media_upload',
			'type'			=> 'true_false',
			'ui'			=> 1,
            'conditions'	=> array(
                array(
                    array(
                        'field'		=> 'field_type',
                        'operator'	=> '==',
                        'value'		=> 'wysiwyg'
                    ),
                ),
			),
		));
		
		
		// delay
		acf_render_field_setting( $field, array(
			'label'			=> __('Delay initialization?',FEA_NS),
			'instructions'	=> __('TinyMCE will not be initialized until field is clicked',FEA_NS),
			'name'			=> 'delay',
			'type'			=> 'true_false',
			'ui'			=> 1,
			'conditions'	=> array(
                array(
                    array(
                        'field'		=> 'field_type',
                        'operator'	=> '==',
                        'value'		=> 'wysiwyg'
                    ),
                    array(
                        'field'		=> 'tabs',
                        'operator'	=> '!=',
                        'value'		=> 'text'
                    )
                ),
			),
		));

        // placeholder
		acf_render_field_setting( $field, array(
			'label'			=> __('Placeholder Text',FEA_NS),
			'instructions'	=> __('Appears within the input',FEA_NS),
			'type'			=> 'text',
			'name'			=> 'placeholder',
            'conditions'	=> array(
                array(
                    array(
                        'field'		=> 'field_type',
                        'operator'	=> '==',
                        'value'		=> 'textarea'
                    ),
                ),
			),
		));
		
		
		// maxlength
		acf_render_field_setting( $field, array(
			'label'			=> __('Character Limit',FEA_NS),
			'instructions'	=> __('Leave blank for no limit',FEA_NS),
			'type'			=> 'number',
			'name'			=> 'maxlength',
            'conditions'	=> array(
                array(
                    array(
                        'field'		=> 'field_type',
                        'operator'	=> '==',
                        'value'		=> 'textarea'
                    ),
                ),
			),
		));
		
		
		// rows
		acf_render_field_setting( $field, array(
			'label'			=> __('Rows',FEA_NS),
			'instructions'	=> __('Sets the textarea height',FEA_NS),
			'type'			=> 'number',
			'name'			=> 'rows',
			'placeholder'	=> 8,
            'conditions'	=> array(
                array(
                    array(
                        'field'		=> 'field_type',
                        'operator'	=> '==',
                        'value'		=> 'textarea'
                    ),
                ),
			),
		));
		
		
		// formatting
		acf_render_field_setting( $field, array(
			'label'			=> __('New Lines',FEA_NS),
			'instructions'	=> __('Controls how new lines are rendered',FEA_NS),
			'type'			=> 'select',
			'name'			=> 'new_lines',
			'choices'		=> array(
				'wpautop'		=> __("Automatically add paragraphs",FEA_NS),
				'br'			=> __("Automatically add &lt;br&gt;",FEA_NS),
				''				=> __("No Formatting",FEA_NS)
            ),
            'conditions'	=> array(
                array(
                    array(
                        'field'		=> 'field_type',
                        'operator'	=> '==',
                        'value'		=> 'textarea'
                    ),
                ),
			),
		));

    }

    function get_toolbars() {
		
		// vars
		$editor_id = 'acf_content';
		$toolbars = array();
		
		
		// mce buttons (Full)
		$mce_buttons = array( 'formatselect', 'bold', 'italic', 'bullist', 'numlist', 'blockquote', 'alignleft', 'aligncenter', 'alignright', 'link', 'wp_more', 'spellchecker', 'fullscreen', 'wp_adv' );
		$mce_buttons_2 = array( 'strikethrough', 'hr', 'forecolor', 'pastetext', 'removeformat', 'charmap', 'outdent', 'indent', 'undo', 'redo', 'wp_help' );
		
		// mce buttons (Basic)
		$teeny_mce_buttons = array('bold', 'italic', 'underline', 'blockquote', 'strikethrough', 'bullist', 'numlist', 'alignleft', 'aligncenter', 'alignright', 'undo', 'redo', 'link', 'fullscreen');
		
		
		// WP < 4.7	
		if( acf_version_compare('wp', '<', '4.7') ) {
		
			$mce_buttons = array( 'bold', 'italic', 'strikethrough', 'bullist', 'numlist', 'blockquote', 'hr', 'alignleft', 'aligncenter', 'alignright', 'link', 'unlink', 'wp_more', 'spellchecker', 'fullscreen', 'wp_adv' );
			$mce_buttons_2 = array( 'formatselect', 'underline', 'alignjustify', 'forecolor', 'pastetext', 'removeformat', 'charmap', 'outdent', 'indent', 'undo', 'redo', 'wp_help' );
		}
		
		
		// Full
   		$toolbars['Full'] = array(
   			1 => apply_filters('mce_buttons',	$mce_buttons,	$editor_id),
   			2 => apply_filters('mce_buttons_2', $mce_buttons_2,	$editor_id),
   			3 => apply_filters('mce_buttons_3', array(),		$editor_id),
   			4 => apply_filters('mce_buttons_4', array(),		$editor_id)
   		);
	   	
	   	
   		// Basic
   		$toolbars['Basic'] = array(
   			1 => apply_filters('teeny_mce_buttons', $teeny_mce_buttons, $editor_id)
   		);
   		
   		
   		// Filter for 3rd party
   		$toolbars = apply_filters( 'acf/fields/wysiwyg/toolbars', $toolbars );
   		
   		
   		// return
	   	return $toolbars;
	   	
   	}
   	
    
}

// initialize
acf_register_field_type( 'acf_field_post_content' );

endif;
	
?>