USE `prob3`;

-- Perfect year level students (first 4 digits → year level)
-- Clear and re-insert unique examples
DELETE FROM `students` WHERE student_id LIKE '20%';

INSERT INTO `students` (`student_id`, `year`, `dept`) VALUES
('2025-01-00001', '1st Year', 'College of Business Administration'),
('2024-01-00002', '2nd Year', 'College of Business Administration'),
('2023-01-00003', '3rd Year', 'College of Education'),
('2022-01-00004', '4th Year', 'College of Computer Studies');

