-- Database design for CoreJudge
CREATE DATABASE IF NOT EXISTS CoreJudge;
USE CoreJudge;

-- ===========================
-- ACCOUNTS (Users)
-- ===========================
CREATE TABLE accounts (
    username VARCHAR(100) PRIMARY KEY,
    password VARCHAR(512) NOT NULL,
    fullname VARCHAR(200) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- ===========================
-- CONTESTS
-- ===========================
CREATE TABLE contests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    owner VARCHAR(100) NOT NULL,
    name VARCHAR(300) NOT NULL,
    start DATETIME NOT NULL,
    end DATETIME NOT NULL,
    penalty INT DEFAULT 20, -- penalty in minutes
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (owner) REFERENCES accounts(username) ON DELETE CASCADE
);

-- ===========================
-- PROBLEMS
-- ===========================
CREATE TABLE problems (
    id INT AUTO_INCREMENT PRIMARY KEY,
    testcase_count INT NOT NULL,
    max_score INT NOT NULL DEFAULT 100,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- ===========================
-- PROBLEMSETS (Contest ↔ Problems, many-to-many)
-- ===========================
CREATE TABLE problemsets (
    problem_id INT NOT NULL,
    contest_id INT NOT NULL,
    PRIMARY KEY (problem_id, contest_id),
    FOREIGN KEY (problem_id) REFERENCES problems(id) ON DELETE CASCADE,
    FOREIGN KEY (contest_id) REFERENCES contests(id) ON DELETE CASCADE
);

-- ===========================
-- PARTICIPANTS
-- ===========================
CREATE TABLE participants (
    contest_id INT NOT NULL,
    username VARCHAR(100) NOT NULL,
    score INT DEFAULT 0,
    point INT DEFAULT 0, -- could be for tie-breaking / bonus
    penalty INT DEFAULT 0,
    PRIMARY KEY (contest_id, username),
    FOREIGN KEY (contest_id) REFERENCES contests(id) ON DELETE CASCADE,
    FOREIGN KEY (username) REFERENCES accounts(username) ON DELETE CASCADE
);

-- ===========================
-- SUBMISSIONS
-- ===========================
CREATE TABLE submissions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    code VARCHAR(255) NOT NULL, -- file path to submitted code
    language ENUM('C','C++','Java','Python') NOT NULL, -- languages available
    problem_id INT NOT NULL,
    contest_id INT NOT NULL,
    status ENUM('PENDING','ACCEPTED','WRONG_ANSWER','TIME_LIMIT','RUNTIME_ERROR','COMPILATION_ERROR') NOT NULL,
    score INT DEFAULT 0,
    submission_time DATETIME DEFAULT CURRENT_TIMESTAMP,
    penalty INT DEFAULT 0,
    FOREIGN KEY (username) REFERENCES accounts(username) ON DELETE CASCADE,
    FOREIGN KEY (problem_id) REFERENCES problems(id) ON DELETE CASCADE,
    FOREIGN KEY (contest_id) REFERENCES contests(id) ON DELETE CASCADE
);

-- ===========================
-- TESTCASES
-- ===========================
CREATE TABLE testcases (
    id INT AUTO_INCREMENT PRIMARY KEY,
    problem_id INT NOT NULL,
    input VARCHAR(255) NOT NULL,  -- file path to input
    output VARCHAR(255) NOT NULL, -- file path to output
    score INT NOT NULL DEFAULT 0,
    FOREIGN KEY (problem_id) REFERENCES problems(id) ON DELETE CASCADE
);

-- ===========================
-- Indexes for performance
-- ===========================
CREATE INDEX idx_submissions_user ON submissions(username);
CREATE INDEX idx_submissions_problem ON submissions(problem_id);
CREATE INDEX idx_participants_contest ON participants(contest_id);
CREATE INDEX idx_submissions_contest_problem ON submissions(contest_id, problem_id);
