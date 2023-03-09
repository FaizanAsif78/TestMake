-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2023 at 12:59 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sawal_nama`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`, `name`, `cpassword`, `role`) VALUES
(15, 'ahsan6262@gmail.com', '47a200f9078354e3fee0e84071f85662', 'ahsan', 'ahsan6262', 'spadmin'),
(16, 'swalnama@gmail.com', '0e367d78f883288f191fffe3c43fa48c', 'mirza', 'mirza1234', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(255) NOT NULL,
  `class_id` int(255) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `book_pic` varchar(255) NOT NULL,
  `bdate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `class_id`, `book_name`, `book_pic`, `bdate`) VALUES
(4, 4, 'English', 'eng-1.jpg', '23-02-06'),
(6, 4, 'Math', 'math-1.jpg', '23-02-06'),
(7, 4, 'Urdu', 'urdu-1.png', '23-02-08'),
(8, 5, 'English', 'eng-2.jpg', '23-02-08'),
(9, 5, 'Urdu', 'urdu-2.png', '23-02-08'),
(10, 5, 'Math', 'math-2.jpg', '23-02-08'),
(11, 6, 'English', 'eng-3.jpg', '23-02-08'),
(12, 6, 'Urdu', 'urdu-3.jpg', '23-02-08'),
(13, 6, 'Math', 'math-3.jpg', '23-02-08'),
(14, 7, 'English', 'eng-4.jpg', '23-02-08'),
(15, 7, 'Urdu', 'urdu-4.jpg', '23-02-08'),
(16, 7, 'Math', 'math-4.png', '23-02-08'),
(17, 8, 'English', 'eng-5.jpg', '23-02-08'),
(18, 8, 'Urdu', 'urdu-5.jpg', '23-02-08'),
(19, 8, 'Math', 'math-5.jpg', '23-02-08'),
(20, 9, 'English', 'eng-6.jpg', '23-02-08'),
(21, 9, 'Urdu', 'urdu-6.png', '23-02-08'),
(22, 9, 'Math', 'math-6.png', '23-02-08'),
(23, 10, 'English', 'eng-7.jpg', '23-02-11'),
(24, 10, 'Urdu', 'urdu-7.png', '23-02-11'),
(25, 10, 'Math', 'math-7.png', '23-02-11'),
(26, 11, 'English', 'eng-8.png', '23-02-11'),
(27, 11, 'Urdu', 'urdu-8.jpg', '23-02-11'),
(28, 11, 'Math', 'math-8.png', '23-02-11'),
(29, 12, 'English', 'eng-9.jpg', '23-02-11'),
(30, 12, 'Urdu', 'urdu-9.png', '23-02-11'),
(31, 12, 'Math', 'math-9.jpg', '23-02-11'),
(32, 13, 'English', 'eng-10.png', '23-02-11'),
(33, 13, 'Urdu', 'urdu-10.jpg', '23-02-11'),
(34, 13, 'Math', 'math-10.png', '23-02-11');

-- --------------------------------------------------------

--
-- Table structure for table `chapter`
--

CREATE TABLE `chapter` (
  `chp_id` int(255) NOT NULL,
  `book_id` int(255) NOT NULL,
  `class_id` int(255) NOT NULL,
  `chp_name` varchar(255) NOT NULL,
  `chp_num` varchar(255) NOT NULL,
  `chp_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chapter`
--

INSERT INTO `chapter` (`chp_id`, `book_id`, `class_id`, `chp_name`, `chp_num`, `chp_date`) VALUES
(4, 32, 13, 'Hazrat Muhammad (PBUH) an Embodiment of Justice', 'CH #1', '23-02-13'),
(5, 32, 13, 'Chinese New Year', 'CH #2', '23-02-13'),
(6, 32, 13, 'Try Again', 'CH #3', '23-02-13'),
(7, 34, 13, 'Quadratic Equations', 'CH #1', '23-02-13'),
(8, 34, 13, 'Theory of Quadratic Equations', 'CH #2', '23-02-13'),
(9, 34, 13, 'Variations', 'CH #3', '23-02-13'),
(10, 33, 13, 'Hamd', 'CH #1', '23-02-13'),
(11, 33, 13, 'Naat', 'CH #2', '23-02-13'),
(12, 33, 13, 'Mirza Mohammad Saeed', 'CH #3', '23-02-13'),
(13, 29, 12, 'The Saviour of Mankind', 'CH #1', '23-02-13'),
(14, 29, 12, 'Patriotism', 'CH #2', '23-02-13'),
(15, 29, 12, 'Media and Its Impact', 'CH #3', '23-02-13'),
(16, 31, 12, 'Matrices and determinants', 'CH #1', '23-02-13'),
(17, 31, 12, 'Real and Complex Numbers.', 'CH #2', '23-02-13'),
(18, 31, 12, 'Logarithms', 'CH #3', '23-02-13'),
(19, 30, 12, 'Qadr Ayaz', 'CH #1', '23-02-13'),
(20, 30, 12, 'Hosla na Haro Agy Barho Manzil Ab door nhi', 'CH #2', '23-02-13'),
(21, 30, 12, 'Nazm Hamd', 'CH #3', '23-02-13'),
(22, 26, 11, 'Tolerance of Hazrat Muhammad صلى الله عليه وسلم ', 'CH #1', '23-02-13'),
(23, 26, 11, 'A Dialogue', 'CH #2', '23-02-13'),
(24, 26, 11, 'On the Ocean', 'CH #3', '23-02-13'),
(25, 27, 11, 'Hamd', 'CH #1', '23-02-13'),
(26, 27, 11, 'Naat', 'CH #2', '23-02-13'),
(27, 27, 11, 'Dard e Dil k wasty paida kia', 'CH #3', '23-02-13'),
(28, 28, 11, 'Operation on Sets', 'Ch #1', '23-02-13'),
(29, 28, 11, 'Real Number', 'CH #2', '23-02-13'),
(30, 28, 11, 'Number System', 'CH #3', '23-02-13');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(255) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `class_des` varchar(255) NOT NULL,
  `cdate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class_name`, `class_des`, `cdate`) VALUES
(4, 'One Class', 'This is One Class', '23-02-06'),
(5, 'Two Class', 'This is two class', '23-02-06'),
(6, 'Three Class', 'This is three class', '23-02-06'),
(7, 'Four Class', 'This is four class', '23-02-06'),
(8, 'Five Class', 'This is five class', '23-02-06'),
(9, 'Six Class', 'This is six class', '23-02-06'),
(10, 'Seven Class', 'This is seven class', '23-02-06'),
(11, 'Eight Class', 'This is eight class', '23-02-06'),
(12, 'Nine Class', 'This is nine class', '23-02-06'),
(13, 'Ten Class', 'This is ten class', '23-02-06');

-- --------------------------------------------------------

--
-- Table structure for table `longquestion`
--

CREATE TABLE `longquestion` (
  `longQues_id` int(255) NOT NULL,
  `book_l_id` int(255) NOT NULL,
  `class_l_id` int(255) NOT NULL,
  `chapter_l_id` int(255) NOT NULL,
  `longQuestion_eng` varchar(255) NOT NULL,
  `longQuestion_urdu` varchar(255) NOT NULL,
  `LQadd_status` varchar(255) NOT NULL DEFAULT '0',
  `ldate` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `longquestion`
--

INSERT INTO `longquestion` (`longQues_id`, `book_l_id`, `class_l_id`, `chapter_l_id`, `longQuestion_eng`, `longQuestion_urdu`, `LQadd_status`, `ldate`, `user_email`) VALUES
(4, 29, 12, 13, 'Why did arthur disagree with norma?', '', '0', '23-02-16', '0'),
(5, 29, 12, 13, 'What climate did bittering family face on the mars?', '', '0', '23-02-16', '0'),
(6, 29, 12, 13, 'Why did manana accuse hubert of picking up the lost pocketbook?', '', '0', '23-02-16', '0'),
(7, 29, 12, 13, 'What were the feeling of the gorgios on the occasion of inauguration ceremony?', '', '0', '23-02-16', '0'),
(8, 29, 12, 13, 'What should be the role of a qazi?', '', '0', '23-02-16', '0'),
(9, 29, 12, 13, 'How did olfd stephen treat the stray locust which he found on hos shirt?', '', '0', '23-02-16', '0'),
(10, 29, 12, 13, 'What are the qualities of the veterans of creative suffering?', '', '0', '23-02-16', '0'),
(11, 29, 12, 13, 'Who was shamim ahmed?', '', '0', '23-02-16', '0'),
(12, 29, 12, 13, 'Give a brief sketch of the man who was wearing overcoat?', '', '0', '23-02-16', '0'),
(13, 29, 12, 13, 'How does kreton impress general powers', '', '0', '23-02-16', '0'),
(14, 29, 12, 14, 'Describe kreton appearance the visitor', '', '0', '23-02-16', '0'),
(15, 29, 12, 14, 'Why does mr spelding hate john', '', '0', '23-02-16', '0'),
(16, 29, 12, 14, 'What is the significance of arthur life insurance poilcy', '', '0', '23-02-16', '0'),
(17, 29, 12, 14, 'What was the condition of the bittering family on hearing the news of war on the earth?', '', '0', '23-02-16', '0'),
(18, 29, 12, 14, 'What did make hubert shameful?', '', '0', '23-02-16', '0'),
(19, 29, 12, 14, 'How did gorgios achieve his ambition?', '', '0', '23-02-16', '0'),
(20, 29, 12, 14, 'What was the advice given by nushirvan to his people?', '', '0', '23-02-16', '0'),
(21, 29, 12, 14, 'What was the desire of every farmer during the attack of locusts?', '', '0', '23-02-16', '0'),
(22, 29, 12, 14, 'What is the drem of martin luther king?', '', '0', '23-02-16', '0'),
(23, 29, 12, 14, 'Describe maulvi abul appearance?', '', '0', '23-02-16', '0'),
(24, 29, 12, 15, 'How much damaging is the violence in life?', '', '0', '23-02-16', ''),
(25, 29, 12, 15, 'Why did mrsteward continue persuading norma?', '', '0', '23-02-16', ''),
(26, 29, 12, 15, 'What was the advice harry bittering gave to the people?', '', '0', '23-02-16', ''),
(27, 29, 12, 15, 'What was the view point of the parents of gorgics?', '', '0', '23-02-16', ''),
(28, 29, 12, 15, 'Why did the boy look to the sky and smiled?', '', '0', '23-02-16', ''),
(29, 29, 12, 15, 'What are the causes of negroes discontentment?', '', 'LQ', '23-02-16', ''),
(30, 29, 12, 15, 'How did AIDE describe the ship?', '', 'LQ', '23-02-16', ''),
(31, 29, 12, 15, 'What was general powers thinking?', '', 'LQ', '23-02-16', ''),
(32, 29, 12, 15, 'What does clay want to put int he local newspaper?', '', 'LQ', '23-02-16', ''),
(33, 29, 12, 15, 'What does clark give harry?', '', 'LQ', '23-02-16', '');

-- --------------------------------------------------------

--
-- Table structure for table `mcqs`
--

CREATE TABLE `mcqs` (
  `mcqs_id` int(255) NOT NULL,
  `class_m_id` int(255) NOT NULL,
  `book_m_id` int(255) NOT NULL,
  `chp_m_id` int(255) NOT NULL,
  `mcqs_ques_eng` varchar(255) NOT NULL,
  `mcqs_ques_urdu` varchar(255) NOT NULL,
  `opt_A_eng` varchar(255) NOT NULL,
  `opt_B_eng` varchar(255) NOT NULL,
  `opt_C_eng` varchar(255) NOT NULL,
  `opt_D_eng` varchar(255) NOT NULL,
  `opt_A_urdu` varchar(255) NOT NULL,
  `opt_B_urdu` varchar(255) NOT NULL,
  `opt_C_urdu` varchar(255) NOT NULL,
  `opt_D_urdu` varchar(255) NOT NULL,
  `mcqs_status` varchar(255) NOT NULL,
  `mcqs_date` varchar(255) NOT NULL,
  `mcqs_correct_ans` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `add_status` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mcqs`
--

INSERT INTO `mcqs` (`mcqs_id`, `class_m_id`, `book_m_id`, `chp_m_id`, `mcqs_ques_eng`, `mcqs_ques_urdu`, `opt_A_eng`, `opt_B_eng`, `opt_C_eng`, `opt_D_eng`, `opt_A_urdu`, `opt_B_urdu`, `opt_C_urdu`, `opt_D_urdu`, `mcqs_status`, `mcqs_date`, `mcqs_correct_ans`, `user_email`, `add_status`) VALUES
(12, 12, 29, 13, 'Where is Quaid-e-Azam born?', 'قائداعظم کہاں پیدا ہوئے؟', 'Lahore', 'Karachi', 'Sialkot\r\n', 'Faisalabad', 'لاہور', 'کراچی', 'سیالکوٹ', 'فیصل آباد', 'MCQS', '23-02-14', 'Option \"B\"', '0', '0'),
(13, 0, 29, 13, 'What is Quaid-e-Azam date of birth?', 'قائداعظم کی تاریخ پیدائش کیا ہے؟', '1876', '1888', '1910\r\n', '1890', '1876', '1888', '1910', '1890', 'MCQS', '23-02-14', 'Option \"A\"', '0', '0'),
(14, 0, 29, 13, 'What is Quaid-e-Azam death date?', 'قائداعظم کی تاریخ وفات کیا ہے؟', '1951', '1949', '1950\r\n', '1948', '1951', '1949', '1950', '1948', 'MCQS', '23-02-14', 'Option \"D\"', '0', '0'),
(15, 12, 30, 19, 'What is allama iqbal date of birth?', '', '1870', '1866', ' 1877\r\n', '1867', '', '', '', '', 'MCQS', '23-02-14', '', '0', '0'),
(16, 12, 30, 19, 'What is allama iqbal date of birth month name?', 'علامہ اقبال کی تاریخ پیدائش کے مہینے کا نام کیا ہے؟', 'November', 'September', 'June\r\n', 'July', 'نومبر', 'ستمبر', 'جون', 'جولائی', 'MCQS', '23-02-14', 'Option \"A\"', '0', '0'),
(17, 12, 30, 19, 'What is allama iqbal date of birth city name?', 'علامہ اقبال کی تاریخ پیدائش شہر کا نام کیا ہے؟', 'Lahore', 'Faisalabad', 'Sialkot\r\n', 'Karachi', 'لاہور', 'فیصل آباد', 'سیالکوٹ', 'کراچی', 'MCQS', '23-02-14', 'Option \"C\"', '0', '0'),
(18, 12, 31, 16, 'What is correct answer :  14*14= ? ', 'صحیح جواب کیا ہے: 14*14=؟', '188', '197', '210\r\n', '196', '188', '197', '210', '196', 'MCQS', '23-02-14', 'Option \"D\"', '0', '0'),
(19, 12, 31, 16, 'What is correct answer :  14*14-26= ? ', 'What is correct answer :  14*14-26= ? ', '196', '170', '180\r\n', '176', '196', '170', '180', '176', 'MCQS', '23-02-14', 'Option \"B\"', '0', '0'),
(20, 12, 31, 16, 'What is correct answer :  14*14*4= ? ', 'صحیح جواب کیا ہے: 14*14*4=؟', '784', '766', '776\r\n', '748', '784', '766', '776', '748', 'MCQS', '23-02-14', 'Option \"A\"', '0', '0'),
(21, 12, 31, 18, 'What is correct answer :  14*14+4= ? ', 'صحیح جواب کیا ہے: 14*14+4=؟', '202', '201', '200\r\n', '204', '202', '201', '200', '204', 'MCQS', '23-02-14', 'Option \"C\"', '0', '0'),
(22, 12, 31, 16, 'what is number 1+2=?', '', '2', '3', '4\r\n', '5', '', '', '', '', 'MCQS', '23-02-26', 'b', '0', '0'),
(29, 12, 29, 15, 'The old man said emphatically', 'بوڑھے نے زور سے کہا', 'sadly', 'happily', 'angrily\r\n', 'forcefully', 'افسوس سے', 'خوشی سے', 'غصے سے', 'زبردستی', 'MCQS', '23-02-27', 'Option \"D\"', '0', '0'),
(30, 12, 29, 15, 'The farm was ringing with the clamour of the gong.', 'کھیت گانگ کے شور سے گونج رہا تھا۔', 'song ', 'music', 'noise \r\n', 'silence', 'نغمہ', 'موسیقی', 'شور', 'خاموشی', 'MCQS', '23-02-27', 'Option \"C\"', '0', '0'),
(31, 12, 29, 14, 'All the trees were queer and still', ' تمام درخت عجیب و غریب تھے۔', 'fresh', 'strong', 'strange\r\n', 'clear', 'تازه', 'مضبوط', 'عجیب', 'صاف', 'MCQS', '23-02-27', 'Option \"C\"', '0', '0'),
(32, 12, 29, 13, 'Locusts were going to be like had weather always imminert.', 'ٹڈی دل ایسے ہی ہونے جا رہے تھے جیسے موسم ہمیشہ بے تاب رہتا تھا', 'abundance', 'had', 'impending\r\n', 'dangerous', 'کثرت', 'تھا', 'آسنن', 'خطرناک', 'MCQS', '23-02-27', 'Option \"C\"', '0', '0'),
(33, 12, 29, 14, 'The countryside was devastated and mingled', 'دیہی علاقے ویران اور گھل مل گئے', 'cultivated', 'danaged', 'ploughed\r\n', 'thronged', 'کاشت', 'نقصان پہنچا', 'ہل چلا', 'ہجوم', 'MCQS', '23-02-27', 'Option \"B\"', '0', '0'),
(34, 12, 29, 14, 'Old Stephen yelled at the house boy', 'بوڑھا سٹیفن گھر کے لڑکے پر چیخا۔', 'called', 'screamed', 'talked\r\n', 'amused', 'بلایا', 'چیخا', 'بات کی', 'دل لگی', 'MCQS', '23-02-27', 'Option \"B\"', '0', '0'),
(35, 12, 29, 14, 'The new mealies were just showing', 'نئے کھانے صرف دکھا رہے تھے۔', 'clouds', 'colours', 'maize\r\n', 'stars', 'بادل', 'رنگ', 'مکئی', 'ستارے', 'MCQS', '23-02-27', 'Option \"C\"', '0', '0'),
(36, 12, 29, 15, 'Piles of wood and grass had been prepared', 'لکڑیوں اور گھاس کے ڈھیر تیار ہو چکے تھے', 'huts', 'bridges', 'beds\r\n', 'heaps', 'جھونپڑی', 'پل', 'بستر', 'ڈھیر', 'MCQS', '23-02-27', 'Option \"D\"', '0', '0'),
(37, 12, 29, 13, 'He picked a stray locust', 'اس نے ایک آوارہ ٹڈی کو اٹھایا', 'wandering', 'straight', 'strong\r\n', 'small', 'آوارہ', 'سیدھا', 'مضبوط', 'چھوٹا', 'MCQS', '23-02-27', 'Option \"A\"', '0', '0'),
(38, 12, 29, 13, 'There were seven patches of bared soil', 'ننگی مٹی کے سات ٹکڑے تھے۔', 'Without crops', 'wet', 'rough\r\n', 'infected', 'فصلوں کے بغیر', 'گیلا', 'کھردرا', 'انفیکشن کا شکار', 'MCQS', '23-02-27', 'Option \"A\"', '0', '0'),
(39, 12, 29, 14, 'The main swarm is not settling', 'مرکزی بھیڑ آباد نہیں ہو رہی ہے۔', 'flying', 'resting', 'screaming\r\n', 'eating', 'پرواز', 'آرام', 'چیخنا', 'کھانا', 'MCQS', '23-02-27', 'Option \"B\"', '0', '0'),
(40, 12, 29, 15, 'It was devastated and mingled countryside', 'یہ تباہی اور ملی جلی دیہی تھی۔', 'Developed', 'Dangerous', 'Destroyed\r\n', 'Populated', 'ترقی یافتہ', 'خطرناک', 'تباہ', 'آباد', 'MCQS', '23-02-27', 'Option \"B\"', '0', '0'),
(41, 12, 29, 14, 'The smoke was rising from myriads of fire', 'ہزاروں آگ سے دھواں اٹھ رہا تھا۔', 'farmers', 'soldiers', 'salves\r\n', 'old men', 'کسان', 'فوجی', 'سالوس', 'بوڑھے آدمی', 'MCQS', '23-02-27', 'Option \"A\"', '0', '0'),
(42, 12, 29, 15, 'How did the locusts attack', 'ٹڈی دل نے کیسے حملہ کیا', 'flutes', 'ugly', 'tin\r\n', 'gongs', 'بانسری', 'بدصورت', 'ٹن', 'گونگس', 'MCQS', '23-02-27', 'Option \"D\"', '0', '0'),
(43, 0, 29, 13, 'I am not unmindful', 'میں بے خبر نہیں ہوں۔', 'human', 'small village', 'sad\r\n', 'hilly', 'انسان', 'چھوٹا گاؤں', 'اداس', 'پہاڑی', 'MCQS', '23-02-27', 'Option \"A\"', '0', '0'),
(45, 5, 8, 19, 'Libero iusto incidid', 'آپ کو ایک عام بچے سے پیار ہو جائے گا۔', 'sdf', 'asdf', 'qwsd\r\n', 'zxs', 'sdf', 'njmf', 'rgy', 'ass', 'MCQS', '23-02-27', 'Camilla Knapp', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `savedpaper`
--

CREATE TABLE `savedpaper` (
  `paper_id` int(255) NOT NULL,
  `paper_name` varchar(255) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `total_marks` varchar(255) NOT NULL,
  `Time` varchar(255) NOT NULL,
  `ASname` varchar(255) NOT NULL,
  `school_logo` varchar(255) NOT NULL,
  `address` varchar(500) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `saved_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `savedpaper`
--

INSERT INTO `savedpaper` (`paper_id`, `paper_name`, `class_name`, `total_marks`, `Time`, `ASname`, `school_logo`, `address`, `user_email`, `subject`, `saved_date`) VALUES
(30, '9th Class English', 'Nine Class', '100', '02:30', 'Ripha', '', 'Gulistan Colony', 'faizan1234@gmail.com', 'English', '23-02-27'),
(38, 'Subjective Part', 'Nine Class', '58', '2 Hours', 'Concordia College', '', 'Chen one road Faisalabad', 'fa921865@gmail.com', 'English', '23-03-01'),
(39, '12345y', 'Nine Class', '', '', '', '', '', 'fa921865@gmail.com', 'English', '23-03-02');

-- --------------------------------------------------------

--
-- Table structure for table `short_ques`
--

CREATE TABLE `short_ques` (
  `short_ques_id` int(255) NOT NULL,
  `class_s_id` int(255) NOT NULL,
  `book_s_id` int(255) NOT NULL,
  `chp_s_id` int(255) NOT NULL,
  `short_ques_eng` varchar(255) NOT NULL,
  `short_ques_urdu` varchar(255) NOT NULL,
  `short_ques_status` varchar(155) NOT NULL,
  `short_ques_date` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `SQadd_status` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `short_ques`
--

INSERT INTO `short_ques` (`short_ques_id`, `class_s_id`, `book_s_id`, `chp_s_id`, `short_ques_eng`, `short_ques_urdu`, `short_ques_status`, `short_ques_date`, `user_email`, `SQadd_status`) VALUES
(11, 12, 29, 13, 'What is allama iqbal date of birth city name?', '', '1', '23-02-16', '0', '0'),
(12, 12, 29, 13, 'Where is Quaid-e-Azam born?', '', '0', '23-02-16', '0', '0'),
(13, 12, 29, 13, 'What is Quaid-e-Azam date of birth?', '', '0', '23-02-16', '0', '0'),
(14, 12, 29, 13, 'What is Quaid-e-Azam death date?', '', '0', '23-02-16', '0', '0'),
(15, 12, 29, 13, 'What is allama iqbal date of birth?', '', '0', '23-02-16', '0', '0'),
(16, 12, 29, 13, 'Allama Iqbal is also know as the poet of the east', '', '0', '23-02-16', '0', '0'),
(17, 12, 29, 13, 'What is allama iqbal death date?', '', '0', '23-02-16', '0', '0'),
(18, 12, 29, 13, 'He gave us the idea of  pakistan', '', '0', '23-02-16', '0', '0'),
(19, 12, 29, 13, 'He awoke the muslims by his poetry', '', '0', '23-02-16', '0', '0'),
(20, 12, 29, 13, 'Allama iqbal he was died on 21st april ', '', '0', '23-02-16', '0', '0'),
(21, 12, 29, 14, 'Why did norma perusade her husband to accept the offer?', '', '0', '23-02-16', '0', '0'),
(22, 12, 29, 14, 'How dangerous can a Martian virus be?', '', '0', '23-02-16', '0', '0'),
(23, 12, 29, 14, 'Why did the people make fun of Hubert\'s innovence?', '', '0', '23-02-16', '0', '0'),
(24, 12, 29, 14, 'How did Gorgius persuade his people to make his country strong?', '', '0', '23-02-16', '0', '0'),
(25, 12, 29, 14, 'What was the remendy suggested by the physicians for the disease of the king?', '', '0', '23-02-16', '0', '0'),
(26, 12, 29, 14, 'What are locusts?', '', '0', '23-02-16', '0', '0'),
(27, 12, 29, 14, 'What should be the criterion of judgement of a person?', '', '0', '23-02-16', '0', '0'),
(28, 12, 29, 14, 'What were the arrangements made for the function of inauguration?', '', '0', '23-02-16', '0', '0'),
(29, 12, 29, 14, 'Why did the king weep?', '', '0', '23-02-16', '0', '0'),
(32, 12, 29, 15, 'What did thery want to grow on mars?', '', '0', '23-02-16', '0', '0'),
(33, 12, 29, 15, 'Why did Georage give the pocketbook to his employer?', '', '0', '23-02-16', '0', '0'),
(34, 12, 29, 15, 'What did terbut thiink of jorkens argument?', '', '0', '23-02-16', '0', '0'),
(35, 12, 29, 15, 'How did the diseased king recover?', '', '0', '23-02-16', '0', '0'),
(36, 12, 29, 15, 'Why are the locausts compared with bad weather?', '', '0', '23-02-16', '', ''),
(37, 12, 29, 15, 'What should be the faith of negroes?', '', '0', '23-02-16', '', ''),
(38, 12, 29, 15, 'What were the reasons norma gave to her husband to accept the offer?', '', '0', '23-02-16', '', ''),
(39, 12, 29, 15, 'Why did harry want to go back to the earth', '', '0', '23-02-16', '', ''),
(40, 12, 29, 15, 'Why doesclay need money?', '', '0', '23-02-16', '', ''),
(41, 12, 29, 0, 'Aliquip at eum conse', 'Leroy Sanders', '', '23-02-27', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `sid` int(155) NOT NULL,
  `sname` varchar(155) NOT NULL,
  `sfname` varchar(155) NOT NULL,
  `scontact` varchar(155) NOT NULL,
  `saddress` varchar(155) NOT NULL,
  `saddress2` varchar(155) NOT NULL,
  `scountry` varchar(155) NOT NULL,
  `scity` varchar(155) NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `semail` varchar(155) NOT NULL,
  `spassword` varchar(155) NOT NULL,
  `sconfirm` varchar(155) NOT NULL,
  `sdate` varchar(155) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`sid`, `sname`, `sfname`, `scontact`, `saddress`, `saddress2`, `scountry`, `scity`, `postal_code`, `semail`, `spassword`, `sconfirm`, `sdate`, `image`) VALUES
(34, 'Ahsan', 'Ali', '03467598264', 'faisalabad', '', 'pakistan', 'faisalabad', '12345', 'ahsan@gmail.com', '123456789', '123456789', '22-12-29', ''),
(50, 'Ahsan', 'Ali', '+92-306-678-1041', 'Gulistan Colony FSD', 'D-Ground People Colony FSD', 'Pakistan', 'Faisalabad', '38000', 'ahsanmirza@gmail.com', '1234567', '1234567', '23-01-05', ''),
(53, 'Shelley Spence', 'Jesse Chen', 'Ut numquam deserunt ', 'Aspernatur perferend', 'Unde iusto et nihil ', 'united states', 'mumbai', 'Quia deleniti perspi', 'kenu@mailinator.com', 'Dolorem corporis sus', 'Dolorem corporis sus', '23-01-05', ''),
(54, 'Ahsan', 'Ali', '03028090100', 'Gulistan ', 'D-Ground', 'Pakistan', 'Faisalabad', '38000', 'aam89626@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', '23-01-16', ''),
(56, 'Odette Mcknight', 'Aladdin Sims', 'Qui ut enim asperior', 'Non a reprehenderit', 'Est impedit tempori', 'Consequatur dicta f', 'Adipisicing consecte', 'Velit iste atque ma', 'ranaijaz0302@gmail.com', '12345', '12345', '23-01-31', ''),
(57, 'Ahsan', 'Mirza', '03021668920', 'Is lamia Park', 'Is lamia Park', 'Pakistan', 'Faisalabad', '38000', 'ahsanmirxa9999@gmail.com', '12345678', '12345678', '23-01-31', '812593.png');

-- --------------------------------------------------------

--
-- Table structure for table `temp_store`
--

CREATE TABLE `temp_store` (
  `tempstore_id` int(255) NOT NULL,
  `status_store` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `questionAttemp` varchar(255) NOT NULL,
  `each_que_mark` varchar(255) NOT NULL,
  `MCQS_SQ_LQ` varchar(255) NOT NULL,
  `Savedpaper_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `temp_store`
--

INSERT INTO `temp_store` (`tempstore_id`, `status_store`, `date`, `time`, `ip_address`, `user_email`, `questionAttemp`, `each_que_mark`, `MCQS_SQ_LQ`, `Savedpaper_id`) VALUES
(82, 'MCQS', '27-02-23', '', '', '0', '3', '1', '[\"12\",\"13\",\"14\"]', 30),
(83, 'SQ', '27-02-23', '', '', '0', '8', '2', '[\"11\",\"12\",\"13\",\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\"]', 30),
(84, 'SQ', '27-02-23', '', '', '0', '5', '2', '[\"17\",\"18\",\"28\",\"29\",\"32\",\"33\",\"34\",\"35\"]', 30),
(85, 'LQ', '27-02-23', '', '', '0', '1', '5', '[\"11\",\"12\",\"14\",\"15\",\"16\",\"17\"]', 30),
(98, 'SQ', '01-03-23', '', '', '0', '6', '2', '[\"14\",\"17\",\"18\",\"20\",\"22\",\"24\"]', 38),
(99, 'SQ', '01-03-23', '', '', '0', '5', '2', '[\"19\",\"22\",\"25\",\"28\",\"35\"]', 38),
(100, 'LQ', '01-03-23', '', '', '0', '1', '9', '[\"12\",\"17\",\"21\"]', 38),
(101, 'MCQS', '02-03-23', '', '', '0', '12', '1', '[\"13\",\"14\",\"31\",\"32\",\"37\",\"38\",\"43\"]', 39);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(115) NOT NULL,
  `uname` varchar(115) NOT NULL,
  `upassword` varchar(155) NOT NULL,
  `uemail` varchar(155) NOT NULL,
  `udate` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `uname`, `upassword`, `uemail`, `udate`) VALUES
(151, 'faizan39865', '202cb962ac59075b964b07152d234b70', 'fa921865@gmail.com', '23-03-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`chp_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `longquestion`
--
ALTER TABLE `longquestion`
  ADD PRIMARY KEY (`longQues_id`);

--
-- Indexes for table `mcqs`
--
ALTER TABLE `mcqs`
  ADD PRIMARY KEY (`mcqs_id`);

--
-- Indexes for table `savedpaper`
--
ALTER TABLE `savedpaper`
  ADD PRIMARY KEY (`paper_id`);

--
-- Indexes for table `short_ques`
--
ALTER TABLE `short_ques`
  ADD PRIMARY KEY (`short_ques_id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `temp_store`
--
ALTER TABLE `temp_store`
  ADD PRIMARY KEY (`tempstore_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `chapter`
--
ALTER TABLE `chapter`
  MODIFY `chp_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `longquestion`
--
ALTER TABLE `longquestion`
  MODIFY `longQues_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `mcqs`
--
ALTER TABLE `mcqs`
  MODIFY `mcqs_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `savedpaper`
--
ALTER TABLE `savedpaper`
  MODIFY `paper_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `short_ques`
--
ALTER TABLE `short_ques`
  MODIFY `short_ques_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `sid` int(155) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `temp_store`
--
ALTER TABLE `temp_store`
  MODIFY `tempstore_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(115) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
