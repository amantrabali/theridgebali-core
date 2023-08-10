<?php
class Elementor_TheRidgeBali_Widget_1 extends \Elementor\Widget_Base {

	public function get_name() {
		return 'theridgebali_hero';
	}

	public function get_title() {
		return esc_html__( 'The Ridge Bali Hero', 'theridgebali-core' );
	}

	public function get_icon() {
		return 'eicon-image-hotspot';
	}

	public function get_categories() {
		return [ 'theridgebali-category' ];
	}

	public function get_keywords() {
		return [ 'the ridge', 'hero' ];
	}

	protected function register_controls() {

		// Content Tab Start

		$this->start_controls_section(
			'section_hero_image',
			[
				'label' => esc_html__( 'Hero Section', 'theridgebali-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
            'hero_image',
            [
                'label' => __( 'Hero Image', 'theridgebali-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'theridgebali-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Magnificent views', 'theridgebali-core' ),
			]
		);

		$this->add_control(
			'subtitle',
			[
				'label' => esc_html__( 'Sub Title', 'theridgebali-core' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Overlooking a Tropical Forest Above The Ayung River', 'theridgebali-core' ),
			]
		);

		$this->end_controls_section();

		// Content Tab End


	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$thumbnail_size = 'large';

		$thumbnail_url = '';
	    if ( $settings['hero_image']['id'] ) {
	        $thumbnail = wp_get_attachment_image_src( $settings['hero_image']['id'], $thumbnail_size );
	        if ( $thumbnail ) {
	            $thumbnail_url = $thumbnail[0];
	        }
	    }
		?>

		<!-- Hero Start -->
        <section class="bg-half-170 bg-light pb-0 d-table w-100 bg-hero-ridge" style="background: url('<?php echo esc_url( $thumbnail_url ); ?>');">
            <div class="container-fluid">
                <div class="row justify-content-center mt-5">
                    <div class="col-lg-12 text-center">
                        <div class="title-heading mt-4">
                            <h1 class="display-3 text-white title-dark mb-3"> <?php echo $settings['title']; ?> </h1>
                            <h5 class="fw-medium text-white title-dark mb-3 section-heading-text"> <?php echo $settings['subtitle']; ?> </h5>   
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div> <!--end container-fluid-->
        </section><!--end section-->
        <!-- Hero End -->

		<?php
	}
}