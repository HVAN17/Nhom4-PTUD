-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2024 at 03:54 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cocoon_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `product_count` int(11) DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `product_count`, `created_at`, `description`, `image`) VALUES
(1, 'Sản phẩm mới', 3, '2024-12-10 09:43:37', 'Hàng mới ra mắt nè bạn!!!', 'Artboard_5_8c28ccf387.jpg'),
(2, 'Chăm Sóc Da', 38, '2024-12-10 09:43:37', 'Dưỡng da thuần chay', 'Artboard_10_303004049f.jpg'),
(3, 'Tắm & Dưỡng Thể', 7, '2024-12-10 09:43:37', 'Chăm da lành tính thuần chay', 'Artboard_7_2d844256a8.jpg'),
(4, 'Chăm Sóc Tóc', 15, '2024-12-10 09:43:37', 'Dầu dừa', 'Website_448744049_486999170354190_4651515310287941209_240911_2f2521e90d.jpg'),
(5, 'Dưỡng Môi', 3, '2024-12-10 09:43:37', 'Môi xinh', 'Artboard_1_24cdb0bca9.jpg'),
(6, 'Combo / Bộ Sản Phẩm', 0, '2024-12-10 09:43:37', 'Trọn bộ sản phẩm', 'Screenshot 2024-12-11 151338.png');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `id` int(11) NOT NULL,
  `ho` varchar(100) NOT NULL,
  `ten` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `matkhau` varchar(255) NOT NULL,
  `gioitinh` enum('Nam','Nữ','Khác') NOT NULL,
  `ngaysinh` date NOT NULL,
  `diachi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`id`, `ho`, `ten`, `email`, `matkhau`, `gioitinh`, `ngaysinh`, `diachi`, `created_at`) VALUES
(4, 'Đỗ ', 'Ngọc Yến', 'yendo.31221027064@st.ueh.edu.vn', '$2y$10$I4vDlmuqiWRTuGih7pACH.myP691aN1fHEyk/YhVWda4SpNgKaB7q', 'Nữ', '2024-12-20', NULL, '2024-12-07 09:24:52'),
(11, 'Ngọc', 'Ý', 'yendo.312210@st.ueh.edu.vn', '$2y$10$9fr0iJXj2kEyQxnRT0rt1.i/NzvucFcy946cI4ffMMq.dpLNbldgG', 'Nữ', '2004-09-08', 'UEH', '2024-12-13 09:24:52'),
(19, 'Phạm Thị', 'Thanh Trúc', 'truc@gmail.com', '$2y$10$H5R9fM8XVlvu4TPRG0scJeOfzP2Jw3xNDY8fMFuEmSbqn32LzfQD6', 'Nữ', '0000-00-00', 'UEH', '2024-12-14 08:39:43'),
(20, 'Hồng', 'Vân', 'van@gmail.com', '$2y$10$Hh55oypwjMjFvKWNxpyHcOq5469N6rYUyoKNY4WcnRhA9XNSPU5Q.', 'Nữ', '2004-05-08', 'ueh', '2024-12-14 08:44:03');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `address`, `phone`, `email`, `total_amount`, `payment_method`, `status`, `created_at`, `user_id`) VALUES
(12, 'Đỗ Ngọc Yến', 'Đường Đặng Đức Thuật, P.Tam Hòa', '0353207516', 'yendo.31221027064@st.ueh.edu.vn', 170000.00, 'credit_card', 'completed', '2024-12-11 07:42:14', 2),
(13, 'Đỗ Ngọc Yến', 'Đường Đặng Đức Thuật, P.Tam Hòa', '0353207516', 'yendo.31221027064@st.ueh.edu.vn', 335000.00, 'credit_card', 'completed', '2024-12-12 08:06:35', 2),
(15, 'Đỗ Ngọc Yến', 'Đường Đặng Đức Thuật, P.Tam Hòa', '0353207516', 'yendo.31221027064@st.ueh.edu.vn', 180000.00, 'cod', 'completed', '2024-12-13 08:22:32', 2),
(16, 'Đỗ Ngọc Yến', 'Đường Đặng Đức Thuật, P.Tam Hòa', '0353207516', 'yendo.31221027064@st.ueh.edu.vn', 328000.00, 'cod', 'pending', '2024-12-13 12:47:46', 2),
(17, 'Đỗ Ngọc Yến', 'Đường Đặng Đức Thuật, P.Tam Hòa', '0353207516', 'yendo.31221027064@st.ueh.edu.vn', 1150000.00, 'credit_card', 'completed', '2024-12-13 16:02:19', 4),
(18, 'Đỗ Ngọc Yến', 'Đường Đặng Đức Thuật, P.Tam Hòa', '0353207516', 'yendo.31221027064@st.ueh.edu.vn', 519000.00, 'cod', 'pending', '2024-12-13 17:04:07', 2),
(19, 'Đỗ Ngọc Yến', 'Đường Đặng Đức Thuật, P.Tam Hòa', '0353207516', 'yendo.31221027064@st.ueh.edu.vn', 505000.00, 'credit_card', 'completed', '2024-12-14 07:41:42', 2),
(20, 'Đỗ Ngọc Yến', 'Đường Đặng Đức Thuật, P.Tam Hòa', '0353207516', 'yendo.31221027064@st.ueh.edu.vn', 170000.00, 'credit_card', 'pending', '2024-12-14 09:53:37', 2),
(21, 'Đỗ Ngọc Yến', 'Đường Đặng Đức Thuật, P.Tam Hòa', '0353207516', 'yendo.31221027064@st.ueh.edu.vn', 170000.00, 'credit_card', 'pending', '2024-12-14 09:55:02', 2),
(22, 'Đỗ Ngọc Yến', 'Đường Đặng Đức Thuật, P.Tam Hòa', '0353207516', 'ngoc@gmail.com', 170000.00, 'credit_card', 'pending', '2024-12-14 12:41:57', 2);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(23, 12, 12, 1, 170000.00),
(24, 13, 12, 1, 170000.00),
(25, 13, 26, 1, 165000.00),
(27, 15, 31, 1, 180000.00),
(28, 16, 12, 1, 170000.00),
(29, 16, 30, 1, 158000.00),
(30, 17, 12, 2, 170000.00),
(31, 17, 26, 2, 165000.00),
(32, 17, 28, 3, 160000.00),
(33, 18, 32, 1, 396000.00),
(34, 18, 33, 1, 123000.00),
(35, 19, 12, 1, 170000.00),
(36, 19, 26, 1, 165000.00),
(37, 19, 29, 1, 170000.00),
(38, 20, 12, 1, 170000.00),
(39, 21, 12, 1, 170000.00),
(40, 22, 12, 1, 170000.00);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `image_path`, `created_at`) VALUES
(10, 'Vài “tip” giúp bạn tận hưởng trọn vẹn từng giây phút làm sạch da chết trên cơ thể Cà phê Đắk Lắk', 'Bạn có đoán được một nơi mà chúng ta được trở về với chính mình, thoải mái thể hiện những cảm xúc của bạn thân và cho phép mình được gác lại hết bộn bề của cuộc sống là ở đâu không? Không nơi nào khác, đó chính là căn phòng tắm yêu thích của bạn đó. Và Cocoon sẽ rất vui khi được giúp bạn rũ bỏ những áp lực, muộn phiền như cách những hạt cà phê Đắk Lắk nhuyễn, mịn của chúng tôi cuốn đi những lớp da chết xỉn màu, xấu xí trên cơ thể của bạn.  \r\n\r\n\r\nVà Cocoon sẽ rất vui khi được giúp bạn rũ bỏ những áp lực, muộn phiền như cách những hạt cà phê Đắk Lắk nhuyễn, mịn của chúng tôi cuốn đi những lớp da chết xỉn màu, xấu xí trên cơ thể của bạn.\r\nHãy thử áp dụng một vài tip sau để gia tăng thêm những trải nghiệm thật “chill” với sản phẩm Cà phê Đắk Lắk làm sạch da chết cơ thể:\r\n\r\nHãy tiến hành tẩy da chết trên da ướt hoặc tốt nhất là sau khi cơ thể đã được làm sạch bằng sữa tắm. Bởi khi làn da được ướt, các lỗ chân lông sẽ được kích thích giãn nở và trở nên mềm mại hơn giúp cho trong quá trình tẩy tế bào da chết trên cơ thể dễ dàng và dễ chịu hơn.\r\nTán đều sản phẩm lên khắp cơ thể của bạn theo chuyển động tròn hoặc xoắn ốc để những hạt “scrub” cà phê dễ dàng lấy đi những lớp da chết trên mọi “ngóc ngách” của cơ thể. Hãy thực hiện các động tác mát- xa này thật nhẹ nhàng, điều đó sẽ vừa giúp cơ thể của bạn được thư giãn vừa kích thích sự phát triển của các tế bào da mới.\r\nBuổi tối chính là thời điểm tuyệt vời để làm sạch da chết trên cơ thể vì đây là lúc làn da không phải đối diện với những tác nhân xấu từ môi trường, bên cạnh đó, ban đêm cũng là &quot;thời gian vàng&quot; cho làn da nghỉ ngơi để quá trình tái tạo và phục hồi da diễn ra tốt hơn.\r\nHãy chủ động làm sạch da chết cơ thể với Cà phê Đắk Lắk làm sạch da chết cơ thể từ 2 – 3 lần/tuần để luôn cảm nhận được một làn da tươi mới, đều màu và đặc biệt là cảm giác mềm mịn lan tỏa khắp làn da cơ thể.\r\nĐừng quên bảo vệ làn da sau khi làm sạch các lớp da chết bằng cách kết hợp dưỡng ẩm với Bơ dưỡng thể cà phê Đắk Lắk để duy trì trạng thái khỏe khoắn, tươi trẻ cho toàn bộ cơ thể.\r\n\r\n\r\nHãy chia sẻ thêm với Cocoon những tip bạn đang áp dụng để thật sự tận hưởng giây phút yêu thương bản thân cùng cà phê Đắk Lắk nhé!', '6755e6bd577e02.96898666.jpg', '2024-12-08 18:34:37'),
(12, 'Cùng Cocoon sống xanh mỗi ngày: Điểm Xanh Online', 'Tiếp tục lan tỏa các “thông điệp xanh” hướng đến Mẹ Trái Đất, nhân rộng phạm vi chương trình đổi vỏ chai cũ và đáp ứng mong mỏi của rất nhiều quý khách hàng về chương trình này, bắt đầu từ ngày 02/06/2021, Cocoon sẽ áp dụng thêm hình thức đổi vỏ chai online. Chúng tôi gọi đó là ;Điểm Xanh Online. Từ đây, dù bạn ở bất cứ nơi đâu tại Việt Nam thì đều có thể tham gia đổi vỏ chai cùng Cocoon.\r\nQuy trình tham gia đổi vỏ chai online theo 3 bước sau:\r\n• Bước 1: Truy cập link: http://bit.ly/DiemXanhOnline và điền đầy đủ thông tin theo mẫu đăng ký\r\n• Bước 2: Đóng gói, ghi rõ họ tên, thông tin của bạn trên kiện hàng và gửi vỏ chai/hũ rỗng đến Kho Cocoon\r\ntheo địa chỉ: Lô đất số HH, Đường số 11 và Đường số 3, Khu công nghiệp Xuyên Á, xã Mỹ Hạnh Bắc, huyện Đức Hòa, tỉnh Long An, Việt Nam - Hotline: 1900 9300  \r\n• Bước 3: Cocoon sẽ đối chiếu các vỏ chai và thông tin trên biểu mẫu, sau đó gửi sản phẩm mới qua đường chuyển phát\r\nCùng Cocoon sống xanh mỗi ngày: Điểm Xanh Online \r\nTừ 10 vỏ chai (hũ, tuýp, lọ, túi refill...) bất kỳ của Cocoon (không bao gồm bao bì dạng thỏi son và sản phẩm dùng thử), bạn đổi được 1 trong 9 sản phẩm sau:\r\n1. Cà phê Đắk Lắk làm sạch da chết cơ thể 200ml giá 125.000đ\r\n2. Cà phê Đắk Lắk làm sạch da chết mặt 150ml giá 165.000đ\r\n3. Nước dưỡng tóc tinh dầu bưởi 140ml giá 165.000đ\r\n4. Gel bí đao rửa mặt 140ml giá 195.000đ\r\n5. Sữa rửa mặt nghệ Hưng yên 140ml giá 195.000đ\r\n6. Gel rửa mặt hoa hồng 140ml giá 195.000đ\r\n7. Gel rửa mặt cà phê Đắk Lắk 140ml giá 195.000đ\r\n8. Nước nghệ Hưng Yên 140ml giá 195.000đ', 'Screenshot 2024-12-11 151200.png', '2024-12-09 09:43:20'),
(15, 'Khám phá những thành phần đắt giá có trong Đường Thốt Nốt An Giangg', '• Đường thốt nốt An Giang\r\nChứa hàm lượng khoáng chất gồm sắt, kẽm, magie, canxi, đồng…và rất giàu vitamin B1, B2, C… Đường thốt nốt còn chứa hàm lượng polyphenol cao và các flavonoid nên có đặc tính chống oxy hóa mạnh giúp ngăn ngừa các gốc tự do là nguyên nhân gây ra lão hóa da.\r\n\r\n• Nam châm dưỡng ẩm Pentavitin\r\nLà thành phần thường xuất hiện tronv các sản phẩm serum dưỡng ẩm chuyên sâu dành cho da mặ. Nó là một phức hợp carbonhydrate có nguồn gốc 100% từ thực vật, dễ dàng tương hợp với cấu trúc của làn da. Hoạt chất này có khả năng giữ nước và kết nối hoàn hảo với tầng da như một nam châm, giúp dưỡng ẩm sâu cho da lên đến 72H mà không dễ bị rửa trôi bởi nước. Ngoài ra, pentavitin còn tăng cường hàng rào bảo vệ tự nhiên của da và ngăn ngừa tình trạng mất nước tự nhiên.\r\n\r\n•Tổ hợp dầu chưng cất phân tử Passioline và Soline\r\nĐây không phải là tổ hợp dầu thực vật thông thường, Passioline từ hạt chanh dây và Soline từ hạt hướng dương được sản xuất thông qua phương pháp chưng cất phân tử hiện đại giúp duy trì tính chất dinh dưỡng của thành phần và tăng cường khả năng thẩm thấu vào da. Với khả năng làm dịu và phục hồi, chúng đảm bảo rằng hàng rào bảo vệ da sẽ được củng cố và chăm sóc trong quá trình tẩy da chết, giúp da trở nên mịn màng và ẩm mượt.\r\n\r\nCho Cocoon biết cảm giác của bạn sau khi trải nghiệm sàn phẩm nhé!', 'Screenshot 2024-12-11 151050.png', '2024-12-11 08:10:02');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `sale_price` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `album_images` text DEFAULT NULL,
  `category_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `code`, `price`, `sale_price`, `quantity`, `description`, `image`, `created_at`, `album_images`, `category_id`) VALUES
(12, 'Cà phê Đắk Lắk làm sạch da chết mặt 150ml', 'CPDK', 170000.00, 165000.00, 41, 'Với lợi thế Việt Nam là đất nước đứng thứ hai trên thế giới về xuất khẩu cà phê, Cocoon rất tự hào khi có thể tận dụng nguồn nguyên liệu đặc hữu này để mang đến cho bạn các sản phẩm làm sạch da chết. \r\n\r\nKhông cần thêm vi hạt nhựa vào sản phẩm, chúng tôi sử dụng hạt scrub hoàn toàn từ cà phê được xay nhuyễn và sàng lọc theo tỉ lệ phù hợp, \r\n\r\nđảm bảo dễ dàng cuốn trôi những lớp da chết già cỗi nhưng không làm tổn thương đến làn da của bạn.\r\n\r\nChúng tôi đã nghiên cứu caffeine và các chất chống oxy hóa có trong hạt cà phê sẽ nhanh chóng cải thiện làn da xỉn màu, \r\n\r\ngiúp da trở nên săn chắc, mềm mượt, tràn đầy năng lượng tươi mới ngay sau lần sử dụng đầu tiên.\r\nCách sử dụng\r\n\r\nThoa một lượng sản phẩm vừa đủ lên da ướt. Mát-xa nhẹ nhàng tránh vùng mắt. Rửa sạch lại với nước. Dùng 2 – 3 lần một tuần để đạt hiệu quả tốt nhất.\r\n\r\nLượng dùng\r\nMột lượng vừa đủ có thể xoa đều toàn bộ khuôn mặt\r\nKết cấu\r\nDạng kem màu nâu đen có hạt cà phê xay rất mịn\r\nMùi hương\r\nMùi thơm đặc trưng của cà phê Đắk Lắk\r\nLưu ý\r\nTránh dùng vùng mắt, chỉ dùng ngoài da\r\nXuất xứ\r\nViệt Nam\r\n', '6755d47c77b01-z4028306601775_35e36d34450fdaaea3a65a8c3f8526f4_806289b3f3.jpg', '2024-12-08 17:16:44', '[\"6755d47c77d4f-slide_2_437158eaa0.jpg\"]', 2),
(26, 'Serum Sa-chi phục hồi tóc 70ml', 'DTN', 165000.00, NULL, 4, 'Bạn có biết tóc cần chất béo để khỏe mạnh? Dầu Sa-chi là loại dầu rất đặc biệt với hàm lượng chất béo không bão hòa lên đến 94% gồm Omega 3,6 và 9. Dầu sa-chi khi kết hợp cùng Vitamin E, tinh dầu hương nhu và Phospholipid sẽ tăng cường khả năng chống oxy hóa, cải thiện các sợi tóc hư tổn, bảo vệ tóc khỏi nhiệt và tia UV, giúp tóc luôn chắc khỏe tràn đầy sức sống.\\', '67555bcee6a35-Template_Website_Dau_Tay_Trang_310ml_b098c76143.jpg', '2024-12-10 15:54:56', NULL, 4),
(28, 'Đường thốt nốt An Giang làm sạch da chết cơ thể 200ml', 'DTNKN', 160000.00, NULL, 17, 'Hãy sẵn sàng trải nghiệm những tinh thể đường thốt nốt nhuyễn mịn kết hợp với nam châm dưỡng ẩm Pentavitin, phức hợp dầu chưng cất phân tử gồm Passioline và Soline giúp nhẹ nhàng cuốn trôi tế bào chết, mang lại làn da mượt mà, đồng thời dưỡng ẩm sâu và củng cố hàng rào tự nhiên của da.&#039;,', 'Avatar_Website_Duong_Thot_Not_f3e1a92317.jpg', '2024-12-10 15:57:11', NULL, 1),
(29, 'Serum dưỡng tóc 500ml', 'SERUM', 170000.00, NULL, 32, 'Sản phẩm treatment dành cho tóc, phù hợp với tình trạng tóc rụng, tóc yếu, tóc thưa mỏng. Sản phẩm có thành phần từ tinh dầu bưởi Việt Nam truyền thống, Xylishine, Vitamin B5, Baicapil và Bisabolol. Nước dưỡng tóc tinh dầu bưởi giúp ngăn ngừa 60% nguyên nhân rụng tóc, làm gia tăng mật độ của tóc, từ đó giúp tóc dày lên trông thấy. Đồng thời, sản phẩm còn giúp nuôi dưỡng da đầu và cung cấp độ ẩm cho tóc', 'web_62d54dfa49.jpg', '2024-12-10 15:59:45', NULL, 4),
(30, 'Mặt nạ từ tinh bột nghệ', 'MNTBN', 158000.00, NULL, 26, 'Mặt nạ từ tinh bột nghệ giàu Curcuminoid kết hợp với Vitamin B3 và chiết xuất yến mạch rất phù hợp cho làn da xỉn màu và có nhiều vết thâm. Sau khi rửa đi lớp mặt nạ, bạn sẽ nhìn thấy một làn da tươi mới, sáng rạng rỡ và đều màu.', 'product3.jpg', '2024-12-10 16:01:37', NULL, 2),
(31, 'Tinh dầu khuynh diệp 500ml', '1234', 180000.00, NULL, 44, 'Vận dụng liệu pháp mùi hương từ tinh dầu khuynh diệp, bạc hà, kết hợp với vitamin B5 và hoạt chất dưỡng ẩm Betaine, Gel tắm sẽ làm sạch nhẹ nhàng và giữ cho làn da cơ thể luôn mềm mại, đồng thời giúp thư giãn, giải tỏa căng thẳng và mang lại một tinh thần thông suốt.&#039;,', 'Ecom_Hair_S_Serum_sa_chi_70ml_0c3c4772cb.png', '2024-12-10 16:04:32', NULL, 3),
(32, '2 cà phê Đắk Lắk tẩy da chết cơ thể 200ml tặng Nước tẩy trang bí đao 140ml', 'CPĐL', 396000.00, NULL, 88, 'Hạt cà phê nguyên chất từ Đắk Lắk kết hợp với bơ ca cao Tiền Giang giúp làm sạch da chết cơ thể hiệu quả, làm đều màu da, khơi dậy năng lượng giúp da trở nên mềm mịn và rạng rỡ.\r\nkhông sulfate\r\nkhông dầu khoáng\r\nkhông paraben\r\nkhông vi hạt nhựa\r\nThích hợp với\r\nMọi loại da cơ thể\r\n\r\nThành phần chính\r\nVới hạt cà phê nguyên chất và Bơ ca cao', 'z4131327097344_3762932b24935caa56ef4f0a931c0035_6f5205be81 (1).jpg', '2024-12-11 16:13:49', NULL, 6),
(33, 'Cà phê Đắk Lắk làm sạch da chết môi 5g', 'CPDKM', 123000.00, NULL, 31, 'Với lợi thế Việt Nam là đất nước đứng thứ hai trên thế giới về xuất khẩu cà phê, Cocoon rất tự hào khi có thể tận dụng nguồn nguyên liệu đặc hữu này để mang đến cho bạn các sản phẩm làm sạch da chết. \r\n\r\nKhông cần thêm vi hạt nhựa vào sản phẩm, chúng tôi sử dụng hạt scrub hoàn toàn từ cà phê được xay nhuyễn và sàng lọc theo tỉ lệ phù hợp, \r\n\r\nđảm bảo dễ dàng cuốn trôi những lớp da chết già cỗi nhưng không làm tổn thương đến làn da của bạn.\r\n\r\nChúng tôi đã nghiên cứu caffeine và các chất chống oxy hóa có trong hạt cà phê sẽ nhanh chóng cải thiện làn da xỉn màu, \r\n\r\ngiúp da trở nên săn chắc, mềm mượt, tràn đầy năng lượng tươi mới ngay sau lần sử dụng đầu tiên.', 'Son_duong_dau_dua_26498c9936.jpg', '2024-12-11 18:04:28', NULL, 5);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity_change` int(11) NOT NULL,
  `transaction_type` enum('in','out') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `reset_token_expiry` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `reset_token`, `reset_token_expiry`) VALUES
(1, 'Ngọc Yến', 'ngocyenkudo@gmail.com', '$2y$10$vrhMp/GkFsRHg6w59RSUK.qFZVEFB066BBjbUjWu3qz5U8gRHlGzC', 'f00a82cb922cfeb0561276c20870119d', '2024-12-11 17:54:57'),
(2, 'Hồng Vân', 'yendo.31221027064@st.ueh.edu.vn', '$2y$10$MV/Ooq96T.A5uTEzuUWhgeQVeYjQ8r18wwUfI0ul.YyJdBsCrSlDW', NULL, NULL),
(3, 'Ngọc Ý', 'yendo842004@gmail.com', '$2y$10$pQJpwyq8lqWdK8J/ju7q7.cGaRuNW9hWhBDDujfgZbU7yw3rx7hhK', NULL, '2024-12-12 20:19:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `fk_products_category` (`category_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
