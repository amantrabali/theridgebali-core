<?php
class Elementor_TheRidgeBali_Widget_Hamburger_Menu extends \Elementor\Widget_Base {

	public function get_name() {
		return 'theridgebali_hamburger_menu';
	}

	public function get_title() {
		return esc_html__( 'The Ridge Bali Menu', 'theridgebali-core' );
	}

	public function get_icon() {
		return 'eicon-menu-bar';
	}

	public function get_categories() {
		return [ 'ab-theridgebali-category' ];
	}

	public function get_keywords() {
		return [ 'the ridge', 'Menu' ];
	}

	protected function register_controls() {

		// Content Tab Start

		$this->start_controls_section(
			'section_menu_nav',
			[
				'label' => esc_html__( 'Menu Section', 'theridgebali-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
        'main_width_desktop',
        [
            'label' => __('Width (Desktop)', 'theridgebali-core'),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'default' => 50,
            'devices' => [ 'desktop', 'tablet' ],
        ]
    );

    $this->add_control(
        'main_height_desktop',
        [
            'label' => __('Height (Desktop)', 'theridgebali-core'),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'default' => 50,
            'devices' => [ 'desktop', 'tablet' ],
        ]
    );

    $this->add_control(
        'main_width_mobile',
        [
            'label' => __('Width (Mobile)', 'theridgebali-core'),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'default' => 50,
            'devices' => [ 'mobile' ],
        ]
    );

    $this->add_control(
        'main_height_mobile',
        [
            'label' => __('Height (Mobile)', 'theridgebali-core'),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'default' => 50,
            'devices' => [ 'mobile' ],
        ]
    );

    $this->add_control(
			'hamburger_color',
			[
				'label' => esc_html__( 'Hamburger Color', 'theridgebali-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .menu-main-color' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'hamburger_sticky_color',
			[
				'label' => esc_html__( 'Hamburger Sticky Color', 'theridgebali-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .menu-main-sticky-color' => 'color: {{VALUE}}',
				],
			]
		);


		$this->end_controls_section();

		// Content Tab End


	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$main_menu_width = $settings['main_width_desktop'];
		$main_menu_height = $settings['main_height_desktop'];
		?>

		<!-- Menu Start -->
		<div id="topnav" class="topnav">
        <div class="col-md-3 col-xs-3">
              <div class="nav-trigger">
	                <svg width="<?php echo $main_menu_width; ?>" height="<?php echo $main_menu_height; ?>" viewBox="0 0 50 16" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path class="svg-path" d="M0 1.45455V0H50V1.45455H0ZM50 7.27273V8.72727H0V7.27273H50ZM0 14.5455H50V16H0V14.5455Z" fill="none"/>
									</svg>
              </div>
        </div>
    	</div>
        <!-- Menu End -->

        <aside id="navigation">
		    <div class="inner">
		        <div class="nav-trigger">
		            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path class="svg-path" d="M29.7688 28.6524C29.8421 28.7257 29.9003 28.8127 29.9399 28.9085C29.9796 29.0043 30 29.1069 30 29.2106C30 29.3143 29.9796 29.4169 29.9399 29.5127C29.9002 29.6085 29.842 29.6955 29.7687 29.7688C29.6954 29.8421 29.6084 29.9003 29.5126 29.9399C29.4168 29.9796 29.3141 30 29.2105 30C29.1068 30 29.0041 29.9796 28.9084 29.9399C28.8126 29.9002 28.7256 29.842 28.6523 29.7687L15 16.1166L1.34774 29.7687C1.1997 29.9168 0.998903 30 0.789526 30C0.580149 30 0.37934 29.9169 0.231275 29.7688C0.08321 29.6208 1.81397e-05 29.42 2.96612e-09 29.2106C-1.81338e-05 29.0012 0.0831393 28.8004 0.231178 28.6524L13.8835 15L0.231178 1.34764C0.0831393 1.19957 -1.81338e-05 0.998766 2.96612e-09 0.789389C8.98338e-06 0.685716 0.0204377 0.58306 0.06012 0.487282C0.0998022 0.391504 0.157961 0.30448 0.231275 0.231178C0.304589 0.157877 0.391623 0.0997337 0.487408 0.060068C0.583193 0.0204024 0.685853 -8.97745e-06 0.789526 2.96206e-09C0.998903 1.81397e-05 1.1997 0.08321 1.34774 0.231275L15 13.8834L28.6523 0.231275C28.7256 0.157961 28.8126 0.0998022 28.9084 0.06012C29.0041 0.0204377 29.1068 8.98338e-06 29.2105 2.96206e-09C29.3141 -8.97745e-06 29.4168 0.0204024 29.5126 0.060068C29.6084 0.0997337 29.6954 0.157877 29.7687 0.231178C29.842 0.30448 29.9002 0.391504 29.9399 0.487282C29.9796 0.58306 30 0.685716 30 0.789389C30 0.893062 29.9796 0.995722 29.9399 1.09151C29.9003 1.18729 29.8421 1.27433 29.7688 1.34764L16.1165 15L29.7688 28.6524Z" fill="none"/>
								</svg>
		        </div>

		        <?php
		        // Display Primary Menu
		        wp_nav_menu(array(
		            'theme_location' => 'primary-menu',
		            'container'      => 'ul',
		            'menu_class'     => 'menu',
		        ));
		        ?>

		        <hr>
		        <p>"Welcome to our exclusive villa in Bali - Your dream destination for a perfect getaway. Immerse yourself in breathtaking views, modern amenities, and the serene beauty of the island. Book now and create unforgettable memories with your family and friends at our Bali Villa.  </p>
		    </div>
		</aside>

		<?php
	}
}