<div class="vst-success-3-offer">
    <?php if(!empty( $settings['count_number'] )) : ?>
    <h3 class="offer-counter" ><span class="odometer" data-count="<?php echo esc_html( $settings['count_number'] ); ?>">0</span></h3>
    <?php endif; ?>
    <div class="content-wrap">
        <?php if(!empty( $settings['sign'] )) : ?>
        <span class="off"><?php echo esc_html($settings['sign']); ?></span>
        <?php endif; ?>

        <?php if(!empty( $settings['count_title'] )) : ?>
        <p class="h1-heading"><?php echo elh_element_kses_intermediate( $settings['count_title'] ); ?></p>
        <?php endif; ?>
    </div>
</div>