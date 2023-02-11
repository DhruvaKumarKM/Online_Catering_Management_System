

CREATE TABLE `announcement` (
  `announcement_id` int(11) NOT NULL AUTO_INCREMENT,
  `annouce_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `annouce_place` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `annouce_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `details` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`announcement_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;






CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(50) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

INSERT INTO category VALUES("6","Main Course");
INSERT INTO category VALUES("7","Pasta");
INSERT INTO category VALUES("8","Drinks");
INSERT INTO category VALUES("9","Dessert");
INSERT INTO category VALUES("10","Rice");





CREATE TABLE `combo` (
  `combo_id` int(11) NOT NULL AUTO_INCREMENT,
  `combo_name` varchar(100) NOT NULL,
  `combo_price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`combo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO combo VALUES("3","Combo A","180.00");
INSERT INTO combo VALUES("4","Combo B","220.00");
INSERT INTO combo VALUES("5","Combo C","350.00");
INSERT INTO combo VALUES("6","Non COmbo","250.00");





CREATE TABLE `combo_details` (
  `combo_details_id` int(11) NOT NULL AUTO_INCREMENT,
  `combo_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  PRIMARY KEY (`combo_details_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

INSERT INTO combo_details VALUES("10","3","6");
INSERT INTO combo_details VALUES("11","3","10");
INSERT INTO combo_details VALUES("12","3","8");
INSERT INTO combo_details VALUES("13","3","9");
INSERT INTO combo_details VALUES("14","4","6");
INSERT INTO combo_details VALUES("15","4","6");
INSERT INTO combo_details VALUES("16","4","10");
INSERT INTO combo_details VALUES("17","4","8");
INSERT INTO combo_details VALUES("18","4","9");
INSERT INTO combo_details VALUES("19","5","6");
INSERT INTO combo_details VALUES("20","5","6");
INSERT INTO combo_details VALUES("21","5","7");
INSERT INTO combo_details VALUES("22","5","8");
INSERT INTO combo_details VALUES("23","5","10");
INSERT INTO combo_details VALUES("24","5","9");
INSERT INTO combo_details VALUES("25","6","6");
INSERT INTO combo_details VALUES("26","6","6");
INSERT INTO combo_details VALUES("27","6","6");





CREATE TABLE `event` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_what` varchar(500) NOT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL,
  `event_where` varchar(100) NOT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO event VALUES("1","Company Christmas Party","2016-12-22","10:39:00","CHMSC Gym");
INSERT INTO event VALUES("2","Test","2016-12-24","04:30:00","CHMSC");





CREATE TABLE `member` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_last` varchar(15) NOT NULL,
  `member_first` varchar(15) NOT NULL,
  `member_status` varchar(10) NOT NULL,
  `member_contact` varchar(30) NOT NULL,
  `member_address` varchar(100) NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO member VALUES("1","Aboy","Ken","active","0902323","Silay City");
INSERT INTO member VALUES("2","Callado","Rhen Mark","active","998787","Silay City");
INSERT INTO member VALUES("3","Magbanua","Lee","inactive","","");





CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(50) NOT NULL,
  `cat_id` int(30) NOT NULL,
  `subcat_name` varchar(30) NOT NULL,
  `menu_desc` varchar(100) NOT NULL,
  `menu_price` decimal(10,2) NOT NULL,
  `menu_pic` varchar(100) NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO menu VALUES("1","Beef Simo","6","beef","Beef Salpicao","100.00","indian-food-platter.jpg");
INSERT INTO menu VALUES("2","Bakareta","2","pork","Pork Adobo","100.00","indian-food-platter.jpg");
INSERT INTO menu VALUES("3","Chicken Curry","6","chicken","Chicken Curry","50.00","s5.jpg");
INSERT INTO menu VALUES("4","Plain Rice","10","rice","Plain Rice","15.00","s10.jpg");
INSERT INTO menu VALUES("5","Softdrink","8","drinks","Softdrink","18.00","s1.jpg");
INSERT INTO menu VALUES("6","Buko Pandan","9","dessert","Buko Pandan","35.00","s2.jpg");
INSERT INTO menu VALUES("7","Carbonara","7","pasta","dsds","55.00","s7.jpg");





CREATE TABLE `message` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO message VALUES("1","Test","test@gmail.com","test subject","This is a test message","2016-12-28 16:24:11");
INSERT INTO message VALUES("2","test","test@gmail.com","test subject","this is a test subject","2016-12-30 22:29:39");





CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO payment VALUES("1","5000","0","2017-01-04");
INSERT INTO payment VALUES("2","15000","0","2017-02-01");
INSERT INTO payment VALUES("3","100000","0","2017-03-01");
INSERT INTO payment VALUES("4","50000","0","2017-04-14");
INSERT INTO payment VALUES("5","15000","0","2017-05-10");
INSERT INTO payment VALUES("6","55000","0","2017-06-16");
INSERT INTO payment VALUES("7","30000","29","2017-01-09");





CREATE TABLE `r_combo` (
  `r_combo_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `r_details_id` int(11) NOT NULL,
  PRIMARY KEY (`r_combo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

INSERT INTO r_combo VALUES("1","1","1");
INSERT INTO r_combo VALUES("2","4","1");
INSERT INTO r_combo VALUES("3","5","1");
INSERT INTO r_combo VALUES("4","6","1");
INSERT INTO r_combo VALUES("5","1","3");
INSERT INTO r_combo VALUES("6","1","3");
INSERT INTO r_combo VALUES("7","7","3");
INSERT INTO r_combo VALUES("8","5","3");
INSERT INTO r_combo VALUES("9","6","3");
INSERT INTO r_combo VALUES("10","4","3");
INSERT INTO r_combo VALUES("11","1","4");
INSERT INTO r_combo VALUES("12","1","4");
INSERT INTO r_combo VALUES("13","7","4");
INSERT INTO r_combo VALUES("14","5","4");
INSERT INTO r_combo VALUES("15","6","4");
INSERT INTO r_combo VALUES("16","4","4");
INSERT INTO r_combo VALUES("17","3","5");
INSERT INTO r_combo VALUES("18","1","5");
INSERT INTO r_combo VALUES("19","1","5");





CREATE TABLE `r_details` (
  `r_details_id` int(11) NOT NULL AUTO_INCREMENT,
  `rid` int(11) NOT NULL,
  `combo_id` int(11) NOT NULL,
  `r_nop` int(10) NOT NULL,
  `r_total` decimal(10,2) NOT NULL,
  `r_price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`r_details_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO r_details VALUES("1","27","3","100","18000.00","180.00");
INSERT INTO r_details VALUES("2","28","3","10","1800.00","180.00");
INSERT INTO r_details VALUES("3","29","5","100","35000.00","350.00");
INSERT INTO r_details VALUES("4","29","5","50","12500.00","250.00");
INSERT INTO r_details VALUES("5","29","6","50","12500.00","250.00");





CREATE TABLE `reservation` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `r_date` date NOT NULL,
  `r_time` time NOT NULL,
  `r_last` varchar(30) NOT NULL,
  `r_first` varchar(30) NOT NULL,
  `r_contact` varchar(30) NOT NULL,
  `r_email` varchar(50) NOT NULL,
  `r_address` varchar(100) NOT NULL,
  `r_type` varchar(30) NOT NULL,
  `r_ocassion` varchar(50) NOT NULL,
  `r_motif` varchar(30) NOT NULL,
  `team_id` int(11) NOT NULL,
  `r_venue` varchar(100) NOT NULL,
  `payable` decimal(10,2) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `r_status` varchar(10) NOT NULL,
  `date_reserved` date NOT NULL,
  `r_code` varchar(10) NOT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

INSERT INTO reservation VALUES("26","2017-01-11","10:59:21","Magbanua","Lee","09898","leepipez14@gmail.com","Busay Bago City","","Baptism","dsd","0","dsds","0.00","0.00","finished","2017-01-01","5XhZSscbLo");
INSERT INTO reservation VALUES("27","2017-01-18","09:30:00","Maneja","Ananiel","0905191492","anan@gmail.com","Patag, SIlay City","","Birthday","Pink","0","Civic Center Silay City","18000.00","18000.00","Pending","2017-01-07","x9zVlYaltr");
INSERT INTO reservation VALUES("28","2017-01-10","19:03:14","Valenzuela","Clint","907878","clint@yahoo.com","Silay","","Baptism","pink","0","Talisay City","1800.00","1800.00","","2017-01-09","mMwAXrqhg3");
INSERT INTO reservation VALUES("29","2017-01-25","19:08:25","ABoy","Kenneth","97987","ken@yahoo.com","sjkdskjdjh","","Wedding","Pink","0","kjdsk","60000.00","30000.00","Approved","2017-01-09","Jt8ZHsBe32");
INSERT INTO reservation VALUES("30","0000-00-00","00:00:00","jnj","kjnj","8787","emoblazz@yahoo.com","jhjh","","","","0","","0.00","0.00","","2017-01-09","4xvAR7s7Ba");
INSERT INTO reservation VALUES("31","0000-00-00","00:00:00","jhj","m,jnkjh","98787","emoblazz@yahoo.com","hjhj","","","","0","","0.00","0.00","","2017-01-09","wWt3CGZKXE");





CREATE TABLE `subcategory` (
  `subcat_id` int(11) NOT NULL AUTO_INCREMENT,
  `subcat_name` varchar(30) NOT NULL,
  PRIMARY KEY (`subcat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO subcategory VALUES("1","Breakfast");
INSERT INTO subcategory VALUES("3","Dinner");
INSERT INTO subcategory VALUES("4","Drinks");
INSERT INTO subcategory VALUES("6","Merienda");
INSERT INTO subcategory VALUES("7","Lunch");





CREATE TABLE `team` (
  `team_id` int(11) NOT NULL AUTO_INCREMENT,
  `team_name` varchar(50) NOT NULL,
  PRIMARY KEY (`team_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO team VALUES("1","Team 2");
INSERT INTO team VALUES("3","Team B");
INSERT INTO team VALUES("4","Team ABC");





CREATE TABLE `team_member` (
  `team_member_id` int(11) NOT NULL AUTO_INCREMENT,
  `team_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  PRIMARY KEY (`team_member_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

INSERT INTO team_member VALUES("21","1","1");
INSERT INTO team_member VALUES("22","3","2");
INSERT INTO team_member VALUES("23","1","2");
INSERT INTO team_member VALUES("24","4","2");





CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(50) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO user VALUES("1","Clint Villanueva","chimney_admin","123","active");
INSERT INTO user VALUES("3","Lee Magbanua","admin","lee","inactive");
INSERT INTO user VALUES("4","dsds","dsd","dsds","inactive");



