-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 01 Şub 2018, 12:56:49
-- Sunucu sürümü: 10.1.25-MariaDB
-- PHP Sürümü: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `teknosatis`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE `ayarlar` (
  `Id` int(11) NOT NULL,
  `adi` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `keywords` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `smtpserver` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `smtpport` int(6) UNSIGNED NOT NULL DEFAULT '465',
  `smtpemail` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `password` varchar(20) COLLATE utf8_turkish_ci DEFAULT NULL,
  `adres` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `sehir` varchar(20) COLLATE utf8_turkish_ci DEFAULT NULL,
  `tel` varchar(15) COLLATE utf8_turkish_ci DEFAULT NULL,
  `fax` varchar(15) COLLATE utf8_turkish_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `hakkimizda` text COLLATE utf8_turkish_ci,
  `iletisim` text COLLATE utf8_turkish_ci,
  `facebook` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `harita_html` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`Id`, `adi`, `keywords`, `description`, `name`, `smtpserver`, `smtpport`, `smtpemail`, `password`, `adres`, `sehir`, `tel`, `fax`, `email`, `hakkimizda`, `iletisim`, `facebook`, `twitter`, `youtube`, `harita_html`) VALUES
(1, 'Tekno Satış', 'bilgisayar, telefon, tablet', 'Bütçe dostu teknolojinin merkezi', 'Tekno Satış Mağaza', 'ssl://mail.example.com', 465, 'email', 'pass', '100. Yıl Mahallesi', 'Karabük', '123456789', '0212 856 22 36', 'info@teknosatis.xyz', '<p>Sitemiz 2017 yılında <strong>Levent Yayla</strong> tarafından kurulmuştur. Amacımız, teknolojik &uuml;r&uuml;nleri siz m&uuml;şterilerimize en uygun fiyatlarla sunmaktır.</p>\r\n', '<p>Bize e-posta adreslerimizden ulaşabilirsiniz</p>\r\n', 'lvntyyl', 'lvntyyl99', 'lvntyyl', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001.5095715147336!2d32.65331321532111!3d41.210664579280746!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x408354ac4492953f%3A0xab3b48ed0392a743!2sKarab%C3%BCk+%C3%9Cniversitesi!5e0!3m2!1str!2str!4v1515000165158\" width=\"100%\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

CREATE TABLE `kategoriler` (
  `Id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `adi` varchar(50) COLLATE utf8_turkish_ci NOT NULL DEFAULT '',
  `aciklama` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `anahtar_kelime` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `durum` enum('Aktif','Pasif') COLLATE utf8_turkish_ci NOT NULL DEFAULT 'Pasif',
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kategoriler`
--

INSERT INTO `kategoriler` (`Id`, `parent_id`, `adi`, `aciklama`, `anahtar_kelime`, `durum`, `tarih`) VALUES
(4, 0, 'Çevre Bileşenleri', NULL, NULL, 'Aktif', '2017-12-13 06:40:52'),
(5, 4, 'Mouse', NULL, NULL, 'Aktif', '2017-12-13 06:40:51'),
(6, 4, 'Klavye', 'Bilgisayar Elemanı', 'klavye, keyboard', 'Aktif', '2018-01-14 11:17:05'),
(7, 0, 'Akıllı Telefon', 'Android, iPhone gibi mobil cihazlar', 'mobil, cihaz, mobile, phone', 'Aktif', '2018-01-14 11:35:25'),
(8, 0, 'Bilgisayar', 'Masaüstü veya dizüstü bilgisayarlar', 'computer, bilgisayar', 'Aktif', '2017-12-14 13:45:35'),
(10, 8, 'Laptop', 'Dizüstü bilgisayarlar', 'dizüstü', 'Aktif', '2018-01-15 10:03:18'),
(11, 7, 'Android', 'Android cihazlar', 'Android, google', 'Aktif', '2018-01-14 11:33:29'),
(12, 7, 'iPhone', 'iPhone cihazlar', 'Apple, iphone', 'Aktif', '2018-01-14 11:36:46'),
(13, 0, 'Kamera', 'Fotoğraf ve video makineleri', 'kamera, camera', 'Aktif', '2018-01-14 11:38:08');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mesajlar`
--

CREATE TABLE `mesajlar` (
  `Id` int(11) NOT NULL,
  `adsoy` varchar(100) COLLATE utf8_turkish_ci NOT NULL DEFAULT '',
  `email` varchar(100) COLLATE utf8_turkish_ci NOT NULL DEFAULT '',
  `tel` varchar(20) COLLATE utf8_turkish_ci NOT NULL DEFAULT '',
  `mesaj` text COLLATE utf8_turkish_ci NOT NULL,
  `okundu` varchar(1) COLLATE utf8_turkish_ci NOT NULL DEFAULT '0',
  `tarih` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(20) COLLATE utf8_turkish_ci NOT NULL DEFAULT '',
  `not` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `mesajlar`
--

INSERT INTO `mesajlar` (`Id`, `adsoy`, `email`, `tel`, `mesaj`, `okundu`, `tarih`, `ip`, `not`) VALUES
(1, 'Levent Yayla', 'lvntyyl99@gmail.com', '05462624572', 'Test Deneme 1-2', '1', '2018-01-15 10:30:44', '::1', 'İşlem yapıldı');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `satin_alinan`
--

CREATE TABLE `satin_alinan` (
  `Id` int(11) NOT NULL,
  `uye_id` int(11) NOT NULL DEFAULT '0',
  `urun_id` int(11) NOT NULL DEFAULT '0',
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `durum` enum('Onay Bekliyor','Onaylandı','Kargoya Verildi','Tamamlandı') COLLATE utf8_turkish_ci NOT NULL DEFAULT 'Onay Bekliyor',
  `not` text COLLATE utf8_turkish_ci,
  `fiyat` int(11) NOT NULL DEFAULT '0',
  `miktar` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sepet`
--

CREATE TABLE `sepet` (
  `Id` int(11) NOT NULL,
  `uye_id` int(11) NOT NULL DEFAULT '0',
  `urun_id` int(11) NOT NULL DEFAULT '0',
  `miktar` int(5) NOT NULL DEFAULT '0',
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider`
--

CREATE TABLE `slider` (
  `Id` int(11) NOT NULL,
  `resim` varchar(100) COLLATE utf8_turkish_ci NOT NULL DEFAULT '',
  `baslik` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `buyuk_baslik` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `aciklama` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `buton_text` varchar(50) COLLATE utf8_turkish_ci NOT NULL DEFAULT '',
  `buton_link` varchar(255) COLLATE utf8_turkish_ci NOT NULL DEFAULT '',
  `durum` enum('Aktif','Pasif') COLLATE utf8_turkish_ci NOT NULL DEFAULT 'Pasif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `slider`
--

INSERT INTO `slider` (`Id`, `resim`, `baslik`, `buyuk_baslik`, `aciklama`, `buton_text`, `buton_link`, `durum`) VALUES
(5, 'maxresdefault-1.jpg', '', '', '', '', 'product/detail/2', 'Aktif'),
(6, 'que-es-el-marketing-de-contenidos1.jpg', '', '', '', '', 'home/kategoriler/10', 'Aktif');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

CREATE TABLE `urunler` (
  `Id` int(11) NOT NULL,
  `adi` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `kategori` int(11) NOT NULL DEFAULT '0',
  `afiyat` float NOT NULL,
  `sfiyat` float NOT NULL,
  `stok` int(6) NOT NULL,
  `tanim` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `anahtar_kelime` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `aciklama` text COLLATE utf8_turkish_ci NOT NULL,
  `durum` enum('Aktif','Pasif') COLLATE utf8_turkish_ci NOT NULL DEFAULT 'Pasif',
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `resim` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `siparis_sayisi` int(6) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `urunler`
--

INSERT INTO `urunler` (`Id`, `adi`, `kategori`, `afiyat`, `sfiyat`, `stok`, `tanim`, `anahtar_kelime`, `aciklama`, `durum`, `tarih`, `resim`, `siparis_sayisi`) VALUES
(1, 'Bloody V8M V7 Kablolu Oyuncu Mouse', 5, 71, 96, 489, 'A4Tech oyuncu fareleri', 'fare, mouse, gamer, wired, kablolu', '<p><strong>A4Tech oyuncu fareleri ile oyunu yaşayın</strong></p>\r\n', 'Aktif', '2018-01-14 15:33:12', 'bloody_v8m.jpg', 11),
(2, 'One Plus 5', 11, 2200, 2400, 498, 'One Plus markasının son telefonu', 'one, plus, 5, android, snapdragon', '<p><span style=\"font-size:14px\">One Plus 5 ile hız keyfini doyasıya yaşayacaksınız!</span></p>\r\n', 'Aktif', '2018-01-14 18:10:14', '9674410786866.jpg', 2),
(3, 'Apple iPhone 8', 12, 4200, 3699, 100, 'Akıllı cep telefonu kavramını küçük büyük herkese öğreten ve 2007 yılından bu yana geliştirdiği iPhone modelleriyle başarısına başarı katan Apple, geleneksel tasarım çizgilerinden ödün vermeyen iPhone 8 modelleri ile teknoloji meraklılarının dikkatini çek', 'apple, iphone, 8', '<p>IPS LCD yapısındaki 4.7 in&ccedil; genişliğindeki Retina HD ekranıyla 1334x750 piksel &ccedil;&ouml;z&uuml;n&uuml;rl&uuml;ğ&uuml;nde g&ouml;r&uuml;nt&uuml;lere imza atan&nbsp;<strong>iPhone 8 &ouml;zellikleri</strong>&nbsp;ile g&ouml;z kamaştırıyor. 326 PPI piksel yoğunluğu ve 625 nit değerinde parlaklık değeri sunan ekran, 1400:1 kontrast oranıyla oluşturduğu g&ouml;r&uuml;nt&uuml;lerin alabildiğine ger&ccedil;ek&ccedil;i g&ouml;r&uuml;nmesini sağlıyor. 3D Touch desteği ile basın&ccedil; algılayarak uygulamaların ve kısayolların alternatif şekillerde değerlendirilebilmesine ortam hazırlayan telefon ekranı, geniş renk yelpazesiyle hayranlık uyandırıyor. Farklı a&ccedil;ılardan da rahatlıkla takip edilebilmesi adına &ccedil;ift etki alanlı piksellerle donatılan ekran, True Tone teknolojisi ile dijital i&ccedil;eriklerdeki renkleri olması gerektiği gibi sunuyor. Parmak izi kaynaklı leke ve yağ tutmaması i&ccedil;in oleofobik kaplamayla desteklenen telefon ekranı, uzun s&uuml;reli kullanımlarda teknoloji meraklılarını memnun ediyor. &Ccedil;oklu dokunma, g&ouml;r&uuml;nt&uuml; yakınlaştırma ve &ccedil;izilmeye dayanıklılık gibi sayısız ekstrayı da beraberinde getiren ekran, iPhone 8&rsquo;in en g&uuml;&ccedil;l&uuml; yanlarından biri oluyor. .<br />\r\nDonanım a&ccedil;ısından da bir dolu yenilikle kullanıcılarını karşılayan&nbsp;<strong>iPhone 8 modelleri,&nbsp;</strong>dahili donanım bileşenleriyle y&uuml;ksek performans sergiliyor. Apple A11 Bionic yonga setinden g&uuml;c&uuml;n&uuml; alan iPhone 8, ikisi y&uuml;ksek performanslı, d&ouml;rd&uuml; enerji verimliliği ve performans odaklı olmak &uuml;zere toplamda altı &ccedil;ekirdekli işlemciyle fark yaratıyor. G&uuml;ncel oyun ve uygulamaları akıcı şekilde &ccedil;alıştıran işlemciler, grafik ağırlıklı uygulamalarda ise Apple&rsquo;ın geliştirdiği &uuml;&ccedil; &ccedil;ekirdekli grafik işlemcisinden destek alıyor. 2 GB kapasiteli belleğiyle gerek işletim sisteminin gerekse dijital i&ccedil;eriklerin keyifle değerlendirilebilmesine yardımcı olan akıllı cep telefonu, 64 GB ve 256 GB şeklinde iki dahili depolama &ccedil;&ouml;z&uuml;m&uuml;yle teknoloji meraklılarının beklentilerini karşılıyor. .<br />\r\nYonga setinin getirdiği yenilikler, kendini mobil iletişim &ouml;zellikleri ve kablosuz bağlanabilirlik alanında da g&ouml;steriyor. 4G modunda 1000 Mbps indirme ve 150 Mbps y&uuml;kleme hızı sunan ve 4.5G ile mobil internetin en y&uuml;ksek performansla kullanılabilmesinin &ouml;n&uuml;n&uuml; a&ccedil;an &uuml;r&uuml;n, kullanıcılarından tam not alıyor. MIMO teknolojisiyle g&uuml;&ccedil;l&uuml; ve kesintisiz Wi-Fi bağlantısı konusunda iddialı olan&nbsp;<strong>iPhone 8,&nbsp;</strong>Dual-Band 802.11ac Wi-Fi imkanıyla g&uuml;nceli yakalıyor. Bluetooth 5.0 ve NFC desteğiyle hem diğer akıllı aygıtlarla hem de bilgisayarlarla kablosuz iletişim kurabilen cep telefonu, gelişmiş navigasyon &ouml;zellikleriyle yolculuklardaki &ouml;nemli yardımcılardan biri haline geliyor.</p>\r\n', 'Aktif', '2018-01-14 18:37:17', '9713650237490.jpg', 0),
(4, 'Asus ROG GL753VE-GC095T', 10, 11000, 7000, 1002, 'ROG Strix GL753VE, Windows 10 yüklenmiş olarak gelir. 7. Nesil Intel® Core™ i7 Quad-Core işlemci, NVIDIA® GeForce® GTX 1050Ti grafik kartı ve Microsoft® DirectX®12 desteği ile size güçlü ve kusursuz oyun görselleri sunar.', 'oyun, bilgisayarı, asus', '<p><span style=\"font-size:14px\"><em><span style=\"font-family:arial\"><span style=\"color:#000000\"><strong>HER OYUN VE İ&Ccedil;ERİK İ&Ccedil;İN KUSURSUZ</strong></span></span></em><br />\r\n<br />\r\n<span style=\"font-family:arial\"><span style=\"color:#000000\">ROG Strix GL753VE Windows 10 y&uuml;kl&uuml; olarak gelir ve 7. Nesil Intel&nbsp;&reg;&nbsp;Core&trade; i7 işlemcisi ve g&uuml;&ccedil;l&uuml; NVIDIA&reg;&nbsp;GeForce&reg;&nbsp;GTX 1050Ti grafik kartı ile size kusursuz bir performans sunar. ROG Strix GL753VE oyun ve yaratıcılık &ouml;n planda tutularak geliştirilmiştir. Şimdi, daha &ouml;nce hi&ccedil; olmadığı gibi oyunları ve uygulamaları deneyimleme zamanı!</span></span></span></p>\r\n', 'Aktif', '2018-01-14 22:07:19', '9705385885746.jpg', 0),
(5, 'Monster Huma H4 V1.1', 10, 5700, 5300, 500, ' Monster Huma H4 V1.1 Intel Core i7 7700HQ 8GB 240GB SSD GTX1050Ti Freedos 14\" FHD Taşınabilir Bilgisayar', 'monster, laptop, oyun, bilgisayar', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th>10/100 Ethernet</th>\r\n			<td>Var</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Bellek Hızı</th>\r\n			<td>2400 MHz</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Bellek Yuvası</th>\r\n			<td>2</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Bluetooth &Ouml;zelliği</th>\r\n			<td>Var</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Boyutlar</th>\r\n			<td>349 x 247 x 25.4 mm</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Cihaz Ağırlığı</th>\r\n			<td>2 - 4 kg</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Dokunmatik Ekran</th>\r\n			<td>Yok</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Ekran Boyutu</th>\r\n			<td>14 in&ccedil;</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Ekran Kartı Bellek Tipi</th>\r\n			<td>GDDR5</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Ekran Kartı Hafızası</th>\r\n			<td>4 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Ekran Kartı İşlemcisi</th>\r\n			<td>Nvidia GeForce</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Ekran Kartı Tipi</th>\r\n			<td>Y&uuml;ksek Seviye Harici Ekran Kartı</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Ekran Kartı</th>\r\n			<td>Nvidia GeForce GTX1050 Ti</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Ekran &Ouml;zelliği</th>\r\n			<td>Full HD</td>\r\n		</tr>\r\n		<tr>\r\n			<th>eMMC Kapasitesi</th>\r\n			<td>Yok</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Garanti Tipi</th>\r\n			<td>Resmi Distrib&uuml;t&ouml;r Garantili</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Harddisk Kapasitesi</th>\r\n			<td>Yok</td>\r\n		</tr>\r\n		<tr>\r\n			<th>HDD Hızı</th>\r\n			<td>Belirtilmemiş</td>\r\n		</tr>\r\n		<tr>\r\n			<th>HDMI</th>\r\n			<td>Var</td>\r\n		</tr>\r\n		<tr>\r\n			<th>İşlemci Cache</th>\r\n			<td>6 MB Cache</td>\r\n		</tr>\r\n		<tr>\r\n			<th>İşlemci Hızı</th>\r\n			<td>3,8 GHz</td>\r\n		</tr>\r\n		<tr>\r\n			<th>İşlemci Tipi</th>\r\n			<td>Intel Core i7</td>\r\n		</tr>\r\n		<tr>\r\n			<th>İşlemci</th>\r\n			<td>7700HQ</td>\r\n		</tr>\r\n		<tr>\r\n			<th>İşletim Sistemi</th>\r\n			<td>Yok (Free Dos)</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Kart Okuyucu</th>\r\n			<td>Var</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Klavye</th>\r\n			<td>Q T&uuml;rk&ccedil;e</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Kullanım Amacı</th>\r\n			<td>Ev Kullanıcıları - &Ouml;ğrenci, Ofis ve İş, Oyun ve Eğlence, Tasarım</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Max Ekran &Ccedil;&ouml;z&uuml;n&uuml;rl&uuml;ğ&uuml;</th>\r\n			<td>1920 x 1080</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Optik S&uuml;r&uuml;c&uuml;</th>\r\n			<td>Yok</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Paket İ&ccedil;eriği</th>\r\n			<td>Notebook + &Ccedil;anta</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Parmak İzi Okuyucu</th>\r\n			<td>Yok</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Pil</th>\r\n			<td>8 H&uuml;creli</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Ram (Sistem Belleği)</th>\r\n			<td>8 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Ram Tipi</th>\r\n			<td>DDR4</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Renk</th>\r\n			<td>Siyah</td>\r\n		</tr>\r\n		<tr>\r\n			<th>SSD Kapasitesi</th>\r\n			<td>240 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Şarjlı Kullanım S&uuml;resi</th>\r\n			<td>3 Saat ve Altı</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Usb 2.0</th>\r\n			<td>Yok</td>\r\n		</tr>\r\n		<tr>\r\n			<th>USB 3.0</th>\r\n			<td>3</td>\r\n		</tr>\r\n		<tr>\r\n			<th>USB 3.1</th>\r\n			<td>1 Adet</td>\r\n		</tr>\r\n		<tr>\r\n			<th>&Uuml;r&uuml;n Modeli</th>\r\n			<td>Oyun Bilgisayarları</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Webcam</th>\r\n			<td>Var</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', 'Aktif', '2018-01-14 22:10:25', '9582034649138.jpg', 0),
(6, 'HP Pavilion 15-CB005NT', 10, 4000, 3300, 0, 'HP Pavilion 15-CB005NT Intel Core i5 7300HQ 8GB 1TB GTX1050 Freedos 15.6', 'hp, laptop, gaming, pavillion', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<th>10/100 Ethernet</th>\r\n			<td>Var</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Bellek Hızı</th>\r\n			<td>2400 MHz</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Bellek Yuvası</th>\r\n			<td>2</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Bluetooth &Ouml;zelliği</th>\r\n			<td>Var</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Boyutlar</th>\r\n			<td>37.8 x 25.22 x 2.41 cm</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Cihaz Ağırlığı</th>\r\n			<td>2 - 4 kg</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Dokunmatik Ekran</th>\r\n			<td>Yok</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Ekran Boyutu</th>\r\n			<td>15,6 in&ccedil;</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Ekran Kartı Bellek Tipi</th>\r\n			<td>GDDR5</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Ekran Kartı Hafızası</th>\r\n			<td>4 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Ekran Kartı İşlemcisi</th>\r\n			<td>Nvidia GeForce</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Ekran Kartı Tipi</th>\r\n			<td>Y&uuml;ksek Seviye Harici Ekran Kartı</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Ekran Kartı</th>\r\n			<td>Nvidia GeForce GTX1050</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Ekran &Ouml;zelliği</th>\r\n			<td>Full HD</td>\r\n		</tr>\r\n		<tr>\r\n			<th>eMMC Kapasitesi</th>\r\n			<td>Yok</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Garanti Tipi</th>\r\n			<td>Resmi Distrib&uuml;t&ouml;r Garantili</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Harddisk Kapasitesi</th>\r\n			<td>1 TB</td>\r\n		</tr>\r\n		<tr>\r\n			<th>HDD Hızı</th>\r\n			<td>7200 RPM</td>\r\n		</tr>\r\n		<tr>\r\n			<th>HDMI</th>\r\n			<td>Var</td>\r\n		</tr>\r\n		<tr>\r\n			<th>İşlemci Cache</th>\r\n			<td>6 MB Cache</td>\r\n		</tr>\r\n		<tr>\r\n			<th>İşlemci Hızı</th>\r\n			<td>2,5 GHz</td>\r\n		</tr>\r\n		<tr>\r\n			<th>İşlemci Tipi</th>\r\n			<td>Intel Core i5</td>\r\n		</tr>\r\n		<tr>\r\n			<th>İşlemci</th>\r\n			<td>7300HQ</td>\r\n		</tr>\r\n		<tr>\r\n			<th>İşletim Sistemi</th>\r\n			<td>Yok (Free Dos)</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Kart Okuyucu</th>\r\n			<td>Var</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Klavye</th>\r\n			<td>Numerik Tuşlu, Q T&uuml;rk&ccedil;e</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Kullanım Amacı</th>\r\n			<td>Ev Kullanıcıları - &Ouml;ğrenci, Ofis ve İş, Oyun ve Eğlence, Tasarım</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Max Ekran &Ccedil;&ouml;z&uuml;n&uuml;rl&uuml;ğ&uuml;</th>\r\n			<td>1920 x 1080</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Optik S&uuml;r&uuml;c&uuml;</th>\r\n			<td>Yok</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Paket İ&ccedil;eriği</th>\r\n			<td>Notebook</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Parmak İzi Okuyucu</th>\r\n			<td>Yok</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Pil</th>\r\n			<td>4 H&uuml;creli</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Ram (Sistem Belleği)</th>\r\n			<td>8 GB</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Ram Tipi</th>\r\n			<td>DDR4</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Renk</th>\r\n			<td>Siyah</td>\r\n		</tr>\r\n		<tr>\r\n			<th>SSD Kapasitesi</th>\r\n			<td>Yok</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Şarjlı Kullanım S&uuml;resi</th>\r\n			<td>6 Saat ve &Uuml;st&uuml;</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Usb 2.0</th>\r\n			<td>Yok</td>\r\n		</tr>\r\n		<tr>\r\n			<th>USB 3.0</th>\r\n			<td>Yok</td>\r\n		</tr>\r\n		<tr>\r\n			<th>USB 3.1</th>\r\n			<td>4 Adet</td>\r\n		</tr>\r\n		<tr>\r\n			<th>&Uuml;r&uuml;n Modeli</th>\r\n			<td>Oyun Bilgisayarları</td>\r\n		</tr>\r\n		<tr>\r\n			<th>Webcam</th>\r\n			<td>Var</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', 'Aktif', '2018-01-14 22:13:06', '9703344570418.jpg', 0),
(7, 'MSI GS73VR 7RF(Stealth Pro)', 10, 10000, 9050, 600, 'MSI GS73VR 7RF(Stealth Pro) - 255XTR Intel Core i7 7700HQ 16GB 1TB + 256GB SSD GTX1060 Freedos 17.3\" FHD Taşınabilir Bilgisayar', 'msi, laptop, gaming', '<h2>GS73VR 7RF(Stealth Pro)-255XTR</h2>\r\n\r\n<ul>\r\n	<li>İslemci: Intel Core D07 - 7700HQ (6MB Cache Turbo Boost 3.8 Ghz)</li>\r\n	<li>İsletim Sistemi: DOS</li>\r\n	<li>Ekran: 17.3&quot; FHD (1920x1080) 120Hz Yansımasız</li>\r\n	<li>Chipset: IntelB. HM175</li>\r\n	<li>Ekran Kartı: GeForceB. GTX 1060 6GB GDDR5</li>\r\n	<li>Hafıza: 16 GB DDR4 2400MHz.</li>\r\n	<li>Hafıza Yuvası: 2 Slot</li>\r\n	<li>Maksimum Hafıza: Max 32GB</li>\r\n	<li>SSD + HDD: 256GB SSD + 1 TB 7200 Rpm</li>\r\n	<li>Kamera: HD type (30fps@720p)</li>\r\n	<li>Klavye: Programlanabilir arka aydınlatmalı</li>\r\n	<li>Bluetooth: 1x v4.1</li>\r\n	<li>Kart Okuyucu: 1x SD (XC/HC)</li>\r\n	<li>Pil: 3-Cell</li>\r\n	<li>Boyutlar (WxDxH) mm: 411.8 x 284.9 x 19.6 mm</li>\r\n	<li>Ağırlık: 2.43 kg</li>\r\n</ul>\r\n', 'Aktif', '2018-01-14 22:16:28', '9556883603506.jpg', 0),
(8, 'Bloody B870R Q Türkçe', 6, 400, 430, 70, ' Bloody B870R Q Türkçe Usb Rgb Lk2 Mekanik Oyuncu Klavyesi', 'gamer, klavye, keyboard', '<ul>\r\n	<li><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Bookman Old Style&quot;,serif\">Kablolu RGB LK2&nbsp;<strong><span style=\"font-size:inherit\"><span style=\"font-family:inherit\"><span style=\"color:red\">Infrared Mekanik Switch&rsquo;li</span></span></span></strong>&nbsp;Gamer Klavye</span></span></li>\r\n	<li><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Bookman Old Style&quot;,serif\">Q T&uuml;rk&ccedil;e</span></span></li>\r\n	<li><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Bookman Old Style&quot;,serif\">Yenilik&ccedil;i&nbsp;</span></span><strong><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Bookman Old Style&quot;,serif\"><span style=\"color:red\">Infrared Switch&nbsp;</span></span></span></strong><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Bookman Old Style&quot;,serif\">ile aşınmaya, gecikmeye ve toza son,&nbsp;</span></span><strong><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Bookman Old Style&quot;,serif\"><span style=\"color:red\">100 milyon tuş-darbesi !</span></span></span></strong></li>\r\n	<li><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Bookman Old Style&quot;,serif\">LK2 mavi Switch ile Makineli T&uuml;fek gibi tuşlama sesi</span></span></li>\r\n	<li><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Bookman Old Style&quot;,serif\"><span style=\"color:black\">16.8 Milyon renk ile &ouml;zelleştirilebilir RGB Animasyonlar</span></span></span></li>\r\n	<li><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Bookman Old Style&quot;,serif\"><span style=\"color:black\">&Ouml;ny&uuml;klemeli RGB Işık Efektlerini, &ouml;zelleştir, paylaş veya takas et</span></span></span></li>\r\n	<li><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Bookman Old Style&quot;,serif\"><span style=\"color:black\">Favori 10 adet RGB Efektlerinizi, FN+0~9 ile kısayol olarak tanımlayabilme</span></span></span></li>\r\n	<li><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Bookman Old Style&quot;,serif\">LK-Light Strike teknolojisi ile muhteşem 0,2msn tuş tepki s&uuml;resi</span></span></li>\r\n	<li><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Bookman Old Style&quot;,serif\">LK&rsquo;de metal par&ccedil;aların oluşturduğu g&uuml;r&uuml;lt&uuml; dalgaları yoktur ve sinyalin gecikmesini &ouml;nler.</span></span></li>\r\n	<li><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Bookman Old Style&quot;,serif\">Sıfır Gecikme ile geleneksel Metal Switch&rsquo;lerden 30msn daha hızlı</span></span></li>\r\n	<li><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Bookman Old Style&quot;,serif\">Paslanma nedeniyle oluşan &ccedil;ift tıklama hasarını ve aşınmayı engeller</span></span></li>\r\n	<li><span style=\"font-size:10pt\"><span style=\"font-family:&quot;Bookman Old Style&quot;,serif\">KeyDominator Yazılımı ile&nbsp;</span></span>(<span style=\"font-size:inherit\"><span style=\"font-family:inherit\"><span style=\"color:red\">indir:<a href=\"http://www.hepsiburada.com/bloody-b870r-q-turkce-usb-rgb-lk2-mekanik-oyuncu-klavyesi-p-HBV000008WTQZ#\" target=\"_blank\">bloody.com/en/download.php</a></span></span></span>)</li>\r\n</ul>\r\n', 'Aktif', '2018-01-14 22:22:37', '9752158699570.jpg', 0),
(9, 'Apple iPhone X 64 GB', 12, 4000, 5500, 800, 'Apple iPhone X 64 GB (Apple Türkiye Garantili)', 'Apple, iphone, x', '<p>5.8 in&ccedil; genişliğinde OLED ekranla donatılan iPhone X, şıklığıyla g&ouml;renleri kendine hayran bırakıyor. 2436x1125 piksel &ccedil;&ouml;z&uuml;n&uuml;rl&uuml;ğ&uuml;nde g&ouml;r&uuml;nt&uuml;lere hayat veren ekran, 458 PPI değerindeki piksel yoğunluğuyla keskin ve ger&ccedil;eğe takın g&ouml;r&uuml;nt&uuml;ler oluşturduğunu ispat ediyor. HDR, HDR10, True Tone, Dolby Vision gibi &ccedil;ok sayıda g&ouml;r&uuml;nt&uuml; teknolojisine sahip ekran, Super Retina Display olma &ouml;zelliğine de taşıyor. 1000000:1 kontrast oranı ve 625 nit değerindeki parlaklığıyla gerek iletişim gerekse eğlenceye y&ouml;nelik uygulama ve dijital i&ccedil;eriklerin en iyi şekilde takip edilebilmesine imkan tanıyan model, 3D Touch mekaniklerini de beraberinde getiriyor. Teknoloji meraklılarının ekrana uyguladıkları basınca duyarlı olan telefon, işletim sistemi ve uygulamaların verimli kullanılabilmesine olanak veriyor. Ekranda parmak izi kalmasını engelleyen oleofobik kaplamayla desteklenen &uuml;r&uuml;n, bu &ouml;zelliğiyle kullanıcılarından tam not alıyor.&nbsp;<br />\r\nYalnızca ekran yapısıyla değil donanım g&uuml;c&uuml;yle de dikkat &ccedil;eken&nbsp;<strong>iPhone X modelleri,&nbsp;</strong>Apple&rsquo;ın attığı cesur adımlardan payını alıyor ve Apple A11 Bionic yongasıyla g&uuml;&ccedil; kazanıyor. Y&uuml;ksek performanslı iki işlemciye ek olarak enerji verimliliği odaklı d&ouml;rt &ccedil;ekirdekli yardımcı işlemciye de &uuml;zerinde yer veren&nbsp;<strong>iPhone X,&nbsp;</strong>M11 hareket işlemcisiyle farkını ortaya koyuyor. 3 GB kapasiteli belleğiyle işletim sistemi, uygulama ve oyunların ferah bi&ccedil;imde değerlendirilebilmesine zemin hazırlarken 64 GB ve 256 GB kapasiteli depolama alanlarıyla farklı ihtiya&ccedil;lara &ccedil;&ouml;z&uuml;m sunuyor. Apple&rsquo;ın iCloud bulut depolama sisteminden istifade edilebilmesine yardımcı olan modelle dahili depolama alanının azaldığı anlarda bulut depolama &ccedil;&ouml;z&uuml;mlerine y&ouml;nelebilirsiniz.&nbsp;<br />\r\nYeni nesil yonga setiyle &uuml;r&uuml;n&uuml;n bağlanabilirlik imkanları da genişliyor. Dual-Band 802.11ac Wi-Fi, Bluetooth 5.0 ve NFC ile beklentileri fazlasıyla karşılayan telefon, 4.5G teknolojisini destekliyor. 4G modunda &ccedil;alışırken 1000 Mbps indirme ve 150 Mbps y&uuml;kleme hızı vadeden iPhone X, mobil ağlardan eksiksiz yararlanılabilmesinde &ouml;nemli rol oynuyor.&nbsp;<br />\r\nOyun ve teknoloji meraklılarının yakından takip ettikleri artırılmış ger&ccedil;eklik teknolojisini donanımsal ve yazılımsal olarak destekleyen&nbsp;<strong>iPhone X modelleri,&nbsp;</strong>yeni nesil oyun ve eğlence anlayışının yaygınlaşmasını sağlıyor. Apple&rsquo;a &ouml;zel geliştirilen oyun ve uygulamalarla keyifle değerlendirilebilecek artırılmış ger&ccedil;eklik teknolojisi, modelin şimdiye kadar geliştirilen akıllı cep telefonlarından ayrılmasını m&uuml;mk&uuml;n kılıyor. Oynanan oyunlardaki karakterlerin kontrol edilebilmesine ve izlenebilme s&uuml;re&ccedil;lerine farklı bir g&ouml;rsel boyut kazandıran artırılmış ger&ccedil;eklik teknolojisi, g&uuml;nl&uuml;k yaşamda hayatı kolaylaştıracak uygulamalarla v&uuml;cut bulabiliyor.</p>\r\n', 'Aktif', '2018-01-14 23:05:29', '9713620156466.jpg', 0),
(10, 'Xiaomi Mi 6', 11, 1500, 1900, 450, 'Xiaomi Mi 6 128 GB', 'Xiaomi, Mi 6, android', '<p>IPS LCD Full HD Multi Touch kapasitif ekran teknolojisine sahip&nbsp;<strong>Xiaomi Mi 6 128 Gb.&nbsp;</strong>5,15 in&ccedil; ekran boyutu ile teknolojiyi geniş ekran konforunda deneyimleyeceğiniz bir ortam sunuyor. 1080x1920 piksel ekran &ccedil;&ouml;z&uuml;n&uuml;rl&uuml;ğ&uuml; ve 428 PPI piksel yoğunluğu ile daha derin ve &ccedil;arpıcı g&ouml;r&uuml;nt&uuml;ler oluşturan cihaz, &ccedil;oklu ortam uygulamaları ve oyunları &ccedil;ok daha keyifli hale getiriyor. Kontrast değeri ve ekran parlaklığı a&ccedil;ısından beklenenin &uuml;zerinde bir performansa imza atan Mi 6, 16 milyon renk sayısı ile daha canlı ve zengin renkler oluşturuyor. Sade ve işlevsel MIUI 8.0 aray&uuml;z&uuml; ile gelen cihazın zengin g&ouml;rsel efektleri ve geniş ekran paneli ile g&ouml;rsel medya keyfini &uuml;st seviyede yaşayabilirsiniz.&nbsp;<br />\r\nAndroid 7.1.1. Nougat işletim sistemine sahip olan&nbsp;<strong>Xiaomi Mi 6 128 Gb.&nbsp;</strong>Android telefon deneyimini en g&uuml;ncel haliyle yaşamanıza olanak veriyor. Qualcomm Snapdragon 835 yonga setini kullanan cihaz, uygulama ve oyunlarda y&uuml;ksek performans vadediyor. 8 &ccedil;ekirdek, 2.45 GHz hıza shaip Quad-core Kryo 280 ana işlemci ve 1,9 GHz hızda &ccedil;alışan yardımcı işlemci kullanımda y&uuml;ksek hız ayrıcalığını yaşamanıza yardımcı oluyor. Ayrıca, Adreno 540 grafik işlemci, &ouml;zel efekt ve &uuml;&ccedil; boyutlu g&ouml;rsellerde kusursuz netlikte g&ouml;r&uuml;nt&uuml;ler oluşturuyor. 6GB RAM kapasitesi ile &ccedil;oklu g&ouml;revlerde ve yoğun g&uuml;&ccedil; gerektiren uygulamalarda sorunsuz bir kullanım zemini hazırlayan Mi 6 ile uygulamaları akıcı ve hızlı g&ouml;r&uuml;nt&uuml;leyebilirsiniz.</p>\r\n', 'Aktif', '2018-01-14 23:09:17', '9665735721010.jpg', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler_resim`
--

CREATE TABLE `urunler_resim` (
  `Id` int(11) NOT NULL,
  `urun_id` int(11) NOT NULL DEFAULT '0',
  `resim` varchar(100) COLLATE utf8_turkish_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `urunler_resim`
--

INSERT INTO `urunler_resim` (`Id`, `urun_id`, `resim`) VALUES
(1, 2, '9674410819634.jpg'),
(2, 2, '9674410885170.jpg'),
(3, 2, '9674410917938.jpg'),
(4, 2, '9674410950706.jpg'),
(5, 3, '9713650270258.jpg'),
(6, 3, '9713650303026.jpg'),
(7, 4, '9705385918514.jpg'),
(8, 4, '9705385951282.jpg'),
(9, 4, '9705385984050.jpg'),
(10, 4, '9705386016818.jpg'),
(11, 5, '9582034681906.jpg'),
(12, 5, '9582034714674.jpg'),
(13, 6, '9703344603186.jpg'),
(14, 6, '9703344635954.jpg'),
(15, 7, '9556883636274.jpg'),
(16, 7, '9556883669042.jpg'),
(17, 7, '9556883701810.jpg'),
(18, 7, '9556883734578.jpg'),
(19, 9, '9713620189234.jpg'),
(20, 9, '9713620222002.jpg'),
(21, 10, '9665735753778.jpg'),
(22, 10, '9665735786546.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE `uyeler` (
  `Id` int(11) NOT NULL,
  `ad` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `soyad` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `eposta` varchar(254) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `resim` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `kayit_tarihi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cinsiyet` char(1) COLLATE utf8_turkish_ci NOT NULL DEFAULT 'e',
  `telefon` varchar(11) COLLATE utf8_turkish_ci DEFAULT NULL,
  `adres` text COLLATE utf8_turkish_ci,
  `sehir` varchar(10) COLLATE utf8_turkish_ci DEFAULT NULL,
  `durum` enum('Pasif','Aktif') COLLATE utf8_turkish_ci NOT NULL DEFAULT 'Pasif',
  `validation` varchar(35) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci ROW_FORMAT=COMPACT;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`Id`, `ad`, `soyad`, `eposta`, `sifre`, `resim`, `kayit_tarihi`, `cinsiyet`, `telefon`, `adres`, `sehir`, `durum`, `validation`) VALUES
(5, 'Levent', 'Yayla', 'lvntyyl99@gmail.com', '12', NULL, '2018-01-14 15:27:37', 'e', '05123456789', 'Address', 'İstanbul', 'Aktif', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yonetici`
--

CREATE TABLE `yonetici` (
  `Id` int(11) NOT NULL,
  `ad` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `soyad` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  `eposta` varchar(254) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `yetki` varchar(8) COLLATE utf8_turkish_ci NOT NULL,
  `resim` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `kayit_tarihi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `durum` enum('Aktif','Pasif') COLLATE utf8_turkish_ci NOT NULL DEFAULT 'Pasif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yonetici`
--

INSERT INTO `yonetici` (`Id`, `ad`, `soyad`, `eposta`, `sifre`, `yetki`, `resim`, `kayit_tarihi`, `durum`) VALUES
(1, 'Levent', 'Yayla', 'lvntyyl99@gmail.com', '12', 'admin', 'levent.jpg', '2017-10-26 14:53:24', 'Aktif');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorum`
--

CREATE TABLE `yorum` (
  `Id` int(11) NOT NULL,
  `uye_id` int(11) NOT NULL DEFAULT '0',
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `yorum` varchar(255) COLLATE utf8_turkish_ci NOT NULL DEFAULT '',
  `puan` varchar(1) COLLATE utf8_turkish_ci NOT NULL DEFAULT '5',
  `durum` enum('Aktif','Pasif') COLLATE utf8_turkish_ci NOT NULL DEFAULT 'Pasif',
  `urun_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yorum`
--

INSERT INTO `yorum` (`Id`, `uye_id`, `tarih`, `yorum`, `puan`, `durum`, `urun_id`) VALUES
(5, 5, '2018-01-15 10:29:37', 'çok güzel bir telefon', '5', 'Pasif', 2);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ayarlar`
--
ALTER TABLE `ayarlar`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `kategoriler`
--
ALTER TABLE `kategoriler`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `mesajlar`
--
ALTER TABLE `mesajlar`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `satin_alinan`
--
ALTER TABLE `satin_alinan`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `urun_tek` (`uye_id`,`urun_id`),
  ADD KEY `urun_id` (`urun_id`);

--
-- Tablo için indeksler `sepet`
--
ALTER TABLE `sepet`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `tek_urun` (`uye_id`,`urun_id`),
  ADD KEY `urun` (`urun_id`);

--
-- Tablo için indeksler `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `urunler`
--
ALTER TABLE `urunler`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `kategori_2` (`kategori`);

--
-- Tablo için indeksler `urunler_resim`
--
ALTER TABLE `urunler_resim`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `urun_id` (`urun_id`);

--
-- Tablo için indeksler `uyeler`
--
ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `eposta` (`eposta`);

--
-- Tablo için indeksler `yonetici`
--
ALTER TABLE `yonetici`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `yorum`
--
ALTER TABLE `yorum`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `tek_yorum` (`uye_id`,`urun_id`),
  ADD KEY `urun_yorum` (`urun_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ayarlar`
--
ALTER TABLE `ayarlar`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `kategoriler`
--
ALTER TABLE `kategoriler`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Tablo için AUTO_INCREMENT değeri `mesajlar`
--
ALTER TABLE `mesajlar`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `satin_alinan`
--
ALTER TABLE `satin_alinan`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `sepet`
--
ALTER TABLE `sepet`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `slider`
--
ALTER TABLE `slider`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Tablo için AUTO_INCREMENT değeri `urunler`
--
ALTER TABLE `urunler`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Tablo için AUTO_INCREMENT değeri `urunler_resim`
--
ALTER TABLE `urunler_resim`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- Tablo için AUTO_INCREMENT değeri `uyeler`
--
ALTER TABLE `uyeler`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Tablo için AUTO_INCREMENT değeri `yonetici`
--
ALTER TABLE `yonetici`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `yorum`
--
ALTER TABLE `yorum`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `satin_alinan`
--
ALTER TABLE `satin_alinan`
  ADD CONSTRAINT `urun_id` FOREIGN KEY (`urun_id`) REFERENCES `urunler` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `uye_id` FOREIGN KEY (`uye_id`) REFERENCES `uyeler` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `sepet`
--
ALTER TABLE `sepet`
  ADD CONSTRAINT `urun` FOREIGN KEY (`urun_id`) REFERENCES `urunler` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `uye` FOREIGN KEY (`uye_id`) REFERENCES `uyeler` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `urunler`
--
ALTER TABLE `urunler`
  ADD CONSTRAINT `urunler_ibfk_1` FOREIGN KEY (`kategori`) REFERENCES `kategoriler` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `urunler_resim`
--
ALTER TABLE `urunler_resim`
  ADD CONSTRAINT `urunler_id_cascade` FOREIGN KEY (`urun_id`) REFERENCES `urunler` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `yorum`
--
ALTER TABLE `yorum`
  ADD CONSTRAINT `urun_yorum` FOREIGN KEY (`urun_id`) REFERENCES `urunler` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `uye_yorum` FOREIGN KEY (`uye_id`) REFERENCES `uyeler` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
