# Laravel SPK TOPSIS

Laravel SPK TOPSIS is a website designed to provide a decision support system using the TOPSIS (Technique for Order Preference by Similarity to Ideal Solution) method. This site enables users to analyze various decision alternatives based on defined criteria, assisting in determining the best choice in a systematic and transparent way. With a user-friendly interface, users can easily input data and obtain in-depth analysis results to support more accurate decision-making.

## Tech Stack

- **Laravel 9** --> **Laravel 12**
- **Laravel Breeze**
- **MySQL Database**
- **TailwindCSS**
- **daisyUI**
- **[maatwebsite/excel](https://laravel-excel.com/)**
- **[barryvdh/laravel-dompdf](https://github.com/barryvdh/laravel-dompdf)**

## Features

- Main features available in this application:
  - Implementation TOPSIS method
  - Import data --> example [Objek](https://github.com/user-attachments/files/19701329/Import.Objek.xlsx)

## Installation

Follow the steps below to clone and run the project in your local environment:

1. Clone repository:

    ```bash
    git clone https://github.com/Akbarwp/Laravel-SPK-TOPSIS.git
    ```

2. Install dependencies use Composer and NPM:

    ```bash
    composer install
    npm install
    ```

3. Copy file `.env.example` to `.env`:

    ```bash
    cp .env.example .env
    ```

4. Generate application key:

    ```bash
    php artisan key:generate
    ```

5. Setup database in the `.env` file:

    ```plaintext
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel_topsis
    DB_USERNAME=root
    DB_PASSWORD=
    ```

6. Run migration database:

    ```bash
    php artisan migrate
    ```

7. Run seeder database:

    ```bash
    php artisan db:seed
    ```

8. Run website:

    ```bash
    npm run dev
    php artisan serve
    ```

## Screenshot

- ### **Dashboard**

<img src="https://github.com/user-attachments/assets/4fbcd91e-423d-44fb-822f-d5b2c2347a9c" alt="Halaman Dashboard" width="" />
<br><br>

- ### **Criteria page**

<img src="https://github.com/user-attachments/assets/01140afc-eca4-4573-ae4d-d6813370734a" alt="Halaman Kriteria" width="" />
<br><br>

- ### **Sub Criteria page**

<img src="https://github.com/user-attachments/assets/90fea88c-6bc9-403d-b9bb-a8fc01cbd762" alt="Halaman Sub Kriteria" width="" />
<br><br>

- ### **Object & Alternative page**

<img src="https://github.com/user-attachments/assets/baa88d6b-e62d-43a6-b65f-eb655d4d8b2e" alt="Halaman Objek" width="" />
<br><br>
<img src="https://github.com/user-attachments/assets/f2523ce1-84bb-4392-9df8-43b04e2a9cc0" alt="Halaman Alternatif" width="" />
<br><br>

- ### **Penilaian page**

<img src="https://github.com/user-attachments/assets/7d9fd487-8b68-4312-b2c4-328638bee0a1" alt="Halaman Penilaian" width="" />
<br><br>

- ### **Result page**

<img src="https://github.com/user-attachments/assets/cdc5717d-6f2a-41d3-ae03-48e6e090fbd3" alt="Halaman Penilaian" width="" />
<br><br>
