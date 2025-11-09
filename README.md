# Web-Based Attendance System

this is a simple web-based attendance tracking system that allows users to add employees, record daily check-ins, and view the check-in records for the current day.

This is built with **PHP**, **MySQL**,**Html**,**CSS**,**JS**, and **Bootstrap**. It allows you to manage employees and track their daily check-ins.


## 🎯 Purpose

This system simulates a basic internal tool that an HR department or manager could use to:

- Register new employees
- Record daily attendance/check-ins
- Prevent duplicate check-ins on the same day
- View all employees who checked in today

---

## 🧭 How It Works

### 1. Add Employee (`index.html`)
- A form to enter the employee’s **name** and **department**
- Once submitted, the employee is saved to the database
- Form includes validation to prevent empty fields

---

### 2. Check-In Page (`check_in.php`)
- Dropdown list of all registered employees
- User selects an employee and clicks "Check In"
- The current date and time are saved as the check-in
- Duplicate check-ins on the same day are not allowed
- User receives a success or warning message

---

### 3. Today’s Check-Ins (`today_checks.php`)
- Displays a table of all employees who checked in **today**
- Includes **name**, **department**, and **check-in time**
- If no one has checked in, a message appears

---

## 🎨 User Interface

- Built with **Bootstrap 5** for a clean, responsive design
- Form validation using Bootstrap’s JavaScript components
- Alerts for success, error, and duplicate actions

---

## 🛠️ Technologies Used

- **PHP** – for server-side scripting
- **MySQL** – for data storage
- **Bootstrap 5** – for styling and layout
- **HTML/CSS** – for structure and design

---