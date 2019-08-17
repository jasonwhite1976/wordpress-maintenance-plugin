<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       www.whitedev.co.uk
 * @since      1.0.0
 *
 * @package    Maintenance_White_Dev
 * @subpackage Maintenance_White_Dev/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Maintenance_White_Dev
 * @subpackage Maintenance_White_Dev/admin
 * @author     Jason White <jason@whitedev.co.uk>
 */
class Maintenance_White_Dev_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}


	/**
	 * Register the settings page for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function register_settings_page() {
		// Create our settings page as a submenu page.
		add_submenu_page(
			'options-general.php',                             					// parent slug
			__( 'Coming Soon / Maintenance', 'maintenance-white-dev-save' ),    // page title
			__( 'Coming Soon / Maintenance', 'maintenance-white-dev-save' ),    // menu title
			'manage_options',                        							// capability
			'maintenance-white-dev-save',                           			// menu_slug
			array( $this, 'display_settings_page' ) 							// callable function
		);
	}



	/**
	 * Register the settings for our settings page.
	 *
	 * @since    1.0.0
	 */
	public function register_settings() {

		// Here we are going to register our setting.
		register_setting(
			$this->plugin_name . '-settings',
			$this->plugin_name . '-settings',
			array( $this, 'sandbox_register_setting' )
		);

		// Here we are going to add a section for our setting.
		add_settings_section(
			$this->plugin_name . '-settings-section',
			__( 'Maintenance Mode settings', 'maintenance-white-dev-save' ),
			array( $this, 'sandbox_add_settings_section' ),
			$this->plugin_name . '-settings'
		);

		add_settings_field(
			'main-title',
			__( 'Main Title', 'maintenance-white-dev-save' ),
			array( $this, 'sandbox_add_settings_field_input_text' ),
			$this->plugin_name . '-settings',
			$this->plugin_name . '-settings-section',
			array(
				'label_for' => 'main-title',
				'default'   => __( 'Maintenance mode.', 'maintenance-white-dev-save' )
			)
		);

		add_settings_field(
			'sub-title',
			__( 'Sub Title', 'maintenance-white-dev-save' ),
			array( $this, 'sandbox_add_settings_field_input_text' ),
			$this->plugin_name . '-settings',
			$this->plugin_name . '-settings-section',
			array(
				'label_for' => 'sub-title',
				'default'   => __( 'Come back soon', 'maintenance-white-dev-save' )
			)
		);

		add_settings_field(
			'show-launch-date',
			__( 'Show Launch Date', 'maintenance-white-dev-save' ),
			array( $this, 'sandbox_add_settings_field_single_checkbox' ),
			$this->plugin_name . '-settings',
			$this->plugin_name . '-settings-section',
			array(
				'label_for' => 'show-launch-date',
				'description'   => __( 'Show a countdown to the launch-date set below', 'maintenance-white-dev-save' )
			)
		);
		
		add_settings_field(
			'launch-date',
			__( 'Launch Date', 'maintenance-white-dev-save' ),
			array( $this, 'sandbox_add_settings_field_input_text_dates' ),
			$this->plugin_name . '-settings',
			$this->plugin_name . '-settings-section',
			array(
				'label_for' => 'launch-date',
				'default'   => __( '', 'maintenance-white-dev-save' )
			)
		);

		add_settings_field(
			'text-color',
			__( 'Text Color', 'maintenance-white-dev-save' ),
			array( $this, 'sandbox_add_settings_field_input_text_color' ),
			$this->plugin_name . '-settings',
			$this->plugin_name . '-settings-section',
			array(
				'label_for' => 'text-color',
				'default'   => __( '#000000', 'maintenance-white-dev-save' )
			)
		);
		
		add_settings_field(
			'background-color',
			__( 'Background Color', 'maintenance-white-dev-save' ),
			array( $this, 'sandbox_add_settings_field_input_background_color' ),
			$this->plugin_name . '-settings',
			$this->plugin_name . '-settings-section',
			array(
				'label_for' => 'background-color',
				'default'   => __( '', 'maintenance-white-dev-save' )
			)
		);

		add_settings_field(
			'background-image',
			__( 'Background Image', 'maintenance-white-dev-save' ),
			array( $this, 'sandbox_add_settings_field_input_bg_image' ),
			$this->plugin_name . '-settings',
			$this->plugin_name . '-settings-section',
			array(
				'label_for'   => 'background-image',
				'default'     => __( '', 'maintenance-white-dev-save' ),
				'description' => __( 'Add the full URL to the image', 'maintenance-white-dev-save' )
			)
		);

	}

	/**
	 * Sandbox our settings.
	 *
	 * @since    1.0.0
	 */
	public function sandbox_register_setting( $input ) {

		$new_input = array();

		if ( isset( $input ) ) {
			// Loop trough each input and sanitize the value if the input id isn't post-types
			foreach ( $input as $key => $value ) {
				if ( $key == 'post-types' ) {
					$new_input[ $key ] = $value;
				} else {
					$new_input[ $key ] = sanitize_text_field( $value );
				}
			}
		}

		return $new_input;

	}

	/**
	 * Sandbox our section for the settings.
	 *
	 * @since    1.0.0
	 */
	public function sandbox_add_settings_section() {

		return;

	}

	/**
	 * Sandbox our single checkboxes.
	 *
	 * @since    1.0.0
	 */
	public function sandbox_add_settings_field_single_checkbox( $args ) {

		$field_id = $args['label_for'];
		$field_description = $args['description'];

		$options = get_option( $this->plugin_name . '-settings' );
		$option = 0;

		if ( ! empty( $options[ $field_id ] ) ) {
			$option = $options[ $field_id ];
		}

		?>

			<label for="<?php echo $this->plugin_name . '-settings[' . $field_id . ']'; ?>">
				<input type="checkbox" name="<?php echo $this->plugin_name . '-settings[' . $field_id . ']'; ?>" id="<?php echo $this->plugin_name . '-settings[' . $field_id . ']'; ?>" <?php checked( $option, true, 1 ); ?> value="1" />
				<span class="description"><?php echo esc_html( $field_description ); ?></span>
			</label>

		<?php

	}

	/**
	 * Sandbox our multiple checkboxes
	 *
	 * @since    1.0.0
	 */
	public function sandbox_add_settings_field_multiple_checkbox( $args ) {

		$field_id = $args['label_for'];
		$field_description = $args['description'];

		$options = get_option( $this->plugin_name . '-settings' );
		$option = array();

		if ( ! empty( $options[ $field_id ] ) ) {
			$option = $options[ $field_id ];
		}

		if ( $field_id == 'post-types' ) {

			$args = array(
				'public' => true
			);
			$post_types = get_post_types( $args, 'objects' );

			foreach ( $post_types as $post_type ) {

				if ( $post_type->name != 'attachment' ) {

					if ( in_array( $post_type->name, $option ) ) {
						$checked = 'checked="checked"';
					} else {
						$checked = '';
					}

					?>

						<fieldset>
							<label for="<?php echo $this->plugin_name . '-settings[' . $field_id . '][' . $post_type->name . ']'; ?>">
								<input type="checkbox" name="<?php echo $this->plugin_name . '-settings[' . $field_id . '][]'; ?>" id="<?php echo $this->plugin_name . '-settings[' . $field_id . '][' . $post_type->name . ']'; ?>" value="<?php echo esc_attr( $post_type->name ); ?>" <?php echo $checked; ?> />
								<span class="description"><?php echo esc_html( $post_type->label ); ?></span>
							</label>
						</fieldset>

					<?php

				}

			}

		} else {

			$field_args = $args['options'];

			foreach ( $field_args as $field_arg_key => $field_arg_value ) {

				if ( in_array( $field_arg_key, $option ) ) {
					$checked = 'checked="checked"';
				} else {
					$checked = '';
				}

				?>

					<fieldset>
						<label for="<?php echo $this->plugin_name . '-settings[' . $field_id . '][' . $field_arg_key . ']'; ?>">
							<input type="checkbox" name="<?php echo $this->plugin_name . '-settings[' . $field_id . '][]'; ?>" id="<?php echo $this->plugin_name . '-settings[' . $field_id . '][' . $field_arg_key . ']'; ?>" value="<?php echo esc_attr( $field_arg_key ); ?>" <?php echo $checked; ?> />
							<span class="description"><?php echo esc_html( $field_arg_value ); ?></span>
						</label>
					</fieldset>

				<?php

			}

		}

		?>

			<p class="description"><?php echo esc_html( $field_description ); ?></p>

		<?php

	}

	/**
	 * Sandbox our inputs with text
	 *
	 * @since    1.0.0
	 */
	public function sandbox_add_settings_field_input_bg_image( $args ) {

		$field_id = $args['label_for'];
		$field_default = $args['default'];
		$field_description = $args['description'];

		$options = get_option( $this->plugin_name . '-settings' );
		$option = $field_default;

		if ( ! empty( $options[ $field_id ] ) ) {
			$option = $options[ $field_id ];
		}

		?>

			<p class="description"><?php echo esc_html( $field_description ); ?></p>
		
			<input type="text" name="<?php echo $this->plugin_name . '-settings[' . $field_id . ']'; ?>" id="<?php echo $this->plugin_name . '-settings[' . $field_id . ']'; ?>" value="<?php echo esc_attr( $option ); ?>" class="regular-text" />			

		<?php

	}

	/**
	 * Sandbox our inputs with text
	 *
	 * @since    1.0.0
	 */
	public function sandbox_add_settings_field_input_text( $args ) {

		$field_id = $args['label_for'];
		$field_default = $args['default'];

		$options = get_option( $this->plugin_name . '-settings' );
		$option = $field_default;

		if ( ! empty( $options[ $field_id ] ) ) {
			$option = $options[ $field_id ];
		}

		?>
		
			<input type="text" name="<?php echo $this->plugin_name . '-settings[' . $field_id . ']'; ?>" id="<?php echo $this->plugin_name . '-settings[' . $field_id . ']'; ?>" value="<?php echo esc_attr( $option ); ?>" class="regular-text" />

		<?php

	}

	/**
	 * Sandbox our inputs with text dates
	 *
	 * @since    1.0.0
	 */
	public function sandbox_add_settings_field_input_text_dates( $args ) {

		$field_id = $args['label_for'];
		$field_default = $args['default'];

		$options = get_option( $this->plugin_name . '-settings' );
		$option = $field_default;

		if ( ! empty( $options[ $field_id ] ) ) {
			$option = $options[ $field_id ];
		}

		?>
		
			<input type="text" id="datepicker" name="<?php echo $this->plugin_name . '-settings[' . $field_id . ']'; ?>" id="<?php echo $this->plugin_name . '-settings[' . $field_id . ']'; ?>" value="<?php echo esc_attr( $option ); ?>" class="regular-text" placeholder="YYYY-MM-DD" />			

			<script>
				jQuery(document).ready(function($) {
					$("#datepicker").datepicker({ dateFormat: 'yy-mm-dd' }).val();
				});
			</script>

		<?php

	}


	/**
	 * Sandbox our inputs with text color
	 *
	 * @since    1.0.0
	 */
	public function sandbox_add_settings_field_input_text_color( $args ) {

		$field_id = $args['label_for'];
		$field_default = $args['default'];

		$options = get_option( $this->plugin_name . '-settings' );
		$option = $field_default;

		if ( ! empty( $options[ $field_id ] ) ) {
			$option = $options[ $field_id ];
		}

		?>
		
			<input type="text" id="colorpicker-text" name="<?php echo $this->plugin_name . '-settings[' . $field_id . ']'; ?>" id="<?php echo $this->plugin_name . '-settings[' . $field_id . ']'; ?>" value="<?php echo esc_attr( $option ); ?>" class="regular-text" placeholder="#d2d2d2"  data-alpha="true" data-default-color="rgba(0,0,0,0.85)" />		

			<script>
				jQuery(document).ready(function($) {
					$(function() {
						$('#colorpicker-text').wpColorPicker();
					});
				});
			</script>

		<?php

	}

	/**
	 * Sandbox our inputs with text color
	 *
	 * @since    1.0.0
	 */
	public function sandbox_add_settings_field_input_background_color( $args ) {

		$field_id = $args['label_for'];
		$field_default = $args['default'];

		$options = get_option( $this->plugin_name . '-settings' );
		$option = $field_default;

		if ( ! empty( $options[ $field_id ] ) ) {
			$option = $options[ $field_id ];
		}

		?>
		
			<input type="text" id="colorpicker-background" name="<?php echo $this->plugin_name . '-settings[' . $field_id . ']'; ?>" id="<?php echo $this->plugin_name . '-settings[' . $field_id . ']'; ?>" value="<?php echo esc_attr( $option ); ?>" class="regular-text" placeholder="#d2d2d2"  data-alpha="true" data-default-color="rgba(0,0,0,0.85)" />		

			<script>
				jQuery(document).ready(function($) {
					$(function() {
						$('#colorpicker-background').wpColorPicker();
					});
				});
			</script>

		<?php

	}



	/**
	 * Display the settings page content for the page we have created.
	 *
	 * @since    1.0.0
	 */
	public function display_settings_page() {

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/maintenance-white-dev-admin-display.php';

	}




	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Maintenance_White_Dev_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Maintenance_White_Dev_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		//wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/maintenance-white-dev-admin.css', array(), $this->version, 'all' );
		
		wp_enqueue_style( 'datepicker-style', 'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css', array(), $this->version, 'all' );

		wp_enqueue_style( 'wp-color-picker' );


	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() { 

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Maintenance_White_Dev_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Maintenance_White_Dev_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		//wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/maintenance-white-dev-admin.js', array( 'jquery' ), $this->version, false );

		wp_enqueue_script( 'jquery-ui-datepicker' );

		wp_enqueue_script( 'wp-color-picker', plugins_url( 'wp-color-picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true ); 

		wp_enqueue_script( 'wp-color-picker-alpha', plugins_url( '/js/wp-color-picker-alpha.min.js',  __FILE__ ), array( 'wp-color-picker' ), '1.0.0', true );

		

	}


	public function admin_notice() {
		echo '<div id="message" class="error fade"><p>' . __( '<strong>Maintenance Mode</strong> is active!', 'maintenance-white-dev' ) . ' <a href="plugins.php?s=Maintenance-White-Dev&plugin_status=all">' . __( 'Deactivate it when work is done.', 'maintenance-white-dev' ) . '</a></p></div>';
	}
	

}