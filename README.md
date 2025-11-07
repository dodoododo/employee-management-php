# Employee Management System (PHP)

A simple, procedural PHP web application for managing employee records. This project is built using PHP and a MySQL database without an MVC (Model-View-Controller) framework, serving as a clear example of basic CRUD (Create, Read, Update, Delete) operations.

## Features

* **Employee CRUD:**
    * **C**reate: Add new employees to the database.
    * **R**ead: View a complete list of all employees.
    * **U**pdate: Edit the details of existing employees.
    * **D**elete: Remove employees from the database.
* **Simple Interface:** A clean and straightforward HTML/CSS interface for interaction.
* **Direct Database Queries:** Uses procedural `mysqli` functions for all database communications.

## Getting Started

Follow these instructions to set up the project on your local machine.

### Prerequisites

You will need a local web server environment that includes PHP and MySQL. What i used
* [XAMPP](https://www.apachefriends.org/index.html) (Windows, Mac, Linux)

These packages provide Apache, PHP, and phpMyAdmin (for managing the database).

### Installation

1.  **Clone the repository**
    Open your terminal or command prompt, navigate to your web server's root directory (e.g., `C:\xampp\htdocs` or `/Applications/MAMP/htdocs`), and run:
    ```bash
    git clone https://github.com/dodoododo/employee-management-php
    ```
    Alternatively, download the ZIP and extract it to this folder.

2.  **Create the Database**
    * Start your XAMPP/WAMP/MAMP control panel and ensure Apache & MySQL are running.
    * Open your web browser and go to `http://localhost/phpmyadmin/`.
    * Click on the "Databases" tab.
    * Create a new database. For this guide, we will name it `employee_db`.

3.  **Import the Database Structure**
    * Click on the `employee_db` database you just created in the left-hand menu.
    * Go to the "SQL" tab.
    * Copy the SQL code from the "Database Structure" section below and paste it into the query box.
    * Click "Go" to create the `employees` table.

4.  **Configure Database Connection**
    * Update the credentials to match your local setup:
    ```php
    <?php
        $servername = "localhost";
        $username = "root";       // Default for XAMPP/MAMP
        $password = "";           // Default for XAMPP (MAMP is 'root')
        $dbname = "employee_db";  // The database you created

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    ?>
    ```

5.  **Run the Application**
    Open your browser and navigate to the project's folder.
    `http://localhost/employee-management-php/`

## Database Structure

Here is the SQL query to create the `employees` table required for this project.

```sql
CREATE TABLE `nhanvien` (
  `IDNV` varchar(10) NOT NULL,
  `HoTen` varchar(50) DEFAULT NULL,
  `IDPB` varchar(10) DEFAULT NULL,
  `DiaChi` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`IDNV`),
  KEY `IDPB` (`IDPB`),
  CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`IDPB`) REFERENCES `phongban` (`IDPB`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `phongban` (
  `IDPB` varchar(10) NOT NULL,
  `TenPB` varchar(50) DEFAULT NULL,
  `MoTa` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`IDPB`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `admin` (
  `Username` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

# Demo / Screenshots

## Here are some screenshots of the application in action.

## 1. User Home Page
<img width="1919" height="864" alt="Screenshot 2025-11-07 193413" src="https://github.com/user-attachments/assets/dc48c18f-2c54-4c08-9943-b50e4cddb95a" />

## 2. Login Page 
<img width="1919" height="870" alt="Screenshot 2025-11-07 193614" src="https://github.com/user-attachments/assets/a56e23be-1b14-4360-a307-d460dd95bb1c" />

## 3. Admin Screen 
<img width="1919" height="865" alt="Screenshot 2025-11-07 193659" src="https://github.com/user-attachments/assets/c167b95a-06bd-4ef5-9d8d-dfd44da5eed4" />

## 4. Add employees
<img width="1919" height="862" alt="Screenshot 2025-11-07 193804" src="https://github.com/user-attachments/assets/50b2bf76-543d-4eaa-8d6f-5e7c5cc1cfa2" />

## 5. Departments Info
<img width="1919" height="869" alt="Screenshot 2025-11-07 193845" src="https://github.com/user-attachments/assets/301c7007-52a0-41c9-b06e-2e0ec9fb7872" />

## 6. Update Departments Info 
<img width="1919" height="865" alt="Screenshot 2025-11-07 194013" src="https://github.com/user-attachments/assets/3415edbe-de44-41fe-b9e6-a491d23d461e" />

## 7. Delete Employee
<img width="1919" height="865" alt="Screenshot 2025-11-07 194043" src="https://github.com/user-attachments/assets/90c26709-ae82-49f3-b456-8539ca9318ee" />

## 8. Delete Multiple Employees 
<img width="1919" height="866" alt="Screenshot 2025-11-07 194111" src="https://github.com/user-attachments/assets/19318b5b-bd8c-427b-a5c1-a836b97a7b5d" />

 ## 9. Employee Info 
 <img width="1919" height="863" alt="Screenshot 2025-11-07 194139" src="https://github.com/user-attachments/assets/ec6b412c-ecab-4a45-9674-0eda53df6478" />

## 10. Departments Info & Department's Employees Info
<img width="1919" height="866" alt="Screenshot 2025-11-07 194222" src="https://github.com/user-attachments/assets/b10349e6-7a0a-4c7e-b7ba-2e51534eb7f1" />

## 11. Search Employees 
<img width="1919" height="869" alt="Screenshot 2025-11-07 194323" src="https://github.com/user-attachments/assets/3881baaf-1808-407b-9d11-c8a93a1178bb" />

# Copyrights : dunno just credit me or sth
