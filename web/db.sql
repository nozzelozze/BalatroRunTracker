-- MySQL dump 10.13  Distrib 8.0.40, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: kagg_noahfredholm
-- ------------------------------------------------------
-- Server version	8.0.40

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `CommentID` int NOT NULL AUTO_INCREMENT,
  `UserID` int DEFAULT NULL,
  `RunID` int DEFAULT NULL,
  `CreatedAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `Content` text,
  PRIMARY KEY (`CommentID`),
  KEY `fk_comments_userid` (`UserID`),
  KEY `fk_comments_runid` (`RunID`),
  CONSTRAINT `fk_comments_runid` FOREIGN KEY (`RunID`) REFERENCES `runs` (`RunID`) ON DELETE CASCADE,
  CONSTRAINT `fk_comments_userid` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=165 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (122,1,46,'2025-01-09 22:13:22','Amazing run with incredible focus!'),(123,2,47,'2025-01-09 22:13:22','Unbelievable marathon in Endless Mode!'),(124,3,48,'2025-01-09 22:13:22','Great try against The Hook!'),(125,4,49,'2025-01-09 22:13:22','Flawless execution in Perfect Run!'),(126,2,50,'2025-01-09 22:13:22','Tough challenge but well-played!'),(127,3,51,'2025-01-09 22:13:22','Smart decisions despite early exit!'),(128,1,52,'2025-01-09 22:13:22','Clever use of skips!'),(129,4,53,'2025-01-09 22:13:22','Unfortunate loss at the final hurdle!'),(130,3,54,'2025-01-09 22:13:22','Clutch play with a Straight Flush!'),(131,1,55,'2025-01-09 22:13:22','Aggressive strategy paid off!'),(132,2,56,'2025-01-09 22:13:22','Balanced playstyle worked well!'),(133,3,57,'2025-01-09 22:13:22','High risks can lead to big rewards!'),(134,4,58,'2025-01-09 22:13:22','Surged ahead in late-game!'),(135,2,59,'2025-01-09 22:13:22','Precise and calculated moves!'),(136,3,60,'2025-01-09 22:13:22','Almost made it past the Boss Blind!'),(137,1,46,'2025-01-09 22:13:22','Loved the focus in this run!'),(138,2,47,'2025-01-09 22:13:22','Amazing pace in Endless Mode!'),(139,3,48,'2025-01-09 22:13:22','The Hook is tough to beat!'),(140,4,49,'2025-01-09 22:13:22','Brilliant run from start to finish!'),(141,2,50,'2025-01-09 22:13:22','Boss Blind challenges are real!'),(142,3,51,'2025-01-09 22:13:22','Keep improving and trying!'),(143,1,52,'2025-01-09 22:13:22','Skipped wisely to win!'),(144,4,53,'2025-01-09 22:13:22','Next time, you’ll go further!'),(145,3,54,'2025-01-09 22:13:22','Straight Flush saved the day!'),(146,1,55,'2025-01-09 22:13:22','Impressive show of skill!'),(147,2,56,'2025-01-09 22:13:22','Great run with strong moves!'),(148,3,57,'2025-01-09 22:13:22','Risk-taking made it exciting!'),(149,4,58,'2025-01-09 22:13:22','A fantastic comeback in the end!'),(150,2,59,'2025-01-09 22:13:22','Careful planning shone through!'),(151,3,60,'2025-01-09 22:13:22','Near miss, but great effort!'),(152,1,46,'2025-01-09 22:13:22','Focus and determination stood out!'),(153,2,47,'2025-01-09 22:13:22','Endless Mode is no joke!'),(154,3,48,'2025-01-09 22:13:22','The Hook is a tricky opponent!'),(155,4,49,'2025-01-09 22:13:22','Flawless from start to finish!'),(156,2,50,'2025-01-09 22:13:22','Well done against the odds!'),(157,3,51,'2025-01-09 22:13:22','Never give up on early exits!'),(158,1,52,'2025-01-09 22:13:22','Smart skips led to victory!'),(159,4,53,'2025-01-09 22:13:22','You were so close to winning!'),(160,3,54,'2025-01-09 22:13:22','Straight Flush was clutch!'),(161,1,55,'2025-01-09 22:13:22','Aggression paid off well!'),(162,2,56,'2025-01-09 22:13:22','Balanced moves brought success!'),(163,3,57,'2025-01-09 22:13:22','High risk, high reward gameplay!'),(164,1,47,'2025-01-12 13:18:54','Test');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `follows`
--

DROP TABLE IF EXISTS `follows`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `follows` (
  `FollowerID` int NOT NULL,
  `FollowingID` int NOT NULL,
  PRIMARY KEY (`FollowerID`,`FollowingID`),
  KEY `FollowingID` (`FollowingID`),
  CONSTRAINT `follows_ibfk_1` FOREIGN KEY (`FollowerID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE,
  CONSTRAINT `follows_ibfk_2` FOREIGN KEY (`FollowingID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `follows`
--

LOCK TABLES `follows` WRITE;
/*!40000 ALTER TABLE `follows` DISABLE KEYS */;
INSERT INTO `follows` VALUES (2,1),(3,1),(4,2),(1,3),(4,3),(2,4);
/*!40000 ALTER TABLE `follows` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `runs`
--

DROP TABLE IF EXISTS `runs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `runs` (
  `RunID` int NOT NULL AUTO_INCREMENT,
  `UserID` int NOT NULL,
  `SubmittedAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `RunName` varchar(50) NOT NULL,
  `RunDescription` text NOT NULL,
  `BestHand` int NOT NULL,
  `MostPlayedHand` varchar(50) NOT NULL,
  `CardsPlayed` int NOT NULL,
  `CardsDiscarded` int NOT NULL,
  `CardsPurchased` int NOT NULL,
  `TimesRerolled` int NOT NULL,
  `Seed` varchar(50) NOT NULL,
  `Ante` int NOT NULL,
  `Round` int NOT NULL,
  `DefeatedBy` varchar(50) NOT NULL,
  PRIMARY KEY (`RunID`),
  KEY `UserID` (`UserID`),
  CONSTRAINT `runs_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `runs`
--

LOCK TABLES `runs` WRITE;
/*!40000 ALTER TABLE `runs` DISABLE KEYS */;
INSERT INTO `runs` VALUES (46,1,'2025-01-09 22:10:19','High Stakes Victory','Completed all 8 Antes with a focus on Flush hands.',50,'Flush',300,20,15,5,'SEED1A',8,24,'The Club'),(47,2,'2025-01-09 22:10:19','Endless Mode Marathon','Reached Ante 10 in Endless Mode, emphasizing Full Houses.',75,'Full House',450,30,25,10,'SEED2B',10,30,'The Wall'),(48,3,'2025-01-09 22:10:19','Quick Draw Defeat','Lost at Ante 5 due to The Hook Boss Blind effect.',30,'Straight',200,15,10,3,'SEED3C',5,15,'The Hook'),(49,4,'2025-01-09 22:10:19','Perfect Run','Achieved a flawless run up to Ante 8 without skipping any blinds.',60,'Four of a Kind',350,25,20,7,'SEED4D',8,24,'The Eye'),(50,2,'2025-01-09 22:10:19','Boss Blind Challenge','Struggled at Ante 7 against The Pillar Boss Blind.',55,'Straight Flush',400,22,18,6,'SEED5E',7,21,'The Pillar'),(51,3,'2025-01-09 22:10:19','Early Exit','Exited at Ante 3 due to insufficient chip count.',20,'Two Pair',150,10,8,2,'SEED6F',3,9,'The Eye'),(52,1,'2025-01-09 22:10:19','Strategic Skips','Skipped several Small and Big Blinds to acquire powerful tags.',45,'Three of a Kind',280,18,14,4,'SEED7G',6,18,'The Wall'),(53,4,'2025-01-09 22:10:19','Late Game Loss','Lost at Ante 9 while holding a Full House.',70,'Full House',390,25,20,8,'SEED8H',9,27,'The Hook'),(54,3,'2025-01-09 22:10:19','Clutch Victory','Barely won Ante 7 with a Straight Flush.',60,'Straight Flush',310,22,17,5,'SEED9I',7,21,'The Club'),(55,1,'2025-01-09 22:10:19','Aggressive Strategy','Focused heavily on offensive plays, defeated at Ante 6.',50,'Flush',250,20,15,6,'SEED0J',6,18,'The Eye'),(56,2,'2025-01-09 22:10:19','Balanced Play','Reached Ante 8 with a combination of defense and offense.',65,'Full House',370,23,19,7,'SEED1K',8,24,'The Pillar'),(57,4,'2025-01-09 22:10:19','Risky Decisions','Took high risks, losing at Ante 4.',35,'Two Pair',200,12,10,4,'SEED2L',4,12,'Chip Shortage'),(58,1,'2025-01-09 22:10:19','Late Bloom','Struggled early but surged ahead to Ante 10.',80,'Straight Flush',500,28,22,9,'SEED3M',10,30,'The Wall'),(59,2,'2025-01-09 22:10:19','Calculated Risks','Made precise plays, ending at Ante 7.',55,'Flush',320,18,16,5,'SEED4N',7,21,'The Hook'),(60,3,'2025-01-09 22:10:19','Near Miss','Almost cleared Ante 9 but lost to Boss Blind.',70,'Four of a Kind',400,26,20,8,'SEED5O',9,27,'The Eye');
/*!40000 ALTER TABLE `runs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `UserID` int NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `CreatedAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `IsAdmin` tinyint(1) DEFAULT '0',
  `ProfilePictureIndex` int NOT NULL DEFAULT '2',
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'NoahNoah','Passw','2024-12-11 23:15:41',1,0),(2,'BalatroLover389','securepass1','2025-01-09 22:06:44',0,1),(3,'nozzlan','securepass2','2025-01-09 22:06:44',0,2),(4,'NoahsAltKonto','securepass3','2025-01-09 22:06:44',0,1);
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

-- Dump completed on 2025-01-12 13:55:02
