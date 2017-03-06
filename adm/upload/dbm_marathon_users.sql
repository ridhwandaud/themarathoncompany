# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: dnoorparis.com (MySQL 5.5.42-cll)
# Database: dnoorpar_dbmarathon
# Generation Time: 2015-11-01 10:33:04 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table dbm_marathon_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `dbm_marathon_users`;

CREATE TABLE `dbm_marathon_users` (
  `f_id` int(10) NOT NULL AUTO_INCREMENT,
  `f_confirm_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `f_category` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `f_firstname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `f_lastname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `f_icno` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `f_gender` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `f_tshirt_size` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `f_bib` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `f_payment_balance` decimal(15,2) NOT NULL DEFAULT '0.00',
  `f_status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `f_created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `dbm_marathon_users` WRITE;
/*!40000 ALTER TABLE `dbm_marathon_users` DISABLE KEYS */;

INSERT INTO `dbm_marathon_users` (`f_id`, `f_confirm_id`, `f_category`, `f_firstname`, `f_lastname`, `f_icno`, `f_gender`, `f_tshirt_size`, `f_bib`, `f_payment_balance`, `f_status`, `f_created_time`)
VALUES
	(1,'4000123','5KM Womens Open','WAN FAIZURAH','WAN AHMAD','860924465140','female','3XL','WAN',0.50,'N','2015-11-01 18:29:26'),
	(2,'4000124','5KM Womens Open','ROSMANI ','MD YAMIN','760521035656','female','L','ROSE',0.50,'N','2015-11-01 18:29:26'),
	(3,'4000125','5KM Womens Open','SYAHIERAH ASHIKIN','BAHARUDDIN','900914065278','female','S','SYRA',0.50,'N','2015-11-01 18:29:26'),
	(4,'4000126','5KM Womens Open','DIANAH','ABDUL RAHMAN','861001125062','female','3XL','DIAN',0.50,'N','2015-11-01 18:29:26'),
	(5,'4000127','5KM Womens Open','FARIZA','ABDULLAH','820405115310','female','XL','FARIZA',0.50,'N','2015-11-01 18:29:26'),
	(6,'4000128','5KM Womens Open','LIZA','AMRAN','760906085066','female','3XL','LIZA',0.50,'N','2015-11-01 18:29:26'),
	(7,'4000129','5KM Womens Open','YASMIN','SHUKRI','860120715036','female','M','YASMINEX',0.50,'N','2015-11-01 18:29:26'),
	(8,'4000130','5KM Womens Open','ROZITA','MOHD KARIM','750815035304','female','2XL','IETA',0.50,'N','2015-11-01 18:29:26'),
	(9,'4000131','5KM Womens Open','NURDIAH','ALIAS','900119106026','female','2XL','DIYA',0.50,'N','2015-11-01 18:29:26'),
	(10,'4000132','5KM Womens Open','MAZNURATIQAH','MOHAMAD','901222045086','female','XL','ATYQAH',0.50,'N','2015-11-01 18:29:26'),
	(11,'4000133','5KM Womens Open','ZULFAHRINA','MOHAMED HAZRI','890224085662','female','M','ZU',0.50,'N','2015-11-01 18:29:26'),
	(12,'4000134','5KM Womens Open','NOOR WAFA SYAFIRA ','NASHARUDDIN','880421045556','female','3XL','WAFA',0.50,'N','2015-11-01 18:29:26'),
	(13,'4000135','5KM Womens Open','MELISSA','CHOY','920407145570','female','XS','MelissaCMS',0.50,'N','2015-11-01 18:29:26'),
	(14,'4000136','5KM Womens Open','SUZEN SUZANAH','MASRI JASNI','830708125494','female','M','Suzen Jasni',0.50,'N','2015-11-01 18:29:26'),
	(15,'4000137','5KM Mens Open','AIMAN','BASIR','861203915003','male','L','Ayman',2.00,'N','2015-11-01 18:29:26'),
	(16,'4000138','5KM Womens Open','FARAH SYAFIQAH','BUDIMAN RADI','920905146322','female','L','Farah Sweet',2.00,'N','2015-11-01 18:29:26'),
	(17,'4000139','5KM Womens Open','NUR RIZAEZUANTY','SABERI','840704146182','female','L','Ija',2.00,'N','2015-11-01 18:29:26'),
	(18,'4000140','10KM Womens Open','NAZIRA','TAHIR','871206085876','female','XS','Pacey',2.00,'N','2015-11-01 18:29:26'),
	(19,'4000141','10KM Womens Open','NUR FATIN SYAZWANI','BINTI ABU BAKAR','880917265472','female','M','FATIN SYAZWANI',2.00,'N','2015-11-01 18:29:26'),
	(20,'4000142','5KM Mens Open','MOHD HANNAFI','MOHD YUNOS','830313105405','male','XL','NAPIE',2.00,'N','2015-11-01 18:29:26'),
	(21,'4000143','5KM Womens Open','DIANA NATASHA','MD YUSOF','830201105312','female','M','Didi',2.00,'N','2015-11-01 18:29:26'),
	(22,'4000144','10KM Womens Open','AZIEZIAH','ABDUL RAHMAN','880616045310','female','S','ZIZIE',0.50,'N','2015-11-01 18:29:26'),
	(23,'4000145','5KM Womens Open','SHEAU HUEY','TOH','860729386340','female','S','Sheau Huey',0.50,'N','2015-11-01 18:29:26'),
	(24,'4000146','5KM Womens Open','AMUTHA','MANIAM','771029145752','female','L','Amu',0.50,'N','2015-11-01 18:29:26'),
	(25,'4000147','5KM Mens Open','ADAM','ARIFFIN','840111146283','male','2XL','ADAM KULIM',0.50,'N','2015-11-01 18:29:26'),
	(26,'4000148','5KM Mens Open','HO','TOONG LEONG','681011085211','male','M','KENNY HO',0.50,'N','2015-11-01 18:29:26'),
	(27,'4000149','5KM Womens Open','CHAU','LAI FUN','681125085690','female','S','TIFFANY CHAU',0.50,'N','2015-11-01 18:29:26'),
	(28,'4000150','5KM Womens Open','HO','ZHI CHING','941026146396','female','S','ZQING',0.50,'N','2015-11-01 18:29:26'),
	(29,'4000151','5KM Womens Open','HO','ZHI XUAN','980218565060','female','S','ZXUAN',0.50,'N','2015-11-01 18:29:26'),
	(30,'4000152','5KM Womens Open','NURUL ATIQAH','RASHID','910513035886','female','M','ATIQAH',0.50,'N','2015-11-01 18:29:26'),
	(31,'4000153','5KM Womens Open','NURUL ATIQAH','RASHID','910513035886','female','M','ATIQAH',0.50,'N','2015-11-01 18:29:26'),
	(32,'4000154','5KM Mens Open','JUN PING','LAI','951005106167','male','S','Jayson',0.50,'N','2015-11-01 18:29:26'),
	(33,'4000155','5KM Womens Open','NOR HAMIZAH','ROMAINOR','910112045194','female','S','Mimi',0.50,'N','2015-11-01 18:29:26'),
	(34,'4000156','5KM Womens Open','NORAMIRAH','ARSHAT','900505045436','female','M','MIRANORAH',0.50,'N','2015-11-01 18:29:26'),
	(35,'4000157','5KM Mens Open','SYAHRUL AMRI','MOHD ROSLI','860321465803','male','M','JOKER',0.50,'N','2015-11-01 18:29:26'),
	(36,'4000158','5KM Mens Open','MUHAMAD KHIDIR','ROSLEE','860430595391','male','M','ALONG',0.50,'N','2015-11-01 18:29:26'),
	(37,'4000159','5KM Mens Open','MOHD HELMY','ZULKIFLI','861222566363','male','L','R0ots',0.50,'N','2015-11-01 18:29:26'),
	(38,'4000160','5KM Mens Open','MUHAMMAD HAMIMI','MOHD SHOKRI','890415064023','male','S','HAMIMI',0.50,'N','2015-11-01 18:29:26'),
	(39,'4000161','5KM Womens Open','NUR HIDAYAH ','NOOR AZMAN','910821145622','female','M','DAYAH',0.50,'N','2015-11-01 18:29:26'),
	(40,'4000162','5KM Womens Open','SITI NURRAHAYU','MUSTAPAR KAMAR','921205025435','female','M','AYU',0.50,'N','2015-11-01 18:29:26'),
	(41,'4000163','5KM Womens Open','HAMIMAZIL','AB. RAHIM','790926055240','female','S','HAMIMAZIL',0.50,'N','2015-11-01 18:29:26'),
	(42,'4000164','5KM Womens Open','NOR HIDAYAH BINTI ABU BAKAR','NOR HIDAYAH','851122085424','female','S','IEDA',0.50,'N','2015-11-01 18:29:26'),
	(43,'4000165','5KM Womens Open','ANNELL','AISYAH','870420305100','female','M','ANNEll',0.50,'N','2015-11-01 18:29:26'),
	(44,'4000166','5KM Womens Open','SITI','NAJYAN','890114025394','female','L','NAJYAN',0.50,'N','2015-11-01 18:29:26'),
	(45,'4000167','5KM Womens Open','LIN CHOO','TAN','670422065086','female','XL','TAN LIN CHOO',0.50,'N','2015-11-01 18:29:26'),
	(46,'4000168','5KM Womens Open','SARAH, YI ERN','LOW','20522101238','female','L','SARAH LOW',0.50,'N','2015-11-01 18:29:26'),
	(47,'4000169','10KM Womens Open','HAFIZAHTUL \'AKLAA','MOHAMED SALLEH','880814495080','female','XL','Hafizahtul \'Aklaa',0.50,'N','2015-11-01 18:29:26'),
	(48,'4000170','5KM Womens Open','CHEE','WAN YING','940127145996','female','M','CWY',0.50,'N','2015-11-01 18:29:26'),
	(49,'4000171','5KM Mens Open','CHEE','CHUN HUEI','881214565035','male','M','CCF',0.50,'N','2015-11-01 18:29:26'),
	(50,'4000172','5KM Womens Open','NG','SOK PAN','760108105536','female','XS','SPNg',0.50,'N','2015-11-01 18:29:26'),
	(51,'4000173','5KM Womens Open','KATHERINE','LAI FOONG MEI','19791210086484','female','L','KATHERINE',0.50,'N','2015-11-01 18:29:26'),
	(52,'4000174','5KM Womens Open','VICKY CHONG','WEI KEE','840422085828','female','L','Vicky Chong',0.50,'N','2015-11-01 18:29:26'),
	(53,'4000175','5KM Womens Open','ROHAYU','RASHID','890820075196','female','M','Ayu',0.50,'N','2015-11-01 18:29:26'),
	(54,'4000176','10KM Mens Open','ASYRAN','ABD RAHMAN','910721025949','male','M','TELOI',0.50,'N','2015-11-01 18:29:26'),
	(55,'4000177','5KM Womens Open','YANG','LENG LENG','880326105426','female','XS','Amelia Yang',0.50,'N','2015-11-01 18:29:26'),
	(56,'4000178','5KM Womens Open','NOR KHALILAH','A. KARIM','890501075244','female','L','K-Lah',0.50,'N','2015-11-01 18:29:26'),
	(57,'4000179','5KM Womens Open','SITI NABILA','AHMAD','890923065126','female','M','Nabila',0.50,'N','2015-11-01 18:29:26'),
	(58,'4000180','5KM Womens Open','SITI NURZAITIE','HASNAN','890212025304','female','M','Zety',0.50,'N','2015-11-01 18:29:26'),
	(59,'4000181','5KM Mens Open','MOHAMMAD SYAIFULLAH','CHE GHANI','890409115485','male','S','Syaiful',0.50,'N','2015-11-01 18:29:26'),
	(60,'4000182','10KM Mens Open','MUHAMMAD','RAFIUDDIN','911222075655','male','S','Rafiuddin',0.50,'N','2015-11-01 18:29:26'),
	(61,'4000183','5KM Womens Open','JUNAINAH','JAZULI','781109145540','female','S','mieyakhie q',0.50,'N','2015-11-01 18:29:26'),
	(62,'4000184','5KM Womens Open','JUWARIYAH','JAZULI','860408436036','female','M','aries',0.50,'N','2015-11-01 18:29:26'),
	(63,'4000185','5KM Womens Open','NURNAJIHAH','MOHD ZAKI','890528075252','female','XL','Jiha',0.50,'N','2015-11-01 18:29:26'),
	(64,'4000186','5KM Mens Open','MOHD KHAIRUL AZMIZAN','SURATEMAN','800109015333','male','S','MIZAN',0.50,'N','2015-11-01 18:29:26'),
	(65,'4000187','5KM Mens Open','KAH HERNG','LEONG','921220105899','male','M','Kiddy',0.50,'N','2015-11-01 18:29:26'),
	(66,'4000188','5KM Womens Open','AI JUAN','CHEW','921010136208','female','S','Ai Juan',0.50,'N','2015-11-01 18:29:26'),
	(67,'4000189','5KM Womens Open','SAI KEN','CHIN','851002125110','female','S','JaneJane',0.50,'N','2015-11-01 18:29:26'),
	(68,'4000190','10KM Womens Open','NURDIANA','ADNAN','801212145624','female','L','Diana',0.50,'N','2015-11-01 18:29:26'),
	(69,'4000191','5KM Mens Open','HIZAMI','NOOR DIN','861029025661','male','L','GMIE',0.50,'N','2015-11-01 18:29:26'),
	(70,'4000192','5KM Mens Open','MUHAMMAD NASIRUDDIN','SHAARI','861021355383','male','L','NASIER',0.50,'N','2015-11-01 18:29:26'),
	(71,'4000193','5KM Mens Open','AMIR YUSRAN','ABD RAHMAN','830311085025','male','M','MER',0.50,'N','2015-11-01 18:29:26'),
	(72,'4000194','5KM Mens Open','IDZHAM','ABU BAKAR','870922105693','male','L','AM',0.50,'N','2015-11-01 18:29:26'),
	(73,'4000195','5KM Womens Open','NURUL NADIAH','MD AZAM','830527145410','female','S','NADYA',0.50,'N','2015-11-01 18:29:26'),
	(74,'4000196','5KM Mens Open','EU','YONGRI','960811105155','male','M','YonqRi',0.50,'N','2015-11-01 18:29:26'),
	(75,'4000197','5KM Womens Open','KEW','PEI YONG','990422105984','female','S','PeiYonq',0.50,'N','2015-11-01 18:29:26'),
	(76,'4000198','5KM Mens Open','ALIF ASYRAF','ZAIDA','900210146125','male','S','ALIF',3.00,'N','2015-11-01 18:29:26'),
	(77,'4000199','5KM Womens Open','SU','MEIWEI','224100482','female','S','MeiWei',3.00,'N','2015-11-01 18:29:26'),
	(78,'4000200','5KM Womens Open','KOH','LIN SHUANG','1204100818','female','S','Lin Shuang',3.00,'N','2015-11-01 18:29:26'),
	(79,'4000201','5KM Womens Open','LEE','SHU QI','9008101654','female','M','Shu Qi',3.00,'N','2015-11-01 18:29:26'),
	(80,'4000202','5KM Womens Open','NORMASRINA','OMAR','930717105784','female','L','Masrina',3.00,'N','2015-11-01 18:29:26'),
	(81,'4000203','5KM Womens Open','NABILAH','ABDUL RASHID','930813147028','female','L','Abey',3.00,'N','2015-11-01 18:29:26'),
	(82,'4000204','10KM Mens Open','HON KET','YAP','791019145765','male','L','Hon Ket',3.00,'N','2015-11-01 18:29:26'),
	(83,'4000205','10KM Womens Open','LICIA','LIM','830304045308','female','M','Licia',3.00,'N','2015-11-01 18:29:26'),
	(84,'4000206','5KM Womens Open','NADIYATUL FIRDAUS','MOHAMAD NAJIB','890608915004','female','M','Yaya',3.00,'N','2015-11-01 18:29:26'),
	(85,'4000207','5KM Mens Open','MUHAMMAD SYAHIR','AZMI','900915145675','male','M','Syah',3.00,'N','2015-11-01 18:29:26'),
	(86,'4000208','5KM Womens Open','NUR\'AIN','MHD AZMI','830205145004','female','M','Ain',3.00,'N','2015-11-01 18:29:26'),
	(87,'4000209','5KM Womens Open','NOORASYIKIN','MASRUR','810309145342','female','L','Eqin',3.00,'N','2015-11-01 18:29:26'),
	(88,'4000210','5KM Womens Open','ZURAIHA','CHE HASSAN','950808035994','female','S','Zu',3.00,'N','2015-11-01 18:29:26'),
	(89,'4000211','5KM Womens Open','LIM','SZE CHEN','921104106560','female','XL','Sze Chen',3.00,'N','2015-11-01 18:29:26'),
	(90,'4000212','5KM Womens Open','PHOON','ZI QING','920614086112','female','XS','phoon zi qing',3.00,'N','2015-11-01 18:29:26'),
	(91,'4000213','5KM Mens Open','PHOON','LER YI','961225085221','male','S','phoon ler yi',3.00,'N','2015-11-01 18:29:26'),
	(92,'4000214','5KM Womens Open','NAWAL','NORDIN','870910025530','female','L','NAWAL',3.00,'N','2015-11-01 18:29:26'),
	(93,'4000215','5KM Womens Open','VEN YEE','CHONG','910105145058','female','S','KIM',3.00,'N','2015-11-01 18:29:26'),
	(94,'4000216','5KM Womens Open','ANIS SURAYA','DAUD','870418145610','female','M','ANIS',0.50,'N','2015-11-01 18:29:26'),
	(95,'4000217','10KM Mens Open','MOHAMAD AZREEN','ROSLI','951224106271','male','S','Mohamad Azreen',0.50,'N','2015-11-01 18:29:26'),
	(96,'4000218','5KM Mens Open','FAIRUL AZRY B ABD AZIZ','ABD AZIZ','870313065091','male','M','FAIRUL AZRY',0.50,'N','2015-11-01 18:29:26'),
	(97,'4000219','5KM Mens Open','MUHAMMAD HAZIQ HAIKAL ','ABD KARIM','20521050213','male','S','HAZIQ HAIKAL',0.50,'N','2015-11-01 18:29:26'),
	(98,'4000220','10KM Mens Open','LEE','KOK SHUEN','950721106593','male','M','Mr.ET',0.50,'N','2015-11-01 18:29:26'),
	(99,'4000221','5KM Womens Open','SITI','AZWANEE','860609435160','female','M','AZWANEE',0.50,'N','2015-11-01 18:29:26'),
	(100,'4000222','10KM Womens Open','ROHANI','JABIT','720920075554','female','XL','Onie J',0.50,'N','2015-11-01 18:29:26'),
	(101,'4000223','5KM Womens Open','DALYANAWATI','DZULKAFFLI','810903085100','female','XL','Taty',0.50,'N','2015-11-01 18:29:26'),
	(102,'4000224','10KM Womens Open','FIDAH','SAKDON','801231145232','female','M','Fids',0.50,'N','2015-11-01 18:29:26'),
	(103,'4000225','10KM Mens Open','KHAIRIL ANUAR ','ISHAK','800302055169','male','L','Aril',0.50,'N','2015-11-01 18:29:26'),
	(104,'4000226','5KM Womens Open','NUR FAEIZAH','MAHAMAD','840901075520','female','S','Pae',0.50,'N','2015-11-01 18:29:26'),
	(105,'4000227','5KM Mens Open','MUZAFAR','MOKSIN','861014236087','male','XL','ProjekMN',0.50,'N','2015-11-01 18:29:26'),
	(106,'4000228','5KM Womens Open','NURHAYATI','NORDIN','861217436302','female','S','ProjekMN',0.50,'N','2015-11-01 18:29:26'),
	(107,'4000229','5KM Womens Open','IDA','KUSHAIRI','830116105668','female','S','IDAKU',0.50,'N','2015-11-01 18:29:26'),
	(108,'4000230','5KM Mens Open','MUHAMMAD','HAROON','880723236139','male','S','AMAD',0.50,'N','2015-11-01 18:29:26'),
	(109,'4000231','5KM Womens Open','NUR RIFHAN','BASIRUL HAPI','900324035618','female','S','RIFHAN',0.50,'N','2015-11-01 18:29:26'),
	(110,'4000232','5KM Womens Open','MADIHAH','NORMAN','901112105308','female','S','MADIHAH',0.50,'N','2015-11-01 18:29:26'),
	(111,'4000233','5KM Mens Open','MOHD AFARUL','IZHAR','820305045327','male','L','MCFARUL',0.50,'N','2015-11-01 18:29:26'),
	(112,'4000234','5KM Mens Open','ABDUL RASYID','BEDDU ALI','881105495293','male','L','RASYID',0.50,'N','2015-11-01 18:29:26'),
	(113,'4000235','5KM Womens Open','NOORSOFHIA','RAJA MAIDEEN','891202105110','female','M','sofhia',0.50,'N','2015-11-01 18:29:26'),
	(114,'4000236','5KM Womens Open','YEAN MOON','LIM','961107146580','female','S','Moon',0.50,'N','2015-11-01 18:29:26'),
	(115,'4000237','5KM Mens Open','KONG SENG','CHAN','920413145139','male','M','Henry',0.50,'N','2015-11-01 18:29:26'),
	(116,'4000238','5KM Mens Open','KYO','TAN','960713435097','male','M','Kyo Tan',0.50,'N','2015-11-01 18:29:26'),
	(117,'4000239','5KM Mens Open','BADRUL HISHAM','ZAINUDIN','780625105161','male','M','Badrul',0.50,'N','2015-11-01 18:29:26'),
	(118,'4000240','5KM Womens Open','ZURA SYAZLEENA','HAMIZAN','800901015838','female','S','Zuraster',0.50,'N','2015-11-01 18:29:26'),
	(119,'4000241','5KM Womens Open','NOORASHIKIN','SHAFII','870415465176','female','S','Shikin',0.50,'N','2015-11-01 18:29:26'),
	(120,'4000242','5KM Mens Open','SYAIFUL BAHRI','BUJANG','750911135209','male','XL','Syaiful',0.50,'N','2015-11-01 18:29:26'),
	(121,'4000243','5KM Womens Open','AFDZALIZA RATINI','ABDUL RAHMAN','790923025142','female','M','Bie',0.50,'N','2015-11-01 18:29:26'),
	(122,'4000244','5KM Womens Open','JIHAN WAHIDA ','HADZIRI @ UNI ','811104085838','female','XS','IEAN ',0.50,'N','2015-11-01 18:29:26'),
	(123,'4000245','5KM Womens Open','NOOR FAIZAH ','ABDUL SAMAD','730529105836','female','S','Fezza',0.50,'N','2015-11-01 18:29:26'),
	(124,'4000246','5KM Womens Open','NUR ILYANI ','ZAKARIA','821018075632','female','XL','Yani',0.50,'N','2015-11-01 18:29:26'),
	(125,'4000247','5KM Womens Open','SITI KHALILAH ','SAMSUDIN','910201035853','female','','Khalilah6',0.50,'N','2015-11-01 18:29:26'),
	(126,'4000248','5KM Womens Open','FATIN ZULAIKHA ','ROSLAN ','910919145786','female','S','Fatin',0.50,'N','2015-11-01 18:29:26'),
	(127,'4000249','5KM Mens Open','NORIDZWAN','NORDIN','781201055265','male','S','WAN',0.50,'N','2015-11-01 18:29:26'),
	(128,'4000250','10KM Womens Open','SWEE MUN','CHEONG','820913146252','female','M','ESTHER CHEONG',0.50,'N','2015-11-01 18:29:26'),
	(129,'4000251','5KM Mens Open','MOHD SHAFARIZAM','AHMAD ARSHAD','860520387457','male','M','YOPPA',0.50,'N','2015-11-01 18:29:26'),
	(130,'4000252','5KM Mens Open','TEE','GUAN SENG','890430105361','male','S','Tonny',0.50,'N','2015-11-01 18:29:26'),
	(131,'4000253','5KM Womens Open','SALIZA','SAMSUDIN','760725145664','female','L','DYZA DYUSZA',0.50,'N','2015-11-01 18:29:26'),
	(132,'4000254','5KM Womens Open','SAZILA ','SAMSUDIN','750811145784','female','XL','SAZZY',0.50,'N','2015-11-01 18:29:26'),
	(133,'4000255','5KM Mens Open','MUQRI AKIF','MOHD AZMAN','410100195','male','M','AKIF',0.50,'N','2015-11-01 18:29:26'),
	(134,'4000256','5KM Womens Open','IRDINA AQILAH','MOHD AZMAN','30404100620','female','M','AQILAH',0.50,'N','2015-11-01 18:29:26'),
	(135,'4000257','5KM Womens Open','DAMIA ASYIQAH','YUSZAMRI','20614100056','female','XS','MIA',0.50,'N','2015-11-01 18:29:26'),
	(136,'4000258','5KM Womens Open','CHEAH','SOO WAH','920816145096','female','XL','Soowah',0.50,'N','2015-11-01 18:29:26'),
	(137,'4000259','5KM Mens Open','JORDAN','TAN','851102136183','male','3XL','Jordan Tan',0.50,'N','2015-11-01 18:29:26'),
	(138,'4000260','10KM Mens Open','TE','KING SHENG','960619105083','male','S','KS',0.50,'N','2015-11-01 18:29:26'),
	(139,'4000261','10KM Mens Open','ANG','KHAI SING','990119105025','male','M','KhaiSing',0.50,'N','2015-11-01 18:29:26'),
	(140,'4000262','5KM Womens Open','SITI NOORBANI','ABDULLAH','840111015208','female','XL','bani',0.50,'N','2015-11-01 18:29:26'),
	(141,'4000263','5KM Womens Open','SHIN CHER','CHU','910627105926','female','XS','Samantha',0.50,'N','2015-11-01 18:29:26'),
	(142,'4000264','10KM Mens Open','TAN','YIT FEI','921215105341','male','XL','yit fei',0.50,'N','2015-11-01 18:29:26'),
	(143,'4000265','10KM Mens Open','CHEW','JIA LEH','930607106321','male','L','jia leh',0.50,'N','2015-11-01 18:29:26'),
	(144,'4000266','10KM Womens Open','KUA','CHIN CHIN','791128105412','female','L','karen ku',0.50,'N','2015-11-01 18:29:26'),
	(145,'4000267','10KM','NG','KOK LUN','791024105311','male','M','Kok Lun',0.50,'N','2015-11-01 18:29:26'),
	(146,'4000268','10KM','NG ','CHONG SHIAN ','920413106025','male','L','chong shian',0.50,'N','2015-11-01 18:29:26'),
	(147,'4000269','10KM','CHUA ','SOON JOO','910910105219','male','L','Dickson Chua',0.50,'N','2015-11-01 18:29:26'),
	(148,'4000270','10KM','TEE ','SHER TENG ','910708105776','female','S','sher teng',0.50,'N','2015-11-01 18:29:26'),
	(149,'4000271','10KM','ONG ','HON SENG','910924106335','male','M','hon seng',0.50,'N','2015-11-01 18:29:26'),
	(150,'4000272','10KM','TAN ','CHUAN CHIEN','910701115655','male','M','chuan chien',0.50,'N','2015-11-01 18:29:26'),
	(151,'4000273','10KM','LAU','ZHI SHEN','921101016279','male','M','zhi shen',0.50,'N','2015-11-01 18:29:26'),
	(152,'4000274','10KM','TAN','KIAN ONG','940403105721','male','XL','kian ong',0.50,'N','2015-11-01 18:29:26'),
	(153,'4000275','10KM','SIE ','PEI PEI','941216105202','female','S','pei pei',0.50,'N','2015-11-01 18:29:26'),
	(154,'4000276','10KM','LEE ','KUAN CHAO','941025105031','male','L','kuan chao',0.50,'N','2015-11-01 18:29:26'),
	(155,'4000277','10KM','TIU ','CHONG HENG ','940308105651','male','XL','chong heng ',0.50,'N','2015-11-01 18:29:26'),
	(156,'4000278','10KM','ANG ','BOON HOCK ','940101105283','male','L','boon hock',0.50,'N','2015-11-01 18:29:26'),
	(157,'4000279','10KM','GOH ','CHIN HONG','930822105065','male','M','chin hong',0.50,'N','2015-11-01 18:29:26'),
	(158,'4000280','10KM','CHONG ','CHEE HO ','931028105361','male','L','chee ho',0.50,'N','2015-11-01 18:29:26'),
	(159,'4000281','10KM','WONG ','KENT YAN','840617065405','male','L','kent yan ',0.50,'N','2015-11-01 18:29:26'),
	(160,'4000282','10KM','ANG ','HAN YU','990114108147','male','M','han yu ',0.50,'N','2015-11-01 18:29:26'),
	(161,'4000283','10KM','PUAH','YIN SEE','950628106396','female','M','yin see',0.50,'N','2015-11-01 18:29:26'),
	(162,'4000284','10KM Mens Open','LIM','BOON YONG','920716106073','male','M','durian king',0.50,'N','2015-11-01 18:29:26'),
	(163,'4000285','5KM Womens Open','AMANDA','CHIA','10402140700','female','S','Amanda Chia',0.50,'N','2015-11-01 18:29:26'),
	(164,'4000286','5KM Womens Open','CHANG','HUI KIE','10622140112','female','S','Chang Hui Kie',0.50,'N','2015-11-01 18:29:26'),
	(165,'4000287','10KM Mens Open','LEE','JIA CAI','930824105253','male','L','billy lee',0.50,'N','2015-11-01 18:29:26'),
	(166,'4000288','5KM Mens Open','MUHAMMAD FAHAMI','ABD KAHAR','890524145575','male','L','FAMI',0.50,'N','2015-11-01 18:29:26'),
	(167,'4000289','5KM Womens Open','NAWAL AMANI','ABDUL RASHID','890130145046','female','M','nawal',0.50,'N','2015-11-01 18:29:26'),
	(168,'4000290','5KM Mens Open','BAZLI','BAKAR','891015145379','male','L','bazli',0.50,'N','2015-11-01 18:29:26');

/*!40000 ALTER TABLE `dbm_marathon_users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
