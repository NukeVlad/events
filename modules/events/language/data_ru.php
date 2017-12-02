<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 2-10-2010 20:59
 */

if (! defined('NV_ADMIN')) {
    die('Stop!!!');
}

/**
 * Note:
 * 	- Module var is: $lang, $module_file, $module_data, $module_upload, $module_theme, $module_name
 * 	- Accept global var: $db, $db_config, $global_config
 */

$db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_cat (catid, title, alias, description, weight, add_time, edit_time) VALUES
(1, 'Tuyển sinh', 'Tuyen-sinh', '', 1, 1448326792, 1448326975),
(2, 'Nghiên cứu khoa học', 'Nghien-cuu-khoa-hoc', '', 2, 1448326895, 1448326971),
(3, 'Hội thảo - Toạ đàm', 'Hoi-thao-Toa-dam', '', 3, 1448327696, 1448327696),
(4, 'Hoạt động sinh viên', 'Hoat-dong-sinh-vien', '', 4, 1448327705, 1448327705),
(5, 'Đoàn - Hội', 'Doan-Hoi', '', 5, 1448327712, 1448327712),
(6, 'Hoạt động khoa', 'Hoat-dong-khoa', '', 6, 1448327722, 1448327722),
(7, 'Đào tạo', 'Dao-tao', '', 7, 1448327728, 1448327728),
(8, 'Trao đổi văn hoá', 'Trao-doi-van-hoa', '', 8, 1448327735, 1448327735);
");

$db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_rows (id, post_id, catids, time_start, time_end, location, title, alias, images, hometext, bodytext, addtime, edittime, status) VALUES
(3, 1, ',4,5,', 1427821200, 1446224400, 'Phân hiệu Đại học Đà Nẵng tại Kon Tum', 'Cuộc thi “Sáng tạo mô hình kiến trúc công trình xây dựng năm 2015”', 'Cuoc-thi-Sang-tao-mo-hinh-kien-truc-cong-trinh-xay-dung-nam-2015', '', 'Cuộc thi “Sáng tạo mô hình kiến trúc công trình xây dựng năm 2015”', '&nbsp;Cuộc thi “Sáng tạo mô hình kiến trúc công trình xây dựng năm 2015”', 1448354599, 1448354599, 1),
(4, 1, ',4,', 1441040400, 1454173200, 'Phân hiệu Đại học Đà Nẵng tại Kon Tum', 'Cuộc thi “Thắp sáng tài năng kinh doanh-UDCK”', 'Cuoc-thi-Thap-sang-tai-nang-kinh-doanh-UDCK', '', 'Cuộc thi “Thắp sáng tài năng kinh doanh-UDCK”', 'Cuộc thi “Thắp sáng tài năng kinh doanh-UDCK”', 1448354668, 1448354668, 1),
(5, 1, ',6,7,', 1443632400, 0, 'Phân hiệu Đại học Đà Nẵng tại Kon Tum', 'Gặp gỡ Chủ tịch CLB giám đốc Sales &amp; Marketing Việt Nam', 'Gap-go-Chu-tich-CLB-giam-doc-Sales-Marketing-Viet-Nam', '', 'Gặp gỡ Chủ tịch CLB giám đốc Sales & Marketing Việt Nam', 'Gặp gỡ Chủ tịch CLB giám đốc Sales &amp; Marketing Việt Nam', 1448354746, 1448354746, 1),
(6, 1, ',3,6,', 1475254800, 0, 'Phân hiệu Đại học Đà Nẵng tại Kon Tum', 'Giao lưu sinh viên khoa Sư phạm và DBĐH khóa 8 và khóa 9', 'Giao-luu-sinh-vien-khoa-Su-pham-va-DBDH-khoa-8-va-khoa-9', '', 'Giao lưu sinh viên khoa Sư phạm và DBĐH khóa 8 và khóa 9', 'Giao lưu sinh viên khoa Sư phạm và DBĐH khóa 8 và khóa 9', 1448354808, 1448354808, 1),
(7, 4, ',8,', 1449621000, 1449633600, 'Hội trường C - Phân hiệu Đại học Đà Nẵng tại Kon Tum', 'Giao lưu văn hóa sinh viên Việt Nam - Thái Lan&#x3A; &quot;Asean Youth Bus 2015&quot;', 'Giao-luu-van-hoa-sinh-vien-Viet-Nam-Thai-Lan-Asean-Youth-Bus-2015', '', '60 sinh viên Phân hiệu Đại học Đà Nẵng tại Kon Tum đại diện tham gia buổi giao lưu văn hóa với 45 sinh viên đến từ 6 trường đại học Thái Lan.', 'Năm 2015, <strong>Chuyến xe buýt thanh niện đại học ASEAN số 3 </strong>áp dụng các khái niệm được hỗ trợ <strong>&quot;Thanh niên ASEAN bình đẳng&quot;.</strong> Dự án nhằm nâng cao nhận thức thanh niên của ASEAN kết nối với sự khác biệt của xã hội, văn hóa và tăng cường mối quan hệ tốt giữa thanh thiếu niên. Các kết quả quan trọng nhất cũng là sự phát triển cá nhân và lãnh đạo giữa các thành viên. Chương trình bắt đầu từ ngày 07-13 Tháng 12 năm 2015. Các tuyến đường của chương trình bắt đầu từ Thái Lan xuyên qua Lào và Việt Nam.<p>Trong chương trình bao gồm tất cả &nbsp;45 thanh niên và cán bộ giảng dạy từ 5 trường đại học Hoàng Gia Thái Lan tham gia vào chuyến xe buýt. <strong>Chuyến xe buýt thanh niên đại học ASEAN lần thứ 3.</strong></p><p><b>Mục tiêu của chương trình</b></p><p>1. Để tăng cường mối quan hệ giữa các tổ chức mạng lưới ASEAN thông qua các hoạt động giao lưu văn hóa.</p><p>2. Tăng cường đội ngũ giảng viên và sinh viên về học tập thông qua các buổi chia sẻ và các hoạt động khác có liên quan.</p><p>3. Để thúc đẩy mối quan hệ tốt và hoạt động thanh thiếu niên trong tổ chức AUYC giữa các tổ chức giáo dục và các tổ chức của thanh niên trong các nước ASEAN.</p><p><b>Đăng cai tổ chức tại Lào và Việt Nam năm 2015</b></p><p>1. Trường Cao đẳng Sư phạm Pakse.</p><p>2. Trường Đại học Champasak.</p><p>3. Phân hiệu Đại học Đà Nẵng tại Kontum.</p><p>4.Trường Đại học Kinh tế Đà Nẵng.</p><p>5. Trường Đại học Ngoại ngữ Huế.</p><p>6. Trung tâm hoạt động Thanh thiếu niên tỉnh Thừa Thiên Huế.</p><p>7. Trường Cao đẳng Du lịch Huế.</p><p><b>Thanh niên Đại diện từ các trường đại học Hoàng Gia ở Thái Lan 2015</b></p><p>1. Trường Đại học Hoàng Gia Burirum.</p><p>2. Trường Đại học Hoàng Gia Chaiyabhum.</p><p>3. Trường Đại học Hoàng Gia Sri sa khet.</p><p>4. Trường Đại học Hoàng Gia Roi-et.</p><p>5. Trường Đại học Hoàng Gia Ubon Ratchathanni.</p><p>6. Trường Đại học Hoàng Gia Nakhon Ratchasima.</p><p>&nbsp;</p>', 1449136145, 1449136270, 1),
(8, 4, ',4,', 1450868400, 1450879200, 'Cơ sở 1 - Phân hiệu ĐHĐN tại Kon Tum', 'Đêm hội Giáng sinh và chào đón năm mới 2016', 'Dem-hoi-Giang-sinh-va-chao-don-nam-moi-2016', '', 'Đêm giao lưu sinh viên do Liên chi Khoa Kỹ thuật - Nông nghiệp tổ chức. Đây là dịp các bạn sinh viên UD-CK có cơ hội thể hiện tài năng của bản thân.', '&nbsp;&nbsp;', 1449653717, 1449653717, 1);
");
