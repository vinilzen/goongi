-- phpMyAdmin SQL Dump
-- version 3.2.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 27, 2011 at 05:30 PM
-- Server version: 5.1.40
-- PHP Version: 5.2.12

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `goongi`
--

-- --------------------------------------------------------

--
-- Table structure for table `mf_gifts`
--

CREATE TABLE IF NOT EXISTS `mf_gifts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_id` varchar(55) DEFAULT NULL,
  `to_id` varchar(55) DEFAULT NULL,
  `gift` int(5) DEFAULT NULL,
  `message` text,
  `private` int(1) DEFAULT NULL,
  `date` varchar(55) DEFAULT NULL,
  `filetype` varchar(4) DEFAULT NULL,
  `lang` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Table structure for table `mf_gifts_data`
--

CREATE TABLE IF NOT EXISTS `mf_gifts_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filetype` varchar(4) DEFAULT NULL,
  `type` int(5) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `lang` int(16) DEFAULT NULL,
  `date` varchar(55) DEFAULT NULL,
  `hits` int(55) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=23 ;

-- --------------------------------------------------------

--
-- Table structure for table `mf_gifts_type`
--

CREATE TABLE IF NOT EXISTS `mf_gifts_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(2) DEFAULT NULL,
  `lang` int(16) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_actionmedia`
--

CREATE TABLE IF NOT EXISTS `se_actionmedia` (
  `actionmedia_id` int(9) NOT NULL AUTO_INCREMENT,
  `actionmedia_action_id` int(9) NOT NULL,
  `actionmedia_path` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `actionmedia_link` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `actionmedia_width` int(3) NOT NULL,
  `actionmedia_height` int(3) NOT NULL,
  PRIMARY KEY (`actionmedia_id`),
  KEY `actionmedia_action_id` (`actionmedia_action_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=87 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_actions`
--

CREATE TABLE IF NOT EXISTS `se_actions` (
  `action_id` int(9) NOT NULL AUTO_INCREMENT,
  `action_actiontype_id` int(9) NOT NULL DEFAULT '0',
  `action_date` int(14) NOT NULL DEFAULT '0',
  `action_user_id` int(9) NOT NULL DEFAULT '0',
  `action_text` text COLLATE utf8_unicode_ci NOT NULL,
  `action_object_owner` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `action_object_owner_id` int(9) NOT NULL DEFAULT '0',
  `action_object_privacy` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`action_id`),
  KEY `action_user_id` (`action_user_id`),
  KEY `action_date` (`action_date`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=310 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_actiontypes`
--

CREATE TABLE IF NOT EXISTS `se_actiontypes` (
  `actiontype_id` int(9) NOT NULL AUTO_INCREMENT,
  `actiontype_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `actiontype_icon` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `actiontype_setting` int(1) NOT NULL DEFAULT '0',
  `actiontype_enabled` int(1) NOT NULL DEFAULT '0',
  `actiontype_desc` int(9) NOT NULL DEFAULT '0',
  `actiontype_text` int(9) NOT NULL DEFAULT '0',
  `actiontype_vars` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `actiontype_media` int(1) NOT NULL,
  PRIMARY KEY (`actiontype_id`),
  UNIQUE KEY `actiontype_name` (`actiontype_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_admins`
--

CREATE TABLE IF NOT EXISTS `se_admins` (
  `admin_id` int(9) NOT NULL AUTO_INCREMENT,
  `admin_username` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `admin_password` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `admin_password_method` tinyint(1) NOT NULL DEFAULT '0',
  `admin_code` varchar(16) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `admin_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `admin_email` varchar(70) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `admin_enabled` tinyint(1) NOT NULL DEFAULT '1',
  `admin_language_id` smallint(3) NOT NULL DEFAULT '1',
  `admin_lostpassword_code` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `admin_lostpassword_time` int(14) NOT NULL DEFAULT '0',
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `UNIQUE` (`admin_username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_ads`
--

CREATE TABLE IF NOT EXISTS `se_ads` (
  `ad_id` int(9) NOT NULL AUTO_INCREMENT,
  `ad_name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ad_date_start` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ad_date_end` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ad_paused` int(1) DEFAULT '0',
  `ad_limit_views` int(10) DEFAULT '0',
  `ad_limit_clicks` int(10) DEFAULT '0',
  `ad_limit_ctr` varchar(8) COLLATE utf8_unicode_ci DEFAULT '0',
  `ad_public` int(1) DEFAULT '0',
  `ad_position` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ad_levels` text COLLATE utf8_unicode_ci,
  `ad_subnets` text COLLATE utf8_unicode_ci,
  `ad_html` text COLLATE utf8_unicode_ci,
  `ad_total_views` int(10) DEFAULT '0',
  `ad_total_clicks` int(10) DEFAULT '0',
  `ad_filename` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vizitkientry_user_id` int(10) NOT NULL,
  `vizitkientry_body` longtext COLLATE utf8_unicode_ci,
  `vizitkientry_category` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vizitkientry_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vizitkientry_site` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vizitkientry_price` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vizitkientry_telephon` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vizitkientry_email` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vizitkientry_contry` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vizitkientry_city` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ad_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=32 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_announcements`
--

CREATE TABLE IF NOT EXISTS `se_announcements` (
  `announcement_id` int(9) NOT NULL AUTO_INCREMENT,
  `announcement_order` int(9) NOT NULL DEFAULT '0',
  `announcement_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `announcement_subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `announcement_body` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`announcement_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_blogcomments`
--

CREATE TABLE IF NOT EXISTS `se_blogcomments` (
  `blogcomment_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `blogcomment_blogentry_id` int(10) unsigned NOT NULL DEFAULT '0',
  `blogcomment_authoruser_id` int(10) unsigned NOT NULL DEFAULT '0',
  `blogcomment_date` bigint(20) NOT NULL DEFAULT '0',
  `blogcomment_body` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`blogcomment_id`),
  KEY `INDEX` (`blogcomment_blogentry_id`,`blogcomment_authoruser_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=28 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_blogentries`
--

CREATE TABLE IF NOT EXISTS `se_blogentries` (
  `blogentry_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `blogentry_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `blogentry_blogentrycat_id` int(10) unsigned NOT NULL DEFAULT '0',
  `blogentry_date` bigint(20) NOT NULL DEFAULT '0',
  `blogentry_views` int(10) unsigned NOT NULL DEFAULT '0',
  `blogentry_title` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `blogentry_body` longtext COLLATE utf8_unicode_ci,
  `blogentry_search` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `blogentry_privacy` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `blogentry_comments` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `blogentry_trackbacks` text COLLATE utf8_unicode_ci,
  `blogentry_totalcomments` smallint(5) unsigned NOT NULL DEFAULT '0',
  `blogentry_totaltrackbacks` smallint(5) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`blogentry_id`),
  KEY `LISTBYDATE` (`blogentry_user_id`,`blogentry_privacy`,`blogentry_date`),
  KEY `LISTBYCAT` (`blogentry_user_id`,`blogentry_blogentrycat_id`,`blogentry_privacy`,`blogentry_date`),
  KEY `blogentry_date` (`blogentry_date`),
  FULLTEXT KEY `SEARCH` (`blogentry_title`,`blogentry_body`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_blogentrycats`
--

CREATE TABLE IF NOT EXISTS `se_blogentrycats` (
  `blogentrycat_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `blogentrycat_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `blogentrycat_title` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `blogentrycat_languagevar_id` int(10) unsigned NOT NULL DEFAULT '0',
  `blogentrycat_parentcat_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`blogentrycat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_blogpings`
--

CREATE TABLE IF NOT EXISTS `se_blogpings` (
  `blogping_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `blogping_blogentry_id` int(10) unsigned NOT NULL DEFAULT '0',
  `blogping_target_url` text COLLATE utf8_unicode_ci,
  `blogping_source_url` text COLLATE utf8_unicode_ci,
  `blogping_status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `blogping_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `blogping_ip` varchar(16) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`blogping_id`),
  KEY `INDEX` (`blogping_status`,`blogping_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_blogstyles`
--

CREATE TABLE IF NOT EXISTS `se_blogstyles` (
  `blogstyle_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `blogstyle_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `blogstyle_css` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`blogstyle_id`),
  KEY `INDEX` (`blogstyle_user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_blogsubscriptions`
--

CREATE TABLE IF NOT EXISTS `se_blogsubscriptions` (
  `blogsubscription_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `blogsubscription_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `blogsubscription_owner_id` int(10) unsigned NOT NULL DEFAULT '0',
  `blogsubscription_date` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`blogsubscription_id`),
  UNIQUE KEY `INDEX` (`blogsubscription_user_id`,`blogsubscription_owner_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_blogtrackbacks`
--

CREATE TABLE IF NOT EXISTS `se_blogtrackbacks` (
  `blogtrackback_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `blogtrackback_blogentry_id` int(10) unsigned NOT NULL DEFAULT '0',
  `blogtrackback_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `blogtrackback_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `blogtrackback_excerpt` text COLLATE utf8_unicode_ci,
  `blogtrackback_excerpthash` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `blogtrackback_url` text COLLATE utf8_unicode_ci,
  `blogtrackback_ip` varchar(16) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `blogtrackback_date` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`blogtrackback_id`),
  KEY `INDEX` (`blogtrackback_blogentry_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_eventalbums`
--

CREATE TABLE IF NOT EXISTS `se_eventalbums` (
  `eventalbum_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `eventalbum_event_id` int(10) unsigned NOT NULL DEFAULT '0',
  `eventalbum_datecreated` int(10) unsigned NOT NULL DEFAULT '0',
  `eventalbum_dateupdated` int(10) unsigned NOT NULL DEFAULT '0',
  `eventalbum_title` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `eventalbum_desc` text COLLATE utf8_unicode_ci,
  `eventalbum_search` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `eventalbum_privacy` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `eventalbum_comments` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `eventalbum_cover` int(10) unsigned NOT NULL DEFAULT '0',
  `eventalbum_views` int(10) unsigned NOT NULL DEFAULT '0',
  `eventalbum_tag` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `eventalbum_totalfiles` smallint(5) unsigned NOT NULL DEFAULT '0',
  `eventalbum_totalspace` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`eventalbum_id`),
  KEY `INDEX` (`eventalbum_event_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_eventcats`
--

CREATE TABLE IF NOT EXISTS `se_eventcats` (
  `eventcat_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `eventcat_dependency` int(10) unsigned NOT NULL DEFAULT '0',
  `eventcat_title` int(10) unsigned NOT NULL DEFAULT '0',
  `eventcat_order` smallint(5) unsigned NOT NULL DEFAULT '0',
  `eventcat_signup` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`eventcat_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_eventcomments`
--

CREATE TABLE IF NOT EXISTS `se_eventcomments` (
  `eventcomment_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `eventcomment_event_id` int(10) unsigned NOT NULL DEFAULT '0',
  `eventcomment_authoruser_id` int(10) unsigned NOT NULL DEFAULT '0',
  `eventcomment_date` int(10) unsigned NOT NULL DEFAULT '0',
  `eventcomment_body` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`eventcomment_id`),
  KEY `INDEX` (`eventcomment_event_id`,`eventcomment_authoruser_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_eventfields`
--

CREATE TABLE IF NOT EXISTS `se_eventfields` (
  `eventfield_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `eventfield_eventcat_id` int(10) unsigned NOT NULL DEFAULT '0',
  `eventfield_order` smallint(5) unsigned NOT NULL DEFAULT '0',
  `eventfield_dependency` int(10) unsigned NOT NULL DEFAULT '0',
  `eventfield_title` int(10) unsigned NOT NULL DEFAULT '0',
  `eventfield_desc` int(10) unsigned NOT NULL DEFAULT '0',
  `eventfield_error` int(10) unsigned NOT NULL DEFAULT '0',
  `eventfield_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `eventfield_style` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `eventfield_maxlength` smallint(5) unsigned NOT NULL DEFAULT '0',
  `eventfield_link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `eventfield_options` longtext COLLATE utf8_unicode_ci,
  `eventfield_required` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `eventfield_regex` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `eventfield_html` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `eventfield_search` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `eventfield_signup` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `eventfield_display` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `eventfield_special` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`eventfield_id`),
  KEY `INDEX` (`eventfield_eventcat_id`,`eventfield_dependency`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_eventmedia`
--

CREATE TABLE IF NOT EXISTS `se_eventmedia` (
  `eventmedia_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `eventmedia_eventalbum_id` int(10) unsigned NOT NULL DEFAULT '0',
  `eventmedia_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `eventmedia_date` int(10) unsigned NOT NULL DEFAULT '0',
  `eventmedia_title` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `eventmedia_desc` text COLLATE utf8_unicode_ci,
  `eventmedia_ext` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `eventmedia_filesize` int(10) unsigned NOT NULL DEFAULT '0',
  `eventmedia_totalcomments` smallint(5) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`eventmedia_id`),
  KEY `INDEX` (`eventmedia_eventalbum_id`),
  KEY `USER` (`eventmedia_user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_eventmediacomments`
--

CREATE TABLE IF NOT EXISTS `se_eventmediacomments` (
  `eventmediacomment_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `eventmediacomment_eventmedia_id` int(10) unsigned NOT NULL DEFAULT '0',
  `eventmediacomment_authoruser_id` int(10) unsigned NOT NULL DEFAULT '0',
  `eventmediacomment_date` int(10) unsigned NOT NULL DEFAULT '0',
  `eventmediacomment_body` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`eventmediacomment_id`),
  KEY `INDEX` (`eventmediacomment_eventmedia_id`,`eventmediacomment_authoruser_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_eventmediatags`
--

CREATE TABLE IF NOT EXISTS `se_eventmediatags` (
  `eventmediatag_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `eventmediatag_eventmedia_id` int(10) unsigned NOT NULL DEFAULT '0',
  `eventmediatag_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `eventmediatag_x` int(10) unsigned NOT NULL DEFAULT '0',
  `eventmediatag_y` int(10) unsigned NOT NULL DEFAULT '0',
  `eventmediatag_height` int(10) unsigned NOT NULL DEFAULT '0',
  `eventmediatag_width` int(10) unsigned NOT NULL DEFAULT '0',
  `eventmediatag_text` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `eventmediatag_date` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`eventmediatag_id`),
  KEY `INDEX` (`eventmediatag_eventmedia_id`,`eventmediatag_user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_eventmembers`
--

CREATE TABLE IF NOT EXISTS `se_eventmembers` (
  `eventmember_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `eventmember_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `eventmember_event_id` int(10) unsigned NOT NULL DEFAULT '0',
  `eventmember_status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `eventmember_approved` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `eventmember_rank` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `eventmember_title` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `eventmember_rsvp` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`eventmember_id`),
  KEY `INDEX` (`eventmember_user_id`,`eventmember_event_id`),
  KEY `STATUS` (`eventmember_status`,`eventmember_approved`,`eventmember_rsvp`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_events`
--

CREATE TABLE IF NOT EXISTS `se_events` (
  `event_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `event_eventcat_id` int(10) unsigned NOT NULL DEFAULT '0',
  `event_datecreated` int(10) unsigned NOT NULL DEFAULT '0',
  `event_dateupdated` int(10) unsigned NOT NULL DEFAULT '0',
  `event_views` int(10) unsigned NOT NULL DEFAULT '0',
  `event_title` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `event_desc` text COLLATE utf8_unicode_ci,
  `event_date_start` bigint(20) unsigned NOT NULL DEFAULT '0',
  `event_date_end` bigint(20) unsigned NOT NULL DEFAULT '0',
  `event_host` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `event_location` text COLLATE utf8_unicode_ci,
  `event_photo` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `event_search` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `event_privacy` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `event_comments` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `event_inviteonly` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `event_upload` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `event_tag` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `event_invite` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `event_totalcomments` smallint(5) unsigned NOT NULL DEFAULT '0',
  `event_totalmembers` smallint(5) unsigned NOT NULL DEFAULT '0',
  `event_title_cleaned` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`event_id`),
  KEY `INDEX` (`event_user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_eventstyles`
--

CREATE TABLE IF NOT EXISTS `se_eventstyles` (
  `eventstyle_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `eventstyle_event_id` int(10) unsigned NOT NULL DEFAULT '0',
  `eventstyle_css` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`eventstyle_id`),
  KEY `INDEX` (`eventstyle_event_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_eventvalues`
--

CREATE TABLE IF NOT EXISTS `se_eventvalues` (
  `eventvalue_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `eventvalue_event_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`eventvalue_id`),
  KEY `INDEX` (`eventvalue_event_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_family`
--

CREATE TABLE IF NOT EXISTS `se_family` (
  `family_id` int(11) NOT NULL AUTO_INCREMENT,
  `family_name` varchar(255) NOT NULL,
  `family_createdate` int(11) NOT NULL,
  UNIQUE KEY `family_id` (`family_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=36 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_faqcats`
--

CREATE TABLE IF NOT EXISTS `se_faqcats` (
  `faqcat_id` int(9) NOT NULL AUTO_INCREMENT,
  `faqcat_order` int(5) NOT NULL DEFAULT '0',
  `faqcat_title` int(9) NOT NULL DEFAULT '0',
  PRIMARY KEY (`faqcat_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_faqs`
--

CREATE TABLE IF NOT EXISTS `se_faqs` (
  `faq_id` int(9) NOT NULL AUTO_INCREMENT,
  `faq_faqcat_id` int(9) NOT NULL DEFAULT '0',
  `faq_order` int(5) NOT NULL DEFAULT '0',
  `faq_subject` int(9) NOT NULL DEFAULT '0',
  `faq_content` int(9) NOT NULL DEFAULT '0',
  `faq_datecreated` int(14) NOT NULL DEFAULT '0',
  `faq_dateupdated` int(14) NOT NULL DEFAULT '0',
  `faq_views` int(9) NOT NULL DEFAULT '0',
  PRIMARY KEY (`faq_id`),
  KEY `faq_faqcat_id` (`faq_faqcat_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_friendexplains`
--

CREATE TABLE IF NOT EXISTS `se_friendexplains` (
  `friendexplain_id` int(9) NOT NULL AUTO_INCREMENT,
  `friendexplain_friend_id` int(9) NOT NULL DEFAULT '0',
  `friendexplain_body` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`friendexplain_id`),
  KEY `friend_id` (`friendexplain_friend_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=65 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_friends`
--

CREATE TABLE IF NOT EXISTS `se_friends` (
  `friend_id` int(9) NOT NULL AUTO_INCREMENT,
  `friend_user_id1` int(9) NOT NULL DEFAULT '0',
  `friend_user_id2` int(9) NOT NULL DEFAULT '0',
  `friend_status` int(1) NOT NULL DEFAULT '0',
  `friend_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`friend_id`),
  UNIQUE KEY `friend_user_id` (`friend_user_id1`,`friend_user_id2`),
  KEY `friend_status` (`friend_status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=65 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_groups`
--

CREATE TABLE IF NOT EXISTS `se_groups` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  UNIQUE KEY `group_id` (`group_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=18 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_group_users`
--

CREATE TABLE IF NOT EXISTS `se_group_users` (
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  UNIQUE KEY `group_id` (`group_id`,`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Table structure for table `se_historycomments`
--

CREATE TABLE IF NOT EXISTS `se_historycomments` (
  `historycomment_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `historycomment_historyentry_id` int(10) unsigned NOT NULL DEFAULT '0',
  `historycomment_authoruser_id` int(10) unsigned NOT NULL DEFAULT '0',
  `historycomment_date` bigint(20) NOT NULL DEFAULT '0',
  `historycomment_body` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`historycomment_id`),
  KEY `INDEX` (`historycomment_historyentry_id`,`historycomment_authoruser_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_historyentries`
--

CREATE TABLE IF NOT EXISTS `se_historyentries` (
  `historyentry_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `historyentry_user_id` int(10) NOT NULL DEFAULT '0',
  `historyentry_historyentrycat_id` int(10) unsigned NOT NULL DEFAULT '0',
  `historyentry_date` bigint(20) NOT NULL DEFAULT '0',
  `historyentry_views` int(10) unsigned NOT NULL DEFAULT '0',
  `historyentry_title` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `historyentry_body` longtext COLLATE utf8_unicode_ci,
  `historyentry_search` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `historyentry_privacy` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `historyentry_comments` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `historyentry_trackbacks` text COLLATE utf8_unicode_ci,
  `historyentry_totalcomments` smallint(5) unsigned NOT NULL DEFAULT '0',
  `historyentry_totaltrackbacks` smallint(5) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`historyentry_id`),
  KEY `LISTBYDATE` (`historyentry_user_id`,`historyentry_privacy`,`historyentry_date`),
  KEY `LISTBYCAT` (`historyentry_user_id`,`historyentry_historyentrycat_id`,`historyentry_privacy`,`historyentry_date`),
  KEY `historyentry_date` (`historyentry_date`),
  FULLTEXT KEY `SEARCH` (`historyentry_title`,`historyentry_body`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_historyentrycats`
--

CREATE TABLE IF NOT EXISTS `se_historyentrycats` (
  `historyentrycat_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `historyentrycat_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `historyentrycat_title` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `historyentrycat_languagevar_id` int(10) unsigned NOT NULL DEFAULT '0',
  `historyentrycat_parentcat_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`historyentrycat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_historypings`
--

CREATE TABLE IF NOT EXISTS `se_historypings` (
  `historyping_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `historyping_historyentry_id` int(10) unsigned NOT NULL DEFAULT '0',
  `historyping_target_url` text COLLATE utf8_unicode_ci,
  `historyping_source_url` text COLLATE utf8_unicode_ci,
  `historyping_status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `historyping_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `historyping_ip` varchar(16) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`historyping_id`),
  KEY `INDEX` (`historyping_status`,`historyping_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_historystyles`
--

CREATE TABLE IF NOT EXISTS `se_historystyles` (
  `historystyle_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `historystyle_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `historystyle_css` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`historystyle_id`),
  KEY `INDEX` (`historystyle_user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_historysubscriptions`
--

CREATE TABLE IF NOT EXISTS `se_historysubscriptions` (
  `historysubscription_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `historysubscription_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `historysubscription_owner_id` int(10) unsigned NOT NULL DEFAULT '0',
  `historysubscription_date` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`historysubscription_id`),
  UNIQUE KEY `INDEX` (`historysubscription_user_id`,`historysubscription_owner_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_historytrackbacks`
--

CREATE TABLE IF NOT EXISTS `se_historytrackbacks` (
  `historytrackback_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `historytrackback_historyentry_id` int(10) unsigned NOT NULL DEFAULT '0',
  `historytrackback_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `historytrackback_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `historytrackback_excerpt` text COLLATE utf8_unicode_ci,
  `historytrackback_excerpthash` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `historytrackback_url` text COLLATE utf8_unicode_ci,
  `historytrackback_ip` varchar(16) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `historytrackback_date` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`historytrackback_id`),
  KEY `INDEX` (`historytrackback_historyentry_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_invites`
--

CREATE TABLE IF NOT EXISTS `se_invites` (
  `invite_id` int(9) NOT NULL AUTO_INCREMENT,
  `invite_user_id` int(9) NOT NULL DEFAULT '0',
  `invite_date` int(14) NOT NULL DEFAULT '0',
  `invite_email` varchar(70) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `invite_code` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`invite_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_languages`
--

CREATE TABLE IF NOT EXISTS `se_languages` (
  `language_id` int(9) NOT NULL AUTO_INCREMENT,
  `language_code` varchar(8) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `language_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `language_autodetect_regex` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `language_setlocale` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `language_default` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`language_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_languagevars`
--

CREATE TABLE IF NOT EXISTS `se_languagevars` (
  `languagevar_id` int(9) unsigned NOT NULL DEFAULT '0',
  `languagevar_language_id` int(9) NOT NULL DEFAULT '0',
  `languagevar_value` text COLLATE utf8_unicode_ci,
  `languagevar_default` text COLLATE utf8_unicode_ci,
  UNIQUE KEY `INDEX` (`languagevar_id`,`languagevar_language_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `se_levels`
--

CREATE TABLE IF NOT EXISTS `se_levels` (
  `level_id` int(9) NOT NULL AUTO_INCREMENT,
  `level_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `level_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `level_default` int(1) NOT NULL DEFAULT '0',
  `level_signup` int(1) NOT NULL DEFAULT '0',
  `level_message_allow` int(1) NOT NULL DEFAULT '0',
  `level_message_inbox` int(3) NOT NULL DEFAULT '0',
  `level_message_outbox` int(3) NOT NULL DEFAULT '0',
  `level_message_recipients` int(3) NOT NULL DEFAULT '1',
  `level_profile_style` int(1) NOT NULL DEFAULT '0',
  `level_profile_style_sample` int(1) NOT NULL DEFAULT '0',
  `level_profile_block` int(1) NOT NULL DEFAULT '0',
  `level_profile_search` int(1) NOT NULL DEFAULT '0',
  `level_profile_privacy` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `level_profile_comments` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `level_profile_status` int(1) NOT NULL DEFAULT '0',
  `level_profile_invisible` int(1) NOT NULL,
  `level_profile_views` int(1) NOT NULL,
  `level_profile_change` int(1) NOT NULL DEFAULT '0',
  `level_profile_delete` int(1) NOT NULL DEFAULT '0',
  `level_photo_allow` int(1) NOT NULL DEFAULT '0',
  `level_photo_width` varchar(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `level_photo_height` varchar(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `level_photo_exts` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `level_blog_view` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `level_blog_create` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `level_blog_entries` smallint(5) unsigned NOT NULL DEFAULT '20',
  `level_blog_style` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `level_blog_search` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `level_blog_privacy` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'a:6:{i:0;s:1:"1";i:1;s:1:"3";i:2;s:1:"7";i:3;s:2:"15";i:4;s:2:"31";i:5;s:2:"63";}',
  `level_blog_comments` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'a:7:{i:0;s:1:"0";i:1;s:1:"1";i:2;s:1:"3";i:3;s:1:"7";i:4;s:2:"15";i:5;s:2:"31";i:6;s:2:"63";}',
  `level_blog_trackbacks_allow` tinyint(4) NOT NULL DEFAULT '1',
  `level_blog_trackbacks_detect` tinyint(4) NOT NULL DEFAULT '1',
  `level_blog_html` text COLLATE utf8_unicode_ci,
  `level_blog_category_create` tinyint(4) NOT NULL DEFAULT '1',
  `level_history_view` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `level_history_create` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `level_history_entries` smallint(5) unsigned NOT NULL DEFAULT '20',
  `level_history_style` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `level_history_search` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `level_history_privacy` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'a:6:{i:0;s:1:"1";i:1;s:1:"3";i:2;s:1:"7";i:3;s:2:"15";i:4;s:2:"31";i:5;s:2:"63";}',
  `level_history_comments` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'a:7:{i:0;s:1:"0";i:1;s:1:"1";i:2;s:1:"3";i:3;s:1:"7";i:4;s:2:"15";i:5;s:2:"31";i:6;s:2:"63";}',
  `level_history_trackbacks_allow` tinyint(4) NOT NULL DEFAULT '1',
  `level_history_trackbacks_detect` tinyint(4) NOT NULL DEFAULT '1',
  `level_history_html` text COLLATE utf8_unicode_ci,
  `level_history_category_create` tinyint(4) NOT NULL DEFAULT '1',
  `level_event_allow` tinyint(3) unsigned NOT NULL DEFAULT '7',
  `level_event_photo` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `level_event_photo_width` varchar(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT '200',
  `level_event_photo_height` varchar(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT '200',
  `level_event_photo_exts` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'jpeg,jpg,gif,png',
  `level_event_inviteonly` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `level_event_style` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `level_event_album_exts` text COLLATE utf8_unicode_ci,
  `level_event_album_mimes` text COLLATE utf8_unicode_ci,
  `level_event_album_storage` bigint(20) NOT NULL DEFAULT '5242880',
  `level_event_album_maxsize` bigint(20) NOT NULL DEFAULT '2048000',
  `level_event_album_width` varchar(4) COLLATE utf8_unicode_ci NOT NULL DEFAULT '500',
  `level_event_album_height` varchar(4) COLLATE utf8_unicode_ci NOT NULL DEFAULT '500',
  `level_event_search` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `level_event_privacy` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'a:6:{i:0;s:1:"3";i:1;s:1:"7";i:2;s:2:"15";i:3;s:2:"31";i:4;s:2:"63";i:5;s:3:"127";}',
  `level_event_comments` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'a:8:{i:0;s:1:"0";i:1;s:1:"1";i:2;s:1:"3";i:3;s:1:"7";i:4;s:2:"15";i:5;s:2:"31";i:6;s:2:"63";i:7;s:3:"127";}',
  `level_event_html` text COLLATE utf8_unicode_ci,
  `level_event_backdate` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `level_vizitki_view` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `level_vizitki_create` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `level_vizitki_entries` smallint(5) unsigned NOT NULL DEFAULT '20',
  `level_vizitki_style` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `level_vizitki_search` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `level_vizitki_privacy` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'a:6:{i:0;s:1:"1";i:1;s:1:"3";i:2;s:1:"7";i:3;s:2:"9";i:4;s:2:"31";i:5;s:2:"63";}',
  `level_vizitki_comments` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'a:7:{i:0;s:1:"0";i:1;s:1:"1";i:2;s:1:"3";i:3;s:1:"7";i:4;s:2:"9";i:5;s:2:"31";i:6;s:2:"63";}',
  `level_vizitki_trackbacks_allow` tinyint(4) NOT NULL DEFAULT '1',
  `level_vizitki_trackbacks_detect` tinyint(4) NOT NULL DEFAULT '1',
  `level_vizitki_html` text COLLATE utf8_unicode_ci,
  `level_vizitki_category_create` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`level_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_logins`
--

CREATE TABLE IF NOT EXISTS `se_logins` (
  `login_id` int(9) NOT NULL AUTO_INCREMENT,
  `login_email` varchar(70) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `login_date` int(14) NOT NULL DEFAULT '0',
  `login_ip` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `login_result` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`login_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=140 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_notifys`
--

CREATE TABLE IF NOT EXISTS `se_notifys` (
  `notify_id` int(9) NOT NULL AUTO_INCREMENT,
  `notify_user_id` int(9) NOT NULL DEFAULT '0',
  `notify_notifytype_id` int(9) NOT NULL DEFAULT '0',
  `notify_object_id` int(9) NOT NULL,
  `notify_urlvars` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `notify_text` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`notify_id`),
  KEY `notify_user_id` (`notify_user_id`),
  KEY `notify_object_id` (`notify_object_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=134 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_notifytypes`
--

CREATE TABLE IF NOT EXISTS `se_notifytypes` (
  `notifytype_id` int(9) NOT NULL AUTO_INCREMENT,
  `notifytype_icon` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `notifytype_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `notifytype_title` int(9) NOT NULL DEFAULT '0',
  `notifytype_url` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `notifytype_desc` int(9) NOT NULL DEFAULT '0',
  `notifytype_group` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`notifytype_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_plugins`
--

CREATE TABLE IF NOT EXISTS `se_plugins` (
  `plugin_id` int(9) NOT NULL AUTO_INCREMENT,
  `plugin_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `plugin_version` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `plugin_type` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `plugin_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `plugin_icon` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `plugin_menu_title` int(9) NOT NULL,
  `plugin_pages_main` text COLLATE utf8_unicode_ci NOT NULL,
  `plugin_pages_level` text COLLATE utf8_unicode_ci NOT NULL,
  `plugin_url_htaccess` text COLLATE utf8_unicode_ci NOT NULL,
  `plugin_disabled` tinyint(1) NOT NULL DEFAULT '0',
  `plugin_order` smallint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`plugin_id`),
  UNIQUE KEY `plugin_type` (`plugin_type`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_pmconvoops`
--

CREATE TABLE IF NOT EXISTS `se_pmconvoops` (
  `pmconvoop_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pmconvoop_pmconvo_id` int(10) unsigned NOT NULL DEFAULT '0',
  `pmconvoop_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `pmconvoop_read` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `pmconvoop_deleted_inbox` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `pmconvoop_deleted_outbox` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `pmconvoop_pmdate` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pmconvoop_id`),
  UNIQUE KEY `INDEX` (`pmconvoop_pmconvo_id`,`pmconvoop_user_id`),
  KEY `total_outbox` (`pmconvoop_user_id`,`pmconvoop_deleted_outbox`,`pmconvoop_read`),
  KEY `last_pm_date` (`pmconvoop_pmdate`),
  KEY `total_inbox` (`pmconvoop_user_id`,`pmconvoop_deleted_inbox`,`pmconvoop_read`,`pmconvoop_pmdate`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=51 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_pmconvos`
--

CREATE TABLE IF NOT EXISTS `se_pmconvos` (
  `pmconvo_id` int(9) NOT NULL AUTO_INCREMENT,
  `pmconvo_subject` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `pmconvo_recipients` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`pmconvo_id`),
  KEY `pmconvo_recipients` (`pmconvo_recipients`),
  FULLTEXT KEY `SEARCH` (`pmconvo_subject`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_pms`
--

CREATE TABLE IF NOT EXISTS `se_pms` (
  `pm_id` int(9) NOT NULL AUTO_INCREMENT,
  `pm_authoruser_id` int(9) NOT NULL DEFAULT '0',
  `pm_pmconvo_id` int(9) NOT NULL DEFAULT '0',
  `pm_date` int(14) NOT NULL DEFAULT '0',
  `pm_body` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`pm_id`),
  KEY `pm_pmconvo_id` (`pm_pmconvo_id`),
  KEY `list_subquery` (`pm_pmconvo_id`,`pm_authoruser_id`,`pm_id`),
  FULLTEXT KEY `SEARCH` (`pm_body`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=31 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_profilecats`
--

CREATE TABLE IF NOT EXISTS `se_profilecats` (
  `profilecat_id` int(9) NOT NULL AUTO_INCREMENT,
  `profilecat_title` int(9) NOT NULL DEFAULT '0',
  `profilecat_dependency` int(9) NOT NULL DEFAULT '0',
  `profilecat_order` int(2) NOT NULL DEFAULT '0',
  `profilecat_signup` int(1) NOT NULL,
  PRIMARY KEY (`profilecat_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_profilecomments`
--

CREATE TABLE IF NOT EXISTS `se_profilecomments` (
  `profilecomment_id` int(9) NOT NULL AUTO_INCREMENT,
  `profilecomment_user_id` int(9) NOT NULL DEFAULT '0',
  `profilecomment_authoruser_id` int(9) NOT NULL DEFAULT '0',
  `profilecomment_date` int(14) NOT NULL DEFAULT '0',
  `profilecomment_body` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`profilecomment_id`),
  KEY `profilecomment_user_id` (`profilecomment_user_id`,`profilecomment_authoruser_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=67 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_profilefields`
--

CREATE TABLE IF NOT EXISTS `se_profilefields` (
  `profilefield_id` int(9) NOT NULL AUTO_INCREMENT,
  `profilefield_profilecat_id` int(9) NOT NULL DEFAULT '0',
  `profilefield_order` int(3) NOT NULL DEFAULT '0',
  `profilefield_dependency` int(9) NOT NULL DEFAULT '0',
  `profilefield_title` int(9) NOT NULL DEFAULT '0',
  `profilefield_desc` int(9) NOT NULL DEFAULT '0',
  `profilefield_error` int(9) NOT NULL DEFAULT '0',
  `profilefield_type` int(1) NOT NULL DEFAULT '0',
  `profilefield_signup` int(1) NOT NULL DEFAULT '0',
  `profilefield_style` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `profilefield_maxlength` int(3) NOT NULL DEFAULT '0',
  `profilefield_link` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `profilefield_options` longtext COLLATE utf8_unicode_ci,
  `profilefield_display` int(1) NOT NULL DEFAULT '1',
  `profilefield_required` int(1) NOT NULL DEFAULT '0',
  `profilefield_regex` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `profilefield_special` int(1) NOT NULL DEFAULT '0',
  `profilefield_html` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `profilefield_search` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`profilefield_id`),
  KEY `INDEX` (`profilefield_profilecat_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_profilestyles`
--

CREATE TABLE IF NOT EXISTS `se_profilestyles` (
  `profilestyle_id` int(9) NOT NULL AUTO_INCREMENT,
  `profilestyle_user_id` int(9) NOT NULL DEFAULT '0',
  `profilestyle_css` text COLLATE utf8_unicode_ci,
  `profilestyle_stylesample_id` int(9) NOT NULL DEFAULT '0',
  PRIMARY KEY (`profilestyle_id`),
  KEY `profilestyle_user_id` (`profilestyle_user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_profilevalues`
--

CREATE TABLE IF NOT EXISTS `se_profilevalues` (
  `profilevalue_id` int(9) NOT NULL AUTO_INCREMENT,
  `profilevalue_user_id` int(9) NOT NULL DEFAULT '0',
  `profilevalue_2` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `profilevalue_3` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `profilevalue_4` date NOT NULL DEFAULT '0000-00-00',
  `profilevalue_5` int(2) DEFAULT '-1',
  `profilevalue_7` int(2) DEFAULT '-1',
  `profilevalue_8` int(2) DEFAULT '-1',
  `profilevalue_11` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `profilevalue_12` date NOT NULL DEFAULT '0000-00-00',
  `profilevalue_13` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`profilevalue_id`),
  KEY `INDEX` (`profilevalue_user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=29 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_profileviews`
--

CREATE TABLE IF NOT EXISTS `se_profileviews` (
  `profileview_user_id` int(1) NOT NULL,
  `profileview_views` int(9) NOT NULL,
  `profileview_viewers` text COLLATE utf8_unicode_ci NOT NULL,
  UNIQUE KEY `profileview_user_id` (`profileview_user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `se_reports`
--

CREATE TABLE IF NOT EXISTS `se_reports` (
  `report_id` int(9) NOT NULL AUTO_INCREMENT,
  `report_user_id` int(9) NOT NULL DEFAULT '0',
  `report_url` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `report_reason` int(1) NOT NULL DEFAULT '0',
  `report_details` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`report_id`),
  KEY `INDEX` (`report_user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_role_in_family`
--

CREATE TABLE IF NOT EXISTS `se_role_in_family` (
  `family_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL,
  UNIQUE KEY `family_id_2` (`family_id`,`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Table structure for table `se_session_auth`
--

CREATE TABLE IF NOT EXISTS `se_session_auth` (
  `session_auth_key` char(40) COLLATE utf8_unicode_ci NOT NULL,
  `session_auth_user_id` int(9) NOT NULL,
  `session_auth_ip` int(9) NOT NULL,
  `session_auth_ua` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `session_auth_type` tinyint(1) NOT NULL,
  `session_auth_time` int(9) NOT NULL,
  PRIMARY KEY (`session_auth_key`),
  KEY `CLEANUP` (`session_auth_time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `se_session_data`
--

CREATE TABLE IF NOT EXISTS `se_session_data` (
  `session_data_id` char(32) NOT NULL,
  `session_data_body` longtext NOT NULL,
  `session_data_expires` int(11) NOT NULL,
  PRIMARY KEY (`session_data_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `se_settings`
--

CREATE TABLE IF NOT EXISTS `se_settings` (
  `setting_id` int(9) NOT NULL AUTO_INCREMENT,
  `setting_key` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `setting_version` varchar(16) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `setting_online` tinyint(1) NOT NULL DEFAULT '1',
  `setting_url` tinyint(1) NOT NULL DEFAULT '0',
  `setting_username` tinyint(1) NOT NULL DEFAULT '1',
  `setting_password_method` tinyint(1) NOT NULL DEFAULT '1',
  `setting_password_code_length` tinyint(2) NOT NULL DEFAULT '16',
  `setting_lang_allow` int(1) NOT NULL DEFAULT '1',
  `setting_lang_autodetect` tinyint(1) NOT NULL DEFAULT '1',
  `setting_lang_anonymous` tinyint(1) NOT NULL DEFAULT '1',
  `setting_timezone` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-8',
  `setting_dateformat` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'n/j/Y',
  `setting_timeformat` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'g:i A',
  `setting_permission_profile` tinyint(1) NOT NULL DEFAULT '1',
  `setting_permission_invite` tinyint(1) NOT NULL DEFAULT '1',
  `setting_permission_search` tinyint(1) NOT NULL DEFAULT '1',
  `setting_permission_portal` tinyint(1) NOT NULL DEFAULT '1',
  `setting_banned_ips` text COLLATE utf8_unicode_ci,
  `setting_banned_emails` text COLLATE utf8_unicode_ci,
  `setting_banned_usernames` text COLLATE utf8_unicode_ci,
  `setting_banned_words` text COLLATE utf8_unicode_ci,
  `setting_comment_code` tinyint(1) NOT NULL DEFAULT '0',
  `setting_comment_html` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `setting_connection_allow` tinyint(1) NOT NULL DEFAULT '3',
  `setting_connection_framework` tinyint(1) NOT NULL DEFAULT '0',
  `setting_connection_types` text COLLATE utf8_unicode_ci,
  `setting_connection_other` tinyint(1) NOT NULL DEFAULT '1',
  `setting_connection_explain` tinyint(1) NOT NULL DEFAULT '1',
  `setting_signup_photo` tinyint(1) NOT NULL DEFAULT '0',
  `setting_signup_enable` tinyint(1) NOT NULL DEFAULT '1',
  `setting_signup_welcome` tinyint(1) NOT NULL DEFAULT '1',
  `setting_signup_invite` tinyint(1) NOT NULL DEFAULT '0',
  `setting_signup_invite_checkemail` tinyint(1) NOT NULL DEFAULT '0',
  `setting_signup_invite_numgiven` smallint(3) NOT NULL DEFAULT '5',
  `setting_signup_invitepage` tinyint(1) NOT NULL DEFAULT '0',
  `setting_signup_verify` tinyint(1) NOT NULL DEFAULT '0',
  `setting_signup_code` tinyint(1) NOT NULL DEFAULT '1',
  `setting_signup_randpass` tinyint(1) NOT NULL DEFAULT '0',
  `setting_signup_tos` tinyint(1) NOT NULL DEFAULT '1',
  `setting_invite_code` tinyint(1) NOT NULL DEFAULT '1',
  `setting_actions_showlength` int(14) NOT NULL DEFAULT '2629743',
  `setting_actions_actionsperuser` smallint(2) NOT NULL DEFAULT '7',
  `setting_actions_selfdelete` smallint(2) NOT NULL DEFAULT '1',
  `setting_actions_privacy` smallint(2) NOT NULL DEFAULT '1',
  `setting_actions_actionsonprofile` smallint(2) NOT NULL DEFAULT '7',
  `setting_actions_actionsinlist` smallint(2) NOT NULL DEFAULT '35',
  `setting_actions_visibility` smallint(2) NOT NULL DEFAULT '1',
  `setting_actions_preference` smallint(1) NOT NULL DEFAULT '1',
  `setting_subnet_field1_id` int(9) NOT NULL DEFAULT '-2',
  `setting_subnet_field2_id` int(9) NOT NULL DEFAULT '-2',
  `setting_email_fromname` varchar(70) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `setting_email_fromemail` varchar(70) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `setting_cache_enabled` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `setting_cache_default` varchar(32) COLLATE utf8_unicode_ci DEFAULT 'file',
  `setting_cache_lifetime` int(9) unsigned DEFAULT '120',
  `setting_cache_file_options` text COLLATE utf8_unicode_ci,
  `setting_cache_memcache_options` text COLLATE utf8_unicode_ci,
  `setting_cache_xcache_options` text COLLATE utf8_unicode_ci,
  `setting_session_options` text COLLATE utf8_unicode_ci,
  `setting_contact_code` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `setting_login_code` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `setting_login_code_failedcount` smallint(2) unsigned NOT NULL DEFAULT '0',
  `setting_stats_remote` tinyint(1) NOT NULL DEFAULT '1',
  `setting_stats_remote_last` int(11) NOT NULL DEFAULT '0',
  `setting_permission_blog` tinyint(4) NOT NULL DEFAULT '1',
  `setting_permission_event` tinyint(4) NOT NULL DEFAULT '1',
  `setting_permission_vizitki` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`setting_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_statrefs`
--

CREATE TABLE IF NOT EXISTS `se_statrefs` (
  `statref_id` int(9) NOT NULL AUTO_INCREMENT,
  `statref_hits` int(9) NOT NULL DEFAULT '0',
  `statref_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`statref_id`),
  UNIQUE KEY `statref_url` (`statref_url`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_stats`
--

CREATE TABLE IF NOT EXISTS `se_stats` (
  `stat_id` int(9) NOT NULL AUTO_INCREMENT,
  `stat_date` int(9) NOT NULL DEFAULT '0',
  `stat_views` int(9) NOT NULL DEFAULT '0',
  `stat_logins` int(9) NOT NULL DEFAULT '0',
  `stat_signups` int(9) NOT NULL DEFAULT '0',
  `stat_friends` int(9) NOT NULL DEFAULT '0',
  PRIMARY KEY (`stat_id`),
  UNIQUE KEY `stat_date` (`stat_date`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=47 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_stylesamples`
--

CREATE TABLE IF NOT EXISTS `se_stylesamples` (
  `stylesample_id` int(9) NOT NULL AUTO_INCREMENT,
  `stylesample_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `stylesample_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `stylesample_thumb` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `stylesample_css` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`stylesample_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_subnets`
--

CREATE TABLE IF NOT EXISTS `se_subnets` (
  `subnet_id` int(9) NOT NULL AUTO_INCREMENT,
  `subnet_name` int(10) unsigned NOT NULL DEFAULT '0',
  `subnet_field1_qual` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `subnet_field1_value` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `subnet_field2_qual` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `subnet_field2_value` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`subnet_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_systememails`
--

CREATE TABLE IF NOT EXISTS `se_systememails` (
  `systememail_id` int(9) NOT NULL AUTO_INCREMENT,
  `systememail_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `systememail_title` int(9) NOT NULL,
  `systememail_desc` int(9) NOT NULL,
  `systememail_subject` int(9) NOT NULL,
  `systememail_body` int(9) NOT NULL,
  `systememail_vars` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`systememail_id`),
  UNIQUE KEY `systememail_name` (`systememail_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_trees`
--

CREATE TABLE IF NOT EXISTS `se_trees` (
  `tree_id` int(11) NOT NULL,
  `tree_name` varchar(255) NOT NULL,
  `tree_create` int(11) NOT NULL,
  `tree_update` int(11) NOT NULL,
  `creator` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Table structure for table `se_tree_users`
--

CREATE TABLE IF NOT EXISTS `se_tree_users` (
  `tree_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  UNIQUE KEY `tree_id` (`tree_id`,`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Table structure for table `se_urls`
--

CREATE TABLE IF NOT EXISTS `se_urls` (
  `url_id` int(9) NOT NULL AUTO_INCREMENT,
  `url_title` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `url_file` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `url_regular` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `url_subdirectory` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`url_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_users`
--

CREATE TABLE IF NOT EXISTS `se_users` (
  `user_id` int(9) NOT NULL AUTO_INCREMENT,
  `user_level_id` int(9) NOT NULL DEFAULT '0',
  `user_subnet_id` int(9) NOT NULL DEFAULT '0',
  `user_profilecat_id` int(9) NOT NULL DEFAULT '0',
  `user_email` varchar(70) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `user_newemail` varchar(70) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `user_fname` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `user_lname` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `user_username` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `user_displayname` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_password` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `user_password_method` tinyint(1) NOT NULL DEFAULT '0',
  `user_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `user_enabled` int(1) NOT NULL DEFAULT '0',
  `user_verified` int(1) NOT NULL DEFAULT '0',
  `user_language_id` int(9) NOT NULL DEFAULT '0',
  `user_signupdate` int(14) NOT NULL DEFAULT '0',
  `user_lastlogindate` int(14) NOT NULL DEFAULT '0',
  `user_lastactive` int(14) NOT NULL DEFAULT '0',
  `user_ip_signup` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `user_ip_lastactive` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `user_status` varchar(190) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `user_status_date` int(14) NOT NULL DEFAULT '0',
  `user_logins` int(9) NOT NULL DEFAULT '0',
  `user_invitesleft` int(3) NOT NULL DEFAULT '0',
  `user_timezone` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `user_dateupdated` int(14) NOT NULL DEFAULT '0',
  `user_blocklist` text COLLATE utf8_unicode_ci,
  `user_invisible` int(1) NOT NULL DEFAULT '0',
  `user_saveviews` int(1) NOT NULL DEFAULT '0',
  `user_photo` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `user_search` int(1) NOT NULL DEFAULT '0',
  `user_privacy` int(2) NOT NULL DEFAULT '0',
  `user_comments` int(2) NOT NULL DEFAULT '0',
  `user_hasnotifys` tinyint(1) NOT NULL DEFAULT '0',
  `user_father` int(11) NOT NULL,
  `user_mother` int(11) NOT NULL,
  `user_spouse` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_username` (`user_username`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_usersettings`
--

CREATE TABLE IF NOT EXISTS `se_usersettings` (
  `usersetting_id` int(9) NOT NULL AUTO_INCREMENT,
  `usersetting_user_id` int(9) NOT NULL DEFAULT '0',
  `usersetting_lostpassword_code` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `usersetting_lostpassword_time` int(14) NOT NULL DEFAULT '0',
  `usersetting_notify_friendrequest` int(1) NOT NULL DEFAULT '0',
  `usersetting_notify_message` int(1) NOT NULL DEFAULT '0',
  `usersetting_notify_profilecomment` int(1) NOT NULL DEFAULT '0',
  `usersetting_actions_dontpublish` text COLLATE utf8_unicode_ci NOT NULL,
  `usersetting_actions_display` text COLLATE utf8_unicode_ci NOT NULL,
  `usersetting_displayname_method` tinyint(1) NOT NULL DEFAULT '1',
  `usersetting_notify_blogcomment` int(1) NOT NULL DEFAULT '1',
  `usersetting_notify_blogtrackback` tinyint(4) NOT NULL DEFAULT '1',
  `usersetting_notify_newblogsubscriptionentry` tinyint(4) NOT NULL DEFAULT '1',
  `usersetting_notify_eventinvite` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `usersetting_notify_eventcomment` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `usersetting_notify_eventmediacomment` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `usersetting_notify_eventmemberrequest` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `usersetting_notify_neweventtag` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `usersetting_notify_eventmediatag` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `usersetting_notify_vizitkicomment` int(1) NOT NULL DEFAULT '1',
  `usersetting_notify_vizitkitrackback` tinyint(4) NOT NULL DEFAULT '1',
  `usersetting_notify_newvizitkisubscriptionentry` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`usersetting_id`),
  UNIQUE KEY `usersetting_user_id` (`usersetting_user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_user_candle`
--

CREATE TABLE IF NOT EXISTS `se_user_candle` (
  `user_candle_id` int(11) NOT NULL,
  `user_candle_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `user_candle_photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Table structure for table `se_visitors`
--

CREATE TABLE IF NOT EXISTS `se_visitors` (
  `visitor_ip` int(11) NOT NULL DEFAULT '0',
  `visitor_browser` char(32) CHARACTER SET ascii COLLATE ascii_bin NOT NULL DEFAULT '',
  `visitor_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `visitor_user_username` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `visitor_user_displayname` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `visitor_lastactive` int(14) NOT NULL DEFAULT '0',
  `visitor_invisible` tinyint(14) NOT NULL DEFAULT '0',
  UNIQUE KEY `UNIQUE` (`visitor_ip`,`visitor_browser`,`visitor_user_id`),
  KEY `LASTACTIVE` (`visitor_lastactive`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `se_vizitkicomments`
--

CREATE TABLE IF NOT EXISTS `se_vizitkicomments` (
  `vizitkicomment_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `vizitkicomment_vizitkientry_id` int(10) unsigned NOT NULL DEFAULT '0',
  `vizitkicomment_authoruser_id` int(10) unsigned NOT NULL DEFAULT '0',
  `vizitkicomment_date` bigint(20) NOT NULL DEFAULT '0',
  `vizitkicomment_body` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`vizitkicomment_id`),
  KEY `INDEX` (`vizitkicomment_vizitkientry_id`,`vizitkicomment_authoruser_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_vizitkientries`
--

CREATE TABLE IF NOT EXISTS `se_vizitkientries` (
  `vizitkientry_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `vizitkientry_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `vizitkientry_vizitkientrycat_id` int(10) unsigned NOT NULL DEFAULT '0',
  `vizitkientry_date` bigint(20) NOT NULL DEFAULT '0',
  `vizitkientry_views` int(10) unsigned NOT NULL DEFAULT '0',
  `vizitkientry_title` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vizitkientry_body` longtext COLLATE utf8_unicode_ci,
  `vizitkientry_search` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `vizitkientry_privacy` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `vizitkientry_comments` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `vizitkientry_trackbacks` text COLLATE utf8_unicode_ci,
  `vizitkientry_totalcomments` smallint(5) unsigned NOT NULL DEFAULT '0',
  `vizitkientry_totaltrackbacks` smallint(5) unsigned NOT NULL DEFAULT '0',
  `vizitkientry_category` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `vizitkientry_image` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `vizitkientry_price` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `vizitkientry_telephon` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `vizitkientry_email` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `vizitkientry_site` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `vizitkientry_contry` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vizitkientry_city` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`vizitkientry_id`),
  KEY `LISTBYDATE` (`vizitkientry_user_id`,`vizitkientry_privacy`,`vizitkientry_date`),
  KEY `LISTBYCAT` (`vizitkientry_user_id`,`vizitkientry_vizitkientrycat_id`,`vizitkientry_privacy`,`vizitkientry_date`),
  KEY `vizitkientry_date` (`vizitkientry_date`),
  FULLTEXT KEY `SEARCH` (`vizitkientry_title`,`vizitkientry_body`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=59 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_vizitkientrycats`
--

CREATE TABLE IF NOT EXISTS `se_vizitkientrycats` (
  `vizitkientrycat_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `vizitkientrycat_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `vizitkientrycat_title` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `vizitkientrycat_languagevar_id` int(10) unsigned NOT NULL DEFAULT '0',
  `vizitkientrycat_parentcat_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`vizitkientrycat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_vizitkipings`
--

CREATE TABLE IF NOT EXISTS `se_vizitkipings` (
  `vizitkiping_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `vizitkiping_vizitkientry_id` int(10) unsigned NOT NULL DEFAULT '0',
  `vizitkiping_target_url` text COLLATE utf8_unicode_ci,
  `vizitkiping_source_url` text COLLATE utf8_unicode_ci,
  `vizitkiping_status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `vizitkiping_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `vizitkiping_ip` varchar(16) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`vizitkiping_id`),
  KEY `INDEX` (`vizitkiping_status`,`vizitkiping_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_vizitkisetting`
--

CREATE TABLE IF NOT EXISTS `se_vizitkisetting` (
  `vizitkisetting_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `vizitkisetting_category` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vizitkisetting_country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vizitkisetting_city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`vizitkisetting_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_vizitkistyles`
--

CREATE TABLE IF NOT EXISTS `se_vizitkistyles` (
  `vizitkistyle_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `vizitkistyle_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `vizitkistyle_css` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`vizitkistyle_id`),
  KEY `INDEX` (`vizitkistyle_user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_vizitkisubscriptions`
--

CREATE TABLE IF NOT EXISTS `se_vizitkisubscriptions` (
  `vizitkisubscription_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `vizitkisubscription_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `vizitkisubscription_owner_id` int(10) unsigned NOT NULL DEFAULT '0',
  `vizitkisubscription_date` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`vizitkisubscription_id`),
  UNIQUE KEY `INDEX` (`vizitkisubscription_user_id`,`vizitkisubscription_owner_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `se_vizitkitrackbacks`
--

CREATE TABLE IF NOT EXISTS `se_vizitkitrackbacks` (
  `vizitkitrackback_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `vizitkitrackback_vizitkientry_id` int(10) unsigned NOT NULL DEFAULT '0',
  `vizitkitrackback_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `vizitkitrackback_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `vizitkitrackback_excerpt` text COLLATE utf8_unicode_ci,
  `vizitkitrackback_excerpthash` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `vizitkitrackback_url` text COLLATE utf8_unicode_ci,
  `vizitkitrackback_ip` varchar(16) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `vizitkitrackback_date` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`vizitkitrackback_id`),
  KEY `INDEX` (`vizitkitrackback_vizitkientry_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `unions`
--

CREATE TABLE IF NOT EXISTS `unions` (
  `pm` int(11) NOT NULL,
  `pf` int(11) NOT NULL,
  `childs` varchar(255) NOT NULL,
  UNIQUE KEY `pm` (`pm`,`pf`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;
