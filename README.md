# Cinebuddy - Backend

**A Symfony project powered by ApiPlatform to manipulate movies data in frontend project.** 

## 🛠️ Setup

```
git clone https://github.com/maxfrn65/symfony-s5.git
cd symfony-s5
composer install
symfony server:start
```

Modify your .env file to fit your database settings

```
# .env
# DATABASE_URL="mysql://app:!ChangeMe!@127.0.0.1:3306/app?serverVersion=8.0.32&charset=utf8mb4"
```
```
php bin/console doctrine:database:create
php bin/console make:migration
php bin/console doctrine:migrations:migrate
php bin/console doctrine:fixtures:load
```

## 👉 Next
Get the [frontend repository](https://github.com/maxfrn65/cinebuddy) to continue

