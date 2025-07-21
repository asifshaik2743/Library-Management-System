
---

```markdown
# 📚 Library Management System (LMS)

A simple web-based Library Management System built using PHP and MySQL to manage user registration, book issuing, and profile management.

## 🚀 Features

- User registration and login system
- Change and update password functionality
- View and edit user profiles
- View issued books
- Admin dashboard (in `admin/` directory)
- Responsive UI using Bootstrap 4.4.1

## 🛠️ Project Structure

```

.
├── admin/                    # Admin-specific functionality
├── bootstrap-4.4.1/          # Bootstrap CSS & JS
├── change\_password.php       # Change user password
├── edit\_profile.php          # Edit profile details
├── index.php                 # Landing/login page
├── lms.sql                   # MySQL database script
├── logout.php                # User logout
├── register.php              # New user registration
├── signup.php                # Signup page
├── update.php                # Update user info
├── update\_password.php       # Confirm password update
├── user\_dashboard.php        # User dashboard after login
├── view\_issued\_book.php      # List of books issued to the user
├── view\_profile.php          # View profile info

```

## 🧰 Tech Stack

- **Frontend**: HTML, CSS, Bootstrap 4.4.1  
- **Backend**: PHP  
- **Database**: MySQL (import `lms.sql`)  
- **Web Server**: XAMPP / Apache  

## 📝 Installation Instructions

1. Clone or download the repository.
2. Move the project folder to your local web server directory (e.g., `htdocs` for XAMPP).
3. Start Apache and MySQL from XAMPP.
4. Open `phpMyAdmin` and import `lms.sql` to create the database.
5. Access the project via `http://localhost/<project-folder>` in your browser.

## 📌 Notes

- Make sure to update database connection settings in your PHP files if required.
- Ensure Bootstrap path is correctly set in your HTML files.

## 📄 License

This project is for educational purposes only.

```
