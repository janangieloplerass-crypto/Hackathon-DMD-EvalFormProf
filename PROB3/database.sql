CREATE DATABASE IF NOT EXISTS `prob3` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `prob3`;

CREATE TABLE `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(13) NOT NULL UNIQUE,
  `year` varchar(10) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `section` varchar(10) DEFAULT NULL,
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `professors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `dept` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `evaluations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(13) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `professor` varchar(100) NOT NULL,
  `section` varchar(10) NOT NULL,
  `metric1` tinyint(1) NOT NULL,
  `metric2` tinyint(1) NOT NULL,
  `metric3` tinyint(1) NOT NULL,
  `rater_type` enum('student','program_head','dean','admin') NOT NULL,
  `submitted_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Sample Students (format XXXX-YY-ZZZZZ)
INSERT INTO `students` (`student_id`, `year`, `dept`) VALUES
('2024-01-00001', '2024-2025', 'College of Business Administration'),
('2024-01-00002', '2024-2025', 'College of Business Administration'),
('2024-02-00003', '2024-2025', 'College of Education'),
('2024-04-00004', '2024-2025', 'College of Computer Studies'),
('2024-05-00005', '2024-2025', 'College of Accountancy');

-- Sample Professors
INSERT INTO `professors` (`name`, `dept`) VALUES
('Dr. John Smith', 'College of Business Administration'),
('Prof. Jane Doe', 'College of Business Administration'),
('Dr. Alice Johnson', 'College of Education'),
('Prof. Bob Wilson', 'College of Computer Studies'),
('Dr. Carol Davis', 'College of Accountancy');
