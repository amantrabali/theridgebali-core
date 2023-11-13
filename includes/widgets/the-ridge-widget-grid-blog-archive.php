<?php
class Elementor_TheRidgeBali_Widget_Grid_Blog_Archive extends \Elementor\Widget_Base {

	public function get_name() {
		return 'theridgebali_grid_blog_archive';
	}

	public function get_title() {
		return esc_html__( 'The Ridge Blog Grid Archive', 'theridgebali-core' );
	}

	public function get_icon() {
		return 'eicon-posts-grid';
	}

	public function get_categories() {
		return [ 'ab-theridgebali-category' ];
	}

	public function get_keywords() {
		return [ 'the ridge', 'grid blog', 'archive blog' ];
	}

	protected function register_controls() {

		// Content Tab Start

		$this->start_controls_section(
			'section_grid_blog',
			[
				'label' => esc_html__( 'Grid Blog', 'theridgebali-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
            'post_type',
            [
                'label' => __('Post Type', 'theridgebali-core'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'post',
                'options' => $this->get_available_post_types(),
            ]
        );

		$this->add_control(
            'post_count',
            [
                'label' => __('Number of Posts', 'theridgebali-core'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 3,
            ]
        );

		$this->add_control(
	        'cta_text',
	        [
	            'label' => __( 'Button Text', 'theridgebali-core' ),
	            'type' => \Elementor\Controls_Manager::TEXT,
	            'default' => __( 'Join Now', 'theridgebali-core' ),
	            'placeholder' => __( 'Enter your Button text', 'theridgebali-core' ),
	        ]
	    );

	    $this->add_control(
	        'cta_link_type',
	        [
	            'label' => __( 'Internal or External Link', 'theridgebali-core' ),
	            'type' => \Elementor\Controls_Manager::CHOOSE,
	            'options' => [
	                'external' => [
	                    'title' => __( 'External', 'theridgebali-core' ),
	                    'icon' => 'fa fa-external-link',
	                ],
	                'internal' => [
	                    'title' => __( 'Internal', 'theridgebali-core' ),
	                    'icon' => 'fa fa-link',
	                ],
	            ],
	            'default' => 'internal',
	            'toggle' => true,
	        ]
	    );

	    $this->add_control(
	        'cta_link_external',
	        [
	            'label' => __( 'External Link', 'theridgebali-core' ),
	            'type' => \Elementor\Controls_Manager::URL,
	            'placeholder' => __( 'https://your-external-link.com', 'theridgebali-core' ),
	            'show_external' => true,
	            'default' => [
	                'url' => '',
	                'is_external' => true,
	                'nofollow' => true,
	            ],
	            'condition' => [
	                'cta_link_type' => 'external',
	            ],
	        ]
	    );

	    $pages = get_pages();
	    $page_options = array();

	    foreach ( $pages as $page ) {
	        $page_options[ $page->ID ] = $page->post_title;
	    }

	    $this->add_control(
	        'cta_link_page',
	        [
	            'label' => __( 'Internal Link', 'theridgebali-core' ),
	            'type' => \Elementor\Controls_Manager::SELECT,
	            'options' => $page_options,
	            'default' => '',
	            'condition' => [
	                'cta_link_type' => 'internal',
	            ],
	        ]
	    );

	    $this->add_control(
		    'button_continue',
		    [
		        'label' => __('Enable Continue Reading', 'theridgebali-core'),
		        'type' => \Elementor\Controls_Manager::SELECT,
		        'options' => [
		            'enable' => __('Enable', 'theridgebali-core'),
		            'disable' => __('Disable', 'theridgebali-core'),
		        ],
		        'default' => 'disable',
		    ]
		);	    

		$this->end_controls_section();

		// Content Tab End


		// Style Title Blog
		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Title', 'theridgebali-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Title Color', 'theridgebali-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .blog-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .blog-title',
			]
		);

		$this->end_controls_section();
		// End Style Title Blog

		// Style Category Blog
		$this->start_controls_section(
			'section_category_style',
			[
				'label' => esc_html__( 'Category', 'theridgebali-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'category_color',
			[
				'label' => esc_html__( 'Category Color', 'theridgebali-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .blog-category' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'category_typography',
				'selector' => '{{WRAPPER}} .blog-category',
			]
		);

		$this->end_controls_section();
		// End Style Category Blog

		// Style Description Blog
		$this->start_controls_section(
			'section_description_style',
			[
				'label' => esc_html__( 'Description', 'theridgebali-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'description_color',
			[
				'label' => esc_html__( 'Description Color', 'theridgebali-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .blog-description' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'description_typography',
				'selector' => '{{WRAPPER}} .blog-description',
			]
		);
		$this->end_controls_section();
		// End Style Description Blog

		// Style Link Blog
		$this->start_controls_section(
			'section_link_style',
			[
				'label' => esc_html__( 'Link', 'theridgebali-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'link_color',
			[
				'label' => esc_html__( 'Link Color', 'theridgebali-core' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .blog-link' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'link_typography',
				'selector' => '{{WRAPPER}} .blog-link',
			]
		);

		$this->end_controls_section();
		// End Style Link Blog

	}

	protected function render() {
	    $settings = $this->get_settings_for_display();
	    // Retrieve the category ID from the query parameter
        $category = get_queried_object();
		$category_id = $category->term_id;
	    ?>

		<!-- Blog Grid Start -->
		<div class="container-fluid blog-section">

		<div class="row justify-content-center">
			<?php 
				$categoryalls = get_categories( array(
		            'orderby' => 'name',
		            'order'   => 'ASC'
		        ));
			?>
			<div class="col-lg-12">
				<div class="row">
				<?php foreach ( $categoryalls as $categoryall) { ?>
				<div class="col-lg-2 col-md-12 mb-3 d-flex align-items-stretch">
					<a href="<?php echo get_category_link( $categoryall->term_id ); ?>"><?php echo esc_html( $categoryall->name ); ?></a>
				</div>
				<?php }	?>
				</div>
	        </div>
    	</div>


	    <div class="row justify-content-center">
	    	<?php
	    		$args = array(
	    			'cat' => $category_id,
			        'post_type' => $settings['post_type'],
			        'posts_per_page' => $settings['post_count'],
			    );

			    $query = new WP_Query($args);

			    if ($query->have_posts()) {
			    	while ($query->have_posts()) {
		            	$query->the_post();
		            	global $post;
		            	// Get the post title and truncate it to 122 characters
		            	$title = $this->get_truncated_title(10);
			            // Get the post description and truncate it to 122 characters
			            $description = $this->get_truncated_description(20);
			            // Get the first category for the current post
		            	$categories = get_the_category($post->ID);           
					    $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'blog-post-grid' );
					    $thumbnail_url = $thumbnail[0];
					    
		    			?>

		    			<div class="col-lg-4 col-md-12 mb-3 d-flex align-items-stretch">
			                <div class="card rounded-0 border-0 overflow-hidden">
			                    <div class="image position-relative overflow-hidden">
			                    	<a class="" href="<?php echo get_the_permalink(); ?>">
			                    	<img src="<?php echo esc_url( $thumbnail_url ); ?>" class="img-fluid shadow object-fit-cover" alt="<?php echo esc_html( $title); ?>" style="display: block; height: 100%; width: 100%;">
			                    	</a>
			                    </div>

			                    <div class="card-body px-0 content d-flex flex-column">	

			                    	<div class="blog-category mb-2">                        	
			                        <?php 
			                        	if (!empty($categories)) {
							                $category = $categories[0];
    										$category_id = get_cat_ID( $category->name );
							                ?>
							                <h5 class="mt-3">
							                	<a class="blog-category" href="<?php echo esc_url( get_category_link($category_id) ); ?>">
							                			<?php echo $category->name; ?>
							                		</a>
							                </h5>
							            <?php
							            }
			                        ?>
			                    	</div>

			                        <div class="blog-title mb-2">
				                        <h3 class="blog-title">
				                        	<a class="blog-title" href="<?php echo get_the_permalink(); ?>"><?php echo $title; ?></a>
				                        </h3>
			                    	</div>
			                    	<div class="blog-description mt-auto align-self-start">
			                        	<p class="blog-description para-desc mx-auto mb-0"><?php echo $description; ?>
			                        </p>
			                    	</div>
			                    	<?php 
			                    	if ('enable' === $settings['button_continue']) {
			                    	?>
			                    	<div class="mt-4">
			                            <a class="blog-link" href="<?php echo get_the_permalink(); ?>" class="ps-0">Continue Reading</i></a>
			                        </div>
			                        <?php 
			                    	}
			                    	?>                
			                    </div>
			                </div>
			            </div><!--end col-->
		            	<?php
	           		}
			    } 
			    else {
			        echo __('No posts found.', 'theridgebali-core');
			    }

	    wp_reset_postdata();
	    ?>
	    </div>
		</div>
        <!-- Blog Grid End -->
        <?php
	}

    // Helper function to get available post types
    private function get_available_post_types() {
        $post_types = get_post_types(['public' => true], 'objects');
        $options = [];

        foreach ($post_types as $post_type) {
            $options[$post_type->name] = $post_type->labels->singular_name;
        }

        return $options;
    }

	// Helper function to get truncated post description
	private function get_truncated_description($length) {
	    $post_excerpt = get_the_excerpt();
	    if (mb_strlen($post_excerpt) > $length) {
	        $post_excerpt = wp_trim_words($post_excerpt, $length, '...');
	    }
	    return $post_excerpt;
	}

	// Helper function to get truncated post description
	private function get_truncated_title($length) {
	    $post_title = get_the_title();
	    if (mb_strlen($post_title) > $length) {
	        $post_title = wp_trim_words($post_title, $length,'');
	    }
	    return $post_title;
	}
}