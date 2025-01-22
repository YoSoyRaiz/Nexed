<div class="vst-choose-1-img-wrap h1-animation">

    <!-- bg-shape -->
    <?php if(!empty( $settings['shape_1']['url'] )) : ?>
    <img class="bg-shape-1" src="<?php echo esc_url($settings['shape_1']['url']); ?>" alt="">
    <?php endif; ?>
    <?php if(!empty( $settings['shape_2']['url'] )) : ?>
    <img class="bg-shape-2" src="<?php echo esc_url($settings['shape_2']['url']); ?>" alt="">
    <?php endif; ?>
    <?php if(!empty( $settings['shape_3']['url'] )) : ?>
    <img class="bg-shape-3" src="<?php echo esc_url($settings['shape_3']['url']); ?>" alt="">
    <?php endif; ?>

    <?php if(!empty( $settings['image_1']['url'] )) : ?>
    <div class="main-img">
        <img src="<?php echo esc_url($settings['image_1']['url']); ?>" alt="">
    </div>
    <?php endif; ?>

    <?php if(!empty( $settings['image_2']['url'] )) : ?>
    <div class="popup-img-1">
        <img src="<?php echo esc_url($settings['image_2']['url']); ?>" alt="">
    </div>
    <?php endif; ?>

    <?php if(!empty( $settings['image_3']['url'] )) : ?>
    <div class="popup-img-2">
        <img src="<?php echo esc_url($settings['image_3']['url']); ?>" alt="">
    </div>
    <?php endif; ?>

</div>