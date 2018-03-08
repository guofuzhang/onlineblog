create table if not exists 'blog_admin_user' (
/* id 整形,非空,自动,主键
 2.用户名:varchar(20),非空
 3.密码 char 32 非空
 4.真实姓名,
 5.电话,char11;
 6.角色
 7.last_login_ip defautl null
 8.last_login_time default null
 */
'id' int(11) not null auto_increment primary key,
'logname' varchar(20) not null,
'password' varchar(32) not null,
'realname' varchar(20) not null,
'tel' char(11) not null,
'rolename'  enum('0','1') not NULL
)engine=MyISAM default charset=utf8;

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  `name` varchar(16) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `last_login_ip` char(15) DEFAULT NULL,
  `last_login_time` int(10) DEFAULT NULL,
  `login_times` int(11) NOT NULL DEFAULT '0',
  `status` smallint(1) NOT NULL DEFAULT '1',
  `role` tinyint(1) NOT NULL DEFAULT '0',
  `addate` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;