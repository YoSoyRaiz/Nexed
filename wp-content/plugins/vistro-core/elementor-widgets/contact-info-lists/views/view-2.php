<div class="vst-choose-1-content-wrap">
    <div class="vst-call-option-wrap">
        <?php if( $settings['enable_icon'] == 'yes' ) : ?>
        <div class="vst-call-option-icon">
            <?php \Elementor\Icons_Manager::render_icon( $settings['info_icon'], [ 'aria-hidden' => 'true' ] ); ?>
        </div>
        <?php endif; ?>
        <div class="vst-call-option-link">
            <?php if(!empty( $settings['phone'] )) : ?>
            <a class="phone" href="tel:<?php echo esc_attr($settings['phone']); ?>"><?php echo esc_html($settings['phone']); ?></a>
            <?php endif; ?>
            <?php if(!empty( $settings['mail'] )) : ?>
            <a class="mail" href="mailto:<?php echo esc_attr($settings['mail']); ?>"><?php echo esc_html($settings['mail']); ?></a>
            <?php endif; ?>
        </div>
    </div>
</div>