
CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `contact_type` varchar(255) NOT NULL,
  `contact_content` text NOT NULL,
  `contact_icon` varchar(255) NOT NULL,
  `contact_isDefault` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


INSERT INTO `contact` (`contact_id`, `contact_type`, `contact_content`, `contact_icon`, `contact_isDefault`) VALUES
(1, 'Telefon', '+90 543 840 02 20', '', 1),
(2, 'E-posta', 'info@healthtrack.com.tr', '', 1),
(3, 'Adres', 'Dikilitaş mah. Hakkı Yeten cad. Selenium Plaza No: 101/19 12. Kat Fulya Beşiktaş İSTANBUL', '', 1);



CREATE TABLE `general` (
  `general_id` int(11) NOT NULL,
  `general_content_id` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



INSERT INTO `general` (`general_id`, `general_content_id`, `created_at`) VALUES
(1, 'service1', '2023-01-24 10:43:57'),
(2, 'service2', '2023-01-24 10:43:54'),
(3, 'service3', '2023-01-24 10:43:51'),
(4, 'service4', '2023-01-24 10:43:45'),
(5, 'principle1', '2023-01-24 10:43:38'),
(6, 'principle2', '2023-01-24 10:43:38'),
(7, 'principle3', '2023-01-24 10:43:38'),
(8, 'banner1', '2023-01-24 10:44:10'),
(9, 'banner2', '2023-01-24 10:44:10'),
(10, 'team-member', '2023-01-24 10:45:17'),
(11, 'about-us', '2023-01-24 10:45:17'),
(12, 'vision', '2023-01-24 10:45:43'),
(13, 'mission', '2023-01-24 10:45:43'),
(14, 'core-values', '2023-01-24 10:45:43'),
(15, 'policy', '2023-01-24 10:45:43'),
(16, 'sustainability', '2023-01-24 10:45:43');



CREATE TABLE `general_translations` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` mediumtext NOT NULL,
  `general_id` int(11) NOT NULL DEFAULT 0,
  `language_code` char(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


INSERT INTO `general_translations` (`id`, `title`, `description`, `general_id`, `language_code`) VALUES
(1, 'DİNLİYORUZ', '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo, architecto alias! Nemo dolorem aliquam fugiat</p>\r\n', 1, 'tr'),
(2, 'İNCELİYORUZ', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo, architecto alias! Nemo dolorem aliquam fugiat', 2, 'tr'),
(3, 'PLANLIYORUZ', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo, architecto alias! Nemo dolorem aliquam fugiat', 3, 'tr'),
(4, 'İZLİYORUZ', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo, architecto alias! Nemo dolorem aliquam fugiat', 4, 'tr'),
(5, 'Bütüncül Yaklaşım', '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Est, excepturi optio tempore voluptatum temporibus sapiente quisquam fugit eligendi quo nemo?</p>\r\n', 5, 'tr'),
(6, 'Multidisipliner Bakış Açısı', '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi rem minus tenetur nesciunt quae cum mollitia eius eveniet repudiandae enim!</p>\r\n', 6, 'tr'),
(7, 'Güvenilir Kanıta Dayalı Tedavi', '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo, architecto alias!</p>\r\n', 7, 'tr'),
(8, '- Healthtrack Clinic', 'Healthtrack Clinic&rsquo;te kişiselleştirilmiş b&uuml;t&uuml;nc&uuml;l bir yaklaşım ile tanışacaksınız. Danışanlarımız her birinin optimal sağlığını hedefleyerek kendilerine &ouml;zel planladığımız yaklaşımımızın bizi farklılaştırdığını d&uuml;ş&uuml;n&uuml;yor. Tıpkı bir denizatı gibi sakin ve kendinden emin ilerleyeceğimiz, sağlıklı ve iyi olma yolculuğunuz i&ccedil;in hazır mısınız?\r\n', 8, 'tr'),
(9, '- Uzm. Dr. Kadir Doğruer', '&Ccedil;ok iddialı gelebilir size, ancak Healthtrack Clinic olarak sunduğumuz b&uuml;t&uuml;nc&uuml;l sağlık desteği ve &ccedil;&ouml;z&uuml;mleri ile &ouml;ncelikle sağlığınızı koruyacak ve hastalıkların oluşmasını engelleyeceğiz.', 9, 'tr'),
(10, 'Ekibimiz', '<p>Healthtrack Clinic&rsquo;in kapısından girdiğinizde sizin i&ccedil;in &ouml;zenle hazırlanmış, en ince detayına kadar d&uuml;ş&uuml;n&uuml;lm&uuml;ş, sağlıkta b&uuml;t&uuml;nc&uuml;l yaklaşımı hedefleyen tedavilerimizin &ouml;tesinde sakin ve huzurlu bir yaşam merkezine adım atarsınız.<br />\r\nBu tip kliniklerde deneyimlediğimiz kalabalık randevu listeleri ve bu listelere yetişmeye &ccedil;alışan, istemeden de olsa ticari kaygıyla ilerleyen merkezlerden &ccedil;ok daha farklı ve kişiye odaklanılan bir d&uuml;nyaya adım atacaksınız. Kişiselleştirilmiş b&uuml;t&uuml;nc&uuml;l bir yaklaşım ile size hizmet sunmaktan mutluluk duyuyoruz.<br />\r\nDanışanlarımız, sağlıklarına y&ouml;nelik kişiselleştirilmiş yaklaşımımızın bizi diğerlerinden farklı kıldığını hissettikleri i&ccedil;in bizi tercih etmeye devam ediyor. Ancak her zaman &ouml;ncelikle kendi kararınızı kendinizin vermesini istiyoruz.<br />\r\nEn iyi b&uuml;t&uuml;nc&uuml;l tıp doktorlarından bazılarıyla, sağlıklı yaşamı teşvik eden modern ve geleneksel tıbbi gelişmelerle birlikte en b&uuml;t&uuml;nleştirici tedaviyi alacaksınız. Yeni sağlıklı yaşam tarzınız sizi bekliyor, bug&uuml;n bizimle iletişime ge&ccedil;erek randevunuzu alın.</p>\r\n', 10, 'tr'),
(11, 'Healthtrack Kliniğine Hoş Geldiniz', '<p>Bizim i&ccedil;in en &ouml;nemli değer: Sizi g&uuml;venli bir aile ortamında hissettirmek.<br />\r\n<br />\r\nHealthtrack kurulduğu g&uuml;nden bu yana insanların sağlıklı olması ve sağlıklarına yapacakları yatırım i&ccedil;in tıp ve teknolojiyi bir arada kullandı. Farklı fikirlerin inovatif bakış a&ccedil;ısı ile hayata ge&ccedil;irilmesi ve insanların hasta olmadan sağlıklarının farkında olmaları &uuml;zerine &ccedil;alışmalar yaptı.<br />\r\n<br />\r\nG&uuml;ven odaklı organizasyonu ve ekibinin farklı alanlardan ancak aynı misyonla &ccedil;izdiği b&uuml;t&uuml;nc&uuml;l yaklaşıma dayalı vizyonuyla i&ccedil;inizde saklı kalan potansiyelinizi keşfetmeniz i&ccedil;in yola &ccedil;ıktı.<br />\r\n<br />\r\nHasta olmadan &ouml;nce, hasta olmayı &ouml;nleyici ve i&ccedil;inizde gizli kalan ya da yıllar i&ccedil;inde yaşam tarzı se&ccedil;imleriniz nedeniyle atıl duran performansınızı, yaşlanmayı yavaşlatan rejeneratif sağlık y&ouml;netimi sistemi ile g&uuml;n ışığına &ccedil;ıkarıyoruz. V&uuml;cudunuzu arındırarak aslında sizi h&uuml;cresel bazda yeniliyoruz. S&uuml;rd&uuml;r&uuml;lebilir tedavi planlarımızla t&uuml;m tedavilerimizin birbirini destekleyerek sizi en iyi halinize y&uuml;kseltmek bizim amacımız&hellip;<br />\r\n<br />\r\nHealthTrack gelişen bilişim teknolojilerini de kullanarak sağlığınızın en iyi haline ulaşmanız i&ccedil;in t&uuml;m ekibi ve donanımı ile hazır. İ&ccedil;inizdeki s&uuml;per g&uuml;&ccedil;leri ortaya &ccedil;ıkarmak ve sizi hayatınızın kahramanı yapmak i&ccedil;in yerinizi hazırlıyoruz.<br />\r\n<br />\r\nFarkında değilsin, ama i&ccedil;inde bir s&uuml;per g&uuml;&ccedil; yatıyor!<br />\r\n<br />\r\n<strong>S&uuml;per G&uuml;c&uuml;n&uuml; Keşfedelim!</strong></p>\r\n', 11, 'tr'),
(12, 'Vizyonumuz', '<p>Danışan ve sağlığı koruma ve performansı iyileştirme odaklı klinik ortaklığını vurgulayan ve danışanlarımızı sağlıklı yaşam tarzını benimsemelerinde aktif rol almaya teşvik eden b&uuml;t&uuml;nleştirici tedavileri sunmak.</p>\r\n', 12, 'tr'),
(13, 'Misyonumuz', '<p>Healthtrack Clinic geleneksel ve alternatif tıbbi tedaviler arasında gelişen boşluğu dolduran, danışanların uygun ve rahat ettikleri ortamlarında mobil olarak sunduğu hizmetlerle optimal sağlık ve zindeliklerine ulaşmalarını teşvik eden ve deneyimli uzman ekibi ile &ouml;ne &ccedil;ıkan b&uuml;t&uuml;nleştirici tıbbi uygulamalar merkezidir.</p>\r\n', 13, 'tr'),
(14, 'Temel Değerlerimiz', '<ul>\r\n	<li>\r\n	<p>İyileştirici Bir Ortam Hazırlamak ve Sunmak</p>\r\n	</li>\r\n	<li>\r\n	<p>&Ouml;zenli , Bilin&ccedil;li ve G&uuml;venilir Profesyonel Bir Ekiple Hizmet Sunmak</p>\r\n	</li>\r\n	<li>\r\n	<p>İdeal Sağlığınızı Korumaya Odaklı İşbirliği Hazırlayan Bir Ortaklık Planlamak</p>\r\n	</li>\r\n	<li>\r\n	<p>Hak Ettiğiniz Kalitede Bakım ve Tedavileri Her Zaman Aynı Şekilde Sunmak</p>\r\n	</li>\r\n	<li>\r\n	<p>Her Danışanın &Ouml;zel Tedavi Planını Hazırlayacak ve Takip Edecek Şartları Oluşturmak</p>\r\n	</li>\r\n</ul>\r\n', 14, 'tr'),
(15, 'Danışanlarımız için On İlkemiz', '<ul>\r\n	<li>\r\n	<p>&Ouml;ncelikle danışanın v&uuml;cuduna asla zarar vermeyin; m&uuml;mk&uuml;n olan en doğal, en az invaziv ve en az toksik i&ccedil;eren tedaviyi tercih edin.</p>\r\n	</li>\r\n	<li>\r\n	<p>Hastalığa neden olan k&ouml;k nedeni tanımlayın ve ona y&ouml;nelik tedavi uygulayın; hastalığın altta yatan nedenlerini belirlemek ve tedavi etmek i&ccedil;in hastalığın semptomlarını ipucu olarak kullanın.</p>\r\n	</li>\r\n	<li>\r\n	<p>Doğanın iyileştirici g&uuml;&ccedil;leri ile v&uuml;cudun kendi kendini iyileştirme yeteneğini kucaklayın.</p>\r\n	</li>\r\n	<li>\r\n	<p>T&uuml;m bedeni iyileştirin; bedene zihin, beden ve ruhu i&ccedil;eren b&uuml;t&uuml;nleşik bir yapı olarak yaklaşın.</p>\r\n	</li>\r\n	<li>\r\n	<p>Doktor olarak siz danışanlarımızın ortağısınız, danışanınızla işbirliği yapın, rehber olun ve fayda yaratın. Optimal sağlığa giden yolculuklarını kişiselleştirin.</p>\r\n	</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Danışanınızı optimal sağlığına ulaştırmanız ve s&uuml;rd&uuml;rmelerini sağlamanız i&ccedil;in yaşam tarzı değişiklikleri konusunda onları eğitin.</p>\r\n	</li>\r\n	<li>\r\n	<p>&Ouml;nlemek i&ccedil;in &ouml;nce &ouml;ğretin. Hastalıkları &ouml;nlemenin bir yolu olarak bulunduğunuz anda sağlık ve zindeliği teşvik etmeye odaklanın.</p>\r\n	</li>\r\n	<li>\r\n	<p>Danışan merkezli iyileşmeye odaklanın. Danışanların bakımını kişiselleştirin &ccedil;&uuml;nk&uuml; konu sadece danışanın b&uuml;t&uuml;nc&uuml;l durumuyla ilgili!</p>\r\n	</li>\r\n	<li>\r\n	<p>İyileştirici bir ortam yaratın; danışan i&ccedil;in hem iyileştiren hem de optimal sağlık ve esenliğe yardımcı olan bir şifa ortamını modelleyen sakin bir sığınak sağlayın.</p>\r\n	</li>\r\n	<li>\r\n	<p>Sevecen bir yaklaşım benimseyin; danışanı kendi i&ccedil;inde &ccedil;ok g&uuml;&ccedil;l&uuml; bir iyileştirici g&uuml;&ccedil; olan sevgi dolu bir şekilde tedavi edin.</p>\r\n	</li>\r\n</ul>\r\n', 15, 'tr'),
(16, 'Sürdürülebilirlik', '<p>Bir kuruluş olarak Healthtrack Clinic, ekolojik olarak sağlam malzeme ve metodolojileri birleştirmeyi ve yaygın olarak mevcut ekonomik, sosyal ve k&uuml;lt&uuml;rel ihtiya&ccedil;ların yetenekten &ouml;d&uuml;n vermeden karşılanması olarak tanımlanan yeşil &ldquo;s&uuml;rd&uuml;r&uuml;lebilirlik&rdquo; idealini benimser. S&uuml;rd&uuml;r&uuml;lebilirliği materyallerinin ve metodolojilerinin ayrılmaz bir par&ccedil;ası haline getirir. Gelecek nesillerin ihtiya&ccedil;larını karşılamak i&ccedil;in s&uuml;rd&uuml;r&uuml;lebilir bir bilin&ccedil;le hizmetlerini sunar.</p>\r\n', 16, 'tr');



CREATE TABLE `language` (
  `code` char(2) NOT NULL,
  `direction` varchar(3) NOT NULL,
  `isDefault` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `language` (`code`, `direction`, `isDefault`) VALUES
('tr', 'LTR', 1),
('en', 'LTR', 0);


CREATE TABLE `language_translations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `main_code` char(2) NOT NULL,
  `language_code` char(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


INSERT INTO `language_translations` (`id`, `name`, `main_code`, `language_code`) VALUES
(1, 'Türkçe', 'tr', 'tr'),
(2, 'Turkish', 'tr', 'en'),
(3, 'İngilizce', 'en', 'tr'),
(4, 'English', 'en', 'en');


CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `news_image` mediumtext DEFAULT NULL,
  `news_click_count` int(11) DEFAULT NULL,
  `news_sort` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


INSERT INTO `news` (`news_id`, `news_image`, `news_click_count`, `news_sort`, `created_at`) VALUES
(6, 'attachments/news/sağlıklı-olmanın-sırrı-meditasyon-mu.jpg', 0, '0', '2023-01-24 04:10:43');


CREATE TABLE `news_translation` (
  `id` int(11) NOT NULL,
  `title` mediumtext NOT NULL,
  `short_content` mediumtext NOT NULL,
  `content` longtext NOT NULL,
  `url` text NOT NULL,
  `news_id` int(11) NOT NULL DEFAULT 0,
  `language_code` char(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



INSERT INTO `news_translation` (`id`, `title`, `short_content`, `content`, `url`, `news_id`, `language_code`) VALUES
(5, 'Is it the secret of healthy acquisitions?', 'Researchers in China compared the gut microbiome of Tibetan monks to local people. Results showed monks had more microbes that boost mental and physical health', '<p>It was explained that meditation improves mood and well-being. According to scientists, the practice can increase the levels of good bacteria in the gut and provide a range of mental and physical health benefits. Trial</p>\r\n\r\n<h2>MEDITATION PLAYS POSITIVE ROLE IN MENTAL AND PHYSICAL HEALTH</h2>\r\n\r\n<p>According to the news in the British newspaper Daily Mail, researchers in China evaluated the gut microbiome and blood samples of Tibetan monks and compared them to locals who followed a similar diet but did not meditate.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The team said the findings show that meditation plays a positive role in mental and physical health by boosting gut health.</p>\r\n\r\n<p>Research has shown that the gut microbiome &ndash; the trillions of microorganisms in the gut, including bacteria, viruses and fungi &ndash; is linked to mood and health through the gut-brain axis.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Meditation is an internal mental exercise that has been shown to increase physical and mental health. It involves sitting silently and paying attention to the feeling of breathing and bringing attention back to this point when the mind starts to get distracted.</p>\r\n\r\n<p>Researchers find the insight of Tibetan Buddhist meditation into promoting well-being and the true nature of all phenomena. He said that he trains the mind to allow the body to self-regulate in order to ensure</p>\r\n\r\n<p>However, researchers at the Shanghai Jiao Tong University School of Medicine in Shanghai noted that it remains unclear whether meditation alone affects the gut microbiome.</p>\r\n\r\n<h2>PRIESTS MEDITATION FOR TWO HOURS EACH DAY FOR 30 YEARS</h2>\r\n\r\n<p>Both groups were matched in terms of age, blood pressure, heart rate and diet. Rice, bread, noodles, vegetables and meat were the main foods consumed by both groups.</p>\r\n\r\n<p>&Ouml;Previous Three; During the month, none of them took pills that could change the volume and diversity of gut microbes, such as antibiotics, probiotics, or antifungal drugs.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The results, published in the journal General Psychiatry, showed that monks had richer microbiomes, better mental health, and healthier hearts. In order to find out this, three They analyzed stool and blood samples from 37 Tibetan Buddhist monks from the temple and compared them with 19 residents from neighboring areas.</p>\r\n\r\n<p>Priests Three He had meditated for at least two hours a day for 30 to 30 years.</p>\r\n\r\n<p>Researchers have found two common types of bacteria; He said that bacteroidet and firmiguts, which are bacteroides, were dominant in both groups and this was expected.</p>\r\n\r\n<p>However, bacteroides, which previous studies have associated with a lower risk of anxiety, were significantly enriched in the monks&#39; fecal samples. Abundant prevotella bacteria and high amounts of megamonas and faecalibacterium &ndash; types of bacteria linked to better mental health &ndash; were also found in monks.</p>\r\n\r\n<p>The team led by Associate Professor Ying Sun said that these bacteria are collectively linked to better mental health, according to previous research.</p>\r\n\r\n<h2>LOWER RISK OF HEART DISEASE</h2>\r\n\r\n<p>The group explored what bodily processes might be behind this. The results suggested that the molecules in bacteria trigger anti-inflammatory and metabolism-enhancing bodily mechanisms.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Meanwhile, blood sample analysis showed lower levels of cholesterol and apolipoprotein B protein, which can act as markers of heart disease risk, in the monks compared to the other group.</p>\r\n\r\n<p>Researchers stated that their study was small and observational, therefore they could not reach definitive conclusions and all participants were male.</p>\r\n\r\n<p>It was also stated that the actual rates of mental and physical health conditions among the participants were not considered. However, the researchers say the findings are strong enough to warrant further study of the link between meditation and health. He said it was.</p>\r\n\r\n<h2>DEEP MEDITATION CAN HAVE A BENEFICIAL EFFECT ON BOOT MICROBIOTA</h2>\r\n\r\n<p>The team concludes, &quot;These results suggest that prolonged deep meditation can have a beneficial effect on the gut microbiota and enable the body to maintain optimal health.&quot; he added.</p>\r\n', 'is-it-the-secret-of-healthy-acquisitions', 6, 'en'),
(4, 'Sağlıklı olmanın sırrı meditasyon mu?', 'Çindeki araştırmacılar Tibetli rahiplerin bağırsak mikrobiyomunu yerel halkla karşılaştırdı. Sonuçlar, keşişlerin zihinsel ve fiziksel sağlığı artıran mikroplara daha fazla sahip olduğunu gösterdi', '<p>Meditasyonun ruh halini ve refahı artırdığı a&ccedil;ıklandı. Bilim insanlarına g&ouml;re, uygulamanın bağırsaklardaki iyi bakteri seviyelerini artırabileceğini ve bir dizi zihinsel ve fiziksel sağlık faydası sağlayabileceğini dile getirdi. Deneme</p>\r\n\r\n<h2>MEDİTASYON ZİHİNSEL VE FİZİKSEL SAĞLIKTA OLUMLU ROL OYNUYOR</h2>\r\n\r\n<p>İngiliz gazete Daily Mail&#39;de yer alan habere g&ouml;re, &Ccedil;in&#39;deki araştırmacılar Tibetli rahiplerin bağırsak mikrobiyomunu ve kan &ouml;rneklerini değerlendirerek, onları benzer bir diyet uygulayan ancak meditasyon yapmayan yerlilerle karşılaştırdı.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Ekip, bulguların meditasyonun bağırsak sağlığını artırarak zihinsel ve fiziksel sağlıkta olumlu bir rol oynadığını g&ouml;sterdiğini s&ouml;yledi.</p>\r\n\r\n<p>Araştırmalar bağırsak mikrobiyomunun - bağırsaklardaki bakteriler, vir&uuml;sler ve mantarlar dahil trilyonlarca mikroorganizma - bağırsak-beyin ekseni aracılığıyla ruh hali ve sağlıkla bağlantılı olduğunu g&ouml;sterdi.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Meditasyon, fiziksel ve zihinsel sağlığı artırdığı g&ouml;sterilen bir i&ccedil;sel zihinsel egzersizdir. Sessizce oturup nefes alma hissine dikkat etmeyi ve zihin dağılmaya başladığında dikkati tekrar bu noktaya getirmeyi i&ccedil;erir.</p>\r\n\r\n<p>Araştırmacılar, Tibet Budist meditasyonunun, esenliği geliştirmek ve t&uuml;m fenomenlerin ger&ccedil;ek doğasına dair i&ccedil;g&ouml;r&uuml; sağlamak amacıyla v&uuml;cudun kendi kendini d&uuml;zenlemesine izin vermek i&ccedil;in zihni &ccedil;alıştırdığını s&ouml;yledi.</p>\r\n\r\n<p>Bununla birlikte, Şanghay&#39;daki Şanghay Jiao Tong &Uuml;niversitesi Tıp Fak&uuml;ltesi&#39;ndeki araştırmacılar, meditasyonun tek başına bağırsak mikrobiyomunu etkileyip etkilemediğinin belirsizliğini koruduğunu belirtti.</p>\r\n\r\n<h2>RAHİPLER 30 YIL BOYUNCA HER G&Uuml;N İKİ SAAT MEDİTASYON YAPTI</h2>\r\n\r\n<p>Her iki grup da yaş, kan basıncı, kalp atış hızı ve diyet a&ccedil;ısından eşleştirildi. Pirin&ccedil;, ekmek, erişte, sebze ve et her iki grup tarafından t&uuml;ketilen temel gıdalardı.</p>\r\n\r\n<p>&Ouml;nceki &uuml;&ccedil; ay i&ccedil;inde hi&ccedil;biri antibiyotik, probiyotik veya antifungal (mantar &ouml;nleyici) ila&ccedil;lar gibi bağırsak mikroplarının hacmini ve &ccedil;eşitliliğini değiştirebilecek haplar almadı.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Genel Psikiyatri dergisinde yayınlanan sonu&ccedil;lar, keşişlerin daha zengin mikrobiyomlara, daha iyi ruh sağlığına ve daha sağlıklı kalplere sahip olduğunu g&ouml;sterdi. Bunu &ouml;ğrenmek amacıyla, &uuml;&ccedil; tapınaktan 37 Tibetli Budist rahibin dışkı ve kan &ouml;rneklerini analiz ettiler ve komşu b&ouml;lgelerdeki 19 sakinle karşılaştırdılar.</p>\r\n\r\n<p>Rahipler &uuml;&ccedil; ila 30 yıl boyunca her g&uuml;n en az iki saat meditasyon yapmıştı.</p>\r\n\r\n<p>Araştırmacılar, iki yaygın bakteri t&uuml;r&uuml; olan bakteroidet ve firmik&uuml;tlerin her iki grupta da baskın olduğunu ve bunun beklendiğini s&ouml;yledi.</p>\r\n\r\n<p>Bununla birlikte, &ouml;nceki &ccedil;alışmaların daha d&uuml;ş&uuml;k anksiyete riskiyle ilişkilendirildiği bakteroidetler, keşişlerin dışkı &ouml;rneklerinde &ouml;nemli &ouml;l&ccedil;&uuml;de zenginleşti. Ayrıca keşişlerde bol miktarda prevotella bakterisi ve y&uuml;ksek miktarda megamonas ve faecalibacterium - daha iyi ruh sağlığı ile bağlantılı bakteri t&uuml;rleri - bulundu.</p>\r\n\r\n<p>Do&ccedil;ent Ying Sun liderliğindeki ekip, &ouml;nceki araştırmalara g&ouml;re bu bakterilerin toplu olarak daha iyi ruh sağlığıyla bağlantılı olduğunu s&ouml;yledi.</p>\r\n\r\n<h2>KALP HASTALIĞI RİSKİ DAHA D&Uuml;Ş&Uuml;K</h2>\r\n\r\n<p>Grup bunun arkasında hangi bedensel s&uuml;re&ccedil;lerin olabileceğini araştırdı. Sonu&ccedil;lar, bakterilerdeki molek&uuml;llerin anti-enflamatuar ve metabolizmayı g&uuml;&ccedil;lendirici bedensel mekanizmaları tetiklediğini d&uuml;ş&uuml;nd&uuml;rd&uuml;.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Bu arada, kan &ouml;rneği analizi, kalp hastalığı riskinin belirte&ccedil;leri olarak işlev g&ouml;rebilen kolesterol ve apolipoprotein B proteini seviyelerinin keşişlerde diğer gruba g&ouml;re daha d&uuml;ş&uuml;k olduğunu g&ouml;sterdi.</p>\r\n\r\n<p>Araştırmacılar &ccedil;alışmalarının k&uuml;&ccedil;&uuml;k ve g&ouml;zlemsel olduğunu, bu nedenle kesin sonu&ccedil;lara ulaşamadıklarını ve t&uuml;m katılımcıların erkek olduğunu belirtti.</p>\r\n\r\n<p>Ayrıca katılımcılar arasında ruhsal ve fiziksel sağlık koşullarının ger&ccedil;ek oranlarına bakılmadığı ifade edildi. Ancak araştırmacılar, bulguların meditasyon ve sağlık arasındaki bağlantıya ilişkin daha fazla &ccedil;alışma yapılmasını gerektirecek kadar g&uuml;&ccedil;l&uuml; olduğunu s&ouml;yledi.</p>\r\n\r\n<h2>DERİN MEDİTASYON BAĞIRSAK MİKROBİYOTASI &Uuml;ZERİNDE YARARLI BİR ETKİYE SAHİP OLABİLİR</h2>\r\n\r\n<p>Ekip, &quot;Bu sonu&ccedil;lar, uzun s&uuml;reli derin meditasyonun bağırsak mikrobiyotası &uuml;zerinde yararlı bir etkiye sahip olabileceğini ve v&uuml;cudun optimal sağlık durumunu korumasını sağlayabileceğini d&uuml;ş&uuml;nd&uuml;rmektedir&quot; diye ekledi.</p>\r\n', 'sağlıklı-olmanın-sırrı-meditasyon-mu', 6, 'tr');



CREATE TABLE `team_members` (
  `member_id` int(11) NOT NULL,
  `member_name` varchar(255) NOT NULL,
  `member_photo` text DEFAULT NULL,
  `member_sort` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



INSERT INTO `team_members` (`member_id`, `member_name`, `member_photo`, `member_sort`, `created_at`) VALUES
(1, 'Test Doktor', 'attachments/team/nonSelectedProfilePhoto.png', '0', '2023-01-23 06:44:26');



CREATE TABLE `team_members_translation` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `member_id` int(11) NOT NULL DEFAULT 0,
  `language_code` char(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



INSERT INTO `team_members_translation` (`id`, `title`, `description`, `member_id`, `language_code`) VALUES
(1, 'Psikolog', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla dictum nunc nec lectus lacinia, ac aliquam elit tincidunt. Vestibulum fermentum venenatis pharetra. Proin tempus congue arcu, a vestibulum mauris bibendum sed. Phasellus sit amet leo lacinia, pellentesque ligula in, pulvinar neque. Nullam rhoncus, dui vel bibendum tempus, tellus tellus fermentum nisi, id facilisis dui ligula et sem. Ut in dolor ac sem sodales pulvinar sit amet eu leo. Suspendisse tincidunt placerat elit, nec porta elit pulvinar a. Pellentesque enim lacus, convallis sed sagittis eget, commodo quis erat. Fusce nec tincidunt enim, nec condimentum leo. Aliquam a faucibus lorem. Suspendisse sit amet turpis augue. Vestibulum ullamcorper posuere enim a rhoncus.', 1, 'tr'),
(12, 'Psychologist', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla dictum nunc nec lectus lacinia, ac aliquam elit tincidunt. Vestibulum fermentum venenatis pharetra. Proin tempus congue arcu, a vestibulum mauris bibendum sed. Phasellus sit amet leo lacinia, pellentesque ligula in, pulvinar neque. Nullam rhoncus, dui vel bibendum tempus, tellus tellus fermentum nisi, id facilisis dui ligula et sem. Ut in dolor ac sem sodales pulvinar sit amet eu leo. Suspendisse tincidunt placerat elit, nec porta elit pulvinar a. Pellentesque enim lacus, convallis sed sagittis eget, commodo quis erat. Fusce nec tincidunt enim, nec condimentum leo. Aliquam a faucibus lorem. Suspendisse sit amet turpis augue. Vestibulum ullamcorper posuere enim a rhoncus.', 1, 'en');



CREATE TABLE `treatments` (
  `treatment_id` int(11) NOT NULL,
  `treatment_main_img` mediumtext DEFAULT NULL,
  `treatment_sort` varchar(255) DEFAULT NULL,
  `treatment_click_count` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


INSERT INTO `treatments` (`treatment_id`, `treatment_main_img`, `treatment_sort`, `treatment_click_count`, `created_at`) VALUES
(1, 'attachments/treatments/psikoloji.jpg', '0', 0, '2023-01-25 10:46:26');


CREATE TABLE `treatments_translation` (
  `id` int(11) NOT NULL,
  `name` mediumtext NOT NULL,
  `short_content` text NOT NULL,
  `content` longtext NOT NULL,
  `url` mediumtext NOT NULL,
  `treatment_id` int(11) NOT NULL DEFAULT 0,
  `language_code` char(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


INSERT INTO `treatments_translation` (`id`, `name`, `short_content`, `content`, `url`, `treatment_id`, `language_code`) VALUES
(1, 'Psikoloji', 'Psikolojik destek almak için karar vermek ve bu kararın ardından yardım almak üzere harekete geçmek zor olabilir, ama zor olanı başarmanızı sağlamak için Healthtrack Clinic olarak biz herzaman buradayız.', '<p>Psikolojik destek almak i&ccedil;in karar vermek ve bu kararın ardından yardım almak &uuml;zere harekete ge&ccedil;mek zor olabilir, ama zor olanı başarmanızı sağlamak i&ccedil;in Healthtrack Clinic olarak biz herzaman buradayız.<br />\r\nDanışanlarımıza b&uuml;t&uuml;nsel sağlık esasıyla yaklaşan NLP ve EFT Master olan psikoloğumuz, t&uuml;m danışanlarımızın ihtiya&ccedil;larını karşılamalarında yardımcı olmak i&ccedil;in farklı yaklaşımlardan faydalanır.<br />\r\nPsikoloğumuzun yararlandığı akupres&uuml;r ve NLP teknikleri sayesinde beden &uuml;zerinden zihinsel şifanın kapılarını aralamak m&uuml;mk&uuml;n olmaktadır. Danışanlarımızın sıklıkla zorluk yaşadığı konular olan:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Kilo verme</p>\r\n	</li>\r\n	<li>\r\n	<p>Yeme bozuklukları</p>\r\n	</li>\r\n	<li>\r\n	<p>Anksiyete</p>\r\n	</li>\r\n	<li>\r\n	<p>Stres ve kaygı bozuklukları</p>\r\n	</li>\r\n	<li>\r\n	<p>Sınav kaygısı</p>\r\n	</li>\r\n	<li>\r\n	<p>Depresyon</p>\r\n	</li>\r\n	<li>\r\n	<p>&Ouml;z g&uuml;ven eksikliği</p>\r\n	</li>\r\n	<li>\r\n	<p>Fobiler</p>\r\n	</li>\r\n	<li>\r\n	<p>İlişki sorunları</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Şu an her ne yaşıyor ve her ne konuda zorluk yaşıyorsanız, bunları tek başınıza y&uuml;klenmek ve aşmak zorunda değilsiniz! Yardım almak en doğal hakkınız.<br />\r\nRandevu almak i&ccedil;in bize ulaşabilirsiniz.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'psikoloji', 1, 'tr');

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_mail` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_pwd` text DEFAULT NULL,
  `user_role` varchar(255) DEFAULT NULL,
  `user_status` tinyint(1) DEFAULT NULL,
  `user_photo` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `slider_link` text NOT NULL,
  `slider_image` mediumtext NOT NULL,
  `slider_sort` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `slider` (`slider_id`, `slider_link`, `slider_image`, `slider_sort`, `created_at`) VALUES
(7, 'ekip.php', 'attachments/slider/slider-2.jpg', 1, '2023-02-09 18:49:23'),
(6, 'ekip.php', 'attachments/slider/onemsiz-cusg-imdg-2.jpg', 0, '2023-02-10 02:17:29');


CREATE TABLE `slider_translations` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `slider_id` int(11) NOT NULL,
  `language_code` char(2) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


INSERT INTO `slider_translations` (`id`, `title`, `content`, `slider_id`, `language_code`) VALUES
(7, 'Slider 2', 'Lorem ipsum dolor sit amet.', 7, 'tr'),
(6, 'Slider 1', '1123 123123 123 123\r\n,123', 6, 'tr');


ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

    ALTER TABLE `slider_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `translation_id` (`slider_id`),
  ADD KEY `language_code` (`language_code`);

  ALTER TABLE `slider_translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;


ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);


ALTER TABLE `general`
  ADD PRIMARY KEY (`general_id`);


ALTER TABLE `general_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `translation_id` (`general_id`),
  ADD KEY `language_code` (`language_code`);




ALTER TABLE `language`
  ADD PRIMARY KEY (`code`);


ALTER TABLE `language_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `translation_id` (`main_code`),
  ADD KEY `language_code` (`language_code`);


ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

ALTER TABLE `news_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `translation_id` (`news_id`),
  ADD KEY `language_code` (`language_code`);

ALTER TABLE `team_members`
  ADD PRIMARY KEY (`member_id`);

ALTER TABLE `team_members_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `translation_id` (`member_id`),
  ADD KEY `language_code` (`language_code`);


ALTER TABLE `treatments`
  ADD PRIMARY KEY (`treatment_id`);


ALTER TABLE `treatments_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `translation_id` (`treatment_id`),
  ADD KEY `language_code` (`language_code`);


ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);


ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `general`
  MODIFY `general_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

ALTER TABLE `general_translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

ALTER TABLE `language_translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;


ALTER TABLE `news_translation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `team_members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

ALTER TABLE `team_members_translation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

ALTER TABLE `treatments`
  MODIFY `treatment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `treatments_translation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;