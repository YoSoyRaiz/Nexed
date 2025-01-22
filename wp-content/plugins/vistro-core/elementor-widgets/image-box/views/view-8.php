<div class="vst-success-3-img h1-animation">
    <?php if(!empty( $settings['image_1']['url'] )) : ?>
    <div class="main-img">
        <img src="<?php echo esc_url($settings['image_1']['url']); ?>" alt="">
    </div>
    <?php endif; ?>
    <?php if(!empty( $settings['image_2']['url'] )) : ?>
    <img src="<?php echo esc_url($settings['image_2']['url']); ?>" alt="" class="shape-1">
    <?php endif; ?>

    <?php if(!empty( $settings['image_3']['url'] )) : ?>
    <img src="<?php echo esc_url($settings['image_3']['url']); ?>" alt="" class="shape-2">
    <?php endif; ?>
</div>