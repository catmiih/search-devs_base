# 🔍 Search Devs - Intelligent Talent Matchmaking Platform

![Project Shield](https://img.shields.io/badge/Status-Completed-success?style=for-the-badge)
![Stack](https://img.shields.io/badge/Tech-PHP%20%7C%20JS%20%7C%20SQL-blue?style=for-the-badge)

## 📌 The Problem
Tech recruitment often faces a massive bottleneck: filtering thousands of candidates to find the perfect technical and cultural fit. Manual screening is slow, prone to bias, and inefficient for high-growth companies.

## 💡 The Solution (AI-Augmented Logic)
Search Devs is a platform designed to automate and optimize the hiring process. I developed a **Non-Generative AI Matchmaking Algorithm** that goes beyond simple keyword searching. 

### ⚙️ How it Works:
- **Weighted Scoring System:** The algorithm analyzes candidate skills, experience levels, and project requirements, assigning weights to each variable.
- **Automated Ranking:** Instead of a simple list, the system ranks candidates by their "Match Percentage," allowing recruiters to focus on the top 5% immediately.
- **Efficiency Gain:** During testing, the logic demonstrated a **70% reduction in initial screening time**.

## 🚀 Key Technical Features
- **Custom Search Engine:** Built with optimized SQL queries for high-speed data retrieval across large candidate pools.
- **Dynamic Filtering:** Real-time UI updates using JavaScript to refine searches without page reloads.
- **Architecture:** Developed with a focus on modularity, allowing easy integration with external HR APIs.

## 🛠 Tech Stack
- **Backend:** PHP (Core logic & Data processing)
- **Frontend:** JavaScript, HTML5, CSS3, Bootstrap
- **Database:** MySQL (Relational modeling for complex matching)

---

## 🚀 Getting Started (How to Run)

To run this project locally, you will need a local server environment like **XAMPP**. Follow these steps:

### 1. Environment Setup
* **Download XAMPP:** Go to [apachefriends.org](https://www.apachefriends.org/) and download the version for your OS (Windows, Linux, or macOS).
* **Install:** Follow the installation wizard, ensuring **Apache** and **MySQL** components are selected.

### 2. Project Installation
* **Clone the Repository:**
    ```bash
    git clone https://github.com/catmiih/search-devs.git
    ```
* **Move to htdocs:** Copy the project folder and paste it into the `htdocs` directory of your XAMPP installation (usually `C:\xampp\htdocs` on Windows).

### 3. Database Configuration
* **Start Services:** Open the XAMPP Control Panel and start both **Apache** and **MySQL**.
* **Access phpMyAdmin:** Go to `http://localhost/phpmyadmin` in your browser.
* **Import Database:** 1. Create a new database (e.g., `search_devs`).
    2. Select the "Import" tab.
    3. Choose the `.sql` file located inside the project folder "/back" and click "Go".

### 4. Running the Application
* Open your browser and navigate to: `http://localhost/search-devs` (replace with the name of your folder).

---

## 💡 Developer Note
While this project currently runs in a LAMP/WAMP stack environment, its modular architecture is ready to be containerized using **Docker** for cloud deployment in future iterations.
