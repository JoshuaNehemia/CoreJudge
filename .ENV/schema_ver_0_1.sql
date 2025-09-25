-- ===========================
-- DATABASE
-- ===========================
CREATE DATABASE IF NOT EXISTS CoreJudge
  DEFAULT CHARACTER SET utf8mb4
  DEFAULT COLLATE utf8mb4_unicode_ci;
USE CoreJudge;

-- ===========================
-- ACCOUNTS (Users)
-- ===========================
CREATE TABLE accounts (
    username VARCHAR(100) PRIMARY KEY,
    password VARCHAR(255) NOT NULL, -- hashed, shorter is fine
    fullname VARCHAR(200) NOT NULL,
    role ENUM('ADMIN','JUDGE','CONTESTANT') DEFAULT 'CONTESTANT',
    email VARCHAR(200) UNIQUE,
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
    description TEXT,
    start DATETIME NOT NULL,
    end DATETIME NOT NULL,
    penalty INT DEFAULT 20, -- penalty in minutes
    frozen_time DATETIME NULL, -- scoreboard freeze
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (owner) REFERENCES accounts(username) ON DELETE CASCADE
);
-- =========================== 
-- PROBLEMS 
-- ===========================
CREATE TABLE problems (
    id INT AUTO_INCREMENT,
    contest_id INT NOT NULL,
    label VARCHAR(1) NOT NULL,
    title VARCHAR(255) NOT NULL,
    problem_statement TEXT NOT NULL,
    testcase_count INT NOT NULL,
    max_score INT NOT NULL DEFAULT 100,
    time_limit INT NOT NULL DEFAULT 1,
    memory_limit INT NOT NULL DEFAULT 256,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    FOREIGN KEY (contest_id) REFERENCES contests(id) ON DELETE CASCADE,
    UNIQUE (contest_id, label)
);


-- ===========================
-- PARTICIPANTS
-- ===========================
CREATE TABLE participants (
    contest_id INT NOT NULL,
    username VARCHAR(100) NOT NULL,
    score INT DEFAULT 0,
    penalty INT DEFAULT 0,
    rank INT DEFAULT NULL, -- for scoreboard caching
    PRIMARY KEY (contest_id, username),
    FOREIGN KEY (contest_id) REFERENCES contests(id) ON DELETE CASCADE,
    FOREIGN KEY (username) REFERENCES accounts(username) ON DELETE CASCADE
);

-- ===========================
-- LANGUAGES (for submissions)
-- ===========================
CREATE TABLE languages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE, -- e.g., "C++17", "Python 3.11"
    compile_cmd VARCHAR(255) NOT NULL,
    run_cmd VARCHAR(255) NOT NULL
);

-- ===========================
-- SUBMISSIONS
-- ===========================
CREATE TABLE submissions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    contest_id INT NOT NULL,
    username VARCHAR(100) NOT NULL,
    problem_id INT NOT NULL,
    language_id INT NOT NULL,
    code_path VARCHAR(255) NOT NULL, -- path to code file
    status ENUM('PENDING','ACCEPTED','WRONG_ANSWER','TIME_LIMIT',
                'RUNTIME_ERROR','COMPILATION_ERROR') DEFAULT 'PENDING',
    score INT DEFAULT 0,
    submission_time DATETIME DEFAULT CURRENT_TIMESTAMP,
    penalty INT DEFAULT 0,
    FOREIGN KEY (contest_id) REFERENCES contests(id) ON DELETE CASCADE,
    FOREIGN KEY (username) REFERENCES accounts(username) ON DELETE CASCADE,
    FOREIGN KEY (problem_id) REFERENCES problems(id) ON DELETE CASCADE,
    FOREIGN KEY (language_id) REFERENCES languages(id)
);

-- ===========================
-- TESTCASES
-- ===========================
CREATE TABLE testcases (
    id INT AUTO_INCREMENT PRIMARY KEY,
    problem_id INT NOT NULL,
    input_path VARCHAR(255) NOT NULL,  -- file path to input
    output_path VARCHAR(255) NOT NULL, -- file path to expected output
    score INT NOT NULL DEFAULT 0,
    FOREIGN KEY (problem_id) REFERENCES problems(id) ON DELETE CASCADE
);

-- ===========================
-- CLARIFICATIONS
-- ===========================
CREATE TABLE clarifications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    contest_id INT NOT NULL,
    from_user VARCHAR(100) NOT NULL,
    to_role ENUM('ALL','ADMIN','JUDGE') DEFAULT 'ADMIN',
    question TEXT NOT NULL,
    answer TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    answered_at TIMESTAMP NULL,
    FOREIGN KEY (contest_id) REFERENCES contests(id) ON DELETE CASCADE,
    FOREIGN KEY (from_user) REFERENCES accounts(username) ON DELETE CASCADE
);

-- ===========================
-- ANNOUNCEMENTS
-- ===========================
CREATE TABLE announcements (
    id INT AUTO_INCREMENT PRIMARY KEY,
    contest_id INT NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (contest_id) REFERENCES contests(id) ON DELETE CASCADE
);

-- ===========================
-- Indexes for performance
-- ===========================
CREATE INDEX idx_submissions_user ON submissions(username);
CREATE INDEX idx_submissions_problem ON submissions(problem_id);
CREATE INDEX idx_submissions_contest_problem ON submissions(contest_id, problem_id);
CREATE INDEX idx_participants_contest ON participants(contest_id);
CREATE INDEX idx_clarifications_contest ON clarifications(contest_id);
CREATE INDEX idx_announcements_contest ON announcements(contest_id);
