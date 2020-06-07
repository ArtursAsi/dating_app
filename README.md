### Instructions:
Clone project
>git clone https://github.com/ArtursAsi/dating_app

Install Composer
>composer install

Install npm
>npm install

Create .env file
>cp .env.example .env

Create database
>link in .env file

Mailtrap.io is required
>link your mailtrap.io account in .env file

Link storage 
>php artisan Storage:link

Migrate Database
>php artisan migrate

Generate key
>php artisan key:generate

Run app 
>php artisan serve


### Description

Dating app. In which You must register to view content. In this app you can search for registered users with who You would like to go on date based on their picture , age, gender, bio and location.
You can use filters to adjust Your search by selecting age range and gender. You also can view profiles and galleries of other users which are randomly given for inspection and for liking/disliking them. If positive feelings are both ways You both will get an e-mail notification and profile of the other one will appear in Match category for both.

This project has validations.



