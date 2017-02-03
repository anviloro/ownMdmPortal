
 
-- 
-- Table structure for table `devices` 
-- 
 
CREATE TABLE IF NOT EXISTS `devices` (
  `imei` varchar(100) NOT NULL,
  `gcm` varchar(300) default NULL, 
  `location` varchar(200) default NULL,
  `dateLocation` timestamp NULL default NULL, 
  `enabled` tinyint(4) default NULL,
  `model` varchar(300) default NULL,
  `enabledDate` timestamp NULL default NULL,
  `disabledDate` timestamp NULL default NULL, 
  `ping` timestamp NULL default NULL, 
  PRIMARY KEY  (`imei`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
 
--   
-- Table structure for table `devices_log` 
--       
 
CREATE TABLE IF NOT EXISTS `devices_log` ( 
  `imei` varchar(100) NOT NULL,  
  `log` varchar(500) NOT NULL, 
  `dateLog` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,   
  KEY `imei` (`imei`)    
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



ALTER TABLE `devices` ADD `name` VARCHAR( 200 ) NULL AFTER `imei`;


CREATE USER 'mdm'@'%' IDENTIFIED BY '***';  

GRANT ALL PRIVILEGES ON * . * TO 'mdm'@'%' IDENTIFIED BY '***' WITH GRANT OPTION
 MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 
 MAX_USER_CONNECTIONS 0 ; 

GRANT ALL PRIVILEGES ON `mdm` . * TO 'mdm'@'%'; 
