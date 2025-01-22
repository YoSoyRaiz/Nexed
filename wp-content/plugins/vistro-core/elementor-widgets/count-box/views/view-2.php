<div class="vst-project-count-1-item">
    <?php if(!empty( $settings['count_number'] )) : ?>
    <h3 class="title" ><span class="odometer" data-count="<?php echo esc_html($settings['count_number']); ?>">0</span><?php echo esc_html($settings['sign']); ?></h3>
    <?php endif; ?>
    <?php if($settings['enable_icon'] === 'yes') : ?>
        <?php if($settings['type'] == 'icon') : ?>
            <?php \Elementor\Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true' ] ); ?>
        <?php else : ?>
            <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="" />
        <?php endif; ?>
    <?php endif; ?>
    <?php if(!empty( $settings['count_title'] )) : ?>
    <span class="h1-heading" ><?php echo elh_element_kses_intermediate( $settings['count_title'] ); ?></span>
    <?php endif; ?>
</div>