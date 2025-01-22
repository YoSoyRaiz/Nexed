<div class="vst-choose-1-feature-item wow <?php echo $settings['anim_name'] ? esc_attr($settings['anim_name']) : ''; ?>" data-wow-duration="<?php echo $settings['anim_duration'] ? esc_attr($settings['anim_duration']) : ''; ?>">
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
    <h4 class="h1-heading name">
        <?php echo elh_element_kses_intermediate( $settings['title'] ); ?>
    </h4>
    <?php endif; ?>
</div>