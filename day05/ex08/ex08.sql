SELECT `last_name`, `first_name`, CAST(`birthdate` as DATE) AS `birthdate` FROM `user_card` WHERE EXTRACT(YEAR FROM `birthdate`) = 1989 ORDER BY `last_name` ASC;
