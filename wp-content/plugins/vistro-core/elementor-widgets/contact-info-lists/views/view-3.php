<div class="cta-4-all wow fadeInRight" data-wow-duration="1s">
    <?php \Elementor\Icons_Manager::render_icon( $settings['info_icon'], [ 'aria-hidden' => 'true' ] ); ?>
    <div class="content">
        <a class="number" href="tel:<?php echo esc_attr($settings['phone']); ?>"><?php echo esc_html($settings['phone']); ?></a>
        <?php if(!empty( $settings['info_label'] )) : ?>
        <span class="text"><?php echo elh_element_kses_intermediate($settings['info_label']); ?></span>
        <?php endif; ?>
    </div>
</div>