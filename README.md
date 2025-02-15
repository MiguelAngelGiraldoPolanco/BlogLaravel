# Blog en Laravel

Este es un proyecto de blog desarrollado con Laravel. Permite la creación, edición y eliminación de publicaciones, así como la gestión de categorías.

## Características
- Creación, edición y eliminación de publicaciones.
- Gestión de categorías.
- Sistema de autenticación con Laravel Breeze.
- Diseño responsivo con Tailwind CSS.

## Tecnologías utilizadas
- Laravel
- MySQL
- Tailwind CSS
- Blade Templates
- Laravel Breeze (para autenticación)
- Docker 

## Instalación

### Requisitos previos
- PHP 8.x
- Composer
- MySQL
- Node.js y npm
- Docker (opcional)

### Pasos de instalación
1. Clonar el repositorio:
   ```bash
   git clone https://github.com/MiguelAngelGiraldoPolanco/BlogLaravel.git
   cd BlogLaravel
   ```
2. Instalar dependencias:
   ```bash
   composer install
   npm install && npm run dev
   ```
3. Configurar el archivo de entorno:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
4. Configurar la base de datos en el archivo `.env`
5. Migrar la base de datos y añadir datos de prueba:
   ```bash
   php artisan migrate --seed
   ```
6. Iniciar el servidor local:
   ```bash
   php artisan serve
   ```

## Uso
- Accede a `http://127.0.0.1:8000` en tu navegador.
- Regístrate o inicia sesión para gestionar publicaciones.

## Contribuciones
Las contribuciones son bienvenidas. Para colaborar, por favor:
1. Haz un fork del repositorio.
2. Crea una nueva rama (`git checkout -b feature-nueva`).
3. Realiza tus cambios y haz commit (`git commit -m 'Añadir nueva funcionalidad'`).
4. Sube tus cambios (`git push origin feature-nueva`).
5. Crea un pull request.

---

# Blog in Laravel

This is a blog project developed with Laravel. It allows creating, editing, and deleting posts, as well as managing categories.

## Features
- Create, edit, and delete posts.
- Category management.
- Authentication system with Laravel Breeze.
- Responsive design with Tailwind CSS.

## Technologies Used
- Laravel
- MySQL
- Tailwind CSS
- Blade Templates
- Laravel Breeze (for authentication)
- Docker (optional)

## Installation

### Prerequisites
- PHP 8.x
- Composer
- MySQL
- Node.js and npm
- Docker (optional)

### Installation Steps
1. Clone the repository:
   ```bash
   git clone https://github.com/MiguelAngelGiraldoPolanco/BlogLaravel.git
   cd BlogLaravel
   ```
2. Install dependencies:
   ```bash
   composer install
   npm install && npm run dev
   ```
3. Configure the environment file:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
4. Set up the database in the `.env` file
5. Migrate the database and seed test data:
   ```bash
   php artisan migrate --seed
   ```
6. Start the local server:
   ```bash
   php artisan serve
   ```

## Usage
- Go to `http://127.0.0.1:8000` in your browser.
- Register or log in to manage posts.

## Contributions
Contributions are welcome. To collaborate, please:
1. Fork the repository.
2. Create a new branch (`git checkout -b feature-new`).
3. Make your changes and commit (`git commit -m 'Add new feature'`).
4. Push your changes (`git push origin feature-new`).
5. Create a pull request.
