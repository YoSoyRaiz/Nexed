<?php
    $rand = rand(1000, 9999);
?>
<div class="accordion vst-faq-3-item-wrap wow fadeInUp" id="accordionExample_<?php echo esc_attr($rand) ?>">
    <?php
        foreach ($settings['faq_lists'] as $id => $list) :
        $show = ($id == 0) ? 'collapse show' : 'collapse';
        $aria_expanded = ($id == 0) ? 'true' : 'false';
        $collapsed = ($id == 0) ? 'collapsed' : '';
        $active_class = ($id == 0) ? 'faq_bg' : '';
    ?>
    <div class="accordion-item <?php echo esc_attr($active_class) ?>">
        <h2 class="accordion-header" id="heading-<?php echo esc_attr($id.$rand) ?>">
            <button class="accordion-button <?php echo esc_attr($collapsed) ?>" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo esc_attr($id.$rand) ?>" aria-expanded="<?php echo esc_attr($aria_expanded); ?>" aria-controls="collapse-<?php echo esc_attr($id.$rand) ?>">
                <span class="icon" ><i class="far fa-plus"></i></span>
                <span class="text h1-heading"><?php echo elh_element_kses_intermediate($list['title']); ?></span>
            </button>
        </h2>
        <div id="collapse-<?php echo esc_attr($id.$rand) ?>" class="accordion-collapse <?php echo esc_attr($show); ?>" aria-labelledby="heading-<?php echo esc_attr($id.$rand) ?>" data-bs-parent="#accordionExample_<?php echo esc_attr($rand) ?>">
            <div class="accordion-body ">
                <div class="faq-text">
                    <?php echo elh_element_kses_intermediate($list['content']); ?>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>