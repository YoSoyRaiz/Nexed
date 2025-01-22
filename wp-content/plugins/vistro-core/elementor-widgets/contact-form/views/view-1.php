<div class="vst-contact-1-form-wrap bg-default" data-background="<?php echo $settings['bg_image']['url'] ? esc_url($settings['bg_image']['url']) : ''; ?>">
    <?php if(!empty( $settings['title'] )) : ?>
    <h3 class="h1-heading title"><?php echo elh_element_kses_intermediate($settings['title']); ?></h3>
    <?php endif; ?>
    <?php
        if (!empty($settings['form_id'])) {
            echo elh_element_do_shortcode('contact-form-7', [
                'id' => $settings['form_id'],
                'html_class' => 'elh-cf7-form ' . elh_element_sanitize_html_class_param($settings['html_class']),
            ]);
        }
    ?>
</div>
