
# Youdemy - Online Learning Platform 🎓✨

**Youdemy** is an innovative online learning platform designed to provide an interactive and personalized learning experience for students while empowering teachers with robust tools for course management. It also includes an admin interface for managing users, content, and platform-wide statistics.

---

## 🌟 Project Overview

Youdemy aims to revolutionize education by simplifying knowledge sharing through intuitive tools for managing and consuming educational content. Whether you're a student or a teacher, Youdemy adapts to your needs for an optimal learning and teaching experience. 💻

---

## 🚀 Features

### 🖥️ Front Office

#### 👤 Visitor
- ✅ Access the course catalog with pagination.
- 🔍 Search for courses using keywords.
- 📝 Register and choose a role: **Student** or **Teacher**.

#### 🎓 Student
- 🗂️ Browse and view detailed course information (description, content, teacher, etc.).
- 📝 Enroll in courses after logging in.
- 📚 Access a personalized "My Courses" section.

#### 🧑‍🏫 Teacher
- ➕ Create and manage courses with:
  - **Title**, **description**, **content** (video or document), **tags**, and **category**.
- ⚙️ Manage courses:
  - Edit, delete, and track student enrollments.
- 📊 View course statistics:
  - Number of students enrolled.
  - Total number of courses created.

### 🔒 Back Office

#### 🛠️ Administrator
- 👩‍💼 Validate teacher accounts.
- 👥 Manage users:
  - Activate, suspend, or delete accounts.
- 📑 Manage content:
  - Categories, tags, and courses.
- 📈 Access platform-wide statistics:
  - Total number of courses.
  - Course distribution by category.
  - Top 3 performing teachers.
  - Courses with the highest enrollments.

---

## 🛠️ Technical Requirements

| Requirement        | Description                                                   |
|--------------------|---------------------------------------------------------------|
| 🛠️ OOP            | Adherence to object-oriented principles: encapsulation, inheritance, and polymorphism. |
| 🗄️ Database        | Relational design supporting one-to-many and many-to-many relationships. |
| 🕒 PHP Sessions    | Secure management of logged-in users.                          |
| 🔒 Data Validation | User input validation to ensure security and reliability.      |

---

## 💻 Technologies Used

- **Front-end**:
  - HTML, Tailwind CSS, JavaScript.
- **Back-end**:
  - PHP.
- **Database**:
  - MySQL.

---

## 📊 Features Overview

| Feature                  | Visitor | Student | Teacher | Admin |
|--------------------------|---------|---------|---------|-------|
| Access course catalog    | ✅      | ✅      | ✅      | ✅    |
| Search for courses       | ✅      | ✅      | ✅      | ✅    |
| Add courses              | ❌      | ❌      | ✅      | ❌    |
| Manage courses           | ❌      | ❌      | ✅      | ✅    |
| View statistics          | ❌      | ❌      | ✅      | ✅    |

---

## 📥 Installation

### Prerequisites
- PHP 8.0 or later.
- Web Server (Apache or Nginx).
- MySQL or MariaDB.
- XAMPP or WAMP (optional for local development).
- Composer (for PHP dependencies).

### Setup Instructions

1. **Clone the repository**:
   ```bash
   git clone https://github.com/Mo7amed-Boukab/Youdemy.git
   cd Youdemy

## Deployment

To deploy this project run

```bash
  npm run deploy
```