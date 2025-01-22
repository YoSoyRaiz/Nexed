<?php if(!empty( $settings['list_items'] )) : ?>
<ul class="vst-success-3-feature list-unstyled tx-listItems">
    <?php foreach($settings['list_items'] as $list) : ?>
    <li class="reveal-type">
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
    </li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>