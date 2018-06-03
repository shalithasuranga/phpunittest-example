@echo off
echo Running tests....

echo ================ TEST #1 DATABASE =================
php phpunit-7.1.5.phar --bootstrap functions.php testDatabase.php
echo ================ TEST #2 ADMIN LOGIN =================
php phpunit-7.1.5.phar --bootstrap functions.php testAdminLogin.php
echo ================ TEST #3 ADD EVENT =================
php phpunit-7.1.5.phar --bootstrap functions.php testAddEvent.php
echo ================ TEST #4 LOAD EVENTS =================
php phpunit-7.1.5.phar --bootstrap functions.php testLoadEvents.php


echo Test execution is done.