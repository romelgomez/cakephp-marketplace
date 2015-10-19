-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 19-10-2015 a las 08:33:04
-- Versión del servidor: 5.5.43-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `cakephp-marketplace`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banners`
--

CREATE TABLE IF NOT EXISTS `banners` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` char(36) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_tag` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `banners`
--

INSERT INTO `banners` (`id`, `parent_id`, `user_id`, `size`, `name`, `name_tag`, `deleted`, `created`, `modified`) VALUES
('54bfd4b5-2094-4923-9296-55027f000008', '54bfd4b5-bca8-4d69-94d4-55027f000008', '54be33cc-a428-4914-b1c8-103b7f000008', 'facebook', '58f6a6e0-daf4-4a85-be97-01657055e3de.jpg', '05Envy_rear_complete_bikes_960x726_slider.jpg', 0, '2015-01-21 12:02:53', '2015-01-21 12:02:53'),
('54bfd4b5-bca8-4d69-94d4-55027f000008', NULL, '54be33cc-a428-4914-b1c8-103b7f000008', 'small', 'c4107f6f-5a28-42d2-8c58-09e05661b5c8.jpg', '05Envy_rear_complete_bikes_960x726_slider.jpg', 0, '2015-01-21 12:02:53', '2015-01-21 12:02:53'),
('5521e8d8-55c0-4b43-a7bb-43f17f00000a', NULL, '54be33cc-a428-4914-b1c8-103b7f000008', 'small', '4bf92815-be40-4a4f-a33d-e3f10a9b10a6.jpg', '06G-P4-3799-KR_XL_4.jpg', 0, '2015-04-05 21:30:56', '2015-04-05 21:30:56'),
('5521e8d8-6a7c-4099-853f-45697f00000a', '5521e8d8-6f84-4fe4-a0c1-45697f00000a', '54be33cc-a428-4914-b1c8-103b7f000008', 'facebook', '3003def6-8513-4cca-8c97-51c4c8bd2ad3.jpg', '06G-P4-3799-KR_XL_6.jpg', 0, '2015-04-05 21:30:56', '2015-04-05 21:30:56'),
('5521e8d8-6f84-4fe4-a0c1-45697f00000a', NULL, '54be33cc-a428-4914-b1c8-103b7f000008', 'small', 'a807451b-501c-4325-85f0-1c1359219281.jpg', '06G-P4-3799-KR_XL_6.jpg', 0, '2015-04-05 21:30:56', '2015-04-05 21:30:56'),
('5521e8d8-7d18-42db-924d-43f17f00000a', '5521e8d8-55c0-4b43-a7bb-43f17f00000a', '54be33cc-a428-4914-b1c8-103b7f000008', 'facebook', '20f42d97-59e1-4693-b12f-437be6aa1855.jpg', '06G-P4-3799-KR_XL_4.jpg', 0, '2015-04-05 21:30:56', '2015-04-05 21:30:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cake_sessions`
--

CREATE TABLE IF NOT EXISTS `cake_sessions` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `expires` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cake_sessions`
--

INSERT INTO `cake_sessions` (`id`, `data`, `expires`) VALUES
('ft9io6s3mnmplspkp1o9o38n61', 'Config|a:3:{s:9:"userAgent";s:32:"05e2cf4792efb98fa94248bae36490f2";s:4:"time";i:1422126106;s:9:"countdown";i:10;}Auth|a:1:{s:4:"User";a:1:{s:4:"User";a:15:{s:2:"id";s:36:"54be33cc-a428-4914-b1c8-103b7f000008";s:8:"password";s:60:"$2a$10$krBIVLWgexrpcRpL05Y5wembTF2kHSl/FjxTlS1N9KQrKiB.E1jwm";s:13:"temp_password";s:60:"$2a$10$VZYi6LJx37jjRh01IWVRGuXsRjR2CC6N1FJNO0etB./wR7tUyMmJe";s:4:"name";s:5:"maria";s:5:"email";s:15:"maria@gmail.com";s:14:"email_verified";b:1;s:5:"phone";N;s:6:"banner";s:40:"58f6a6e0-daf4-4a85-be97-01657055e3de.jpg";s:6:"banned";b:0;s:13:"banned_reason";N;s:9:"suspended";b:0;s:16:"suspended_reason";N;s:7:"deleted";b:0;s:7:"created";s:19:"2015-01-20 06:24:04";s:8:"modified";s:19:"2015-01-21 12:02:57";}}}Message|a:1:{s:4:"auth";a:3:{s:7:"message";s:47:"You are not authorized to access that location.";s:7:"element";s:7:"default";s:6:"params";a:0:{}}}', 1422126106),
('itpmd10pu20vdudp0l6abepb33', 'Config|a:3:{s:9:"userAgent";s:32:"fbbe48b71c2e980eae4b9031776ba90e";s:4:"time";i:1426028672;s:9:"countdown";i:10;}Auth|a:1:{s:8:"redirect";s:1:"/";}', 1426028672),
('tkrklqle6cr7sscghu28u8f5g2', 'Config|a:3:{s:9:"userAgent";s:32:"fbbe48b71c2e980eae4b9031776ba90e";s:4:"time";i:1428544883;s:9:"countdown";i:10;}Message|a:1:{s:4:"auth";a:3:{s:7:"message";s:47:"You are not authorized to access that location.";s:7:"element";s:7:"default";s:6:"params";a:0:{}}}Auth|a:1:{s:4:"User";a:1:{s:4:"User";a:15:{s:2:"id";s:36:"54be33cc-a428-4914-b1c8-103b7f000008";s:8:"password";s:60:"$2a$10$krBIVLWgexrpcRpL05Y5wembTF2kHSl/FjxTlS1N9KQrKiB.E1jwm";s:13:"temp_password";s:60:"$2a$10$VZYi6LJx37jjRh01IWVRGuXsRjR2CC6N1FJNO0etB./wR7tUyMmJe";s:4:"name";s:5:"maria";s:5:"email";s:15:"maria@gmail.com";s:14:"email_verified";b:1;s:5:"phone";N;s:6:"banner";s:40:"58f6a6e0-daf4-4a85-be97-01657055e3de.jpg";s:6:"banned";b:0;s:13:"banned_reason";N;s:9:"suspended";b:0;s:16:"suspended_reason";N;s:7:"deleted";b:0;s:7:"created";s:19:"2015-01-20 06:24:04";s:8:"modified";s:19:"2015-01-21 12:02:57";}}}', 1428544883),
('k6h6o2dah611asmsiq1tu7upk5', 'Config|a:3:{s:9:"userAgent";s:32:"fbbe48b71c2e980eae4b9031776ba90e";s:4:"time";i:1428455593;s:9:"countdown";i:10;}Auth|a:1:{s:4:"User";a:1:{s:4:"User";a:15:{s:2:"id";s:36:"54be33cc-a428-4914-b1c8-103b7f000008";s:8:"password";s:60:"$2a$10$krBIVLWgexrpcRpL05Y5wembTF2kHSl/FjxTlS1N9KQrKiB.E1jwm";s:13:"temp_password";s:60:"$2a$10$VZYi6LJx37jjRh01IWVRGuXsRjR2CC6N1FJNO0etB./wR7tUyMmJe";s:4:"name";s:5:"maria";s:5:"email";s:15:"maria@gmail.com";s:14:"email_verified";b:1;s:5:"phone";N;s:6:"banner";s:40:"58f6a6e0-daf4-4a85-be97-01657055e3de.jpg";s:6:"banned";b:0;s:13:"banned_reason";N;s:9:"suspended";b:0;s:16:"suspended_reason";N;s:7:"deleted";b:0;s:7:"created";s:19:"2015-01-20 06:24:04";s:8:"modified";s:19:"2015-01-21 12:02:57";}}}', 1428455593),
('a1tkkrr08h4tun6dcdf6k0cl62', 'Config|a:3:{s:9:"userAgent";s:32:"fbbe48b71c2e980eae4b9031776ba90e";s:4:"time";i:1431912156;s:9:"countdown";i:10;}Auth|a:1:{s:8:"redirect";s:1:"/";}', 1431912156),
('hmmibn7qcba97u6u4vasvsqif2', 'Config|a:3:{s:9:"userAgent";s:32:"fbbe48b71c2e980eae4b9031776ba90e";s:4:"time";i:1434894150;s:9:"countdown";i:10;}Message|a:1:{s:4:"auth";a:3:{s:7:"message";s:47:"You are not authorized to access that location.";s:7:"element";s:7:"default";s:6:"params";a:0:{}}}Auth|a:1:{s:4:"User";a:1:{s:4:"User";a:15:{s:2:"id";s:36:"54be33cc-a428-4914-b1c8-103b7f000008";s:8:"password";s:60:"$2a$10$krBIVLWgexrpcRpL05Y5wembTF2kHSl/FjxTlS1N9KQrKiB.E1jwm";s:13:"temp_password";s:60:"$2a$10$VZYi6LJx37jjRh01IWVRGuXsRjR2CC6N1FJNO0etB./wR7tUyMmJe";s:4:"name";s:5:"maria";s:5:"email";s:15:"maria@gmail.com";s:14:"email_verified";b:1;s:5:"phone";N;s:6:"banner";s:40:"58f6a6e0-daf4-4a85-be97-01657055e3de.jpg";s:6:"banned";b:0;s:13:"banned_reason";N;s:9:"suspended";b:0;s:16:"suspended_reason";N;s:7:"deleted";b:0;s:7:"created";s:19:"2015-01-20 06:24:04";s:8:"modified";s:19:"2015-01-21 12:02:57";}}}', 1434894150),
('nupbhe7102dear9bbh8sc3n2n5', 'Config|a:3:{s:9:"userAgent";s:32:"fbbe48b71c2e980eae4b9031776ba90e";s:4:"time";i:1432168580;s:9:"countdown";i:10;}Auth|a:1:{s:8:"redirect";s:1:"/";}', 1432168580),
('v4d11ehot4vc6ronn1flr1eoo3', 'Config|a:3:{s:9:"userAgent";s:32:"fbbe48b71c2e980eae4b9031776ba90e";s:4:"time";i:1434210175;s:9:"countdown";i:10;}Auth|a:1:{s:4:"User";a:1:{s:4:"User";a:15:{s:2:"id";s:36:"54be33cc-a428-4914-b1c8-103b7f000008";s:8:"password";s:60:"$2a$10$krBIVLWgexrpcRpL05Y5wembTF2kHSl/FjxTlS1N9KQrKiB.E1jwm";s:13:"temp_password";s:60:"$2a$10$VZYi6LJx37jjRh01IWVRGuXsRjR2CC6N1FJNO0etB./wR7tUyMmJe";s:4:"name";s:5:"maria";s:5:"email";s:15:"maria@gmail.com";s:14:"email_verified";b:1;s:5:"phone";N;s:6:"banner";s:40:"58f6a6e0-daf4-4a85-be97-01657055e3de.jpg";s:6:"banned";b:0;s:13:"banned_reason";N;s:9:"suspended";b:0;s:16:"suspended_reason";N;s:7:"deleted";b:0;s:7:"created";s:19:"2015-01-20 06:24:04";s:8:"modified";s:19:"2015-01-21 12:02:57";}}}', 1434210175),
('991s1h2co6rfs4uota7n2iibl1', 'Config|a:3:{s:9:"userAgent";s:32:"fbbe48b71c2e980eae4b9031776ba90e";s:4:"time";i:1434993395;s:9:"countdown";i:10;}Message|a:1:{s:4:"auth";a:3:{s:7:"message";s:47:"You are not authorized to access that location.";s:7:"element";s:7:"default";s:6:"params";a:0:{}}}Auth|a:1:{s:4:"User";a:1:{s:4:"User";a:15:{s:2:"id";s:36:"54be33cc-a428-4914-b1c8-103b7f000008";s:8:"password";s:60:"$2a$10$krBIVLWgexrpcRpL05Y5wembTF2kHSl/FjxTlS1N9KQrKiB.E1jwm";s:13:"temp_password";s:60:"$2a$10$VZYi6LJx37jjRh01IWVRGuXsRjR2CC6N1FJNO0etB./wR7tUyMmJe";s:4:"name";s:5:"maria";s:5:"email";s:15:"maria@gmail.com";s:14:"email_verified";b:1;s:5:"phone";N;s:6:"banner";s:40:"58f6a6e0-daf4-4a85-be97-01657055e3de.jpg";s:6:"banned";b:0;s:13:"banned_reason";N;s:9:"suspended";b:0;s:16:"suspended_reason";N;s:7:"deleted";b:0;s:7:"created";s:19:"2015-01-20 06:24:04";s:8:"modified";s:19:"2015-01-21 12:02:57";}}}', 1434993395),
('5ocj21g9tblb96pv6ucnsb00f4', 'Config|a:3:{s:9:"userAgent";s:32:"fbbe48b71c2e980eae4b9031776ba90e";s:4:"time";i:1436032862;s:9:"countdown";i:10;}Auth|a:1:{s:4:"User";a:1:{s:4:"User";a:15:{s:2:"id";s:36:"54be33cc-a428-4914-b1c8-103b7f000008";s:8:"password";s:60:"$2a$10$krBIVLWgexrpcRpL05Y5wembTF2kHSl/FjxTlS1N9KQrKiB.E1jwm";s:13:"temp_password";s:60:"$2a$10$VZYi6LJx37jjRh01IWVRGuXsRjR2CC6N1FJNO0etB./wR7tUyMmJe";s:4:"name";s:5:"maria";s:5:"email";s:15:"maria@gmail.com";s:14:"email_verified";b:1;s:5:"phone";N;s:6:"banner";s:40:"58f6a6e0-daf4-4a85-be97-01657055e3de.jpg";s:6:"banned";b:0;s:13:"banned_reason";N;s:9:"suspended";b:0;s:16:"suspended_reason";N;s:7:"deleted";b:0;s:7:"created";s:19:"2015-01-20 06:24:04";s:8:"modified";s:19:"2015-01-21 12:02:57";}}}Message|a:1:{s:4:"auth";a:3:{s:7:"message";s:47:"You are not authorized to access that location.";s:7:"element";s:7:"default";s:6:"params";a:0:{}}}', 1436032862),
('88ftfpq3a2uctiphh1u880maf7', 'Config|a:3:{s:9:"userAgent";s:32:"fbbe48b71c2e980eae4b9031776ba90e";s:4:"time";i:1436999153;s:9:"countdown";i:10;}Auth|a:1:{s:4:"User";a:1:{s:4:"User";a:15:{s:2:"id";s:36:"54be33cc-a428-4914-b1c8-103b7f000008";s:8:"password";s:60:"$2a$10$krBIVLWgexrpcRpL05Y5wembTF2kHSl/FjxTlS1N9KQrKiB.E1jwm";s:13:"temp_password";s:60:"$2a$10$VZYi6LJx37jjRh01IWVRGuXsRjR2CC6N1FJNO0etB./wR7tUyMmJe";s:4:"name";s:5:"maria";s:5:"email";s:15:"maria@gmail.com";s:14:"email_verified";b:1;s:5:"phone";N;s:6:"banner";s:40:"58f6a6e0-daf4-4a85-be97-01657055e3de.jpg";s:6:"banned";b:0;s:13:"banned_reason";N;s:9:"suspended";b:0;s:16:"suspended_reason";N;s:7:"deleted";b:0;s:7:"created";s:19:"2015-01-20 06:24:04";s:8:"modified";s:19:"2015-01-21 12:02:57";}}}', 1436999153);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` char(36) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` char(36) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_id` char(36) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `size` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_tag` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `images`
--

INSERT INTO `images` (`id`, `parent_id`, `product_id`, `size`, `name`, `name_tag`, `deleted`, `created`, `modified`) VALUES
('54be3428-0b4c-40b8-b336-103a7f000008', NULL, '54be3427-b4c8-42d9-b709-103a7f000008', 'small', '', '110-MW-1002-K1_XL_1.jpg', 0, '2015-01-20 06:25:36', '2015-01-20 06:25:36'),
('54be3428-1b2c-4596-b8c5-103a7f000008', NULL, '54be3427-b4c8-42d9-b709-103a7f000008', 'small', '', '06G-P4-3799-KR_XL_7.jpg', 0, '2015-01-20 06:25:36', '2015-01-20 06:25:36'),
('54be3428-2290-4994-901c-103a7f000008', '54be3428-1b2c-4596-b8c5-103a7f000008', '54be3427-b4c8-42d9-b709-103a7f000008', 'large', '', '06G-P4-3799-KR_XL_7.jpg', 0, '2015-01-20 06:25:36', '2015-01-20 06:25:36'),
('54be3428-37c4-4e2a-a620-103a7f000008', '54be3428-1b2c-4596-b8c5-103a7f000008', '54be3427-b4c8-42d9-b709-103a7f000008', 'facebook', '', '06G-P4-3799-KR_XL_7.jpg', 0, '2015-01-20 06:25:36', '2015-01-20 06:25:36'),
('54be3428-4510-4fe0-bf8d-0a057f000008', '54be3428-5c7c-415f-b4ec-0a057f000008', '54be3427-b4c8-42d9-b709-103a7f000008', 'large', '', '12G-P4-3999-KR_XL_1.jpg', 0, '2015-01-20 06:25:36', '2015-01-20 06:25:36'),
('54be3428-5c7c-415f-b4ec-0a057f000008', NULL, '54be3427-b4c8-42d9-b709-103a7f000008', 'small', '', '12G-P4-3999-KR_XL_1.jpg', 0, '2015-01-20 06:25:36', '2015-01-20 06:25:36'),
('54be3428-a544-46d7-a9fd-0a057f000008', '54be3428-5c7c-415f-b4ec-0a057f000008', '54be3427-b4c8-42d9-b709-103a7f000008', 'facebook', '', '12G-P4-3999-KR_XL_1.jpg', 0, '2015-01-20 06:25:36', '2015-01-20 06:25:36'),
('54be3429-0fc4-47d3-889b-103a7f000008', '54be3428-0b4c-40b8-b336-103a7f000008', '54be3427-b4c8-42d9-b709-103a7f000008', 'facebook', '', '110-MW-1002-K1_XL_1.jpg', 0, '2015-01-20 06:25:37', '2015-01-20 06:25:37'),
('54be3429-54ec-4885-a85d-103a7f000008', '54be3428-0b4c-40b8-b336-103a7f000008', '54be3427-b4c8-42d9-b709-103a7f000008', 'large', '', '110-MW-1002-K1_XL_1.jpg', 0, '2015-01-20 06:25:36', '2015-01-20 06:25:36'),
('54be3429-7a84-42d2-aba4-0a057f000008', '54be3429-b440-411a-a2c6-0a057f000008', '54be3427-b4c8-42d9-b709-103a7f000008', 'large', '', '12G-P4-3999-KR_XL_2.jpg', 0, '2015-01-20 06:25:37', '2015-01-20 06:25:37'),
('54be3429-a908-476f-8531-0a057f000008', '54be3429-b440-411a-a2c6-0a057f000008', '54be3427-b4c8-42d9-b709-103a7f000008', 'facebook', '', '12G-P4-3999-KR_XL_2.jpg', 0, '2015-01-20 06:25:37', '2015-01-20 06:25:37'),
('54be3429-b440-411a-a2c6-0a057f000008', NULL, '54be3427-b4c8-42d9-b709-103a7f000008', 'small', '', '12G-P4-3999-KR_XL_2.jpg', 0, '2015-01-20 06:25:37', '2015-01-20 06:25:37'),
('54be34cc-1b24-426d-9ad5-103d7f000008', '54be34cc-bf5c-4d4c-8fde-103d7f000008', '54be34cb-1e8c-4f5e-915b-09527f000008', 'large', '7c614ee9-3112-4105-900a-44d7012484f4.jpg', '12G-P4-3999-KR_XL_1.jpg', 0, '2015-01-20 06:28:20', '2015-01-20 06:28:20'),
('54be34cc-634c-44aa-b813-103d7f000008', '54be34cc-cebc-4b76-8489-103d7f000008', '54be34cb-1e8c-4f5e-915b-09527f000008', 'large', 'a994c784-c15e-43c2-a02e-b29db39285fc.jpg', '110-MW-1002-K1_XL_1.jpg', 0, '2015-01-20 06:28:20', '2015-01-20 06:28:20'),
('54be34cc-6fb0-4fa4-9fda-09527f000008', '54be34cc-de30-4ff4-96f4-09527f000008', '54be34cb-1e8c-4f5e-915b-09527f000008', 'large', '19db8eaa-b579-4172-aca7-3454375eb469.jpg', '06G-P4-3799-KR_XL_6.jpg', 0, '2015-01-20 06:28:20', '2015-01-20 06:28:20'),
('54be34cc-942c-4879-8468-09527f000008', '54be34cc-f090-4208-94ba-09527f000008', '54be34cb-1e8c-4f5e-915b-09527f000008', 'facebook', '2998f2d6-4cee-4796-bb6c-8867509cfeb0.jpg', '12G-P4-3999-KR_XL_2.jpg', 0, '2015-01-20 06:28:20', '2015-01-20 06:28:20'),
('54be34cc-bf5c-4d4c-8fde-103d7f000008', NULL, '54be34cb-1e8c-4f5e-915b-09527f000008', 'small', 'cbdbcbee-1fa0-4feb-b19e-d768ccd9b2ee.jpg', '12G-P4-3999-KR_XL_1.jpg', 0, '2015-01-20 06:28:20', '2015-01-20 06:28:20'),
('54be34cc-cebc-4b76-8489-103d7f000008', NULL, '54be34cb-1e8c-4f5e-915b-09527f000008', 'small', 'bea7edfe-b844-4fd5-bd96-7baf6442e783.jpg', '110-MW-1002-K1_XL_1.jpg', 0, '2015-01-20 06:28:20', '2015-01-20 06:28:20'),
('54be34cc-cff4-4f2a-bda1-09527f000008', '54be34cc-f090-4208-94ba-09527f000008', '54be34cb-1e8c-4f5e-915b-09527f000008', 'large', 'dc4addf6-8099-4075-afde-fe1190f2ebba.jpg', '12G-P4-3999-KR_XL_2.jpg', 0, '2015-01-20 06:28:20', '2015-01-20 06:28:20'),
('54be34cc-de30-4ff4-96f4-09527f000008', NULL, '54be34cb-1e8c-4f5e-915b-09527f000008', 'small', 'e21c025c-00f1-45fd-84d8-9db93d6fb449.jpg', '06G-P4-3799-KR_XL_6.jpg', 0, '2015-01-20 06:28:20', '2015-01-20 06:28:20'),
('54be34cc-e580-417b-b655-103d7f000008', '54be34cc-cebc-4b76-8489-103d7f000008', '54be34cb-1e8c-4f5e-915b-09527f000008', 'facebook', '1a7926e8-ca47-47a3-a6de-a83c6c65be55.jpg', '110-MW-1002-K1_XL_1.jpg', 0, '2015-01-20 06:28:20', '2015-01-20 06:28:20'),
('54be34cc-efe0-4d54-b293-103d7f000008', '54be34cc-bf5c-4d4c-8fde-103d7f000008', '54be34cb-1e8c-4f5e-915b-09527f000008', 'facebook', '77288739-0b3c-471e-98a9-02001267b7f8.jpg', '12G-P4-3999-KR_XL_1.jpg', 0, '2015-01-20 06:28:20', '2015-01-20 06:28:20'),
('54be34cc-f090-4208-94ba-09527f000008', NULL, '54be34cb-1e8c-4f5e-915b-09527f000008', 'small', '549c6816-d9de-47ae-8566-aed9095fceb7.jpg', '12G-P4-3999-KR_XL_2.jpg', 0, '2015-01-20 06:28:20', '2015-01-20 06:28:20'),
('54be34cc-fa58-4f3f-899b-09527f000008', '54be34cc-de30-4ff4-96f4-09527f000008', '54be34cb-1e8c-4f5e-915b-09527f000008', 'facebook', '6a2913ba-6a7a-40f2-91e0-b5cbf4c1758c.jpg', '06G-P4-3799-KR_XL_6.jpg', 0, '2015-01-20 06:28:20', '2015-01-20 06:28:20'),
('54bfd4d0-2adc-40c5-87b8-55c67f000008', NULL, '54bfd4d0-bc18-4818-83fb-49827f000008', 'small', 'c2ecd6b5-90e2-44c1-8634-34715b8d8ba6.jpg', '06G-P4-3799-KR_XL_6.jpg', 0, '2015-01-21 12:03:20', '2015-01-21 12:03:20'),
('54bfd4d0-3738-4d8e-b3b3-49827f000008', '54bfd4d0-8ef4-4f24-a062-49827f000008', '54bfd4d0-bc18-4818-83fb-49827f000008', 'large', '1405bed9-519c-4a9d-9af6-ac7572a1ef77.jpg', '06G-P4-3799-KR_XL_4.jpg', 0, '2015-01-21 12:03:20', '2015-01-21 12:03:20'),
('54bfd4d0-5168-4a7e-95b7-55c67f000008', '54bfd4d0-2adc-40c5-87b8-55c67f000008', '54bfd4d0-bc18-4818-83fb-49827f000008', 'large', '26595f66-f53d-489e-9eb8-4f44f14588f0.jpg', '06G-P4-3799-KR_XL_6.jpg', 0, '2015-01-21 12:03:20', '2015-01-21 12:03:20'),
('54bfd4d0-53f8-4eee-a735-49827f000008', '54bfd4d0-8ef4-4f24-a062-49827f000008', '54bfd4d0-bc18-4818-83fb-49827f000008', 'facebook', '316274de-5c9f-4ff6-aca2-29e5531e33cf.jpg', '06G-P4-3799-KR_XL_4.jpg', 0, '2015-01-21 12:03:20', '2015-01-21 12:03:20'),
('54bfd4d0-8ef4-4f24-a062-49827f000008', NULL, '54bfd4d0-bc18-4818-83fb-49827f000008', 'small', '0cfb14c3-ae11-41bc-af80-462364cbcf29.jpg', '06G-P4-3799-KR_XL_4.jpg', 0, '2015-01-21 12:03:20', '2015-01-21 12:03:20'),
('54bfd4d0-db68-4e34-a3c5-55c67f000008', '54bfd4d0-2adc-40c5-87b8-55c67f000008', '54bfd4d0-bc18-4818-83fb-49827f000008', 'facebook', '944109f3-f49b-4822-a9ec-46ce510bc805.jpg', '06G-P4-3799-KR_XL_6.jpg', 0, '2015-01-21 12:03:20', '2015-01-21 12:03:20'),
('54bfd4d1-2f70-4dd3-b673-55c67f000008', NULL, '54bfd4d0-bc18-4818-83fb-49827f000008', 'small', '42b360f1-a7bb-4e82-888e-6cd4c357b65a.jpg', '12G-P4-3999-KR_XL_1.jpg', 0, '2015-01-21 12:03:21', '2015-01-21 12:03:21'),
('54bfd4d1-487c-4c04-997a-55c67f000008', '54bfd4d1-2f70-4dd3-b673-55c67f000008', '54bfd4d0-bc18-4818-83fb-49827f000008', 'facebook', '3df25027-7749-46bd-a495-2b79d56c158d.jpg', '12G-P4-3999-KR_XL_1.jpg', 0, '2015-01-21 12:03:21', '2015-01-21 12:03:21'),
('54bfd4d1-869c-4963-89e7-55c67f000008', '54bfd4d1-2f70-4dd3-b673-55c67f000008', '54bfd4d0-bc18-4818-83fb-49827f000008', 'large', '2701cf7a-cb59-4e63-9d6f-e4c3bad08272.jpg', '12G-P4-3999-KR_XL_1.jpg', 0, '2015-01-21 12:03:21', '2015-01-21 12:03:21'),
('54bfd501-2e60-4496-8017-556f7f000008', '54bfd501-e1b4-4890-89b3-556f7f000008', '54bfd501-1020-44c9-9c97-04ca7f000008', 'large', 'e6247ec4-2e5f-4c6b-96b4-4411b20be887.jpg', '12G-P4-3999-KR_XL_2.jpg', 0, '2015-01-21 12:04:09', '2015-01-21 12:04:09'),
('54bfd501-3bdc-4ede-baf6-04ca7f000008', '54bfd501-ccc4-40b5-918b-04ca7f000008', '54bfd501-1020-44c9-9c97-04ca7f000008', 'facebook', 'cd2b4a0f-75fc-418a-8a79-da837a92b15f.jpg', '06G-P4-3799-KR_XL_8.jpg', 0, '2015-01-21 12:04:09', '2015-01-21 12:04:09'),
('54bfd501-482c-404b-8ffe-556f7f000008', '54bfd501-e1b4-4890-89b3-556f7f000008', '54bfd501-1020-44c9-9c97-04ca7f000008', 'facebook', 'ba166d7e-0174-46f1-a763-7ea7b34c4d6c.jpg', '12G-P4-3999-KR_XL_2.jpg', 0, '2015-01-21 12:04:09', '2015-01-21 12:04:09'),
('54bfd501-7a60-4fc3-b8c2-04ca7f000008', '54bfd501-ccc4-40b5-918b-04ca7f000008', '54bfd501-1020-44c9-9c97-04ca7f000008', 'large', 'eb482702-1129-441a-b49f-ed179d9b645f.jpg', '06G-P4-3799-KR_XL_8.jpg', 0, '2015-01-21 12:04:09', '2015-01-21 12:04:09'),
('54bfd501-ab2c-401d-a903-04ca7f000008', NULL, '54bfd501-1020-44c9-9c97-04ca7f000008', 'small', '5754302d-857f-4d73-9ae8-be4940911df9.jpg', '12G-P4-3999-KR_XL_6.jpg', 0, '2015-01-21 12:04:09', '2015-01-21 12:04:09'),
('54bfd501-bbd0-45f4-9b10-04ca7f000008', '54bfd501-ab2c-401d-a903-04ca7f000008', '54bfd501-1020-44c9-9c97-04ca7f000008', 'large', 'b8f4c079-4d5b-4eb1-8107-0e6bbc45cf0f.jpg', '12G-P4-3999-KR_XL_6.jpg', 0, '2015-01-21 12:04:09', '2015-01-21 12:04:09'),
('54bfd501-ccc4-40b5-918b-04ca7f000008', NULL, '54bfd501-1020-44c9-9c97-04ca7f000008', 'small', '453fa669-dfaf-44b5-bc55-63bbf28fe49b.jpg', '06G-P4-3799-KR_XL_8.jpg', 0, '2015-01-21 12:04:09', '2015-01-21 12:04:09'),
('54bfd501-e1b4-4890-89b3-556f7f000008', NULL, '54bfd501-1020-44c9-9c97-04ca7f000008', 'small', '3b93c86a-a889-4d04-a53f-c4dd68096929.jpg', '12G-P4-3999-KR_XL_2.jpg', 0, '2015-01-21 12:04:09', '2015-01-21 12:04:09'),
('54bfd502-b998-41a9-b76d-04ca7f000008', '54bfd501-ab2c-401d-a903-04ca7f000008', '54bfd501-1020-44c9-9c97-04ca7f000008', 'facebook', 'c4ab6e41-65e7-4747-8960-572a8f0d47f7.jpg', '12G-P4-3999-KR_XL_6.jpg', 0, '2015-01-21 12:04:10', '2015-01-21 12:04:10'),
('54bfd534-b498-4776-b03a-55027f000008', '54bfd534-be40-4096-8236-55027f000008', '54bfd534-1b10-4951-a83f-55027f000008', 'facebook', '3d46b57e-8745-416f-826e-ce520291628a.jpg', '12G-P4-3999-KR_XL_2.jpg', 0, '2015-01-21 12:05:00', '2015-01-21 12:05:00'),
('54bfd534-be40-4096-8236-55027f000008', NULL, '54bfd534-1b10-4951-a83f-55027f000008', 'small', 'b2909bea-c6c0-4201-8b50-a11403f8cb0b.jpg', '12G-P4-3999-KR_XL_2.jpg', 0, '2015-01-21 12:05:00', '2015-01-21 12:05:00'),
('54bfd534-d440-4969-98e6-55027f000008', '54bfd534-be40-4096-8236-55027f000008', '54bfd534-1b10-4951-a83f-55027f000008', 'large', 'fee49c18-6223-4964-9a47-df658175d914.jpg', '12G-P4-3999-KR_XL_2.jpg', 0, '2015-01-21 12:05:00', '2015-01-21 12:05:00'),
('54bfd581-4da4-42ee-9b3c-04ca7f000008', '54bfd581-c7b8-40ff-a74c-04ca7f000008', '54bfd580-c9e4-49f4-a076-04ca7f000008', 'facebook', 'e07c8642-5db7-4310-bccb-1cdc473549f3.jpg', '111-HR-E972-KR_XL_7.jpg', 0, '2015-01-21 12:06:17', '2015-01-21 12:06:17'),
('54bfd581-c7b8-40ff-a74c-04ca7f000008', NULL, '54bfd580-c9e4-49f4-a076-04ca7f000008', 'small', 'b1b64759-9701-4e92-aeeb-6c6179199ba5.jpg', '111-HR-E972-KR_XL_7.jpg', 0, '2015-01-21 12:06:17', '2015-01-21 12:06:17'),
('54bfd581-d0c8-49e9-8d79-04ca7f000008', '54bfd581-c7b8-40ff-a74c-04ca7f000008', '54bfd580-c9e4-49f4-a076-04ca7f000008', 'large', 'a4ed54cf-f429-47bb-aa9f-39f61da3c553.jpg', '111-HR-E972-KR_XL_7.jpg', 0, '2015-01-21 12:06:17', '2015-01-21 12:06:17'),
('54bfefe7-0a00-46ad-9932-556f7f000008', '54bfefe7-682c-4135-88aa-556f7f000008', '54bfefe7-33b8-4c7f-be7f-04ca7f000008', 'large', '2531e9c3-cbc6-4853-a33d-bf985621e7c6.jpg', '12G-P4-3999-KR_XL_3.jpg', 0, '2015-01-21 13:58:55', '2015-01-21 13:58:55'),
('54bfefe7-0a5c-498d-8a4e-556f7f000008', '54bfefe7-682c-4135-88aa-556f7f000008', '54bfefe7-33b8-4c7f-be7f-04ca7f000008', 'facebook', '52b685a2-f6b9-4963-849b-7e35357beec6.jpg', '12G-P4-3999-KR_XL_3.jpg', 0, '2015-01-21 13:58:55', '2015-01-21 13:58:55'),
('54bfefe7-2bf8-4fc2-81c1-04ca7f000008', '54bfefe7-30a8-45bb-9ddb-04ca7f000008', '54bfefe7-33b8-4c7f-be7f-04ca7f000008', 'large', '064d7f5e-f736-4e6e-b6bd-48c1ca48b330.jpg', '06G-P4-3799-KR_XL_7.jpg', 0, '2015-01-21 13:58:55', '2015-01-21 13:58:55'),
('54bfefe7-30a8-45bb-9ddb-04ca7f000008', NULL, '54bfefe7-33b8-4c7f-be7f-04ca7f000008', 'small', '8bd78ecf-ad4e-4a7e-9951-eb6f7724f60e.jpg', '06G-P4-3799-KR_XL_7.jpg', 0, '2015-01-21 13:58:55', '2015-01-21 13:58:55'),
('54bfefe7-682c-4135-88aa-556f7f000008', NULL, '54bfefe7-33b8-4c7f-be7f-04ca7f000008', 'small', 'af94940a-7eff-42f0-8ffb-927f1abb5712.jpg', '12G-P4-3999-KR_XL_3.jpg', 0, '2015-01-21 13:58:55', '2015-01-21 13:58:55'),
('54bfefe7-d72c-4eec-988e-04ca7f000008', '54bfefe7-30a8-45bb-9ddb-04ca7f000008', '54bfefe7-33b8-4c7f-be7f-04ca7f000008', 'facebook', '5a512530-83f9-4f9f-9052-2879589ac8a9.jpg', '06G-P4-3799-KR_XL_7.jpg', 0, '2015-01-21 13:58:55', '2015-01-21 13:58:55'),
('54bff23f-0008-4f7d-84a9-55ed7f000008', '54bff23f-3d78-467b-9529-55ed7f000008', '54bff23e-c29c-4add-9be5-590b7f000008', 'large', '534aa161-09ac-4947-8b26-6b880b4ba8c9.jpg', '111-HR-E972-KR_XL_1.jpg', 0, '2015-01-21 14:08:55', '2015-01-21 14:08:55'),
('54bff23f-0350-4fbe-8535-55ed7f000008', '54bff23f-3d78-467b-9529-55ed7f000008', '54bff23e-c29c-4add-9be5-590b7f000008', 'facebook', '8843286c-1ba0-4417-8e24-739b5034ef68.jpg', '111-HR-E972-KR_XL_1.jpg', 0, '2015-01-21 14:08:55', '2015-01-21 14:08:55'),
('54bff23f-1734-4de2-a5c9-590b7f000008', NULL, '54bff23e-c29c-4add-9be5-590b7f000008', 'small', 'd94157ec-bc98-42f9-bbee-afe2ef8c63b3.jpg', '12G-P4-3999-KR_XL_3.jpg', 0, '2015-01-21 14:08:55', '2015-01-21 14:08:55'),
('54bff23f-27b0-408b-acee-590b7f000008', '54bff23f-1734-4de2-a5c9-590b7f000008', '54bff23e-c29c-4add-9be5-590b7f000008', 'large', '313c0c81-d057-4697-971d-5a22f7218653.jpg', '12G-P4-3999-KR_XL_3.jpg', 0, '2015-01-21 14:08:55', '2015-01-21 14:08:55'),
('54bff23f-3280-468b-ba59-590b7f000008', '54bff23f-1734-4de2-a5c9-590b7f000008', '54bff23e-c29c-4add-9be5-590b7f000008', 'facebook', '8404c90e-ac3c-48d3-a4ee-ea43adf1f805.jpg', '12G-P4-3999-KR_XL_3.jpg', 0, '2015-01-21 14:08:55', '2015-01-21 14:08:55'),
('54bff23f-3d78-467b-9529-55ed7f000008', NULL, '54bff23e-c29c-4add-9be5-590b7f000008', 'small', 'dd541e4c-bc5d-4421-9c29-0e9ddf34ffa2.jpg', '111-HR-E972-KR_XL_1.jpg', 0, '2015-01-21 14:08:55', '2015-01-21 14:08:55'),
('54bff362-07f8-472e-8e50-590b7f000008', '54bff362-bcb4-4b8d-92dc-590b7f000008', '54bff362-8a2c-4e80-9d4a-590b7f000008', 'large', '44c26196-3ab1-4f6c-9ecf-d64b5f653e41.jpg', '06G-P4-3799-KR_XL_5.jpg', 0, '2015-01-21 14:13:46', '2015-01-21 14:13:46'),
('54bff362-1bcc-4f9e-a423-55ed7f000008', NULL, '54bff362-8a2c-4e80-9d4a-590b7f000008', 'small', 'd5c326b7-3612-4629-8657-21d5ed555f3a.jpg', '06G-P4-3799-KR_XL_8.jpg', 0, '2015-01-21 14:13:46', '2015-01-21 14:13:46'),
('54bff362-1d0c-4dc2-a18e-55ed7f000008', '54bff362-1bcc-4f9e-a423-55ed7f000008', '54bff362-8a2c-4e80-9d4a-590b7f000008', 'large', '932dc0c0-dde9-4372-a06b-92c28a822d2b.jpg', '06G-P4-3799-KR_XL_8.jpg', 0, '2015-01-21 14:13:46', '2015-01-21 14:13:46'),
('54bff362-bcb4-4b8d-92dc-590b7f000008', NULL, '54bff362-8a2c-4e80-9d4a-590b7f000008', 'small', '48cd4077-0507-4f87-a079-bc9427a7b7a5.jpg', '06G-P4-3799-KR_XL_5.jpg', 0, '2015-01-21 14:13:46', '2015-01-21 14:13:46'),
('54bff362-ce80-4e35-b984-55ed7f000008', '54bff362-1bcc-4f9e-a423-55ed7f000008', '54bff362-8a2c-4e80-9d4a-590b7f000008', 'facebook', '7f368da4-b010-448b-bf3e-abbfbee4550b.jpg', '06G-P4-3799-KR_XL_8.jpg', 0, '2015-01-21 14:13:46', '2015-01-21 14:13:46'),
('54bff362-e2d4-4942-8feb-590b7f000008', '54bff362-bcb4-4b8d-92dc-590b7f000008', '54bff362-8a2c-4e80-9d4a-590b7f000008', 'facebook', '112313f3-0238-48e9-a6b1-775e976039b7.jpg', '06G-P4-3799-KR_XL_5.jpg', 0, '2015-01-21 14:13:46', '2015-01-21 14:13:46'),
('54bff363-06c0-475b-bb73-590b7f000008', '54bff363-c61c-431e-973d-590b7f000008', '54bff362-8a2c-4e80-9d4a-590b7f000008', 'facebook', '6b35cac5-f1f0-4f81-9d16-c8025d370fa5.jpg', '12G-P4-3999-KR_XL_4.jpg', 0, '2015-01-21 14:13:47', '2015-01-21 14:13:47'),
('54bff363-6740-40e6-906c-590b7f000008', '54bff363-c61c-431e-973d-590b7f000008', '54bff362-8a2c-4e80-9d4a-590b7f000008', 'large', '011598a5-9e97-4086-888b-271b6219ce95.jpg', '12G-P4-3999-KR_XL_4.jpg', 0, '2015-01-21 14:13:47', '2015-01-21 14:13:47'),
('54bff363-c61c-431e-973d-590b7f000008', NULL, '54bff362-8a2c-4e80-9d4a-590b7f000008', 'small', 'a7f5c91d-1d03-4c79-af63-bc9e99e89d8e.jpg', '12G-P4-3999-KR_XL_4.jpg', 0, '2015-01-21 14:13:47', '2015-01-21 14:13:47'),
('54bff721-2378-4871-a666-04ca7f000008', '54bff721-8c54-4ecd-a371-04ca7f000008', '54bff720-32d4-4570-8869-62057f000008', 'large', '61835be0-98ec-484b-a021-0cfcb457b884.jpg', '12G-P4-3999-KR_XL_4.jpg', 0, '2015-01-21 14:29:45', '2015-01-21 14:29:45'),
('54bff721-3264-4e49-9ac4-04ca7f000008', NULL, '54bff720-32d4-4570-8869-62057f000008', 'small', '399e25fe-dacb-41db-9f7f-10c41949276b.jpg', '06G-P4-3799-KR_XL_8.jpg', 0, '2015-01-21 14:29:45', '2015-01-21 14:29:45'),
('54bff721-5c68-4018-97cc-62057f000008', '54bff721-c024-4924-a51f-62057f000008', '54bff720-32d4-4570-8869-62057f000008', 'facebook', '0ce0b17f-40f6-44f8-b9fa-80ffac8fa4ca.jpg', '06G-P4-3799-KR_XL_6.jpg', 0, '2015-01-21 14:29:45', '2015-01-21 14:29:45'),
('54bff721-8384-459b-b3c3-04ca7f000008', '54bff721-3264-4e49-9ac4-04ca7f000008', '54bff720-32d4-4570-8869-62057f000008', 'large', 'a91269ac-0f6c-44ec-93a8-6fe2d15e4566.jpg', '06G-P4-3799-KR_XL_8.jpg', 0, '2015-01-21 14:29:45', '2015-01-21 14:29:45'),
('54bff721-8c54-4ecd-a371-04ca7f000008', NULL, '54bff720-32d4-4570-8869-62057f000008', 'small', '3e4fe568-ecfc-419e-8294-a53f9fdafee0.jpg', '12G-P4-3999-KR_XL_4.jpg', 0, '2015-01-21 14:29:45', '2015-01-21 14:29:45'),
('54bff721-92b8-4006-ab28-04ca7f000008', '54bff721-3264-4e49-9ac4-04ca7f000008', '54bff720-32d4-4570-8869-62057f000008', 'facebook', '01b43c0b-e1a9-4412-9e84-97218fbfd01b.jpg', '06G-P4-3799-KR_XL_8.jpg', 0, '2015-01-21 14:29:45', '2015-01-21 14:29:45'),
('54bff721-b3bc-49d6-8357-04ca7f000008', '54bff721-8c54-4ecd-a371-04ca7f000008', '54bff720-32d4-4570-8869-62057f000008', 'facebook', '4e9df780-c619-4dee-b41e-1cd765cead66.jpg', '12G-P4-3999-KR_XL_4.jpg', 0, '2015-01-21 14:29:45', '2015-01-21 14:29:45'),
('54bff721-c024-4924-a51f-62057f000008', NULL, '54bff720-32d4-4570-8869-62057f000008', 'small', '49455899-69fa-4303-b82a-9bb027d17dfe.jpg', '06G-P4-3799-KR_XL_6.jpg', 0, '2015-01-21 14:29:45', '2015-01-21 14:29:45'),
('54bff721-f590-41a9-9759-62057f000008', '54bff721-c024-4924-a51f-62057f000008', '54bff720-32d4-4570-8869-62057f000008', 'large', '40fbca17-c922-45d9-93de-93245f2dcf61.jpg', '06G-P4-3799-KR_XL_6.jpg', 0, '2015-01-21 14:29:45', '2015-01-21 14:29:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8_unicode_ci,
  `price` int(10) unsigned DEFAULT '0',
  `quantity` int(10) unsigned DEFAULT '1',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT 'esta publicado o no, 1 es publicado  ',
  `published` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `banned` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `deleted` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1 es eliminado',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='nodes';

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `user_id`, `title`, `body`, `price`, `quantity`, `status`, `published`, `banned`, `deleted`, `created`, `modified`) VALUES
('09ba4b65-0edf-11e5-bdef-d027880078a3', '54be33cc-a428-4914-b1c8-103b7f000008', 'post inserted 2', 'body', 323, 32, 1, 1, 0, 0, '2015-06-19 00:00:00', '2015-06-18 00:00:00'),
('1869571a-0edf-11e5-bdef-d027880078a3', '54be33cc-a428-4914-b1c8-103b7f000008', 'post inserted 3', 'body', 0, 1, 1, 1, 0, 0, '2015-06-25 00:00:00', '2015-06-25 00:00:00'),
('2a81d324-0edf-11e5-bdef-d027880078a3', '54be33cc-a428-4914-b1c8-103b7f000008', 'post inserted 4', 'text', 323, 323, 1, 1, 0, 0, '2015-06-11 00:00:00', '2015-06-19 00:00:00'),
('32f103db-1450-11e5-8c28-d027880078a3', '54be33cc-a428-4914-b1c8-103b7f000008', 'post inserted', 'text', 21, 32, 1, 1, 0, 0, '2015-06-16 00:00:00', '2015-06-16 00:00:00'),
('32f11c8b-1450-11e5-8c28-d027880078a3', '54be33cc-a428-4914-b1c8-103b7f000008', 'post inserted', 'text', 212, 1, 1, 1, 0, 0, '2015-06-16 00:00:00', '2015-06-16 00:00:00'),
('32f12d1d-1450-11e5-8c28-d027880078a3', '54be33cc-a428-4914-b1c8-103b7f000008', 'post inserted', 'text', 0, 1, 1, 1, 0, 0, '2015-06-16 00:00:00', '2015-06-16 00:00:00'),
('32f13d7b-1450-11e5-8c28-d027880078a3', '54be33cc-a428-4914-b1c8-103b7f000008', 'post inserted', 'text', 32, 1, 1, 1, 0, 0, '2015-06-16 00:00:00', '2015-06-16 00:00:00'),
('32f16e81-1450-11e5-8c28-d027880078a3', '54be33cc-a428-4914-b1c8-103b7f000008', 'post inserted', 'text', 21, 1, 1, 1, 0, 0, '2015-06-16 00:00:00', '2015-06-16 00:00:00'),
('3b7e22c1-0edf-11e5-bdef-d027880078a3', '54be33cc-a428-4914-b1c8-103b7f000008', 'post inserted ', 'body', 1212, 21, 1, 1, 0, 0, '2015-06-24 00:00:00', '2015-06-18 00:00:00'),
('4a37171f-0edf-11e5-bdef-d027880078a3', '54be33cc-a428-4914-b1c8-103b7f000008', 'post inserted 6', 'body', 121, 21, 1, 1, 0, 0, '2015-06-17 00:00:00', '2015-06-19 00:00:00'),
('54be3427-b4c8-42d9-b709-103a7f000008', '54be33cc-a428-4914-b1c8-103b7f000008', 'sdasd', '<p>asasdas</p>', 1, 111, 1, 1, 0, 1, '2015-01-20 06:25:35', '2015-01-20 06:27:39'),
('54be34cb-1e8c-4f5e-915b-09527f000008', '54be33cc-a428-4914-b1c8-103b7f000008', 'dfsdf', '<p>sdfdsfsdf</p>', 1, 1323, 1, 1, 0, 1, '2015-01-20 06:28:19', '2015-01-21 11:41:55'),
('54bfd4d0-bc18-4818-83fb-49827f000008', '54be33cc-a428-4914-b1c8-103b7f000008', 'ok', '<p>frrr</p>', 332, 323, 1, 1, 0, 0, '2015-01-21 12:03:20', '2015-01-21 12:03:28'),
('54bfd501-1020-44c9-9c97-04ca7f000008', '54be33cc-a428-4914-b1c8-103b7f000008', '4 win', '<p>fgdfgf dfg dgd gd</p>', 323, 323, 1, 1, 0, 0, '2015-01-21 12:04:09', '2015-01-21 12:04:12'),
('54bfd534-1b10-4951-a83f-55027f000008', '54be33cc-a428-4914-b1c8-103b7f000008', 'fdg', '<p>fggfg</p>', 434, 429, 1, 1, 0, 0, '2015-01-21 12:05:00', '2015-01-21 12:05:02'),
('54bfd580-c9e4-49f4-a076-04ca7f000008', '54be33cc-a428-4914-b1c8-103b7f000008', 'ewe', '', 3232, 3232, 1, 1, 0, 0, '2015-01-21 12:06:16', '2015-01-21 12:06:16'),
('54bfefe7-33b8-4c7f-be7f-04ca7f000008', '54be33cc-a428-4914-b1c8-103b7f000008', 'holas', '<p>sspdf ddsf mspdfm&nbsp;</p>', 1, 1, 1, 1, 0, 0, '2015-01-21 13:58:55', '2015-01-21 14:04:06'),
('54bff23e-c29c-4add-9be5-590b7f000008', '54be33cc-a428-4914-b1c8-103b7f000008', 'cscs', '', 212, 212, 1, 1, 0, 0, '2015-01-21 14:08:54', '2015-01-21 14:08:54'),
('54bff362-8a2c-4e80-9d4a-590b7f000008', '54be33cc-a428-4914-b1c8-103b7f000008', '32323', '<p>cdscsdcs ds d s ds d sd s ds ds ds &nbsp;dsd sd s ds d dsd&nbsp;</p>', 1, 2, 1, 1, 0, 0, '2015-01-21 14:13:46', '2015-01-21 14:13:49'),
('54bff720-32d4-4570-8869-62057f000008', '54be33cc-a428-4914-b1c8-103b7f000008', 'hol sa', '<p>sasa</p>\n', 2, 2, 1, 1, 0, 0, '2015-01-21 14:29:44', '2015-01-21 14:29:48'),
('6e7742de-0edf-11e5-bdef-d027880078a3', '54be33cc-a428-4914-b1c8-103b7f000008', 'post inserted 5', 'body', 32, 32, 1, 1, 0, 0, '2015-06-18 00:00:00', '2015-06-17 00:00:00'),
('7afea315-0edf-11e5-bdef-d027880078a3', '54be33cc-a428-4914-b1c8-103b7f000008', 'post inserted 9', 'body', 12, 1, 1, 1, 0, 0, '2015-06-12 00:00:00', '2015-06-12 00:00:00'),
('cbb51f75-0ede-11e5-bdef-d027880078a3', '54be33cc-a428-4914-b1c8-103b7f000008', 'post inserted ', 'body', 123, 1, 1, 1, 0, 0, '2015-06-09 00:00:00', '2015-06-09 00:00:00'),
('ce3726c5-1450-11e5-8c28-d027880078a3', '54be33cc-a428-4914-b1c8-103b7f000008', 'post inserted ', 'text', 0, 1, 1, 1, 0, 0, '2015-06-16 00:00:00', '2015-06-16 00:00:00'),
('ce373a47-1450-11e5-8c28-d027880078a3', '54be33cc-a428-4914-b1c8-103b7f000008', 'post inserted ', '', 0, 1, 1, 0, 0, 0, '2015-06-16 00:00:00', '2015-06-16 00:00:00'),
('ce374b59-1450-11e5-8c28-d027880078a3', '54be33cc-a428-4914-b1c8-103b7f000008', 'post inserted ', NULL, 0, 1, 1, 1, 0, 0, '2015-06-16 00:00:00', '2015-06-16 00:00:00'),
('ce375c55-1450-11e5-8c28-d027880078a3', '54be33cc-a428-4914-b1c8-103b7f000008', 'post inserted ', 'text', 0, 1, 1, 1, 0, 0, '2015-06-16 00:00:00', '2015-06-16 00:00:00'),
('ce376c0c-1450-11e5-8c28-d027880078a3', '54be33cc-a428-4914-b1c8-103b7f000008', 'post inserted ', 'text', 0, 1, 1, 1, 0, 0, '2015-06-16 00:00:00', '2015-06-16 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `temp_password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `banner` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `banned` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `banned_reason` varchar(300) CHARACTER SET utf16 COLLATE utf16_unicode_ci DEFAULT NULL,
  `suspended` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `suspended_reason` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `password`, `temp_password`, `name`, `email`, `email_verified`, `phone`, `banner`, `banned`, `banned_reason`, `suspended`, `suspended_reason`, `deleted`, `created`, `modified`) VALUES
('54be33cc-a428-4914-b1c8-103b7f000008', '$2a$10$krBIVLWgexrpcRpL05Y5wembTF2kHSl/FjxTlS1N9KQrKiB.E1jwm', '$2a$10$VZYi6LJx37jjRh01IWVRGuXsRjR2CC6N1FJNO0etB./wR7tUyMmJe', 'maria', 'maria@gmail.com', 1, NULL, '58f6a6e0-daf4-4a85-be97-01657055e3de.jpg', 0, NULL, 0, NULL, 0, '2015-01-20 06:24:04', '2015-01-21 12:02:57');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
