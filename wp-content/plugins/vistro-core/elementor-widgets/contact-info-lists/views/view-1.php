<div class="vst-footer-1-contact">
    <?php if( $settings['enable_icon'] == 'yes' ) : ?>
    <div class="icon">
        <?php \Elementor\Icons_Manager::render_icon( $settings['info_icon'], [ 'aria-hidden' => 'true' ] ); ?>
    </div>
    <?php endif; ?>
    <div class="content">
        <span class="text"><?php echo elh_element_kses_intermediate($settings['info_label']); ?></span>
        <?php echo elh_element_kses_intermediate($settings['info_text']); ?>
    </div>
</div>