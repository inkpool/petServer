-- MySQL dump 10.13  Distrib 5.5.40, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: p2pbeerich
-- ------------------------------------------------------
-- Server version	5.5.40-0ubuntu1

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
-- Table structure for table `my_feedbacks`
--

DROP TABLE IF EXISTS `my_feedbacks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `my_feedbacks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` text CHARACTER SET utf8 NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `extra` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `my_feedbacks`
--

LOCK TABLES `my_feedbacks` WRITE;
/*!40000 ALTER TABLE `my_feedbacks` DISABLE KEYS */;
INSERT INTO `my_feedbacks` VALUES (2,'帮助','测试','iphone5'),(3,'建议','asdsadsa','应用版本：1.1\n手机系统版本: 8.1\n手机型号: iPhone Simulator'),(4,'出错、帮助','xuxin123213123','应用版本：1.1\n手机系统版本: 8.1\n手机型号: iPhone Simulator'),(5,'建议、出错、帮助','dfgbfsghfdshfghfshfhs11111','应用版本：1.1\n手机系统版本: 8.1\n手机型号: iPhone Simulator'),(6,'建议、出错、帮助','dfgbfsghfdshfghfshfhs11111','应用版本：1.1\n手机系统版本: 8.1\n手机型号: iPhone Simulator'),(7,'0','0','0'),(8,'建议、出错','sfdsfds','应用版本：1.1\n手机系统版本: 8.1\n手机型号: iPhone Simulator'),(9,'建议、出错','测试一下','应用的版本号:1.0；系统:安卓；系统版本号：MI 3,4.4.4'),(10,'建议、出错','dsgbfgdf','应用版本：1.1\n手机系统版本: 8.1\n手机型号: iPhone Simulator'),(11,'建议','then','应用版本：1.1\n手机系统版本: 8.1\n手机型号: iPhone Simulator'),(12,'建议','then','应用版本：1.1\n手机系统版本: 8.1\n手机型号: iPhone Simulator'),(13,'建议','then','应用版本：1.1\n手机系统版本: 8.1\n手机型号: iPhone Simulator'),(14,'建议','then','应用版本：1.1\n手机系统版本: 8.1\n手机型号: iPhone Simulator'),(15,'建议','then','应用版本：1.1\n手机系统版本: 8.1\n手机型号: iPhone Simulator'),(16,'建议','then','应用版本：1.1\n手机系统版本: 8.1\n手机型号: iPhone Simulator'),(17,'建议','bcc','应用版本：1.1\n手机系统版本: 8.1\n手机型号: iPhone Simulator');
/*!40000 ALTER TABLE `my_feedbacks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `my_news`
--

DROP TABLE IF EXISTS `my_news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `my_news` (
  `index` int(11) NOT NULL AUTO_INCREMENT,
  `title` text CHARACTER SET utf8mb4 NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `add_time` int(11) NOT NULL,
  PRIMARY KEY (`index`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `my_news`
--

LOCK TABLES `my_news` WRITE;
/*!40000 ALTER TABLE `my_news` DISABLE KEYS */;
INSERT INTO `my_news` VALUES (1,'“羊毛党”盛行：P2P平台竞争下获客成本渐升','发布时间：2014-12-17 07:40:27 | 来源：每日经济新闻 \r\n摘要：“虽然知道可能会有(‘薅羊毛’的投资人)，但我们也没有太好的办法。”一位P2P平台人士表示。事实上，“羊毛党”存在的背后，与当前P2P行业的激烈竞争和资金争夺密切相关。在业内人士看来，随着P2P行业进入者的增加，行业竞争日趋激烈，P2P平台想要获得更多的用户和资金自然离不开推广，而随着平台的推广方式日趋多样化，P2P平台的获客成本也在不断增加。\r\n据记者了解，大多数搞优惠活动的P2P平台，或多或少会遇到一些“羊毛党”。比如红岭创投在今年“双十一”期间推出“注册送50元”的活动时，活动当天就新增注册用户超2万人，平台也意识到中间有一些“薅羊毛”的投资人，于是在活动进行不久后便修改规则，改为注册送10元，充值并投资送40元。\r\n对于“羊毛党”，大多数平台明明知道存在，但也没有好的办法应对，一些活动仍然会适时推出。\r\n“虽然知道可能会有(‘薅羊毛’的投资人)，但我们也没有太好的办法。”一位P2P平台人士表示。\r\n事实上，“羊毛党”存在的背后，与当前P2P行业的激烈竞争和资金争夺密切相关。在业内人士看来，随着P2P行业进入者的增加，行业竞争日趋激烈，P2P平台想要获得更多的用户和资金自然离不开推广，而随着平台的推广方式日趋多样化，P2P平台的获客成本也在不断增加。\r\n利用各种活动抢夺用户\r\n据了解，继各家电商密集参战“双十一”、“双十二”等活动之后，不少P2P平台也开始借助一些特殊时点推出各种优惠活动以吸引用户。\r\n今年“双十一”期间，红岭创投、拍拍贷等P2P平台都推出了相关活动，而在“双十二”期间，投哪网等平台推出了下载APP注册送体验金，你我贷则推出了推荐投资人送现金等活动。\r\nP2P平台的上述推广活动确实也取得了一定的成效。除恰逢节气推出的活动外，很多P2P平台也会在日常做一些优惠活动，以吸引新的投资者和维护老客户，其中新上线的平台各种优惠活动则相对更多。\r\n在前金所相关人士看来，由于行业竞争大，P2P平台为了吸引投资者，不得不推行一些活动，即使有一部分“羊毛党”，相关的活动也得继续做。\r\n另据记者了解，除了上述措施，不少P2P平台在一些论坛、展会上也显得非常积极和踊跃。如今年的深圳金博会，就吸引很多P2P平台参会;此外，平面广告、网络推广等方式，各家平台的使用率也很高。\r\n联金所COO刘哲表示，当前，P2P投资人总数大概只有70万左右，这个数量实在很低，P2P当前的市场渗透率很低，还需要大量宣传;而另一方面，目前的P2P平台大概有近2000家，僧多粥少，因此，还需要进行大规模的消费者教育和培育。\r\nP2P行业竞争激烈，行业洗牌在即。成交量对任何一家平台而言都十分重要，营销推广对成交量的提升有着积极意义。特别是中小平台，本身品牌知名度有限，产品竞争力一般，只能通过百度竞价、线下广告投放等方式推广自己的网站。一位平台负责人对记者表示。\r\n成本高企不利平台发展\r\nP2P平台在推广上的大力投入，必然伴随着平台的成本增加。\r\n多位P2P平台人士表示，以被很多平台采用的百度推广为例，目前，P2P平台在百度这块比较多的是百度竞价、品牌专区和官网认证。竞价就是大家熟知的关键字搜索，百度会按照关键字的点击量计费，一般平台在这一块上的投入至少是每天两三千元，有的可能更多，仅这一项，一个平台一月的费用就是几万到几十万元。\r\n此外，很多P2P平台还会与第三方网站合作，在第三方平台投放广告。这些网站上的广告费用，每月从几万到十多万元不等;而软文也是很多平台经常采用的推广方式，这方面的费用一般也是每月几千元。\r\n记者了解到，相关金融展览会也是P2P平台愿意选择的推广方式，而具体参展费用一家平台一般在20万~30万元之间。\r\n有P2P平台人士表示，粗略计算，一些P2P平台在推广上面的投入，少的一年也在几十万到几百万元之间，有的甚至可能达到上千万元。\r\n很显然，不断增加的推广费用也推高了P2P平台的获客成本。目前，中小型平台获得一位新增注册用户的费用一般在10~100元之间，但转化率并不高。\r\n一位P2P平台人士表示，对于新兴(中小)平台而言，获取一个注册用户的成本大概是60元~80元，转化率约为10%，按此计算，一位有效客户的获客成本在600元~800元之间。\r\n而高昂的获客成本也不利于P2P平台的健康发展，业内人士认为，这种模式其实是无奈之举，也是不可持续的。因为当前P2P平台的利润十分微薄，亏损的平台不在少数，花太多资金推广成本高昂，但不做推广又无其他更好的获客渠道。\r\n一位行业分析师在点评P2P平台“双十一”、“双十二”参与情况时表示，“从双十一和双十二的成交额来看，数字相当接近，打造P2P网贷理财节已成为P2P网贷平台的一致目标。通过频繁的营销体验活动，虽然可以让P2P平台做大，但很难保证平台走得更远。在人工造节的喧嚣之后，如何找到稳健的发展模式，是平台方需要思考的问题。”\r\n刘哲也认为，要解决烧钱推广，根本在于P2P平台必须创新经营，重点在商业模式创新和产业链拓展上下功夫，不断推出有竞争力的产品。只有这样，口碑效应、品牌效应才会逐步发挥作用。',1418910327),(2,'安徽P2P平台德众金融融资超2亿 面向小微企业','发布时间：2014-12-08 09:55:03 | 来源：安徽日报 |\r\n\r\n摘要：德众金融是由安徽省供销社下属的新力投资发起成立的金融信息P2P平台，作为安徽省首家省级国资背景的P2P网贷平台，德众金融上线不足半年，融资额就破2亿元大关，一跃成为目前安徽省规模最大的P2P网贷平台。\r\n6月6日正式上线运营，7月融资额2000万元，9月就突破亿元大关，11月22日融资额突破2亿元、余额破1.73亿元⋯⋯作为安徽省首家省级国资背景的P2P网贷平台，德众金融上线不足半年，融资额就破2亿元大关，一跃成为目前安徽省规模最大的P2P网贷平台。\r\n德众金融是由安徽省供销社下属的新力投资发起成立的金融信息P2P平台。据介绍，P2P作为传统金融机构的有效补充，在服务实体经济发展和个人理财投资上，特别是帮助中小微企业解燃眉之急的作用正日益显现。截至目前，德众金融上线的80多个融资项目中，借款方基本是中小微企业，主要在技术改造、购买原材料、增添设备、规模扩张等方面具有旺盛的融资需求。\r\n“目前融资主要考虑中小微企业，尤其是省内中小微企业以及个人消费类的贷款需求。 ”德众金融负责人许圣明表示，公司通过线上融资帮助企业解决资金周转问题。据了解，德众金融选择国有担保公司或拥有国有背景的公司进行全额本息担保，同时实行第三方资金托管，以避免平台因为经营不善导致挪用交易资金而给交易双方带来风险。目前，该平台推出的80多个项目，其中有13个项目已到期，据说已为投资人带来了近300万元的收益，所有项目预期总收益在1200万元左右。',1418910329),(3,'星星之火可否燎原？当魔力大数据遇见征信','相信在十年前，不，甚至可以缩短到3年前，没有人能想到自己登陆QQ、浏览网页的行为可以影响到今天能否获得一笔资金。如果这笔资金用来解燃眉之急，你会感恩或痛恨曾经的一些行动。\r\n在这一系列动作里关乎两个关键词：数据和信用。\r\n近日，微众银行为已经被互联网金融烧得火热的大数据产业再添了一把火。虽然有燎原之势，但是这个火苗还只是星星之火。\r\n大数据魔力是什么?\r\n虽然是虽然是星星之火，但是不可否认其燎原之势。人类想通过数据探索另一个人的形态的愿望从未停止，相面、星座、血型、算命在某种程度上都是数据运用的一个侧面。\r\n大数据之火愈演愈烈，到底是离金融更近的交易数据更有用还是人们有意无意留下的行为数据更有用，成为新的争论焦点。\r\n在数据工程师眼里，交易数据是否比行为数据更有效尚没有定论。“基于某个事件打造一套模型，将与其相关尽量多的数据特征(feature)尽量往模型里‘扔’，相关度大则为有用，相关度小则数据弃用。”王立表示，认为与金钱相关的交易数据比行为数据更有用是一种误区。\r\n“行为数据的活性和能够封装的属性远远大于资产数据。”某科技有限公司CEO表示，未来金融盈利不再来源于其资产属性，而是来自于消费属性。\r\n利用包含用户拥有几部车、几间房、存款多少等静态数据的主体金融盈利方式不复存在。互联网金融形态早期解决的是去媒介化问题。而回到常受传统金融挑战的互联网金融如何盈利的问题，更多是基于消费行为，尤其是金融消费行为。\r\n“金融消费行为拥有强周期性，这种趋势在P2P中已经显现。呈现于早期的投资人和借款人分别位于东南沿海和中西部三四线城市的界限已经逐渐模糊，借款人和贷款人身份越发多元化，也出现了自身消费周期的转化。”某专业人士表示，以月光族为例，月初发工资时，是借款人，到月末则转化为债务人。“如何将如此短期周期的金融行为转化成金融产品就要在消费行为中体现。”\r\n深化行为数据并非互联网金融的专利，在主体金融当中也存在大量的行为数据，由于未善加利用，而成为了“沉睡的数据”。例如一张普通的信用卡电子账单，曾经是利用消费金额来判断该持卡人是VIP用户还是普通用户，但现在可以基于语义分析其中的消费类别，对大量用户做更细非的刻画。可以发现经常去沃尔玛消费就是一个家庭主妇，去星巴克消费多为外企白领，而去Babyface就是新新人类。\r\n魔力大数据有哪些?\r\n在过去的一年，京东布局金融战略的同时，推出了利用用户在京东电商的交易数据予以授信，推出类信用卡产品“京东白条”。京东金融副总裁姚乃胜表示，京东白条作为一个消费产品，嵌入整个金融生态体系之中，其信用风控模型是基于互联网零售电商数据，包括电话、地址、零售等数据。\r\n“白条作为互联网金融消费产品，分成地上和地下两个部分。地下有厚数据概念，包括电商和传统金融数据，在地上使互联网金融产品变得极为简单和方便。”姚乃胜说。\r\n在数据的使用过程中，京东白条和阿里推出的花呗直接针对用户的金融消费痛点，是典型的金融产品。除此之外，随着P2P等互联网金融形态风起，数据越来越多应用于风控及征信。\r\n日前，某信息技术有限公司分析和业务咨询总监在金融极客汇的闭门会议上表示，FICO的大数据评分模型，数据来源共分为支付平台、网上商城、共享数据等多个维度，其中，支付平台进一步分为支付类活动数据、非支付类活动数据、负面记录数据、身份识别数据;网上商城进一步分为消费者反馈/商户信用评分、商户售卖物品统计、争议和投诉、消费者网购;共享数据分为商户基本信息和个人基本信息。\r\n举例来说，应用于个人的身份识别数据包含IP、住址、电子邮箱、银行账户。而应用于小微企业评分的商户售卖物品统计数据包含总货值、新进添加货值、平均售卖时间和商品价格等。\r\n风控手段中，数据更是具有超出想象的魔力，但是魔法会因外界因素而出现失效。“移动端的分辨率，甚至浏览器窗口默认的分辨率百度都在用。”百度百付宝风控经理赵翔宇表示，包括同运营商沟通获取的基站信息以及百度正在操作的基于LBS(基于位置服务)的信息百度都在应用。“所有能够从某一维度或某些侧面体现出账户历史行为特征的数据，都会成为默认变量之一。”业内人士说。\r\n但是，这些变量，也存在被挑战的可能性。“我们发现，不断有欺诈分子在测试这些变量。”\r\n数据魔力几何?\r\n一位卡车司机首笔3.5万元贷款，这一点击回车的行动调动了人们极大的想象空间，对于这笔贷款背后所代表的大数据理念以及大数据思维，再度撩拨了互联网金融的一池春水。\r\n但是这池春水究竟春色几何，尚有待观察。记者多方求证，获知该笔贷款的计算处理技术并非当前“火热”的大数据技术，而是传统授信模型的产物，这种模型在国内使用过程中，尚面临数据不全以及数据造假等干扰。\r\n一位BAT资深业内人士判断，5万元以下的借款额度对于借款者的数据信用分析更多集中于“验真”之上。“给借款者授信额度是一个鉴别该借款者真假的过程。”上述业内人士表示，当确定该社会人士并非虚假之后，给予其额度是3万元还是3.5万元，抑或是4万元差别并不大。\r\n“腾讯拥有了SNS类社交数据，对于验真有了质的飞跃。以微信为例，虽然你在微信的账户是虚拟名字，但是你周围的朋友一定有将你的微信名备注的情况。个人真实身份获得并非难事。”该业内人士说。\r\n与腾讯始终站在PK擂台上的阿里巴巴，在数据上几番出手，蚂蚁金服、芝麻征信、阿里小贷，动作频频。与阿里的电商交易数据、支付数据、商品物流数据等使用有更多不同，腾讯的社交数据意味更浓。\r\n某数据行业公司高层表示，目前BAT对于数据应用各不相同，蚂蚁金服更多集中于支付宝数据，淘宝、天猫数据辅助功能。\r\n一位阿里内部人士对记者表示，目前阿里小贷给予电商商户的贷款基础为其冻结在支付宝的买家货款，主要体现为支付宝的数据，同时并不排除使用了来自淘宝、天猫的交易数据。\r\n阿里巴巴集团广告技术部技术总监王立表示，目前大数据技术运用较为成熟的领域仍是广告技术，比如搜索广告技术、定性广告技术、推荐广告技术、RTB技术等。以推荐技术为例，通过买家海量的点击、收藏、购买行为数据，找出具有高度关联性的商品类目，当买家购买了一种商品时，为其推荐这种商品的高度关联性商品，如为买鼠标的买家推荐鼠标垫，为买登山鞋的用户推荐拐杖。\r\n目前，阿里的主要收入来自电商广告，而腾讯微信的收入主要来自游戏广告和分成。目前，大数据技术尚没有第二个成熟的应用领域。“虽然逻辑相同可以套用，但是否能有令人炫目的商业效果还需观察。”王立说。',1421137315);
/*!40000 ALTER TABLE `my_news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `my_products`
--

DROP TABLE IF EXISTS `my_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `my_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productName` text CHARACTER SET utf8 NOT NULL,
  `platform` text CHARACTER SET utf8 NOT NULL,
  `duration` int(11) NOT NULL DEFAULT '0',
  `minRate` float NOT NULL,
  `maxRate` float NOT NULL,
  `calType` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `my_products`
--

LOCK TABLES `my_products` WRITE;
/*!40000 ALTER TABLE `my_products` DISABLE KEYS */;
INSERT INTO `my_products` VALUES (1,'U计划A','人人贷',3,7,0,1),(2,'U计划B','人人贷',6,9,0,1),(3,'U计划C','人人贷',12,11,0,1),(4,'定存宝-3个月','有利网',3,7,0,1),(5,'定存宝-6个月','有利网',6,9,0,1),(6,'定存宝-12个月','有利网',12,11,0,1),(7,'月息通','有利网',12,12,0,3),(8,'安盈票据','陆金所',3,6,0,1),(9,'富盈人生','陆金所',1,5.6,0,1),(10,'稳盈安e','陆金所',36,8.61,0,3),(11,'稳盈安业-3个月','陆金所',3,7.5,0,2),(12,'稳盈安业-6个月','陆金所',6,7.8,0,2),(13,'专享理财','陆金所',0,10,0,1),(14,'新手投资团','点融网',12,7,0,2),(15,'稳健投资团','点融网',12,9,0,2),(16,'高手投资团','陆金所',12,7,16,2),(17,'点融VIP团','点融网',12,12,0,2),(18,'定投宝-1个月','人人聚财',1,7,8,1),(19,'定投宝-3个月','人人聚财',3,8,9,1),(20,'定投宝-6个月','人人聚财',6,9,10,1),(21,'定投宝-12个月','人人聚财',12,11,13,1);
/*!40000 ALTER TABLE `my_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `my_records`
--

DROP TABLE IF EXISTS `my_records`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `my_records` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userName` text CHARACTER SET utf8 NOT NULL,
  `platform` text CHARACTER SET utf8 NOT NULL,
  `product` text CHARACTER SET utf32 NOT NULL,
  `capital` float NOT NULL,
  `minRate` float NOT NULL,
  `maxRate` float NOT NULL,
  `calType` int(11) NOT NULL,
  `startDate` text CHARACTER SET utf8 NOT NULL,
  `endDate` text CHARACTER SET utf8 NOT NULL,
  `state` int(11) NOT NULL,
  `addTime` int(11) NOT NULL,
  `ifDeleted` int(11) NOT NULL DEFAULT '0',
  `earning` int(11) NOT NULL DEFAULT '0' COMMENT '收益',
  `takeout` int(11) NOT NULL DEFAULT '0' COMMENT '取出的钱',
  `calTime` int(11) NOT NULL DEFAULT '0' COMMENT '结算时间',
  `balance` int(11) NOT NULL DEFAULT '0' COMMENT '余额',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `my_records`
--

LOCK TABLES `my_records` WRITE;
/*!40000 ALTER TABLE `my_records` DISABLE KEYS */;
INSERT INTO `my_records` VALUES (1,'1041928627@qq.com','人人贷','U计划A',10000,6.12,10.2,0,'2012-12-01','2013-12-01',1,1410725078,0,1000,500,1410726078,0),(2,'1041928627@qq.com','有利网','定存宝',6000,4.5,7.56,0,'2013-01-01','2013-12-31',1,1411725078,0,870,6000,1411725978,53370),(3,'1041928627@qq.com','有利网','月息通',20000,8,10,0,'2014-02-01','2014-09-01',1,1412725078,0,3500,3500,1412726098,53370),(4,'1041928627@qq.com','陆金所','富盈人生',25900,7.34,9.02,0,'2014-03-04','2015-01-15',0,1413725078,0,0,0,0,69000),(5,'1041928627@qq.com','积木盒子','饮品人生',49800,7.05,12,0,'2014-04-01','2015-04-01',0,1414725078,0,0,0,0,0),(6,'1041928627@qq.com','人人贷','U计划B',9000,6,9.99,0,'2014-04-01','2014-12-31',1,1415725078,0,0,0,0,0),(7,'1041928627@qq.com','点融网','团团赚-高手',170000,5,9,0,'2014-06-01','2016-06-01',0,1416725078,0,0,0,0,0),(8,'1041928627@qq.com','陆金所','富盈人生',69000,5,8,0,'2013-10-01','2014-10-01',1,1417725078,0,6530,6530,1417726178,69000),(9,'1041928627@qq.com','积木盒子','饮品人生',87600,5,9.14,0,'2013-12-10','2015-01-20',0,1418025078,0,0,0,0,0),(10,'1041928627@qq.com','点融网','团团赚-高手',540000,7.64,10.01,0,'2014-07-01','2016-07-01',0,1418125078,0,0,0,0,0),(11,'1041928627@qq.com','人人贷','U计划A',790000,6,11.45,0,'2014-01-01','2015-01-01',0,1418225078,0,0,0,0,0),(12,'1041928627@qq.com','有利网','定存宝',34890,5.46,12.31,0,'2012-12-04','2013-12-04',1,1418325078,0,2500,4890,1418325878,53370),(13,'1041928627@qq.com','爱投资','爱融租',483700,6.89,10,0,'2012-08-01','2014-08-01',1,1418425078,0,12300,83700,1418427078,364440),(14,'1041928627@qq.com','爱投资','爱保理',47860,8,11,0,'2013-12-08','2015-01-14',0,1418525078,0,0,0,0,364440),(15,'1041928627@qq.com','有利网','定存宝12个月',50000,0,11,0,'2015-01-13','2016-01-13',0,1421134349,0,0,0,0,0),(16,'1041928627@qq.com','人人贷','U计划B',558888,0,9,0,'2015-01-13','2015-07-13',0,1421153444,0,0,0,0,0),(17,'1041928627@qq.com','有利网','定存宝12个月',3370,0,11,0,'2015-01-16','2016-01-16',0,1421395378,0,0,0,0,50000),(18,'1041928627@qq.com','人人贷','U计划A',10000,6,10,1,'2012-12-1','2013-12-1',0,0,0,0,0,0,0);
/*!40000 ALTER TABLE `my_records` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `my_users`
--

DROP TABLE IF EXISTS `my_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `my_users` (
  `index` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` text CHARACTER SET utf8mb4 NOT NULL,
  `password` text CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`index`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `my_users`
--

LOCK TABLES `my_users` WRITE;
/*!40000 ALTER TABLE `my_users` DISABLE KEYS */;
INSERT INTO `my_users` VALUES (1,'xmc','123'),(2,'cxv','123'),(3,'inkjake@gmail.com','123'),(4,'xuxin@qq.com','123'),(5,'dkwfnekw@fnfdjs.com','123'),(6,'dkwfnekw@sjtu.edu.cn','123'),(7,'abc','12344'),(8,'xuxin11@qq.com','123'),(9,'xuxin13@qq.com','123'),(10,'xuxin1@qq.com','123'),(11,'xuxin12@qq.com','123'),(12,'xuxin14@qq.com','123'),(13,'xuxin111@qq.com','1'),(14,'xuxin1111@qq.com','1'),(15,'xuxin123@qq.com','123'),(16,'123123123@qq.com','123'),(17,'342@qq.com','213'),(18,'11111@qq.com','123'),(19,'1041928627@qq.com','123'),(20,'1041928627@qq.co','123'),(21,'qwe@qq.com','123456'),(22,'qwer@qq.com','123'),(23,'253467678@qq.com','miao'),(24,'xuxin12345@qq.com','123');
/*!40000 ALTER TABLE `my_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-01-21  8:17:24
