<div class="vst-success-1-progress">
    <div class="title-wrap">
        <span class="name"><?php echo elh_element_kses_intermediate($settings['progress_title']); ?></span>
        <span class="parcent"><?php echo $settings['progress_value']['size'] ? esc_attr($settings['progress_value']['size']) : ''; ?>%</span>
    </div>
    <div class="progress-wrap">
        <span class="s-progress wow slideInLeft" data-wow-duration="1s"></span>
    </div>
</div>