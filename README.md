# Luxury Watch Website

This is a Laravel-based project built to meet the requirements of a dynamic data-driven website. The website provides a platform for showcasing luxury watches, featuring user and admin functionalities.


## Project Description

This project serves as a dynamic website designed for showcasing luxury watches. It allows users to:
- View news, FAQs, and contact information.
- Admins can manage content such as news, FAQs, and user roles.
- Implement a secure login system with multiple roles (Admin and User).

The project was developed as part of a Laravel-based coursework project.

## Features

### Functional Requirements

1. **Login System**
   - Users can register and log in.
   - Role-based access:
     - Admins can promote/demote users to/from admin roles.
     - Admins can create users manually.
   - "Remember Me" and password reset functionality included.

2. **Profile Page**
   - Publicly accessible profile pages for each user.
   - Editable user data for logged-in users.
   - Profile fields include:
     - Username
     - Birthday
     - Profile photo (stored on the server)
     - "About Me" text

3. **News Management**
   - Admins can create, edit, and delete news items.
   - Visitors can view a list of news items and their details.
   - Each news item includes:
     - Title
     - Image (stored on the server)
     - Content
     - Publication date

4. **FAQ Section**
   - FAQs grouped by category.
   - Admins can manage categories, questions, and answers.
   - Publicly viewable by all visitors.
   - Users can add questions to the FAQ

5. **Contact Page**
   - Visitors can submit a contact form.
   - Admins receive emails with form details.
   - Admins see an overview of all completed contact forms in an admin panel and can respond to messages through this panel

### Additional Features

- Users can choose whether to show their username or their first and last name on their public profile page.

## Technical Requirements

- **Laravel** >= 11.x
- **PHP** >= 8.1
- **MySQL** as the database
- **Composer** and **Node.js** for dependency management

## Installation

### Prerequisites

Ensure the following software is installed on your system:
- **PHP** >= 8.1
- **Composer**
- **Node.js** (LTS version recommended)
- **NPM** or **Yarn**
- A web server such as Apache or Nginx
- A database server such as MySQL

### Steps to Install Locally

1. **Clone the repository:**
   ```bash
   git clone https://github.com/safwane1080/backendproject1.git
   cd backendproject1
   ```

2. **Install PHP dependencies using Composer:**
   ```bash
   composer install
   ```

3. **Install JavaScript dependencies using NPM or Yarn:**
   ```bash
   npm install
   ```

4. **Copy the `.env` file:**
   ```bash
   cp .env.example .env
   ```

5. **Configure the `.env` file with your database credentials:**

   Open the `.env` file and modify the following lines:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_user
   DB_PASSWORD=your_database_password
   ```

6. **Generate the application key:**
   ```bash
   php artisan key:generate
   ```

7. **Run database migrations and seed the database:**
   ```bash
   php artisan migrate --seed
   ```

8. **Compile front-end assets:**
   ```bash
   npm run dev
   ```

## Running the Application

1. **Start the development server:**
   ```bash
   php artisan serve
   ```

2. **Access the application at** `http://localhost:8000`.

## Usage

Log in as the default admin using:

- **Email:** admin@ehb.be
- **Password:** Password!321

Explore the features, such as managing news, FAQs, and contact forms.

## License

This project is open-source and licensed under the MIT License. See the LICENSE file for details.

## Acknowledgements

- Laravel documentation for framework usage.
- OpenAI for guidance during development.
- https://www.youtube.com/watch?v=oiAlDjARrOU&list=PLm8sgxwSZofdmlPxaDB7fRLv_NVe2uFKl&index=3
- https://www.youtube.com/watch?v=CfS5BRoWn-A&list=PLm8sgxwSZofdmlPxaDB7fRLv_NVe2uFKl&index=2
