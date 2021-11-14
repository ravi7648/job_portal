# This project has been developed for students to get updates of all placement drives and hence can apply for their matching profiles.
>## To develop this project, we need to install XAMPP to host local web server and database server
1. Windows: [Download link](https://www.apachefriends.org/xampp-files/8.0.12/xampp-windows-x64-8.0.12-0-VS16-installer.exe)
2. Mac: [Download link](https://www.apachefriends.org/xampp-files/8.0.12/xampp-osx-8.0.12-0-vm.dmg)
3. Linux: [Download link](https://www.apachefriends.org/xampp-files/8.0.12/xampp-linux-x64-8.0.12-0-installer.run)


>## As per my convenience I prefer to use VS Code Editor, in your case you can choose any one of your choice.
- VS Code Editor: [Download link](https://code.visualstudio.com/Download)     
>*Install extensions for formatting the document and autocompletions and auto suggestions*


## Now it's time for setting up the database server.

>### Step 1: Start the server 

Open the XAMPP application and start the **Apache** and **MySQL Database server.** Open browser and type `localhost` and press enter. If the XAMPP default homepage opens then you are good to go. Next check for database server by typing `localhost/phpmyadmin`.
>### Step 2: Create the database, its tables and set the credentials

- Open `localhost/phpmyadmin` in your browser
- click on **User accounts** from upper ribbon
- click on **Edit privileges** option beside of **root** user.
- Now, select for **Change password** and update the password for **root** account.
- Open XAMPP folder, go inside **phpmyadmin** and search for a file called ***config.inc.php***. 
- Try to open the file and search for line `$cfg['Servers'][$i]['password'] = '';` on Line 30. Insert your password in this and save it.

**NOTE:** If you're not able to write into the file or getting this type of error ***"Could not add write permission to the file because you do not own it. Try modifying the permissions of the file in the Finder or Terminal."***, Try to change with admin privilege or simply apply the below command if you're working in Mac OS or Linux.

`sudo chmod 777 /Applications/XAMPP/xamppfiles/phpmyadmin/config.inc.php`

- Now restart the MySQL server.
- Now, let's create the database named with **jobs**.
    - Open `localhost/phpmyadmin` and click on **new** option from left menu.
    - Give **Database name**, say *jobs* and click on create.
- Expand the **jobs** database, here we can see the option to create table on right side.
    - Give the name of the table, say **placement** and mention *number of columns = 6*.
    - Now, mention the Name of the columns, and their respective properties as mentioned below.
    | Name                  | Type          | Properties                                           |
    | -------| :---                      |    :----:       |          :---:                                             |
    | id                        | INT            | Not Null, Primary, Auto-increment, Unique      |
    | company_name  | TEXT        | Not Null                                               |
    | position              | TEXT         | Not Null                                               |   
    | job_description  | TEXT         | Not Null                                                |
    | skills                   | TEXT         | Not Null                                               |
    | ctc                     | INT             | Not Null                                               

    - Optionally, we can execute one single query for the same.
    
    ```CREATE TABLE `jobs`.`placement` ( `id` INT NOT NULL UNIQUE AUTO_INCREMENT , `company_name` TEXT NOT NULL , `position` TEXT NOT NULL , `job_description` TEXT NOT NULL , `skills` TEXT NOT NULL , `ctc` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;```
    
    - Now, Create one more table called **users** with 6 columns as given below.
    | Name                  | Type          | Properties                                           |
    | :---                      |    :----:       |          :---:                                             |
    | id                        | INT            | Not Null, Primary, Auto-increment, Unique      |
    | date  |TIMESTAMP        | Current_timestamp()                                              |
    | name              | VARCHAR(320)         | Not Null                                               |   
    | email  |  VARCHAR(320)          | Not Null                                                |
    | phone                   | BIGINT         | Not Null                                               |
    | password                     | VARCHAR(320)             | Not Null
    
    - Optionally, we can execute one single query for the same.
    
    ```CREATE TABLE `jobs`.`users` ( `id` INT NOT NULL UNIQUE AUTO_INCREMENT , `date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `name` VARCHAR(320) NOT NULL , `email` VARCHAR(320) NOT NULL UNIQUE , `phone` BIGINT NOT NULL , `password` VARCHAR(320) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;```
