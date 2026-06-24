# 📝 Tiny MVC Weblog

A mini weblog with an admin panel, built with **PHP** following the **Model-View-Controller (MVC)** architecture. This project demonstrates back-end development, database integration, user authentication, and a clean separation of concerns.

[![GitHub](https://img.shields.io/badge/github-repo-181717?style=for-the-badge&logo=github)](https://github.com/ArshiaDSh/Weblog-thiny-mvc)

---

## 🚀 Features

- **MVC Architecture** - Clean separation of Models, Views, and Controllers
- **User Authentication** - Login and registration system
- **Admin Panel** - Manage posts, users, and site content
- **Database Integration** - MySQL database for persistent data storage
- **Responsive Design** - Works on desktop and mobile devices
- **Email Support** - PHPMailer integration for notifications

---

## 🛠️ Technologies Used

### Back-End
- **PHP** - Server-side logic and MVC structure
- **MySQL** - Database management

### Front-End
- **HTML5** - Semantic structure
- **CSS3 / SCSS / Less** - Styling and responsive design
- **JavaScript** - Interactive elements

### Tools & Practices
- **Git** - Version control
- **.htaccess** - URL routing and security
- **PHPMailer** - Email sending functionality

---

## 📁 Project Structure

```
Weblog-thiny-mvc/
├── activities/           # Controllers - Business logic
├── database/             # Models - Data access layer
├── public/               # Views - User interface
├── template/             # Layout templates
├── .htaccess             # Apache configuration & URL routing
├── index.php             # Front controller (entry point)
├── start.bat             # Local server startup script
└── README.md             # This file
```

### Architecture Overview

```
User Request → index.php (Front Controller) → Routes → Controller → Model → View → Response
```

1. **Front Controller (`index.php`)** - Handles all incoming requests
2. **Activities (Controllers)** - Process logic and user input
3. **Database (Models)** - Interact with the database
4. **Public (Views)** - Render HTML output

---

## 🚀 Getting Started Locally

### Prerequisites
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache with `.htaccess` support (or XAMPP/WAMP/Laragon)

### Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/ArshiaDSh/Weblog-thiny-mvc.git
   cd Weblog-thiny-mvc
   ```

2. **Set up the database**
   - Import the SQL file from the `database/` folder into your MySQL database
   - Update database credentials in the configuration file

3. **Run the application**
   - **Option A**: Use the `start.bat` file (Windows)
   - **Option B**: Use a local server (XAMPP/WAMP) and navigate to the project folder
   - **Option C**: Use PHP's built-in server:
     ```bash
     php -S localhost:8000
     ```

4. **Access the application**
   - Open your browser and go to `http://localhost:8000`
   - Default admin credentials (if applicable): Check the database seed file

---

## 🧠 What I Learned

Building this project helped me develop:

- **MVC Architecture**: Understanding separation of concerns and how to organize code
- **PHP OOP**: Working with classes, inheritance, and namespaces
- **Database Design**: Creating relationships between tables
- **Authentication**: Implementing login, registration, and session management
- **Routing**: Using `.htaccess` for clean URLs
- **Full-Stack Development**: Combining front-end and back-end into a complete application

---

## 🔧 Future Improvements

- [ ] Add user roles (admin, editor, viewer)
- [ ] Implement commenting system
- [ ] Add search functionality
- [ ] Create REST API endpoints
- [ ] Improve security (input validation, CSRF protection)
- [ ] Add pagination for posts
- [ ] Write unit tests

---

## 📬 Contact

I am actively looking for **internship** or **freelance** opportunities. Feel free to reach out!

- 📧 Email: [arshiadsheibani@gmail.com](mailto:arshiadsheibani@gmail.com)
- 💻 GitHub: [ArshiaDSh](https://github.com/ArshiaDSh)
- 🕸️ Portfolio: [arshiadsh.github.io](https://arshiadsh.github.io)

---

## 📜 License

This project is open-source and available under the [MIT License](LICENSE).

---

⭐ If you like this project, please consider giving it a star on GitHub!