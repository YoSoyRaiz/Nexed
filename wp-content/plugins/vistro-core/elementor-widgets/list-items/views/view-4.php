<?php if(!empty( $settings['list_items'] )) : ?>
<div class="vst-success-1-feature-list feature-list-2 wow fadeInUp tx-listItems" data-wow-duration="2s">
<?php foreach($settings['list_items'] as $list) :
        if($list['enable_icon'] == 'yes') {
            $class = 'has-icon';
        } else {
            $icon = '';
        }
    ?>
    <h5 class="name">
        <?php if($list['enable_icon'] === 'yes') : ?>
        <span class="tx-icon">
            <?php if($list['type'] == 'icon') : ?>
                <?php \Elementor\Icons_Manager::render_icon( $list['info_icon'], [ 'aria-hidden' => 'true' ] ); ?>
            <?php else : ?>
                <img src="<?php echo esc_url($list['info_image']['url']); ?>" alt="" />
            <?php endif; ?>
        </span>
        <?php endif; ?>
        <?php echo elh_element_kses_intermediate($list['info_text']); ?>
    </h5>
    <?php endforeach; ?>
</div>
<?php endif; ?>