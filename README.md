# Invoice Management System - Laravel + React

## 📌 Prerequisites  
Before you begin, ensure you have the following installed on your system:  
- [Git](https://git-scm.com/)  
- [PHP 8.2+](https://www.php.net/downloads)  
- [Composer](https://getcomposer.org/download/)  
- [Node.js & npm](https://nodejs.org/)  
- [MariaDB](https://mariadb.org/download/) or MySQL for database  

---

## 🚀 Installation Steps  

### 1️⃣ **Clone the Repository**  
Open a terminal and run the following command to clone the repository:  
```bash
git clone https://github.com/yajinisaifeddine/InvoiceManagment.git
cd InvoiceManagment
```

### 2️⃣ **Install Dependencies**  
Run the following commands to install all required PHP and Node dependencies:  
```bash
composer install
npm install
```

### 3️⃣ **Configure the Environment**  
Copy the example environment file to create your own `.env` file:  
```bash
cp .env.example .env
```

Then open the `.env` file and update the database credentials to match your MariaDB/MySQL setup:  
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_db_user
DB_PASSWORD=your_db_password
```

### 4️⃣ **Set Up the Database**  
Make sure MariaDB/MySQL is running on your system, then run the following command to apply database migrations and seed the database:  
```bash
php artisan migrate --seed
```

### 5️⃣ **Generate App Key**  
To generate a unique application key, run:  
```bash
php artisan key:generate
```

### 6️⃣ **Run the Development Server**  
#### 🌐 Backend (Laravel API)  
Start the Laravel backend server by running:  
```bash
php artisan serve
