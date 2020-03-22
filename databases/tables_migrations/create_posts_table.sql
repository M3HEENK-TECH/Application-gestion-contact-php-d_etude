CREATE TABLE IF NOT EXISTS `posts`
(
    `id`          int(11)      NOT NULL AUTO_INCREMENT,
    `title`       varchar(255) NOT NULL,
    `content`     longtext     NOT NULL,
    `image`       varchar(255) NOT NULL,
    `category_id` int(11)      NOT NULL,
    `created_at`  datetime     NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at`  datetime              DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB