<div class="vst-about-1-gallery-img h1-animation">
    <?php if(!empty( $settings['image_1']['url'] )) : ?>
    <div class="img-1">
        <img src="<?php echo esc_url($settings['image_1']['url']); ?>" alt="">
    </div>
    <?php endif; ?>

    <?php if(!empty( $settings['image_2']['url'] )) : ?>
    <div class="img-2">
        <img src="<?php echo esc_url($settings['image_2']['url']); ?>" alt="">
    </div>
    <?php endif; ?>
</div>