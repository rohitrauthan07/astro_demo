# Project Title

## Description
This project is a web application built using CodeIgniter framework for managing categories and subcategories, user authentication, and user profiles. It provides functionalities for users to register, log in, and manage their profiles, as well as for administrators to manage categories and subcategories.

## Folder Structure
```
/application
    /config
    /controllers
        Auth.php
        Admin.php
        Home.php
        Profile.php
    /models
        User_model.php
        Category_model.php
        Subcategory_model.php
    /views
        /auth
            register.php
            login.php
            forgot_password.php
        /admin
            dashboard.php
            manage_categories.php
            create_category.php
            create_subcategory.php
            edit_category.php
            edit_subcategory.php
        /user
            user_dashboard.php
        /common
            header.php
        index.php
    /libraries
    /helpers
    /logs
    /uploads
```

## Requirements
- PHP 7.2 or higher
- CodeIgniter 3.x
- MySQL or compatible database

## Installation
1. Clone the repository or download the project files.
2. Set up a database in phpMyAdmin:
   - Open phpMyAdmin and create a new database (e.g., `my_database`).
   - Import the provided SQL file (`astro.sql`) to create the necessary tables.
3. Configure the database settings in `application/config/database.php`.
4. Access the application in your web browser.


## Features
- User registration and authentication
- Admin dashboard for managing categories and subcategories
- User profile management
- Responsive design

## Usage
- Navigate to the login page to access the application.
- Admin users can manage categories and subcategories from the admin dashboard.

## License
This project is licensed under the MIT License.
