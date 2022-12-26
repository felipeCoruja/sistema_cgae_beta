<?php
namespace Frontend_Admin\Widgets;

use Frontend_Admin\Widgets\ACF_Elementor_Form_Base;


	
/**

 *
 * @since 1.0.0
 */
class Duplicate_Product_Widget extends ACF_Frontend_Form_Widget {
	
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
		return 'duplicate_product';
	}

    public function hide_on_search() {
		return true;
	}
	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the acf ele form widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return array('');
	}

}
