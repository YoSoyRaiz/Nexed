<div class="vst-faq-1-left h1-animation">
    <?php if(!empty( $settings['image_1']['url'] )) : ?>
    <div class="vst-faq-1-img" >
        <img src="<?php echo esc_url($settings['image_1']['url']); ?>" alt="">
    </div>
    <?php endif; ?>
    <div class="vst-faq-1-traffic wow fadeInUp" data-wow-duration="2s">
        <h3 class="title h1-heading" ><span class="odometer" data-count="<?php echo esc_attr($settings['count_number']); ?>">0</span><?php echo esc_attr($settings['sign']); ?></h3>
        <?php if(!empty( $settings['count_title'] )) : ?>
        <p class="text"><?php echo elh_element_kses_intermediate( $settings['count_title'] ); ?></p>
        <?php endif; ?>
    </div>
</div>