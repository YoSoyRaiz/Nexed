<?php if(!empty( $settings['gallery_items'] )) : ?>
<div class="vst-footer-1-gallery">
    <?php foreach($settings['gallery_items'] as $list) : ?>
    <div class="single-img">
        <a class="popup_img" href="<?php echo esc_url($list['gallery_image']['url']); ?>">
            <?php \Elementor\Icons_Manager::render_icon( $list['gallery_icon'], [ 'aria-hidden' => 'true' ] ); ?>
        </a>
        <img src="<?php echo esc_url($list['gallery_image']['url']); ?>" alt="<?php if(function_exists('vistro_img_alt_text')) { echo vistro_img_alt_text($list['gallery_image']['url']); } ?>" />
    </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>