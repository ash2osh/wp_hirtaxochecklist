<?php
add_action('admin_menu', 'htc_add_admin_menu');
add_action('admin_init', 'htc_settings_init');

function htc_add_admin_menu() {

 add_submenu_page('tools.php', 'hirtaxochecklist', 'hierarchical taxonomies checklist', 'manage_options', 'hirtaxochecklist', 'htc_options_page');
}
function htc_settings_init() {

    register_setting('htcPage', 'htc_settings');

    add_settings_section(
            'htc_htcPage_section', __('', 'hirtaxochecklist'), 'htc_settings_section_callback', 'htcPage'
    );

    add_settings_field(
            'htc_select_field_0', __('Please select taxomonies', 'hirtaxochecklist'), 'htc_select_field_0_render', 'htcPage', 'htc_htcPage_section'
    );
}

function htc_select_field_0_render() {
    $args = array(
        'public' => true,
        'hierarchical' => 1
            // '_builtin' => false
    );
    $output = 'names'; // 'names' or 'objects'
    $operator = 'and'; // 'and' or 'or'
    $taxonomies = get_taxonomies($args, $output, $operator);
    $options = get_option('htc_settings');
    ?>
    <select name='htc_settings[htc_select_field_0][]' multiple="multiple">
        <?php
        if ($taxonomies) {
            foreach ($taxonomies as $taxonomy) {
                ?>
        <option value='<?php echo $taxonomy ?>' <?php if(isset($options['htc_select_field_0'])) echo in_array($taxonomy, $options['htc_select_field_0']) ? 'selected' : ''; ?> ><?php echo $taxonomy ?></option>
            <?php }} ?>
    </select>
    <?php
}

function htc_settings_section_callback() {

    echo __('hold Ctrl buttun for multiple selection', 'hirtaxochecklist');
}

function htc_options_page() {
    ?>
    <form action='options.php' method='post'>

        <h2> hierarchical taxomonies checklist checking</h2>

        <?php
        settings_fields('htcPage');
        do_settings_sections('htcPage');
        submit_button();
        ?>

    </form>
    <?php
}
?>