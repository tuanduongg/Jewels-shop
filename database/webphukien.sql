-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2022 at 10:54 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webphukien`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` char(15) NOT NULL,
  `email` char(50) NOT NULL,
  `address` text NOT NULL,
  `password` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `phone`, `email`, `address`, `password`) VALUES
(1, 'Vân Anh', '0925988232', 'vana@gmail.com', 'Bắc Giang', '12345'),
(2, 'Tuấn Anh', '0933123432', 'tuananh@gmail.com', 'Vĩnh Phúc', '12345'),
(3, 'Hoàng', '0978123432', 'hoang@gmail.com', 'Bắc Giang', '12345'),
(4, 'Đình Huy', '094576321', 'huy@gmail.com', 'Hà Nội', '12345'),
(5, 'Tomy Xiaomi', '09342345612', 'tomy@gmail.com', 'Anh Quốc', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `manufacture`
--

CREATE TABLE `manufacture` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manufacture`
--

INSERT INTO `manufacture` (`id`, `name`, `phone`) VALUES
(1, 'Huy Trung', '0915988232'),
(2, 'Hồng Hoà', '0123123432'),
(3, 'Kokomi', '0932598845'),
(4, 'Hảo Hảo', '0945673213'),
(8, 'Jaxred', '01232453215');

-- --------------------------------------------------------

--
-- Table structure for table `oders`
--

CREATE TABLE `oders` (
  `id` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total_price` float NOT NULL,
  `status` tinyint(4) NOT NULL,
  `name_recever` varchar(50) NOT NULL,
  `phone_recever` char(15) NOT NULL,
  `address_recever` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `oders`
--

INSERT INTO `oders` (`id`, `id_customer`, `created_at`, `total_price`, `status`, `name_recever`, `phone_recever`, `address_recever`) VALUES
(1, 1, '2022-05-08 09:48:08', 152000, 0, 'Vân Anh', '0913567321', 'Bắc Giang'),
(2, 3, '2022-05-08 15:49:54', 40000, 1, 'Huy', '0945763812', 'Hà Nam'),
(3, 2, '2022-05-08 16:06:01', 55000, 1, 'Vân Anh', '0913567321', 'Lĩnh Nam-Hoàng Mai'),
(9, 4, '2022-04-28 16:58:28', 391000, 1, 'Đình Huy Nhận Tiền', '094576321', 'Hà Nội'),
(10, 1, '2022-04-10 16:48:52', 234000, 1, 'Vân Anh Chuyên Bùng Hàng', '0925988232', 'Vĩnh Hưng - Bắc Giang'),
(11, 1, '2022-05-11 16:58:05', 22000, 1, 'Vân Anh hgdfgdfg', '0925988232', 'Bắc Giang'),
(12, 3, '2022-05-11 02:43:36', 553500, 1, 'Hoàng Không Nhận Hàng Đâu', '0978123432', 'Việt Yên - Bắc Giang'),
(13, 1, '2022-05-11 16:57:20', 48000, 1, 'Vân Anh', '0925988232', 'Bắc Giang'),
(14, 1, '2022-05-18 08:46:35', 2155500, 0, 'Vân Anh nhận nè', '0925988232', 'Bắc Giang'),
(15, 1, '2022-05-12 03:12:50', 354800, 0, 'Vân Anh', '0925988232', 'Bắc Giang'),
(16, 1, '2022-05-12 03:14:47', 333500, 0, 'Vân Anh', '0925988232', 'Bắc Giang'),
(17, 1, '2022-05-12 03:17:48', 1052000, 1, 'Vân Anh', '0925988232', 'Bắc Giang'),
(18, 1, '2022-05-14 10:20:26', 210000, 0, 'Hà ', '98776678678', 'Bắc Giang');

-- --------------------------------------------------------

--
-- Table structure for table `oder_detail`
--

CREATE TABLE `oder_detail` (
  `oder_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `oder_detail`
--

INSERT INTO `oder_detail` (`oder_id`, `product_id`, `quantity`) VALUES
(1, 1, 1),
(1, 4, 1),
(1, 5, 1),
(2, 3, 2),
(3, 7, 1),
(9, 3, 4),
(9, 7, 1),
(9, 11, 4),
(10, 3, 4),
(10, 8, 7),
(11, 8, 1),
(12, 7, 4),
(12, 10, 5),
(13, 1, 4),
(14, 8, 5),
(14, 10, 5),
(14, 11, 8),
(14, 29, 4),
(15, 8, 4),
(15, 10, 4),
(16, 10, 5),
(17, 7, 7),
(17, 10, 10),
(18, 3, 5),
(18, 8, 5);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `price` float NOT NULL,
  `description` text NOT NULL,
  `id_manufacture` int(11) NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `description`, `id_manufacture`, `photo`) VALUES
(1, 'Sun & Moon Charm 18k Gold Vermeil', 12000, 'An ode to the darkness and light, our Sun & Moon Charm in 18k Gold Vemeil is a reminder to honor the cycles in our own lives – the joys and the challenges that each offer their own specialness and beauty.', 1, 'photos/1652023276anh1.png'),
(3, 'Diamond Wave Bolo Bracelet in Sterling Silver', 20000, 'Wrap your wrist in this elegant diamond bolo bracelet. Crafted in sterling silver, this pleasing design showcases sparkling diamond composites centered in open diamond-touched wave-shaped links. Captivating with 1/2 ct. t.w. of diamonds and a bright polished shine, this wheat chain bracelet adjusts up to 9.5 inches in length and secures with a bolo clasp and ball ends.', 4, 'photos/1652023330anh2.png'),
(4, 'Diamond Accent Mom Heart Necklace in Sterling Silver', 100000, 'Mom has held your hand through the good times and the bad. Celebrate your love for her. This wonderful \"Mom\" pendant is beautifully crafted of sterling silver. Sparkling diamond accents outline the heart for a sweet final touch. The whimsical treat glitters at the center of a rope chain 18.0 inches in length with a spring-ring clasp.', 3, 'photos/1652023338anh3.jpg'),
(5, 'Everlyne Yellow Cord Friendship Bracelet in Dichroic Glass', 40000, 'Mom has held your hand through the good times and the bad. Celebrate your love for her. This wonderful \"Mom\" pendant is beautifully crafted of sterling silver. Sparkling diamond accents outline the heart for a sweet final touch. The whimsical treat glitters at the center of a rope chain 18.0 inches in length with a spring-ring clasp.', 2, 'photos/1652023360anh4.png'),
(7, 'Heart & Soul Beaded Friendship Bracelets Set of 2 in Red Ombre Mix', 55000, 'Mom has held your hand through the good times and the bad. Celebrate your love for her. This wonderful \"Mom\" pendant is beautifully crafted of sterling silver. Sparkling diamond accents outline the heart for a sweet final touch. The whimsical treat glitters at the center of a rope chain 18.0 inches in length with a spring-ring clasp.', 3, 'photos/1652023367anh5.png'),
(8, 'Kendra Scott Face Mask Set of 2 in Yellow Print & White', 22000, 'Wrap your wrist in this elegant diamond bolo bracelet. Crafted in sterling silver, this pleasing design showcases sparkling diamond composites centered in open diamond-touched wave-shaped links. Captivating with 1/2 ct. t.w. of diamonds and a bright polished shine, this wheat chain bracelet adjusts up to 9.5 inches in length and secures with a bolo clasp and ball ends.', 4, 'photos/1652023375anh6.png'),
(10, 'Dora 7075-C1 - Nam', 66700, 'Kính Chứ Không Dâm', 2, 'photos/1652023382anh7.jpg'),
(11, 'Dora 6198-C4 - Nữ', 64000, 'Cũng là kính dâm nè nhưng kinh kính này dâm hơn', 3, 'photos/1652023389anh8.jpg'),
(12, 'Curnon Stella Cuff', 27000, 'Được lấy cảm hứng từ Frank Stella - nhà họa sĩ tài năng, cũng là một trong những người có ảnh hưởng nhất trong trường phái Minimalism - tối giản, vòng tay Stella Cuff với 3 phiên bản màu Silver, Gunmetal và Rosegold chắc chắn sẽ là 1 chiếc vòng tay phù hợp để song hành cùng bất kì chiếc đồng hồ Curnon nào của bạn.', 1, 'photos/1652023395anh9.jpg'),
(29, 'Nhẫn ajax', 300000, 'Nhẫn Này Xịn Lắm đấy', 2, 'photos/1652063657anh12.jpg'),
(30, 'GOLD BRACELETS', 150000, 'Versatile and timeless, make a statement with these forever classics that are sure to complete and elevate any outfit.', 8, 'photos/1652063715.jpg'),
(32, 'Dây chuyền Kuu Clothes', 65000, 'Vòng cổ nam nữ unisex dây chuyền Kuu Clothes màu bạc Titan đẹp phụ kiện thời trang - Vòng cổ Goddess\r\n\r\nChất liệu: Titan không gỉ', 2, 'photos/1652862015.jpg'),
(33, 'Eagle Ring Mắt Cú', 39000, 'Nhẫn nam titan không gỉ thời trang Eagle Ring Mắt Cú Mèo Kuu Clothes Freesize Màu bạc chất liệu Titan không gỉ - nhẫn đôi nam nữ đẹp\r\n\r\nChất liệu: Titan không gỉ\r\nKích thước: freesize có thể tùy ý điều chỉnh', 4, 'photos/1652862173.jpg'),
(34, 'Dây Chuyền Thánh Giá', 45000, '- Sản phẩm: Dây Chuyền Thánh Giá Cực Chất\r\n- Chất liệu: Kim loại, hợp kim titan chống gì\r\n- Loại dây: Dây Kim Loại\r\n- Mặt dây chuyền: Thánh Giá Nhiều họa tiết\r\n- Cảm giác thoải mái không gây dị ứng\r\n- Phong cách trẻ trung, thời thượng', 1, 'photos/1652862463.jpg'),
(35, ' Nhẫn Vàng Nam Hình Rồng', 50000, ' Kích thước (Mỹ): 7/8/9/10/11/12/13/14\r\n  Thiết kế thời trang, đơn giản, phong cách và chất lượng cao.\r\n  Sản phẩm là một món quà rất lý tưởng cho chính bạn và người đặc biệt.\r\n  Thích hợp sử dụng đi tiệc cưới hoặc đi tiệc.', 1, 'photos/1652862598.jpg'),
(36, 'Dây Chuyền Nam Đại Bàng', 89000, 'Sở hữu thiết kế với vẻ đẹp tinh tế\r\nSáng bóng, bền đẹp theo thơi gian\r\nThiết kế đính đá một cách tinh xảo hoàn hảo\r\nCó thể mix với những bộ trang phục yêu thích\r\nChim đại bàng biểu tượng cho sức mạnh, lòng can đảm, tầm nhìn xa, sự bất tử và chưa đựng nhiều bài học quý giá cho cuộc sống.', 3, 'photos/1652862687.jpg'),
(37, 'Nhẫn nam cổ điển bán', 60000, 'Loại: nhẫn, nhẫn\r\nChất liệu: Hợp kim\r\nPhong cách: đơn giản\r\nMã số: NR132-NR135\r\n\r\nTạo kiểu: Động vật/Cung hoàng đạo\r\nQuá trình xử lý: nhỏ giọt dầu\r\nCác dịp tặng quà áp dụng: du lịch để kỷ niệm đám cưới\r\nĐóng gói: đóng gói độc lập\r\nChế biến tùy chỉnh: Có', 8, 'photos/1652862801.jpg'),
(38, 'Bông tai nữ Xiaomy', 40000, 'THÔNG TIN SẢN PHẨM\r\nXUẤT XỨ : HÀN QUỐC\r\nLOẠI SẢN PHẨM : TRANG SỨC ( BÔNG TAI , HOA TAI , KHUYÊN TAI )\r\nCHẤT LIỆU : HỢP KIM + MẠ BẠC S925\r\nMÀU SẮC : NHIỀU MÀU', 8, 'photos/1652862928.jpg'),
(39, 'Bông tai vintage', 60000, ' Thương hiệu: FAMSHIN\r\n  Loại kim loại: Hợp kim kẽm\r\n  Chất liệu: Kim loại\r\n  Loại bông tai: Bông tai xỏ\r\n  Loại sản phẩm: Hoa tai\r\n  Mỹ phẩm hoặc thời trang: Thời trang', 3, 'photos/1652863053.jpg'),
(40, 'Vòng Tay xiama', 20000, 'Màu sắc: vàng bạc\r\n  Kích thước: có thể điều chỉnh\r\n  Loại sản phẩm: Vòng đeo tay\r\n  Đóng gói: Đóng gói riêng lẻ\r\n  Số lượng: 1\r\n  Tình trạng sản phẩm: Sản phẩm hoàn toàn mới 100% \r\n  Chất liệu: hợp kim', 3, 'photos/1652863137.jpg'),
(41, 'Khuyên kẹp vành tai hình chiếc lá', 20000, 'Metals Type : Zinc Alloy\r\nStyle : TRENDY\r\nFine or Fashion : Fashion\r\nItem Type : Earrings\r\nEarring Type : Drop Earrings\r\nShapepattern : Geometric\r\nMaterial : Metal\r\nGender : Women', 1, 'photos/1652863268.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufacture`
--
ALTER TABLE `manufacture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oders`
--
ALTER TABLE `oders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indexes for table `oder_detail`
--
ALTER TABLE `oder_detail`
  ADD PRIMARY KEY (`oder_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_manufacture` (`id_manufacture`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `manufacture`
--
ALTER TABLE `manufacture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `oders`
--
ALTER TABLE `oders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `oders`
--
ALTER TABLE `oders`
  ADD CONSTRAINT `oders_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`);

--
-- Constraints for table `oder_detail`
--
ALTER TABLE `oder_detail`
  ADD CONSTRAINT `oder_detail_ibfk_1` FOREIGN KEY (`oder_id`) REFERENCES `oders` (`id`),
  ADD CONSTRAINT `oder_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_manufacture`) REFERENCES `manufacture` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
