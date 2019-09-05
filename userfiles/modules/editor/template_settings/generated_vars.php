<?php
$template_settings_config = mw()->template->get_config();
$template_settings = false;
if (isset($template_settings_config['template_settings'])) {
    $template_settings = $template_settings_config['template_settings'];
}

if ($template_settings) {
    $option_group = 'mw-template-' . mw()->template->folder_name() . '-settings';
    if ($template_settings) {
        foreach ($template_settings as $key => $setting) {
            $$key = get_option($key, $option_group);
//        var_dump($$key);
            if ($$key === false AND $$key !== null) {
                if (isset($setting['default'])) {
                    $$key = $setting['default'];
                } else {
                    $$key = 'no-default-option';
                }
            } elseif ($$key == null) {
                $$key = '';
            }

        }
    }

}

//LESS SETTINGS
$template_less_settings_config = mw()->template->get_config();
$template_less_settings = false;
if (isset($template_less_settings_config['stylesheet_compiler']['settings'])) {
    $template_less_settings = $template_less_settings_config['stylesheet_compiler']['settings'];
}

if ($template_less_settings) {
    $less_option_group = 'mw-template-' . mw()->template->folder_name();
    if ($template_less_settings) {
        foreach ($template_less_settings as $key => $setting) {
            $key = 'less_' . $key;
            $$key = get_option($key, $less_option_group);
//        var_dump($$key);
            if ($$key === false AND $$key !== null) {
                if (isset($setting['default'])) {
                    $$key = $setting['default'];
                } else {
                    $$key = 'no-default-option';
                }
            } elseif ($$key == null) {
                $$key = '';
            }

        }
    }
}
