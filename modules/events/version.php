<?php

/**
 * @Project EVENTS 4.X
 * @Author PHAN TAN DUNG (phantandung92@gmail.com)
 * @Copyright (C) 2016 PHAN TAN DUNG. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Sun, 12 Jun 2016 05:02:54 GMT
 */

if (!defined('NV_ADMIN') or !defined('NV_MAINFILE'))
    die('Stop!!!');

$module_version = array(
    'name' => 'NukeViet Events',
    'modfuncs' => 'main,viewcat,rss,detail,search',
    'is_sysmod' => 0,
    'virtual' => 1,
    'version' => '4.3.00',
    'date' => 'Sun, 12 Jun 2017 05:02:54 GMT',
    'author' => 'PHAN TAN DUNG (phantandung92@gmail.com)',
    'note' => '',
    'uploads_dir' => array(
        $module_upload,
        $module_upload . '/files',
        $module_upload . '/images'
    )
);
