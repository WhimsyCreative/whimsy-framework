<?php
/**
 * Customize Layout Control Class
 *
 * @package Slicejack
 * @since 1.0
 */
class Whimsy_Layout_Control extends WP_Customize_Control {
	/**
	 * @access public
	 * @var string
	 */
	public $type = 'layout';

	/**
	 * @access public
	 * @var array
	 */
	public $layouts;
    
	/**
	 * Enqueue control related scripts/styles.
	 *
	 * @since 1.0
	 */
	public function enqueue() {
        wp_enqueue_script( 'whimsy-customizer-controls', get_template_directory_uri() . '/library/js/customizer-controls.js' );
        wp_enqueue_style(  'whimsy-customizer-controls', get_template_directory_uri() . '/library/css/customizer-controls.css'                  );
	}

	/**
	 * Constructor.
	 *
	 * @since 1.0
	 * @uses WP_Customize_Control::__construct()
	 *
	 * @param WP_Customize_Manager $manager
	 * @param string $id
	 * @param array $args
	 */
	public function __construct( $manager, $id, $args = array() ) {
		$this->layouts = $args[ 'layouts' ];
		parent::__construct( $manager, $id, $args );
	}

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @since 1.0
	 * @uses WP_Customize_Control::to_json()
	 */
	public function to_json() {
        
		parent::to_json();
        
		$this->json['layouts'] = $this->layouts;
        
	}

	/**
	 * Render the control's content.
	 *
	 * @since 1.0
	 */
	public function render_content() {
		if ( empty( $this->layouts ) )
			return;

		$name = '_customize-layout-' . $this->id;

		?>
		<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		<div class="customize-control-content">
			<div class="radios">
			<?php
			foreach ( $this->layouts as $value => $layout ) :
				?>
				<label class="layout" data-value="<?php echo $value; ?>">
					<input type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?> />
                    <div class="icon" title="<?php echo esc_html( $layout[ 'label' ] ); ?>"><?php echo esc_html( $layout[ 'label' ] ); ?></div>
				</label>
				<?php
			endforeach;
			?>
			</div>
		</div>
		<?php
	}
}