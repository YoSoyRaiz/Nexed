<?php

    $button_class = '';
    if($settings['button_full_width'] == 'yes') {
        $button_class = 'fullWidth';
    } else {
        $button_class = '';
    }

    $button_alignment = $settings['button_alignment'];

    if($button_alignment == 'left') {
        $button_class .= ' text-left';
    } elseif($button_alignment == 'center') {
        $button_class .= ' text-center';
    } elseif($button_alignment == 'right') {
        $button_class .= ' text-right';
    }
?>
<div class="btn-wrapper <?php echo esc_attr($button_class); ?>">
    <a class="vst-btn-1"
    data-wow-duration="1s"
    href="<?php echo $settings['button_link']['url'] ? esc_url($settings['button_link']['url']) : ''; ?>"
    target="<?php echo $settings['button_link']['is_external'] ? '_blank' : '_self'; ?>"
    rel="<?php echo $settings['button_link']['nofollow'] ? 'nofollow' : ''; ?>"
    >
    <?php echo elh_element_kses_intermediate($settings['button_text']); ?>
        <?php if($settings['enable_icon'] === 'yes') : ?>
            <?php if($settings['type'] == 'icon') : ?>
                <?php \Elementor\Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true' ] ); ?>
            <?php else : ?>
                <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="" />
            <?php endif; ?>
        <?php endif; ?>
    </a>
</div>