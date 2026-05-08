<?php

if (!defined('ABSPATH')) exit;

class BS4_Button_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'bs4-button';
    }

    public function get_title() {
        return __('BS4 Button', 'bs4-elementor-widgets');
    }

    public function get_icon() {
        return 'eicon-button';
    }

    public function get_categories() {
        return ['general'];
    }

    public function get_style_depends() {
        return ['bs4-style'];
    }

    // public function get_script_depends() {
    //     return ['bs4-script'];
    // }

    protected function register_controls() {

        // ============ CONTENT SECTION ============
        $this->start_controls_section('content_section', [
            'label' => __('Content', 'bs4-elementor-widgets'),
        ]);

        // ---- BUTTON TEXT & LINK ----
        $this->add_control('button_content_heading', [
            'label' => __('Button Content', 'bs4-elementor-widgets'),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'none',
        ]);

        $this->add_control('text', [
            'label' => __('Text', 'bs4-elementor-widgets'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'Click Me',
            'dynamic' => [
                'active' => true,
            ],
            'placeholder' => __('Enter button text', 'bs4-elementor-widgets'),
        ]);

        $this->add_control('link', [
            'label' => __('Link', 'bs4-elementor-widgets'),
            'type' => \Elementor\Controls_Manager::URL,
            'default' => [
                'url' => '#',
            ],
            'dynamic' => [
                'active' => true,
            ],
            'placeholder' => __('https://example.com', 'bs4-elementor-widgets'),
        ]);

        $this->add_control('button_id', [
            'label' => __('Button ID', 'bs4-elementor-widgets'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '',
            'description' => __('Add a unique ID to the button element', 'bs4-elementor-widgets'),
            'placeholder' => __('my-button-id', 'bs4-elementor-widgets'),
        ]);

        // ---- ICON SETTINGS ----
        $this->add_control('icon_settings_heading', [
            'label' => __('Icon Settings', 'bs4-elementor-widgets'),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]);

        $this->add_control('icon_enable', [
            'label' => __('Enable Icon', 'bs4-elementor-widgets'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __('Yes', 'bs4-elementor-widgets'),
            'label_off' => __('No', 'bs4-elementor-widgets'),
            'return_value' => 'yes',
            'default' => '',
        ]);

        $this->add_control('icon', [
            'label' => __('Choose Icon', 'bs4-elementor-widgets'),
            'type' => \Elementor\Controls_Manager::ICONS,
            'default' => [
                'value' => 'eicon-arrow-right',
                'library' => 'eicons',
            ],
            'condition' => [
                'icon_enable' => 'yes',
            ],
        ]);

        $this->add_control('icon_position', [
            'label' => __('Icon Position', 'bs4-elementor-widgets'),
            'type' => \Elementor\Controls_Manager::CHOOSE,
            'options' => [
                'left' => [
                    'title' => __('Left', 'bs4-elementor-widgets'),
                    'icon' => 'eicon-arrow-left',
                ],
                'right' => [
                    'title' => __('Right', 'bs4-elementor-widgets'),
                    'icon' => 'eicon-arrow-right',
                ],
            ],
            'default' => 'right',
            'condition' => [
                'icon_enable' => 'yes',
            ],
        ]);

        $this->add_responsive_control('icon_spacing', [
            'label' => __('Icon Spacing', 'bs4-elementor-widgets'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px', 'em'],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 50,
                    'step' => 1,
                ],
                'em' => [
                    'min' => 0,
                    'max' => 3,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .bs4-button' => 'gap: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'icon_enable' => 'yes',
            ],
        ]);

        // ---- LAYOUT & ALIGNMENT ----
        $this->add_control('layout_heading', [
            'label' => __('Layout', 'bs4-elementor-widgets'),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]);

        $this->add_control('alignment', [
            'label' => __('Alignment', 'bs4-elementor-widgets'),
            'type' => \Elementor\Controls_Manager::CHOOSE,
            'options' => [
                'left' => ['title' => 'Left', 'icon' => 'eicon-text-align-left'],
                'center' => ['title' => 'Center', 'icon' => 'eicon-text-align-center'],
                'right' => ['title' => 'Right', 'icon' => 'eicon-text-align-right'],
            ],
            'default' => 'center',
            'selectors' => [
                '{{WRAPPER}} .bs4-button-wrapper' => 'text-align: {{VALUE}};',
            ],
        ]);

        $this->end_controls_section();

        // ============ STYLING: BUTTON STYLE ============

        $this->start_controls_section('button_style_section', [
            'label' => __('Button', 'bs4-elementor-widgets'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);

        // Create tabs for Normal and Hover
        $this->start_controls_tabs('button_tabs');

        // --- NORMAL TAB ---
        $this->start_controls_tab('button_normal_tab', [
            'label' => __('Normal', 'bs4-elementor-widgets'),
        ]);

        // --- Background ---
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'button_background',
                'label' => __('Background', 'bs4-elementor-widgets'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .bs4-button',
                'default' => [
                    'background' => 'classic',
                    'color' => 'var(--e-global-color-accent)',
                ],
            ]
        );

        // --- Border ---
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'label' => __('Border', 'bs4-elementor-widgets'),
                'selector' => '{{WRAPPER}} .bs4-button',
            ]
        );

        $this->add_control('button_border_radius', [
            'label' => __('Border Radius', 'bs4-elementor-widgets'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .bs4-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_responsive_control('button_padding', [
            'label' => __('Padding', 'bs4-elementor-widgets'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em', '%'],
            'selectors' => [
                '{{WRAPPER}} .bs4-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_shadow',
                'label' => __('Shadow', 'bs4-elementor-widgets'),
                'selector' => '{{WRAPPER}} .bs4-button',
            ]
        );

        // --- Text Styling ---
        $this->add_control('text_heading', [
            'label' => __('TEXT STYLING', 'bs4-elementor-widgets'),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before',
        ]);

        $this->add_control('text_color', [
            'label' => __('Text Color', 'bs4-elementor-widgets'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#ffffff',
            'selectors' => [
                '{{WRAPPER}} .bs4-button .bs4-text' => 'color: {{VALUE}};',
            ],
        ]);

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'text_typography',
                'label' => __('Typography', 'bs4-elementor-widgets'),
                'selector' => '{{WRAPPER}} .bs4-button .bs4-text',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'text_shadow',
                'label' => __('Text Shadow', 'bs4-elementor-widgets'),
                'selector' => '{{WRAPPER}} .bs4-button .bs4-text',
            ]
        );

        $this->end_controls_tab();

        // --- HOVER TAB ---
        $this->start_controls_tab('button_hover_tab', [
            'label' => __('Hover', 'bs4-elementor-widgets'),
        ]);

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'button_hover_background',
                'label' => __('Background on Hover', 'bs4-elementor-widgets'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .bs4-button:hover',
            ]
        );

        $this->add_control('text_hover_color', [
            'label' => __('Text Color on Hover', 'bs4-elementor-widgets'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .bs4-button:hover .bs4-text' => 'color: {{VALUE}};',
            ],
        ]);

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_hover_shadow',
                'label' => __('Shadow on Hover', 'bs4-elementor-widgets'),
                'selector' => '{{WRAPPER}} .bs4-button:hover',
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        // ============ STYLING: ICON ============
        $this->start_controls_section('icon_section', [
            'label' => __('Icon', 'bs4-elementor-widgets'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            'condition' => [
                'icon_enable' => 'yes',
            ],
        ]);

        // Create tabs for Normal and Hover
        $this->start_controls_tabs('icon_tabs');

        // --- NORMAL TAB ---
        $this->start_controls_tab('icon_normal_tab', [
            'label' => __('Normal', 'bs4-elementor-widgets'),
        ]);

        $this->add_control('icon_color', [
            'label' => __('Icon Color', 'bs4-elementor-widgets'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#ffffff',
            'selectors' => [
                '{{WRAPPER}} .bs4-button .bs4-icon' => 'color: {{VALUE}};',
                '{{WRAPPER}} .bs4-button .bs4-icon svg' => 'fill: {{VALUE}}; stroke: {{VALUE}};',
            ],
        ]);

        $this->add_responsive_control('icon_size', [
            'label' => __('Icon Size', 'bs4-elementor-widgets'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => ['px'],
            'default' => [
                'size' => 20,
                'unit' => 'px',
            ],
            'range' => [
                'px' => [
                    'min' => 10,
                    'max' => 100,
                    'step' => 1,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .bs4-button .bs4-icon' => 'font-size: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .bs4-button .bs4-icon svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
            ],
        ]);

        $this->add_responsive_control('icon_padding', [
            'label' => __('Icon Padding', 'bs4-elementor-widgets'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em'],
            'selectors' => [
                '{{WRAPPER}} .bs4-button .bs4-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'icon_background',
                'label' => __('Icon Background', 'bs4-elementor-widgets'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .bs4-button .bs4-icon',
                'default' => [
                    'background' => 'classic',
                    'color' => 'var(--e-global-color-accent)',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'icon_border',
                'label' => __('Icon Border', 'bs4-elementor-widgets'),
                'selector' => '{{WRAPPER}} .bs4-button .bs4-icon',
            ]
        );

        $this->add_control('icon_border_radius', [
            'label' => __('Icon Border Radius', 'bs4-elementor-widgets'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .bs4-button .bs4-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->end_controls_tab();

        // --- HOVER TAB ---
        $this->start_controls_tab('icon_hover_tab', [
            'label' => __('Hover', 'bs4-elementor-widgets'),
        ]);

        $this->add_control('icon_hover_color', [
            'label' => __('Icon Color on Hover', 'bs4-elementor-widgets'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .bs4-button:hover .bs4-icon' => 'color: {{VALUE}};',
                '{{WRAPPER}} .bs4-button:hover .bs4-icon svg' => 'fill: {{VALUE}}; stroke: {{VALUE}};',
            ],
        ]);

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'icon_hover_background',
                'label' => __('Icon Background on Hover', 'bs4-elementor-widgets'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .bs4-button:hover .bs4-icon',
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    protected function render() {

        
    $settings = $this->get_settings_for_display();
    
    echo '<div class="bs4-button-wrapper align-' . esc_attr($settings['alignment']) . '">';

    $button_url   = ! empty($settings['link']['url']) ? $settings['link']['url'] : '#';
    $is_external = ! empty( $settings['link']['is_external'] );
    $is_nofollow = ! empty( $settings['link']['nofollow'] );
    $icon_position = ! empty($settings['icon_position']) ? $settings['icon_position'] : 'left';

    $show_icon = ( $settings['icon_enable'] === 'yes' && ! empty($settings['icon']) );

    $icon_class = $show_icon ? ' bs4-icon-' . $icon_position : '';

    // Start anchor safely
    echo '<a class="bs4-button' . esc_attr($icon_class) . '" href="' . esc_url($button_url) . '"';

    if ( $is_external ) {
        echo ' target="_blank"';
    }

    if ( $is_nofollow ) {
        echo ' rel="nofollow"';
    }

    // SAFE ID OUTPUT (FIX FOR SNIFF ERROR)
    if ( ! empty( $settings['button_id'] ) ) {
        echo ' id="' . esc_attr( $settings['button_id'] ) . '"';
    }

    echo '>';

    // ICON LEFT
    if ( $show_icon && $icon_position === 'left' ) {
        echo '<span class="bs4-icon">';
        \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] );
        echo '</span>';
    }

    // TEXT
    echo '<span class="bs4-text">' . esc_html( $settings['text'] ) . '</span>';

    // ICON RIGHT
    if ( $show_icon && $icon_position === 'right' ) {
        echo '<span class="bs4-icon">';
        \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] );
        echo '</span>';
    }

    echo '</a>';

    echo '</div>';
    }
}