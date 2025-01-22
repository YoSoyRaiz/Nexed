<div class="vst-services-2-cta">
    <?php if(!empty( $settings['title'] )) : ?>
    <h4 class="h1-heading reveal-type"><?php echo elh_element_kses_intermediate( $settings['title'] ); ?></h4>
    <?php endif; ?>
    <a href="<?php echo $settings['button_link']['url'] ? esc_url($settings['button_link']['url']) : ''; ?>" class="call-btn wow fadeInRight" data-wow-duration="2s" >
        <?php if($settings['enable_icon'] === 'yes') : ?>
            <?php if($settings['type'] == 'icon') : ?>
                <?php \Elementor\Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true' ] ); ?>
            <?php else : ?>
                <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="" />
            <?php endif; ?>
        <?php endif; ?>
        <?php echo elh_element_kses_intermediate($settings['button_text']); ?>
    </a>
</div>