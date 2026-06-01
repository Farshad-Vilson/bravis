<?php
$html_id = pxl_get_element_id($settings);
?>
<div class="pxl-text-scroll pxl-text-scroll2">
    <div class="pxl-meta-inner">
        <?php if(isset($settings['lists']) && !empty($settings['lists']) && count($settings['lists'])): ?>
            <div class="pxl-item-right">
                <div class="pxl-list">
                    <?php foreach ($settings['lists'] as $key => $value): ?>
                        <div class="pxl-item">
                            <h5 class="pxl-item-desc">
                                <?php echo pxl_print_html($value['desc'])?>
                            </h5>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="barContainer">
                    <div class="bar"></div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>