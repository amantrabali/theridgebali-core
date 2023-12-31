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


		$this->end_controls_section();

		// Content Tab End


	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>

		<!-- Menu Start -->
		<div id="topnav" class="topnav">
        <div class="col-md-3 col-xs-3">
              <div class="nav-trigger">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
              </div>
        </div>
    	</div>
        <!-- Menu End -->

        <aside id="navigation">
		    <div class="inner">
		        <div class="nav-trigger">
		            <div class="bar"></div>
		            <div class="bar"></div>
		            <div class="bar"></div>
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