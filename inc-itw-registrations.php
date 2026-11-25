<?php
/**
 * Masjid India IT Wing - volunteer registrations.
 * Saved in this site's own WordPress database (table: <prefix>itw_registrations).
 * Viewed in wp-admin > "IT Wing Registrations" (admins only). CSV download included.
 * One identical file is used on godalone.in and kadavulmattum.org.
 */
if (!defined('ABSPATH')) return;

function itw_reg_table() {
    global $wpdb;
    return $wpdb->prefix . 'itw_registrations';
}

/* ---- create the table once ---- */
add_action('init', function () {
    if (get_option('itw_reg_table_v') === '1') return;
    global $wpdb;
    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    $t = itw_reg_table();
    $c = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE " . $t . " (
      id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
      created_at datetime NOT NULL,
      name varchar(190) NOT NULL DEFAULT '',
      father_name varchar(190) NOT NULL DEFAULT '',
      dob varchar(20) NOT NULL DEFAULT '',
      mobile varchar(40) NOT NULL DEFAULT '',
      email varchar(190) NOT NULL DEFAULT '',
      address text NOT NULL,
      status varchar(40) NOT NULL DEFAULT '',
      studying varchar(190) NOT NULL DEFAULT '',
      profession varchar(190) NOT NULL DEFAULT '',
      language varchar(8) NOT NULL DEFAULT '',
      ip varchar(64) NOT NULL DEFAULT '',
      PRIMARY KEY  (id)
    ) " . $c . ";";
    dbDelta($sql);
    update_option('itw_reg_table_v', '1');
}, 5);

/* ---- receive the form ---- */
function itw_register_handler() {
    $get = function ($k, $max = 190) {
        if (!isset($_POST[$k])) return '';
        return mb_substr(trim(sanitize_text_field(wp_unslash($_POST[$k]))), 0, $max);
    };

    // spam trap: bots fill the hidden "website" box
    if (!empty($_POST['website'])) wp_send_json_success();

    // simple limit: 6 per hour per visitor address
    $ip  = isset($_SERVER['REMOTE_ADDR']) ? substr((string) $_SERVER['REMOTE_ADDR'], 0, 64) : '';
    $key = 'itw_rl_' . md5($ip);
    $n   = (int) get_transient($key);
    if ($n >= 6) wp_send_json_error(array('m' => 'limit'), 429);

    $name   = $get('name');
    $father = $get('father_name');
    $dob    = $get('dob', 20);
    $mobile = $get('mobile', 40);
    $email  = $get('email');
    $status = $get('status', 40);
    $study  = $get('studying');
    $prof   = $get('profession');
    $lang   = $get('language', 8);
    $addr   = isset($_POST['address']) ? mb_substr(trim(sanitize_textarea_field(wp_unslash($_POST['address']))), 0, 500) : '';

    $digits = preg_replace('/\D+/', '', $mobile);
    if (mb_strlen($name) < 3 || mb_strlen($father) < 3
        || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $dob)
        || strlen($digits) < 8 || strlen($digits) > 15
        || !is_email($email)
        || mb_strlen($addr) < 9
        || $status === '') {
        wp_send_json_error(array('m' => 'invalid'), 400);
    }

    global $wpdb;
    $ok = $wpdb->insert(itw_reg_table(), array(
        'created_at' => current_time('mysql'),
        'name'       => $name,
        'father_name'=> $father,
        'dob'        => $dob,
        'mobile'     => $mobile,
        'email'      => $email,
        'address'    => $addr,
        'status'     => $status,
        'studying'   => $study,
        'profession' => $prof,
        'language'   => $lang,
        'ip'         => $ip,
    ), array('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s'));

    if (!$ok) wp_send_json_error(array('m' => 'save'), 500);

    set_transient($key, $n + 1, HOUR_IN_SECONDS);

    // short notice to the site admin (no personal details in the email)
    @wp_mail(get_option('admin_email'),
        'New IT Wing registration #' . (int) $wpdb->insert_id,
        "A new volunteer registration was received.\nOpen WordPress admin > IT Wing Registrations to see it.");

    wp_send_json_success();
}
add_action('wp_ajax_nopriv_itw_register', 'itw_register_handler');
add_action('wp_ajax_itw_register', 'itw_register_handler');

/* ---- admin menu ---- */
add_action('admin_menu', function () {
    add_menu_page('IT Wing Registrations', 'IT Wing Registrations', 'manage_options',
        'itw-registrations', 'itw_reg_admin_page', 'dashicons-groups', 58);
});

/* ---- CSV download + delete (admins only, with security check) ---- */
add_action('admin_init', function () {
    if (!isset($_GET['page']) || $_GET['page'] !== 'itw-registrations') return;
    if (!current_user_can('manage_options')) return;
    global $wpdb;
    $t = itw_reg_table();

    if (isset($_GET['itw_del'], $_GET['_wpnonce']) && wp_verify_nonce($_GET['_wpnonce'], 'itw_del_' . (int) $_GET['itw_del'])) {
        $wpdb->delete($t, array('id' => (int) $_GET['itw_del']), array('%d'));
        wp_safe_redirect(admin_url('admin.php?page=itw-registrations&deleted=1'));
        exit;
    }

    if (isset($_GET['itw_csv'], $_GET['_wpnonce']) && wp_verify_nonce($_GET['_wpnonce'], 'itw_csv')) {
        $rows = $wpdb->get_results("SELECT * FROM " . $t . " ORDER BY id DESC", ARRAY_A);
        $cols = array('id','created_at','name','father_name','dob','mobile','email','address','status','studying','profession','language');
        nocache_headers();
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=it-wing-registrations-' . gmdate('Y-m-d') . '.csv');
        $out = fopen('php://output', 'w');
        fwrite($out, "\xEF\xBB\xBF");
        fputcsv($out, $cols);
        foreach ((array) $rows as $r) {
            $line = array();
            foreach ($cols as $c) {
                $v = (string) $r[$c];
                if ($v !== '' && strpos('=+-@', $v[0]) !== false) $v = "'" . $v; // keep Excel safe
                $line[] = $v;
            }
            fputcsv($out, $line);
        }
        fclose($out);
        exit;
    }
});

function itw_reg_admin_page() {
    if (!current_user_can('manage_options')) return;
    global $wpdb;
    $t     = itw_reg_table();
    $total = (int) $wpdb->get_var("SELECT COUNT(*) FROM " . $t);
    $rows  = $wpdb->get_results("SELECT * FROM " . $t . " ORDER BY id DESC LIMIT 500");
    $csv   = wp_nonce_url(admin_url('admin.php?page=itw-registrations&itw_csv=1'), 'itw_csv');

    echo '<div class="wrap"><h1>IT Wing Registrations</h1>';
    if (isset($_GET['deleted'])) echo '<div class="notice notice-success is-dismissible"><p>Deleted.</p></div>';
    echo '<p>Total: <strong>' . $total . '</strong> &nbsp; <a class="button button-primary" href="' . esc_url($csv) . '">Download CSV (opens in Excel)</a></p>';
    echo '<table class="widefat striped"><thead><tr>';
    foreach (array('#','Date','Name','Father name','Date of birth','Mobile','Email','Address','Status','Studying','Profession','Language','') as $h) {
        echo '<th>' . esc_html($h) . '</th>';
    }
    echo '</tr></thead><tbody>';
    if (!$rows) echo '<tr><td colspan="13">No registrations yet.</td></tr>';
    foreach ((array) $rows as $r) {
        $id  = (int) $r->id;
        $del = wp_nonce_url(admin_url('admin.php?page=itw-registrations&itw_del=' . $id), 'itw_del_' . $id);
        echo '<tr><td>' . $id . '</td><td>' . esc_html($r->created_at) . '</td><td>' . esc_html($r->name) . '</td><td>' . esc_html($r->father_name)
           . '</td><td>' . esc_html($r->dob) . '</td><td>' . esc_html($r->mobile) . '</td><td>' . esc_html($r->email)
           . '</td><td>' . esc_html($r->address) . '</td><td>' . esc_html($r->status) . '</td><td>' . esc_html($r->studying)
           . '</td><td>' . esc_html($r->profession) . '</td><td>' . esc_html($r->language)
           . '</td><td><a href="' . esc_url($del) . '" onclick="return confirm(\'Delete this registration?\')">Delete</a></td></tr>';
    }
    echo '</tbody></table></div>';
}
