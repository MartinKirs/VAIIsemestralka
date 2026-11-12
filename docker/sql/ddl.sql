SET NAMES utf8mb4;

DROP TABLE IF EXISTS `access_requests`;
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
                                                            ('RA013', 'RA', 'Počítačová učebňa'),
                                                            ('RC009', 'RC', 'Prednášková miestnosť'),
                                                            ('RB003', 'RB', 'Laboratórium sieťových technológií');

CREATE TABLE `access_requests` (
                                   `id` INT NOT NULL AUTO_INCREMENT,
                                   `applicant_name` VARCHAR(100) NOT NULL,
                                   `door_id` INT NOT NULL,
                                   `reason` VARCHAR(255) NOT NULL,
                                   `status` VARCHAR(30) NOT NULL DEFAULT 'Čaká na schválenie',
                                   PRIMARY KEY (`id`),
                                   CONSTRAINT `fk_access_requests_doors`
                                       FOREIGN KEY (`door_id`) REFERENCES `doors` (`id`)
                                           ON DELETE CASCADE
                                           ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `access_requests` (`applicant_name`, `door_id`, `reason`, `status`) VALUES
                                                                                    ('Peter Novák', 1, 'Vypracovanie bakalárskej práce', 'Schválené'),
                                                                                    ('Ing. Jana Kováčová', 5, 'Výučba predmetu Počítačové siete', 'Schválené'),
                                                                                    ('Marek Hruška', 2, 'Prístup na večerné cvičenia', 'Čaká na schválenie'),
                                                                                    ('Mgr. Lucia Bieliková', 2, 'Prístup na laboratórne cvičenia', 'Čaká na schválenie'),
                                                                                    ('Tomáš Krajčovič', 4, 'Prístup na prednášky', 'Zamietnuté');
