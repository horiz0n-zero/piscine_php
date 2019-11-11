SELECT UPPER(`last_name`) AS `NAME`, `first_name`, `price` FROM `user_card`, `member`, `subscription` WHERE `subscription`.`id_sub` = `member`.`id_sub` AND `member`.`id_user_card` = `user_card`.`id_user` AND `price` > 42 ORDER BY last_name, first_name ASC;