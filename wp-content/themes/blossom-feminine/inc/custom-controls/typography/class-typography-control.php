<?php
/**
 * Customizer Typography Control
 *
 * Taken from Kirki.
 *
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( ! class_exists( 'Blossom_Feminine_Typography_Control' ) ) {
    
    class Blossom_Feminine_Typography_Control extends WP_Customize_Control {
    
    	public $tooltip = '';
    	public $js_vars = array();
    	public $output = array();
    	public $option_type = 'theme_mod';
    	public $type = 'blossom-feminine-typography';
    
    	/**
    	 * Refresh the parameters passed to the JavaScript via JSON.
    	 *
    	 * @access public
    	 * @return void
    	 */
    	public function to_json() {
    		parent::to_json();
    
    		if ( isset( $this->default ) ) {
    			$this->json['default'] = $this->default;
    		} else {
    			$this->json['default'] = $this->setting->default;
    		}
    		$this->json['js_vars'] = $this->js_vars;
    		$this->json['output']  = $this->output;
    		$this->json['value']   = $this->value();
    		$this->json['choices'] = $this->choices;
    		$this->json['link']    = $this->get_link();
    		$this->json['tooltip'] = $this->tooltip;
    		$this->json['id']      = $this->id;
    		$this->json['l10n']    = apply_filters( 'blossom-feminine-typography-control/il8n/strings', array(
    			'on'                 => esc_attr__( 'ON', 'blossom-feminine' ),
    			'off'                => esc_attr__( 'OFF', 'blossom-feminine' ),
    			'all'                => esc_attr__( 'All', 'blossom-feminine' ),
    			'cyrillic'           => esc_attr__( 'Cyrillic', 'blossom-feminine' ),
    			'cyrillic-ext'       => esc_attr__( 'Cyrillic Extended', 'blossom-feminine' ),
    			'devanagari'         => esc_attr__( 'Devanagari', 'blossom-feminine' ),
    			'greek'              => esc_attr__( 'Greek', 'blossom-feminine' ),
    			'greek-ext'          => esc_attr__( 'Greek Extended', 'blossom-feminine' ),
    			'khmer'              => esc_attr__( 'Khmer', 'blossom-feminine' ),
    			'latin'              => esc_attr__( 'Latin', 'blossom-feminine' ),
    			'latin-ext'          => esc_attr__( 'Latin Extended', 'blossom-feminine' ),
    			'vietnamese'         => esc_attr__( 'Vietnamese', 'blossom-feminine' ),
    			'hebrew'             => esc_attr__( 'Hebrew', 'blossom-feminine' ),
    			'arabic'             => esc_attr__( 'Arabic', 'blossom-feminine' ),
    			'bengali'            => esc_attr__( 'Bengali', 'blossom-feminine' ),
    			'gujarati'           => esc_attr__( 'Gujarati', 'blossom-feminine' ),
    			'tamil'              => esc_attr__( 'Tamil', 'blossom-feminine' ),
    			'telugu'             => esc_attr__( 'Telugu', 'blossom-feminine' ),
    			'thai'               => esc_attr__( 'Thai', 'blossom-feminine' ),
    			'serif'              => _x( 'Serif', 'font style', 'blossom-feminine' ),
    			'sans-serif'         => _x( 'Sans Serif', 'font style', 'blossom-feminine' ),
    			'monospace'          => _x( 'Monospace', 'font style', 'blossom-feminine' ),
    			'font-family'        => esc_attr__( 'Font Family', 'blossom-feminine' ),
    			'font-size'          => esc_attr__( 'Font Size', 'blossom-feminine' ),
    			'font-weight'        => esc_attr__( 'Font Weight', 'blossom-feminine' ),
    			'line-height'        => esc_attr__( 'Line Height', 'blossom-feminine' ),
    			'font-style'         => esc_attr__( 'Font Style', 'blossom-feminine' ),
    			'letter-spacing'     => esc_attr__( 'Letter Spacing', 'blossom-feminine' ),
    			'text-align'         => esc_attr__( 'Text Align', 'blossom-feminine' ),
    			'text-transform'     => esc_attr__( 'Text Transform', 'blossom-feminine' ),
    			'none'               => esc_attr__( 'None', 'blossom-feminine' ),
    			'uppercase'          => esc_attr__( 'Uppercase', 'blossom-feminine' ),
    			'lowercase'          => esc_attr__( 'Lowercase', 'blossom-feminine' ),
    			'top'                => esc_attr__( 'Top', 'blossom-feminine' ),
    			'bottom'             => esc_attr__( 'Bottom', 'blossom-feminine' ),
    			'left'               => esc_attr__( 'Left', 'blossom-feminine' ),
    			'right'              => esc_attr__( 'Right', 'blossom-feminine' ),
    			'center'             => esc_attr__( 'Center', 'blossom-feminine' ),
    			'justify'            => esc_attr__( 'Justify', 'blossom-feminine' ),
    			'color'              => esc_attr__( 'Color', 'blossom-feminine' ),
    			'select-font-family' => esc_attr__( 'Select a font-family', 'blossom-feminine' ),
    			'variant'            => esc_attr__( 'Variant', 'blossom-feminine' ),
    			'style'              => esc_attr__( 'Style', 'blossom-feminine' ),
    			'size'               => esc_attr__( 'Size', 'blossom-feminine' ),
    			'height'             => esc_attr__( 'Height', 'blossom-feminine' ),
    			'spacing'            => esc_attr__( 'Spacing', 'blossom-feminine' ),
    			'ultra-light'        => esc_attr__( 'Ultra-Light 100', 'blossom-feminine' ),
    			'ultra-light-italic' => esc_attr__( 'Ultra-Light 100 Italic', 'blossom-feminine' ),
    			'light'              => esc_attr__( 'Light 200', 'blossom-feminine' ),
    			'light-italic'       => esc_attr__( 'Light 200 Italic', 'blossom-feminine' ),
    			'book'               => esc_attr__( 'Book 300', 'blossom-feminine' ),
    			'book-italic'        => esc_attr__( 'Book 300 Italic', 'blossom-feminine' ),
    			'regular'            => esc_attr__( 'Normal 400', 'blossom-feminine' ),
    			'italic'             => esc_attr__( 'Normal 400 Italic', 'blossom-feminine' ),
    			'medium'             => esc_attr__( 'Medium 500', 'blossom-feminine' ),
    			'medium-italic'      => esc_attr__( 'Medium 500 Italic', 'blossom-feminine' ),
    			'semi-bold'          => esc_attr__( 'Semi-Bold 600', 'blossom-feminine' ),
    			'semi-bold-italic'   => esc_attr__( 'Semi-Bold 600 Italic', 'blossom-feminine' ),
    			'bold'               => esc_attr__( 'Bold 700', 'blossom-feminine' ),
    			'bold-italic'        => esc_attr__( 'Bold 700 Italic', 'blossom-feminine' ),
    			'extra-bold'         => esc_attr__( 'Extra-Bold 800', 'blossom-feminine' ),
    			'extra-bold-italic'  => esc_attr__( 'Extra-Bold 800 Italic', 'blossom-feminine' ),
    			'ultra-bold'         => esc_attr__( 'Ultra-Bold 900', 'blossom-feminine' ),
    			'ultra-bold-italic'  => esc_attr__( 'Ultra-Bold 900 Italic', 'blossom-feminine' ),
    			'invalid-value'      => esc_attr__( 'Invalid Value', 'blossom-feminine' ),
    		) );
    
    		$defaults = array( 'font-family'=> false );
    
    		$this->json['default'] = wp_parse_args( $this->json['default'], $defaults );
    	}
    
    	/**
    	 * Enqueue scripts and styles.
    	 *
    	 * @access public
    	 * @return void
    	 */
    	public function enqueue() {
    		wp_enqueue_style( 'blossom-feminine-typography', get_template_directory_uri() . '/inc/custom-controls/typography/typography.css', null );
            /*
    		 * JavaScript
    		 */
            wp_enqueue_script( 'jquery-ui-core' );
    		wp_enqueue_script( 'jquery-ui-tooltip' );
    		wp_enqueue_script( 'jquery-stepper-min-js' );
    		
    		// Selectize
    		wp_enqueue_script( 'selectize', get_template_directory_uri() . '/inc/js/selectize.js', array( 'jquery' ), false, true );
    
    		// Typography
    		wp_enqueue_script( 'blossom-feminine-typography', get_template_directory_uri() . '/inc/custom-controls/typography/typography.js', array(
    			'jquery',
    			'selectize'
    		), false, true );
    
    		$google_fonts   = Blossom_Feminine_Fonts::get_google_fonts();
    		$standard_fonts = Blossom_Feminine_Fonts::get_standard_fonts();
    		$all_variants   = Blossom_Feminine_Fonts::get_all_variants();
    
    		$standard_fonts_final = array();
    		foreach ( $standard_fonts as $key => $value ) {
    			$standard_fonts_final[] = array(
    				'family'      => $key,
    				'label'       => $value['label'],
    				'is_standard' => true,
    				'variants'    => array(
    					array(
    						'id'    => 'regular',
    						'label' => $all_variants['regular'],
    					),
    					array(
    						'id'    => 'italic',
    						'label' => $all_variants['italic'],
    					),
    					array(
    						'id'    => '700',
    						'label' => $all_variants['700'],
    					),
    					array(
    						'id'    => '700italic',
    						'label' => $all_variants['700italic'],
    					),
    				),
    			);
    		}
    
    		$google_fonts_final = array();
    
    		if ( is_array( $google_fonts ) ) {
    			foreach ( $google_fonts as $family => $args ) {
    				$label    = ( isset( $args['label'] ) ) ? $args['label'] : $family;
    				$variants = ( isset( $args['variants'] ) ) ? $args['variants'] : array( 'regular', '700' );
    
    				$available_variants = array();
    				foreach ( $variants as $variant ) {
    					if ( array_key_exists( $variant, $all_variants ) ) {
    						$available_variants[] = array( 'id' => $variant, 'label' => $all_variants[ $variant ] );
    					}
    				}
    
    				$google_fonts_final[] = array(
    					'family'   => $family,
    					'label'    => $label,
    					'variants' => $available_variants
    				);
    			}
    		}
    
    		$final = array_merge( $standard_fonts_final, $google_fonts_final );
    		wp_localize_script( 'blossom-feminine-typography', 'blossom_all_fonts', $final );
    	}
    
    	/**
    	 * An Underscore (JS) template for this control's content (but not its container).
    	 *
    	 * Class variables for this control class are available in the `data` JS object;
    	 * export custom variables by overriding {@see WP_Customize_Control::to_json()}.
    	 *
    	 * I put this in a separate file because PhpStorm didn't like it and it fucked with my formatting.
    	 *
    	 * @see    WP_Customize_Control::print_template()
    	 *
    	 * @access protected
    	 * @return void
    	 */
    	protected function content_template() { ?>
    		<# if ( data.tooltip ) { #>
                <a href="#" class="tooltip hint--left" data-hint="{{ data.tooltip }}"><span class='dashicons dashicons-info'></span></a>
            <# } #>
            
            <label class="customizer-text">
                <# if ( data.label ) { #>
                    <span class="customize-control-title">{{{ data.label }}}</span>
                <# } #>
                <# if ( data.description ) { #>
                    <span class="description customize-control-description">{{{ data.description }}}</span>
                <# } #>
            </label>
            
            <div class="wrapper">
                <# if ( data.default['font-family'] ) { #>
                    <# if ( '' == data.value['font-family'] ) { data.value['font-family'] = data.default['font-family']; } #>
                    <# if ( data.choices['fonts'] ) { data.fonts = data.choices['fonts']; } #>
                    <div class="font-family">
                        <h5>{{ data.l10n['font-family'] }}</h5>
                        <select id="typography-font-family-{{{ data.id }}}" placeholder="{{ data.l10n['select-font-family'] }}"></select>
                    </div>
                    <div class="variant variant-wrapper">
                        <h5>{{ data.l10n['style'] }}</h5>
                        <select class="variant" id="typography-variant-{{{ data.id }}}"></select>
                    </div>
                <# } #>   
                
            </div>
            <?php
    	}

        protected function render_content(){
        }
    
    }
}