-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 02, 2022 lúc 02:57 PM
-- Phiên bản máy phục vụ: 10.4.25-MariaDB
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `b1805900`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `description`) VALUES
(1, 'Nhiếp ảnh', 'qnG82I0S09mTL30DSP5WJvXPwzYFd6KGzieOX2Jz.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i'),
(2, 'Lập trình', 'r6s2Ghak46rXYH88uOVH8WnCeTRwjOX5Q2oTTVo8.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i'),
(3, 'Khoa học', 'Wxxw54MSy8EawAt0oQATIjJ58LiQrsKHLbw4n8cd.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i'),
(4, 'Thiết kế web', 'L0IQRPibScjLalykKCkWwc8vEDFn3glAwktNDt6k.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i'),
(5, 'Photoshop', '1krbyRtT7Kub4wrjsrbqgxK5PZnmTjRvAVMXaRHI.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i'),
(6, 'Tài chính', 'GoRmPr7kIFhlJ0f8vz79Kl7H8tmEcWRn9ZNvzyg0.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i'),
(8, 'Triết học', '7VzvJmXI7LAUsKP9HfHp40Dbr79dookvmgIb4nnN.png', 'Đây là mô tả danh mục ít nhất 30 ký tự');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `owner` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `image` varchar(255) NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `courses`
--

INSERT INTO `courses` (`id`, `name`, `category_id`, `price`, `desc`, `owner`, `status`, `image`, `upload_date`) VALUES
(1, 'Khóa học Javascript Cơ bản', 2, '50,000VNĐ', 'đây là một khóa học ngắn cho đủ 50 ký tự thử xem cái input này có hoạt động không', 1, 0, '00G1vs05cXL0pAaktTesKNGalp3sfcQEfj1YXoQJ.jpg', '2022-10-19 18:56:55'),
(3, 'Toàn tập ngôn ngữ lập trình C#', 2, '479,000VNĐ', 'Có được kiến thức toàn diện đầy đủ về ngôn ngữ lập trình C#', 3, 0, '8V6RZPWvt43TG3cUatBduMQSruqC3urEBEIpERwf.png', '2022-10-25 22:23:22'),
(4, 'Lập trình Java trong 4 tuần', 2, '479,000VNĐ', 'Cung cấp kiến thức toàn diện nhất về ngôn ngữ lập trình Java', 3, 0, 'H8Q2LSCshCqWONU9ZADYYeiSJFdEVlJyKIwefqJH.png', '2022-10-25 22:37:02'),
(5, 'Học HTML5/CSS3, BOOTSTRAP 4 và học cắt Web từ file thiết kế', 2, '699,999VNĐ', 'Nắm chắc kiến thức cơ bản về và 2 phần mềm cần thiết cho cắt web là CSS và HTML \r\nHiểu rõ về Bootstrap 4, các thành phần của Bootstrap, cài đặt cũng như thực hành cắt web với Bootstrap.', 3, 0, 'ZbxsBMpYSshXq9oUWlgals5QcI79avusWlr5kAUe.png', '2022-10-25 22:43:16'),
(6, 'Học nhiếp ảnh từ cơ bản đến nâng cao', 1, '599,000VNĐ', 'Nắm được kiến thức cơ bản đến chuyên sâu về máy ảnh - công cụ để có được những bức ảnh tuyệt vời\r\nBiết cách phân tích bố cục ảnh cơ bản cần thiết khi chụp một tấm hình đẹp', 3, 0, 'pPRGxMFydExuDWsAx4Jt5h1UBcSyLKVj9zDHPxbt.jpg', '2022-10-25 22:47:24'),
(7, 'Kỹ xảo phim với After Effect cho nghề dựng phim', 1, '699,000VNĐ', 'Nắm vững các kiến thức tổng quan về phần mềm After Effect\r\nNhanh chóng thành thạo các công cụ và chức năng trong After Effect', 3, 0, 'Sw6iDgfYQ4kp6w4QUIFOq8NHp8m85nLslYK1uqaA.jpg', '2022-10-25 22:48:30'),
(8, 'Học làm kỹ xảo trong sản xuất video bằng ADOBE AFTER EFFECTS', 1, '599,000VNĐ', 'Hiểu được quy trình làm việc của phần mềm Adobe After Effects\r\nNắm được tư duy làm video - kỹ xảo bằng After Effect, tư duy chuyển động, tư duy màu sắc, layer...', 3, 0, 'HlDyFU7DkvyXNL1U3cTvcuhQwunPB5KqkcsYKPBl.jpg', '2022-10-25 22:49:14'),
(9, 'Kỹ thuật nhiếp ảnh: Ánh sáng và hiệu ứng', 1, '499,000VNĐ', 'Làm chủ được thiết bị, các chức năng của máy\r\nKiểm soát được ánh sáng và cách sắp xếp ánh sáng', 3, 0, '1HwChyr2S8aeGpnJrkFJvGYKGcvk6WvfJ66jZaiJ.jpg', '2022-10-25 22:49:54'),
(10, 'Bí mật Thiền ứng dụng thay đổi cuộc đời', 3, '399,000VNĐ', 'Giải tỏa căng thẳng, lo lắng, mang lại lợi ích tuyệt vời cho sức khỏe thể chất lẫn tinh thần\r\nGiảm các cơn đau, đặc biệt tốt với những người bệnh huyết áp, tim mạch, nhiễm trùng', 3, 0, 'wirVCTY7bLRYKlvlh0IBPbs2ebbbCgpUSbxzNokX.jpg', '2022-10-25 22:51:19'),
(11, 'Yoga giảm eo giữ dáng', 3, '239,000VNĐ', 'Các tư thế yoga giảm eo giữ dáng sẽ giúp đánh tan mỡ bụng\r\nCác bài tập yoga làm thon gọn vòng eo\r\nCác bài tập tạo form toàn thân, tuần hoàn khí huyế', 3, 0, 'ohVkJ3gCTrsDnANBUmhi5GZNR9N33G4ixt3mtK7A.jpg', '2022-10-25 22:51:57'),
(12, 'Trầm cảm sau sinh', 3, '129,000VNĐ', 'Hiểu thế nào là trầm cảm và trầm cảm sau sinh\r\nTrầm cảm có tác động xấu như thế nào đến đời sống của người mẹ và cuộc sống gia đình', 3, 0, 'YKYLjMM51elbm7GAZIjpeOQEWeDg4rDRWS7qy5Qv.png', '2022-10-25 22:52:41'),
(13, 'Bí quyết sống khoẻ, sống trẻ dành cho phụ nữ', 3, '1,234,500VNĐ', 'Nhận thức rõ ràng về tầm quan trọng của sức khỏe và các yếu tố liên quan đến sức khỏe\r\nHiểu biết thực phẩm và chế độ dinh dưỡng để phòng bệnh và có sức khỏe tốt cho mình và gia đình', 3, 0, 'q53kWPcHhBWzgdNFDftpcB6cEimO0LT4fddKzYNZ.jpg', '2022-10-25 22:53:23'),
(14, 'Lập trình FULLSTACK với ANGULAR - PHP - MYSQL', 4, '399,000VNĐ', 'Làm chủ kiến thức lập trình backend với Angular JS.\r\nCung cấp đủ thời lượng để bạn có thể hiểu được bản chất của việc lập trình Fullstack với ngôn ngữ Angular js\r\nTự mình xây dựng được một trang web sử dụng ngôn ngữ Angular JS.', 3, 0, 'jLmOa1sOp0KP71qDXEVow1KxdKPd63CJ0vqnKpP1.jpg', '2022-10-25 22:54:38'),
(15, 'Cấu trúc dữ liệu và giải thuật Thực chiến với LeetCode', 4, '149,000VNĐ', 'Hệ thống lại toàn bộ cấu trúc dữ liệu và thuật toán đã được học.\r\nTự mình cài đặt lại các cấu trúc dữ liệu cũng như thuật toán đó.\r\nBiết cách đánh giá một thuật toán dựa trên độ phức tạp (không gian và thời gian).', 3, 0, 'b8cJn1WegsMu4O6OCFPTXXsGnc5F4XuNsXdSeENw.jpg', '2022-10-25 22:55:17'),
(16, 'Lập trình Web tốc độ cao, thời gian thực với NodeJS', 4, '699,000VNĐ', 'Kết thúc khóa học lập trình Nodejs bạn sẽ nắm được cách cài đặt NodeJS trên mọi môi trường\r\nBiết cách sử dụng NPM để quản lý thư viện cho ứng dụng NodeJS', 3, 0, 'azy39xxMDRGNyWCZcvSlIt3l4ghtKJb6PmcovEX6.jpg', '2022-10-25 22:55:55'),
(17, 'Kỹ năng photoshop cho họa sỹ Concept Art', 5, '699,000VNĐ', 'Học với phương pháp “ Draw or Die” tiên tiến nhất được áp dụng ở các nước phát triển\r\nSở hữu khả năng tư duy sáng tạo nhân vật và kỹ năng vẽ hoàn thiện', 3, 0, 'zZWYNBE98C8Ork1N1VoOCWo4NADhkNmCFzVqCYBr.jpg', '2022-10-25 22:57:13'),
(18, 'Đỉnh cao Photoshop thực chiến', 5, '599,000VNĐ', 'Thành thạo những tính năng ưu việt của phần mềm photoshop.\r\nHiểu được nguyên lý cùng cách xử lý hình ảnh.', 3, 0, '4mgVonXyToGFLtzllRwtusEsaTi1X9dX8vOEFnGO.jpg', '2022-10-25 22:57:44'),
(19, 'Khóa Học Nền Tảng Photoshop - Đồng Hành Cùng Học Viên', 5, '599,000VNĐ', 'Hiểu bản chất và sử dụng thành thạo phần mềm photoshop\r\nHọc cách cắt ghép ảnh và lên ý tưởng cho một tấm hình', 3, 0, 'Cj3C9HX489Hv0yEFEHlMCMbncbhro58yVFhx8zhM.jpg', '2022-10-25 22:58:13'),
(20, '3Ds Max và Vray nâng cao - Làm chủ photoshop', 5, '699,000VNĐ', 'Xuyên suốt khóa học, ngoài kiến thức được bổ sung, học viên còn được giảng viên truyền đạt kinh nghiệm để tránh những lỗi, những sai sót khi thiết kế.\r\nBài tập xuyên suốt sau mỗi bài học quá trình học', 3, 0, 'SCwPT8Ty08ca7AUKXMlvZOrpiNEWQ4OKKAuU8qmP.jpg', '2022-10-25 22:58:46'),
(21, 'Quản trị tài chính doanh nghiệp', 6, '599,000VNĐ', 'Đến với khóa học tài chính doanh nghiệp bạn sẽ biết cách quản trị, sử dụng, đầu tư vốn sao cho hiệu quả\r\nCó khả năng kiểm soát dòng tiền thu – chi khiến lợi nhuận tăng cao', 3, 0, 'kfFOEhfLalmGxOwfRSyKzH1vs9B8jBYdbx5WsQ2v.jpg', '2022-10-25 22:59:50'),
(22, 'Kế toán tài chính doanh nghiệp cho người mới bắt đầu', 6, '699,000VNĐ', 'Bạn sẽ nắm được cách hạch toán kế toán các phần hành kế toán trong doanh nghiệp.\r\nHiểu bản chất hạch toán các nghiệp vụ kế toán từ đơn giản đến phức tạp.', 3, 0, 'LwTM9Mx3qRwXjwoqsrf6XOKsSnmEj3dpbyaS15jG.jpg', '2022-10-25 23:00:18'),
(23, 'Nghệ thuật quản lý tài chính cá nhân', 6, '599,000VNĐ', 'Biết cách để kiện tạo nguồn thu nhập bền vững\r\nBiết cách làm chủ chi tiêu, chi tiêu thông minh', 3, 0, 'oTdNlJGds7MGyf81QaA5V8AoVWZ7WFIoEbEiGZtI.jpg', '2022-10-25 23:01:00'),
(24, 'Lên Báo cáo tài chính tại doanh nghiệp thương mại', 6, '599,000VNĐ', 'Biết làm thông báo phát hành hóa đơn\r\nNộp tờ khai và tiền thuế môn bài\r\nQuy định xử phạt nếu không nộp\r\nCác công việc đầu tiên của 1 doanh nghiệp mới thành lập', 3, 0, 'ZHDWOSCaeGsBgYdMm5mOUe7VmQUkxbMzjE8tjnxi.jpg', '2022-10-25 23:01:33'),
(25, 'Quản trị tài chính cá nhân', 6, '799,000VNĐ', 'Biết cách làm chủ chi tiêu tài chính cá nhân\r\nHiểu rõ hơn về quản trị tài chính cá nhân', 3, 0, 'TZsAzRgdgt2yt3iDPOsmdTNCV7jGwkwI8U1UzIj6.jpg', '2022-10-25 23:02:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lessons`
--

CREATE TABLE `lessons` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `content` text NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `lessons`
--

INSERT INTO `lessons` (`id`, `course_id`, `name`, `desc`, `content`, `upload_date`) VALUES
(1, 1, 'Mảng trong Javascript', 'Giới thiệu cơ bản về mảng trong javascript', '<h2>1. Mảng trong JavaScript l&agrave; g&igrave;?</h2>\n\n<p><br />\n<strong>Mảng</strong>&nbsp;l&agrave; một kiểu dữ liệu đặc biệt, c&oacute; thể chứa nhiều hơn một gi&aacute; trị v&agrave;o một thời điểm.<br />\n<br />\nKhi chưa biết đến mảng, nếu bạn c&oacute; một danh mục sản phẩm (v&iacute; dụ như s&aacute;ch họ t&ecirc;n sinh vi&ecirc;n), bạn c&oacute; thể lưu trữ lại trong một danh s&aacute;ch đơn như n&agrave;y:</p>\n\n<p><img src=\"data:image/png;base64,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\" /></p>\n\n<p>Lưu trữ vậy th&igrave; cũng được đ&oacute;, nhưng m&agrave; danh s&aacute;ch l&agrave; 1.000, hay 100.000 sinh vi&ecirc;n th&igrave; sao?<br />\n<br />\nChẳng lẽ ngồi g&otilde; từng biến SV_1, SV_2, SV_3.... SV_100000 ?<br />\n<br />\nKh&ocirc;ng, ch&uacute;ng ta sẽ kh&ocirc;ng l&agrave;m như thế.<br />\n<br />\nLập tr&igrave;nh sinh ra để tối ưu h&oacute;a c&aacute;c c&ocirc;ng việc lặp đi lặp lại cơ m&agrave;.<br />\n<br />\nGiải ph&aacute;p ở đ&acirc;y l&agrave; sử dụng đến&nbsp;<strong>mảng</strong>, v&iacute; dụ như thế n&agrave;y:<br />\n<img src=\"data:image/png;base64,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\" /></p>\n\n<p>Với mảng, bạn kh&ocirc;ng tạo từng biến như tr&ecirc;n nữa, vừa tiết kiệm bộ nhớ lại c&oacute; thể truy cập đến bất cứ phần tử n&agrave;o trong mảng một c&aacute;ch nhanh ch&oacute;ng.<br />\n<br />\n<strong>Mảng</strong>&nbsp;c&oacute; thể&nbsp;<strong>lưu trữ nhiều gi&aacute; trị</strong>&nbsp;trong&nbsp;<strong>một biến duy nhất</strong>&nbsp;bạn c&oacute; thể truy cập g&aacute;i trị đ&oacute; bằng c&aacute;ch li&ecirc;n kết với chỉ số (index).</p>', '2022-10-19 19:07:34'),
(2, 1, 'Mảng trong Javascript', 'Giới thiệu cơ bản về mảng trong javascript', '<h2>1. Mảng trong JavaScript l&agrave; g&igrave;?</h2>\r\n\r\n<p><br />\r\n<strong>Mảng</strong>&nbsp;l&agrave; một kiểu dữ liệu đặc biệt, c&oacute; thể chứa nhiều hơn một gi&aacute; trị v&agrave;o một thời điểm.<br />\r\n<br />\r\nKhi chưa biết đến mảng, nếu bạn c&oacute; một danh mục sản phẩm (v&iacute; dụ như s&aacute;ch họ t&ecirc;n sinh vi&ecirc;n), bạn c&oacute; thể lưu trữ lại trong một danh s&aacute;ch đơn như n&agrave;y:</p>\r\n\r\n<p><img src=\"data:image/png;base64,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\" /></p>\r\n\r\n<p>Lưu trữ vậy th&igrave; cũng được đ&oacute;, nhưng m&agrave; danh s&aacute;ch l&agrave; 1.000, hay 100.000 sinh vi&ecirc;n th&igrave; sao?<br />\r\n<br />\r\nChẳng lẽ ngồi g&otilde; từng biến SV_1, SV_2, SV_3.... SV_100000 ?<br />\r\n<br />\r\nKh&ocirc;ng, ch&uacute;ng ta sẽ kh&ocirc;ng l&agrave;m như thế.<br />\r\n<br />\r\nLập tr&igrave;nh sinh ra để tối ưu h&oacute;a c&aacute;c c&ocirc;ng việc lặp đi lặp lại cơ m&agrave;.<br />\r\n<br />\r\nGiải ph&aacute;p ở đ&acirc;y l&agrave; sử dụng đến&nbsp;<strong>mảng</strong>, v&iacute; dụ như thế n&agrave;y:<br />\r\n<img src=\"data:image/png;base64,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\" /></p>\r\n\r\n<p>Với mảng, bạn kh&ocirc;ng tạo từng biến như tr&ecirc;n nữa, vừa tiết kiệm bộ nhớ lại c&oacute; thể truy cập đến bất cứ phần tử n&agrave;o trong mảng một c&aacute;ch nhanh ch&oacute;ng.<br />\r\n<br />\r\n<strong>Mảng</strong>&nbsp;c&oacute; thể&nbsp;<strong>lưu trữ nhiều gi&aacute; trị</strong>&nbsp;trong&nbsp;<strong>một biến duy nhất</strong>&nbsp;bạn c&oacute; thể truy cập g&aacute;i trị đ&oacute; bằng c&aacute;ch li&ecirc;n kết với chỉ số (index).</p>', '2022-10-10 23:53:58');
INSERT INTO `lessons` (`id`, `course_id`, `name`, `desc`, `content`, `upload_date`) VALUES
(3, 1, 'Mảng trong Javascript', 'Giới thiệu cơ bản về mảng trong javascript', '<h2>1. Mảng trong JavaScript l&agrave; g&igrave;?</h2>\r\n\r\n<p><br />\r\n<strong>Mảng</strong>&nbsp;l&agrave; một kiểu dữ liệu đặc biệt, c&oacute; thể chứa nhiều hơn một gi&aacute; trị v&agrave;o một thời điểm.<br />\r\n<br />\r\nKhi chưa biết đến mảng, nếu bạn c&oacute; một danh mục sản phẩm (v&iacute; dụ như s&aacute;ch họ t&ecirc;n sinh vi&ecirc;n), bạn c&oacute; thể lưu trữ lại trong một danh s&aacute;ch đơn như n&agrave;y:</p>\r\n\r\n<p><img src=\"data:image/png;base64,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\" /></p>\r\n\r\n<p>Lưu trữ vậy th&igrave; cũng được đ&oacute;, nhưng m&agrave; danh s&aacute;ch l&agrave; 1.000, hay 100.000 sinh vi&ecirc;n th&igrave; sao?<br />\r\n<br />\r\nChẳng lẽ ngồi g&otilde; từng biến SV_1, SV_2, SV_3.... SV_100000 ?<br />\r\n<br />\r\nKh&ocirc;ng, ch&uacute;ng ta sẽ kh&ocirc;ng l&agrave;m như thế.<br />\r\n<br />\r\nLập tr&igrave;nh sinh ra để tối ưu h&oacute;a c&aacute;c c&ocirc;ng việc lặp đi lặp lại cơ m&agrave;.<br />\r\n<br />\r\nGiải ph&aacute;p ở đ&acirc;y l&agrave; sử dụng đến&nbsp;<strong>mảng</strong>, v&iacute; dụ như thế n&agrave;y:<br />\r\n<img src=\"data:image/png;base64,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\" /></p>\r\n\r\n<p>Với mảng, bạn kh&ocirc;ng tạo từng biến như tr&ecirc;n nữa, vừa tiết kiệm bộ nhớ lại c&oacute; thể truy cập đến bất cứ phần tử n&agrave;o trong mảng một c&aacute;ch nhanh ch&oacute;ng.<br />\r\n<br />\r\n<strong>Mảng</strong>&nbsp;c&oacute; thể&nbsp;<strong>lưu trữ nhiều gi&aacute; trị</strong>&nbsp;trong&nbsp;<strong>một biến duy nhất</strong>&nbsp;bạn c&oacute; thể truy cập g&aacute;i trị đ&oacute; bằng c&aacute;ch li&ecirc;n kết với chỉ số (index).</p>', '2022-10-10 23:54:27'),
(4, 3, 'Chương 1: Chương mở đầu', 'Giới thiệu về lập trình C#, cách cài đặt và sử dụng công cụ lập trình', '<p>&nbsp;B&agrave;i 1: Giới thiệu về C#</p>\r\n\r\n<p>&nbsp;B&agrave;i 2: C&agrave;i đặt v&agrave; sử dụng Visual Studio</p>', '2022-10-25 22:25:25'),
(5, 3, 'Chương 2', 'Tổng quan lập trình C#', '<p>&nbsp;B&agrave;i 3: Kiểu dữ liệu,Biến v&agrave; biểu thức</p>\r\n\r\n<p>B&agrave;i 4: C&aacute;c ph&eacute;p to&aacute;n trong C#</p>\r\n\r\n<p>B&agrave;i 5: C&aacute;c c&aacute;ch ghi ch&uacute; trong C#</p>\r\n\r\n<p>B&agrave;i 6: C&aacute;c cấu tr&uacute;c điều kiện</p>\r\n\r\n<p>B&agrave;i 7: C&aacute;c cấu tr&uacute;c lặp</p>\r\n\r\n<p>B&agrave;i 8: H&agrave;m trong C#</p>\r\n\r\n<p>B&agrave;i 9: Một số thư viện thường d&ugrave;ng</p>\r\n\r\n<p>B&agrave;i 10: Project tổng hợp</p>', '2022-10-25 22:27:54'),
(6, 3, 'Chương 3', 'Cách thức debug và xử lý biệt lệ trong C#', '<p>&nbsp;B&agrave;i 11: Debug trong c#</p>\r\n\r\n<p>B&agrave;i 12: Xử l&yacute; biệt lệ trong C#</p>', '2022-10-25 22:28:53'),
(7, 3, 'Chương 4', 'Chuỗi, mảng và collection trong C#', '<p>B&agrave;i 13: Chuỗi v&agrave; c&aacute;c thao t&aacute;c tr&ecirc;n chuỗi</p>\r\n\r\n<p>B&agrave;i 14: Mảng</p>\r\n\r\n<p>B&agrave;i 15: List</p>\r\n\r\n<p>B&agrave;i 16: Dictionary</p>\r\n\r\n<p>B&agrave;i 17: Project thực tế</p>', '2022-10-25 22:29:57'),
(8, 3, 'Chương 5', 'Lập trình hướng đối tượng trong C#', '<p>&nbsp;B&agrave;i 18: C&aacute;c kh&aacute;i niệm li&ecirc;n quan tới lớp v&agrave; đối tượng</p>\r\n\r\n<p>B&agrave;i 19: X&acirc;y dựng c&aacute;c lớp (Class) c&aacute;c th&agrave;nh phần của lớp</p>\r\n\r\n<p>B&agrave;i 20: X&acirc;y dựng c&aacute;c lớp kế thừa trong C#</p>\r\n\r\n<p>B&agrave;i 21: Project thực tế</p>', '2022-10-25 22:30:43'),
(9, 3, 'Chương 6', 'Lập trình Windows Form cơ bản trong C#', '<p>B&agrave;i 22: Giới thiệu về Windows Form</p>\r\n\r\n<p>B&agrave;i 23: Giới thiệu về thanh c&ocirc;ng cụ Toolbox &amp; Properties</p>\r\n\r\n<p>B&agrave;i 24: MessageBox</p>\r\n\r\n<p>B&agrave;i 25: Panel &amp; SplitContainer</p>\r\n\r\n<p>B&agrave;i 26: C&aacute;c control cơ bản nhất: Label,Textbox, Button</p>\r\n\r\n<p>B&agrave;i 27: Checkbox, RadioButton</p>\r\n\r\n<p>B&agrave;i 28: Picturebox</p>\r\n\r\n<p>B&agrave;i 29: DateTimePicker &amp; MonthCalendar</p>\r\n\r\n<p>B&agrave;i 30: ListBox</p>\r\n\r\n<p>B&agrave;i 31: ComboBox</p>\r\n\r\n<p>B&agrave;i 32: CheckedListBox</p>\r\n\r\n<p>B&agrave;i 33: Project thực tế</p>', '2022-10-25 22:32:35'),
(10, 3, 'Chương 7', 'Các bài tập rèn luyện tổng hợp - Có đáp án', '<p>B&agrave;i 34: B&agrave;i tập r&egrave;n luyện 1 - Vẽ giao diện v&agrave; xử l&yacute; sự kiện l&uacute;c Runtime</p>\r\n\r\n<p>B&agrave;i 35: B&agrave;i tập r&egrave;n luyện 2 - Chương tr&igrave;nh t&iacute;nh tiền b&aacute;n s&aacute;ch</p>\r\n\r\n<p>B&agrave;i 36: B&agrave;i tập r&egrave;n luyện 3 - Thiết kế giao diện xử l&yacute; chuỗi</p>\r\n\r\n<p>B&agrave;i 37: B&agrave;i tập r&egrave;n luyện 4- Viết chương tr&igrave;nh đặt v&eacute; cho Rạp chiếu phim</p>\r\n\r\n<p>B&agrave;i 38: B&agrave;i tập r&egrave;n luyện 5- Thiết kế giao diện tương t&aacute;c với mảng</p>', '2022-10-25 22:33:38'),
(11, 3, 'Chương 8', 'Các bài tập rèn luyện tổng hợp - tự giải', '<p>B&agrave;i 39: B&agrave;i tập r&egrave;n luyện 6- Thiết kế m&agrave;n h&igrave;nh H&oacute;a đơn b&aacute;n xe</p>\r\n\r\n<p>B&agrave;i 40: B&agrave;i tập r&egrave;n luyện 7 - Viết Game Caro 2 người chơi với nhau</p>\r\n\r\n<p>B&agrave;i 41: B&agrave;i tập r&egrave;n luyện 8 - Viết phần mềm Kiểm tra g&otilde; ph&iacute;m</p>\r\n\r\n<p>B&agrave;i 42: B&agrave;i tập r&egrave;n luyện 9 - Viết phần mềm tương tự MsPaint</p>\r\n\r\n<p>B&agrave;i 43: B&agrave;i tập r&egrave;n luyện 10- Viết game Xếp h&igrave;nh</p>\r\n\r\n<p>B&agrave;i 44: Tổng kết kh&oacute;a học</p>', '2022-10-25 22:34:36'),
(12, 4, 'Chương 1', 'Giới thiệu ngôn ngữ lập trình Java', '<p>&nbsp;B&agrave;i 1: Giới thiệu sơ lược ng&ocirc;n ngữ lập tr&igrave;nh Java</p>\r\n\r\n<p>&nbsp;B&agrave;i 2: C&aacute;c c&ocirc;ng cụ lập tr&igrave;nh với Java</p>\r\n\r\n<p>&nbsp;B&agrave;i 3: C&agrave;i đặt JDK</p>\r\n\r\n<p>&nbsp;B&agrave;i 4: C&agrave;i đặt biến m&ocirc;i trường cho Java</p>\r\n\r\n<p>&nbsp;B&agrave;i 5: C&aacute;ch chạy chương tr&igrave;nh Java bằng lệnh Command line</p>\r\n\r\n<p>&nbsp;B&agrave;i 6: C&aacute;ch c&agrave;i đặt v&agrave; sử dụng c&ocirc;ng cụ Eclipse</p>', '2022-10-25 22:38:12'),
(13, 4, 'Chương 2', 'Nền tảng ngôn ngữ lập trình Java', '<p>&nbsp;B&agrave;i 7: C&aacute;ch xuất dữ liệu ra m&agrave;n h&igrave;nh</p>\r\n\r\n<p>&nbsp;B&agrave;i 8: C&aacute;ch ghi ch&uacute; lệnh quan trọng trong Java</p>\r\n\r\n<p>&nbsp;B&agrave;i 9: Kiểu dữ liệu trong Java</p>\r\n\r\n<p>&nbsp;B&agrave;i 10: &Eacute;p kiểu dữ liệu trong Java</p>\r\n\r\n<p>&nbsp;B&agrave;i 11: Khai b&aacute;o biến trong Java</p>\r\n\r\n<p>&nbsp;B&agrave;i 12: C&aacute;c ph&eacute;p to&aacute;n trong Java</p>\r\n\r\n<p>&nbsp;B&agrave;i 13: Nhập dữ liệu từ b&agrave;n ph&iacute;m với Scanner</p>\r\n\r\n<p>&nbsp;B&agrave;i 14: Cấu tr&uacute;c if, if else, cấu tr&uacute;c 3 ng&ocirc;i</p>\r\n\r\n<p>&nbsp;B&agrave;i 15: Cấu tr&uacute;c switch</p>\r\n\r\n<p>&nbsp;B&agrave;i 16: V&ograve;ng lặp while</p>\r\n\r\n<p>&nbsp;B&agrave;i 17: V&ograve;ng lặp do..while</p>\r\n\r\n<p>&nbsp;B&agrave;i 18: V&ograve;ng lặp for</p>\r\n\r\n<p>&nbsp;B&agrave;i 19: &Yacute; nghĩa v&agrave; c&aacute;ch sử dụng break v&agrave; continue trong c&aacute;c v&ograve;ng lặp</p>\r\n\r\n<p>&nbsp;B&agrave;i 20: B&agrave;i tập r&egrave;n luyện 1-Giải phương tr&igrave;nh bậc 2</p>\r\n\r\n<p>&nbsp;B&agrave;i 21: B&agrave;i tập r&egrave;n luyện 2-Giải to&aacute;n học</p>\r\n\r\n<p>&nbsp;B&agrave;i 22: B&agrave;i tập r&egrave;n luyện 3- T&iacute;nh d&atilde;y to&aacute;n học</p>\r\n\r\n<p>&nbsp;B&agrave;i 23: Danh s&aacute;ch c&aacute;c b&agrave;i tập tự r&egrave;n luyện 1</p>', '2022-10-25 22:39:33'),
(14, 4, 'Chương 3', 'Xử lý lỗi trong Java', '<p>&nbsp;B&agrave;i 24: Kh&aacute;i niệm về biệt lệ</p>\r\n\r\n<p>&nbsp;B&agrave;i 25: C&aacute;ch sử dụng try ... catch</p>\r\n\r\n<p>&nbsp;B&agrave;i 26: &Yacute; nghĩa của từ kh&oacute;a finally</p>\r\n\r\n<p>&nbsp;B&agrave;i 27: &Yacute; nghĩa của throw</p>\r\n\r\n<p>&nbsp;B&agrave;i 28: C&aacute;ch gỡ lỗi bằng c&ocirc;ng cụ debug</p>', '2022-10-25 22:40:04'),
(15, 4, 'Chương 4', 'Các thư viện quan trọng thường dùng trong Java/Android', '<p>&nbsp;B&agrave;i 29: Thư viện xử l&yacute; dữ liệu số</p>\r\n\r\n<p>&nbsp;B&agrave;i 30: Thư viện xử l&yacute; ng&agrave;y th&aacute;ng</p>\r\n\r\n<p>&nbsp;B&agrave;i 31: Thư viện to&aacute;n học</p>\r\n\r\n<p>&nbsp;B&agrave;i 32: Thư viện xử l&yacute; số ngẫu nhi&ecirc;n</p>\r\n\r\n<p>&nbsp;B&agrave;i 33: Thư viện xử l&yacute; chuỗi</p>', '2022-10-25 22:41:43'),
(16, 5, 'Chương 1', 'Giới thiệu và các phần mềm cần thiết', '<p>&nbsp;B&agrave;i 1: C&agrave;i đặt phần mềm cần thiết</p>\r\n\r\n<p>&nbsp;B&agrave;i 2: Giới thiệu kh&oacute;a học</p>', '2022-10-25 22:43:55'),
(17, 5, 'Chương 2', 'Các kiến thức cơ bản', '<p>B&agrave;i 3: Giới thiệu c&aacute;c thẻ HTML cần thiết cho cắt web</p>\r\n\r\n<p>B&agrave;i 4: 3 C&aacute;ch đưa CSS v&agrave;o trong file HTML</p>\r\n\r\n<p>B&agrave;i 5: C&aacute;c thuộc t&iacute;nh css</p>', '2022-10-25 22:44:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('thai1vuon2pham@gmail.com', '$2y$10$2/mfm5HiGPWyVZIo.RelGuhRi.QiWyicjljd0Vqx0FZphjqYPQcYW', '2022-10-11 03:20:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` float(10,2) NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `payments`
--

INSERT INTO `payments` (`id`, `payment_id`, `payer_id`, `payer_email`, `amount`, `currency`, `payment_status`) VALUES
(4, 'PAYID-MNLJ6ZI5GA25609G1335384A', 'E5WA7ZQ84EFV8', 'sb-hlqvr21942719@personal.example.com', 2.01, 'USD', 'approved'),
(5, 'PAYID-MNLJ6ZI5GA25609G1335384A', 'E5WA7ZQ84EFV8', 'sb-hlqvr21942719@personal.example.com', 2.01, 'USD', 'approved'),
(6, 'PAYID-MNMOAZA58L46550P1678282A', 'Y4GW48XV6KADJ', 'sb-tn43wu22015619@personal.example.com', 19.27, 'USD', 'approved'),
(7, 'PAYID-MNRHCRA4VG44605KN4705639', 'Y4GW48XV6KADJ', 'sb-tn43wu22015619@personal.example.com', 5.19, 'USD', 'approved'),
(8, 'PAYID-MNRHDVI285851064T756474E', 'Y4GW48XV6KADJ', 'sb-tn43wu22015619@personal.example.com', 2.01, 'USD', 'approved'),
(9, 'PAYID-MNRHERI4P48734463590115U', 'Y4GW48XV6KADJ', 'sb-tn43wu22015619@personal.example.com', 19.27, 'USD', 'approved'),
(10, 'PAYID-MNRHE6A3CX94605AN263574Y', 'Y4GW48XV6KADJ', 'sb-tn43wu22015619@personal.example.com', 24.10, 'USD', 'approved'),
(11, 'PAYID-MNRHFFQ4J5151654X907724E', 'Y4GW48XV6KADJ', 'sb-tn43wu22015619@personal.example.com', 16.05, 'USD', 'approved'),
(12, 'PAYID-MNRHF4Q3J6508379X907464C', 'Y4GW48XV6KADJ', 'sb-tn43wu22015619@personal.example.com', 9.62, 'USD', 'approved'),
(13, 'PAYID-MNRHGCY8XP01924AV161361M', 'Y4GW48XV6KADJ', 'sb-tn43wu22015619@personal.example.com', 19.27, 'USD', 'approved'),
(14, 'PAYID-MNRHGIQ86666306J17686717', 'Y4GW48XV6KADJ', 'sb-tn43wu22015619@personal.example.com', 32.15, 'USD', 'approved'),
(15, 'PAYID-MNRHGOA5CJ264045W8646907', 'Y4GW48XV6KADJ', 'sb-tn43wu22015619@personal.example.com', 16.05, 'USD', 'approved'),
(16, 'PAYID-MNRHGTY8AU118962X144641U', 'Y4GW48XV6KADJ', 'sb-tn43wu22015619@personal.example.com', 24.10, 'USD', 'approved'),
(17, 'PAYID-MNRHHFI11R828044D1730038', 'Y4GW48XV6KADJ', 'sb-tn43wu22015619@personal.example.com', 24.10, 'USD', 'approved'),
(18, 'PAYID-MNRHHJQ8GF80537AR3833319', 'Y4GW48XV6KADJ', 'sb-tn43wu22015619@personal.example.com', 9.62, 'USD', 'approved'),
(19, 'PAYID-MNRHHOA0KC02689705765527', 'Y4GW48XV6KADJ', 'sb-tn43wu22015619@personal.example.com', 9.62, 'USD', 'approved'),
(20, 'PAYID-MNRHHTA2GW48293UG318744X', 'Y4GW48XV6KADJ', 'sb-tn43wu22015619@personal.example.com', 24.10, 'USD', 'approved'),
(21, 'PAYID-MNRHIAA1L976921K6612032C', 'Y4GW48XV6KADJ', 'sb-tn43wu22015619@personal.example.com', 9.62, 'USD', 'approved'),
(22, 'PAYID-MNRHIDY6NR30269UJ125921Y', 'Y4GW48XV6KADJ', 'sb-tn43wu22015619@personal.example.com', 20.08, 'USD', 'approved'),
(23, 'PAYID-MNRHIUI191884747R827230L', 'Y4GW48XV6KADJ', 'sb-tn43wu22015619@personal.example.com', 24.10, 'USD', 'approved'),
(24, 'PAYID-MNRHIZA7L2202663W562545F', 'Y4GW48XV6KADJ', 'sb-tn43wu22015619@personal.example.com', 24.10, 'USD', 'approved'),
(25, 'PAYID-MNRHJXI5YD090055M466624D', 'Y4GW48XV6KADJ', 'sb-tn43wu22015619@personal.example.com', 19.27, 'USD', 'approved'),
(26, 'PAYID-MNRHNEY3UC14180P0194362V', 'Y4GW48XV6KADJ', 'sb-tn43wu22015619@personal.example.com', 28.12, 'USD', 'approved'),
(27, 'PAYID-MNRHNPQ7FK82377RJ9525011', 'Y4GW48XV6KADJ', 'sb-tn43wu22015619@personal.example.com', 28.12, 'USD', 'approved'),
(28, 'PAYID-MNRHN3Y7H636185YC3279124', 'Y4GW48XV6KADJ', 'sb-tn43wu22015619@personal.example.com', 24.10, 'USD', 'approved'),
(29, 'PAYID-MNRHOAQ7MF76812TW635761W', 'Y4GW48XV6KADJ', 'sb-tn43wu22015619@personal.example.com', 5.19, 'USD', 'approved'),
(30, 'PAYID-MNRHOFA777970887Y337472E', 'Y4GW48XV6KADJ', 'sb-tn43wu22015619@personal.example.com', 49.67, 'USD', 'approved'),
(31, 'PAYID-MNRHOJQ5AF41331WX635012Y', 'Y4GW48XV6KADJ', 'sb-tn43wu22015619@personal.example.com', 24.10, 'USD', 'approved');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'Giáo viên'),
(3, 'Học viên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `saved_courses`
--

CREATE TABLE `saved_courses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `day_saved` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `saved_courses`
--

INSERT INTO `saved_courses` (`id`, `user_id`, `course_id`, `day_saved`) VALUES
(1, 2, 4, '2022-10-24 07:38:57'),
(2, 2, 5, '2022-10-24 07:45:40'),
(3, 4, 6, '2022-10-26 00:24:08'),
(4, 4, 7, '2022-11-02 06:31:18'),
(5, 5, 8, '2022-11-02 06:34:59'),
(6, 5, 9, '2022-11-02 06:35:31'),
(7, 5, 10, '2022-11-02 06:36:20'),
(8, 5, 11, '2022-11-02 06:36:49'),
(9, 6, 12, '2022-11-02 06:38:21'),
(10, 6, 13, '2022-11-02 06:38:46'),
(11, 6, 14, '2022-11-02 06:39:11'),
(12, 6, 15, '2022-11-02 06:39:33'),
(13, 6, 16, '2022-11-02 06:39:57'),
(14, 7, 17, '2022-11-02 06:41:04'),
(15, 7, 18, '2022-11-02 06:41:21'),
(16, 7, 19, '2022-11-02 06:41:39'),
(17, 7, 20, '2022-11-02 06:41:58'),
(18, 8, 21, '2022-11-02 06:42:50'),
(19, 8, 22, '2022-11-02 06:43:08'),
(20, 8, 23, '2022-11-02 06:44:11'),
(21, 8, 24, '2022-11-02 06:44:31'),
(22, 9, 25, '2022-11-02 06:46:32'),
(23, 9, 26, '2022-11-02 06:53:50'),
(24, 9, 27, '2022-11-02 06:54:33'),
(25, 10, 28, '2022-11-02 06:55:23'),
(26, 10, 29, '2022-11-02 06:55:41'),
(27, 10, 30, '2022-11-02 06:55:58'),
(28, 10, 31, '2022-11-02 06:56:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'Online'),
(2, 'Khóa');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `id_role` int(11) NOT NULL DEFAULT 2,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0000000000',
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'o6nLsOpow8zTQsl1SGZPQju3w6reP2zy6k8KKgOJ.jpg',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `status`, `id_role`, `email`, `phone`, `avatar`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Thái Vươn Phàm', 1, 1, 'thai1vuon2pham@gmail.com', '0369006523', 'o6nLsOpow8zTQsl1SGZPQju3w6reP2zy6k8KKgOJ.jpg', NULL, '$2y$10$1KSCs2654BL2Wmbs.9peheSZR9MCbMVFJUW1lbfhO/oshj4r7Lame', 'RtSkWvtP8ipED3esp5ue2iMU2VunXTCNzQVlHJUWSogN9bko7XJGLms1B1ml', '2022-10-04 02:45:59', '2022-10-14 11:06:32'),
(2, 'Trần Văn Tám', 1, 3, 'no@cm.com', '0332222112', 'pf9JqaDbb7hVFcCDo9XsMkeJNl2eUqdr6lEhE1ka.png', NULL, '$2y$10$FYtthzDJ2Gc3w4wQZVpBaOPKOxa169IuwScZAd7ywVZhHN7cm72EK', NULL, '2022-10-13 10:57:36', '2022-10-23 02:39:01'),
(3, 'Phan Bao Nhan', 1, 2, 'nhanb1805900@student.ctu.edu.vn', '0000000000', 'o6nLsOpow8zTQsl1SGZPQju3w6reP2zy6k8KKgOJ.jpg', NULL, '$2y$10$dDmBuwTcVGlkbaQI4s5iZutJ9u8A177D8oSrKr5tpDbtLQ8EUB4za', '6GSgbOEwSRfNeHiYS4i5uQ1IWTH2lMK6P6waFT8De2MCnurVFPS0eG2XcJHy', '2022-10-25 04:08:00', '2022-10-25 04:08:00'),
(4, 'Test User', 1, 3, 'phanbaonhan1998@yahoo.com', '0000000000', 'o6nLsOpow8zTQsl1SGZPQju3w6reP2zy6k8KKgOJ.jpg', NULL, '$2y$10$1KYZr0sOLfH7tzyqRJXVOeo6s36s/zk8k4xaNT3mWNs.OgSyQTD86', '7pJ5kuBAcFyKo7doTFydWcEh7UqgnOPr1WDeCtFSx24TIsPuHIT78iZmZHD6', '2022-10-25 23:33:15', '2022-10-25 23:33:15'),
(5, 'Tạ Gia Tùng', 1, 3, 'tagiatung1994@mailforspam.com', '0000000000', 'o6nLsOpow8zTQsl1SGZPQju3w6reP2zy6k8KKgOJ.jpg', NULL, '$2y$10$g/PD2NrZEnaIx/HzlapCpul0uk2dE5KTnHpsiYcHpRgSu0PiKmWCq', NULL, '2022-11-02 06:32:19', '2022-11-02 06:32:19'),
(6, 'Thạch Hải Công', 1, 3, 'thachhaicong2001@mailforspam.com', '0000000000', 'o6nLsOpow8zTQsl1SGZPQju3w6reP2zy6k8KKgOJ.jpg', NULL, '$2y$10$NDyJ08HveGFZvbzakLf3fOnTcR6j1KJP7UREZhgU0KX7aFrH.0z9u', NULL, '2022-11-02 06:37:47', '2022-11-02 06:37:47'),
(7, 'Đặng Hiếu Phi', 1, 3, 'danghieuphi1996@mailforspam.com', '0000000000', 'o6nLsOpow8zTQsl1SGZPQju3w6reP2zy6k8KKgOJ.jpg', NULL, '$2y$10$8ew4DY5fMOAadj9ywU5c7.wg75wEtxf5C0t8qBCvrR4UVkcbuFXmS', NULL, '2022-11-02 06:40:37', '2022-11-02 06:40:37'),
(8, 'Tạ Mạnh Hiếu', 1, 3, 'tamanhhieu2001@mailforspam.com', '0000000000', 'o6nLsOpow8zTQsl1SGZPQju3w6reP2zy6k8KKgOJ.jpg', NULL, '$2y$10$5kgfUo/k.zhsB1iyxzA0N.sfm0Df5y7jcm8wXF82oh1ypRC6Eg5yu', NULL, '2022-11-02 06:42:29', '2022-11-02 06:42:29'),
(9, 'Phạm Trâm Diệp', 1, 3, 'phamtramdiep1995@mailforspam.com', '0000000000', 'o6nLsOpow8zTQsl1SGZPQju3w6reP2zy6k8KKgOJ.jpg', NULL, '$2y$10$iIYuWLC5A34LwbsZ1kfyU.K5gpyZDbOOj4LfpwMZwyeKAb7UL14ye', NULL, '2022-11-02 06:46:08', '2022-11-02 06:46:08'),
(10, 'Hoàng Tuấn Giang', 1, 3, 'hoangtuangiang1992@mailforspam.com', '0000000000', 'o6nLsOpow8zTQsl1SGZPQju3w6reP2zy6k8KKgOJ.jpg', NULL, '$2y$10$an8EDqJqK/0CWmzm3kJoa.0aVPE/uvPqfeHL8wpVqBegEWPdaNn0m', NULL, '2022-11-02 06:54:58', '2022-11-02 06:54:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlist_items`
--

CREATE TABLE `wishlist_items` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wishlist_items`
--

INSERT INTO `wishlist_items` (`id`, `course_id`, `user_id`) VALUES
(11, 4, 4),
(12, 9, 4);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `saved_courses`
--
ALTER TABLE `saved_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_saved_course` (`course_id`),
  ADD KEY `FK_saved_user_course` (`user_id`);

--
-- Chỉ mục cho bảng `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `wishlist_items`
--
ALTER TABLE `wishlist_items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `saved_courses`
--
ALTER TABLE `saved_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `wishlist_items`
--
ALTER TABLE `wishlist_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
