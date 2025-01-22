<div class="vst-serving-1-feature-item wow <?php echo $settings['anim_name'] ? esc_attr($settings['anim_name']) : ''; ?>" data-wow-duration="<?php echo $settings['anim_duration'] ? esc_attr($settings['anim_duration']) : ''; ?>">
    <?php if($settings['enable_icon'] === 'yes') : ?>
    <div class="icon">
        <?php if($settings['type'] == 'icon') : ?>
            <?php \Elementor\Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true' ] ); ?>
        <?php else : ?>
            <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="" />
        <?php endif; ?>
    </div>
    <?php endif; ?>
    <div class="content-wrap">
        <?php if(!empty( $settings['title'] )) : ?>
        <h5 class="h1-heading title"><?php echo elh_element_kses_intermediate( $settings['title'] ); ?></h5>
        <?php endif; ?>

        <?php if(!empty( $settings['desc'] )) : ?>
        <p class="vst-pera-2"><?php echo elh_element_kses_intermediate( $settings['desc'] ); ?></p>
        <?php endif; ?>
    </div>
</div>