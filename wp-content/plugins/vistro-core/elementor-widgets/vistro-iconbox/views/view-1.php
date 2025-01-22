<div class="vst-about-1-feature-item wow <?php echo $settings['anim_name'] ? esc_attr($settings['anim_name']) : ''; ?>" data-wow-duration="<?php echo $settings['anim_duration'] ? esc_attr($settings['anim_duration']) : ''; ?>">
    <?php if($settings['enable_icon'] === 'yes') : ?>
    <div class="icon">
        <?php if($settings['type'] == 'icon') : ?>
            <?php \Elementor\Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true' ] ); ?>
        <?php else : ?>
            <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="" />
        <?php endif; ?>
    </div>
    <?php endif; ?>

    <?php if(!empty( $settings['title'] )) : ?>
    <h4 class="h1-heading item-name">
        <?php echo elh_element_kses_intermediate( $settings['title'] ); ?>
    </h4>
    <?php endif; ?>

    <?php if(!empty( $settings['link']['url'] )) : ?>
    <a class="item-btn" href="<?php echo esc_url($settings['link']['url']); ?>"
    target="<?php echo $settings['link']['is_external'] ? '_blank' : '_self'; ?>"
    rel="<?php echo $settings['link']['nofollow'] ? 'nofollow' : ''; ?>"
    >
        <?php \Elementor\Icons_Manager::render_icon( $settings['button_icon'], [ 'aria-hidden' => 'true' ] ); ?>
    </a>
    <?php endif; ?>
</div>