USE `prob3`;

-- Update existing students with year levels (no duplicates)
UPDATE `students` SET `year` = '2nd Year' WHERE `student_id` = '2024-01-00001';
UPDATE `students` SET `year` = '2nd Year' WHERE `student_id` = '2024-01-00002';
UPDATE `students` SET `year` = '3rd Year' WHERE `student_id` = '2023-02-00003';
UPDATE `students` SET `year` = '4th Year' WHERE `student_id` = '2024-04-00004';
UPDATE `students` SET `year` = '2nd Year' WHERE `student_id` = '2024-05-00005';

-- Add new 1st Year students (no duplicate IDs)
INSERT IGNORE INTO `students` (`student_id`, `year`, `dept`) VALUES
('2025-01-00006', '1st Year', 'College of Business Administration'),
('2025-02-00007', '1st Year', 'College of Education'),
('2025-04-00008', '1st Year', 'College of Computer Studies');

