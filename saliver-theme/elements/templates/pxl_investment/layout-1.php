<div class="pxl-nvestment pxl-nvestment1 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <?php
    $roi = !empty($settings['roi']) ? floatval($settings['roi']) : 3.5;
    ?>
  <div class="calculator">
    <div class="pxl-amount">
        <span class="amout"><?php echo esc_html__('amount', 'saliver'); ?></span>
        <div class="pxl-qst">
            <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.3" d="M13.7812 7.75C13.7812 11.4961 10.7188 14.5312 7 14.5312C3.25391 14.5312 0.21875 11.4961 0.21875 7.75C0.21875 4.03125 3.25391 0.96875 7 0.96875C10.7188 0.96875 13.7812 4.03125 13.7812 7.75ZM7.16406 3.21094C5.6875 3.21094 4.73047 3.83984 3.99219 4.96094C3.88281 5.125 3.91016 5.31641 4.04688 5.42578L5.00391 6.13672C5.14062 6.24609 5.35938 6.21875 5.46875 6.08203C5.96094 5.45312 6.28906 5.09766 7.02734 5.09766C7.57422 5.09766 8.28516 5.45312 8.28516 6C8.28516 6.41016 7.92969 6.62891 7.38281 6.92969C6.75391 7.28516 5.90625 7.72266 5.90625 8.84375V8.95312C5.90625 9.14453 6.04297 9.28125 6.23438 9.28125H7.76562C7.92969 9.28125 8.09375 9.14453 8.09375 8.95312V8.92578C8.09375 8.16016 10.3633 8.13281 10.3633 6C10.3633 4.41406 8.72266 3.21094 7.16406 3.21094ZM7 9.99219C6.28906 9.99219 5.74219 10.5664 5.74219 11.25C5.74219 11.9609 6.28906 12.5078 7 12.5078C7.68359 12.5078 8.25781 11.9609 8.25781 11.25C8.25781 10.5664 7.68359 9.99219 7 9.99219Z" fill="black"/>
            </svg>
            <div class="pxl-tooltip">
                <?php echo esc_html__('The profit earned from your investment last month, as a percentage of the initial amount.', 'saliver'); ?>
            </div>
        </div>
    </div>
    <div class="amount-block1">
        <span style="position: absolute; top: 49%; left: 10px; transform: translateY(-50%);color: var(--Black, $dark_color);
  font-size: 14px;
  font-style: normal;
  font-weight: 600;
  line-height: 1;">$</span>
        <input type="number" id="amount" value="100" /> <span class="usd-label">USD</span>
    </div>

    <div class="info-text"><?php echo pxl_print_html($settings['title']); ?></div>

    <div class="calc-icon" onclick="calculateReturn()">
        <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34" fill="black">
            <g opacity="0.3" clip-path="url(#clip0_370_724)">
                <path d="M2.72394 14.8271C2.9009 14.8979 3.10613 14.8979 3.28308 14.813L8.81063 12.3005C9.16449 12.1306 9.31312 11.706 9.14325 11.3521C8.98049 11.0124 8.57708 10.8567 8.23026 11.0124L4.35884 12.7747C6.20607 7.24714 11.3514 3.55268 17.2753 3.55268C23.4823 3.55268 28.9107 7.70012 30.4748 13.6381C30.5739 14.0132 30.9632 14.2397 31.3383 14.1406C31.7133 14.0415 31.9399 13.6523 31.8407 13.2772C30.1138 6.72343 24.1262 2.13721 17.2752 2.13721C10.7427 2.13721 5.05945 6.21385 3.007 12.3147L1.37919 8.24513C1.2589 7.87708 0.85548 7.67186 0.487428 7.79215C0.119376 7.91245 -0.0858494 8.31586 0.0344459 8.68392C0.0415456 8.71225 0.0556784 8.74051 0.0698113 8.76885L2.32756 14.4308C2.39835 14.6078 2.53988 14.7564 2.72394 14.8271Z" />
                <path d="M33.957 25.2737C33.9499 25.2596 33.9429 25.2454 33.9429 25.2313L31.6851 19.5693C31.6143 19.3923 31.4728 19.2437 31.2888 19.173C31.1118 19.1022 30.9066 19.1093 30.7296 19.1871L25.2021 21.6996C24.8411 21.8483 24.6713 22.2658 24.8199 22.6268C24.9685 22.9877 25.3861 23.1576 25.747 23.009C25.7612 23.0019 25.7754 22.9948 25.7895 22.9877L29.6609 21.2254C27.7996 26.753 22.6471 30.4474 16.7303 30.4474C10.5233 30.4474 5.09492 26.3 3.53081 20.362C3.43175 19.9869 3.04247 19.7604 2.66738 19.8595C2.29229 19.9586 2.06577 20.3479 2.1649 20.7229C3.88473 27.2838 9.8794 31.8629 16.7304 31.8629C23.2629 31.8629 28.9391 27.7863 30.9986 21.6854L32.6264 25.755C32.7609 26.123 33.1644 26.3141 33.5323 26.1796C33.9003 26.0452 34.0914 25.6418 33.957 25.2737Z" />
            </g>
            <defs>
                <clipPath id="clip0_370_724">
                <rect width="34" height="34" fill="white"/>
                </clipPath>
            </defs>
        </svg>
    </div>
    <span class="amout"><?php echo esc_html__('how much you will get?', 'saliver'); ?></span>
    <div class="amount-block result" id="result">
        $130.89
        <span class="usd-label">USD</span>
    </div>
    </div>
    <script>
        const investmentROI = <?php echo wp_json_encode( $roi ); ?>;
        console.log('ROI:', investmentROI);
        function calculateReturn() {
            const inputAmount = parseFloat(document.getElementById('amount').value);
            const roi = investmentROI / 100;
            const months = 8;
            const total = inputAmount * Math.pow((1 + roi), months);
            document.getElementById('result').innerHTML = `$${total.toFixed(2)} <span class="usd-label">USD</span>`;
        }
    </script>

</div>
