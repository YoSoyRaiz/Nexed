<div class="vst-pricing-feature-item">
    <?php if($settings['enable_icon'] === 'yes') : ?>
    <span class="icon">
        <?php if($settings['type'] == 'icon') : ?>
            <?php \Elementor\Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true' ] ); ?>
        <?php else : ?>
            <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="" />
        <?php endif; ?>
    </span>
    <?php endif; ?>

    <?php if(!empty( $settings['title'] )) : ?>
    <span class="h1-heading"><?php echo elh_element_kses_intermediate( $settings['title'] ); ?></span>
    <?php endif; ?>
</div>