-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: snuts
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.10-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL AUTO_INCREMENT,
  `OrderUserID` int(11) NOT NULL,
  `OrderAmount` float DEFAULT NULL,
  `OrderShipName` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `OrderShipAddress` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `OrderShipAddress2` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `OrderCity` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `OrderState` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `OrderZip` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `OrderCountry` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `OrderPhone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `OrderFax` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `OrderEmail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `OrderDate` datetime DEFAULT NULL,
  `OrderShipped` tinyint(1) DEFAULT NULL,
  `OrderTrackingNumber` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`OrderID`),
  KEY `fk_user_orders_idx` (`OrderUserID`),
  CONSTRAINT `fk_user_orders` FOREIGN KEY (`OrderUserID`) REFERENCES `users` (`UserID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productcategories`
--

DROP TABLE IF EXISTS `productcategories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productcategories` (
  `CategoryID` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`CategoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productcategories`
--

LOCK TABLES `productcategories` WRITE;
/*!40000 ALTER TABLE `productcategories` DISABLE KEYS */;
INSERT INTO `productcategories` VALUES (1,'Category 1'),(2,'Category 2'),(3,'Category 3');
/*!40000 ALTER TABLE `productcategories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `ProductID` int(12) NOT NULL AUTO_INCREMENT,
  `ProductSKU` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ProductName` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ProductPrice` float DEFAULT NULL,
  `ProductWeight` float DEFAULT NULL,
  `ProductCartDesc` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ProductShortDesc` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ProductLongDesc` text COLLATE utf8_unicode_ci,
  `ProductThumb` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ProductImage` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ProductCategoryID` int(11) DEFAULT NULL,
  `ProductUpdateDate` datetime DEFAULT NULL,
  `ProductStock` float DEFAULT NULL,
  `ProductLive` tinyint(1) DEFAULT NULL,
  `ProductUnlimited` tinyint(1) DEFAULT NULL,
  `ProductLocation` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ProductID`),
  UNIQUE KEY `ProductSKU_UNIQUE` (`ProductSKU`),
  KEY `fk_p_c_idx` (`ProductCategoryID`),
  CONSTRAINT `fk_p_c` FOREIGN KEY (`ProductCategoryID`) REFERENCES `productcategories` (`CategoryID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'SKU1','Product 1',100,500,'Cart Desc 1','Short Desc 1','Long Desc 1','/images/products-thumb/Dried Chestnuts.jpg','/images/products-thumb/Dried Chestnuts.jpg',1,NULL,10,NULL,NULL,NULL),(11,'SKU2','Product 1',100,500,'Cart Desc 1','Short Desc 1','Long Desc 1','/images/products-thumb/Dried Chestnuts.jpg','/images/products-thumb/Dried Chestnuts.jpg',1,NULL,10,NULL,NULL,NULL),(12,'SKU3','Product 1',100,500,'Cart Desc 1','Short Desc 1','Long Desc 1','/images/products-thumb/Dried Chestnuts.jpg','/images/products-thumb/Dried Chestnuts.jpg',1,NULL,10,NULL,NULL,NULL),(13,'SKU4','Product 1',100,500,'Cart Desc 1','Short Desc 1','Long Desc 1','/images/products-thumb/Dried Chestnuts.jpg','/images/products-thumb/Dried Chestnuts.jpg',1,NULL,10,NULL,NULL,NULL),(14,'SKU5','Product 1',100,500,'Cart Desc 1','Short Desc 1','Long Desc 1','/images/products-thumb/Dried Chestnuts.jpg','/images/products-thumb/Dried Chestnuts.jpg',1,NULL,10,NULL,NULL,NULL),(15,'SKU6','Product 1',100,500,'Cart Desc 1','Short Desc 1','Long Desc 1','/images/products-thumb/Dried Chestnuts.jpg','/images/products-thumb/Dried Chestnuts.jpg',1,NULL,10,NULL,NULL,NULL),(16,'SKU7','Product 1',100,500,'Cart Desc 1','Short Desc 1','Long Desc 1','/images/products-thumb/Dried Chestnuts.jpg','/images/products-thumb/Dried Chestnuts.jpg',1,NULL,10,NULL,NULL,NULL),(17,'SKU8','Product 1',100,500,'Cart Desc 1','Short Desc 1','Long Desc 1','/images/products-thumb/Dried Chestnuts.jpg','/images/products-thumb/Dried Chestnuts.jpg',1,NULL,10,NULL,NULL,NULL),(18,'SKU9','Product 1',100,500,'Cart Desc 1','Short Desc 1','Long Desc 1','/images/products-thumb/Dried Chestnuts.jpg','/images/products-thumb/Dried Chestnuts.jpg',1,NULL,10,NULL,NULL,NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `UserEmail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `UserPassword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `UserFirstName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `UserLastName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `UserCity` varchar(90) COLLATE utf8_unicode_ci DEFAULT NULL,
  `UserState` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `UserZip` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `UserEmailVerified` tinyint(1) DEFAULT NULL,
  `UserRegistrationDate` datetime DEFAULT NULL,
  `UserVerificationCode` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `UserIP` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `UserPhone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `UserFax` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `UserCountry` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `UserAddress` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `UserAddress2` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `UserEmail_UNIQUE` (`UserEmail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-29 22:33:27
