<?php
namespace Frontend_Admin\Widgets;

use Frontend_Admin\Widgets\ACF_Elementor_Form_Base;


	
/**

 *
 * @since 1.0.0
 */
class Edit_Post_Widget extends ACF_Frontend_Form_Widget {
	
	/**
	 * Get widget name.
	 *
	 * Retrieve acf ele form widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'edit_post';
	}

    /**
     * Get widget defaults.
     *
     * Retrieve acf form widget defaults.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget defaults.
     */
    public function get_form_defaults()
    {
        return [
            'custom_fields_save' => 'post',
            'form_title'      => '',
            'submit'          => __( 'Submit', FEA_NS ),
            'success_message' => __( 'Your post has been edited successfully.', FEA_NS ),
            'field_type'      => 'post_title',
            'fields'          => array( 
                array( 'post_title' )
            ),
        ];
    }
    
    
    /**
     * Get widget title.
     *
     * Retrieve acf ele form widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __( 'Edit Post Form', FEA_NS );
    }

     /**
     * Get widget icon.
     *
     * Retrieve acf ele form widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-form-vertical frontend-icon';
    }
    

}
