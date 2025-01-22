<div class="vst-contact-2-form-wrap bg-default wow fadeInUp" data-background="<?php echo $settings['bg_image']['url'] ? esc_url($settings['bg_image']['url']) : ''; ?>">
    <?php if(!empty( $settings['sub_title'] )) : ?>
    <h6 class="vst-subtitle-1 wow fadeInDown" data-wow-duration="1s"><?php echo elh_element_kses_intermediate($settings['sub_title']); ?></h6>
    <?php endif; ?>

    <?php if(!empty( $settings['title'] )) : ?>
    <h3 class="section-title-1 black reveal-type"><?php echo elh_element_kses_intermediate($settings['title']); ?></h3>
    <?php endif; ?>

    <div class="vst-contact-2-form">
        <?php
            if (!empty($settings['form_id'])) {
                echo elh_element_do_shortcode('contact-form-7', [
                    'id' => $settings['form_id'],
                    'html_class' => 'elh-cf7-form ' . elh_element_sanitize_html_class_param($settings['html_class']),
                ]);
            }
        ?>
    </div>
</div>