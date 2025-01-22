<?php if(!empty( $settings['list_items'] )) : ?>
<ul class="vst-footer-1-menu tx-listItems list-unstyled m-0">
    <?php foreach($settings['list_items'] as $list) :
        if($list['enable_icon'] == 'yes') {
            $class = 'has-icon';
        } else {
            $icon = '';
        }
    ?>
    <li class="<?php echo esc_attr($class); ?>">
        <a href="<?php echo esc_url($list['link']['url']); ?>"
        target="<?php echo $list['link']['is_external'] ? '_blank' : '_self'; ?>"
        rel="<?php echo $list['link']['nofollow'] ? 'nofollow' : ''; ?>"
        >
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
        </a>
    </li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>


<div class="vst-testimonial-1-item-wrap h1-animation">
    <?php if(!empty( $settings['service_img']['url'] )) : ?>
    <img src="<?php echo esc_url($settings['service_img']['url']); ?>" alt="" class="bg-shape-1">
    <?php endif; ?>

    <?php foreach($settings['service_lists'] as $list) :  ?>
    <div class="vst-testimonial-1-item-single h1_t_tabs">

        <?php if(!empty( $list['count'] )) : ?>
        <span class="no"><?php echo elh_element_kses_intermediate($list['count']); ?></span>
        <?php endif; ?>

        <?php if(!empty( $list['title'] )) : ?>
        <h5 class="h1-heading name"><?php echo elh_element_kses_intermediate($list['title']); ?></h5>
        <?php endif; ?>

        <?php if(!empty( $list['info_text'] )) : ?>
        <p class="pera"><?php echo elh_element_kses_intermediate($list['info_text']); ?></p>
        <?php endif; ?>
    </div>
    <?php endforeach; ?>
</div>