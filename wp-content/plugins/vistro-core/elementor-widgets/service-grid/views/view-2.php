<?php
$img_size = $settings['image_size'];

if($img_size === 'big') {
    $img_size = 'big-img';
} elseif($img_size === 'mid') {
    $img_size = 'md-img';
} elseif($img_size === 'sm') {
    $img_size = 'sm-img';
} else {
    $img_size = '';
}

?>

<div class="vst-project-2-item-single <?php echo $settings['anim_name'] ? esc_attr($settings['anim_name']) : ''; ?>"
data-wow-delay="<?php echo $settings['anim_delay'] ? esc_attr($settings['anim_delay']) : ''; ?>"
data-wow-duration="<?php echo $settings['anim_duration'] ? esc_attr($settings['anim_duration']) : ''; ?>">
    <?php if(!empty( $settings['service_image']['url'] )) : ?>
    <div class="main-img w-100 <?php echo esc_attr($img_size); ?>">
        <img src="<?php echo esc_url($settings['service_image']['url']); ?>" alt="">
    </div>
    <?php endif; ?>
    <div class="content-wrap">
        <?php if($settings['enable_icon'] === 'yes') : ?>
        <a href="<?php echo $settings['button_link']['url'] ? esc_url( $settings['button_link']['url'] ) : '';  ?>" class="icon">
            <?php if($settings['type'] == 'icon') : ?>
                <?php \Elementor\Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true' ] ); ?>
            <?php else : ?>
                <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="" />
            <?php endif; ?>
        <?php endif; ?>

        <?php if(!empty( $settings['title'] )) : ?>
        <a class="title"
        href="<?php echo $settings['button_link']['url'] ? esc_url( $settings['button_link']['url'] ) : '';  ?>"
        target="<?php echo $settings['button_link']['is_external'] ? '_blank' : '_self'; ?>"
        rel="<?php echo $settings['button_link']['nofollow'] ? 'nofollow' : ''; ?>"
        >
        <?php echo elh_element_kses_intermediate( $settings['title'] ); ?></a>
        <?php endif; ?>

        <?php if(!empty( $settings['description'] )) : ?>
        <h6 class="h1-heading"><?php echo elh_element_kses_intermediate( $settings['description'] ); ?></h6>
        <?php endif; ?>
    </div>
</div>