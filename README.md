# Web-Based Telephone Directory Application

## Overview

This is a web-based telephone directory application built using VILT Stack (Vue. js, Inertia. js, Laravel, TailwindCSS). The application allows users to manage contact details efficiently, providing features such as sorting, searching, and viewing contact information.

Demo

Watch the demo video here: [Demo Video]()

## Technologies Used

- **Database:** MySQL
- **Server-Side Scripting:** Laravel (PHP), JavaScript
- **Client-Side Scripting:** HTML, JavaScript, CSS
- **Frontend Frameworks:** Bootstrap 4, jQuery, Vue.js

## Features

- **Contact Management:** Add, edit, and delete contacts.
- **Sorting:** Sort contacts by name and date added.
- **Search:** Search contacts by name or any telephone number.
- **Views Tracking:** Track the number of times a contact's details have been viewed.
- **ORM:** Uses Laravel's Eloquent ORM for database operations.

## Installation & Setup

### Prerequisites

Ensure you have the following installed:

- PHP (>=8.0)
- Composer
- Node.js & npm
- MySQL Database

### Steps to Install

1. **Clone the repository**

   ```bash
   git clone https://github.com/madhavjha97/Noesis-assigment.git
   cd telephone-directory
   ```

2. **Install backend dependencies**

   ```bash
   composer install
   ```

3. **Install frontend dependencies**

   ```bash
   npm install
   ```

4. **Set up environment variables**

   ```bash
   cp .env.example .env
   ```

   Update `.env` with database credentials.

5. **Generate application key**

   ```bash
   php artisan key:generate
   ```

6. **Run database migrations**

   ```bash
   php artisan migrate
   ```

7. **Run the application**

   ```bash
   php artisan serve
   npm run dev
   ```

## Dependencies

See all package dependencies in:

- **Frontend:** `package.json`
- **Backend:** `composer.json`



## Contact

For any queries or contributions, feel free to open an issue or contact the developer.

Mobile No: 7420989796

Email: [rmadhavjha@gmail.com](mailto\:rmadhavjha@gmail.com)
