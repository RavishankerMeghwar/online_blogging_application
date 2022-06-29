/*
SQLyog Ultimate v12.5.0 (64 bit)
MySQL - 10.4.24-MariaDB : Database - onlinebloggingapp
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`onlinebloggingapp` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `onlinebloggingapp`;

/*Table structure for table `blog` */

DROP TABLE IF EXISTS `blog`;

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `blog_title` text DEFAULT NULL,
  `post_per_page` int(11) DEFAULT NULL,
  `blog_background_image` text DEFAULT NULL,
  `blog_status` enum('Active','InActive') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` text DEFAULT NULL,
  PRIMARY KEY (`blog_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

/*Data for the table `blog` */

insert  into `blog`(`blog_id`,`user_id`,`blog_title`,`post_per_page`,`blog_background_image`,`blog_status`,`created_at`,`updated_at`) values 
(12,16,'Ravi Blog',5,'../blogs_images/6463politics.jpg','Active','2022-06-27 20:59:10','1656388750'),
(13,16,'Sport',4,'../blogs_images/2441crikect.jpg','Active','2022-06-27 20:59:14','1656388754');

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_title` varchar(100) DEFAULT NULL,
  `category_description` text DEFAULT NULL,
  `category_status` enum('Active','InActive') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

/*Data for the table `category` */

insert  into `category`(`category_id`,`category_title`,`category_description`,`category_status`,`created_at`,`updated_at`) values 
(16,'cricket','cricket news','Active','2022-06-27 20:59:04',1656388744),
(17,'Calture','calture news','Active','2022-06-27 20:59:46',NULL);

/*Table structure for table `post` */

DROP TABLE IF EXISTS `post`;

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) DEFAULT NULL,
  `post_title` varchar(200) NOT NULL,
  `post_summary` text NOT NULL,
  `post_description` longtext NOT NULL,
  `featured_image` text DEFAULT NULL,
  `post_status` enum('Active','InActive') DEFAULT NULL,
  `is_comment_allowed` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` text DEFAULT NULL,
  PRIMARY KEY (`post_id`),
  KEY `blog_id` (`blog_id`),
  CONSTRAINT `post_ibfk_1` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`blog_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4;

/*Data for the table `post` */

insert  into `post`(`post_id`,`blog_id`,`post_title`,`post_summary`,`post_description`,`featured_image`,`post_status`,`is_comment_allowed`,`created_at`,`updated_at`) values 
(55,12,'Post Ideas For Businesses In 2022','o help make this article more digestible, we have added an infographic containing each of the blog post ideas. You are welcome to save this infographic for future reference or even republish it on your own blog (if you do, please upload the image directly to your blog and add a credit link to this article). ','o help make this article more digestible, we have added an infographic containing each of the blog post ideas. You are welcome to save this infographic for future reference or even republish it on your own blog (if you do, please upload the image directly to your blog and add a credit link to this article). o help make this article more digestible, we have added an infographic containing each of the blog post ideas. You are welcome to save this infographic for future reference or even republish it on your own blog (if you do, please upload the image directly to your blog and add a credit link to this article). ','../posts_images/30088c1.jpg','Active',1,'2022-06-27 21:01:20',NULL),
(56,12,'Balti food — From Baltistan to Birmingham','A balti is lamb meat or a goat meat curry that is served in a pressed-steel wok which is typically known as balti bowl. Its name did not come from some cooking technique or some specific ingredient but it is said that its name came from the metal dish in which curry is served. It is cooked in ghee and not in oil and its meat is cooked off the bone.A balti is lamb meat or a goat meat curry that is served in a pressed-steel wok which is typically known as balti bowl. Its name did not come from some cooking technique or some specific ingredient but it is said that its name came from the metal dish in which curry is served. It is cooked in ghee and not in oil and its meat is cooked off the bone. ','A balti is lamb meat or a goat meat curry that is served in a pressed-steel wok which is typically known as balti bowl. Its name did not come from some cooking technique or some specific ingredient but it is said that its name came from the metal dish in which curry is served. It is cooked in ghee and not in oil and its meat is cooked off the bone.A balti is lamb meat or a goat meat curry that is served in a pressed-steel wok which is typically known as balti bowl. Its name did not come from some cooking technique or some specific ingredient but it is said that its name came from the metal dish in which curry is served. It is cooked in ghee and not in oil and its meat is cooked off the bone. A balti is lamb meat or a goat meat curry that is served in a pressed-steel wok which is typically known as balti bowl. Its name did not come from some cooking technique or some specific ingredient but it is said that its name came from the metal dish in which curry is served. It is cooked in ghee and not in oil and its meat is cooked off the bone.A balti is lamb meat or a goat meat curry that is served in a pressed-steel wok which is typically known as balti bowl. Its name did not come from some cooking technique or some specific ingredient but it is said that its name came from the metal dish in which curry is served. It is cooked in ghee and not in oil and its meat is cooked off the bone. ','../posts_images/35358Balti-food.jpg','Active',1,'2022-06-27 21:02:36',NULL),
(57,12,'Facebook is getting rid of some location-tracking features due to low usage','12Facebook says it will stop gathering data linked with these features on May 31st and will destroy all saved data on August 1st, according to a notification given to those who have previously used the service. The Facebook parent company Meta confirmed this news. However, this does not imply that Facebook will stop collecting location data entirely. According to Facebook’s statement to users, it will “continue collecting location information for other experiences” in order to offer relevant advertising and location check-ins in accordance with its data policy. ','12Facebook says it will stop gathering data linked with these features on May 31st and will destroy all saved data on August 1st, according to a notification given to those who have previously used the service. The Facebook parent company Meta confirmed this news. However, this does not imply that Facebook will stop collecting location data entirely. According to Facebook’s statement to users, it will “continue collecting location information for other experiences” in order to offer relevant advertising and location check-ins in accordance with its data policy. 12Facebook says it will stop gathering data linked with these features on May 31st and will destroy all saved data on August 1st, according to a notification given to those who have previously used the service. The Facebook parent company Meta confirmed this news. However, this does not imply that Facebook will stop collecting location data entirely. According to Facebook’s statement to users, it will “continue collecting location information for other experiences” in order to offer relevant advertising and location check-ins in accordance with its data policy. ','../posts_images/77415Facebook-location-450x270.jpg','Active',1,'2022-06-27 21:03:54',NULL),
(58,13,'KL Rahul will lead in T20Is with Umran Malik and Arshdeep Singh getting maiden call-ups','KL Rahul will lead in T20Is with Umran Malik and Arshdeep Singh getting maiden call-upsKL Rahul will lead in T20Is with Umran Malik and Arshdeep Singh getting maiden call-upsKL Rahul will lead in T20Is with Umran Malik and Arshdeep Singh getting maiden call-upsKL Rahul will lead in T20Is with Umran Malik and Arshdeep Singh getting maiden call-upsKL Rahul will lead in T20Is with Umran Malik and Arshdeep Singh getting maiden call-upsKL Rahul will lead in T20Is with Umran Malik and Arshdeep Singh getting maiden call-upsKL Rahul will lead in T20Is with Umran Malik and Arshdeep Singh getting maiden call-upsKL Rahul will lead in T20Is with Umran Malik and Arshdeep Singh getting maiden call-upsKL Rahul will lead in T20Is with Umran Malik and Arshdeep Singh getting maiden call-upsKL Rahul will lead in T20Is with Umran Malik and Arshdeep Singh getting maiden call-ups','KL Rahul will lead in T20Is with Umran Malik and Arshdeep Singh getting maiden call-upsKL Rahul will lead in T20Is with Umran Malik and Arshdeep Singh getting maiden call-upsKL Rahul will lead in T20Is with Umran Malik and Arshdeep Singh getting maiden call-upsKL Rahul will lead in T20Is with Umran Malik and Arshdeep Singh getting maiden call-upsKL Rahul will lead in T20Is with Umran Malik and Arshdeep Singh getting maiden call-upsKL Rahul will lead in T20Is with Umran Malik and Arshdeep Singh getting maiden call-upsKL Rahul will lead in T20Is with Umran Malik and Arshdeep Singh getting maiden call-upsKL Rahul will lead in T20Is with Umran Malik and Arshdeep Singh getting maiden call-upsKL Rahul will lead in T20Is with Umran Malik and Arshdeep Singh getting maiden call-upsKL Rahul will lead in T20Is with Umran Malik and Arshdeep Singh getting maiden call-upsKL Rahul will lead in T20Is with Umran Malik and Arshdeep Singh getting maiden call-upsKL Rahul will lead in T20Is with Umran Malik and Arshdeep Singh getting maiden call-upsKL Rahul will lead in T20Is with Umran Malik and Arshdeep Singh getting maiden call-upsKL Rahul will lead in T20Is with Umran Malik and Arshdeep Singh getting maiden call-upsKL Rahul will lead in T20Is with Umran Malik and Arshdeep Singh getting maiden call-upsKL Rahul will lead in T20Is with Umran Malik and Arshdeep Singh getting maiden call-upsKL Rahul will lead in T20Is with Umran Malik and Arshdeep Singh getting maiden call-upsKL Rahul will lead in T20Is with Umran Malik and Arshdeep Singh getting maiden call-ups','../posts_images/27487rajul.jpg','Active',1,'2022-06-27 21:05:58',NULL),
(59,12,'Sindhi Culture','Sindhi culture is practiced by the Sindhi people who are divided distributed among Pakistan, India and diaspora. Their centuries-old history has given them strong traditions, customs, folklore, distinct lifestyle and their own language called Sindhi. But, their civilization has witnessed many ups and downs and it got declined because of many natural disasters like floods and most importantly the Indo-Aryan attack collapsed the whole region. According to the history, British conquered Sindh in 1843 and till 1947, this province remained the part of British India and later became part of Pakistan. ','Sindhi culture is practiced by the Sindhi people who are divided distributed among Pakistan, India and diaspora. Their centuries-old history has given them strong traditions, customs, folklore, distinct lifestyle and their own language called Sindhi. But, their civilization has witnessed many ups and downs and it got declined because of many natural disasters like floods and most importantly the Indo-Aryan attack collapsed the whole region. According to the history, British conquered Sindh in 1843 and till 1947, this province remained the part of British India and later became part of Pakistan. Sindhi culture is practiced by the Sindhi people who are divided distributed among Pakistan, India and diaspora. Their centuries-old history has given them strong traditions, customs, folklore, distinct lifestyle and their own language called Sindhi. But, their civilization has witnessed many ups and downs and it got declined because of many natural disasters like floods and most importantly the Indo-Aryan attack collapsed the whole region. According to the history, British conquered Sindh in 1843 and till 1947, this province remained the part of British India and later became part of Pakistan. ','../posts_images/45616Sindhi-Culture.jpg','Active',1,'2022-06-27 21:07:03',NULL);

/*Table structure for table `post_atachment` */

DROP TABLE IF EXISTS `post_atachment`;

CREATE TABLE `post_atachment` (
  `post_atachment_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) DEFAULT NULL,
  `post_attachment_title` varchar(200) DEFAULT NULL,
  `post_attachment_path` text DEFAULT NULL,
  `is_active` enum('Active','InActive') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`post_atachment_id`),
  KEY `fk1` (`post_id`),
  CONSTRAINT `fk1` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=utf8mb4;

/*Data for the table `post_atachment` */

insert  into `post_atachment`(`post_atachment_id`,`post_id`,`post_attachment_title`,`post_attachment_path`,`is_active`,`created_at`,`updated_at`) values 
(133,55,'Image','../posts_images/107346_Economic-Crisis.jpg','Active','2022-06-27 21:01:20',NULL),
(134,55,'Image','../posts_images/49882_Facebook.jpg','Active','2022-06-27 21:01:20',NULL),
(135,56,'Image','../posts_images/109236_Balti-food.jpg','Active','2022-06-27 21:02:36',NULL),
(136,57,'Image','../posts_images/46840_Blog-Post.png','Active','2022-06-27 21:03:55',NULL),
(137,58,'Image','../posts_images/22022_rajul.jpg','Active','2022-06-27 21:05:58',NULL),
(138,59,'Image','../posts_images/13519_Sindhi-Culture.jpg','Active','2022-06-27 21:07:03',NULL);

/*Table structure for table `post_category` */

DROP TABLE IF EXISTS `post_category`;

CREATE TABLE `post_category` (
  `post_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`post_category_id`),
  KEY `post_id` (`post_id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `post_category_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `post_category_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=utf8mb4;

/*Data for the table `post_category` */

insert  into `post_category`(`post_category_id`,`post_id`,`category_id`,`created_at`,`updated_at`) values 
(133,55,17,'2022-06-27 21:01:20',NULL),
(134,56,17,'2022-06-27 21:02:36',NULL),
(135,57,17,'2022-06-27 21:03:55',NULL),
(136,58,16,'2022-06-27 21:05:58',NULL),
(137,59,17,'2022-06-27 21:07:03',NULL);

/*Table structure for table `role` */

DROP TABLE IF EXISTS `role`;

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_type` varchar(50) NOT NULL,
  `is_active` enum('Active','InActive') DEFAULT 'Active',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `role` */

insert  into `role`(`role_id`,`role_type`,`is_active`) values 
(1,'Admin','Active'),
(2,'User','Active');

/*Table structure for table `setting` */

DROP TABLE IF EXISTS `setting`;

CREATE TABLE `setting` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `setting_key` varchar(100) DEFAULT NULL,
  `setting_value` varchar(100) DEFAULT NULL,
  `setting_status` enum('Active','InActive') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`setting_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `setting_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=190 DEFAULT CHARSET=utf8mb4;

/*Data for the table `setting` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` text NOT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `user_image` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `is_approved` enum('Pending','Approved','Rejected') DEFAULT 'Pending',
  `is_active` enum('Active','InActive') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user` */

insert  into `user`(`user_id`,`role_id`,`first_name`,`last_name`,`email`,`password`,`gender`,`date_of_birth`,`user_image`,`address`,`is_approved`,`is_active`,`created_at`,`updated_at`) values 
(16,1,'Ravi','Shanker','csravi816@gmail.com','Rathore12!','Male','2022-06-22','../users_images/66317184profile Ravi.jpg','village Missri  Memon Taluka islamkot tharparkar','Approved','Active','2022-06-27 20:50:10',NULL),
(17,2,'Ravi','Rathore','ravi12@gmail.com','Ravi123@','Male','2022-06-20','../users_images/43710931-profile-WhatsApp Image 2021-03-07 at 5.40.09 AM.jpeg','tharparkar sindh ','Approved','Active','2022-06-27 21:13:09','1656389589');

/*Table structure for table `user_blog_following` */

DROP TABLE IF EXISTS `user_blog_following`;

CREATE TABLE `user_blog_following` (
  `follow_id` int(11) NOT NULL AUTO_INCREMENT,
  `follower_id` int(11) DEFAULT NULL,
  `blog_following_id` int(11) DEFAULT NULL,
  `status` enum('Followed','Unfollowed') DEFAULT 'Followed',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`follow_id`),
  KEY `blog_following_id` (`blog_following_id`),
  KEY `follower_id` (`follower_id`),
  CONSTRAINT `user_blog_following_ibfk_1` FOREIGN KEY (`blog_following_id`) REFERENCES `blog` (`blog_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_blog_following_ibfk_2` FOREIGN KEY (`follower_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user_blog_following` */

insert  into `user_blog_following`(`follow_id`,`follower_id`,`blog_following_id`,`status`,`created_at`,`updated_at`) values 
(37,17,13,'Followed','2022-06-27 21:14:31',NULL);

/*Table structure for table `user_feedback` */

DROP TABLE IF EXISTS `user_feedback`;

CREATE TABLE `user_feedback` (
  `feedback_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `feedback` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` text DEFAULT NULL,
  PRIMARY KEY (`feedback_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `user_feedback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user_feedback` */

/*Table structure for table `user_post_comment` */

DROP TABLE IF EXISTS `user_post_comment`;

CREATE TABLE `user_post_comment` (
  `post_comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment_description` text DEFAULT NULL,
  `is_active` enum('Active','InActive') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`post_comment_id`),
  KEY `user_id` (`user_id`),
  KEY `post_id` (`post_id`),
  CONSTRAINT `user_post_comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_post_comment_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user_post_comment` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
