-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 27, 2021 at 02:34 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ltw_ass`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `name`) VALUES
(1, 'admin1', 'e00cf25ad42683b3df678c61f42c6bda', 'Bao');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Mobie'),
(2, 'Laptop'),
(3, 'Desktop');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(255) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `phone_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `username`, `password`, `address`, `fullname`, `phone_number`) VALUES
(1, 'user1', '24c9e15e52afc47c225b757e7bee1f9d', 'Đà Nẵng, Việt Nam', 'Bảo', '0941123456');

-- --------------------------------------------------------

--
-- Table structure for table `list_product_in_order`
--

CREATE TABLE `list_product_in_order` (
  `order_id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `qty` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `list_product_in_order`
--

INSERT INTO `list_product_in_order` (`order_id`, `product_id`, `product_name`, `qty`) VALUES
(14, 10, 'Samsung Galaxy A22', 1),
(15, 26, 'Asus Zen AiO A5401WRAT', 2),
(15, 17, 'Laptop Dell Inspiron 3501', 2),
(15, 12, 'iPhone 13 Pro Max 256GB', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `order_id` int(255) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `date_order` datetime NOT NULL,
  `totalprice` int(255) NOT NULL,
  `status` int(50) NOT NULL,
  `hide` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`order_id`, `customer_id`, `date_order`, `totalprice`, `status`, `hide`) VALUES
(13, '1', '2021-11-06 21:10:28', 3000000, 2, 1),
(14, '1', '2021-11-22 17:25:08', 5490000, 1, 0),
(15, '1', '2021-11-22 17:25:46', 203530000, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(20) NOT NULL,
  `category_id` int(10) NOT NULL,
  `sub_desc` text NOT NULL,
  `main_desc` text NOT NULL,
  `feature_prod` tinyint(1) NOT NULL,
  `new_prod` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `category_id`, `sub_desc`, `main_desc`, `feature_prod`, `new_prod`) VALUES
(1, 'Samsung Galaxy A52s 5G', 10990000, 'product1_7.jpg', 1, 'Màn hình: Super AMOLED 6.5 Full HD+/Hệ điều hành: Android 11/Chip xử lý (CPU): Snapdragon 778G 5G 8 nhân/RAM: 8 GB/Bộ nhớ trong: 128 GB', 'Samsung đã chính thức giới thiệu chiếc điện thoại Galaxy A52s 5G đến người dùng, đây phiên bản nâng cấp của Galaxy A52 5G ra mắt cách đây không lâu, với ngoại hình không đổi nhưng được nâng cấp đáng kể về thông số cấu hình bên trong.', 0, 0),
(2, 'Xiaomi 11T 5G', 11490000, 'product1_8.jpg', 1, 'Màn hình: Super AMOLED 6.67 Full HD+/Hệ điều hành: Android 11/Chip xử lý (CPU):MediaTek Dimensity 1200/RAM: 8 GB/Bộ nhớ trong: 256 GB', 'Xiaomi 11T 5G sở hữu màn hình AMOLED, viên pin siêu khủng cùng camera độ phân giải 108 MP, chiếc smartphone này của Xiaomi sẽ đáp ứng mọi nhu cầu sử dụng của bạn, từ giải trí đến làm việc đều vô cùng mượt mà. ', 0, 0),
(3, 'OPPO A95', 6990000, 'product1_9.jpg', 1, 'Màn hình: Super AMOLED 6.43 Full HD+/Hệ điều hành: Android 11/Chip xử lý (CPU):Snapdragon 662/RAM: 8 GB/Bộ nhớ trong: 128 GB', 'Bên cạnh phiên bản 5G, OPPO còn bổ sung phiên bản OPPO A95 4G với giá thành phải chăng tập trung vào thiết kế năng động, sạc nhanh và hiệu năng đa nhiệm ấn tượng sẽ giúp cho cuộc sống của bạn thêm phần hấp dẫn, ngập tràn niềm vui.', 0, 0),
(4, 'Realme C11', 2990000, 'product1_10.jpg', 1, 'Màn hình: LCD 6.5 HD+/Hệ điều hành: Android 11 (Go Edition)/Chip xử lý (CPU):Spreadtrum SC9863A/RAM: 2 GB/Bộ nhớ trong: 32 GB', 'Các dòng smartphone giá rẻ ngày càng được ưa chuộng trên thị trường di động, nắm bắt được nhu cầu đó Realme cũng đã cho ra mắt chiếc điện thoại Realme C11 (2021) là một phiên bản đồng tên gọi với Realme C11 ra mắt trước đó.', 0, 0),
(5, 'OPPO Reno6 Pro 5G', 18990000, 'product1_11.jpg', 1, 'Màn hình: AMOLED 6.55 Full HD+/Hệ điều hành: Android 11/Chip xử lý (CPU):Snapdragon 870 5G/RAM: 12 GB/Bộ nhớ trong: 256 GB', 'OPPO Reno6 Pro 5G - một sản phẩm thuộc dòng Reno6 của OPPO, thỏa mãn những gì người tiêu dùng đã trông đợi với cấu hình khủng cùng hệ thống camera cực ấn tượng và ngoại hình bắt mắt, thật hào hứng mong chờ để được trải nghiệm.', 0, 0),
(6, 'Samsung Galaxy Z Fold3 5G 512GB', 44990000, 'product1_12.jpg', 1, 'Màn hình: Dynamic AMOLED 2X Chính 7.6 & Phụ 6.2 Full HD+/Hệ điều hành: Android 11/Chip xử lý (CPU):Snapdragon 888/RAM: 12 GB/Bộ nhớ trong: 512 GB', 'Galaxy Z Fold3 5G đánh dấu bước tiến mới của Samsung trong phân khúc điện thoại gập cao cấp khi được cải tiến về độ bền cùng những nâng cấp đáng giá về cấu hình hiệu năng, hứa hẹn sẽ mang đến trải nghiệm sử dụng đột phá cho người dùng.', 0, 0),
(7, 'Samsung Galaxy Z Flip3 5G 256GB', 26990000, 'product1_13.jpg', 1, 'Màn hình: Dynamic AMOLED 2X Chính 6.7 & Phụ 1.9 Full HD+/Hệ điều hành: Android 11/Chip xử lý (CPU):Snapdragon 888/RAM: 8 GB/Bộ nhớ trong: 256 GB', 'Nối tiếp thành công của Galaxy Z Flip 5G, trong sự kiện Galaxy Unpacked vừa qua Samsung tiếp tục giới thiệu đến thế giới về Galaxy Z Flip3 5G 256GB. Sản phẩm có nhiều cải tiến từ độ bền cho đến hiệu năng và thậm chí nó còn vượt xa hơn mong đợi của mọi người.', 0, 0),
(8, 'OPPO Find X3 Pro 5G', 23990000, 'product1_14.jpg', 1, 'Màn hình: AMOLED 6.7 Quad HD+ (2K+)/Hệ điều hành: Android 11/Chip xử lý (CPU):Snapdragon 888/RAM: 12 GB/Bộ nhớ trong: 256 GB', 'OPPO đã làm khuynh đảo thị trường smartphone khi cho ra đời chiếc điện thoại OPPO Find X3 Pro 5G. Đây là một sản phẩm có thiết kế độc đáo, sở hữu cụm camera khủng, cấu hình thuộc top đầu trong thế giới Android.', 0, 0),
(9, 'Samsung Galaxy A12', 3989000, 'product1_1.jfif', 1, 'Màn hình: PLS TFT LCD 6.5\",HD+/Hệ điều hành : Android 11/Chip xử lý Exynos 850 8 nhân/Ram: 4 GB/Bộ nhớ trong: 128 GB', 'Samsung Galaxy A12 mang diện mạo thân thuộc của những chiếc Samsung tiền nhiệm. Với thiết kế nguyên khối, lớp vỏ máy được đúc bao quanh thân máy chắc chắn, bền chặt. Phần camera trước được đặt trong mô hình giọt nước giúp tăng diện tích cho màn hình.', 1, 0),
(10, 'Samsung Galaxy A22', 5490000, 'product1_2.jfif', 1, 'Màn hình: Super AMOLED/Hệ điều hành: Android 11/Chip xử lý (CPU): MediaTek MT6769V 8 nhân/RAM: 6 GB/Bộ nhớ trong: 128 GB', 'Sở hữu màn hình Super Amoled rộng 6.4 inch, Samsung Galaxy A22 luôn thu hút sự quan tâm của bất kỳ người tiêu dùng nào đang tìm kiếm tiêu chí này. Kích thước màn hình lớn là một ưu điểm để bạn trải nghiệm nhìn ngắm mọi thứ thoải mái hơn trong giải trí cũng như các thao tác hằng ngày. ', 1, 0),
(11, 'Samsung Galaxy A52', 9790000, 'product1_3.jfif', 1, 'Màn hình: Super AMOLED/Hệ điều hành:  Android 11/Chip xử lý (CPU): Snapdragon 778G 5G 8 nhân/RAM: 8 GB/Bộ nhớ trong: 256 GB', 'Samsung Galaxy A52s tiếp tục sử dụng ngôn ngữ thiết kế nguyên khối theo phong cách trẻ trung với các tuỳ chọn màu sắc như: Đen, trắng, tím và xanh mint.', 0, 1),
(12, 'iPhone 13 Pro Max 256GB', 37990000, 'product1_4.jfif', 1, 'Màn hình: Super Retina XDR 6.7/Hệ điều hành: iOS 15/Chip: A15 Bionic/RAM: 6 GB/Bộ nhớ trong: 256 GB', 'IPhone 13 Pro Max. Một nâng cấp hệ thống camera chuyên nghiệp hoành tráng chưa từng có. Màn hình Super Retina XDR với ProMotion cho cảm giác nhanh nhạy hơn. Chip A15 Bionic thần tốc. Mạng 5G siêu nhanh.1 Thiết kế bền bỉ và thời lượng pin dài nhất từng có trên iPhone.', 1, 0),
(13, 'iPhone 11 Pro Max', 8445000, 'product1_5.jfif', 1, 'Màn hình: OLED,6.5,Super Retina XDR/Hệ điều hành: iOS 14/Chip: Apple A13 Bionic/RAM: 4 GB/Bộ nhớ trong: 64 GB', 'Chắc chắn lý do lớn nhất mà bạn muốn nâng cấp lên iPhone 11 Pro Max chính là cụm camera mới được Apple nâng cấp rất nhiều.', 0, 0),
(14, 'iphone XS Max 256G', 9675180, 'product1_6.jfif', 1, 'Màn hình: Super Retina XDR 6.7/Hệ điều hành: iOS 14/Chip: Apple A12 Bionic/RAM: 4 GB/Bộ nhớ trong: 256 GB', 'iPhone Xs Max được Apple trang bị cho con chip mới toanh hàng đầu của hãng mang tên Apple A12.Chip A12 Bionic được xây dựng trên tiến trình 7nm đầu tiên mà hãng sản xuất với 6 nhân đáp ứng vượt trội trong việc xử lý các tác vụ và khả năng tiết kiệm năng lượng tối ưu.', 0, 0),
(15, 'Laptop HP Pavilion', 15190000, 'product2_1.jfif', 2, 'Màn hình: 15.6 FHD (1920 x 1080) IPS/Hệ điều hành: Windows 11 Home/CPU: Intel Core i3-1125G4 2.0GHz/RAM: 4GB/Ổ cứng: 256GB PCIe NVMe M.2 SSD', 'Laptop HP Pavilion với thiết kế nắp lưng và chiếu nghỉ tay được làm bằng kim loại, phủ một lớp gam màu bạc sang trọng, tạo cảm giác mát tay khi sờ vào và cho khả năng tản nhiệt tốt. Bạn có thể dễ dàng cất gọn chiếc laptop này vào cặp xách, balo mang theo bên mình bởi trọng lượng của nó chỉ 1.682 kg và dày 17.9 mm.', 0, 1),
(16, 'Laptop HP 245 G8', 14490000, 'product2_2.jfif', 2, 'Màn hình: 14\"Full HD (1920 x 1080)/Hệ điều hành: Windows 10 Home SL/CPU: Ryzen, 53500U, 2.1GHz/RAM: 4GB/Ổ cứng: SSD 256 GB', 'Laptop HP 245 G8 là phiên bản nâng cấp nhẹ của series G7 với thiết kế gọn gàng hơn, hiệu năng mạnh mẽ và nhiều tính năng tiện ích hơn, phù hợp cho các bạn sinh viên, dân làm việc văn phòng.', 0, 0),
(17, 'Laptop Dell Inspiron 3501', 22490000, 'product2_3.jpg', 2, 'Màn hình: 15.6 Full HD (1920 x 1080)/Hệ điều hành: Windows 10 Home SL/CPU: i5, 1135G7, 2.4GHz/RAM: 8GB/Ổ cứng: SSD 512 GB NVMe PCIe', 'Laptop Dell Inspiron 3501 ẩn sâu trong vẻ ngoài đơn giản không kém phần hiện đại là bộ vi xử lý Intel Gen 11 tân tiến với sức mạnh hiệu năng phục vụ tốt các nhu cầu sử dụng văn phòng cũng như giải trí hàng ngày của đối tượng học sinh - sinh viên hay nhân viên văn phòng.', 1, 0),
(18, 'Laptop Dell Vostro 3400', 18890000, 'product2_4.jpg', 2, 'Màn hình: 14 Full HD (1920 x 1080)/Hệ điều hành: Windows 10 Home SL/CPU: i5, 1135G7, 2.4GHz/RAM: 8GB/Ổ cứng: SSD 256 GB NVMe PCIe', 'Với hiệu năng vượt trội đến từ con chip Intel Gen 11 tân tiến ẩn bên trong vẻ ngoài mang phong cách tối giản, thanh lịch, laptop Dell Vostro 3400 sẽ là một trong những gợi ý đáng để bạn tìm hiểu và chọn mua.', 0, 0),
(19, 'Laptop Apple MacBook Air M1', 28990000, 'product2_5.jpg', 2, 'Màn hình: 13.3 Retina (2560 x 1600)/Hệ điều hành: Mac OS/CPU: Apple M1/RAM: 8GB/Ổ cứng: 256 GB SSD', 'Laptop Apple MacBook Air M1 2020 thuộc dòng laptop cao cấp sang trọng có cấu hình mạnh mẽ, chinh phục được các tính năng văn phòng lẫn đồ hoạ mà bạn mong muốn, thời lượng pin dài, thiết kế mỏng nhẹ sẽ đáp ứng tốt các nhu cầu làm việc của bạn.', 0, 0),
(20, 'Laptop Apple MacBook Pro M1', 39990000, 'product2_6.jpg', 2, 'Màn hình: 13.3 Retina (2560 x 1600)/Hệ điều hành: Mac OS/CPU: Apple M1/RAM: 16GB/Ổ cứng: 256 GB SSD', 'Laptop Apple MacBook Pro M1 là chiếc máy tính xách tay cao cấp, được nâng lên một cấp độ hoàn toàn mới với bộ vi xử lý Apple M1 mạnh mẽ ẩn trong vẻ ngoài hiện đại và thanh lịch, phục vụ tốt cho công việc văn phòng cơ bản đến thiết kế đồ họa chuyên nghiệp.', 0, 1),
(21, 'Lenovo IdeaCentre AIO 3 24ITL6', 16890000, 'product3_1.jpg', 3, 'Màn hình: 23.8 inch, Full HD/Hệ điều hành: Windows 10 Home SL/CPU: Intel Core i3 Tiger Lake/RAM: 4GB/Ổ cứng: 256 GB SSD', 'Lenovo IdeaCentre AIO 3 24ITL6 có lối thiết kế đơn giản, hài hòa cùng cấu hình ổn định, mượt mà, tích hợp đầy đủ CPU, ổ cứng, loa, webcam vào chung màn hình, đáp ứng đầy đủ các nhu cầu cần thiết của người dùng.', 0, 0),
(22, 'HP AIO 22 df1019d', 21190000, 'product3_2.jpg', 3, 'Màn hình: 21.5 inch, Full HD/Hệ điều hành: Windows 10 Home SL/CPU: Intel Core i5 Tiger Lake/RAM: 4 GB/Ổ cứng: 512 GB SSD', 'Phiên bản máy tính nguyên bộ HP AIO 22 df1019d được thiết kế đầy đủ CPU, loa, với kiểu dáng gọn gàng, năng động cùng cấu hình mạnh mẽ, đi kèm cả chuột và bàn phím, là người cộng sự lý tưởng cho bất kỳ ai.', 1, 0),
(23, 'Asus AIO V241E', 20790000, 'product3_3.jpg', 3, 'Màn hình: 23.8 inch, Full HD/Hệ điều hành: Windows 10 Home SL/CPU: Intel Core i5 Tiger Lake/RAM: 8GB/Ổ cứng: 512 GB SSD', 'Asus AIO V241E thuộc dòng máy All-in-One thuận tiện khi tích hợp đầy đủ ổ cứng, CPU, loa và camera vào chung màn hình. Sản phẩm không chỉ mạnh mẽ về cấu hình mà còn mang đến một vẻ đẹp gọn gàng cho không gian làm việc của bạn.', 1, 0),
(24, 'Asus ExpertCenter AIO E5402WH', 22990000, 'product3_4.jpg', 3, 'Màn hình: 23.8 inch, Full HD/Hệ điều hành: Windows 10 Home SL/CPU: Intel Core i5 Tiger Lake/RAM: 8GB/Ổ cứng: 512 GB SSD', 'Asus ExpertCenter AIO E5402WH gây ấn tượng cho người dùng nhờ thiết kế hiện đại, độc đáo, vô cùng tiện lợi khi tích hợp đầy đủ ổ cứng dữ liệu, phần mềm CPU, loa, camera vào chung màn hình, có chuột và bàn phím không dây kèm theo.', 1, 0),
(25, 'iMac 24 inch M1', 39990000, 'product3_5.jpg', 3, 'Màn hình: 24 inch, 4.5K/Hệ điều hành: Mac OS/CPU: Apple M1 8-core/RAM: 8 GB/Ổ cứng: 256 GB SSD', 'iMac 24 inch M1 là mẫu máy tính để bàn tích hợp CPU vào màn hình của Apple với thiết kế vẻ ngoài hoàn toàn mới, màu sắc rực rỡ cùng hiệu năng vô cùng mạnh mẽ từ chip M1.', 1, 0),
(26, 'Asus Zen AiO A5401WRAT', 22290000, 'product3_6.jpg', 3, 'Màn hình: 23.8 inch, Full HD/Hệ điều hành: Windows 10 Home SL/CPU: Intel Core i5 Comet Lake/RAM: 8GB/Ổ cứng: 512 GB SSD', 'Asus Zen AiO A5401WRAT sở hữu kiểu dáng thời thượng với cấu hình mạnh mẽ, được thiết kế đầy đủ CPU, loa, đi kèm cả chuột và bàn phím, là bạn đồng hành lý tưởng cho bất kỳ ai.', 1, 1),
(27, 'Laptop Gaming Acer Aspire 7 A715 42G R4XX', 19990000, 'product2_7.jpg', 2, 'Màn hình: 15.6 Full HD (1920 x 1080)/Hệ điều hành: Windows 10 Home SL/CPU: AMD Ryzen 5 – 5500U/RAM: 8GB/Ổ cứng: SSD 256 GB NVMe PCIe', 'Acer Aspire 7 2020 A715 42G tích hợp card đồ họa NVIDIA GTX1650 4GB GDDR6, là laptop chơi game tốt nhất phân khúc. Không chỉ vậy, phiên bản này còn mang thiết kế mới gọn gàng và sexy hơn. Aspire 7 2020 được trang bị hệ thống tản nhiệt mạnh mẽ bậc nhất trong phân khúc, thừa hưởng công nghệ từ các dòng máy cao cấp hơn của Acer, cùng cấu hình đỉnh cao, giúp cho người dùng có thể vừa chơi game vừa làm việc ở bất cứ lúc nào.', 0, 0),
(28, 'Laptop Gaming MSI Bravo 15 B5DD 276VN', 22490000, 'product2_8.jpg', 2, 'Màn hình: 15.6 Full HD (1920 x 1080)/Hệ điều hành: Windows 10 Home SL/CPU: AMD Ryzen 5-5600H 3.30GHz upto 4.20GHz/RAM: 8GB/Ổ cứng: SSD 512GB NVMe PCIe Gen3x4', 'Phục kích ở nơi hiểm yếu, quan sát kĩ càng kẻ địch trước khi xuất trận mạnh mẽ, Bravo 15 đã sẵn sàng cho chiến trường game rực lửa. Kết hợp giữa vi xử lí AMD Ryzen 5 5600H và card đồ họa AMD Radeon RX 5500M, Bravo 15 2021 sẽ làm thỏa mãn mọi game thủ. Với giải pháp tản nhiệt độc quyền của MSI – Cooler Boost 5, CPU và GPU sẽ thoải mái phát huy được tối đa hiệu năng. Tận dụng sức mạnh của Bravo 15 và tung hoành trên chiến trường ảo, giống như lôi điểu trong truyền thuyết!', 0, 0),
(29, 'Laptop Gaming Asus ROG Strix G15 ', 27490000, 'product2_9.jpg', 2, 'Màn hình: 15.6 Full HD (1920 x 1080)/Hệ điều hành: Windows 10 Home SL/CPU: AMD Ryzen R7-4800H 2.9GHz up to 4.2GHz/RAM: 8GB/Ổ cứng: SSD 512GB NVMe PCIe Gen3x4', 'Phong cách thể thao thể hiện qua ba màu sắc khác biệt giúp nâng tầm diện mạo và phong cách của bạn. Những phiên bản với màu đen nguyên bản Original Black, xám cực chất Eclipse Gray, và Electro Punk rực rỡ sẽ thể hiện phong cách của bạn. Chơi game tại bất kỳ đâu với khung máy có kích thước nhỏ hơn đến 7% và gọn nhẹ hơn những thế hệ tiền nhiệm.', 0, 0),
(30, 'Laptop ASUS Vivobook X515EA BQ1006T', 14490000, 'product2_10.jpg', 2, 'Màn hình: 15.6 Full HD (1920 x 1080)/Hệ điều hành: Windows 10 Home SL/CPU: Intel Core i3-1115G4 1.7GHz up to 4.1GHz 6MB/RAM: 4GB Onboard ,DDR4 2666MHz up to 12GB SDRAM/Ổ cứng: SSD 512GB NVMe PCIe Gen3x4', 'Laptop ASUS X515EA trang bị màn hình 15.6 inch viền mỏng cho không gian trải nghiệm hình ảnh rộng rãi hơn. Kết hợp với độ phân giải Full HD, laptop mang đến những hình ảnh sống động với màu sắc chân thật, đẹp mắt.', 0, 0),
(31, 'Laptop Dell Inspiron 3511 P112F001ABL', 14990000, 'product2_11.jpg', 2, 'Màn hình: 15.6 Full HD (1920 x 1080)/Hệ điều hành: Windows 10 Home SL/CPU: Intel Core i3-1115G4 4.10GHz/RAM: 4GB /Ổ cứng: SSD 256GB M.2 PCIe Gen3 x4 NVMe', 'Bộ xử lý Intel  i3-1115G4 4.10GHz thực sự không làm người dùng thất vọng, bởi mọi tác vụ văn phòng đều được hoàn thành trơn tru, nhanh chóng. So với thế hệ trước thì máy hoạt động nhanh, mạnh hơn rất nhiều lần. Hỗ trợ CPU, RAM 4GB DDR4 cũng tăng tốc độ phản hồi của dell inspiron 3511 khiến việc sử dụng trở lên mượt mà hơn. Tuy nhiên, để sử dụng những phần mềm nặng, có lẽ người dùng cần nâng cấp thêm RAM để hỗ trợ, vì máy có 2 slot RAM.', 0, 0),
(32, 'Laptop MSI Modern 15 A10MU 667VN', 18990000, 'product2_12.jpg', 2, 'Màn hình: 15.6 Full HD (1920 x 1080)/Hệ điều hành: Windows 10 Home SL/CPU: Intel Core i5-10210U, up to 4.2GHz/RAM: 8GB /Ổ cứng: SSD 512GB SSD M.2 PCIE Gen3X4', 'Với thiết kế tinh tế, sang trọng MSI Modern là sự lựa chọn hàng đầu của giới trẻ, giúp mang đến một vẻ ngoài siêu nổi bật và tràn đầy cá tính. Máy mỏng nhẹ có điểm nhấn thiết kế độc đáo. Thể hiện cá tính độc đáo của bạn với hiệu năng không giới hạn.', 0, 0),
(33, 'Laptop Asus Vivobook S433EA AM439T', 19990000, 'product2_13.jpg', 2, 'Màn hình: 14 Full HD (1920 x 1080)/Hệ điều hành: Windows 10 Home SL/CPU: Intel Core i5-1135G7 2.4GHz up to 4.2GHz/RAM: 8GB /Ổ cứng: SSD 512GB SSD M.2 PCIE Gen3X4', 'Laptop ASUS VivoBook S433EA-AM439T, sự lựa chọn hàng đầu của giới trẻ, giúp mang đến một vẻ ngoài siêu nổi bật và tràn đầy cá tính. ASUS VivoBook S14 mỏng nhẹ có điểm nhấn thiết kế là viền cắt kim cương và có bốn màu sắc khác biệt, cho phép bạn thoải mái lựa chọn để thể hiện cá tính của mình. Cá tính của bạn còn được thể hiện rõ nét hơn khi mở máy vì phím Enter vàng nổi bật sẽ xuất hiện tạo điểm nhấn so với bàn phím truyền thống. VivoBook S14 sẽ giúp thể hiện cá tính của bạn, cả bên trong và bên ngoài.', 0, 0),
(34, 'Laptop Dell Inspiron 3505 Y1N1T5', 20490000, 'product2_14.jpg', 2, 'Màn hình: 15.6 Full HD (1920 x 1080)/Hệ điều hành: Windows 10 Home SL/CPU: Intel Core i5-10210U, up to 4.2GHz/RAM: 8GB /Ổ cứng: SSD 512GB SSD M.2 PCIE Gen3X4', 'Laptop Dell Inspiron 15 3505 Y1N1T5 là sản phẩm laptop đến từ thương hiệu Dell nổi tiếng. Lần này Dell mang đến cho chúng ta, đó là chiếc laptop văn phòng giá rẻ với hiệu năng mạnh mẽ từ bộ vi xử lý của AMD cùng nhiều đặc điểm nổi bật khác.', 0, 0),
(35, 'Laptop Dell Vostro 3510 7T2YC1', 20990000, 'product2_15.jpg', 2, 'Màn hình: 15.6 Full HD (1920 x 1080)/Hệ điều hành: Windows 10 Home SL/CPU: Intel Core i5-1135G7, up to 4.2 GHz/RAM: 8GB /Ổ cứng: SSD 512GB SSD M.2 PCIE Gen3X4', 'Dell Vostro 3510 có thiết kế trung tính, sang trọng phù hợp với sở thích và thị hiếu của học sinh sinh viên và người dùng văn phòng. Với CPU Core i5 mạnh mẽ và card đồ hoạ MX350 hiệu suất cao, cấu hình tối ưu để đáp ứng hầu hết các nhu cầu sử dụng văn phòng và giải trí đa phương tiện.\r\n\r\n', 0, 0),
(36, 'Laptop ASUS ZenBook UX425EA ', 24690000, 'product2_16.jpg', 2, 'Màn hình: 14 Full HD (1920 x 1080)/Hệ điều hành: Windows 10 Home SL/CPU: Intel Core i5-1135G7 2.4GHz up to 4.2GHz/RAM: 8GB /Ổ cứng: SSD 512GB SSD M.2 PCIE Gen3X4', 'Sở hữu một thiết kế bên ngoài vô cùng bắt mắt của dòng Zenbook xưa nay, ASUS ZenBook UX425EA KI429T được tô điểm thêm bằng lớp sơn xám thông đem đến sự sang trọng từ những ánh nhìn. Mặt ngoài của ASUS ZenBook UX425EA KI429T tạo nên điểm nhấn vô cùng đặc khi vòm ánh sáng được quy tụ vào logo ASUS ánh bạc khẳng định nên thương hiệu của dòng notebook cao cấp này. ', 0, 0),
(37, 'Dell Inspiron 24 5400', 21098000, 'product3_7.jpg', 3, 'Màn hình: 23.8 inch, Full HD/Hệ điều hành: Windows 10 Home SL/CPU: Intel Core i5-1135G7/RAM: 8GB/Ổ cứng: 256 GB SSD + 1TB HDD', 'Dell Inspiron 24 5400 có thiết kế cấu tạo dành cho các nhà sáng tạo nội dung, dùng vẽ kỹ thuật, lập trình, xem phim và và giải trí đều rất là ok.', 0, 0),
(38, 'ASUS ExpertCenter E5 22', 22990000, 'product3_8.jpg', 3, 'Màn hình: 23.8 inch, Full HD/Hệ điều hành: Windows 10 Home SL/CPU: Intel Core i5-11500B/RAM: 8GB/Ổ cứng: 512 GB SSD', 'ASUS ExpertCenter E5 22 là máy tính All-in-One đầu tiên có thiết kế hai màn hình. Tùy chọn màn hình thứ hai ASUS VeriView1 đem tới trải nghiệm tương tác hoàn toàn mới trong môi trường kinh doanh hiện đại. Được trang bị vi xử lý Intel® Core™ thế hệ 11 sản xuất trên tiến trình 10 nm mới nhất, kết nối tốc độ cao, công nghệ khử ồn hai chiều.', 0, 0),
(39, 'HP EliteOne 800 G6', 23890000, 'product3_9.jpg', 3, 'Màn hình: 23.8 inch, Full HD/Hệ điều hành: Windows 10 Home SL/CPU: Intel Core i5-11500B/RAM: 8GB/Ổ cứng: 256 GB SSD', 'Vẻ ngoài bắt mắt với thiết kế hiện đại và nổi trội chắc chắn sẽ là điểm nhấn trong bất kỳ văn phòng nào. Sẵn sàng cho một ngày làm việc năng suất với HP EliteOne 800 AiO siêu mỏng được trang bị sẵn VR1 - một trong những máy tính đa năng thương mại mạnh mẽ nhất thế giới.', 0, 0),
(40, 'HP ProOne 600 G6 Touch', 22190000, 'product3_10.jpg', 3, 'Màn hình: 23.8 inch, Full HD/Hệ điều hành: Windows 10 Home SL/CPU: Intel Core i5-11500T/RAM: 8GB/Ổ cứng: 256 GB SSD', 'Cung cấp cho người dùng nhiều tùy chọn thiết bị về cách họ làm việc và duy trì năng suất. Tính linh hoạt mới được cung cấp bởi Máy tính đồng bộ HP ProOne 600 G6 AIO (236B8PA)/ Intel Core i5-10500 (3.10GHz, 12MB) có thể được sử dụng như một PC đầy đủ hoặc như một màn hình bổ sung cho một máy tính để bàn hoặc máy tính xách tay khác.', 0, 0),
(41, 'ASUS M3400WUAT-BA026T', 18390000, 'product3_11.jpg', 3, 'Màn hình: 23.8 inch, Full HD/Hệ điều hành: Windows 10 Home SL/CPU: AMD R5-5500U/RAM: 8GB/Ổ cứng: 512 GB SSD', 'ASUS M3400WUAT-BA026T sẽ đưa bạn đến những trải nghiệm thú vị nhờ màn hình lớn 23,8 inch viền siêu mỏng đầy ấn tượng, hệ thống âm thanh SonicMaster Audio sống động và đặc biệt là hiệu suất cực đỉnh từ bộ vi xử lý AMD Ryzen 5 5500U, hoàn thành mọi công việc trong nháy mắt.', 0, 0),
(42, 'ASUS V241EAK-BA173T', 15790000, 'product3_12.jpg', 3, 'Màn hình: 23.8 inch, Full HD/Hệ điều hành: Windows 10 Home SL/CPU: Intel i3-1115G4/RAM: 8GB/Ổ cứng: 512 GB SSD', 'Trải nghiệm công việc và giải trí không giới hạn trên chiếc máy tính tất cả trong một màn hình lớn tới 23,8 inch viền siêu mỏng ASUS Vivo AIO V241EAK BA173T, cho bạn hình ảnh tuyệt vời cùng âm thanh sống động không ngờ.', 0, 0),
(43, 'Lenovo IdeaCentre AIO 3 24IIL', 14790000, 'product3_13.jpg', 3, 'Màn hình: 23.8 inch, Full HD/Hệ điều hành: Windows 10 Home SL/CPU: Intel i3-1005G1/RAM: 4GB/Ổ cứng: 256 GB SSD', 'Máy tính AIO Lenovo IdeaCentre 3 24IIL kích thước lên đến gần 24 inch cùng độ phân giải fullHD 1920 x 1080 pixels. Máy cũng hỗ trợ card màn hình Intel UHD Graphics. Nhờ đó, Lenovo IdeaCentre 3 24IIL5 cho khả năng hiển thị rõ ràng, màu sắc sống động.', 0, 0),
(44, 'iMac 27 2020 Retina 5K', 56000000, 'product3_14.jpg', 3, 'Màn hình: 27 inch, Retina 5K/Hệ điều hành: macOS/CPU: Intel Core i7/RAM: 8GB/Ổ cứng: 512 GB SSD', 'Hiển thị mọi thứ cực sống động với màn hình Retina độ phân giải lên đến (5120 x 2880), màn hình 27 inch. Màn hình iMac có độ sáng 500 nits, và khả năng hiển thị đến một tỷ màu cho hình ảnh rực rỡ để bạn tận hưởng những thước phim chất lượng, màu sắc có độ chính xác cao để làm đồ họa, thiết kế..', 0, 0),
(45, 'ASUS AIO V222FAK-BA219T', 13890000, 'product3_15.jpg', 3, 'Màn hình: 21.5 inch, FullHD/Hệ điều hành: Windows 10 Home/CPU: i3-10110U/RAM: 4GB/Ổ cứng: 512 GB SSD', 'Ngoại hình là ưu điểm nổi bật nhất mà Asus mang đến cho V222FAK-BA219T. Dựa trên xu thế phát triển tất yếu của viền màn hình siêu mỏng và những nỗ lực sáng tạo, đổi mới nhằm tạo ra các sản phẩm phục vụ tốt nhu cầu của người dùng.', 0, 0),
(46, 'ASUS Zen AiO 24 M5401WUAT', 19790000, 'product3_16.jpg', 3, 'Màn hình: 23.8 inch, FullHD/Hệ điều hành: Windows 10 Home/CPU: R5-5500U/RAM: 8GB/Ổ cứng: 512 GB SSD', 'ASUS Zen AiO 24 M5401WUAT là chiếc máy tính tất cả trong một có thiết kế vô cùng độc đáo, gọn gàng và phá cách cho không gian làm việc của bạn. Hơn nữa, sức mạnh cấu hình đỉnh cao sẽ giúp bạn hoàn thành xuất sắc công việc trên màn hình lớn 23,8 inch NanoEdge thời thượng.', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `order_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
