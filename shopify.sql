-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2024 at 04:39 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopify`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_products`
--

CREATE TABLE `all_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` mediumtext NOT NULL,
  `product_price` decimal(60,0) NOT NULL,
  `product_category` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `product_online_date` timestamp NOT NULL DEFAULT '2024-01-15 12:36:20',
  `product_image_path` varchar(255) DEFAULT NULL,
  `local` int(11) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `all_products`
--

INSERT INTO `all_products` (`id`, `product_name`, `product_description`, `product_price`, `product_category`, `product_online_date`, `product_image_path`, `local`, `deleted_at`, `created_at`, `updated_at`) VALUES
(4, 'Majestic Mountain Graphic T-Shirt', 'Elevate your wardrobe with this stylish black t-shirt featuring a striking monochrome mountain range graphic. Perfect for those who love the outdoors or want to add a touch of nature-inspired design to their look, this tee is crafted from soft, breathable fabric ensuring all-day comfort. Ideal for casual outings or as a unique gift, this t-shirt is a versatile addition to any collection.', '44', 0, '2024-01-15 12:36:20', 'https://i.imgur.com/QkIa5tT.jpeg', 0, NULL, '2024-01-16 11:43:33', '2024-01-16 11:43:33'),
(5, 'Classic Red Pullover Hoodie', 'Elevate your casual wardrobe with our Classic Red Pullover Hoodie. Crafted with a soft cotton blend for ultimate comfort, this vibrant red hoodie features a kangaroo pocket, adjustable drawstring hood, and ribbed cuffs for a snug fit. The timeless design ensures easy pairing with jeans or joggers for a relaxed yet stylish look, making it a versatile addition to your everyday attire.', '10', 0, '2024-01-15 12:36:20', 'https://i.imgur.com/1twoaDy.jpeg', 0, NULL, '2024-01-16 11:43:33', '2024-01-16 11:43:33'),
(6, 'Classic Heather Gray Hoodie', 'Stay cozy and stylish with our Classic Heather Gray Hoodie. Crafted from soft, durable fabric, it features a kangaroo pocket, adjustable drawstring hood, and ribbed cuffs. Perfect for a casual day out or a relaxing evening in, this hoodie is a versatile addition to any wardrobe.', '69', 0, '2024-01-15 12:36:20', 'https://i.imgur.com/cHddUCu.jpeg', 0, NULL, '2024-01-16 11:43:33', '2024-01-16 11:43:33'),
(7, 'Classic Grey Hooded Sweatshirt', 'Elevate your casual wear with our Classic Grey Hooded Sweatshirt. Made from a soft cotton blend, this hoodie features a front kangaroo pocket, an adjustable drawstring hood, and ribbed cuffs for a snug fit. Perfect for those chilly evenings or lazy weekends, it pairs effortlessly with your favorite jeans or joggers.', '90', 0, '2024-01-15 12:36:20', 'https://i.imgur.com/R2PN9Wq.jpeg', 0, NULL, '2024-01-16 11:43:33', '2024-01-16 11:43:33'),
(8, 'Classic Black Hooded Sweatshirt', 'Elevate your casual wardrobe with our Classic Black Hooded Sweatshirt. Made from high-quality, soft fabric that ensures comfort and durability, this hoodie features a spacious kangaroo pocket and an adjustable drawstring hood. Its versatile design makes it perfect for a relaxed day at home or a casual outing.', '79', 0, '2024-01-15 12:36:20', 'https://i.imgur.com/cSytoSD.jpeg', 0, NULL, '2024-01-16 11:43:33', '2024-01-16 11:43:33'),
(9, 'Classic Comfort Fit Joggers', 'Discover the perfect blend of style and comfort with our Classic Comfort Fit Joggers. These versatile black joggers feature a soft elastic waistband with an adjustable drawstring, two side pockets, and ribbed ankle cuffs for a secure fit. Made from a lightweight and durable fabric, they are ideal for both active days and relaxed lounging.', '25', 0, '2024-01-15 12:36:20', 'https://i.imgur.com/ZKGofuB.jpeg', 0, NULL, '2024-01-16 11:43:33', '2024-01-16 11:43:33'),
(10, 'Classic Comfort Drawstring Joggers', 'Experience the perfect blend of comfort and style with our Classic Comfort Drawstring Joggers. Designed for a relaxed fit, these joggers feature a soft, stretchable fabric, convenient side pockets, and an adjustable drawstring waist with elegant gold-tipped detailing. Ideal for lounging or running errands, these pants will quickly become your go-to for effortless, casual wear.', '79', 0, '2024-01-15 12:36:20', 'https://i.imgur.com/mp3rUty.jpeg', 0, NULL, '2024-01-16 11:43:33', '2024-01-16 11:43:33'),
(11, 'Classic Red Jogger Sweatpants', 'Experience ultimate comfort with our red jogger sweatpants, perfect for both workout sessions and lounging around the house. Made with soft, durable fabric, these joggers feature a snug waistband, adjustable drawstring, and practical side pockets for functionality. Their tapered design and elastic cuffs offer a modern fit that keeps you looking stylish on the go.', '98', 0, '2024-01-15 12:36:20', 'https://i.imgur.com/9LFjwpI.jpeg', 0, NULL, '2024-01-16 11:43:33', '2024-01-16 11:43:33'),
(12, 'Classic Navy Blue Baseball Cap', 'Step out in style with this sleek navy blue baseball cap. Crafted from durable material, it features a smooth, structured design and an adjustable strap for the perfect fit. Protect your eyes from the sun and complement your casual looks with this versatile and timeless accessory.', '61', 0, '2024-01-15 12:36:20', 'https://i.imgur.com/R3iobJA.jpeg', 0, NULL, '2024-01-16 11:43:33', '2024-01-16 11:43:33'),
(13, 'Saody Rupp', 'Top off your casual look with our Classic Blue Baseball Cap, made from high-quality materials for lasting comfort. Featuring a timeless six-panel design with a pre-curved visor, this adjustable cap offers both style and practicality for everyday wear.', '86', 0, '2024-01-15 12:36:20', '[\"https://i.imgur.com/wXuQ7bm.jpeg\"', 0, NULL, '2024-01-16 11:43:33', '2024-01-16 11:43:33'),
(14, 'Classic Red Baseball Cap', 'Elevate your casual wardrobe with this timeless red baseball cap. Crafted from durable fabric, it features a comfortable fit with an adjustable strap at the back, ensuring one size fits all. Perfect for sunny days or adding a sporty touch to your outfit.', '35', 0, '2024-01-15 12:36:20', 'https://i.imgur.com/cBuLvBi.jpeg', 0, NULL, '2024-01-16 11:43:33', '2024-01-16 11:43:33'),
(15, 'Classic Black Baseball Cap', 'Elevate your casual wear with this timeless black baseball cap. Made with high-quality, breathable fabric, it features an adjustable strap for the perfect fit. Whether you’re out for a jog or just running errands, this cap adds a touch of style to any outfit.', '58', 0, '2024-01-15 12:36:20', 'https://i.imgur.com/KeqG6r4.jpeg', 0, NULL, '2024-01-16 11:43:33', '2024-01-16 11:43:33'),
(16, 'Classic Olive Chino Shorts', 'Elevate your casual wardrobe with these classic olive chino shorts. Designed for comfort and versatility, they feature a smooth waistband, practical pockets, and a tailored fit that makes them perfect for both relaxed weekends and smart-casual occasions. The durable fabric ensures they hold up throughout your daily activities while maintaining a stylish look.', '84', 0, '2024-01-15 12:36:20', 'https://i.imgur.com/UsFIvYs.jpeg', 0, NULL, '2024-01-16 11:43:33', '2024-01-16 11:43:33'),
(17, 'Classic High-Waisted Athletic Shorts', 'Stay comfortable and stylish with our Classic High-Waisted Athletic Shorts. Designed for optimal movement and versatility, these shorts are a must-have for your workout wardrobe. Featuring a figure-flattering high waist, breathable fabric, and a secure fit that ensures they stay in place during any activity, these shorts are perfect for the gym, running, or even just casual wear.', '43', 0, '2024-01-15 12:36:20', 'https://i.imgur.com/eGOUveI.jpeg', 0, NULL, '2024-01-16 11:43:33', '2024-01-16 11:43:33'),
(18, 'Classic White Crew Neck T-Shirt', 'Elevate your basics with this versatile white crew neck tee. Made from a soft, breathable cotton blend, it offers both comfort and durability. Its sleek, timeless design ensures it pairs well with virtually any outfit. Ideal for layering or wearing on its own, this t-shirt is a must-have staple for every wardrobe.', '39', 0, '2024-01-15 12:36:20', 'https://i.imgur.com/axsyGpD.jpeg', 0, NULL, '2024-01-16 11:43:33', '2024-01-16 11:43:33'),
(19, 'Classic White Tee - Timeless Style and Comfort', 'Elevate your everyday wardrobe with our Classic White Tee. Crafted from premium soft cotton material, this versatile t-shirt combines comfort with durability, perfect for daily wear. Featuring a relaxed, unisex fit that flatters every body type, it\'s a staple piece for any casual ensemble. Easy to care for and machine washable, this white tee retains its shape and softness wash after wash. Pair it with your favorite jeans or layer it under a jacket for a smart look.', '73', 0, '2024-01-15 12:36:20', 'https://i.imgur.com/Y54Bt8J.jpeg', 0, NULL, '2024-01-16 11:43:33', '2024-01-16 11:43:33'),
(20, 'Classic Black T-Shirt', 'Elevate your everyday style with our Classic Black T-Shirt. This staple piece is crafted from soft, breathable cotton for all-day comfort. Its versatile design features a classic crew neck and short sleeves, making it perfect for layering or wearing on its own. Durable and easy to care for, it\'s sure to become a favorite in your wardrobe.', '35', 0, '2024-01-15 12:36:20', 'https://i.imgur.com/9DqEOV5.jpeg', 0, NULL, '2024-01-16 11:43:33', '2024-01-16 11:43:33'),
(21, 'Sleek White & Orange Wireless Gaming Controller', 'Elevate your gaming experience with this state-of-the-art wireless controller, featuring a crisp white base with vibrant orange accents. Designed for precision play, the ergonomic shape and responsive buttons provide maximum comfort and control for endless hours of gameplay. Compatible with multiple gaming platforms, this controller is a must-have for any serious gamer looking to enhance their setup.', '69', 0, '2024-01-15 12:36:20', 'https://i.imgur.com/ZANVnHE.jpeg', 0, NULL, '2024-01-16 11:43:33', '2024-01-16 11:43:33'),
(22, 'Sleek Wireless Headphone & Inked Earbud Set', 'Experience the fusion of style and sound with this sophisticated audio set featuring a pair of sleek, white wireless headphones offering crystal-clear sound quality and over-ear comfort. The set also includes a set of durable earbuds, perfect for an on-the-go lifestyle. Elevate your music enjoyment with this versatile duo, designed to cater to all your listening needs.', '44', 0, '2024-01-15 12:36:20', 'https://i.imgur.com/yVeIeDa.jpeg', 0, NULL, '2024-01-16 11:43:33', '2024-01-16 11:43:33'),
(23, 'Sleek Comfort-Fit Over-Ear Headphones', 'Experience superior sound quality with our Sleek Comfort-Fit Over-Ear Headphones, designed for prolonged use with cushioned ear cups and an adjustable, padded headband. Ideal for immersive listening, whether you\'re at home, in the office, or on the move. Their durable construction and timeless design provide both aesthetically pleasing looks and long-lasting performance.', '28', 0, '2024-01-15 12:36:20', 'https://i.imgur.com/SolkFEB.jpeg', 0, NULL, '2024-01-16 11:43:33', '2024-01-16 11:43:33'),
(24, 'Efficient 2-Slice Toaster', 'Enhance your morning routine with our sleek 2-slice toaster, featuring adjustable browning controls and a removable crumb tray for easy cleaning. This compact and stylish appliance is perfect for any kitchen, ensuring your toast is always golden brown and delicious.', '48', 0, '2024-01-15 12:36:20', 'https://i.imgur.com/keVCVIa.jpeg', 0, NULL, '2024-01-16 11:43:33', '2024-01-16 11:43:33'),
(25, 'Sleek Wireless Computer Mouse', 'Experience smooth and precise navigation with this modern wireless mouse, featuring a glossy finish and a comfortable ergonomic design. Its responsive tracking and easy-to-use interface make it the perfect accessory for any desktop or laptop setup. The stylish blue hue adds a splash of color to your workspace, while its compact size ensures it fits neatly in your bag for on-the-go productivity.', '10', 0, '2024-01-15 12:36:20', 'https://i.imgur.com/w3Y8NwQ.jpeg', 0, NULL, '2024-01-16 11:43:33', '2024-01-16 11:43:33'),
(26, 'Sleek Modern Laptop with Ambient Lighting', 'Experience next-level computing with our ultra-slim laptop, featuring a stunning display illuminated by ambient lighting. This high-performance machine is perfect for both work and play, delivering powerful processing in a sleek, portable design. The vibrant colors add a touch of personality to your tech collection, making it as stylish as it is functional.', '43', 0, '2024-01-15 12:36:20', 'https://i.imgur.com/OKn1KFI.jpeg', 0, NULL, '2024-01-16 11:43:33', '2024-01-16 11:43:33'),
(27, 'Sleek Modern Laptop for Professionals', 'Experience cutting-edge technology and elegant design with our latest laptop model. Perfect for professionals on-the-go, this high-performance laptop boasts a powerful processor, ample storage, and a long-lasting battery life, all encased in a lightweight, slim frame for ultimate portability. Shop now to elevate your work and play.', '97', 0, '2024-01-15 12:36:20', 'https://i.imgur.com/ItHcq7o.jpeg', 0, NULL, '2024-01-16 11:43:33', '2024-01-16 11:43:33'),
(28, 'Stylish Red & Silver Over-Ear Headphones', 'Immerse yourself in superior sound quality with these sleek red and silver over-ear headphones. Designed for comfort and style, the headphones feature cushioned ear cups, an adjustable padded headband, and a detachable red cable for easy storage and portability. Perfect for music lovers and audiophiles who value both appearance and audio fidelity.', '39', 0, '2024-01-15 12:36:20', 'https://i.imgur.com/YaSqa06.jpeg', 0, NULL, '2024-01-16 11:43:33', '2024-01-16 11:43:33'),
(29, 'Sleek Mirror Finish Phone Case', 'Enhance your smartphone\'s look with this ultra-sleek mirror finish phone case. Designed to offer style with protection, the case features a reflective surface that adds a touch of elegance while keeping your device safe from scratches and impacts. Perfect for those who love a minimalist and modern aesthetic.', '27', 0, '2024-01-15 12:36:20', 'https://i.imgur.com/yb9UQKL.jpeg', 0, NULL, '2024-01-16 11:43:33', '2024-01-16 11:43:33'),
(30, 'Sleek Smartwatch with Vibrant Display', 'Experience modern timekeeping with our high-tech smartwatch, featuring a vivid touch screen display, customizable watch faces, and a comfortable blue silicone strap. This smartwatch keeps you connected with notifications and fitness tracking while showcasing exceptional style and versatility.', '16', 0, '2024-01-15 12:36:20', 'https://i.imgur.com/LGk9Jn2.jpeg', 0, NULL, '2024-01-16 11:43:33', '2024-01-16 11:43:33'),
(31, 'Sleek Modern Leather Sofa', 'Enhance the elegance of your living space with our Sleek Modern Leather Sofa. Designed with a minimalist aesthetic, it features clean lines and a luxurious leather finish. The robust metal legs provide stability and support, while the plush cushions ensure comfort. Perfect for contemporary homes or office waiting areas, this sofa is a statement piece that combines style with practicality.', '53', 0, '2024-01-15 12:36:20', 'https://i.imgur.com/Qphac99.jpeg', 0, NULL, '2024-01-16 11:43:33', '2024-01-16 11:43:33'),
(32, 'Mid-Century Modern Wooden Dining Table', 'Elevate your dining room with this sleek Mid-Century Modern dining table, featuring an elegant walnut finish and tapered legs for a timeless aesthetic. Its sturdy wood construction and minimalist design make it a versatile piece that fits with a variety of decor styles. Perfect for intimate dinners or as a stylish spot for your morning coffee.', '24', 0, '2024-01-15 12:36:20', 'https://i.imgur.com/DMQHGA0.jpeg', 0, NULL, '2024-01-16 11:43:33', '2024-01-16 11:43:33'),
(33, 'Elegant Golden-Base Stone Top Dining Table', 'Elevate your dining space with this luxurious table, featuring a sturdy golden metal base with an intricate rod design that provides both stability and chic elegance. The smooth stone top in a sleek round shape offers a robust surface for your dining pleasure. Perfect for both everyday meals and special occasions, this table easily complements any modern or glam decor.', '66', 0, '2024-01-15 12:36:20', 'https://i.imgur.com/NWIJKUj.jpeg', 0, NULL, '2024-01-16 11:43:33', '2024-01-16 11:43:33'),
(34, 'Modern Elegance Teal Armchair', 'Elevate your living space with this beautifully crafted armchair, featuring a sleek wooden frame that complements its vibrant teal upholstery. Ideal for adding a pop of color and contemporary style to any room, this chair provides both superb comfort and sophisticated design. Perfect for reading, relaxing, or creating a cozy conversation nook.', '25', 0, '2024-01-15 12:36:20', 'https://i.imgur.com/6wkyyIN.jpeg', 0, NULL, '2024-01-16 11:43:33', '2024-01-16 11:43:33'),
(35, 'Elegant Solid Wood Dining Table', 'Enhance your dining space with this sleek, contemporary dining table, crafted from high-quality solid wood with a warm finish. Its sturdy construction and minimalist design make it a perfect addition for any home looking for a touch of elegance. Accommodates up to six guests comfortably and includes a striking fruit bowl centerpiece. The overhead lighting is not included.', '67', 0, '2024-01-15 12:36:20', 'https://i.imgur.com/4lTaHfF.jpeg', 0, NULL, '2024-01-16 11:43:33', '2024-01-16 11:43:33'),
(36, 'Modern Minimalist Workstation Setup', 'Elevate your home office with our Modern Minimalist Workstation Setup, featuring a sleek wooden desk topped with an elegant computer, stylish adjustable wooden desk lamp, and complimentary accessories for a clean, productive workspace. This setup is perfect for professionals seeking a contemporary look that combines functionality with design.', '49', 0, '2024-01-15 12:36:20', 'https://i.imgur.com/3oXNBst.jpeg', 0, NULL, '2024-01-16 11:43:33', '2024-01-16 11:43:33'),
(37, 'Modern Ergonomic Office Chair', 'Elevate your office space with this sleek and comfortable Modern Ergonomic Office Chair. Designed to provide optimal support throughout the workday, it features an adjustable height mechanism, smooth-rolling casters for easy mobility, and a cushioned seat for extended comfort. The clean lines and minimalist white design make it a versatile addition to any contemporary workspace.', '71', 0, '2024-01-15 12:36:20', 'https://i.imgur.com/3dU0m72.jpeg', 0, NULL, '2024-01-16 11:43:33', '2024-01-16 11:43:33'),
(38, 'Futuristic Holographic Soccer Cleats', 'Step onto the field and stand out from the crowd with these eye-catching holographic soccer cleats. Designed for the modern player, these cleats feature a sleek silhouette, lightweight construction for maximum agility, and durable studs for optimal traction. The shimmering holographic finish reflects a rainbow of colors as you move, ensuring that you\'ll be noticed for both your skills and style. Perfect for the fashion-forward athlete who wants to make a statement.', '39', 0, '2024-01-15 12:36:20', 'https://i.imgur.com/qNOjJje.jpeg', 0, NULL, '2024-01-16 11:43:33', '2024-01-16 11:43:33'),
(39, 'Rainbow Glitter High Heels', 'Step into the spotlight with these eye-catching rainbow glitter high heels. Designed to dazzle, each shoe boasts a kaleidoscope of shimmering colors that catch and reflect light with every step. Perfect for special occasions or a night out, these stunners are sure to turn heads and elevate any ensemble.', '39', 0, '2024-01-15 12:36:20', 'https://i.imgur.com/62gGzeF.jpeg', 0, NULL, '2024-01-16 11:43:33', '2024-01-16 11:43:33'),
(40, 'Chic Summer Denim Espadrille Sandals', 'Step into summer with style in our denim espadrille sandals. Featuring a braided jute sole for a classic touch and adjustable denim straps for a snug fit, these sandals offer both comfort and a fashionable edge. The easy slip-on design ensures convenience for beach days or casual outings.', '33', 0, '2024-01-15 12:36:20', 'https://i.imgur.com/9qrmE1b.jpeg', 0, NULL, '2024-01-16 11:43:33', '2024-01-16 11:43:33'),
(41, 'Vibrant Runners: Bold Orange & Blue Sneakers', 'Step into style with these eye-catching sneakers featuring a striking combination of orange and blue hues. Designed for both comfort and fashion, these shoes come with flexible soles and cushioned insoles, perfect for active individuals who don\'t compromise on style. The reflective silver accents add a touch of modernity, making them a standout accessory for your workout or casual wear.', '27', 0, '2024-01-15 12:36:20', 'https://i.imgur.com/hKcMNJs.jpeg', 0, NULL, '2024-01-16 11:43:33', '2024-01-16 11:43:33'),
(42, 'Vibrant Pink Classic Sneakers', 'Step into style with our Vibrant Pink Classic Sneakers! These eye-catching shoes feature a bold pink hue with iconic white detailing, offering a sleek, timeless design. Constructed with durable materials and a comfortable fit, they are perfect for those seeking a pop of color in their everyday footwear. Grab a pair today and add some vibrancy to your step!', '84', 0, '2024-01-15 12:36:20', 'https://i.imgur.com/mcW42Gi.jpeg', 0, NULL, '2024-01-16 11:43:33', '2024-01-16 11:43:33'),
(43, 'Futuristic Silver and Gold High-Top Sneaker', 'Step into the future with this eye-catching high-top sneaker, designed for those who dare to stand out. The sneaker features a sleek silver body with striking gold accents, offering a modern twist on classic footwear. Its high-top design provides support and style, making it the perfect addition to any avant-garde fashion collection. Grab a pair today and elevate your shoe game!', '68', 0, '2024-01-15 12:36:20', 'https://i.imgur.com/npLfCGq.jpeg', 0, NULL, '2024-01-16 11:43:33', '2024-01-16 11:43:33'),
(44, 'Futuristic Chic High-Heel Boots', 'Elevate your style with our cutting-edge high-heel boots that blend bold design with avant-garde aesthetics. These boots feature a unique color-block heel, a sleek silhouette, and a versatile light grey finish that pairs easily with any cutting-edge outfit. Crafted for the fashion-forward individual, these boots are sure to make a statement.', '36', 0, '2024-01-15 12:36:20', 'https://i.imgur.com/HqYqLnW.jpeg', 0, NULL, '2024-01-16 11:43:33', '2024-01-16 11:43:33'),
(45, 'Elegant Patent Leather Peep-Toe Pumps with Gold-Tone Heel', 'Step into sophistication with these chic peep-toe pumps, showcasing a lustrous patent leather finish and an eye-catching gold-tone block heel. The ornate buckle detail adds a touch of glamour, perfect for elevating your evening attire or complementing a polished daytime look.', '53', 0, '2024-01-15 12:36:20', 'https://i.imgur.com/AzAY4Ed.jpeg', 0, NULL, '2024-01-16 11:43:33', '2024-01-16 11:43:33'),
(46, 'Elegant Purple Leather Loafers', 'Step into sophistication with our Elegant Purple Leather Loafers, perfect for making a bold statement. Crafted from high-quality leather with a vibrant purple finish, these shoes feature a classic loafer silhouette that\'s been updated with a contemporary twist. The comfortable slip-on design and durable soles ensure both style and functionality for the modern man.', '17', 0, '2024-01-15 12:36:20', 'https://i.imgur.com/Au8J9sX.jpeg', 0, NULL, '2024-01-16 11:43:33', '2024-01-16 11:43:33'),
(47, 'Classic Blue Suede Casual Shoes', 'Step into comfort with our Classic Blue Suede Casual Shoes, perfect for everyday wear. These shoes feature a stylish blue suede upper, durable rubber soles for superior traction, and classic lace-up fronts for a snug fit. The sleek design pairs well with both jeans and chinos, making them a versatile addition to any wardrobe.', '39', 0, '2024-01-15 12:36:20', 'https://i.imgur.com/sC0ztOB.jpeg', 0, NULL, '2024-01-16 11:43:33', '2024-01-16 11:43:33'),
(48, 'Sleek Futuristic Electric Bicycle', 'This modern electric bicycle combines style and efficiency with its unique design and top-notch performance features. Equipped with a durable frame, enhanced battery life, and integrated tech capabilities, it\'s perfect for the eco-conscious commuter looking to navigate the city with ease.', '22', 0, '2024-01-15 12:36:20', 'https://i.imgur.com/BG8J0Fj.jpg', 0, NULL, '2024-01-16 11:43:33', '2024-01-16 11:43:33'),
(49, 'Sleek All-Terrain Go-Kart', 'Experience the thrill of outdoor adventures with our Sleek All-Terrain Go-Kart, featuring a durable frame, comfortable racing seat, and robust, large-tread tires perfect for handling a variety of terrains. Designed for fun-seekers of all ages, this go-kart is an ideal choice for backyard racing or exploring local trails.', '37', 0, '2024-01-15 12:36:20', 'https://i.imgur.com/Ex5x3IU.jpg', 0, NULL, '2024-01-16 11:43:33', '2024-01-16 11:43:33'),
(50, 'Radiant Citrus Eau de Parfum', 'Indulge in the essence of summer with this vibrant citrus-scented Eau de Parfum. Encased in a sleek glass bottle with a bold orange cap, this fragrance embodies freshness and elegance. Perfect for daily wear, it\'s an olfactory delight that leaves a lasting, zesty impression.', '73', 0, '2024-01-15 12:36:20', 'https://i.imgur.com/xPDwUb3.jpg', 0, NULL, '2024-01-16 11:43:33', '2024-01-16 11:43:33'),
(51, 'Sleek Olive Green Hardshell Carry-On Luggage', 'Travel in style with our durable hardshell carry-on, perfect for weekend getaways and business trips. This sleek olive green suitcase features smooth gliding wheels for easy airport navigation, a sturdy telescopic handle, and a secure zippered compartment to keep your belongings safe. Its compact size meets most airline overhead bin requirements, ensuring a hassle-free flying experience.', '48', 0, '2024-01-15 12:36:20', 'https://i.imgur.com/jVfoZnP.jpg', 0, NULL, '2024-01-16 11:43:33', '2024-01-16 11:43:33'),
(52, 'Chic Transparent Fashion Handbag', 'Elevate your style with our Chic Transparent Fashion Handbag, perfect for showcasing your essentials with a clear, modern edge. This trendy accessory features durable acrylic construction, luxe gold-tone hardware, and an elegant chain strap. Its compact size ensures you can carry your day-to-day items with ease and sophistication.', '61', 0, '2024-01-15 12:36:20', 'https://i.imgur.com/Lqaqz59.jpg', 0, NULL, '2024-01-16 11:43:33', '2024-01-16 11:43:33'),
(53, 'Trendy Pink-Tinted Sunglasses', 'Step up your style game with these fashionable black-framed, pink-tinted sunglasses. Perfect for making a statement while protecting your eyes from the glare. Their bold color and contemporary design make these shades a must-have accessory for any trendsetter looking to add a pop of color to their ensemble.', '38', 0, '2024-01-15 12:36:20', 'https://i.imgur.com/0qQBkxX.jpg', 0, NULL, '2024-01-16 11:43:33', '2024-01-16 11:43:33'),
(54, 'Elegant Glass Tumbler Set', 'Enhance your drinkware collection with our sophisticated set of glass tumblers, perfect for serving your favorite beverages. This versatile set includes both clear and subtly tinted glasses, lending a modern touch to any table setting. Crafted with quality materials, these durable tumblers are designed to withstand daily use while maintaining their elegant appeal.', '50', 0, '2024-01-15 12:36:20', 'https://i.imgur.com/TF0pXdL.jpg', 0, NULL, '2024-01-16 11:43:33', '2024-01-16 11:43:33'),
(55, 'Laptop Asus', 'Laptop gamer de gama media', '1000000', 0, '2024-01-15 12:36:20', 'https://media.spdigital.cl/thumbnails/products/8tijyc_q_d8079bba_thumbnail_4096.jpg', 0, NULL, '2024-01-16 11:43:33', '2024-01-16 11:43:33'),
(56, 'New Product Course', 'A description', '999', 0, '2024-01-15 12:36:20', '[\"https://placeimg.com/640/480/any\"]', 0, NULL, '2024-01-16 11:43:33', '2024-01-16 11:43:33'),
(57, '54', 'A description', '999', 0, '2024-01-15 12:36:20', '[\"https://placeimg.com/640/480/any\"]', 0, NULL, '2024-01-16 11:43:33', '2024-01-16 11:43:33'),
(58, 'testt', 'sdffds', '200', 0, '2024-01-22 18:30:00', NULL, 0, NULL, '2024-01-16 12:56:21', '2024-01-16 12:56:21'),
(59, 'testetert', 'dfdsds', '22', 0, '2024-01-15 18:30:00', NULL, 0, NULL, '2024-01-16 12:57:52', '2024-01-16 12:57:52'),
(60, 'Teddy Bear', 'Teddy Bear', '30', 0, '2024-02-26 18:30:00', '1709058975.jpg', 1, NULL, '2024-02-27 13:06:15', '2024-02-27 13:06:15'),
(61, 'TEST123', 'TEST123', '3335', 0, '2024-02-28 18:30:00', '1709229784.jpg', 1, NULL, '2024-02-29 12:33:05', '2024-02-29 12:33:05');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `card_id` bigint(20) UNSIGNED NOT NULL,
  `product` bigint(20) UNSIGNED NOT NULL,
  `category` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(60,10) NOT NULL,
  `added_by` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`card_id`, `product`, `category`, `quantity`, `price`, `added_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(32, 60, 11, 3, '30.0000000000', 20, '2024-02-29 10:52:25', '2024-02-29 10:49:24', '2024-02-29 10:52:25'),
(33, 60, 11, 1, '30.0000000000', 20, '2024-02-29 11:03:51', '2024-02-29 10:55:34', '2024-02-29 11:03:51'),
(34, 60, 11, 0, '30.0000000000', 20, '2024-02-29 11:23:23', '2024-02-29 11:04:41', '2024-02-29 11:23:23'),
(35, 4, 7, 1, '44.0000000000', 20, '2024-02-29 11:10:33', '2024-02-29 11:10:22', '2024-02-29 11:10:33'),
(36, 28, 8, 2, '39.0000000000', 20, '2024-02-29 11:24:33', '2024-02-29 11:24:21', '2024-02-29 11:24:33'),
(37, 28, 8, 0, '39.0000000000', 20, '2024-02-29 11:24:45', '2024-02-29 11:24:40', '2024-02-29 11:24:45'),
(38, 6, 7, 1, '69.0000000000', 23, NULL, '2024-03-03 08:27:59', '2024-03-03 08:27:59'),
(43, 28, 8, 1, '39.0000000000', 20, '2024-03-09 05:23:22', '2024-03-07 11:47:35', '2024-03-09 05:23:22'),
(44, 28, 8, 0, '39.0000000000', 20, '2024-03-09 05:30:35', '2024-03-09 05:24:57', '2024-03-09 05:30:35'),
(45, 28, 8, 1, '39.0000000000', 20, NULL, '2024-03-09 05:30:38', '2024-03-09 05:30:38');

-- --------------------------------------------------------

--
-- Table structure for table `cart_order_confirm_details`
--

CREATE TABLE `cart_order_confirm_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cart_order_id` int(11) DEFAULT NULL,
  `invoice` varchar(225) NOT NULL,
  `products` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `amount_paid` double NOT NULL DEFAULT 0,
  `paid` int(11) NOT NULL DEFAULT 0,
  `added_by` varchar(255) NOT NULL,
  `gateway_payment_id` varchar(100) NOT NULL,
  `gateway_order_id` varchar(100) NOT NULL,
  `gateway_signature` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_order_confirm_details`
--

INSERT INTO `cart_order_confirm_details` (`id`, `cart_order_id`, `invoice`, `products`, `address`, `amount_paid`, `paid`, `added_by`, `gateway_payment_id`, `gateway_order_id`, `gateway_signature`, `created_at`, `updated_at`) VALUES
(4, NULL, '00', '28,4', 'Patahre Thube ,Pune ,Maharashtra ,876787', 161, 1, '22', 'pay_NZgImTrZ3e5IFv', 'order_NZgIEYzZzZW4Lm', '99545531b28ee890402fad3d9bb203fe55153e4b5065d9b402c528c0dd0f3403', '2024-02-11 13:34:37', '2024-02-11 13:34:37'),
(5, NULL, '00', '28,4', 'Patahre Thube ,Pune ,Maharashtra ,876787', 161, 1, '22', 'pay_NZgNxJXRREPRjI', 'order_NZgNM4zkSs9D9S', '5254b582230c96716d3d2684313b5ae58f16710cda09c1d90a46187b0d13376b', '2024-02-11 13:39:34', '2024-02-11 13:39:34'),
(6, NULL, '00', '28,4', 'Patahre Thube ,Pune ,Maharashtra ,876787', 161, 1, '22', 'pay_NZgUOu8ZkmeDWs', 'order_NZgTwhGlY1ZlRV', 'd82d365e5a9eb02625dbbbdc8a36e11dfdcc5c957036b28dbb97a6a3d2288861', '2024-02-11 13:45:36', '2024-02-11 13:45:36'),
(7, NULL, '00', '6', 'Test ,Puri ,Orisaa ,87898', 69, 1, '23', 'pay_NhuLuXJTKWIQeE', 'order_NhuJ4stHn9EOyO', 'c54db014f78013c8d2ac5c219695152bcb6c0b6fc5f17ce1f67213809ff9ffe9', '2024-03-03 08:31:15', '2024-03-03 08:31:15');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(30) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(7, 'Clothes ', NULL, '2024-01-15 12:04:07', '2024-01-15 12:04:07'),
(8, 'Electronics', NULL, '2024-01-15 12:04:07', '2024-01-15 12:04:07'),
(9, 'Furniture', NULL, '2024-01-15 12:04:07', '2024-01-15 12:04:07'),
(10, 'Shoes', NULL, '2024-01-15 12:04:07', '2024-01-15 12:04:07'),
(11, 'Miscellaneous', NULL, '2024-01-15 12:04:07', '2024-01-15 12:04:07');

-- --------------------------------------------------------

--
-- Table structure for table `cph_user_logins`
--

CREATE TABLE `cph_user_logins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cph_user_logins`
--

INSERT INTO `cph_user_logins` (`id`, `fname`, `lname`, `username`, `password`, `type`, `created_at`, `updated_at`) VALUES
(6, 'Super', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1', '2024-02-27 11:30:55', '2024-02-27 11:30:55');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2024_01_12_183159_create_categories', 1),
(3, '2024_01_15_175507_create_all_products', 2),
(4, '2024_01_15_181433_add_image_path_to_product', 3),
(5, '2024_01_16_170920_change_dataypte_of_product_columns', 4),
(6, '2024_01_16_171225_change_dataypte_of_product_description', 5),
(8, '2024_01_19_185825_create_prodiuct_mappings', 6),
(12, '2024_01_21_074030_create_users', 8),
(16, '2024_01_21_071328_create_carts', 9),
(17, '2024_01_26_142050_crate_user_profiles', 10),
(22, '2024_01_26_163438_create_user_profiles', 11),
(23, '2024_01_26_163924_add_column_to_user_profiles', 11),
(24, '2024_01_27_202903_create_order_details', 12),
(25, '2024_01_28_103250_add_to_order_details', 13),
(26, '2024_02_04_163514_add_to_user_details', 14),
(27, '2024_02_11_122237_add_to_user_profiles', 15),
(29, '2024_02_11_132644_create_cart_order_confirm_details', 17),
(30, '2024_02_11_161816_add_to_cart_order_confirm_details', 18),
(31, '2024_02_11_131951_add_to_order_details', 19),
(32, '2024_02_26_160836_create_table__cph_user_logins', 20),
(33, '2024_02_27_182112_alter_to_all_products', 21),
(36, '2024_02_29_165741_create_product_stocks', 22);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `order_no` varchar(255) NOT NULL,
  `card_id` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `completed` varchar(255) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `order_no`, `card_id`, `added_by`, `completed`, `deleted_at`, `created_at`, `updated_at`) VALUES
(20, 'ORDKIS1709223564', 32, 20, '0', '2024-02-29 10:52:25', '2024-02-29 10:49:24', '2024-02-29 10:52:25'),
(21, 'ORDKIS1709223934', 33, 20, '0', '2024-02-29 11:03:51', '2024-02-29 10:55:34', '2024-02-29 11:03:51'),
(22, 'ORDKIS1709224482', 34, 20, '0', NULL, '2024-02-29 11:04:42', '2024-02-29 11:04:42'),
(23, 'ORDKIS1709224822', 35, 20, '0', '2024-02-29 11:10:33', '2024-02-29 11:10:22', '2024-02-29 11:10:33'),
(24, 'ORDKIS1709225661', 36, 20, '0', '2024-02-29 11:24:33', '2024-02-29 11:24:21', '2024-02-29 11:24:33'),
(25, 'ORDKIS1709225680', 37, 20, '0', NULL, '2024-02-29 11:24:40', '2024-02-29 11:24:40'),
(26, 'ORDRAK1709474279', 38, 23, '1', NULL, '2024-03-03 08:27:59', '2024-03-03 08:31:16'),
(27, 'ORDKIS1709831855', 43, 20, '0', '2024-03-09 05:23:22', '2024-03-07 11:47:35', '2024-03-09 05:23:22'),
(28, 'ORDKIS1709981697', 44, 20, '0', NULL, '2024-03-09 05:24:57', '2024-03-09 05:24:57'),
(29, 'ORDKIS1709982038', 45, 20, '0', NULL, '2024-03-09 05:30:38', '2024-03-09 05:30:38');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prodiuct_mappings`
--

CREATE TABLE `prodiuct_mappings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prodiuct_mappings`
--

INSERT INTO `prodiuct_mappings` (`id`, `product_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 5, 7, '2024-01-19 14:17:53', '2024-01-19 14:17:53'),
(2, 4, 7, '2024-01-20 01:49:40', '2024-01-20 01:49:40'),
(3, 28, 8, '2024-01-20 01:50:42', '2024-01-20 01:50:42'),
(4, 6, 7, '2024-01-20 01:51:03', '2024-01-20 01:51:03'),
(5, 60, 11, '2024-02-27 13:07:23', '2024-02-27 13:07:23'),
(6, 7, 7, '2024-03-03 10:16:17', '2024-03-03 10:16:17');

-- --------------------------------------------------------

--
-- Table structure for table `product_stocks`
--

CREATE TABLE `product_stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stocks` bigint(20) NOT NULL DEFAULT 0,
  `product` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_stocks`
--

INSERT INTO `product_stocks` (`id`, `stocks`, `product`, `created_at`, `updated_at`) VALUES
(1, 20, 7, '2024-03-03 04:39:08', '2024-03-03 04:39:08');

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `freeze` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`id`, `user_id`, `user_name`, `user_password`, `freeze`, `created_at`, `updated_at`) VALUES
(20, 1, 'kislayraj', 'root', 0, '2024-01-27 11:37:48', '2024-01-27 11:37:48'),
(21, 2, 'superadmin', 'test', 0, '2024-01-28 12:05:46', '2024-01-28 12:05:46'),
(22, 4, 'testone', '123456', 0, '2024-02-11 07:35:24', '2024-02-11 07:35:24'),
(23, 5, 'rakeshbasa', '1234', 0, '2024-03-03 08:25:11', '2024-03-03 08:25:11'),
(24, 6, 'rakeshbasa', '1234', 0, '2024-03-03 08:26:59', '2024-03-03 08:26:59'),
(25, 7, 'superadmin', '12345678', 0, '2024-07-21 09:01:11', '2024-07-21 09:01:11');

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE `user_profiles` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneno` varchar(255) NOT NULL,
  `area` varchar(225) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `zip_code` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`user_id`, `fname`, `lname`, `email`, `phoneno`, `area`, `city`, `state`, `zip_code`, `dob`, `created_at`, `updated_at`) VALUES
(7, 'Super', 'Admin', 'kislayrajai06@gmail.com', '9876546787', 'Main Road', 'Purnea', 'Bihar', '854301', '1990-11-14', '2024-07-21 09:01:11', '2024-07-21 09:01:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_products`
--
ALTER TABLE `all_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`card_id`),
  ADD KEY `carts_product_foreign` (`product`),
  ADD KEY `carts_category_foreign` (`category`),
  ADD KEY `carts_added_by_foreign` (`added_by`);

--
-- Indexes for table `cart_order_confirm_details`
--
ALTER TABLE `cart_order_confirm_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cph_user_logins`
--
ALTER TABLE `cph_user_logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `prodiuct_mappings`
--
ALTER TABLE `prodiuct_mappings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prodiuct_mappings_product_id_foreign` (`product_id`),
  ADD KEY `prodiuct_mappings_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_stocks`
--
ALTER TABLE `product_stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `all_products`
--
ALTER TABLE `all_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `card_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `cart_order_confirm_details`
--
ALTER TABLE `cart_order_confirm_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cph_user_logins`
--
ALTER TABLE `cph_user_logins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prodiuct_mappings`
--
ALTER TABLE `prodiuct_mappings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_stocks`
--
ALTER TABLE `product_stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_added_by_foreign` FOREIGN KEY (`added_by`) REFERENCES `user_detail` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carts_category_foreign` FOREIGN KEY (`category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carts_product_foreign` FOREIGN KEY (`product`) REFERENCES `all_products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prodiuct_mappings`
--
ALTER TABLE `prodiuct_mappings`
  ADD CONSTRAINT `prodiuct_mappings_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `prodiuct_mappings_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `all_products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
