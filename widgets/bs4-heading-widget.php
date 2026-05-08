<?php

if (!defined('ABSPATH')) exit;

class BS4_Heading_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'bs4-heading';
    }

    public function get_title() {
        return __('BS4 Heading', 'bs4-elementor-widgets');
    }

    public function get_icon() {
        return 'eicon-heading';
    }

    public function get_categories() {
        return ['general'];
    }

    public function get_style_depends() {
        return ['bs4-style'];
    }

    protected function register_controls() {

        // ================= CONTENT =================
        $this->start_controls_section('content_section', [
            'label' => __('Content', 'bs4-elementor-widgets'),
        ]);

        $this->add_control('title', [
            'label' => __('Heading', 'bs4-elementor-widgets'),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'rows' => 4,
            'default' => 'This is [highlight-text="important"] heading',
            'dynamic' => ['active' => true],
            'description' => __('Use [highlight-text="your text"] to highlight words.', 'bs4-elementor-widgets'),
        ]);

        $this->add_control('link', [
            'label' => __('Link', 'bs4-elementor-widgets'),
            'type' => \Elementor\Controls_Manager::URL,
            'dynamic' => ['active' => true],
        ]);

        $this->add_control('html_tag', [
            'label' => __('HTML Tag', 'bs4-elementor-widgets'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'h2',
            'options' => [
                'h1' => 'H1',
                'h2' => 'H2',
                'h3' => 'H3',
                'h4' => 'H4',
                'h5' => 'H5',
                'h6' => 'H6',
                'p' => 'P',
                'span' => 'Span',
                'div' => 'Div'
            ],
        ]);

        $this->end_controls_section();


        // ================= STYLE: HEADING =================
        $this->start_controls_section('heading_style', [
            'label' => __('Heading', 'bs4-elementor-widgets'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);

        $this->add_responsive_control('alignment', [
            'label' => __('Alignment', 'bs4-elementor-widgets'),
            'type' => \Elementor\Controls_Manager::CHOOSE,
            'options' => [
                'left' => [
                    'title' => __('Left', 'bs4-elementor-widgets'),
                    'icon' => 'eicon-text-align-left',
                ],
                'center' => [
                    'title' => __('Center', 'bs4-elementor-widgets'),
                    'icon' => 'eicon-text-align-center',
                ],
                'right' => [
                    'title' => __('Right', 'bs4-elementor-widgets'),
                    'icon' => 'eicon-text-align-right',
                ],
            ],
            'default' => 'left',
            'selectors' => [
                '{{WRAPPER}} .bs4-heading-wrapper' => 'text-align: {{VALUE}};',
            ],
        ]);

        // NORMAL / HOVER TABS
        $this->start_controls_tabs('heading_tabs');

        // ---- NORMAL ----
        $this->start_controls_tab('heading_normal', [
            'label' => __('Normal', 'bs4-elementor-widgets'),
        ]);

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'typography',
                'selector' => '{{WRAPPER}} .bs4-heading',
            ]
        );

        $this->add_control('text_color', [
            'label' => __('Text Color', 'bs4-elementor-widgets'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => 'var(--e-global-color-primary)',
            'selectors' => [
                '{{WRAPPER}} .bs4-heading' => 'color: {{VALUE}};',
            ],
        ]);

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'background',
                'selector' => '{{WRAPPER}} .bs4-heading',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'text_shadow',
                'selector' => '{{WRAPPER}} .bs4-heading',
            ]
        );

        $this->add_control('text_stroke_width', [
            'label' => __('Text Stroke Width', 'bs4-elementor-widgets'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'selectors' => [
                '{{WRAPPER}} .bs4-heading' => '-webkit-text-stroke-width: {{SIZE}}px;',
            ],
        ]);

        $this->add_control('text_stroke_color', [
            'label' => __('Text Stroke Color', 'bs4-elementor-widgets'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .bs4-heading' => '-webkit-text-stroke-color: {{VALUE}};',
            ],
        ]);

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'selector' => '{{WRAPPER}} .bs4-heading',
            ]
        );

        $this->add_control('border_radius', [
            'label' => __('Border Radius', 'bs4-elementor-widgets'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'selectors' => [
                '{{WRAPPER}} .bs4-heading' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_responsive_control('padding', [
            'label' => __('Padding', 'bs4-elementor-widgets'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'selectors' => [
                '{{WRAPPER}} .bs4-heading' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_responsive_control('margin', [
            'label' => __('Margin', 'bs4-elementor-widgets'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'selectors' => [
                '{{WRAPPER}} .bs4-heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'shadow',
                'selector' => '{{WRAPPER}} .bs4-heading',
            ]
        );

        $this->end_controls_tab();

        // ---- HOVER ----
        $this->start_controls_tab('heading_hover', [
            'label' => __('Hover', 'bs4-elementor-widgets'),
        ]);

        $this->add_control('hover_color', [
            'label' => __('Text Color', 'bs4-elementor-widgets'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .bs4-heading:hover' => 'color: {{VALUE}};',
            ],
        ]);

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'hover_background',
                'label' => __('Background', 'bs4-elementor-widgets'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .bs4-heading:hover',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'hover_border',
                'selector' => '{{WRAPPER}} .bs4-heading:hover',
            ]
        );

        $this->add_control('hover_border_radius', [
            'label' => __('Border Radius', 'bs4-elementor-widgets'),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => ['px', '%', 'em'],
            'selectors' => [
                '{{WRAPPER}} .bs4-heading:hover' =>
                    'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]);

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'hover_shadow',
                'selector' => '{{WRAPPER}} .bs4-heading:hover',
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();
        $this->end_controls_section();


        // ================= STYLE: HIGHLIGHT =================
        $this->start_controls_section('highlight_style', [
            'label' => __('Highlight Text', 'bs4-elementor-widgets'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ]);

        // TYPOGRAPHY FOR HIGHLIGHT
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'highlight_typography',
                'selector' => '{{WRAPPER}} .bs4-highlight',
            ]
        );

        $this->add_control('highlight_color', [
            'label' => __('Text Color', 'bs4-elementor-widgets'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .bs4-highlight' => 'color: {{VALUE}};',
            ],
        ]);

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'highlight_bg',
                'selector' => '{{WRAPPER}} .bs4-highlight',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'highlight_shadow',
                'selector' => '{{WRAPPER}} .bs4-highlight',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'highlight_border',
                'selector' => '{{WRAPPER}} .bs4-highlight',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {

        $settings = $this->get_settings_for_display();

        $tag = $settings['html_tag'];
        $text = $settings['title'];

        // Convert highlight shortcode
        $text = preg_replace_callback(
            '/\[highlight-text="(.*?)"\]/',
            function ($matches) {
                return '<span class="bs4-highlight">' . esc_html($matches[1]) . '</span>';
            },
            $text
        );

        echo '<div class="bs4-heading-wrapper">';

        if (!empty($settings['link']['url'])) {
            $this->add_link_attributes('link', $settings['link']);
            echo '<a ' . $this->get_render_attribute_string('link') . '>';
        }

        echo '<' . esc_attr($tag) . ' class="bs4-heading">';
        echo wp_kses_post($text);
        echo '</' . esc_attr($tag) . '>';

        if (!empty($settings['link']['url'])) {
            echo '</a>';
        }

        echo '</div>';
    }
}