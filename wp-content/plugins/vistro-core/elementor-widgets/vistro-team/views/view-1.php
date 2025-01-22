<div class="vst-agents-1-area bg-default">
    <div class="container h1-container">
        <div class="row g-0 align-items-center">

            <!-- left-slider-preview -->
            <div class="col-xl-6">
                <div class="swiper vst-agents-1-slider-preview">
                    <div class="swiper-container agents_1_preview">
                        <div class="swiper-wrapper">

                            <?php foreach($settings['team_members'] as $team ) : ?>
                            <div class="swiper-slide">
                                <div class="vst-agents-1-slider-preview-item">
                                    <img src="<?php echo $team['image']['url'] ? esc_url($team['image']['url']) : ''; ?>" alt="">
                                </div>
                            </div>
                            <?php endforeach; ?>

                        </div>
                    </div>

                    <?php if( $settings['enable_nav'] === 'yes' ) : ?>
                    <div class="vst-agents-1-slider-btn">
                        <div class="agents_1_prev">
                            <i class="fas fa-long-arrow-alt-left"></i>
                        </div>
                        <div class="agents_1_next">
                            <i class="fas fa-long-arrow-alt-right"></i>
                        </div>
                    </div>
                    <?php endif; ?>

                </div>
            </div>

            <!-- right-slide-content -->
            <div class="col-xl-6">
                <div class="swiper vst-agents-1-slider-main">
                    <div class="swiper-container agents_1_main_slider">
                        <div class="swiper-wrapper">

                        <?php foreach($settings['team_members'] as $team ) : ?>
                            <div class="swiper-slide">
                                <div class="vst-agents-1-slider-main-item">
                                    <div class="img-wrap">
                                        <?php if(!empty( $team['image']['url'] )) : ?>
                                        <div class="main-img">
                                            <img src="<?php echo esc_url($team['image']['url']); ?>" alt="">
                                        </div>
                                        <?php endif; ?>

                                        <?php if(!empty( $team['designation'] )) : ?>
                                        <a class="agents-btn"
                                        href="<?php echo esc_url($team['link']['url']); ?>"
                                        target="<?php echo $team['link']['is_external'] ? '_blank' : '_self'; ?>"
                                        rel="<?php echo $team['link']['nofollow'] ? 'nofollow' : ''; ?>"
                                        >
                                            <?php echo elh_element_kses_intermediate($team['designation']); ?>
                                        </a>
                                        <?php endif; ?>
                                    </div>
                                    <div class="content-wrap">
                                        <?php if(!empty( $team['name'] )) : ?>
                                        <h5 class="h1-heading name"><?php echo elh_element_kses_intermediate($team['name']); ?></h5>
                                        <?php endif; ?>

                                        <?php if(!empty( $team['short_intro'] )) : ?>
                                        <p class="vst-pera-2"><?php echo elh_element_kses_intermediate($team['short_intro']); ?></p>
                                        <?php endif; ?>

                                        <?php if(!empty( $team['contact_info_label'] )) : ?>
                                        <h6 class="h1-heading title">
                                            <?php echo elh_element_kses_intermediate($team['contact_info_label']); ?>
                                        </h6>
                                        <?php endif; ?>

                                        <div class="vst-agents-1-slider-main-contact-info mb-30">
                                            <a href="tel:<?php echo esc_attr($team['phone_number']); ?>">
                                            <?php \Elementor\Icons_Manager::render_icon( $team['call_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                                <?php echo esc_html($team['phone_number']); ?>
                                            </a>
                                            <a href="mailto:<?php echo esc_attr($team['mail']); ?>">
                                            <?php \Elementor\Icons_Manager::render_icon( $team['mail_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                            <?php echo esc_html($team['mail']); ?>
                                            </a>
                                        </div>

                                        <?php if(!empty( $team['social_links'] )) : ?>
                                        <div class="vst-agents-1-slider-main-social">
                                            <?php foreach($team['social_links'] as $link ) :?>
                                            <a
                                            href="<?php echo esc_url($link['social_link']['url']) ?>"
                                            target="<?php echo $link['social_link']['is_external'] ? '_blank' : '_self'; ?>"
                                            rel="<?php echo $link['social_link']['nofollow'] ? 'nofollow' : ''; ?>"
                                            >
                                            <?php \Elementor\Icons_Manager::render_icon( $link['social_icon'], [ 'aria-hidden' => 'true' ] ); ?></a>
                                            <?php endforeach; ?>
                                        </div>
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
    </div>
</div>