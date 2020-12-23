<h1 align="center">Laravel Blog</h1>

<div align="center">

A blog website developed using the [Laravel](https://laravel.com/) php framework.

[![license](https://img.shields.io/badge/license-MIT-blue.svg)](https://github.com/StevenPss/blog/blob/main/LICENSE)
<img src="https://img.shields.io/badge/developed%20by-StevenPss-blue.svg">
[![Follow on GitHub](https://img.shields.io/github/followers/StevenPss?label=Follow&style=social)](https://github.com/StevenPss)
<img src="https://img.shields.io/github/stars/StevenPss/blog.svg?style=flat">
<img src="https://img.shields.io/github/languages/top/StevenPss/blog.svg"/>
[![issues](https://img.shields.io/github/issues/StevenPss/blog.svg)](https://github.com/StevenPss/blog/issues)
[![issues](https://img.shields.io/badge/PRs-welcome-brightgreen.svg?style=flat)](https://github.com/StevenPss/blog/pulls)

</p>

</div>

## Blog

All contributions are welcomed! (but please submit an issue to make sure the PR is warranted first)

## Installation

1. Clone this repo
    ```zsh
    ~ git clone https://github.com/StevenPss/blog
    ```
2. Access your project directory
   ```zsh
    ~ cd blog
   ```
3. Install the project dependencies
   ```zsh
    ~ composer install
   ```
4. Create a copy of your **.env** file
   ```zsh
    ~ cp .env.example .env
   ```
5. Generate your **encryption key**
   ```zsh
    ~ php artisan key:generate
   ```
6. Create an empty database for your project
   * Using any database tools you prefer *(I use [TablePlus](https://tableplus.com/). if you use windows then I recommend a tool called [Laragon](https://laragon.org/))*
7. Configure your **.env** file to allow a connection to the database
   * In the **.env** file, fill in the options **DB_HOST**, **DB_PORT**, **DB_DATABASE**, **DB_USERNAME** and **DB_PASSWORD** so that they match the credentials of the database you have just created.
8. **Migrate** the database architecture
   ```zsh
    ~ php artisan migrate:refresh --seed
   ```
9. Run the application
   ```zsh
    ~ php artisan serve
   ```
10. Default admin details
    * **Email**: `admin@admin.com`
    * **Password**: `password`
    

## Features

Features include:
* Authentication
  - Admin
    - Can make a user a writer or admin but users are writers by default.
    - Can add posts, categories and tags.
  - Writer
    - Can add posts, categories and tags.
* Categories
  - Create, Read, Update, Delete 
* Tags
  - Create, Read, Update, Delete
* Trash posts
  - When a post is deleted, it gets trashed, when it is trashed the user can choose to permanently delete the post or restore it.
* Search functionality of posts by title using [livewire](https://laravel-livewire.com/) and query statements
* [Disqus](https://disqus.com/) a popular blog comment hosting service
* [AddThis](https://www.addthis.com/) a social bookmarking service that can be integrated into a website with the use of a web widget. Include services such as Facebook, MySpace, Google Bookmarks, Pinterest, and Twitter.



## License

This project is an open-sourced software licensed under the [MIT license](https://github.com/StevenPss/blog/blob/main/LICENSE).