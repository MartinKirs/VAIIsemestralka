SET NAMES utf8mb4;

DROP TABLE IF EXISTS `doors`;

CREATE TABLE `doors` (
                         `id` INT NOT NULL AUTO_INCREMENT,
                         `name` VARCHAR(50) NOT NULL,
                         `building` VARCHAR(50) NOT NULL,
                         `description` VARCHAR(255) NOT NULL,
                         PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `doors` (`name`, `building`, `description`) VALUES
                                                            ('RB052', 'RB', 'Počítačová učebňa'),
                                                            ('RB053', 'RB', 'Počítačová učebňa'),
                                                            ('RA013', 'RA', 'Prednášková miestnosť'),
                                                            ('RC009', 'RC', 'Aula'),
                                                            ('RA201', 'RA', 'Laboratórium sieťových technológií');