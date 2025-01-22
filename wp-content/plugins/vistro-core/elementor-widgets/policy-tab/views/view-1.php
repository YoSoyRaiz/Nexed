<?php
    $this->add_render_attribute( 'title', 'class', 'tx-title section-title-1 black reveal-type' );
    $this->add_render_attribute( 'title', 'class', 'wow '.esc_attr($settings['title_anim_name']).'' );
    $this->add_render_attribute( 'title', 'data-wow-duration', esc_attr($settings['title_anim_duration']) );
    $title = $settings['title'];
    $rand = rand(1, 1000);
?>

<div class="vst-progress-2-area h1-animation">
    <div class="container h1-container">
        <div class="vst-progress-2-wrap">
            <div class="vst-progress-2-left">
                <?php if(!empty( $settings['tab_shape_1']['url'] )) : ?>
                <img src="<?php echo esc_url($settings['tab_shape_1']['url']); ?>" alt="" class="shape-1">
                <?php endif; ?>

                <div class="tab-content vst-progress-2-tabs-content wow fadeInUp" data-wow-duration="1s" id="v-pills-tabContent">
                    <?php
                        foreach($settings['policy_tabs'] as $id => $list ) :
                        $active_tab = ($id == 0) ? ' active show' : '';
                    ?>
                    <div class="tab-pane fade <?php echo esc_attr($active_tab); ?>" id="vistroTab-<?php  echo esc_attr($id.$rand); ?>" role="tabpanel" aria-labelledby="vistroTab-tab-<?php  echo esc_attr($id.$rand); ?>">
                        <?php if(!empty( $list['tab_image']['url']) ) : ?>
                        <div class="img-wrap">
                            <img src="<?php echo esc_url($list['tab_image']['url']); ?>" alt="">
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>
                </div>

                <div class="nav vst-progress-2-tabs-btn-wrap flex-column nav-pills me-3 wow fadeInUp" data-wow-duration="2s" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <?php
                        foreach($settings['policy_tabs'] as $id => $list ) :
                            $active_tab = ($id == 0) ? 'active' : '';
                            $aria_selected = ($id == 0) ? 'true' : '';
                    ?>
                    <button class="nav-link <?php echo esc_attr($active_tab); ?>" id="vistroTab-tab-<?php  echo esc_attr($id.$rand); ?>" data-bs-toggle="tab" data-bs-target="#vistroTab-<?php  echo esc_attr($id.$rand); ?>" type="button" role="tab" aria-controls="vistroTab-<?php  echo esc_attr($id.$rand); ?>" aria-selected="<?php  echo esc_attr($aria_selected); ?>">
                    <?php echo elh_element_kses_intermediate($list['tab_title']); ?>
                        <i class="fas fa-long-arrow-alt-right"></i>
                    </button>
                    <?php endforeach; ?>
                </div>

            </div>

            <!-- right-content -->
            <div class="vst-progress-2-right">
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

                <div class="vst-progress-2-div-grid bg-default" data-background="<?php echo $settings['bg_image']['url'] ? esc_url($settings['bg_image']['url']) : ''; ?>">
                    <ul class="vst-progress-2-list list-unstyled">
                        <?php foreach($settings['list_items'] as $list) :
                            if($list['enable_icon'] == 'yes') {
                                $class = 'has-icon';
                            } else {
                                $icon = '';
                            }
                        ?>
                        <li class="wow fadeInUp" data-wow-duration="1s">
                            <?php if($list['enable_icon'] === 'yes') : ?>
                            <span class="tx-icon">
                                <?php if($list['type'] == 'icon') : ?>
                                    <?php \Elementor\Icons_Manager::render_icon( $list['info_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                <?php else : ?>
                                    <img src="<?php echo esc_url($list['info_image']['url']); ?>" alt="" />
                                <?php endif; ?>
                            </span>
                            <?php endif; ?>

                            <?php echo elh_element_kses_intermediate($list['info_text']); ?>
                        </li>
                    <?php endforeach; ?>
                    </ul>

                    <div class="vst-progress-2-download wow fadeInRight" data-wow-duration="1s">
                        <?php if(!empty( $settings['image_1']['url'] )) : ?>
                        <div class="img-wrap">
                            <img src="<?php echo esc_url($settings['image_1']['url']); ?>" alt="">
                        </div>
                        <?php endif; ?>
                        <a class="dwnload-btn"
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
            </div>
        </div>
    </div>
</div>