/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  ahcj
 * Created: 2017-8-20
 */

drop table  if exists `news`;

create table if not exists `news`(
        `id`    int    unsigned auto_increment,
        `title`     varchar(50)     not null,
        `thumb` varchar(250),
        `content`   text,
        `created_at`  timestamp,
        `updated_at`  timestamp,
     
          primary key (`id`)
 
)engine=innodb default charset=utf8