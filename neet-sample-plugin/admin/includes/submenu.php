<?php
function neet_sub_options_page_html() {
    // 権限を確認
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }
    ?>
    <div class="wrap">
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
        <form action="options.php" method="post">
            <?php
            // 登録された設定 "neet_options "のセキュリティフィールドを出力する
            settings_fields( 'neet_options' );
            // 出力設定部とそのフィールド
            // (セクションは "neet "に登録されており、各フィールドは特定のセクションに登録されています。)
            do_settings_sections( 'neet' );
            // 出力保存設定ボタン
            submit_button( __( 'Save Settings', 'textdomain' ) );
            ?>
        </form>
    </div>
    <?php
}
?>