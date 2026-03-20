# Business Listing & Rating System

## 📌 Overview
This project is a Business Listing & Rating System built using Core PHP, MySQL, jQuery, AJAX, Bootstrap, and Raty Plugin.

It allows users to manage businesses and submit ratings with real-time updates without page refresh.

---

## 🚀 Features

### Business Management
- Add Business (Modal + AJAX)
- Edit Business (Pre-filled modal + AJAX)
- Delete Business (Confirmation + AJAX)

### Rating System
- Display average rating using Raty plugin
- Click on rating to open modal
- Submit rating with:
  - Name
  - Email
  - Phone
  - Star rating (0–5, half allowed)

### Rating Logic
- If Email OR Phone exists → Update rating
- Else → Insert new rating

### Real-Time Updates
- No page refresh required
- Table updates instantly after any action

---

## 🛠 Tech Stack

- PHP (Core)
- MySQL
- jQuery + AJAX
- Bootstrap 5
- Raty Plugin

---

## ⚙️ Setup Instructions

1. Clone or extract the project
2. Import database.sql into MySQL
3. Configure database connection:
   - File: config/database.php
4. Place project in XAMPP/htdocs
5. Run in browser:
   http://localhost/your-folder/views/

---

## 🧪 Test Scenarios

- Add new business
- Edit existing business
- Delete business
- Submit new rating
- Update rating using same email/phone
- Check average rating updates instantly

---

## 📽 Demo

Video recording included as per instructions.(progress)

---

## 👨‍💻 Author
Praveen Sahu