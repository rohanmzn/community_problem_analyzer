-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2024 at 06:22 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `communityproblemanalyzer`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$rG38Wx9OPMSAi5JLpD4qtehRT2NzzA.WB933cfs04QTOa/5ZsTC.u');

-- --------------------------------------------------------

--
-- Table structure for table `organization_list`
--

CREATE TABLE `organization_list` (
  `ol_id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `organization_name` varchar(255) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` text,
  `link` varchar(255) DEFAULT NULL,
  `recommended_action` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organization_list`
--

INSERT INTO `organization_list` (`ol_id`, `category`, `organization_name`, `phone`, `address`, `link`, `recommended_action`) VALUES
(1, 'child_abuse', 'Central Child Welfare Board (CCWB)', '105', 'Lainchaur, Kathmandu, Nepal', 'https://www.ccwb.gov.np/', 'Report incidents directly to their helpline. File complaints and seek legal support through their offices. Engage in awareness programs facilitated by CCWB.'),
(2, ' child_abuse', 'Child Workers in Nepal (CWIN)', '1098', 'Dillibazar, Kathmandu, Nepal', 'https://cwin.org.np/', 'Use their child helpline (1098) for immediate assistance.Access their shelter homes and counseling services.'),
(3, 'sexual_harassment', 'Women, Children, and Senior Citizen Service Directorate (WCSC)', '1145', 'Naxal, Kathmandu, Nepal', 'https://www.nepalpolice.gov.np/', 'Use the hotline to report harassment or abuse.Visit the nearest police station with specialized desks for women and children.Request psychological support and victim assistance services.'),
(4, 'sexual_harassment', '  Maiti Nepal', '9714492904', 'Gaushala, Kathmandu, Nepal', '  https://maitinepal.org/', 'Seek advice on dealing with digital abuse or harassment.'),
(5, 'sexual_harassment', 'Women\'s Rehabilitation Center (WOREC)', '9715535348', 'Ekantakuna, Lalitpur, Nepal', 'https://www.worecnepal.org/', 'Report incidents and seek legal assistance.Access their psychosocial counseling and rehabilitation programs.Participate in campaigns on ending gender-based violence.'),
(6, 'physical_verbal_abuse', 'National Women Commission (NWC) ', '142567010', 'Prithivi Path, Kathmandu, Nepal', 'https://nwc.gov.np/en/', 'Seek Support Services: Call the NWC\'s 1145 helpline for confidential support, including legal aid and shelter referrals.'),
(7, 'physical_verbal_abuse', 'Saathi', '15191103', 'Nakkhu, Lalitpur, Nepal', 'https://saathi.org.np/', 'Consider Legal Action: Organizations like Saathi can provide guidance on legal options and support throughout the process.'),
(8, 'digital_abuse', 'Nepal Police Cyber Bureau', '01-4411210', 'Kathmandu, Nepal', 'https://cyberbureau.nepalpolice.gov.np/', 'File a complaint regarding cybercrimes such as online harassment, identity theft, or hacking.Provide evidence like screenshots, emails, or messages to support your case.'),
(9, 'digital_abuse', 'ChildSafeNet', '9741673313', 'Lalitpur, Nepal', 'https://www.childsafenet.org/', 'Seek advice on dealing with digital abuse or harassment.'),
(10, 'addiction', 'Recovering Nepal', '01-5521391', 'Kumaripati, Lalitpur, Nepal', 'https://www.recoveringnepal.org.np/', 'Seek counseling and rehabilitation services'),
(11, 'addiction', 'Narconon Nepal', '9771-4650-054', 'Hattigaudat, Kathmandu, Nepal', 'https://www.narcononnepal.org/', 'Detoxification, rehabilitation, and life skills training.'),
(12, 'mental_health_stigma', 'Koshish', '01-5121230', 'Balkhu, Kathmandu, Nepal', 'https://koshish.org.np/', 'Advocacy and support for mental health recovery.'),
(13, 'domestic_violence', 'Women for Women (WFW)', '=977-1-5555555', 'Dillibazar, Kathmandu, Nepal', 'www.womenforwomen.org.np', 'Seek counseling and report domestic violence cases.'),
(14, 'domestic_violence', 'Legal Aid and Consultancy', '977-1-5545454', 'Baneshwor, Kathmandu, Nepal', 'www.legalaidnepal.org', 'Contact for free legal advice and representation.'),
(15, 'domestic_violence', 'Maiti Nepal', '77-1-4492906', 'Gaushala, Kathmandu, Nepal', 'www.maitinepal.org', 'Provide safe shelter for victims of violence.'),
(16, 'domestic_violence', 'National Women Commission', '977-1-5355364', 'BabarMahal, Kathmandu, Nepal', 'www.nwc.gov.np', 'Report cases and seek government assistance.'),
(17, 'animal_abuse', 'Animal Nepal', '977-1-5538068', 'Chobhar, Kathmandu, Nepal', 'www.animalnepal.org', 'Report injured or abused animals for rescue.'),
(18, 'animal_abuse', 'Sneha\'s Care', '977-9801888282', 'Bhainsepati, Lalitpur, Nepal', 'www.snehacare.com', 'Seek shelter and medical care for stray animals.'),
(19, 'animal_abuse', 'Kathmandu Animal Treatment Center', '977-1-4286616', 'Budhanilkantha, Kathmandu, Nepal', 'www.katcentre.org.np', 'Support animal sterilization and vaccination programs.'),
(20, 'animal_abuse', 'Department of Livestock Services', '977-1-5537010', 'Hariharbhawan, Lalitpur, Nepal', 'www.dls.gov.np', 'Contact for official complaints and livestock-related support.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact_no` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `username`, `password`, `email`, `address`, `contact_no`) VALUES
(1, 'Rohan Maharjan', 'rohan', '$2y$10$hf36dYe7H3KSD.CiasIcceqIbwmXwXZgwh9sDt9e1zqlDMF5Hq1Te', 'roharzan@gmail.com', 'Kathmandu', '9861767923'),
(2, 'Nayana Khadgi', 'nayana', '$2y$10$K.R3UR93nD/HqzZdduxqQOtKztZNKRlbDrmC2OXM/t0MbQl62lz6e', 'nayana@gmail.com', 'Kathmandu', '9861767924'),
(3, 'Palpasa', 'palpasa', '$2y$10$HU5/PJypmV0Nck/mhR2oOez56H1bVC4MksTX5JsEoGyz7IBNit01m', 'palpasa@gmail.com', 'Kathmandu', '9876543210');

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `uf_id` int(11) NOT NULL,
  `uf_urgency` varchar(255) DEFAULT NULL,
  `prompt` text NOT NULL,
  `api_category` varchar(255) DEFAULT NULL,
  `api_response` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`uf_id`, `uf_urgency`, `prompt`, `api_category`, `api_response`, `username`) VALUES
(1, 'Low', 'My mother is beating me for not doing homework\r\n', NULL, NULL, 'nayana\r\n'),
(2, 'Low', 'I witnessed someone hitting their dog with a stick for not following commands. The dog seemed scared and in pain.', 'animal_abuse', 'Report the incident to animal control or the police immediately.  Consider contacting a local animal shelter or rescue organization for support.  If you feel safe doing so, try to intervene to stop the abuse, but prioritize your own safety.', 'admin'),
(3, 'Low', 'My partner constantly shouts at me and physically pushes me during arguments. I don\'t know how to escape this situation', 'domestic_violence', 'Seek help from a domestic violence hotline or shelter.  Consider contacting friends, family, or a therapist for support. Develop a safety plan to protect yourself.  There are resources available to help you escape this abusive situation.', 'nayana'),
(4, 'High', 'I witnessed someone hitting their dog with a stick for not following commands. The dog seemed scared and in pain.', 'animal_abuse', 'Contact your local animal control or the ASPCA (American Society for the Prevention of Cruelty to Animals) immediately.  You can also report the incident to the police.  Document what you witnessed (date, time, location, description of the incident and th', 'nayana'),
(5, 'Low', 'My friend told me that her stepfather hits her whenever she doesn\'t finish her homework, and sheâ€™s too afraid to speak up.', 'physical_verbal_abuse', 'Seek immediate help for your friend.  Contact child protective services or a domestic violence hotline.  Encourage your friend to confide in a trusted adult, such as a teacher, counselor, or family member.  Let her know she is not alone and that help is a', 'nayana'),
(6, 'Medium', 'At work, my colleague makes inappropriate comments about my appearance and touches me in ways that make me uncomfortable. I feel trapped.', 'sexual_harassment', 'Report this behavior to your HR department or a supervisor immediately.  Consider documenting each instance of harassment, including dates, times, and witnesses. You may also want to seek legal advice.  If you feel unsafe, consider taking steps to protect', 'nayana'),
(7, 'Low', 'My sibling verbally insults me every day, calling me worthless. Sometimes, they also push me or slap me when angry.\r\n', 'physical_verbal_abuse', 'Seek help from a trusted adult, such as a parent, teacher, or counselor.  Consider contacting a domestic violence hotline or a mental health professional.  You are not alone and deserve to be treated with respect.  Document the instances of abuse and cons', 'nayana'),
(8, 'Low', 'My ex keeps sending me hurtful messages online and monitors my social media accounts without my permission.', 'digital_abuse', 'Consider blocking your ex on all social media platforms and reporting their behavior to the platform.  If the harassment continues or escalates, consider contacting law enforcement and seeking a restraining order.  Document all instances of online harassm', 'nayana'),
(9, 'Low', 'I can\'t seem to stop drinking even though I know it\'s ruining my relationships and health. I feel like I\'m losing control.', 'Addiction', 'Seek help from a medical professional or addiction specialist.  Consider joining a support group like Alcoholics Anonymous (AA).  There are many resources available to help you regain control and overcome your addiction.', 'nayana'),
(10, 'Low', 'Iâ€™m hesitant to talk about my depression because Iâ€™m afraid people will think Iâ€™m weak or that Iâ€™m faking it.', 'mental_health_stigma', 'Seek support from a mental health professional, trusted friend, or family member.  Remember that mental health is important, and seeking help is a sign of strength, not weakness.  There are many resources available to help you cope with your depression.', 'nayana'),
(11, 'Low', 'Iâ€™ve been using drugs to cope with my anxiety and sadness, but now I can\'t stop and itâ€™s affecting my job and relationships', 'Addiction', 'Seek professional help from a doctor or addiction specialist.  Consider joining a support group like Narcotics Anonymous (NA) or similar organizations.  There are many resources available to help you overcome addiction, and seeking help is a sign of stren', 'nayana'),
(12, 'Low', 'I love to play guiar on musical festivals.', 'unknown_not_listed', 'This statement describes a hobby and does not relate to any of the listed categories.', 'nayana'),
(13, 'High', 'My father beats me when i do no do homework on time.', 'physical_verbal_abuse', 'Seek help from a trusted adult, such as a teacher, counselor, or relative.  You can also contact the National Domestic Violence Hotline or Childhelp USA.  Remember that you don\'t deserve to be hit, and there are people who want to help.', 'palpasa'),
(14, 'Low', 'My wife is beating me for not doing housework.', 'domestic_violence', 'Seek help from local women\'s shelters or NGOs in Nepal.  Consider contacting the Nepal Police or a trusted family member or friend for support.  There are resources available to help men experiencing domestic violence, even if it\'s not as widely discussed', 'admin'),
(15, 'High', 'My brother beats me from chocolate.', 'physical_verbal_abuse', 'In Nepal, if your brother is physically hurting you, even over something seemingly minor like chocolate, you should contact the Nepal Police or a women\'s rights organization.  Many NGOs in Nepal offer support and resources for victims of domestic violence', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organization_list`
--
ALTER TABLE `organization_list`
  ADD PRIMARY KEY (`ol_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`uf_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `organization_list`
--
ALTER TABLE `organization_list`
  MODIFY `ol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `uf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
