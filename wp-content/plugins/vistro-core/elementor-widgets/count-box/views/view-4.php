<div class="vst-success-4-feature-item wow fadeInRight" data-wow-delay=".1s">
    <?php if($settings['enable_icon'] === 'yes') : ?>
    <div class="tx-icon icon">
        <?php if($settings['type'] == 'icon') : ?>
            <?php \Elementor\Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true' ] ); ?>
        <?php else : ?>
            <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="" />
        <?php endif; ?>
    </div>
    <?php endif; ?>
    <h3 class="counter-item">
        <span class="counter"><?php echo esc_html( $settings['count_number'] ); ?></span><?php echo esc_html($settings['sign']); ?>
    </h3>

    <?php if(!empty( $settings['count_title'] )) : ?>
    <p class="text"><?php echo elh_element_kses_intermediate( $settings['count_title'] ); ?></p>
    <?php endif; ?>
</div>