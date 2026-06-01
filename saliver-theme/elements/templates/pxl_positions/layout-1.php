
<div class="pxl-positions pxl-positions1 <?php echo esc_attr($settings['style'].' '.$settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-item-title">
        <div class="pxl-title-top">
            <?php if(!empty($settings['address'])) : ?>
                <div class="pxl--address">
                    <?php echo pxl_print_html($settings['address'])?>
                </div>
            <?php endif; ?>
            <?php if(!empty($settings['wage'])) : ?>
                <div class="pxl--wage">
                    <?php echo pxl_print_html($settings['wage'])?>
                </div>
            <?php endif; ?>
        </div>
        <?php if(!empty($settings['title'])) : ?>
            <h4 class="pxl--title">
                <?php echo pxl_print_html($settings['title'])?>
            </h4>
        <?php endif; ?>
    </div>
    <div class="pxl-list-item">
        <?php foreach ($settings['lists'] as $key => $value): ?>
            <div class="pxl--item">
                <?php if(!empty($value['content'])) : ?>
                    <div class="pxl-item--content">
                        <label class="pxl-empty"><?php echo esc_html($value['label']); ?></label>
                        <?php echo pxl_print_html($value['content'])?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
    <?php if(!empty($settings['btn_title'])) : ?>
        <?php $link = saliver_render_link_attributes($settings['item_link']);?>
        <a class="pxl-item--btn" <?php pxl_print_html($link); ?>> 
            <?php echo pxl_print_html($settings['btn_title'])?>
        </a>
    <?php endif; ?>
</div>