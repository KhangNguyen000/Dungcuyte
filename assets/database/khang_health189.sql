-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 18, 2022 lúc 06:38 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `khang_health`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdathang`
--

CREATE TABLE `chitietdathang` (
  `SoDonDH` int(11) NOT NULL,
  `MSHH` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `GiamGia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdathang`
--

INSERT INTO `chitietdathang` (`SoDonDH`, `MSHH`, `SoLuong`, `GiamGia`) VALUES
(1726618603, 'chiphauthuat_2', 1, 10),
(1726618603, 'dailung_1', 1, 10),
(1726618603, 'dailung_2', 2, 10),
(2100933778, 'dailung_1', 1, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dathang`
--

CREATE TABLE `dathang` (
  `SoDonDH` int(11) NOT NULL,
  `MSKH` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MSNV` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NgayDH` date NOT NULL,
  `NgayGH` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dathang`
--

INSERT INTO `dathang` (`SoDonDH`, `MSKH`, `MSNV`, `NgayDH`, `NgayGH`) VALUES
(1726618603, 'KH1117995853', 'A01', '2022-09-18', '2022-09-21'),
(2100933778, 'KH1117995853', 'A01', '2022-09-18', '2022-09-21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diachi`
--

CREATE TABLE `diachi` (
  `MADC` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DiaChi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MSKH` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `diachi`
--

INSERT INTO `diachi` (`MADC`, `DiaChi`, `MSKH`) VALUES
('KH1117995853', 'can tho', 'KH1117995853'),
('KH1935934101', 'Can Tho', 'KH1935934101');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hanghoa`
--

CREATE TABLE `hanghoa` (
  `MSHH` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TenHH` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Gia_Cu` int(11) NOT NULL,
  `Gia` int(11) NOT NULL,
  `SoLuongHang` int(11) NOT NULL,
  `MoTa` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MaLoaiHang` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hanghoa`
--

INSERT INTO `hanghoa` (`MSHH`, `TenHH`, `Gia_Cu`, `Gia`, `SoLuongHang`, `MoTa`, `tags`, `MaLoaiHang`) VALUES
('chiphauthuat_1', 'Chỉ phẫu thuật 1', 20000, 18000, 20, '<div class=\"product-view-sa\"><div class=\"product-view-sa_one\"><div class=\"product-view-sa-supplier\"><span>Bảo hành:</span><span>36 tháng</span></div><div class=\"product-view-sa-author\"><span>Thương hiệu:</span><span>Accu</span></div></div><div class=\"product-view-sa_two\"><div class=\"product-view-sa-supplier\"><span>Xuất xứ thương hiệu:</span><span>Đức</span></div></div></div>$$$<table>\n		<colgroup><col width=\"25%\">\n		<col>\n		</colgroup><tbody>\n		    									    <tr>\n				<th class=\"table-label\">\n				    Mã hàng				</th>\n				<td class=\"data_sku\">\n				    8935092807829				</td>\n			    </tr>\n					    									    <tr>\n				<th class=\"table-label\">\n				    Nhà Cung Cấp\n	                        <td class=\"data_sku\">\n				    Accu </td>				</td>				</th>\n			\n					    									    \n			</tr>\n		    		</tbody>\n	    </table>$$$<div id=\"desc_content\" class=\"std\">\n		    <p dir=\"ltr\" style=\"text-align: justify;\"><strong>Chỉ phẫu thuật</strong></p>\n\n<p dir=\"ltr\" style=\"text-align: justify;\">Chỉ phẫu thuật tự tiêu (absorbable sutures) là loại chỉ sau một thời gian trong cơ thể sẽ bị phân hủy bởi quá trình thủy phân (chỉ tổng hợp: PGLA, PGA, PDO, PCL…) hoặc bởi tác động của enzyme (chỉ tự nhiên hoặc chỉ sinh học: Catgut, Collagen). Chỉ khâu tự tiêu có khả năng…</p>\n\n', 'chiphauthuat', 'CPT'),
('chiphauthuat_2', 'Chỉ phẫu thuật 2', 25000, 23000, 21, '<div class=\"product-view-sa\"><div class=\"product-view-sa_one\"><div class=\"product-view-sa-supplier\"><span>Bảo hành:</span><span>36 tháng</span></div><div class=\"product-view-sa-author\"><span>Thương hiệu:</span><span>Accu</span></div></div><div class=\"product-view-sa_two\"><div class=\"product-view-sa-supplier\"><span>Xuất xứ thương hiệu:</span><span>Đức</span></div></div></div>$$$<table>\n		<colgroup><col width=\"25%\">\n		<col>\n		</colgroup><tbody>\n		    									    <tr>\n				<th class=\"table-label\">\n				    Mã hàng				</th>\n				<td class=\"data_sku\">\n				    8935092807829				</td>\n			    </tr>\n					    									    <tr>\n				<th class=\"table-label\">\n				    Nhà Cung Cấp\n	                        <td class=\"data_sku\">\n				    Accu </td>				</td>				</th>\n			\n					    									    \n			</tr>\n		    		</tbody>\n	    </table>$$$<div id=\"desc_content\" class=\"std\">\n		    <p dir=\"ltr\" style=\"text-align: justify;\"><strong>Chỉ phẫu thuật</strong></p>\n\n<p dir=\"ltr\" style=\"text-align: justify;\">Chỉ phẫu thuật tự tiêu (absorbable sutures) là loại chỉ sau một thời gian trong cơ thể sẽ bị phân hủy bởi quá trình thủy phân (chỉ tổng hợp: PGLA, PGA, PDO, PCL…) hoặc bởi tác động của enzyme (chỉ tự nhiên hoặc chỉ sinh học: Catgut, Collagen). Chỉ khâu tự tiêu có khả năng…</p>\n\n', 'chiphauthuat', 'CPT'),
('dailung_1', 'Đai lưng áp lực cao', 900000, 880000, 10, '<div class=\"product-view-sa\"><div class=\"product-view-sa_one\"><div class=\"product-view-sa-supplier\"><span>Bảo hành:</span><span>36 tháng</span></div><div class=\"product-view-sa-author\"><span>Thương hiệu:</span><span>RelaxSan</span></div></div><div class=\"product-view-sa_two\"><div class=\"product-view-sa-supplier\"><span>Xuất xứ thương hiệu:</span><span>Italy</span></div></div></div>$$$<table>\r\n		<colgroup><col width=\"25%\">\r\n		<col>\r\n		</colgroup><tbody>\r\n		    									    <tr>\r\n				<th class=\"table-label\">\r\n				    Mã hàng				</th>\r\n				<td class=\"data_sku\">\r\n				    8935092807800				</td>\r\n			    </tr>\r\n					    									    <tr>\r\n				<th class=\"table-label\">\r\n				    Nhà Cung Cấp\r\n	                        <td class=\"data_sku\">\r\n				    RelaxSan </td>				</td>				</th>\r\n			\r\n					    									    \r\n			</tr>\r\n		    		</tbody>\r\n	    </table>$$$<div id=\"desc_content\" class=\"std\">\r\n		    <p dir=\"ltr\" style=\"text-align: justify;\"><strong>Đai lưng áp lực cao</strong></p>\r\n\r\n<p dir=\"ltr\" style=\"text-align: justify;\">Đai cột sống lumbar SportFlex là sự lựa chọn hoàn hảo cho người bị mắc cách bệnh lý cột sống lưng, vùng thắt lưng như thoái hóa đốt sống, thoái vị địa đệm, đau do chấn thương, làm việc nặng quá sức... và phù hợp cho những người sau phẫu thuật. Được làm từ chất liệu cao cấp, siêu đàn hồi, phía sau có các thanh đai nhỏ nhỏ gọn, giúp định hình phần cột sống và lưng.</p>\r\n\r\n', 'dailung', 'DL'),
('dailung_2', 'Đai nịt bụng', 725000, 700000, 20, '<div class=\"product-view-sa\"><div class=\"product-view-sa_one\"><div class=\"product-view-sa-supplier\"><span>Bảo hành:</span><span>36 tháng</span></div><div class=\"product-view-sa-author\"><span>Thương hiệu:</span><span>RelaxSan</span></div></div><div class=\"product-view-sa_two\"><div class=\"product-view-sa-supplier\"><span>Xuất xứ thương hiệu:</span><span>Italy</span></div></div></div>$$$<table>\r\n		<colgroup><col width=\"25%\">\r\n		<col>\r\n		</colgroup><tbody>\r\n		    									    <tr>\r\n				<th class=\"table-label\">\r\n				    Mã hàng				</th>\r\n				<td class=\"data_sku\">\r\n				    8935092807800				</td>\r\n			    </tr>\r\n					    									    <tr>\r\n				<th class=\"table-label\">\r\n				    Nhà Cung Cấp\r\n	                        <td class=\"data_sku\">\r\n				    RelaxSan </td>				</td>				</th>\r\n			\r\n					    									    \r\n			</tr>\r\n		    		</tbody>\r\n	    </table>$$$<div id=\"desc_content\" class=\"std\">\r\n		    <p dir=\"ltr\" style=\"text-align: justify;\"><strong>Đai lưng áp lực cao</strong></p>\r\n\r\n<p dir=\"ltr\" style=\"text-align: justify;\">Đai cột sống lumbar SportFlex là sự lựa chọn hoàn hảo cho người bị mắc cách bệnh lý cột sống lưng, vùng thắt lưng như thoái hóa đốt sống, thoái vị địa đệm, đau do chấn thương, làm việc nặng quá sức... và phù hợp cho những người sau phẫu thuật. Được làm từ chất liệu cao cấp, siêu đàn hồi, phía sau có các thanh đai nhỏ nhỏ gọn, giúp định hình phần cột sống và lưng.</p>\r\n\r\n', 'dailung', 'DL'),
('ghebo_1', 'Ghế bô vệ sinh cao cấp ', 2200000, 2100000, 62, '<div class=\"product-view-sa\"><div class=\"product-view-sa_one\"><div class=\"product-view-sa-supplier\"><span>Bảo hành:</span><span>36 tháng</span></div><div class=\"product-view-sa-author\"><span>Thương hiệu:</span><span>Oscar</span></div></div><div class=\"product-view-sa_two\"><div class=\"product-view-sa-supplier\"><span>Xuất xứ thương hiệu:</span><span>Mỹ</span></div></div></div>$$$<table>\r\n		<colgroup><col width=\"25%\">\r\n		<col>\r\n		</colgroup><tbody>\r\n		    									    <tr>\r\n				<th class=\"table-label\">\r\n				    Mã hàng				</th>\r\n				<td class=\"data_sku\">\r\n				    8935092807831				</td>\r\n			    </tr>\r\n					    									    <tr>\r\n				<th class=\"table-label\">\r\n				    Nhà Cung Cấp\r\n	                        <td class=\"data_sku\">\r\n				    Oscar </td>				</td>				</th>\r\n			\r\n					    									    \r\n			</tr>\r\n		    		</tbody>\r\n	    </table>$$$<div id=\"desc_content\" class=\"std\">\r\n		    <p dir=\"ltr\" style=\"text-align: justify;\"><strong>Ghế bô cao cấp mạ crome</strong></p>\r\n\r\n<p dir=\"ltr\" style=\"text-align: justify;\"> Ghế có khung nhôm nên trọng lượng ghế nhẹ kết hợp với xếp gọn được nê rất tiện lợi di chuyển. Ghế có khung lớn + độ rộng lớn hơn các mẫu ghế cùng nhóm nên phù hợp cho người to con, ghế chịu tại đến 150kg. Ghế 4 chức năng cho người cao tuổi giúp người bệnh hoặc người cao tuổi đi vệ sinh dễ dàng với bô trên xe hoặc đẩy vào bàn cầu.</p>\r\n\r\n', 'ghebo\n', 'GB'),
('ghebo_2', 'Ghế bô khung nhôm', 2500000, 2450000, 80, '<div class=\"product-view-sa\"><div class=\"product-view-sa_one\"><div class=\"product-view-sa-supplier\"><span>Bảo hành:</span><span>36 tháng</span></div><div class=\"product-view-sa-author\"><span>Thương hiệu:</span><span>Oscar</span></div></div><div class=\"product-view-sa_two\"><div class=\"product-view-sa-supplier\"><span>Xuất xứ thương hiệu:</span><span>Mỹ</span></div></div></div>$$$<table>\r\n		<colgroup><col width=\"25%\">\r\n		<col>\r\n		</colgroup><tbody>\r\n		    									    <tr>\r\n				<th class=\"table-label\">\r\n				    Mã hàng				</th>\r\n				<td class=\"data_sku\">\r\n				    8935092807831				</td>\r\n			    </tr>\r\n					    									    <tr>\r\n				<th class=\"table-label\">\r\n				    Nhà Cung Cấp\r\n	                        <td class=\"data_sku\">\r\n				    Oscar </td>				</td>				</th>\r\n			\r\n					    									    \r\n			</tr>\r\n		    		</tbody>\r\n	    </table>$$$<div id=\"desc_content\" class=\"std\">\r\n		    <p dir=\"ltr\" style=\"text-align: justify;\"><strong>Ghế bô cao cấp mạ crome</strong></p>\r\n\r\n<p dir=\"ltr\" style=\"text-align: justify;\"> Ghế có khung nhôm nên trọng lượng ghế nhẹ kết hợp với xếp gọn được nê rất tiện lợi di chuyển. Ghế có khung lớn + độ rộng lớn hơn các mẫu ghế cùng nhóm nên phù hợp cho người to con, ghế chịu tại đến 150kg. Ghế 4 chức năng cho người cao tuổi giúp người bệnh hoặc người cao tuổi đi vệ sinh dễ dàng với bô trên xe hoặc đẩy vào bàn cầu.</p>\r\n\r\n', 'ghebo', 'GB'),
('maydohuyetap_1', 'Máy đo huyết áp Accu', 1100000, 900000, 80, '<div class=\"product-view-sa\"><div class=\"product-view-sa_one\"><div class=\"product-view-sa-supplier\"><span>Bảo hành:</span><span>36 tháng</span></div><div class=\"product-view-sa-author\"><span>Thương hiệu:</span><span>BWell</span></div></div><div class=\"product-view-sa_two\"><div class=\"product-view-sa-supplier\"><span>Xuất xứ thương hiệu:</span><span>Thụy Sỹ</span></div></div></div>$$$<table>\r\n		<colgroup><col width=\"25%\">\r\n		<col>\r\n		</colgroup><tbody>\r\n		    									    <tr>\r\n				<th class=\"table-label\">\r\n				    Mã hàng				</th>\r\n				<td class=\"data_sku\">\r\n				    8935092807832				</td>\r\n			    </tr>\r\n					    									    <tr>\r\n				<th class=\"table-label\">\r\n				    Nhà Cung Cấp\r\n	                        <td class=\"data_sku\">\r\n				    BWell </td>				</td>				</th>\r\n			\r\n					    									    \r\n			</tr>\r\n		    		</tbody>\r\n	    </table>$$$<div id=\"desc_content\" class=\"std\">\r\n		    <p dir=\"ltr\" style=\"text-align: justify;\"><strong>Máy đo huyết áp giọng nói</strong></p>\r\n\r\n<p dir=\"ltr\" style=\"text-align: justify;\"> - Máy đo huyết áp giọng nói BWell Pro-36 được sản xuất bởi hãng BWell/Thụy Sỹ với bảo hành 5 năm. Máy cho kết quả với giọng nói nên rất tiện cho mọi người đặt biệt là người cao tuổi. Máy có cảnh báo nhịp tim bất thường (PAD) & cảnh báo huyết áp cao thâp theo tiêu chuân WHO.</p>\r\n\r\n', 'maydohuyetap', 'MHA'),
('maydohuyetap_2', 'Máy đo huyết áp đồng hồ', 900000, 850000, 80, '<div class=\"product-view-sa\"><div class=\"product-view-sa_one\"><div class=\"product-view-sa-supplier\"><span>Bảo hành:</span><span>36 tháng</span></div><div class=\"product-view-sa-author\"><span>Thương hiệu:</span><span>BWell</span></div></div><div class=\"product-view-sa_two\"><div class=\"product-view-sa-supplier\"><span>Xuất xứ thương hiệu:</span><span>Thụy Sỹ</span></div></div></div>$$$<table>\r\n		<colgroup><col width=\"25%\">\r\n		<col>\r\n		</colgroup><tbody>\r\n		    									    <tr>\r\n				<th class=\"table-label\">\r\n				    Mã hàng				</th>\r\n				<td class=\"data_sku\">\r\n				    8935092807832				</td>\r\n			    </tr>\r\n					    									    <tr>\r\n				<th class=\"table-label\">\r\n				    Nhà Cung Cấp\r\n	                        <td class=\"data_sku\">\r\n				    BWell </td>				</td>				</th>\r\n			\r\n					    									    \r\n			</tr>\r\n		    		</tbody>\r\n	    </table>$$$<div id=\"desc_content\" class=\"std\">\r\n		    <p dir=\"ltr\" style=\"text-align: justify;\"><strong>Máy đo huyết áp giọng nói</strong></p>\r\n\r\n<p dir=\"ltr\" style=\"text-align: justify;\"> - Máy đo huyết áp giọng nói BWell Pro-36 được sản xuất bởi hãng BWell/Thụy Sỹ với bảo hành 5 năm. Máy cho kết quả với giọng nói nên rất tiện cho mọi người đặt biệt là người cao tuổi. Máy có cảnh báo nhịp tim bất thường (PAD) & cảnh báo huyết áp cao thâp theo tiêu chuân WHO.</p>\r\n\r\n', 'maydohuyetap', 'MHA'),
('maydohuyetap_3', 'Máy đo huyết áp giọng nói', 900000, 850000, 80, '<div class=\"product-view-sa\"><div class=\"product-view-sa_one\"><div class=\"product-view-sa-supplier\"><span>Bảo hành:</span><span>36 tháng</span></div><div class=\"product-view-sa-author\"><span>Thương hiệu:</span><span>BWell</span></div></div><div class=\"product-view-sa_two\"><div class=\"product-view-sa-supplier\"><span>Xuất xứ thương hiệu:</span><span>Thụy Sỹ</span></div></div></div>$$$<table>\r\n		<colgroup><col width=\"25%\">\r\n		<col>\r\n		</colgroup><tbody>\r\n		    									    <tr>\r\n				<th class=\"table-label\">\r\n				    Mã hàng				</th>\r\n				<td class=\"data_sku\">\r\n				    8935092807832				</td>\r\n			    </tr>\r\n					    									    <tr>\r\n				<th class=\"table-label\">\r\n				    Nhà Cung Cấp\r\n	                        <td class=\"data_sku\">\r\n				    BWell </td>				</td>				</th>\r\n			\r\n					    									    \r\n			</tr>\r\n		    		</tbody>\r\n	    </table>$$$<div id=\"desc_content\" class=\"std\">\r\n		    <p dir=\"ltr\" style=\"text-align: justify;\"><strong>Máy đo huyết áp giọng nói</strong></p>\r\n\r\n<p dir=\"ltr\" style=\"text-align: justify;\"> - Máy đo huyết áp giọng nói BWell Pro-36 được sản xuất bởi hãng BWell/Thụy Sỹ với bảo hành 5 năm. Máy cho kết quả với giọng nói nên rất tiện cho mọi người đặt biệt là người cao tuổi. Máy có cảnh báo nhịp tim bất thường (PAD) & cảnh báo huyết áp cao thâp theo tiêu chuân WHO.</p>\r\n\r\n', 'maydohuyetap', 'MHA'),
('maydohuyetap_4', 'Máy đo huyết áp Ormon', 700000, 600000, 23, '<div class=\"product-view-sa\"><div class=\"product-view-sa_one\"><div class=\"product-view-sa-supplier\"><span>Bảo hành:</span><span>36 tháng</span></div><div class=\"product-view-sa-author\"><span>Thương hiệu:</span><span>BWell</span></div></div><div class=\"product-view-sa_two\"><div class=\"product-view-sa-supplier\"><span>Xuất xứ thương hiệu:</span><span>Thụy Sỹ</span></div></div></div>$$$<table>\r\n		<colgroup><col width=\"25%\">\r\n		<col>\r\n		</colgroup><tbody>\r\n		    									    <tr>\r\n				<th class=\"table-label\">\r\n				    Mã hàng				</th>\r\n				<td class=\"data_sku\">\r\n				    8935092807832				</td>\r\n			    </tr>\r\n					    									    <tr>\r\n				<th class=\"table-label\">\r\n				    Nhà Cung Cấp\r\n	                        <td class=\"data_sku\">\r\n				    BWell </td>				</td>				</th>\r\n			\r\n					    									    \r\n			</tr>\r\n		    		</tbody>\r\n	    </table>$$$<div id=\"desc_content\" class=\"std\">\r\n		    <p dir=\"ltr\" style=\"text-align: justify;\"><strong>Máy đo huyết áp giọng nói</strong></p>\r\n\r\n<p dir=\"ltr\" style=\"text-align: justify;\"> - Máy đo huyết áp giọng nói BWell Pro-36 được sản xuất bởi hãng BWell/Thụy Sỹ với bảo hành 5 năm. Máy cho kết quả với giọng nói nên rất tiện cho mọi người đặt biệt là người cao tuổi. Máy có cảnh báo nhịp tim bất thường (PAD) & cảnh báo huyết áp cao thâp theo tiêu chuân WHO.</p>\r\n\r\n', 'maydohuyetap', 'MHA'),
('mayhotro_1', 'Máy hút ẩm', 3500000, 3400000, 22, '<div class=\"product-view-sa\"><div class=\"product-view-sa_one\"><div class=\"product-view-sa-supplier\"><span>Bảo hành:</span><span>36 tháng</span></div><div class=\"product-view-sa-author\"><span>Thương hiệu:</span><span>Kosmen</span></div></div><div class=\"product-view-sa_two\"><div class=\"product-view-sa-supplier\"><span>Xuất xứ thương hiệu:</span><span>Đức</span></div></div></div>$$$<table>\r\n		<colgroup><col width=\"25%\">\r\n		<col>\r\n		</colgroup><tbody>\r\n		    									    <tr>\r\n				<th class=\"table-label\">\r\n				    Mã hàng				</th>\r\n				<td class=\"data_sku\">\r\n				    8935092807835				</td>\r\n			    </tr>\r\n					    									    <tr>\r\n				<th class=\"table-label\">\r\n				    Nhà Cung Cấp\r\n	                        <td class=\"data_sku\">\r\n				    Kosmen </td>				</td>				</th>\r\n			\r\n					    									    \r\n			</tr>\r\n		    		</tbody>\r\n	    </table>$$$<div id=\"desc_content\" class=\"std\">\r\n		    <p dir=\"ltr\" style=\"text-align: justify;\"><strong>Máy hút ẩm</strong></p>\r\n\r\n<p dir=\"ltr\" style=\"text-align: justify;\"> - Máy hút ẩm Đức Kosmen-12N là sản phẩm được sản xuất theo công nghệ Đức/ lắp ráp tại TQ. Máy thích hợp cho không gian 10 - 40 m2. Công suất hút ẩm: đạt 12 lít/ngày ở nhiệt độ 30oC, độ ẩm 80%; đạt 6.5 lít/ ngày ở nhiệt độ 27oC, độ ẩm 60%. Máy có dung tích bình chứa nước: 3 lít. Máy có độ ồn thấp  ≤ 40dB & vcng suất máy: 190W. Máy có tốc độ hút ẩm nhanh với lưu lương gió 110 m3/h với 2 chế độ quạt cao. Kích thước: 300x206x470 mm.</p>\r\n\r\n', 'mayhotro', 'TBK'),
('mayhotro_2', 'Máy massage', 2000000, 1800000, 2, '<div class=\"product-view-sa\"><div class=\"product-view-sa_one\"><div class=\"product-view-sa-supplier\"><span>Bảo hành:</span><span>36 tháng</span></div><div class=\"product-view-sa-author\"><span>Thương hiệu:</span><span>FMS</span></div></div><div class=\"product-view-sa_two\"><div class=\"product-view-sa-supplier\"><span>Xuất xứ thương hiệu:</span><span>USA</span></div></div></div>$$$<table>\r\n		<colgroup><col width=\"25%\">\r\n		<col>\r\n		</colgroup><tbody>\r\n		    									    <tr>\r\n				<th class=\"table-label\">\r\n				    Mã hàng				</th>\r\n				<td class=\"data_sku\">\r\n				    8935092807837				</td>\r\n			    </tr>\r\n					    									    <tr>\r\n				<th class=\"table-label\">\r\n				    Nhà Cung Cấp\r\n	                        <td class=\"data_sku\">\r\n				    FMS </td>				</td>				</th>\r\n			\r\n					    									    \r\n			</tr>\r\n		    		</tbody>\r\n	    </table>$$$<div id=\"desc_content\" class=\"std\">\r\n		    <p dir=\"ltr\" style=\"text-align: justify;\"><strong>Máy massage chân</strong></p>\r\n\r\n<p dir=\"ltr\" style=\"text-align: justify;\"> - Máy massage bàn chân FMS-315 là sản phẩm được nhập khẩu chính hãng Mỹ với thương hiệu Homedics. Máy được thiết kế sắc sảo đẹp mắt, siêu sang trọng nhưng đặc biệt là được làm bằng chất liệu theo chuẩn USA..</p>\r\n\r\n', 'mayhotro', 'MM'),
('mayhotro_3', 'Máy massage chân', 4500000, 4300000, 21, '<div class=\"product-view-sa\"><div class=\"product-view-sa_one\"><div class=\"product-view-sa-supplier\"><span>Bảo hành:</span><span>36 tháng</span></div><div class=\"product-view-sa-author\"><span>Thương hiệu:</span><span>FMS</span></div></div><div class=\"product-view-sa_two\"><div class=\"product-view-sa-supplier\"><span>Xuất xứ thương hiệu:</span><span>USA</span></div></div></div>$$$<table>\r\n		<colgroup><col width=\"25%\">\r\n		<col>\r\n		</colgroup><tbody>\r\n		    									    <tr>\r\n				<th class=\"table-label\">\r\n				    Mã hàng				</th>\r\n				<td class=\"data_sku\">\r\n				    8935092807837				</td>\r\n			    </tr>\r\n					    									    <tr>\r\n				<th class=\"table-label\">\r\n				    Nhà Cung Cấp\r\n	                        <td class=\"data_sku\">\r\n				    FMS </td>				</td>				</th>\r\n			\r\n					    									    \r\n			</tr>\r\n		    		</tbody>\r\n	    </table>$$$<div id=\"desc_content\" class=\"std\">\r\n		    <p dir=\"ltr\" style=\"text-align: justify;\"><strong>Máy massage chân</strong></p>\r\n\r\n<p dir=\"ltr\" style=\"text-align: justify;\"> - Máy massage bàn chân FMS-315 là sản phẩm được nhập khẩu chính hãng Mỹ với thương hiệu Homedics. Máy được thiết kế sắc sảo đẹp mắt, siêu sang trọng nhưng đặc biệt là được làm bằng chất liệu theo chuẩn USA..</p>\r\n\r\n', 'mayhotro', 'MM'),
('mayhotro_4', 'Máy massage cổ', 1500000, 1300000, 12, '<div class=\"product-view-sa\"><div class=\"product-view-sa_one\"><div class=\"product-view-sa-supplier\"><span>Bảo hành:</span><span>36 tháng</span></div><div class=\"product-view-sa-author\"><span>Thương hiệu:</span><span>220BK</span></div></div><div class=\"product-view-sa_two\"><div class=\"product-view-sa-supplier\"><span>Xuất xứ thương hiệu:</span><span>USA</span></div></div></div>$$$<table>\r\n		<colgroup><col width=\"25%\">\r\n		<col>\r\n		</colgroup><tbody>\r\n		    									    <tr>\r\n				<th class=\"table-label\">\r\n				    Mã hàng				</th>\r\n				<td class=\"data_sku\">\r\n				    8935092807839				</td>\r\n			    </tr>\r\n					    									    <tr>\r\n				<th class=\"table-label\">\r\n				    Nhà Cung Cấp\r\n	                        <td class=\"data_sku\">\r\n				    220BK </td>				</td>				</th>\r\n			\r\n					    									    \r\n			</tr>\r\n		    		</tbody>\r\n	    </table>$$$<div id=\"desc_content\" class=\"std\">\r\n		    <p dir=\"ltr\" style=\"text-align: justify;\"><strong>Máy massage cổ</strong></p>\r\n\r\n<p dir=\"ltr\" style=\"text-align: justify;\">- Gối massage cổ gáy 220BK được sản xuất tại USA, máy được bảo hành 2 năm. Sản phẩm được làm bằng chất liệu siêu mềm độ bền cao cho cảm giác thoải mái khi sử dụng. Gối massage giúp giảm cơn đau vai cổ gáy đặc biệt khi ngồi xe đi xa.</p>\r\n\r\n', '0', 'MM'),
('maytrothinh_1', 'Máy trợ thính có dây', 1280000, 1100000, 5, '<div class=\"product-view-sa\"><div class=\"product-view-sa_one\"><div class=\"product-view-sa-supplier\"><span>Bảo hành:</span><span>36 tháng</span></div><div class=\"product-view-sa-author\"><span>Thương hiệu:</span><span>HA-20DX</span></div></div><div class=\"product-view-sa_two\"><div class=\"product-view-sa-supplier\"><span>Xuất xứ thương hiệu:</span><span>Japan</span></div></div></div>$$$<table>\r\n		<colgroup><col width=\"25%\">\r\n		<col>\r\n		</colgroup><tbody>\r\n		    									    <tr>\r\n				<th class=\"table-label\">\r\n				    Mã hàng				</th>\r\n				<td class=\"data_sku\">\r\n				    8935092807841				</td>\r\n			    </tr>\r\n					    									    <tr>\r\n				<th class=\"table-label\">\r\n				    Nhà Cung Cấp\r\n	                        <td class=\"data_sku\">\r\n				    HA-20DX </td>				</td>				</th>\r\n			\r\n					    									    \r\n			</tr>\r\n		    		</tbody>\r\n	    </table>$$$<div id=\"desc_content\" class=\"std\">\r\n		    <p dir=\"ltr\" style=\"text-align: justify;\"><strong>Máy trợ thính</strong></p>\r\n\r\n<p dir=\"ltr\" style=\"text-align: justify;\">- Máy trợ thính có dây HA-20DX Rionet là sản phẩm chất lượng cao có nguồn gốc xuất xứ Nhật Bản. Máy có 1 dây nên chỉ sử dụng cho 1 bên tai nhưng rất dễ sử dụng, thích hợp cho người già và người khiếm thính nặng. Máy có mức áp suất âm ra với SPL vào bằng 90 dB & tối đa lên tới 138 dB.</p>\r\n\r\n', 'maytrothinh', 'MTT'),
('maytrothinh_2', 'Máy trợ thính Tactear', 700000, 680000, 34, '<div class=\"product-view-sa\"><div class=\"product-view-sa_one\"><div class=\"product-view-sa-supplier\"><span>Bảo hành:</span><span>36 tháng</span></div><div class=\"product-view-sa-author\"><span>Thương hiệu:</span><span>HA-20DX</span></div></div><div class=\"product-view-sa_two\"><div class=\"product-view-sa-supplier\"><span>Xuất xứ thương hiệu:</span><span>Japan</span></div></div></div>$$$<table>\r\n		<colgroup><col width=\"25%\">\r\n		<col>\r\n		</colgroup><tbody>\r\n		    									    <tr>\r\n				<th class=\"table-label\">\r\n				    Mã hàng				</th>\r\n				<td class=\"data_sku\">\r\n				    8935092807841				</td>\r\n			    </tr>\r\n					    									    <tr>\r\n				<th class=\"table-label\">\r\n				    Nhà Cung Cấp\r\n	                        <td class=\"data_sku\">\r\n				    HA-20DX </td>				</td>				</th>\r\n			\r\n					    									    \r\n			</tr>\r\n		    		</tbody>\r\n	    </table>$$$<div id=\"desc_content\" class=\"std\">\r\n		    <p dir=\"ltr\" style=\"text-align: justify;\"><strong>Máy trợ thính</strong></p>\r\n\r\n<p dir=\"ltr\" style=\"text-align: justify;\">- Máy trợ thính có dây HA-20DX Rionet là sản phẩm chất lượng cao có nguồn gốc xuất xứ Nhật Bản. Máy có 1 dây nên chỉ sử dụng cho 1 bên tai nhưng rất dễ sử dụng, thích hợp cho người già và người khiếm thính nặng. Máy có mức áp suất âm ra với SPL vào bằng 90 dB & tối đa lên tới 138 dB.</p>\r\n\r\n', 'maytrothinh', 'MTT'),
('thietbikhac_1', 'Bàn ăn di động', 600000, 450000, 23, '<div class=\"product-view-sa\"><div class=\"product-view-sa_one\"><div class=\"product-view-sa-supplier\"><span>Bảo hành:</span><span>36 tháng</span></div><div class=\"product-view-sa-author\"><span>Thương hiệu:</span><span>MS-575</span></div></div><div class=\"product-view-sa_two\"><div class=\"product-view-sa-supplier\"><span>Xuất xứ thương hiệu:</span><span>Japan</span></div></div></div>$$$<table>\r\n		<colgroup><col width=\"25%\">\r\n		<col>\r\n		</colgroup><tbody>\r\n		    									    <tr>\r\n				<th class=\"table-label\">\r\n				    Mã hàng				</th>\r\n				<td class=\"data_sku\">\r\n				    8935092807843				</td>\r\n			    </tr>\r\n					    									    <tr>\r\n				<th class=\"table-label\">\r\n				    Nhà Cung Cấp\r\n	                        <td class=\"data_sku\">\r\n				    MS-575 </td>				</td>				</th>\r\n			\r\n					    									    \r\n			</tr>\r\n		    		</tbody>\r\n	    </table>$$$<div id=\"desc_content\" class=\"std\">\r\n		    <p dir=\"ltr\" style=\"text-align: justify;\"><strong>Bàn ăn di động</strong></p>\r\n\r\n<p dir=\"ltr\" style=\"text-align: justify;\">- Bàn ăn di động MS-575 là thiết bị chuyên dụng làm bàn ăn cho giường bệnh, ngoài ra còn dùng làm bàn ghi ché hồ sơ bệnh án trong phòng mổ hoặc giảng dạy sinh viên. Bàn nâng hạ chiều cao tính từ mặt đất 70 - 100cm. Khung thép sơn tĩnh điện. Mặt bàn gỗ ép chống nước với kích thước rộng 38cm & dài 77cm. Trụ nâng hạ làm bằng thép mạ chrome.</p>\r\n\r\n', 'thietbikhac', 'TBK'),
('thietbikhac_2', 'Bộ lọc khuẩn ', 800000, 700000, 32, '<div class=\"product-view-sa\"><div class=\"product-view-sa_one\"><div class=\"product-view-sa-supplier\"><span>Bảo hành:</span><span>36 tháng</span></div><div class=\"product-view-sa-author\"><span>Thương hiệu:</span><span>Filter HME Flexicare</span></div></div><div class=\"product-view-sa_two\"><div class=\"product-view-sa-supplier\"><span>Xuất xứ thương hiệu:</span><span>Mỹ</span></div></div></div>$$$<table>\r\n		<colgroup><col width=\"25%\">\r\n		<col>\r\n		</colgroup><tbody>\r\n		    									    <tr>\r\n				<th class=\"table-label\">\r\n				    Mã hàng				</th>\r\n				<td class=\"data_sku\">\r\n				    8935092807845				</td>\r\n			    </tr>\r\n					    									    <tr>\r\n				<th class=\"table-label\">\r\n				    Nhà Cung Cấp\r\n	                        <td class=\"data_sku\">\r\n				    Filter HME Flexicare </td>				</td>				</th>\r\n			\r\n					    									    \r\n			</tr>\r\n		    		</tbody>\r\n	    </table>$$$<div id=\"desc_content\" class=\"std\">\r\n		    <p dir=\"ltr\" style=\"text-align: justify;\"><strong>Bộ lọc khuẩn</strong></p>\r\n\r\n<p dir=\"ltr\" style=\"text-align: justify;\">- Bộ lọc khuẩn & làm ẩm HME Flexicare có hình dạng tròn, không có cạnh sắc, giảm nguy cơ để lại dấu ấn cho bệnh nhân.  Bộ lọc dùng để gắn vào một túi-van-mặt nạ, giữa túi tự bơm hơi và đường thở (mặt nạ, đường thở trên thanh quản, ống khí quản) để lọc hơi thở thở ra.  Có 3 chức năng: bộ lọc tĩnh điện vi khuẩn, vi rút, đầu nối 22M / 15F tuân theo tiêu chuẩn BS EN ISO 5356 hiệu quả  99.999%, dead space: 69ml/28ml, trọng lượng 32g/21g, có cổng đo CO2, vô trùng & trao đổi ẩm.</p>\r\n\r\n', 'thietbikhac', 'TBK'),
('thietbikhac_3', 'Đèn cực tím', 950000, 900000, 20, '<div class=\"product-view-sa\"><div class=\"product-view-sa_one\"><div class=\"product-view-sa-supplier\"><span>Bảo hành:</span><span>36 tháng</span></div><div class=\"product-view-sa-author\"><span>Thương hiệu:</span><span>TNE</span></div></div><div class=\"product-view-sa_two\"><div class=\"product-view-sa-supplier\"><span>Xuất xứ thương hiệu:</span><span>Việt Nam</span></div></div></div>$$$<table>\r\n		<colgroup><col width=\"25%\">\r\n		<col>\r\n		</colgroup><tbody>\r\n		    									    <tr>\r\n				<th class=\"table-label\">\r\n				    Mã hàng				</th>\r\n				<td class=\"data_sku\">\r\n				    8935092807849				</td>\r\n			    </tr>\r\n					    									    <tr>\r\n				<th class=\"table-label\">\r\n				    Nhà Cung Cấp\r\n	                        <td class=\"data_sku\">\r\n				    TNE </td>				</td>				</th>\r\n			\r\n					    									    \r\n			</tr>\r\n		    		</tbody>\r\n	    </table>$$$<div id=\"desc_content\" class=\"std\">\r\n		    <p dir=\"ltr\" style=\"text-align: justify;\"><strong>Đèn cực tím</strong></p>\r\n\r\n<p dir=\"ltr\" style=\"text-align: justify;\">- Đèn cực tím 120cm có chân 1 bóng TNE UV-C là thiết bị dùng để phòng chống virus, vi khuẩn. Tương ứng với mỗi 1w cho 1(m3) khối tích phòng , kèm thời gian là 30 phút, nếu công suất đèn cực tím lớn hơn thì thời gian ít hơn theo tỉ lệ. Nếu phòng có nhiều đồ vật thì thời gian chiếu đèn lâu hơn.</p>\r\n\r\n\r\n', 'thietbikhac', 'TBK');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhhanghoa`
--

CREATE TABLE `hinhhanghoa` (
  `MaHinh` int(11) NOT NULL,
  `MSHH` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TenHinh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `HinhChiTiet` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hinhhanghoa`
--

INSERT INTO `hinhhanghoa` (`MaHinh`, `MSHH`, `TenHinh`, `HinhChiTiet`) VALUES
(1, 'chiphauthuat_1', 'http://localhost/Dungcuyte/assets/dungcuyte/chiphauthuat/1.jpg', 'http://localhost/Dungcuyte/assets/dungcuyte/chiphauthuat/1.jpg$$$http://localhost/Dungcuyte/assets/dungcuyte/chiphauthuat/2.jpg'),
(2, 'chiphauthuat_2', 'http://localhost/Dungcuyte/assets/dungcuyte/chiphauthuat/2.jpg', 'http://localhost/Dungcuyte/assets/dungcuyte/chiphauthuat/1.jpg$$$http://localhost/Dungcuyte/assets/dungcuyte/chiphauthuat/2.jpg'),
(3, 'dailung_1', 'http://localhost/Dungcuyte/assets/dungcuyte/dailung/1.jpg', 'http://localhost/Dungcuyte/assets/dungcuyte/dailung/1.jpg$$$http://localhost/Dungcuyte/assets/dungcuyte/dailung/2.jpg'),
(4, 'dailung_2', 'http://localhost/Dungcuyte/assets/dungcuyte/dailung/2.jpg', 'http://localhost/Dungcuyte/assets/dungcuyte/dailung/1.jpg$$$http://localhost/Dungcuyte/assets/dungcuyte/dailung/2.jpg'),
(5, 'ghebo_1', 'http://localhost/Dungcuyte/assets/dungcuyte/ghebo/1.jpg', 'http://localhost/Dungcuyte/assets/dungcuyte/ghebo/1.jpg$$$http://localhost/Dungcuyte/assets/dungcuyte/ghebo/2.jpg'),
(6, 'ghebo_2', 'http://localhost/Dungcuyte/assets/dungcuyte/ghebo/2.jpg', 'http://localhost/Dungcuyte/assets/dungcuyte/ghebo/1.jpg$$$http://localhost/Dungcuyte/assets/dungcuyte/ghebo/2.jpg'),
(7, 'maydohuyetap_1', 'http://localhost/Dungcuyte/assets/dungcuyte/maydohuyetap/1.jpg', 'http://localhost/Dungcuyte/assets/dungcuyte/maydohuyetap/1.jpg$$$http://localhost/Dungcuyte/assets/dungcuyte/maydohuyetap/2.jpg$$$http://localhost/Dungcuyte/assets/dungcuyte/maydohuyetap/3.jpg$$$http://localhost/Dungcuyte/assets/dungcuyte/maydohuyetap/4.jpg'),
(8, 'maydohuyetap_2', 'http://localhost/Dungcuyte/assets/dungcuyte/maydohuyetap/2.jpg', 'http://localhost/Dungcuyte/assets/dungcuyte/maydohuyetap/1.jpg$$$http://localhost/Dungcuyte/assets/dungcuyte/maydohuyetap/2.jpg$$$http://localhost/Dungcuyte/assets/dungcuyte/maydohuyetap/3.jpg$$$http://localhost/Dungcuyte/assets/hinhanh/hoa/2/4.jpghttp://localhost/Dungcuyte/assets/dungcuyte/maydohuyetap/4.jpg'),
(9, 'maydohuyetap_3', 'http://localhost/Dungcuyte/assets/dungcuyte/maydohuyetap/3.jpg', 'http://localhost/Dungcuyte/assets/dungcuyte/maydohuyetap/1.jpg$$$http://localhost/Dungcuyte/assets/dungcuyte/maydohuyetap/2.jpg$$$http://localhost/Dungcuyte/assets/dungcuyte/maydohuyetap/3.jpg$$$http://localhost/Dungcuyte/assets/dungcuyte/maydohuyetap/4.jpg'),
(10, 'maydohuyetap_4', 'http://localhost/Dungcuyte/assets/dungcuyte/maydohuyetap/4.jpg', 'http://localhost/Dungcuyte/assets/dungcuyte/maydohuyetap/1.jpg$$$http://localhost/Dungcuyte/assets/dungcuyte/maydohuyetap/2.jpg$$$http://localhost/Dungcuyte/assets/dungcuyte/maydohuyetap/3.jpg$$$http://localhost/Dungcuyte/assets/dungcuyte/maydohuyetap/4.jpg'),
(11, 'mayhotro_1', 'http://localhost/Dungcuyte/assets/dungcuyte/mayhotro/1.jpg', 'http://localhost/Dungcuyte/assets/dungcuyte/mayhotro/1.jpg$$$http://localhost/Dungcuyte/assets/dungcuyte/mayhotro/2.jpg$$$http://localhost/Dungcuyte/assets/dungcuyte/mayhotro/3.jpg$$$http://localhost/Dungcuyte/assets/dungcuyte/mayhotro/4.jpg'),
(12, 'mayhotro_2', 'http://localhost/Dungcuyte/assets/dungcuyte/mayhotro/2.jpg', 'http://localhost/Dungcuyte/assets/dungcuyte/mayhotro/1.jpg$$$http://localhost/Dungcuyte/assets/dungcuyte/mayhotro/2.jpg$$$http://localhost/Dungcuyte/assets/dungcuyte/mayhotro/3.jpg$$$http://localhost/Dungcuyte/assets/dungcuyte/mayhotro/4.jpg'),
(13, 'mayhotro_3', 'http://localhost/Dungcuyte/assets/dungcuyte/mayhotro/3.jpg', 'http://localhost/Dungcuyte/assets/dungcuyte/mayhotro/1.jpg$$$http://localhost/Dungcuyte/assets/dungcuyte/mayhotro/2.jpg$$$http://localhost/Dungcuyte/assets/dungcuyte/mayhotro/3.jpg$$$http://localhost/Dungcuyte/assets/dungcuyte/mayhotro/4.jpg'),
(14, 'mayhotro_4', 'http://localhost/Dungcuyte/assets/dungcuyte/mayhotro/4.jpg', 'http://localhost/Dungcuyte/assets/dungcuyte/mayhotro/1.jpg$$$http://localhost/Dungcuyte/assets/dungcuyte/mayhotro/2.jpg$$$http://localhost/Dungcuyte/assets/dungcuyte/mayhotro/3.jpg$$$http://localhost/Dungcuyte/assets/dungcuyte/mayhotro/4.jpg'),
(15, 'maytrothinh_1', 'http://localhost/Dungcuyte/assets/dungcuyte/maytrothinh/1.jpg', 'http://localhost/Dungcuyte/assets/dungcuyte/maytrothinh/1.jpg$$$http://localhost/Dungcuyte/assets/dungcuyte/maytrothinh/2.jpg'),
(16, 'maytrothinh_2', 'http://localhost/Dungcuyte/assets/dungcuyte/maytrothinh/2.jpg', 'http://localhost/Dungcuyte/assets/dungcuyte/maytrothinh/1.jpg$$$http://localhost/Dungcuyte/assets/dungcuyte/maytrothinh/2.jpg'),
(17, 'thietbikhac_1', 'http://localhost/Dungcuyte/assets/dungcuyte/thietbikhac/1.jpg', 'http://localhost/Dungcuyte/assets/dungcuyte/thietbikhac/1.jpg$$$http://localhost/Dungcuyte/assets/dungcuyte/thietbikhac/2.jpg$$$http://localhost/Dungcuyte/assets/dungcuyte/thietbikhac/3.jpg$$$http://localhost/Dungcuyte/assets/dungcuyte/thietbikhac/4.jpg'),
(18, 'thietbikhac_2', 'http://localhost/Dungcuyte/assets/dungcuyte/thietbikhac/2.jpg', 'http://localhost/Dungcuyte/assets/dungcuyte/thietbikhac/1.jpg$$$http://localhost/Dungcuyte/assets/dungcuyte/thietbikhac/2.jpg$$$http://localhost/Dungcuyte/assets/dungcuyte/thietbikhac/3.jpg$$$http://localhost/Dungcuyte/assets/dungcuyte/thietbikhac/4.jpg'),
(19, 'thietbikhac_3', 'http://localhost/Dungcuyte/assets/dungcuyte/thietbikhac/3.jpg', 'http://localhost/Dungcuyte/assets/dungcuyte/thietbikhac/1.jpg$$$http://localhost/Dungcuyte/assets/dungcuyte/thietbikhac/2.jpg$$$http://localhost/Dungcuyte/assets/dungcuyte/thietbikhac/3.jpg$$$http://localhost/Dungcuyte/assets/dungcuyte/thietbikhac/4.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MSKH` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `HoTenKH` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TenCongTy` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SoDienThoai` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `User` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MSKH`, `HoTenKH`, `TenCongTy`, `SoDienThoai`, `Email`, `User`, `Password`) VALUES
('KH1117995853', 'huy', 'ctu', '12345', 'huy12@gmail.com', 'huy', '123'),
('KH1935934101', 'Nguyen Duy Khang', 'CTU- Ky Thuat Phan Mem', '012345678', 'khang@gmail.com', 'khang', 'khang');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaihanghoa`
--

CREATE TABLE `loaihanghoa` (
  `MaLoaiHang` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TenLoaiHang` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaihanghoa`
--

INSERT INTO `loaihanghoa` (`MaLoaiHang`, `TenLoaiHang`) VALUES
('CPT', 'Chi Phau Thuat'),
('DL', 'Dai Lung'),
('GB', 'Ghe Bo'),
('MHA', 'May Do Huyet Ap'),
('MM', 'May Massage'),
('MTT', 'May Tro Thinh'),
('TBK', 'Thiet Bi Khac');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MSNV` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `HoTenNV` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ChucVu` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DiaChi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SoDienThoai` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `User` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MSNV`, `HoTenNV`, `ChucVu`, `DiaChi`, `SoDienThoai`, `User`, `Password`) VALUES
('A01', 'Nguyen Duy Khang', 'Giam Doc', 'Can Tho', '000000', 'admin', 'admin');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD PRIMARY KEY (`SoDonDH`,`MSHH`),
  ADD KEY `MSHH` (`MSHH`);

--
-- Chỉ mục cho bảng `dathang`
--
ALTER TABLE `dathang`
  ADD PRIMARY KEY (`SoDonDH`),
  ADD KEY `MSNV` (`MSNV`),
  ADD KEY `MSKH` (`MSKH`);

--
-- Chỉ mục cho bảng `diachi`
--
ALTER TABLE `diachi`
  ADD PRIMARY KEY (`MADC`),
  ADD KEY `MSKH` (`MSKH`);

--
-- Chỉ mục cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`MSHH`),
  ADD KEY `MaLoaiHang` (`MaLoaiHang`);

--
-- Chỉ mục cho bảng `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  ADD PRIMARY KEY (`MaHinh`),
  ADD KEY `chitiethanghoa_ibfk_1` (`MSHH`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MSKH`);

--
-- Chỉ mục cho bảng `loaihanghoa`
--
ALTER TABLE `loaihanghoa`
  ADD PRIMARY KEY (`MaLoaiHang`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MSNV`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitietdathang`
--
ALTER TABLE `chitietdathang`
  MODIFY `SoDonDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2100933779;

--
-- AUTO_INCREMENT cho bảng `dathang`
--
ALTER TABLE `dathang`
  MODIFY `SoDonDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2100933779;

--
-- AUTO_INCREMENT cho bảng `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  MODIFY `MaHinh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8843;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD CONSTRAINT `chitietdathang_ibfk_1` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chitietdathang_ibfk_2` FOREIGN KEY (`SoDonDH`) REFERENCES `dathang` (`SoDonDH`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `dathang`
--
ALTER TABLE `dathang`
  ADD CONSTRAINT `dathang_ibfk_1` FOREIGN KEY (`MSNV`) REFERENCES `nhanvien` (`MSNV`),
  ADD CONSTRAINT `dathang_ibfk_2` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`);

--
-- Các ràng buộc cho bảng `diachi`
--
ALTER TABLE `diachi`
  ADD CONSTRAINT `diachi_ibfk_1` FOREIGN KEY (`MSKH`) REFERENCES `khachhang` (`MSKH`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD CONSTRAINT `hanghoa_ibfk_1` FOREIGN KEY (`MaLoaiHang`) REFERENCES `loaihanghoa` (`MaLoaiHang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hinhhanghoa`
--
ALTER TABLE `hinhhanghoa`
  ADD CONSTRAINT `hinhhanghoa_ibfk_1` FOREIGN KEY (`MSHH`) REFERENCES `hanghoa` (`MSHH`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
