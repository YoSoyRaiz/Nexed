<?php
    $this->add_render_attribute( 'title', 'class', 'tx-title section-title-1 black reveal-type' );
    $this->add_render_attribute( 'title', 'class', 'wow '.esc_attr($settings['title_anim_name']).'' );
    $this->add_render_attribute( 'title', 'data-wow-duration', esc_attr($settings['title_anim_duration']) );
    $title = $settings['title'];
    $rand = rand(1, 1000);
?>
<div class="vst-progress-2-area">
    <div class="container h1-container">
        <div class="vst-progress-3-wrap">
            <div class="vst-progress-3-left">
                <div class="tab-content vst-progress-3-tabs-content wow fadeInUp" data-wow-duration="1s" id="v-pills-tabContent-<?php  echo esc_attr($rand); ?>">
                    <?php
                        foreach($settings['team_tabs'] as $id => $list ) :
                        $active_tab = ($id == 0) ? ' active show' : '';
                    ?>
                    <div class="tab-pane fade <?php echo esc_attr($active_tab); ?>" id="vistroTab-<?php  echo esc_attr($id.$rand); ?>" role="tabpanel" aria-labelledby="vistroTab-tab-<?php  echo esc_attr($id.$rand); ?>">
                        <div class="vst-progress-3-item-wrap">
                            <?php foreach($list['team_lists'] as $team) : ?>
                            <div class="vst-progress-3-item">
                                <?php if(!empty( $team['team_image']['url'] )) : ?>
                                <div class="img-wrap">
                                    <img src="<?php echo esc_url($team['team_image']['url']); ?>" alt="">
                                </div>
                                <?php endif; ?>
                                <?php if(!empty( $team['designation'] )) : ?>
                                <span class="tag"><?php echo elh_element_kses_intermediate($team['designation']); ?></span>
                                <?php endif; ?>
                                <div class="content-wrap">
                                    <h5 class="h1-heading name"><?php echo elh_element_kses_intermediate($team['name']); ?></h5>
                                    <ul class="social-links list-unstyled">
                                        <?php if(!empty( $team['call_number'] )) : ?>
                                        <li>
                                            <a href="tel:<?php echo esc_attr($team['call_number']) ?>">
                                                <?php \Elementor\Icons_Manager::render_icon( $team['call_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                                <?php echo esc_html($team['call_number']); ?>
                                            </a>
                                        </li>
                                        <?php endif; ?>
                                        <?php if(!empty( $team['email'] )) : ?>
                                        <li>
                                            <a href="mailto:<?php echo esc_attr($team['email']) ?>">
                                                <?php \Elementor\Icons_Manager::render_icon( $team['email_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                                <?php echo esc_html($team['email']); ?>
                                            </a>
                                        </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="vst-progress-3-right">
                <div class="vst-section-title-1 mb-15">
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

                <div class="nav vst-progress-3-tabs-btn-wrap flex-column nav-pills wow fadeInUp" data-wow-duration="2s" id="v-pills-<?php  echo esc_attr($id.$rand); ?>" role="tablist" aria-orientation="vertical">
                    <?php
                        foreach($settings['team_tabs'] as $id => $list ) :
                            $active_tab = ($id == 0) ? 'active' : '';
                            $aria_selected = ($id == 0) ? 'true' : '';
                    ?>
                    <button class="nav-link wow fadeInUp <?php echo esc_attr($active_tab); ?>" id="vistroTab-tab-<?php  echo esc_attr($id.$rand); ?>" data-bs-toggle="tab" data-bs-target="#vistroTab-<?php  echo esc_attr($id.$rand); ?>" type="button" role="tab" aria-controls="vistroTab-<?php  echo esc_attr($id.$rand); ?>" aria-selected="<?php  echo esc_attr($aria_selected); ?>">
                        <span class="shape"></span>
                        <?php echo elh_element_kses_intermediate($list['tab_title']); ?>
                        <i class="fas fa-long-arrow-alt-right"></i>
                    </button>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>