-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2017 at 08:34 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buorso`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(4) NOT NULL,
  `type` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `iconname` varchar(20) NOT NULL,
  `color` varchar(8) NOT NULL,
  `placenum` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `type`, `name`, `iconname`, `color`, `placenum`) VALUES
(1, 'Category', 'Vehicles and Transport', 'fa-car', 'e74c3c', 1),
(2, 'Category', 'Electronics and Appliances', 'fa-mobile', '34495e', 2),
(3, 'Category', 'Computer and Technology', 'fa-laptop', '95a5a6', 3),
(4, 'Category', 'Clothing and Accessories', 'fa-shopping-bag', 'e67e22', 4),
(5, 'Category', 'Home and Furniture', 'fa-home', '1abc9c', 5),
(6, 'Category', 'Sports and Hobbies', 'fa-futbol-o', '3498db', 6),
(7, 'Category', 'Study and Learnings', 'fa-graduation-cap', 'f39c12', 7),
(8, 'Category', 'Real Estate and Properties', 'fa-building', 'd35400', 8),
(9, 'Category', 'Pets and Animals', 'fa-paw', '9b59b6', 9),
(10, 'Category', 'Jobs', 'fa-briefcase', '2ecc71', 10),
(11, 'Category', 'Services', 'fa-wrench', '7f8c8d', 11),
(12, 'Category', '', '', '9b59b6', 12),
(13, 'Sub_Category', 'Cars', 'fa-car', 'e74c3c', 1),
(14, 'Sub_Category', 'Bikes', 'fa-motorcycle', 'e74c3c', 1),
(15, 'Sub_Category', 'Commercial Vehicles', 'fa-taxi', 'e74c3c', 1),
(16, 'Sub_Category', 'Others Vehicles', 'fa-truck', 'e74c3c', 1),
(17, 'Sub_Category', 'Spare Parts', 'fa-wrench', 'e74c3c', 1),
(18, 'Sub_Category', 'Mobiles and Tablets', 'fa-mobile', '34495e', 2),
(19, 'Sub_Category', 'TVs', 'fa-tv', '34495e', 2),
(20, 'Sub_Category', 'Other Appliances', '', '34495e', 2),
(21, 'Sub_Category', 'Machinery', '', '34495e', 2),
(22, 'fill', '', '', '34495e', 2),
(32, 'Sub_Category', 'Cameras and Lenses', 'fa-camera', '34495e', 2),
(33, 'Sub_Category', 'Accessories', 'fa-plug', '34495e', 2),
(34, 'Sub_Category', 'Desktops', 'fa-desktop', '95a5a6', 3),
(35, 'Sub_Category', 'Laptops', 'fa-laptop', '95a5a6', 3),
(36, 'Sub_Category', 'Headphones', 'fa-headphones', '95a5a6', 3),
(37, 'Sub_Category', 'Gaming', 'fa-gamepad', '95a5a6', 3),
(38, 'Sub_Category', 'Accessories', 'fa-usb', '95a5a6', 3),
(39, 'Sub_Category', 'Men', 'fa-male', 'e67e22', 4),
(40, 'Sub_Category', 'Women', 'fa-female', 'e67e22', 4),
(41, 'Sub_Category', 'Kids', 'fa-child', 'e67e22', 4),
(42, 'Sub_Category', 'Bags', 'fa-shopping-bag', 'e67e22', 4),
(43, 'Sub_Category', 'Jewelery', 'fa-diamond', 'e67e22', 4),
(44, 'Sub_Category', 'Shoes', '', 'e67e22', 4),
(45, 'Sub_Category', 'Others', 'fa-shopping-cart ', 'e67e22', 4),
(46, 'Sub_Category', 'Furniture', 'fa-cubes', '1abc9c', 5),
(47, 'Sub_Category', 'Kitchen', 'fa-cutlery', '1abc9c', 5),
(48, 'Sub_Category', 'Bathroom', 'fa-bath', '1abc9c', 5),
(49, 'Sub_Category', 'Garden', 'fa-leaf', '1abc9c', 5),
(50, 'Sub_Category', '', '', '1abc9c', 5),
(51, 'fill', 'Books', 'fa-book', '3498db', 6),
(52, 'Sub_Category', 'Sports', 'fa-futbol-o', '3498db', 6),
(53, 'Sub_Category', 'Musical Instruments', 'fa-music', '3498db', 6),
(54, 'Sub_Category', 'Fitness', '', '3498db', 6),
(55, 'Sub_Category', 'Arts and Crafts', 'fa-paint-brush', '3498db', 6),
(56, 'Sub_Category', '', '', '3498db', 6),
(57, 'Sub_Category', 'Other Hobbies', 'fa-heart', '3498db', 6),
(58, 'Sub_Category', 'Books', 'fa-book', 'f39c12', 7),
(59, 'Sub_Category', 'Magazines', 'fa-newspaper-o', 'f39c12', 7),
(60, 'Sub_Category', 'Stationery', 'fa-pencil', 'f39c12', 7),
(61, 'Sub_Category', '', '', 'f39c12', 7),
(62, 'Sub_Category', '', '', 'f39c12', 7),
(63, 'Sub_Category', 'Houses', 'fa-home', 'd35400', 8),
(64, 'Sub_Category', 'Lands', 'fa-map-marker', 'd35400', 8),
(65, 'Sub_Category', 'Rooms and Spaces', '', 'd35400', 8),
(66, 'Sub_Category', 'Apartments and Flats', 'fa-building', 'd35400', 8),
(67, 'Sub_Category', 'Paying Guests & Room/Flatmates', 'fa-user', 'd35400', 8),
(68, 'Sub_Category', 'Dogs and Kennels', '', '9b59b6', 9),
(69, 'Sub_Category', 'Fishes and Aquariums', '', '9b59b6', 9),
(70, 'Sub_Category', 'Birds and Cages', '', '9b59b6', 9),
(71, 'Sub_Category', 'Other Pets', '', '9b59b6', 9),
(72, 'Sub_Category', 'Pet Accessories', '', '9b59b6', 9),
(73, 'Sub_Category', 'Pet Services', '', '9b59b6', 9),
(74, 'Sub_Category', '', '', '2ecc71', 10),
(75, 'Sub_Category', '', '', '2ecc71', 10),
(76, 'Sub_Category', '', '', '2ecc71', 10),
(77, 'Sub_Category', '', '', '2ecc71', 10),
(78, 'Sub_Category', '', '', '2ecc71', 10),
(79, 'Sub_Category', '', '', '2ecc71', 10),
(80, 'Sub_Category', '', '', '2ecc71', 10),
(81, 'Sub_Category', '', '', '2ecc71', 10),
(82, 'Sub_Category', '', '', '2ecc71', 10),
(83, 'Sub_Category', '', '', '2ecc71', 10),
(84, 'Sub_Category', 'Health and Beauty', 'fa-medkit', '7f8c8d', 11),
(85, 'Sub_Category', 'Education and Training', 'fa-university', '7f8c8d', 11),
(86, 'Sub_Category', 'Computers and Electronics', 'fa-television', '7f8c8d', 11),
(87, 'Sub_Category', 'Hotels and Travels', 'fa-bed', '7f8c8d', 11),
(88, 'Sub_Category', 'Automobile and Transport', 'fa-bus', '7f8c8d', 11),
(89, 'Sub_Category', 'Household Services', 'fa-home', '7f8c8d', 11),
(90, 'Sub_Category', 'Events and Programmes', 'fa-calendar', '7f8c8d', 11),
(91, 'Sub_Category', 'Other Services', 'fa-wrench', '7f8c8d', 11);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment`, `user_id`, `product_id`, `likes`, `date`, `status`) VALUES
(1, 'I loved it!!!<br />\r\nI want to buy it!<br />\r\n<br />\r\nCan we contact?', 1, 29, 0, '2017-09-02 11:32:10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `fav_id` int(11) NOT NULL,
  `favprod_id` int(11) NOT NULL,
  `favuser_id` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`fav_id`, `favprod_id`, `favuser_id`, `date`) VALUES
(14, 26, 1, '2017-08-26 12:04:44'),
(15, 25, 1, '2017-08-26 12:04:47'),
(16, 3, 1, '2017-08-26 12:04:50'),
(17, 2, 1, '2017-08-26 12:04:53'),
(18, 1, 1, '2017-08-26 12:04:56'),
(19, 33, 1, '2017-08-26 12:27:16'),
(20, 32, 1, '2017-08-26 12:27:20'),
(21, 31, 1, '2017-08-26 12:27:23'),
(22, 30, 1, '2017-08-26 12:27:26'),
(25, 27, 1, '2017-08-26 12:27:36'),
(27, 28, 1, '2017-09-09 10:24:46'),
(28, 29, 1, '2017-09-09 12:20:25');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `sender_id` int(11) NOT NULL,
  `reciever_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `message`, `sender_id`, `reciever_id`, `date`, `status`) VALUES
(1, 'Hi Bro<br />\r\n<br />\r\nHow is Life<br />\r\n<br />\r\nLong time no see<br />\r\n<br />\r\nCan we meet each other<br />\r\n<br />\r\nI want to talk to you about something', 2, 1, '2017-08-30 17:59:34', 1),
(2, 'Hi<br />\r\n<br />\r\nhow are you', 1, 2, '2017-09-01 20:06:58', 1),
(3, 'i am fine', 2, 1, '2017-09-01 20:11:40', 1),
(4, 'what about you?', 2, 1, '2017-09-01 20:28:19', 1),
(5, 'I am fine to!!!<br />\r\n<br />\r\nhave a nice day', 1, 2, '2017-09-09 20:38:05', 1),
(6, 'Good evening!', 2, 1, '2017-09-26 19:19:24', 1),
(7, 'Hi <br />\r\nGood Evening!', 1, 2, '2017-09-26 19:19:44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image` text NOT NULL,
  `image_thumb` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` varchar(15) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(32) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `product_condition` varchar(10) NOT NULL,
  `tags` varchar(1024) NOT NULL,
  `views` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `location` varchar(1024) NOT NULL,
  `company` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `user_id`, `image`, `image_thumb`, `title`, `price`, `description`, `category`, `phone`, `product_condition`, `tags`, `views`, `date`, `location`, `company`, `status`) VALUES
(1, 1, '1504181756.jpg', 'thumb1504181756.jpg', 'Macbook Pro 13&quot; with Retina display for SALE', '109900', 'Macbook Pro 13&quot; with Retina display for SALE', 'Computer and Technology', '9861444595', 'Brand New', 'macbook, macbook pro, 13 inches, sale, all', 106, '2017-08-25 10:23:05', 'Bagbazaar, Kathmandu', 'Apple', 1),
(2, 1, '1504181776.jpg', 'thumb1504181776.jpg', 'Red Cricket Ball with Sachin Tendulkar''s Autograph', '499', 'Red Cricket Ball with Sachin Tendulkar''s Autograph', 'Sports and Games', '9858021254', 'Brand New', 'cricket,ball,sachin,autograph,all', 37, '2017-08-25 18:12:08', 'New Baneshwor, Kathmandu', 'Vixen', 1),
(3, 1, '1504181789.jpg', 'thumb1504181789.jpg', 'A Beautiful Guitar!', '7800', 'A Beautiful Guitar!', 'Music and Movies', '9848030004', 'Just Used', 'beautiful,guitar,all', 72, '2017-08-25 18:20:33', 'Swayambhu, Kathmandu', 'Play King', 1),
(25, 1, '1504181800.jpg', 'thumb1504181800.jpg', 'The University Physics', '2000', 'The University Physics', 'Books and Magazines', '9861444595', 'Just Used', 'physics,book,all', 25, '2017-08-26 11:51:18', 'Kohalpur', 'Pearson', 1),
(26, 1, '1504181808.jpg', 'thumb1504181808.jpg', 'A Mountain Bike', '15999', 'A <br />\r\n<br />\r\nMountain<br />\r\n<br />\r\nBike <br />\r\n<br />\r\nis<br />\r\n<br />\r\nall<br />\r\n<br />\r\nthat<br />\r\n<br />\r\nyou<br />\r\n<br />\r\nneed<br />\r\n<br />\r\nto<br />\r\n<br />\r\nrock<br />\r\n<br />\r\nthose<br />\r\n<br />\r\ngirls.', 'Vehicles and Transport', '9861444595', 'Little Old', 'bike,all', 53, '2017-08-26 11:55:59', 'Nepalgunj', 'Shita', 1),
(27, 1, '1504181816.jpg', 'thumb1504181816.jpg', 'Think and Grow Rich', '1500', 'Think and Grow Rich', 'Books and Magazines', '9858021254', 'Brand New', 'book,all', 31, '2017-08-26 12:12:54', 'Kohalpur', 'Napoleon Hill', 1),
(28, 1, '1504181824.jpg', 'thumb1504181824.jpg', 'Samsung 105 inches 4K UHD TV for SALE', '789999', 'Lorem ipsum dolor sit amet, ad singulis inciderint pro? Qui consulatu tincidunt rationibus et, sea ea vocent erroribus elaboraret? Ne eos quot nihil vivendum. Cu meis utamur comprehensam est? Zril copiosae iudicabit usu ad? Ei case saepe necessitatibus pro, quo autem malis eu, at vis autem docendi consectetuer.<br />\r\n<br />\r\nUt novum primis qui, sit ea viderer moderatius. Vix quod soluta tamquam id, ei altera dignissim deseruisse pri? Timeam suscipiantur cu eos, eu habeo expetenda sed. Te pri luptatum honestatis temporibus, magna intellegam consectetuer eam ea. Nam ex mollis mediocrem, eu pri scaevola molestiae.<br />\r\n<br />\r\nQuo in vide meis soluta. Eum odio eligendi an! Putant probatus sed ea. Sed an clita lucilius legendos? Nec sententiae comprehensam id, has tota inimicus appellantur ne, docendi copiosae delicata ne vix? Option dissentias usu ei, diam imperdiet adolescens qui ei!<br />\r\n<br />\r\nCu qui velit oblique? Vix ei rebum laudem nostro, ut ceteros epicurei salutandi vis. Lorem nonumy eleifend cu mea! Purto everti denique sit cu, vel cu liber clita doming? Mea abhorreant necessitatibus cu, ad quis soluta eloquentiam eam.<br />\r\n<br />\r\nQui dolor virtute efficiantur eu, labore veritus definitionem at vim. Simul discere perpetua est et, dicat doctus conclusionemque qui ad, rationibus dissentiet in qui? Eos dicant virtute suscipit ne. Enim sonet voluptatibus pro ut, an scripta appetere philosophia eam, posse dolore mei cu!<br />\r\n<br />\r\nEx postea patrioque contentiones qui, ex aliquid luptatum indoctum per, cu accusata recusabo posidonium nec. Et per laudem salutatus. Id eam dignissim cotidieque, per ea utinam consulatu, eum an posse honestatis appellantur. His cu sale populo, liber erroribus ea qui, est suscipit adolescens interpretaris eu. Eu est meis ferri epicuri, elaboraret constituam vis ei, vitae scribentur quo ad. Ex eros augue delenit eam, ornatus facilisi sea no.', 'Electronics and Appliances', '9848030004', 'Brand New', 'samsung tv,sale,all', 130, '2017-08-26 12:15:06', 'Nepalgunj', 'Samsung', 1),
(29, 1, '1504181830.jpg', 'thumb1504181830.jpg', 'Beats by Dr. Dre for High Definition Music Experience', '35000', 'This Ear phone includes following Features :<br />\r\n1. Awesome Sound and Music.<br />\r\n2. High Definition Experience.<br />\r\n3. Stylish and good looking.<br />\r\n4. Satisfies your erupting EGO.<br />\r\n5. A handy tool for showing off.', 'Electronics and Appliances', '9861444595', 'Brand New', 'beats,headset,headphone,all', 91, '2017-08-26 12:17:51', 'New Baneshwor, Kathmandu', 'Dragon Music', 1),
(30, 1, '1504181856.jpg', 'thumb1504181856.jpg', 'A Binary Christmas Tree', '9850', 'A Binary Christmas Tree', 'Arts, Crafts and Designs', '9858021254', 'Just Used', 'binary,christmas,tree,all', 14, '2017-08-26 12:21:32', 'Bagbazaar, Kathmandu', 'Homemade', 1),
(31, 1, '1504181870.jpg', 'thumb1504181870.jpg', 'Adidas Large Sized School Bag', '2800', 'Adidas Large Sized School Bag', 'Clothing and Accessories', '9848001254', 'Little Old', 'school,bag,all', 37, '2017-08-26 12:23:10', 'Swayambhu, Kathmandu', 'Adidas', 1),
(32, 1, '1504407378.jpg', 'thumb1504407378.jpg', 'A Casio Calculator Black Color', '350', 'A Casio Calculator Black Color', 'Electronics and Appliances', '9848030004', '0', 'calculator,all', 98, '2017-08-26 12:24:32', 'Kohalpur, Banke', 'Casio', 1),
(33, 1, '1504181893.jpg', 'thumb1504181893.jpg', 'Zero to One by Peter Thiel and Blake Masters', '8500', 'Zero to One by Peter Thiel and Blake Masters', 'Books and Magazines', '9848001254', 'Too Old', 'book, all', 25, '2017-08-26 12:26:36', 'Baneshwor, Kathmandu', 'Learn More', 1),
(38, 1, '1504181907.jpg', 'thumb1504181907.jpg', 'A Powerful and Awesome Gaming PC', '300000', 'Lorem ipsum dolor sit amet, ad singulis inciderint pro? Qui consulatu tincidunt rationibus et, sea ea vocent erroribus elaboraret? Ne eos quot nihil vivendum. Cu meis utamur comprehensam est? Zril copiosae iudicabit usu ad? Ei case saepe necessitatibus pro, quo autem malis eu, at vis autem docendi consectetuer.<br />\r\n<br />\r\nUt novum primis qui, sit ea viderer moderatius. Vix quod soluta tamquam id, ei altera dignissim deseruisse pri? Timeam suscipiantur cu eos, eu habeo expetenda sed. Te pri luptatum honestatis temporibus, magna intellegam consectetuer eam ea. Nam ex mollis mediocrem, eu pri scaevola molestiae.<br />\r\n<br />\r\nQuo in vide meis soluta. Eum odio eligendi an! Putant probatus sed ea. Sed an clita lucilius legendos? Nec sententiae comprehensam id, has tota inimicus appellantur ne, docendi copiosae delicata ne vix? Option dissentias usu ei, diam imperdiet adolescens qui ei!<br />\r\n<br />\r\nCu qui velit oblique? Vix ei rebum laudem nostro, ut ceteros epicurei salutandi vis. Lorem nonumy eleifend cu mea! Purto everti denique sit cu, vel cu liber clita doming? Mea abhorreant necessitatibus cu, ad quis soluta eloquentiam eam.<br />\r\n<br />\r\nQui dolor virtute efficiantur eu, labore veritus definitionem at vim. Simul discere perpetua est et, dicat doctus conclusionemque qui ad, rationibus dissentiet in qui? Eos dicant virtute suscipit ne. Enim sonet voluptatibus pro ut, an scripta appetere philosophia eam, posse dolore mei cu!<br />\r\n<br />\r\nEx postea patrioque contentiones qui, ex aliquid luptatum indoctum per, cu accusata recusabo posidonium nec. Et per laudem salutatus. Id eam dignissim cotidieque, per ea utinam consulatu, eum an posse honestatis appellantur. His cu sale populo, liber erroribus ea qui, est suscipit adolescens interpretaris eu. Eu est meis ferri epicuri, elaboraret constituam vis ei, vitae scribentur quo ad. Ex eros augue delenit eam, ornatus facilisi sea no.', 'Computer and Technology', '9858021254', 'Brand New', 'powerful,awesome,gaming,pc,all', 11, '2017-08-31 06:58:29', 'Kohalpur, Banke', 'Dell', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `address` varchar(255) NOT NULL,
  `country` varchar(75) NOT NULL,
  `date_joined` datetime NOT NULL,
  `profile_image` text NOT NULL,
  `profession` varchar(255) NOT NULL,
  `profile_bio` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `user_ip` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `email`, `password`, `phone`, `address`, `country`, `date_joined`, `profile_image`, `profession`, `profile_bio`, `status`, `user_ip`) VALUES
(1, 'Aaditya', 'Bhusal', 'bhusal.001aditya@gmail.com', '79e117a2cc3cd7fd57bf793a26229ec0', '', 'Bagbazaar, Kathmandu, Nepal', '', '2017-08-25 10:21:01', '1503710885.png', 'Student', 'This is the Aaditya Bhusal''s Buorso Profile Page.<br />\r\n------------------------------------------------<br />\r\nYou can find all the ads posted by Aaditya here.', 1, 0),
(2, 'abcd', 'abcd', 'abcd@gmail.com', 'e8dc4081b13434b45189a720b77b6818', '', '', '', '2017-08-30 10:29:29', 'default.png', '', 'Hi! my name is abcd and I hope that you will buy my ads soon!!!!', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`fav_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);
ALTER TABLE `products` ADD FULLTEXT KEY `title` (`title`);
ALTER TABLE `products` ADD FULLTEXT KEY `description` (`description`);
ALTER TABLE `products` ADD FULLTEXT KEY `tags` (`tags`);
ALTER TABLE `products` ADD FULLTEXT KEY `category` (`category`);
ALTER TABLE `products` ADD FULLTEXT KEY `location` (`location`);
ALTER TABLE `products` ADD FULLTEXT KEY `company` (`company`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `fav_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
