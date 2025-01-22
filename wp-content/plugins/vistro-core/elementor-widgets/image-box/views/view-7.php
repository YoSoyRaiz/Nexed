<div class="vst-choose-2-img-wrap h1-animation">
    <?php if(!empty( $settings['image_1']['url'] )) : ?>
    <div class="main-img">
        <img src="<?php echo esc_url($settings['image_1']['url']); ?>" alt="">
    </div>
    <?php endif; ?>

    <div class="vst-chooe-2-play-popup wow flipInX" data-wow-duration="2s" data-background="<?php echo $settings['video_bg_image']['url'] ? esc_url($settings['video_bg_image']['url']) : ''; ?>">
        <a class="c2-play-btn" href="<?php echo esc_url($settings['video_link']['url']); ?>">
            <?php if(!empty( $settings['cercle_image']['url'] )) : ?>
            <img src="<?php echo esc_url($settings['cercle_image']['url']); ?>" alt="">
            <?php endif; ?>
        </a>
    </div>
</div>