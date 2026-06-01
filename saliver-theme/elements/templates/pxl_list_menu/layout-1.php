<?php
extract($settings);
?>
<div id="nav" class="pxl-list-menu pxl-list-menu1 pxl-text-img-wrap pxl-parent-transition <?php echo esc_attr($settings['style'].' '.$settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-item--inner">
        <ul class="pxl-item--content">
            <?php foreach ($content_list as $key => $value):
                $link = saliver_render_link_attributes($value['link']);
                ?>
                <li class="list--item pxl-transtion" <?php if(!empty($value['sub_title'])) { ?> data-text="<?php pxl_print_html($value['sub_title']) ?>"<?php } ?> data-target=".item-img-<?php echo esc_attr($key)?>">
                    <div class="pxl-content pxl-transtion">
                        
                        <?php if(!empty($value['desc'])): ?>
                        	<div class="pxl-item--title">
                                <a class="pxl-item--text-link" <?php pxl_print_html($link); ?>></a>
                        		<div class="el-empty pxl-transtion"><?php pxl_print_html($value['desc']) ?></div>
                        	</div>
                        <?php endif; ?>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
        <div class="pxl-item--image">
            <?php foreach ($content_list as $key => $value):  ?>
                <?php if(!empty($value['image']['url'])) : ?>
                    <div class="image--item pxl-spill-middle pxl-ov-hidden item-img-<?php echo esc_attr($key)?>">
                        <div class="image--inner pxl-spill-middle pxl-ov-hidden">
                            <img src="<?php echo esc_url($value['image']['url'])?>" alt="image hover">
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>