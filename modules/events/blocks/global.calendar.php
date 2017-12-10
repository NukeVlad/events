<?php

/**
 * @Project EVENTS 4.X
 * @Author PHAN TAN DUNG (phantandung92@gmail.com)
 * @Copyright (C) 2016 PHAN TAN DUNG. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Sun, 12 Jun 2016 05:02:54 GMT
 */

if (!defined('NV_MAINFILE'))
    die('Stop!!!');

if (!nv_function_exists('nv_events_calendar')) {
    /**
     * nv_events_calendar()
     * 
     * @param mixed $block_config
     * @return
     */
    function nv_events_calendar($block_config)
    {
        global $site_mods, $db, $module_config, $global_config, $lang_global, $module_name, $array_op, $op, $nv_Request, $nv_Cache;

        $module = $block_config['module'];

        $mod_file = $site_mods[$module]['module_file'];
        $mod_data = $site_mods[$module]['module_data'];

        if (file_exists(NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $mod_file . '/block.calendar.tpl')) {
            $block_theme = $global_config['module_theme'];
        } elseif (file_exists(NV_ROOTDIR . '/themes/' . $global_config['site_theme'] . '/modules/' . $mod_file . '/block.calendar.tpl')) {
            $block_theme = $global_config['site_theme'];
        } else {
            $block_theme = 'default';
        }

        include NV_ROOTDIR . '/modules/' . $mod_file . '/language/' . NV_LANG_INTERFACE . '.php';

        $xtpl = new XTemplate('block.calendar.tpl', NV_ROOTDIR . '/themes/' . $block_theme . '/modules/' . $mod_file);
        $xtpl->assign('GLANG', $lang_global);
        $xtpl->assign('LANG', $lang_module);
        $xtpl->assign('NV_BASE_SITEURL', NV_BASE_SITEURL);
        $xtpl->assign('MODULE_FILE', $mod_file);
        
        if ($module != $module_name) {
            if (file_exists(NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/css/' . $mod_file . '.css')) {
                $block_css = $global_config['module_theme'];
            } elseif (file_exists(NV_ROOTDIR . '/themes/' . $global_config['site_theme'] . '/css/' . $mod_file . '.css')) {
                $block_css = $global_config['site_theme'];
            } else {
                $block_css = 'default';
            }
            $xtpl->assign('BLOCK_CSS', $block_css);
            $xtpl->parse('main.css');
            
            if (file_exists(NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/js/' . $mod_file . '.js')) {
                $block_js = $global_config['module_theme'];
            } elseif (file_exists(NV_ROOTDIR . '/themes/' . $global_config['site_theme'] . '/js/' . $mod_file . '.js')) {
                $block_js = $global_config['site_theme'];
            } else {
                $block_js = 'default';
            }
            $xtpl->assign('BLOCK_JS', $block_js);
            $xtpl->parse('main.js');
        }
        
        $today = nv_date('d-m-Y', NV_CURRENTTIME);
        $xtpl->assign('LINK_CURRENT', NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module . '&amp;' . NV_OP_VARIABLE . '=search/being-' . $today);
        $xtpl->assign('LINK_BEFORE', NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module . '&amp;' . NV_OP_VARIABLE . '=search/before-' . $today);
        $xtpl->assign('LINK_AFTER', NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module . '&amp;' . NV_OP_VARIABLE . '=search/after-' . $today);

        $load_event_calendar = $nv_Request->get_int('load_event_calendar', 'post', NV_CURRENTTIME);

        $ajax_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . ($op == 'main' ? '' : ('&' . NV_OP_VARIABLE . '=' . (empty($array_op) ? $op : implode('/', $array_op))));
        $xtpl->assign('AJAX_URL', $ajax_url);

        // Lấy ngày đầu, ngày cuối của tháng
        $current_month = date('n', $load_event_calendar);
        $time_start_month = mktime(0, 0, 0, $current_month, 1, date('Y', $load_event_calendar));
        $time_end_month = mktime(0, 0, 0, $current_month == 12 ? 1 : $current_month + 1, 1, $current_month == 12 ? date('Y', $load_event_calendar) + 1 : date('Y', $load_event_calendar)) - 86400;

        // Lấy ngày bắt đầu, kết thúc lịch
        $start_week = date('N', $time_start_month);
        $end_week = date('N', $time_end_month);
        $time_start_calendar = $start_week == 1 ? $time_start_month : ($time_start_month - 86400 * ($start_week - 1));
        $time_end_calendar = $end_week == 7 ? $time_end_month : ($time_end_month + 86400 * (7 - $end_week));

        $xtpl->assign('MONTH_TEXT', nv_date('m/Y', $time_start_month));
        $xtpl->assign('DATA_NEXT', $time_start_month + (40 * 86400));
        $xtpl->assign('DATA_PREV', $time_start_month - (10 * 86400));

        $sql = 'SELECT id, title, time_start FROM ' . NV_PREFIXLANG . '_' . $mod_data . '_rows WHERE status = 1 AND time_start >=' . $time_start_month . ' AND time_start < ' . ($time_end_month + 86400);
        $list = $nv_Cache->db($sql, '', $module);

        $array[date('j', $row['time_start'])][$row['id']] = $row['title'];        
         }        
         
         for ($i = $time_start_calendar, $j = 1; $i <= $time_end_calendar; $i += 86400) {                     
             $day = array(
                 'title' => date('d', $i),
                 'month_class' => date('n', $i) == $current_month ? 'current-month' : '',                         
                 'has_event' => empty($array[date('j', $i)]) ? '' : 'has-event',
                 'today' => date('d-m-Y', $i) == $today ? 'today' : ''
            );

            if (!empty($day['has_event'])) {
                $day['title'] = '<a href="' . NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module . '&amp;' . NV_OP_VARIABLE . '=search/' . nv_date('d-m-Y', $i) . '">' . $day['title'] . '</a>';
            }

            $xtpl->assign('DAY', $day);
            $xtpl->parse('main.data.week.loop');

            if ($j == 7) {
                $xtpl->parse('main.data.week');
            }

            if ($j++ == 7) {
                $j = 1;
            }
        }

        $xtpl->parse('main.data');

        if ($nv_Request->isset_request('load_event_calendar', 'post')) {
            include NV_ROOTDIR . '/includes/header.php';
            echo $xtpl->text('main.data');
            include NV_ROOTDIR . '/includes/footer.php';
        }

        $xtpl->parse('main');
        return $xtpl->text('main');
    }
}

if (defined('NV_SYSTEM')) {
    global $site_mods;

    $module = $block_config['module'];

    if (isset($site_mods[$module])) {
        $content = nv_events_calendar($block_config);
    }
}
