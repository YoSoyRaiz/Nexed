<div class="vst-success-1-conter">
    <h3 class="title">
        <span class="odometer" data-count="<?php echo esc_html( $settings['count_number'] ); ?>">0</span><?php echo esc_html($settings['sign']); ?>
    </h3>
    <?php if(!empty( $settings['count_title'] )) : ?>
    <span class="text"><?php echo elh_element_kses_intermediate( $settings['count_title'] ); ?></span>
    <?php endif; ?>
</div>