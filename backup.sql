CREATE DATABASE  IF NOT EXISTS `penabad` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci */;
USE `penabad`;
-- MySQL dump 10.13  Distrib 5.5.24, for osx10.5 (i386)
--
-- Host: borndevelopments.com    Database: penabad
-- ------------------------------------------------------
-- Server version	5.1.54-log

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
-- Table structure for table `content`
--

DROP TABLE IF EXISTS `content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `img` varchar(250) COLLATE latin1_spanish_ci DEFAULT NULL,
  `information` varchar(600) COLLATE latin1_spanish_ci DEFAULT NULL,
  `title` varchar(145) COLLATE latin1_spanish_ci DEFAULT NULL,
  `type` varchar(45) COLLATE latin1_spanish_ci DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `content`
--

LOCK TABLES `content` WRITE;
/*!40000 ALTER TABLE `content` DISABLE KEYS */;
INSERT INTO `content` VALUES (6,'inspiration','1816646864_37.jpg',NULL,NULL,'img',11),(4,'inspiration','1782476223_29.jpg',NULL,NULL,'img',9),(5,'inspiration','611809620_33.jpg',NULL,NULL,'img',10),(8,'inspiration','1812200108_yH03V1hkrqiifbmfxLrKQ12zYHfZIG_LfTeFKzEMrKk.jpg',NULL,NULL,'img',26),(9,'inspiration','842509549_postcard.JPG',NULL,NULL,'img',23),(10,'inspiration','109739939_57.jpg',NULL,NULL,'img',16),(11,'inspiration','827766822_69.jpg',NULL,NULL,'img',17),(12,'inspiration','1096879063_IMG_8344_1.JPG',NULL,NULL,'img',21),(13,'inspiration','91282305_IMG_8432.JPG',NULL,NULL,'img',22),(14,'inspiration','1777707491_11.jpg',NULL,NULL,'img',5),(15,'inspiration','1145485372_10.jpg',NULL,NULL,'img',4),(16,'inspiration','1102825562_4.jpg',NULL,NULL,'img',3),(17,'inspiration','209029873_1.jpg',NULL,NULL,'img',0),(18,'inspiration','1167352167_2-(2).jpg',NULL,NULL,'img',1),(19,'inspiration','1572180317_3-(2).jpg',NULL,NULL,'img',2),(20,'inspiration','1017155209_16.jpg',NULL,NULL,'img',6),(21,'inspiration','470447879_23.jpg',NULL,NULL,'img',7),(22,'inspiration','1202151874_43.jpg',NULL,NULL,'img',12),(23,'inspiration','1247851314_51.jpg',NULL,NULL,'img',13),(24,'inspiration','344998492_53.jpg',NULL,NULL,'img',14),(25,'inspiration','934648280_55.jpg',NULL,NULL,'img',15),(26,'inspiration','459121395_75.jpg',NULL,NULL,'img',18),(27,'inspiration','118289956_77.jpg',NULL,NULL,'img',19),(28,'inspiration','230674070_78.jpg',NULL,NULL,'img',20),(32,'inspiration','1904550479_recycled-storage-house.jpg',NULL,NULL,'img',24),(30,'inspiration','1842065960_red-balloon.jpg',NULL,NULL,'img',25),(31,'inspiration','1436321788_26_res.jpg',NULL,NULL,'img',8);
/*!40000 ALTER TABLE `content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orden` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `project` int(11) DEFAULT NULL,
  `img` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery`
--

LOCK TABLES `gallery` WRITE;
/*!40000 ALTER TABLE `gallery` DISABLE KEYS */;
INSERT INTO `gallery` VALUES (4,'3',1,'529966056_imsa3.jpg'),(5,'4',1,'303898986_imsa4.jpg'),(6,'0',7,'1237915033_chabad-02.jpg'),(7,'3',7,'786098519_chabad-03.1.jpg'),(8,'1',7,'808044170_chabad-03.jpg'),(9,'2',7,'770963537_chabad-4.jpg'),(10,'1',2,'1876634130_poolhouse2.1.jpg'),(11,'0',2,'787708215_poolhouse2.jpg'),(13,'2',2,'1455289204_poolhouse4.jpg'),(14,'3',2,'2133677828_poolhouse5.jpg'),(18,'',14,'295430441_miami03_1.jpg'),(20,'',14,'1313329769_miami04.jpg'),(21,'0',13,'1820011297_barranquilla01_1.jpg'),(22,'2',13,'1288855346_barranquilla03_1.jpg'),(23,'1',13,'219816362_barranquilla03.jpg'),(24,'3',13,'3030513_barranquilla04.jpg'),(25,'4',13,'276262092_barranquilla05.jpg'),(26,'2',9,'1956301588_cape02_1.jpg'),(27,'0',9,'1346119945_cape02.jpg'),(28,'1',9,'175252802_cape03.jpg'),(29,'3',9,'1388517060_cape04.jpg'),(30,'4',9,'390760420_cape05.jpg'),(31,'',10,'283311226_bayshore02.jpg'),(32,'',10,'1174117198_bayshore03.jpg'),(36,'2',4,'1338765614_oak_04.jpg'),(37,'1',4,'758860589_oak_03.jpg'),(38,'4',4,'1149267091_oak_06.jpg'),(39,'3',4,'7509463_oak_05.jpg'),(40,'5',4,'210184454_oak_07.jpg'),(41,'0',4,'1489003102_oak_02.jpg'),(42,'2',5,'1933614021_sinagpore03.jpg'),(43,'1',5,'1514955771_sinagpore02.jpg'),(44,'0',5,'1805661758_sinagpore022.jpg'),(45,'',6,'522685101_yuca-02.jpg'),(46,'',6,'1831678291_yuca-03.jpg'),(47,'1',3,'1068635641_MDO-2_1.jpg'),(48,'0',3,'1798839959_MDO-02.jpg'),(49,'3',3,'1163613983_MDO-04.jpg'),(50,'2',3,'858574674_MDO-03.jpg'),(57,'1',1,'1103399413_imsa2.jpg'),(58,'0',8,'936656493_guadalupe02.jpg'),(59,'2',8,'873991957_guadalupe05.jpg'),(61,'1',8,'838176775_guadalupe03.jpg'),(62,'2',1,'1634648130_imsa2_1.jpg'),(65,'3',8,'1442819357_guadalupe04.jpg'),(67,NULL,17,'725097161_Captura de pantalla 2013-03-18 a la(s) 16.25.40.png'),(68,NULL,17,'1345215897_Captura de pantalla 2013-03-18 a la(s) 16.25.50.png'),(70,'3',11,'859642846_fellig-04.jpg'),(71,'1',11,'669267917_fellig-02.jpg'),(72,'2',11,'1240131710_fellig-03.jpg'),(74,'0',18,'1500651640_imsa1.2.jpg'),(75,'2',18,'261843788_imsa2_1.jpg'),(76,'3',18,'189241876_imsa4.jpg'),(77,'1',18,'1849155690_imsa2.jpg'),(79,'4',18,'714097214_imsa3.jpg');
/*!40000 ALTER TABLE `gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `intra_users`
--

DROP TABLE IF EXISTS `intra_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `intra_users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `password` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `intra_users`
--

LOCK TABLES `intra_users` WRITE;
/*!40000 ALTER TABLE `intra_users` DISABLE KEYS */;
INSERT INTO `intra_users` VALUES (1,'admin','948662c7529a4c8ad2712ff8710e935b85a79a44','',1),(11,'admin','c2e427b1ae91348ec06f9b3988c11669019d65a9','',1);
/*!40000 ALTER TABLE `intra_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `practice`
--

DROP TABLE IF EXISTS `practice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `practice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `practice`
--

LOCK TABLES `practice` WRITE;
/*!40000 ALTER TABLE `practice` DISABLE KEYS */;
INSERT INTO `practice` VALUES (0,'Commercial','comercial'),(1,'Institutional','institutional'),(2,'Residential','residential'),(3,'Urban Design','urban');
/*!40000 ALTER TABLE `practice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `description` varchar(9000) COLLATE utf8_spanish_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `practice` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `idpractice` int(11) NOT NULL,
  `orden` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project`
--

LOCK TABLES `project` WRITE;
/*!40000 ALTER TABLE `project` DISABLE KEYS */;
INSERT INTO `project` VALUES (2,'Pool Side','<p>Miami, Florida</p>\n\n<p>The building is designed to provide a variety of communal spaces for the tenants of two adjacent condominiums. The existing site, proposed for a much larger development, remains largely vacant and offers little built or natural context of interest. As a result, the building has been developed as a series of inward-focused, open air courtyards, each containing one of the primary programs for the building.</p>\n\n<p>The principal courtyard, with its pool and sun-drenched bathing terrace, is defined by an independent hall, gym and a series of &ldquo;thickened walls&rdquo; containing seating, outdoor showers, landscape etc.Covered outdoor walkways connect the principal courtyard with two secondary spaces- the basketball court and the children&rsquo;s garden. These outdoor rooms are clearly defined with distinct characteristics, designed to meet the particular needs of each intended use. Together this collection of spaces affords the occupants with a variety of spatial experiences and promote the seamless integration of interior and exterior space.</p>\n','poolhouse1.jpg','comercial',0,1),(3,'MDO','<p>Miami, Florida</p>\r\n\r\n<p>The MDO building is situated along southwest 84<sup>th</sup> Street, one lot south of Tamiami Trial.&nbsp; Its immediate context is defined by a myriad of strip shopping malls and speculative office buildings set hundreds of feet from the main road to accommodate expansive surface parking lots.&nbsp; The result is a cacophony of structures that is emblematic of Miami&rsquo;s suburban landscape.</p>\r\n\r\n<p>MDO reverses the typical urban patterns of the area by pressing the building close to the street and placing the surface parking lot along the rear of the property.&nbsp; Moreover, it sets itself in sharp contrast to its immediate neighbors by developing an architectural language of abstraction and restraint- where a few important elements, such as the recessed entry with its shop-front window, are set within large expanses of mute white walls that house nearly five thousand men&rsquo;s suits within.</p>\r\n\r\n<p>The main double-volume retail space is the central focus of the building.&nbsp; Its thickened walls are lined with stacked rows of merchandise and its ceiling is composed of modified pre-fabricated double tees.&nbsp; The heightened volume is an unexpected spatial experience flooded with natural light and in direct opposition to the cavernous, artificially-lit interiors, characteristic of the adjacent strip malls and office parks.</p>\r\n','MDO-01.jpg','comercial',0,2),(4,'Oak Plaza','<p>The district in which the infill project takes place is a unique, 18 block community located just north of downtown Miami.&nbsp; This neighborhood, long forgotten during the periods when suburban sprawl became the standard pattern of growth in the city, is now experiencing a dramatic urban renewal.&nbsp; The Renaissance of the district can be largely attributed to an enlightened developer and his dedication to creating a vibrant neighborhood for the city&rsquo;s design industry.&nbsp; His vision has included the commission of a masterplan, the development of a streetscape proposal, as well as the inclusion of public art projects.&nbsp; While the district has already attracted leading retailers it has yet to contain the elements necessary to create a vibrant neighborhood.&nbsp; Currently, the district is absent of public spaces which can serve to a sense of identity and a place of congregation for the community.</p>\r\n\r\n<p>Thus the desire for the infill project was to define a true center for the district by creating the first public space in the neighborhood.&nbsp; The project transformed an existing parking lot with an existing stand of mature white oaks, into a paved plaza lined by a thin retail building and an adjacent loggia.&nbsp; The walls of the buildings are clad in an undulating pattern of green and blue glass mosaic tiles that transform the ordinary masonry surfaces into a vibrant urban mural.</p>\r\n\r\n<p>Beyond the new plaza, the project creates a new street which allows pedestrians to bisect the length of the existing block.&nbsp; The street provides an unprecedented moment for collaboration.&nbsp; At the onset of the project, the developer hired two independent firms to design new retail buildings &nbsp;on either side of the street.&nbsp; Rather than working in isolation the offices chose to establish a dialogue in the belief that structuring similarities within the urban realm would create a more memorable street section in striking contrast to the immediate environment which often lacks urban continuity.</p>\r\n\r\n<p>Thus each of the buildings develop similar architectural elements which include:</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp; a repetitive bay system that organizes the covered colonnades at street level as well as the fenestration of the second floor</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp; -open loggias on the upper storey of the primary fa&ccedil;ade</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp; -a similar palette of materials including smooth white stucooed surfaces for the primary building elements and cement tiles in rich complementary hues for architectural details such as column capitals and inset panels</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp; A coherent lighting and streetscape design to enhance the visual unity of the street</p>\r\n\r\n<p>While relatively small in scale, the project offers lessons for the future building of a young city.&nbsp; In a place often defined by disrespectful, non-descript structures that seldom strive to create memorable street or public space, the project offers a distinct and coherent urban architecture illustrating our fundamental belief that architecture is first and foremost a civic art.</p>\r\n','oak_01.jpg','comercial',0,3),(5,'Singapore Entertainment Building','<p>Singapore, as in the case of many modern Asian cities, seems to attract and absorb models which have been generated elsewhere in an attempt to rebuild itself for the future.&nbsp; Oftentimes these models are employed unquestionably.&nbsp; In the case of Singapore, the implementation of foreign models has produced an urban scenario in which much of the existing colonial fabric has been systematically replaced by multitudes of high rise developments.&nbsp; Currently, one may even argue that there is no longer any real context in Singapore; it has been torn down, rebuilt, reinvented.&nbsp; This tabula rasa development strategy has created an artificial environment, devoid of scalar relationships where the coexistence of contrasting types (both in scale and in function) dominates.</p>\r\n\r\n<p>Set within this particular urban environment, the project seeks to rethink the notion of an entertainment district in Singapore and instead proposes a building for entertainment in which various functions of the district are internalized.&nbsp; The building is located at the exit of the MRT stop on the corner of two main roads- Rochor and Victoria.&nbsp; This location is strategic given the fact that most visitor arrive to the area by means of public transit.</p>\r\n\r\n<p>Essentially, the building is comprised of two elements- a large covered hall and a cube.&nbsp; The &ldquo;basilica-like&rdquo; hall attempts to &nbsp;address the question of how one may design a contemporary urban space in the tropics.&nbsp; On a pragmatic level, this space provides refuge from the intense tropical heat; but more importantly, it provides a place where locals as well as visitors can congregate.&nbsp; The cubic volume, set atop the covered hall, contains a variety of programs typically associated with entertainment.&nbsp; By night, the taut, scale less, glowing surface of the cube serves as an icon for the district as well as a billboard onto which ever-changing images can be projected.&nbsp; Through the imposition of a strong urban form, the building seeks to generate a sense of district with an instantly recognizable identity.</p>\r\n','sinagpore01.jpg','comercial',0,4),(6,'Yoca Bar','<p>The project called for the design of a sustainable, fast-food, health bar located along Brickell Avenue in Miami, Florida. The Bar serves two organic items, yucca bread and natural fruit drinks, meant to be purchased and easily eaten on the go.</p>\r\n\r\n<p>In keeping with the business philosophy of the company, the project utilizes only recyclable materials- predominantly locally reclaimed cypress wood- for the design of the shop. The interior is conceived as a continuous, undulating, wood surface that not only conceals existing mechanical systems but also accommodates the principal seating for the space.</p>\r\n\r\n<p>The wooden &ldquo;liner&rdquo; is set behind an existing, two-storey, glass facade and is designed to engage the passerby. The ceiling and walls of the space are slightly canted towards the rear; a perspectival manipulation meant to elongate the room and heighten the theatricality of the space by focusing the attention of the viewer on the serving window.</p>\r\n','yuca-01.jpg','comercial',0,5),(7,'Chabad of South Dade','\n\n<p>Miami, Florida</p>\n\n<p>The original Bryan Methodist Church in Coconut Grove was designed in 1925 by the renowned architectural firm of Kiehnel and Elliott. The project for the expansion of the original church seeks to recover Kiehnel and Elliot’s original intentions for the site.  These early architects envisioned the approach from Main Highway as the formal entrance to the property, from which the most important view of the building could be appreciated.  The original plans reveal the design of an outdoor lawn where the congregation would have gathered to hear William Jennings Bryan, a leading member of the community, deliver homilies from the outdoor pulpit attached to the existing building.  Today, this important forecourt has been replaced by a utilitarian parking lot, and thus the congregation has lost its most important outdoor gathering space.</p>\n\n<p>The new design is rooted in the long-standing tradition of ecclesiastical, courtyard complexes.  The design proposes a paved, stone court along Main Highway, flanked by two, one-storey, arcaded buildings.  The north wing contains administrative offices and a large, dining hall; and the south wing provides classrooms for religious teaching.  The new court will become the primary public space of the complex- providing an appropriate vantage point from where to view the existing main sanctuary. At the rear of the property, the design will incorporate a small Mikvah (a building for ritual bathing), and a new parking grove to replace the displaced lot currently located along Main Highway.</p>','chabad.jpg','institutional',1,0),(8,'Our Lady of Guadalupe','<p>Ecclesiastical architecture has traditionally contrasted interior and exterior with the intent of differentiating the sacred from the profane.  Thus churches tend to be hermetic, since difference is best cultivated behind impermeable and clearly demarcated boundaries.  For the design of the Church of Our Lady of Guadalupe in Fort Wayne, Indiana, we held on to the traditional contrast but also aimed for openness and continuity with the landscape.  We achieved this double goal by differentiating between phenomena rather than environments.  For instance, the exterior is visible from the nave but it is perceived and understood in ways particular to that perspective.  Once you step outside, the same features of that environment take on a different character, a new meaning.</p>\n\n<p>The cloister-type plan we have adopted for the project belongs to a rich history of architectural and monastic traditions that we find particularly relevant and readily hospitable to liturgical needs.  In a context of minimal building density, the courtyard provides physical enclosure, a sanctuary, and a sense of community.  Furthermore, the interconnectedness of facilities (physical and visual) and their disposition around a common space enhances flexibility in accommodating wide ranging events and numbers (i.e. the nave space overflows into the refectory, past operable glazed partitions, and could annex the courtyard if need be).</p>','guadalupe011.jpg','institutional',1,0),(9,'Cape Dutch House','<p>Coral Gables, Florida</p>\n\n<p>The Cape Dutch Village was one of a number of villages planned for the City of Coral Gables by developer George Merrick in the 1920s in order to add diversity to its predominantly Mediterranean Revival homes.  The assemblage of houses was designed by Marion Sims Wyeth and constructed by the American Building Corporation just prior to the hurricane of 1926.  The Village was patterned on the early farm houses of the Dutch colonists who settled in Cape Town, South Africa in the seventeenth century.  Four of the houses are clustered in a walled compound bounded by Maya Avenue on the east; and the fifth is a freestanding structure located on the corner of Maya Avenue and Le Jeune Road.</p>\n\n<p>The project involved the complete restoration of the historic house located at 6704 Le Jeune Road and included the design of a stoep- an elevated covered terrace, originally proposed along the rear façade of the house but never built, as well as the design of a new garden and outbuildings.</p>','cape01.jpg','residential',2,0),(10,'Coconut Grove House','<p>The project includes the restoration and addition to an existing Florida modern house located on a bay front lot in Coconut Grove, Florida.</p>\n\n<p>Built in 1955, the original house was composed of a two-storey volume set perpendicular to Biscayne Bay, with an attached one-storey wing, entry and detached carport pressed toward the street to define an irregularly-shaped interior courtyard.  The main living spaces were located at ground level with bedrooms and an office on the second floor.</p>\n\n<p>The new design reverses the existing sequence of spaces, placing the private rooms (i.e. bedrooms) at the ground level and relocating the principal stair to the front entry loggia.  The stair culminates in the main living room with a carefully choreographed view of Biscayne Bay.  This view, previously seen from a private corridor leading to the bedrooms, is now enjoyed as an integral part of the primary rooms of the house.  A new exterior stair, adjacent to the second floor terrace, celebrates the seamless connection between indoor and outdoor living and descends to a keystone-clad pool deck that physically terminates at the water’s edge.</p>','bayshore01.jpg','residential',2,0),(11,'Fellig House','<p> </p>The project involved the remodeling of an existing 1950s duplex located in Coral Gables, Florida.  Purchased by a single family, the owners wanted to transform the existing compartmentalized structure into an open plan capable of meeting the needs of their growing family.  To this end, the design reconfigures the existing building, capitalizing on the long-span truss system to open-up the upper floor and create a new living/dining space.  This room, flanked on one side by terraces that open to the garden and on the other by secondary program including a kitchen and bathroom, becomes the most important space of the new house.   ','fellig-house-01.jpg','residential',2,0),(13,'Barranquilla Public Spaces','<p>Globalization in our world is associated with the generic and the commonplace.  Uniformity has become a global epidemic and placelessness is now an integral part of our everyday lives.  The project for five, new, public spaces, located within Barranquilla, Colombia’s historic city center, is conceived otherwise, and returns to the profound lessons learned from the past (the not so distant past) where the city’s unique architectural and urban development was the result of a confluence between nature, building and local folklore. To this end, the project explores the potential to create spaces of cultural specificity where the colloquial and the vernacular participate in the composition and construction of the contemporary city.</p>\n\n<p>The project includes the redesign of the Plaza San Nicholas, the city’s emblematic public space; the Plaza San Roque defined by new program (largely a rectory serving the adjacent cathedral) that supports a large, hovering, roof which serves to protect the city’s inhabitants from the intense tropical heat; the Paseo de las Palmas with its broad canopy of native acacias and palms, the Plaza de las Palmas with its new cultural center and grandstand; the Plaza San Jose, and finally the Plaza del Hospital with its new school.</p>','barranquilla01.jpg','urban',3,0),(14,'Five Urban Projects for Miami','<p>While the forces that shape the modern city are both varied and complex,  in recent history economic/functional concerns have become the overriding generating forces of design.  This reality has provided an impoverished view of the city that has far too often produced redundant, homogenized urban landscapes.  In response to this seemingly bleak urban condition, the project sets out to develop a mode of investigation centered on a scenographic or visual understanding of the city.  Consequently, the project proposes to investigate a visual planning strategy that does not rely on the plan as a point of departure, but rather begins with an understanding of the city in elevation and perspective.  Moreover, the investigation is not concerned with an abstract two-dimensional understanding of the plan, but proceeds to elaborate and structure the plan based on visual and formal characteristics of existing conditions.</p>\n\n<p>This methodology is applied to the careful choreography of a series of sites located along Miami’s Biscayne Bay with the intent of presenting the viewer with a new image of the city.  The collection of projects seeks to reconstitute the relationship between the city and the sea, a connection that was understood at the founding of the city but has been largely ignored or privatized by current development trends.  We believe that the insertion of key projects at precise moments in the city will help to initiate a process of urban renewal and regeneration.  Dialectically, by establishing this series of seemingly unrelated sites in plan, the projects arrive at a redefinition of the city center.</p>','miami01.jpg','urban',3,0),(18,'IMSA','<p>Can a building change the culture of a company? Can the design of the physical environment impact the way in which we communicate? &nbsp;These are but a few of the questions that the project for the new IMSA headquarters analyzed and attempted to address.</p>\r\n\r\n<p>Currently, the company is housed in a series of detached structures situated on a large tract of agricultural land in southern Guatemala. &nbsp;This configuration reinforces a separation of departments and limits the individual employee&rsquo;s ability to understand his or her role within the company.</p>\r\n\r\n<p>In order to reverse this condition, the new building is designed with a large open room, capable of accommodating all&nbsp;employees.&nbsp;Flexible desk arrangements create a collaborative working environment that minimizes the current hierarchy, with directors seated in open desks alongside employees. &nbsp;The plan also provides for a variety of work spaces, including enclosed, semi-private meeting rooms, exterior courts, open terraces, archives and reading spaces that provide a variety of work environments (both interior and exterior) for productive individual and/or collaborative work.</p>\r\n\r\n<p>The overall form of the building is inspired by both vernacular and industrial building typologies seen throughout the Guatemalan countryside.</p>\r\n','imsa1.jpg','comercial',0,0);
/*!40000 ALTER TABLE `project` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-04-04 16:38:37
