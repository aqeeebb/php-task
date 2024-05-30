# Task Management Application
This is a simple Task Management application that allows users to add, edit, delete, and view tasks. The application is built using PHP, MYSQL, HTML, CSS, and JavaScript. It also provides a REST API to fetch tasks in JSON format.

## Features
- Add new tasks with title and description.
- Edit existing tasks.
- Delete tasks.
- View tasks in a list.
- Fetch tasks in JSON format via API.

## Prerequisites
- XAMPP or any other web server with PHP and MySQL support.
- Web browser.

## Installation
- Clone the repository or download the ZIP file and extract it.

```
git clone https://github.com/EmpSwarup/php-task
```

- Move the extracted files to your web server's root directory (e.g., htdocs for XAMPP).

- Start your web server (Apache) and MySQL from the XAMPP control panel.

## Database Setup
```
CREATE DATABASE task_management;

USE task_management;

CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

## Screenshots
### Home Page
![HomePage](https://github.com/EmpSwarup/php-task/blob/main/images/screenshot-1.png?raw=true "HomePage")

### Add task
![AddTask](https://github.com/EmpSwarup/php-task/blob/main/images/screenshot-2.png?raw=true "AddTask")

### Edit Task
![EditTask](https://github.com/EmpSwarup/php-task/blob/main/images/screenshot-3.png?raw=true "EditTask")

### Delete Task
![DeleteTask](https://github.com/EmpSwarup/php-task/blob/main/images/screenshot-4.png?raw=true "DeleteTask")

### Home Page with items
![HomePageWithItems](https://github.com/EmpSwarup/php-task/blob/main/images/screenshot-8.png?raw=true "HomePageWithItems")

### Database table
![DatabaseTable](https://github.com/EmpSwarup/php-task/blob/main/images/screenshot-5.png?raw=true "DatabaseTable")

### Database items
![DatabaseItems](https://github.com/EmpSwarup/php-task/blob/main/images/screenshot-6.png?raw=true "DatabaseItems")

### API Response for api/tasks.php
![API](https://github.com/EmpSwarup/php-task/blob/main/images/screenshot-7.png?raw=true "API")