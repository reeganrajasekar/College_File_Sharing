<?php 
require("./db.php");


//assignment
$sql = "CREATE TABLE assignment (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    dept VARCHAR(30) NOT NULL,
    sem VARCHAR(50),
    subname VARCHAR(50)
    )";
    
    if ($conn->query($sql) === TRUE) {
        echo "Setup Finished";
    } else {
        echo "Setup Faild " . $conn->error;
    }
//assignmentfile
$sql = "CREATE TABLE upload (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    dept VARCHAR(30) NOT NULL,
    sem VARCHAR(50),
    subname VARCHAR(50),
    file longblob NOT NULL
    )";
    
    if ($conn->query($sql) === TRUE) {
        echo "Setup Finished";
    } else {
        echo "Setup Faild " . $conn->error;
    }
//chat
$sql = "CREATE TABLE chat (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    dept VARCHAR(30) NOT NULL,
    sem VARCHAR(50),
    subname VARCHAR(50),
    chat longblob NOT NULL
    )";
    
    if ($conn->query($sql) === TRUE) {
        echo "Setup Finished";
    } else {
        echo "Setup Faild " . $conn->error;
    }
// Staff
$sql = "CREATE TABLE staff (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
dept VARCHAR(30) NOT NULL,
email VARCHAR(50),
passwd VARCHAR(50)
)";

if ($conn->query($sql) === TRUE) {
    echo "Setup Finished";
} else {
    echo "Setup Faild " . $conn->error;
}
// Subject
$sql = "CREATE TABLE subject (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
staffid VARCHAR(30) NOT NULL,
dept VARCHAR(50),
sem VARCHAR(50)
)";

if ($conn->query($sql) === TRUE) {
    echo "Setup Finished";
} else {
    echo "Setup Faild " . $conn->error;
}
// student
$sql = "CREATE TABLE student (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
dept VARCHAR(30) NOT NULL,
sem VARCHAR(30) NOT NULL,
email VARCHAR(50),
passwd VARCHAR(50),
allow VARCHAR(50)
)";

if ($conn->query($sql) === TRUE) {
    echo "Setup Finished";
} else {
    echo "Setup Faild " . $conn->error;
}
// file
$sql = "CREATE TABLE file (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
staff INT(6) NOT NULL,
name blob NOT NULL,
dept blob NOT NULL,
sem blob NOT NULL,
subject blob NOT NULL,
total blob NOT NULL,
file longblob NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Setup Finished";
} else {
    echo "Setup Faild " . $conn->error;
}

// file
$sql = "CREATE TABLE file (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
staff INT(6) NOT NULL,
name blob NOT NULL,
dept blob NOT NULL,
sem blob NOT NULL,
subject blob NOT NULL,
total blob NOT NULL,
file longblob NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Setup Finished";
} else {
    echo "Setup Faild " . $conn->error;
}


// file
$sql = "ALTER TABLE file ADD ftype varchar(255);
";

if ($conn->query($sql) === TRUE) {
    echo "Setup Finished";
} else {
    echo "Setup Faild " . $conn->error;
}

$conn->close();
?>