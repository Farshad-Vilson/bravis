<?php
$accordion = $widget->get_settings('lists');
$wg_id = pxl_get_element_id($settings);
$is_new = \Elementor\Icons_Manager::is_migration_allowed();
$link = saliver_render_link_attributes($settings['item_link']);
$link1 = saliver_render_link_attributes($settings['item_link1']);
$link2 = saliver_render_link_attributes($settings['item_link2']);
if(!empty($accordion)) : ?>
    <div class="pxl-price-plan pxl-price-plan1 wow skewIn <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
        <div class="pxl-plan-table">
            <div class="pxl-plan-col pxl-plan">
                <div class="pxl-item-plan">
                    <?php echo esc_html__('Plan', 'saliver'); ?>
                </div>
                <?php foreach ($accordion as $value): ?>
                    <?php if (!empty($value['plan'])): ?>
                        <div class="pxl-plan--text"><?php echo wp_kses_post($value['plan']); ?></div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>

            <div class="pxl-plan-col pxl-plan-free">
                <div class="pxl-item-plan free">
                    <?php echo esc_html__('Free plan', 'saliver'); ?>
                </div>
                <?php foreach ($accordion as $key => $value): ?>
                    <?php if (isset($value['type']) && $value['type'] === 'text' && !empty($value['free_plan'])): ?>
                        <div class="pxl-plan--text"><?php echo wp_kses_post($value['free_plan']); ?></div>
                    <?php elseif ($value['type'] === 'icon' && !empty($value['pxl_icon_free'])): ?>
                        <div class="pxl-plan-free-icon">
                            <?php if ($is_new):
                                \Elementor\Icons_Manager::render_icon($value['pxl_icon_free'], ['aria-hidden' => 'true']);
                            else: ?>
                                <i class="<?php echo esc_attr($value['pxl_icon_free']); ?>" aria-hidden="true"></i>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
                <div class="pxl-item-btn">
                    <a <?php pxl_print_html($link); ?>>
                        <?php echo pxl_print_html($settings['btn_plan_free']); ?>
                        <i aria-hidden="true" class="fal fa-long-arrow-right"></i>
                    </a>
                </div>
            </div>

            <div class="pxl-plan-col pxl-plan-pro">
                <div class="pxl-item-plan pro">
                    <?php echo esc_html__('Pro plan', 'saliver'); ?>
                    <div class="pxl-sale">
                        <?php echo pxl_print_html($settings['plan_pro']); ?>
                    </div>
                </div>
                <?php foreach ($accordion as $key => $value): ?>
                    <?php if (isset($value['type']) && $value['type'] === 'text' && !empty($value['pro_plan'])): ?>
                        <div class="pxl-plan--text"><?php echo wp_kses_post($value['pro_plan']); ?></div>
                    <?php elseif ($value['type'] === 'icon' && !empty($value['pxl_icon_pro'])): ?>
                        <div class="pxl-plan-pro-icon">
                            <?php if ($is_new):
                                \Elementor\Icons_Manager::render_icon($value['pxl_icon_pro'], ['aria-hidden' => 'true']);
                            else: ?>
                                <i class="<?php echo esc_attr($value['pxl_icon_pro']); ?>" aria-hidden="true"></i>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
                <div class="pxl-item-btn">
                    <a <?php pxl_print_html($link1); ?>>
                        <?php echo pxl_print_html($settings['btn_plan_pro']); ?>
                        <i aria-hidden="true" class="fal fa-long-arrow-right"></i>
                    </a>
                </div>
            </div>

            <div class="pxl-plan-col pxl-plan-enterprise">
                <div class="pxl-item-plan enterprise">
                    <?php echo esc_html__('Enterprise', 'saliver'); ?>
                </div>
                <?php foreach ($accordion as $key => $value): ?>
                    <?php if (isset($value['type']) && $value['type'] === 'text' && !empty($value['enterprise'])): ?>
                        <div class="pxl-plan--text"><?php echo wp_kses_post($value['enterprise']); ?></div>
                    <?php elseif ($value['type'] === 'icon' && !empty($value['pxl_icon_enterprise'])): ?>
                        <div class="pxl-plan-enterprise-icon">
                            <?php if ($is_new):
                                \Elementor\Icons_Manager::render_icon($value['pxl_icon_enterprise'], ['aria-hidden' => 'true']);
                            else: ?>
                                <i class="<?php echo esc_attr($value['pxl_icon_enterprise']); ?>" aria-hidden="true"></i>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
                <div class="pxl-item-btn">
                    <a <?php pxl_print_html($link2); ?>>
                        <?php echo pxl_print_html($settings['btn_plan_enterprise']); ?>
                        <i aria-hidden="true" class="fal fa-long-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>