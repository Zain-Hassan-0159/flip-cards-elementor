<?php

if(!defined('ABSPATH')){
    exit;
}

/**
 *  Flip Cards Addon
 *
 * @Carousal            Flip Cards Addon
 * @author            Zain Hassan
 *
 */
   


/**
 * hz-widgets Flip Cards Addon Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */

class hz_Flip_Cards extends \Elementor\Widget_Base {

	public function get_script_depends() {
		return [ 'flip-cards' ];
	}

	public function get_style_depends() {
		return [ 'flip-cards' ];
	}
	
	/**
	 * Get widget name.
	 *
	 * Retrieve company widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'fca-hz';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve company widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Flip Cards', 'hz-widgets' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve company widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-flip-box
		';
	}

	/**
	 * Get custom help URL.
	 *
	 * Retrieve a URL where the user can get more information about the widget.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget help URL.
	 */
	public function get_custom_help_url() {
		return 'https://developers.elementor.com/widgets/';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the company of categories the company widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return ['hz-el-widgets'];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the company of keywords the company widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'card', 'Flip Cards Addon', 'custom', 'flip' ];
	}

	/**
	 * Register company widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		$this->start_controls_section(
			'general',
			[
				'label' => esc_html__( 'General', 'hz-widgets' ),
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'list_title',
			[
				'label' => esc_html__( 'Title', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'List Title' , 'hz-widgets' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'list_content',
			[
				'label' => esc_html__( 'Content', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'List Content' , 'hz-widgets' ),
				'show_label' => false,
			]
		);

		$repeater->add_control(
			'link_title',
			[
				'label' => esc_html__( 'Button Title', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '' , 'hz-widgets' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'website_link',
			[
				'label' => esc_html__( 'Link', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'icon_title',
			[
				'label' => esc_html__( 'Icon Title', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'click here' , 'hz-widgets' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'icon',
			[
				'label' => esc_html__( 'Icon', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-arrow-circle-down',
					'library' => 'fa-solid',
				]
			]
		);

		$repeater->add_control(
			'list_color',
			[
				'label' => esc_html__( 'Text Color', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}' => 'color: {{VALUE}} !important',
					'{{WRAPPER}} {{CURRENT_ITEM}} svg' => 'fill: {{VALUE}} !important',
				],
			]
		);

		$repeater->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} {{CURRENT_ITEM}}',
			]
		);

		$repeater->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Heading Typography', 'hz-widgets' ),
				'name' => 'heading_typography',
				'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} h2',
			]
		);

		$repeater->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Content Typography', 'hz-widgets' ),
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .content',
			]
		);

		$repeater->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Icon Typography', 'hz-widgets' ),
				'name' => 'icon_typography',
				'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .my-icon-wrapper',
			]
		);

		$repeater->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Button Typography', 'hz-widgets' ),
				'name' => 'btn_typography',
				'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .btn',
			]
		);

		$repeater->add_control(
			'btn_color',
			[
				'label' => esc_html__( 'Button Color', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} .btn' => 'color: {{VALUE}}'
				],
			]
		);

		$repeater->add_control(
			'btnbg_color',
			[
				'label' => esc_html__( 'Button Bg Color', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} .btn' => 'background-color: {{VALUE}}'
				],
			]
		);

		$repeater->add_control(
			'text_align',
			[
				'label' => esc_html__( 'Alignment', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'hz-widgets' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'hz-widgets' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'hz-widgets' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'list',
			[
				'label' => esc_html__( 'Repeater List', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => esc_html__( 'Title #1', 'hz-widgets' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'hz-widgets' ),
					],
					[
						'list_title' => esc_html__( 'Title #2', 'hz-widgets' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'hz-widgets' ),
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'Style', 'hz-widgets' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'width',
			[
				'label' => esc_html__( 'Width', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'rem' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					]
				],
				'default' => [
					'unit' => 'rem',
					'size' => 25,
				],
				'selectors' => [
					'{{WRAPPER}} .cards' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'height',
			[
				'label' => esc_html__( 'Height', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'rem' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					]
				],
				'default' => [
					'unit' => 'rem',
					'size' => 30,
				],
				'selectors' => [
					'{{WRAPPER}} .cards' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'label' => esc_html__( 'Card Border', 'hz-widgets' ),
				'name' => 'border',
				'selector' => '{{WRAPPER}} .cards .card',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'label' => esc_html__( 'Card Shadow', 'hz-widgets' ),
				'name' => 'box_shadow',
				'selector' => '{{WRAPPER}} .cards .card',
			]
		);

		$this->end_controls_section();

	}


	/**
	 * Render company widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		$categories = get_categories();
		$id = 'card-' . $this->get_id();
		// echo "<pre>";
		// print_r($this->get_id());
        ?>
        <div class="cards-wrapper">
			<div id="<?php echo $id; ?>" class="cards" >
				<?php 
				if ( $settings['list'] ) :
					$count = 1;
					$countmin = 1.00;
					foreach (  $settings['list'] as $item ) :
					?>
					<div onclick="moveCard(<?php echo $count; ?>,'<?php echo $id; ?>')" class="card elementor-repeater-item-<?php echo  esc_attr( $item['_id'] ); ?>" style="scale: calc(<?php echo $countmin; ?>);z-index: calc(<?php echo $count; ?>);top: calc(<?php echo $count; ?>rem);">
						<?php if($item['list_title'] !== '') : echo  '<h2>'.$item['list_title'].'</h2>'; endif; ?>
						<div class="content" >
							<?php echo  $item['list_content']; 
							if($item['link_title'] !== ''){
									if ( ! empty( $item['website_link']['url'] ) ) {
										$this->remove_render_attribute( 'website_link' );
										$this->add_link_attributes( 'website_link', $item['website_link'] );
									}
								?>
								<a class="btn" <?php echo $this->get_render_attribute_string( 'website_link' ); ?> ><?php echo  $item['link_title']; ?></a>
								<?php
							}
							?>
						</div>
						<div class="my-icon-wrapper">
							<?php 
							if($item['icon_title'] !== ''){
								echo "<div>".$item['icon_title']."</div>";
							}
							\Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); 
							?>
						</div>
					</div>
					<?php 
					$count++;
					$countmin = $countmin + 0.01;
					endforeach;
				endif;
				?>
			</div>
        </div>
		<?php if ( \Elementor\Plugin::$instance->editor->is_edit_mode() ) : ?>
        <script>
		function moveCard(index, id) {
			const cards = document.querySelectorAll(`#${id} .card`);
			const totalCards = cards.length;
			if(index === 1){
				return;
			}

			// Update styles for previous cards
			for (let i = 0; i < totalCards; i++) {
			const currentCard = cards[i];

			const scale = currentCard.style.scale;
			const zIndex = currentCard.style.zIndex;
			const top = currentCard.style.top;

			if(top !== `calc(${totalCards - 1}rem)` && top !== `calc(${totalCards}rem)`){
				currentCard.style.scale = `calc(${scale} + 0.01)`;
				currentCard.style.zIndex = `calc(${zIndex} + 1)`;
				currentCard.style.top = `calc(${top} + 1rem)`;
			}else if(top === `calc(${totalCards - 1}rem)`){
				currentCard.style.scale = `calc(1.0${totalCards - 1})`;
				currentCard.style.zIndex = `calc(${totalCards})`;
			setTimeout(function(){
				currentCard.style.top = `calc(${totalCards}rem)`;
			}, 300)

			}else if(top === `calc(${totalCards}rem)`){
				currentCard.style.top = 'calc(-35rem)';
				currentCard.style.scale = 'calc(1)';
				currentCard.style.zIndex = 'calc(1)';
				setTimeout(function(){
				currentCard.style.top = 'calc(1rem)';
				}, 300)
			}
			}
		}
        </script>
		<?php endif; ?>
		<?php

	}


}