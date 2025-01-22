<?php

    $light_mode = 'black';

    if($settings['enable_light_mode'] === 'yes') {
        $light_mode = '';
    }

    $desc_border = '';
    $desc_border_wrap = '';

    if($settings['enable_description_left_border'] === 'yes') {
        $desc_border = 'serving-1-pera';
        $desc_border_wrap = 'vst-serving-1-content-wrap';
    }

    $title_anim_name = $settings['title_anim_name'] ? $settings['title_anim_name'] : '';
    $title_anim_duration = $settings['title_anim_duration'] ? $settings['title_anim_duration'] : '';

    $this->add_render_attribute( 'title', 'class', 'tx-title section-title-1 reveal-type '.esc_attr($light_mode).'' );
    $this->add_render_attribute( 'title', 'class', 'wow '.esc_attr($settings['title_anim_name']).'' );
    $this->add_render_attribute( 'title', 'data-wow-duration', esc_attr($settings['title_anim_duration']) );
?>
<div class="vst-section-title-1 tx-sectionHeading <?php echo esc_attr($desc_border_wrap); ?>">
    <?php if($settings['enable_sub_title'] === 'yes') : ?>
    <h6 class="vst-subtitle-1 tx-subTitle wow <?php echo $settings['sub_anim_name'] ? esc_attr($settings['sub_anim_name']) : ''; ?>" data-wow-duration="<?php echo $settings['sub_anim_duration'] ? esc_attr($settings['sub_anim_duration']) : ''; ?>">
        <?php echo elh_element_kses_intermediate($settings['sub_title']); ?>
    </h6>
    <?php endif; ?>
    <?php
        if($settings['enable_title'] === 'yes') {
            printf('<%1$s %2$s>%3$s</%1$s>',
                tag_escape($settings['title_tag']),
                $this->get_render_attribute_string('title'),
                $title
            );
        }
    ?>
    <?php if($settings['enable_description'] === 'yes') : ?>
    <p class="tx-description vst-pera-2 choose-1-pera <?php echo esc_attr($desc_border); ?> wow <?php echo $settings['desc_anim_name'] ? esc_attr($settings['desc_anim_name']) : ''; ?>" data-wow-duration="<?php echo $settings['desc_anim_duration'] ? esc_attr($settings['desc_anim_duration']) : ''; ?>">
        <?php echo elh_element_kses_intermediate($settings['description']); ?>
    </p>
    <?php endif; ?>
</div>