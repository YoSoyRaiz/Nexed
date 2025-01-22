<?php
    $this->add_render_attribute( 'title', 'class', 'tx-title section-title-1 black reveal-type' );
    $this->add_render_attribute( 'title', 'class', 'wow '.esc_attr($settings['title_anim_name']).'' );
    $this->add_render_attribute( 'title', 'data-wow-duration', esc_attr($settings['title_anim_duration']) );
    $title = $settings['title'];
    $rand = rand(1, 1000);
?>

<div class="vst-pricing-area h1-animation">
    <?php if(!empty( $settings['image_1']['url'] )) : ?>
    <img src="<?php echo esc_url($settings['image_1']['url']); ?>" alt="" class="bg-img-1 wow slideInLeft" data-wow-delay=".5s" data-wow-duration="2s">
    <?php endif; ?>

    <div class="container h1-container">
        <div class="vst-pricing-wrap">
            <div class="vst-pricing-content">
                <div class="vst-section-title-1 mb-35">
                    <?php if($settings['enable_sub_title'] === 'yes') : ?>
                    <h6 class="vst-subtitle-1 tx-subTitle wow <?php echo $settings['sub_anim_name'] ? esc_attr($settings['sub_anim_name']) : ''; ?>" data-wow-duration="<?php echo $settings['sub_anim_duration'] ? esc_attr($settings['sub_anim_duration']) : ''; ?>">
                        <?php echo elh_element_kses_intermediate($settings['sub_title']); ?>
                    </h6>
                    <?php endif; ?>
                    <?php
                        if($settings['enable_title'] === 'yes') {
                            printf('<%1$s %2$s>%3$s</%1$s>',
                                tag_escape($settings['title_tag']),
                                $this->get_render_attribute_string('title'),
                                $title
                            );
                        }
                    ?>
                    <?php if($settings['enable_description'] === 'yes') : ?>
                    <p class="tx-description vst-pera-2 choose-1-pera <?php echo esc_attr($desc_border); ?> wow <?php echo $settings['desc_anim_name'] ? esc_attr($settings['desc_anim_name']) : ''; ?>" data-wow-duration="<?php echo $settings['desc_anim_duration'] ? esc_attr($settings['desc_anim_duration']) : ''; ?>">
                        <?php echo elh_element_kses_intermediate($settings['description']); ?>
                    </p>
                    <?php endif; ?>
                </div>

                <!-- tabs-menu -->
                <ul class="nav nav-tabs vst-pricing-feature-wrap mb-45 list-unstyled" id="myTab-<?php echo esc_attr($rand); ?>" role="tablist">
                    <?php
                        foreach($settings['pricingTab_lists'] as $id => $list ) :
                            $active_tab = ($id == 0) ? 'active' : '';
                            $aria_selected = ($id == 0) ? 'true' : '';
                    ?>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link vst-pricing-feature-item <?php echo esc_attr($active_tab); ?>" id="vistroTab-tab-<?php  echo esc_attr($id.$rand); ?>" data-bs-toggle="tab" data-bs-target="#vistroTab-<?php  echo esc_attr($id.$rand); ?>" type="button" role="tab" aria-controls="vistroTab-<?php  echo esc_attr($id.$rand); ?>" aria-selected="<?php  echo esc_attr($aria_selected); ?>">
                            <?php if($list['enable_tab_icon'] === 'yes') : ?>
                            <span class="icon">
                                <?php if($list['tab_icon_type'] == 'icon') : ?>
                                    <?php \Elementor\Icons_Manager::render_icon( $list['tab_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                <?php else : ?>
                                    <img src="<?php echo esc_url($list['tab_icon_image']['url']); ?>" alt="" />
                                <?php endif; ?>
                            </span>
                            <?php endif; ?>
                            <span class="h1-heading"><?php echo elh_element_kses_intermediate($list['tab_title']); ?></span>
                        </button>
                    </li>
                    <?php endforeach; ?>
                </ul>

                <div class="btn-wrap wow fadeInUp" data-wow-duration="2s">
                    <a class="vst-btn-1"
                    href="<?php echo $settings['button_link']['url'] ? esc_url($settings['button_link']['url']) : ''; ?>"
                    target="<?php echo $settings['button_link']['is_external'] ? '_blank' : '_self'; ?>"
                    rel="<?php echo $settings['button_link']['nofollow'] ? 'nofollow' : ''; ?>"
                    >
                    <?php echo elh_element_kses_intermediate($settings['button_text']); ?>
                    <?php if($settings['enable_icon'] === 'yes') : ?>
                        <?php if($settings['type'] == 'icon') : ?>
                            <?php \Elementor\Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                        <?php else : ?>
                            <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="" />
                        <?php endif; ?>
                    <?php endif; ?>
                    </a>
                </div>

            </div>

            <div class="vst-pricing-card-wrap wow fadeInUp" data-wow-duration="1s">

                <?php if(!empty( $settings['image_2']['url'] )) : ?>
                <img src="<?php echo esc_url($settings['image_2']['url']); ?>" alt="" class="passport-img">
                <?php endif; ?>

                <div class="tab-content" id="myTabContent">
                    <?php
                        foreach($settings['pricingTab_lists'] as $id => $list ) :
                        if ($list['currency'] === 'custom') {
                            $currency = $list['currency_custom'];
                        } else {
                            $currency = self::get_currency_symbol($list['currency']);
                        }
                        $active_tab = ($id == 0) ? ' active show' : '';
                    ?>
                    <!-- single-item -->
                    <div class="tab-pane animated fadeInRight <?php echo esc_attr($active_tab); ?>" id="vistroTab-<?php  echo esc_attr($id.$rand); ?>" role="tabpanel" aria-labelledby="vistroTab-tab-<?php  echo esc_attr($id.$rand); ?>">
                        <div class="vst-pricing-card bg-default" data-background="<?php echo $settings['package_bg_image']['url'] ? esc_url($settings['package_bg_image']['url']) : ''; ?>">
                            <h4 class="h1-heading price">
                                <span><?php echo esc_html($currency); ?></span><?php echo esc_html($list['price']); ?>
                            </h4>
                            <?php if(!empty( $list['period'] )) : ?>
                            <h5 class="h1-heading title"><?php echo esc_html($list['period']); ?></h5>
                            <?php endif; ?>

                            <ul class="features mb-40 list-unstyled">
                                <?php if(!empty( $list['package_lists_title'] )) : ?>
                                <li class="feature-title"><?php echo elh_element_kses_intermediate($list['package_lists_title']); ?></li>
                                <?php endif; ?>
                                <?php foreach($list['package_lists'] as $p_list) : ?>
                                <li>
                                    <?php \Elementor\Icons_Manager::render_icon( $p_list['package_list_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                    <?php echo elh_element_kses_intermediate($p_list['package_list_title']); ?>
                                </li>
                                <?php endforeach; ?>
                            </ul>

                            <div class="price-vat">
                                <?php if($list['enable_extra_fee_icon'] === 'yes') : ?>
                                    <?php if($list['extra_fee_icon_type'] == 'icon') : ?>
                                        <?php \Elementor\Icons_Manager::render_icon( $list['extra_fee_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                    <?php else : ?>
                                        <img src="<?php echo esc_url($list['extra_fee_icon_image']['url']); ?>" alt="" />
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php if(!empty( $list['extra_fees_text'] )) : ?>
                                <h4 class="h1-heading">
                                    <?php echo elh_element_kses_intermediate($list['extra_fees_text']); ?>
                                </h4>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>