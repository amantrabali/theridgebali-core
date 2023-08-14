<?php
class Elementor_TheRidgeBali_Widget_Footer_Text extends \Elementor\Widget_Base {

	public function get_name() {
		return 'theridgebali_featured_footer_text';
	}

	public function get_title() {
		return esc_html__( 'The Ridge Footer List Type 1', 'theridgebali-core' );
	}

	public function get_icon() {
		return 'eicon-footer';
	}

	public function get_categories() {
		return [ 'ab-theridgebali-category' ];
	}

	public function get_keywords() {
		return [ 'the ridge', 'footer text' ];
	}

	protected function register_controls() {

		// Content Tab Start

		$this->start_controls_section(
			'section_footer_text',
			[
				'label' => esc_html__( 'Footer List Type 1', 'theridgebali-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'list_title',
			[
				'label' => esc_html__( 'Title', 'theridgebali-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'List Title' , 'theridgebali-core' ),
				'label_block' => true,
			]
		);


		$repeater->add_control(
			'list_content',
			[
				'label' => esc_html__( 'Content', 'theridgebali-core' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'List Content' , 'theridgebali-core' ),
				'show_label' => false,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Menu Title', 'theridgebali-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Contact Us', 'theridgebali-core' ),
			]
		);

		$this->add_control(
			'list',
			[
				'label' => esc_html__( 'Repeater List', 'theridgebali-core' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => esc_html__( 'Contact Us', 'theridgebali-core' ),
						'list_content' => esc_html__( 'Information About and Contact Us The Ridge Bali.', 'theridgebali-core' ),
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);

		$this->end_controls_section();

		// Style Tab Start
		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Title', 'theridgebali-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'heading_color',
			[
				'label' => esc_html__( 'Heading Color', 'theridgebali-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .footer-title' => 'color: {{VALUE}};',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY,
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'heading_typography',
				'selector' => '{{WRAPPER}} .footer-title',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
				],
			]
		);

		$this->end_controls_section();

		// Style Tab Second
		$this->start_controls_section(
			'section_content_style',
			[
				'label' => esc_html__( 'Footer List', 'theridgebali-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'footer_list_color',
			[
				'label' => esc_html__( 'Footer List Color', 'theridgebali-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .footer-text' => 'color: {{VALUE}};',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY,
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'footer_list_typography',
				'selector' => '{{WRAPPER}} .footer-text',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		if ( ! empty( $settings['website_link']['url'] ) ) {
			$this->add_link_attributes( 'website_link', $settings['website_link'] );
		}

		?>


		<!-- Grid column -->
        <div class="col-md-12">
          <h6 class="footer-title">
            <?php echo $settings['title']; ?>
          </h6>
          
          	<?php
          	if ( $settings['list'] ) {
	          	foreach (  $settings['list'] as $item ) {
	          	?>
	          	<p class="footer-text">
	          		<?php echo $item['list_content']; ?>
	          	</p>
	          	<?php
          		}
          	}
          	?>
        </div>
        <!-- Grid column -->
     <?php
	}
}