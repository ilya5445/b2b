CREATE TABLE `users` (
    `id`         INT(11) NOT NULL AUTO_INCREMENT,
    `name`       VARCHAR(255) DEFAULT NULL,
    `gender`     INT(11) NOT NULL COMMENT '0 - не указан, 1 - мужчина, 2 - женщина.',
    `birth_date` INT(11) NOT NULL COMMENT 'Дата в unixtime.',
    PRIMARY KEY (`id`)
);

CREATE TABLE `phone_numbers` (
    `id`      INT(11) NOT NULL AUTO_INCREMENT,
    `user_id` INT(11) NOT NULL,
    `phone`   VARCHAR(255) DEFAULT NULL,
    PRIMARY KEY (`id`)
);

-- Добавление индексов
ALTER TABLE users ADD INDEX `gender` (`gender`);
ALTER TABLE users ADD INDEX `birth_date` (`birth_date`);
ALTER TABLE phone_numbers ADD INDEX `user_id` (`user_id`);

-- или 
ALTER TABLE users ADD INDEX `gender_birth_date` (`gender`, `birth_date`) USING BTREE;
ALTER TABLE phone_numbers ADD INDEX `user_id` (`user_id`);

-- Сам запрос
SELECT u.`name`, COUNT(pn.`id`) 
FROM `users` u
JOIN `phone_numbers` pn ON pn.`user_id` = u.`id`
WHERE u.`gender` = 2 AND TIMESTAMPDIFF(YEAR, FROM_UNIXTIME(u.`birth_date`), NOW()) BETWEEN 18 AND 22
GROUP BY pn.`id`