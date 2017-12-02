<?php

/**
 * @Project EVENTS 4.X
 * @Author PHAN TAN DUNG (phantandung92@gmail.com)
 * @Copyright (C) 2016 PHAN TAN DUNG. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Sun, 12 Jun 2016 05:02:54 GMT
 */

if (!defined('NV_IS_FILE_MODULES'))
    die('Stop!!!');

$sql_drop_module = array();
$array_table = array('cat', 'rows');
$table = $db_config['prefix'] . '_' . $lang . '_' . $module_data;
$result = $db->query('SHOW TABLE STATUS LIKE ' . $db->quote($table . '_%'));
while ($item = $result->fetch()) {
    $name = substr($item['name'], strlen($table) + 1);
    if (preg_match('/^' . $db_config['prefix'] . '\_' . $lang . '\_' . $module_data . '\_/', $item['name']) and (preg_match('/^([0-9]+)$/', $name) or in_array($name, $array_table) or preg_match('/^bodyhtml\_([0-9]+)$/', $name))) {
        $sql_drop_module[] = 'DROP TABLE IF EXISTS ' . $item['name'];
    }
}

$sql_create_module = $sql_drop_module;

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_cat (
  catid smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  title varchar(250) NOT NULL DEFAULT '',
  alias varchar(250) NOT NULL DEFAULT '',
  description text NOT NULL,
  weight smallint(5) unsigned NOT NULL DEFAULT '0',
  add_time int(11) unsigned NOT NULL DEFAULT '0',
  edit_time int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (catid),
  UNIQUE KEY alias (alias)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rows (
 id int(11) unsigned NOT NULL auto_increment,
 post_id mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT 'ID người đăng',
 catids varchar(255) NOT NULL DEFAULT '' COMMENT 'Danh sách ID chủ đề, theo cấu trúc ,id1,id2,',
 time_start int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'Thời gian bắt đầu',
 time_end int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'Thời gian kết thúc',
 location varchar(255) NOT NULL DEFAULT '' COMMENT 'Địa điểm diễn ra sự kiện',
 title varchar(250) NOT NULL DEFAULT '',
 alias varchar(250) NOT NULL DEFAULT '',
 images varchar(255) NOT NULL DEFAULT '' COMMENT 'Ảnh sự kiện',
 hometext mediumtext NOT NULL COMMENT 'Giới thiệu ngắn gọn',
 bodytext mediumtext NOT NULL COMMENT 'Chi tiết',
 addtime int(11) unsigned NOT NULL DEFAULT '0',
 edittime int(11) unsigned NOT NULL DEFAULT '0',
 status tinyint(4) NOT NULL DEFAULT '1' COMMENT '0: Dừng, 1: Hoạt động',
 PRIMARY KEY (id),
 KEY post_id (post_id),
 KEY catids (catids),
 KEY title (title),
 KEY status (status),
 UNIQUE KEY alias (alias)
) ENGINE=MyISAM";

$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'allowattachcomm', '0')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'alloweditorcomm', '0')";
