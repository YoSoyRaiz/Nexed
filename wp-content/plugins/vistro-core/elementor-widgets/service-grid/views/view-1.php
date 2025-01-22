<div class="vst-service-2-item <?php echo $settings['anim_name'] ? esc_attr($settings['anim_name']) : ''; ?>"
data-wow-delay="<?php echo $settings['anim_delay'] ? esc_attr($settings['anim_delay']) : ''; ?>"
data-wow-duration="<?php echo $settings['anim_duration'] ? esc_attr($settings['anim_duration']) : ''; ?>">
    <?php if(!empty( $settings['service_image']['url'] )) : ?>
    <div class="img-wrap">
        <img src="<?php echo esc_url($settings['service_image']['url']); ?>" alt="">
    </div>
    <?php endif; ?>
    <div class="content-wrap">
        <?php if($settings['enable_icon'] === 'yes') : ?>
        <div class="icon">
            <?php if($settings['type'] == 'icon') : ?>
                <?php \Elementor\Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true' ] ); ?>
            <?php else : ?>
                <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="" />
            <?php endif; ?>
        </div>
        <?php endif; ?>
        <h3 class="h1-heading">
            <a href="<?php echo $settings['button_link']['url'] ? esc_url( $settings['button_link']['url'] ) : '';  ?>">
                <?php echo elh_element_kses_intermediate( $settings['title'] ); ?>
            </a>
        </h3>
        <?php if(!empty( $settings['description'] )) : ?>
        <p class="vst-pera-2"><?php echo elh_element_kses_intermediate( $settings['description'] ); ?></p>
        <?php endif; ?>
    </div>
</div>