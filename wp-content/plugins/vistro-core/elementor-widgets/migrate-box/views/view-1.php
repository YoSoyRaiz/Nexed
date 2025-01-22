<div class="vst-sticker-1-position">
    <div class="vst-sticker-1-content">
        <?php if(!empty( $settings['image_1']['url'] )) : ?>
        <div class="flaq">
            <img src="<?php echo esc_url($settings['image_1']['url']); ?>" alt="">
        </div>
        <?php endif; ?>
        <?php if(!empty( $settings['title'] )) : ?>
        <h5 class="h1-heading name">
            <?php echo elh_element_kses_intermediate($settings['title']); ?>
        </h5>
        <?php endif; ?>
    </div>
</div>