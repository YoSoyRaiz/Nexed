<div class="vst-happy-client-1-area">
    <div class="container h1-container">
        <div class="swiper vst-happpy-client-1-slider">
            <div class="swiper-container happy_client_1_active">
                <div class="swiper-wrapper">
                    <?php foreach ( $settings['brands_image'] as $key => $brand ) :
                        if (!empty($brand['url'])) {
                            $brand_image = $brand['url'];
                        }
                    ?>
                    <div class="swiper-slide">
                        <div class="vst-happy-client-1-slider-item">
                            <img src="<?php echo $brand_image ? esc_url($brand_image) : ''; ?>" alt="">
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>