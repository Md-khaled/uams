# Service Marketplace

## Setup

1. Clone the repository:
    ```bash
    git clone https://github.com/Md-khaled/uams.git
    cd uams
    ```

2. Install dependencies:
    ```bash
    composer install
    ```

3. Copy `.env.example` to `.env` and configure your environment:
    ```bash
    cp .env.example .env
    ```

4. Generate application key:
    ```bash
    php artisan key:generate
    ```

5. Run migrations:
    ```bash
    php artisan migrate:fresh --seed
    ```

6. Run the development server:
    ```bash
    php artisan serve
    ```

## Running Tests

To run the tests, use:

```bash
php artisan test
```
