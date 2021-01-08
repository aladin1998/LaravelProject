My end-of-year project focuses on the study, design and realization of an application for sharing lessons, tutorials, practicals between ENSAH students in PHP and the Laravel web framework.
This application makes it easier for us students to share documents such as lessons and their TDs in a well-organized way that overcomes several difficulties, especially organizational ones on social networks like Facebook.
My project offers a perfectly oriented course organization by classifying each document, whatever it is, in its specified box for simple, easy and quick access.

Instalation Guide

1. Copy the entire project folder to your machine
2. Install composer https://getcomposer.org/doc/00-intro.md
3. Install Laravel 7 http://laravel.com/docs/
4. Create an empty database named as desired.
5. After copying the files, enter with the command line in your project destination and then run the command install composer.
6. Enter the project / env folder: change the name of the database to the one created recently.
7. run php artisan key: generate in the command line.
8.run php artisan cache: clear in the command line
9.run php artisan migrate in the command line (pay attention to the order of foreign keys and the creation time of the table)
10.run php artisan serve and start your local server 127.0.0.1: 8080 on the browser
