<?php
namespace Frontend_Admin;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
if( ! class_exists( 'Admin_Settings' ) ) :

	class Admin_Settings{
			
		private $tabs = array();
		
		public function plugin_page() {
			global $frontend_admin_settings;
			$frontend_admin_settings = add_menu_page( FEA_TITLE, FEA_TITLE, 'manage_options', FEA_PRE.'-settings', [ $this, 'admin_settings_page'], 'dashicons-frontend', '87.87778' );
			add_submenu_page( FEA_PRE.'-settings', __( 'Settings', FEA_NS ), __( 'Settings', FEA_NS ), 'manage_options', FEA_PRE.'-settings', '', 0 );
			
		}

		
		
		function admin_settings_page(){
			global $frontend_admin_active_tab;
			$frontend_admin_active_tab = isset( $_GET['tab'] ) ? $_GET['tab'] : 'welcome'; ?>

			<h2 class="nav-tab-wrapper">
			<?php
				$this->settings_tabs();
			?>
			</h2>
			<?php
				$this->settings_render_options_page();
		}

	
		public function settings_tabs(){	
			global $frontend_admin_active_tab; 
			foreach( $this->tabs as $name => $label ){ ?>
				<a class="nav-tab <?php echo $frontend_admin_active_tab == $name || '' ? 'nav-tab-active' : ''; ?>" href="<?php echo admin_url( '?page='.FEA_PRE.'-settings&tab=' . $name ); ?>"><?php _e( $label, FEA_NS ); ?> </a>
			<?php }
		}	

		public function settings_render_options_page() {

			global $frontend_admin_active_tab;

			if ( 'tools' == $frontend_admin_active_tab ){
				$this->fea->admin_tools->html();
				return;
			}
			if ( '' || 'welcome' == $frontend_admin_active_tab ){
				?>
			<style>p.frontend-admin-text{font-size:20px}</style>
			<h3><?php _e( 'Hello and welcome', FEA_NS ); ?></h3>
			<p class="frontend-admin-text"><?php printf( __( 'If this is your first time using %s, please watch this quick tutorial to help get you started.', FEA_NS ), FEA_TITLE )?></p>
			<?php 
			if( FEA_NS == 'frontend-admin' ){
				$support_email = 'support@dynamiapps.com';
			?>
				<iframe width="560" height="315" src="https://www.youtube.com/embed/ZR7UAegiljQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			<?php }else{
				$support_email = 'support@dynamiapps.com';
			?>
				<iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/7vrW8hx5jlE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			<?php } ?>
			<br>
			<p class="frontend-admin-text"><?php _e( 'If you have any questions at all please feel welcome to email support at', FEA_NS )?> <a href="mailto:<?php echo $support_email; ?>"><?php echo $support_email; ?></a> <?php _e( 'or on whatsapp', FEA_NS )?> <a href="https://api.whatsapp.com/send?phone=972532323950">+972-53-232-3950</a></p>
			<?php }else{
				foreach( $this->tabs as $form_tab => $label ){
					if( $form_tab == $frontend_admin_active_tab ){
						$admin_fields = apply_filters( FEA_PREFIX.'/' .$form_tab. '_fields', [] );
						if( $admin_fields ){
							foreach( $admin_fields as $key => $field ){
								$field['key'] = $key;
								$field['name'] = $key;
								$field['prefix'] = 'fea[admin_options]';	
								$field['value'] = '';		
								$admin_fields[$key] = $field;
							}	
							$this->fea->form_display->render_form( [ 
								'admin_options' => 1,
								'hidden_fields' => [ 
									'admin_page' => $frontend_admin_active_tab,
								],
								'_screen_id' => 'options',
								'field_objects' => $admin_fields,
								'submit_value' => __( 'Save Settings', FEA_NS ),
								'default_submit_button' => 1,
								'update_message' => __( 'Settings Saved', FEA_NS ),
								'redirect' => 'custom_url',
								'kses' => 0,
								'honeypot' => 0,
								'no_record' => 1,
								'custom_url' => admin_url( '?page='.FEA_PRE.'-settings&tab=' .$_GET['tab'] ),
							] );
						}else{
							if( in_array( $form_tab, ['payments', 'pdf'] ) ){
								if( isset( $_POST['action'] ) && $_POST['action'] == 'fea_install_plugin' ){
									$this->install_addon( $form_tab );						
								}else{
									$this->addon_form( $form_tab );
								}

							}
						}
					}
				}
			}
		}

		public function addon_form( $addon ){
			$addon_slug = "frontend-$addon/frontend-$addon.php";
			?>
				<form style="margin:20px 5px;" class="frontend-admin-addon-form" method="post" action="">
			<?php
				if( fea_is_plugin_installed( 'frontend-admin-' . $addon ) ){
					echo '<input type="hidden" name="action" value="frontend_admin_activate_plugin"/>';
					$submit_value = "Activate $addon module";
				}else{
					echo '<input type="hidden" name="action" value="fea_install_plugin"/>';
					$submit_value = "Install $addon module";
				}
				printf( __( '<button type="submit" class="button">%s</button>', FEA_NS ), $submit_value );
			?>
				<input type="hidden" name="addon" value="<?php echo $addon; ?>"/>
				<input type="hidden" name="nonce" value="<?php echo wp_create_nonce( 'frontend-admin-addon' ) ?>" />
				</form>
			<?php
		}

		public function configs(){
			if( ! get_option( 'frontend_admin_hide_wp_dashboard' ) ){
				add_option( 'frontend_admin_hide_wp_dashboard', true );
				add_option( 'frontend_admin_hide_by', array_map('strval', [ 0 => 'user'] ) );
			}
			if( ! get_option( 'frontend_admin_save_submissions' ) ){
				add_option( 'frontend_admin_save_submissions', true );
			}
			require_once( __DIR__ . '/admin-pages/forms/custom-fields.php' );
		}

		public function install_addon( $addon ){
			$args = feadmin_parse_args( $_POST, array(
				'nonce'	=> '',
			) );

			if( ! wp_verify_nonce( $args['nonce'], 'frontend-admin-addon' ) ) echo __( 'Nonce error', FEA_NS );

			if( $addon == 'payments' ){
				$addon_zip = 'https://www.dynamiapps.com/wp-content/uploads/2022/12/frontend-payments.zip';
			}

			$installed = fea_install_plugin( $addon_zip );
			if( $installed ){
				$addon_slug = fea_addon_slug( 'frontend-admin-' . $addon );

				$addon_folder = WP_PLUGIN_DIR. str_replace( '/frontend-'.$addon.'.php', '', $addon_slug );
				$fea_folder = WP_PLUGIN_DIR. '/frontend-'.$addon;
				if( ! file_exists( $fea_folder ) ){
					rename( $addon_folder, $fea_folder );
				}

				$this->addon_form( $addon );
			}
		
		}

		public function activate_addon(){
			if( empty( $_POST['action'] ) || $_POST['action'] != 'frontend_admin_activate_plugin' ) return;

			$args = feadmin_parse_args( $_POST, array(
				'nonce'	=> '',
				'addon' => '',
			) );

			if( empty( $args['addon'] ) ) return;

			if( ! wp_verify_nonce( $args['nonce'], 'frontend-admin-addon' ) ) echo __( 'Nonce error', FEA_NS );

			$addon_slug = fea_addon_slug( 'frontend-admin-' . $args['addon'] );

			if( $addon_slug ){
				activate_plugin( $addon_slug );						
			}else{
				echo __( 'Addon Not Found', FEA_NS );
			}
			wp_redirect( add_query_arg( array( 'page' => FEA_PRE.'-settings', 'tab' => $args['addon'] ), admin_url() ) );
		
		}
		
		public function settings_sections(){
			require_once( __DIR__ .'/admin-pages/submissions/crud.php' );

			foreach( $this->tabs as $tab => $label ){
				if( ! in_array( $tab, [ 'welcome', 'payments', 'pdf', 'tools', 'license' ] ) ) require_once( __DIR__ . "/admin-pages/main/$tab.php" );
			}

			require_once( __DIR__ . "/admin-pages/main/admin-tools.php" );
			
			require_once( __DIR__ . '/admin-pages/forms/settings.php' );
			do_action( FEA_PREFIX.'/admin_pages' );
			
		}

		public function validate_save_post(){
			if( isset( $_POST['_acf_admin_page'] ) ){
				$page_slug = $_POST['_acf_admin_page'];
				apply_filters( FEA_PREFIX.'/' . $page_slug . '_fields', [] );
			}
		}
		public function scripts(){
			$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '-min';
			wp_register_style( 'fea-modal', FEA_URL . 'assets/css/modal-min.css', array(), FEA_VERSION );	
			wp_register_style( 'fea-public', FEA_URL . 'assets/css/frontend-admin'.$min.'.css', array( 'acf-input' ), FEA_VERSION );	
		
			wp_register_script( 'fea-modal', FEA_URL . 'assets/js/modal'.$min.'.js', array( 'jquery' ), FEA_VERSION );
			wp_register_script( 'fea-public', FEA_URL . 'assets/js/frontend-admin'.$min.'.js', array( 'jquery', 'acf', 'acf-input' ), FEA_VERSION, true );

			wp_register_script( 'fea-password-strength', FEA_URL . 'assets/js/password-strength.min.js', array( 'password-strength-meter' ), FEA_VERSION, true );
			acf_localize_text( array( 'Passwords Match' => __( 'Passwords Match', FEA_NS ) ) );
			add_action( 'admin_init', array( $this, 'activate_addon' ) );

			wp_register_style( 'fea-icon', FEA_URL . 'assets/css/icon'.$min.'.css', array(), FEA_VERSION );

			wp_register_style( 'fea-form-builder', FEA_URL .  'assets/css/admin'.$min.'.css', array(), FEA_VERSION );
			wp_register_script( 'fea-form-builder', FEA_URL . 'assets/js/admin' .$min. '.js', array( 'jquery', 'acf-input' ), FEA_VERSION, true );
			wp_register_script( 'fea-copy-code', FEA_URL . 'assets/js/copy-shortcode' .$min. '.js', array( 'jquery' ), FEA_VERSION, true );
		}

		public function __construct() {
			$this->fea = fea_instance();
			
			$this->tabs = array(
				'welcome' => 'Welcome',
				'submissions' => 'Submissions',
				'local_avatar' => 'Local Avatar',
				'uploads_privacy' => 'Uploads Privacy',
				'dashboard' => 'Dashboard',
				'apis' => 'APIs', 
				'tools' => 'Tools',
			);

			if( ! empty( $this->fea->elementor ) ){
				$this->tabs['legacy'] = 'Legacy';
			}

			$this->tabs = apply_filters( FEA_PREFIX.'/admin_tabs', $this->tabs );

			$this->settings_sections();

			add_action( 'wp_loaded', array( $this, 'scripts' ) );
			add_action( 'init', array( $this, 'configs' ) );
			add_action( 'admin_menu', array( $this, 'plugin_page' ), 15 );
			add_action( 'acf/validate_save_post', array( $this, 'validate_save_post' ) );

		}
	}

	fea_instance()->admin_settings = new Admin_Settings();

	endif;	