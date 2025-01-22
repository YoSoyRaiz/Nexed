<div class="vst-success-2-img h1-animation">
    <?php if(!empty( $settings['image_1']['url'] )) : ?>
    <div class="main-img">
        <img src="<?php echo esc_url($settings['image_1']['url']); ?>" alt="">
    </div>
    <?php endif; ?>

    <?php if(!empty( $settings['image_2']['url'] )) : ?>
    <div class="secend-img">
        <img src="<?php echo esc_url($settings['image_2']['url']); ?>" alt="">
    </div>
    <?php endif; ?>
</div>