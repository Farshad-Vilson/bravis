<?php if(!function_exists('saliver_configs')){
    function saliver_configs($value){

        $configs = [
            'theme_colors' => [
                'primary'   => [
                    'title' => esc_html__('Primary', 'saliver'), 
                    'value' => saliver()->get_opt('primary_color', '#9FE870')
                ],
                'gradient-first'   => [
                    'title' => esc_html__('Gradient First', 'saliver'), 
                    'value' => saliver()->get_opt('gradient_first_color', '#fff')
                ],
                'secondary'   => [
                    'title' => esc_html__('Secondary', 'saliver'), 
                    'value' => saliver()->get_opt('secondary_color', '#C2DCD0')
                ],
                'third'   => [
                    'title' => esc_html__('Third', 'saliver'), 
                    'value' => saliver()->get_opt('third_color', '#DAEEE5')
                ],
                'fourth'   => [
                    'title' => esc_html__('Fourth', 'saliver'), 
                    'value' => saliver()->get_opt('fourth_color', '#dedede')
                ],
                'dark'   => [
                    'title' => esc_html__('Dark', 'saliver'), 
                    'value' => saliver()->get_opt('dark_color', '#000')
                ],
                // 'white'   => [
                //     'title' => esc_html__('White', 'saliver'), 
                //     'value' => saliver()->get_page_opt('white_color', '#fff')
                // ],
            ],
            'link' => [
                'color' => saliver()->get_opt('link_color', ['regular' => '#6000ff'])['regular'],
                'color-hover'   => saliver()->get_opt('link_color', ['hover' => '#fe0054'])['hover'],
                'color-active'  => saliver()->get_opt('link_color', ['active' => '#fe0054'])['active'],
            ],
            'gradient' => [
                'color-from' => saliver()->get_opt('gradient_color', ['from' => '#EFF6F4'])['from'],
                'color-to' => saliver()->get_opt('gradient_color', ['to' => '#FFF'])['to'],
            ],
            'gradient2' => [
                'color-from' => saliver()->get_opt('gradient_color2', ['from' => '#8c92f6'])['from'],
                'color-to' => saliver()->get_opt('gradient_color2', ['to' => '#f9d78f'])['to'],
            ],
               
        ];
        return $configs[$value];
    }
}
if(!function_exists('saliver_inline_styles')) {
    function saliver_inline_styles() {  
        
        $theme_colors      = saliver_configs('theme_colors');
        $link_color        = saliver_configs('link');
        $gradient_color    = saliver_configs('gradient');
        $gradient_color2   = saliver_configs('gradient2');

        ob_start();
        echo ':root{';
            
            foreach ($theme_colors as $color => $value) {
                printf('--%1$s-color: %2$s;', str_replace('#', '',$color),  $value['value']);
            }
            foreach ($theme_colors as $color => $value) {
                printf('--%1$s-color-rgb: %2$s;', str_replace('#', '',$color),  saliver_hex_rgb($value['value']));
            }
            foreach ($link_color as $color => $value) {
                printf('--link-%1$s: %2$s;', $color, $value);
            }
            foreach ($gradient_color as $color => $value) {
                printf('--gradient-%1$s: %2$s;', $color, $value);
            }
            foreach ($gradient_color2 as $color => $value) {
                printf('--gradient-%1$s2: %2$s;', $color, $value);
            }

        echo '}';

        return ob_get_clean();
         
    }
}
 