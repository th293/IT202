
//Creating Table here
        $sql_table = "CREATE TABLE Customer";
        `id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        `Username` VARCHAR(30) NOT NULL UNIQUE,
        `Password` int default 0,
         reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
         CHARACTER SET utf8 COLLATE utf8_general_ci";

