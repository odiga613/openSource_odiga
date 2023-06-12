-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 23-06-09 15:24
-- 서버 버전: 10.4.27-MariaDB
-- PHP 버전: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `phococo`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `target_coordinate`
--

CREATE TABLE `target_coordinate` (
  `area` char(20) NOT NULL,
  `user_target_coordinate_x` double NOT NULL,
  `user_target_coordinate_y` double NOT NULL,
  `real_user_target_coordinate_x` double NOT NULL,
  `real_user_target_coordinate_y` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `target_coordinate`
--

INSERT INTO `target_coordinate` (`area`, `user_target_coordinate_x`, `user_target_coordinate_y`, `real_user_target_coordinate_x`, `real_user_target_coordinate_y`) VALUES
('H.R.A', 33.4550066, 126.5605563, 33.4550066, 126.5605563),
('간호대학', 33.4556, 126.56385, 33.4560615, 126.5644151),
('감귤화훼과학기술센터', 33.45878, 126.5625299, 33.45878, 126.5625299),
('경상대학1호관', 33.45424, 126.56218, 33.454057, 126.5616528),
('경상대학2호관', 33.45421, 126.56331, 33.4538855, 126.5628744),
('공과대학1호관', 33.457086, 126.5654426, 33.4570862, 126.5654426),
('공과대학2호관', 33.4575165, 126.5660347, 33.4575165, 126.5660347),
('공과대학3호관', 33.456405, 126.5653088, 33.456405, 126.5653088),
('공과대학4호관', 33.45474, 126.56428, 33.4547092, 126.5650887),
('공과대학부설공장', 33.4558561, 126.5662581, 33.4558561, 126.5662581),
('교수회관', 33.4528541, 126.5599352, 33.4528541, 126.5599352),
('교양강의동', 33.45563, 126.56385, 33.4556489, 126.5643607),
('농업창업보육센터', 33.45744, 126.56316, 33.4583977, 126.5634111),
('대운동장', 33.4557, 126.56115, 33.4554797, 126.5594705),
('동아리연합회실', 33.4550066, 126.5605563, 33.4550066, 126.5605563),
('미래융합대학', 33.4567686, 126.563586, 33.4567686, 126.563586),
('미술관', 33.4529575, 126.5617739, 33.4529575, 126.5617739),
('바이오헬스소재개발연구지원센터', 33.45774, 126.55973, 33.4581305, 126.5599005),
('박물관', 33.45883, 126.56117, 33.4587753, 126.5618495),
('법과정책연구원', 33.4535338, 126.5603056, 33.4535338, 126.5603056),
('법대', 33.4535338, 126.5603056, 33.4535338, 126.5603056),
('법학전문대학원', 33.4535338, 126.5603056, 33.4535338, 126.5603056),
('본관', 33.45624, 126.56239, 33.4558746, 126.5619072),
('사범대학1호관', 33.45474, 126.56428, 33.4549416, 126.5632106),
('사범대학2호관', 33.45523, 126.5643, 33.4553351, 126.5635905),
('사회과학대학', 33.45504, 126.5624, 33.454837, 126.5616919),
('산학협력관', 33.4597729, 126.5635091, 33.4597729, 126.5635091),
('생명자원과학대학', 33.45744, 126.56316, 33.4582624, 126.5627583),
('수의과대학', 33.45156, 126.5592, 33.4520763, 126.558627),
('수의과대학부설동물병원', 33.4514009, 126.5588509, 33.4514009, 126.5588509),
('아라뮤즈홀', 33.45466, 126.56105, 33.4536324, 126.5595011),
('아라컨벤션홀', 33.45313, 126.55978, 33.4522942, 126.5596907),
('안단테', 33.4550066, 126.5605563, 33.4550066, 126.5605563),
('야외음악당', 33.45666, 126.56322, 33.4572099, 126.5627851),
('약학대학', 33.45743, 126.56118, 33.4573764, 126.5601571),
('어린이급식관리지원센터', 33.4579956, 126.5651073, 33.457995, 126.5651073),
('언어교육원', 33.4540792, 126.5602759, 33.4540792, 126.5602759),
('엑센트', 33.4550066, 126.5605563, 33.4550066, 126.5605563),
('외국어대학', 33.4540792, 126.5602759, 33.4540792, 126.5602759),
('원자력과학기술연구소', 33.458167, 126.5657518, 33.458167, 126.5657518),
('음악관', 33.4523457, 126.5627773, 33.4523457, 126.5627773),
('의과대학', 33.4528659, 126.5639013, 33.4528658, 126.5639013),
('의학전문대학원', 33.4528659, 126.5639013, 33.4528658, 126.5639013),
('의학전문대학원1호관', 33.4528659, 126.5639013, 33.4528658, 126.5639013),
('인문대학1호관', 33.4534638, 126.5583511, 33.4534638, 126.5583511),
('인문대학2호관', 33.4527814, 126.5585132, 33.4527814, 126.5585132),
('인재양성관', 33.45308, 126.55758, 33.4526406, 126.5563278),
('자연과학대학1호관', 33.4579557, 126.564653, 33.4579557, 126.564653),
('자연과학대학2호관', 33.45777, 126.56117, 33.4584841, 126.5604339),
('정문', 33.4593662, 126.561298, 33.4593662, 126.561298),
('정보화본부', 33.454728, 126.56389, 33.4545165, 126.563479),
('제2운동장', 33.45474, 126.56428, 33.4535591, 126.5668342),
('제주대학교골프아카데미', 33.4514428, 126.563048, 33.4514428, 126.563048),
('제주테크노파크바이오융합센터2호관', 33.4523973, 126.5665523, 33.4523973, 126.5665523),
('주변전실', 33.4577477, 126.5638204, 33.4577477, 126.5638204),
('중앙도서관', 33.4526633, 126.5608128, 33.4526633, 126.5608128),
('중앙디지털도서관', 33.4526633, 126.5608128, 33.4522307, 126.5608419),
('체육관', 33.45623, 126.56117, 33.456023, 126.5605081),
('총대의원회실', 33.4550066, 126.5605563, 33.4550066, 126.5605563),
('총학생회실', 33.4550066, 126.5605563, 33.4550066, 126.5605563),
('친환경농업연구소', 33.4577987, 126.5629462, 33.4577987, 126.5629462),
('터울림', 33.4550066, 126.5605563, 33.4550066, 126.5605563),
('테니스장', 33.4556791, 126.5582403, 33.4556791, 126.5582403),
('평생교육원', 33.45313, 126.56037, 33.4524109, 126.5601768),
('학생생활관1호관', 33.45158, 126.55769, 33.4509516, 126.5567424),
('학생생활관2호관', 33.4503797, 126.5569362, 33.4503797, 126.5569362),
('학생생활관3호관', 33.4517865, 126.5563805, 33.4517865, 126.5563805),
('학생생활관4호관', 33.4509766, 126.5580679, 33.4509766, 126.5580679),
('학생생활관5호관', 33.4522875, 126.5565608, 33.4522875, 126.5565608),
('학생생활관6호관', 33.4535344, 126.5566836, 33.4535344, 126.5566836),
('학생회관', 33.4550066, 126.5605563, 33.4550066, 126.5605563),
('한라카페테리아', 33.4550066, 126.5605563, 33.4550066, 126.5605563),
('해양과학대학1호관', 33.4570398, 126.5637702, 33.4570398, 126.5637702),
('해양과학대학3호관', 33.4570398, 126.5637702, 33.4572402, 126.5643635),
('해양과학대학4호관', 33.45474, 126.56428, 33.4548421, 126.5663304),
('후문', 33.4508398, 126.5582783, 33.4508398, 126.5582783);

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `target_coordinate`
--
ALTER TABLE `target_coordinate`
  ADD PRIMARY KEY (`area`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
