# Tryonics


## PHP web application with mysql and bootstrap.

This project was built in to add user information (Name, About You, Birthday, Mobile Number, Email, Country) and also can update ,delete and view user information.
This app has Form page used to add data, and a list page used to view the data. 
list page has page numbers and also can filter and search existing user information.


### How to run it

These are the instruction how to run the app on your machine:

Clone the repo to your www folder.

This project was built in PHP/MySQL and need to be run under an app like MAMP/WAMP/XAMP

If you use one of the app above be aware to clone the repo under your htdocs folder for have access through the localhost or configure your virtualhost and hosts file accordingly to your needs

Configure the php files with yours DB info.

Make sure to create an database and user table in mysql server. you can use userInfo.sql , it contain queries for create db and table.

###What was used

-PHP
-MySQL
-bootstrap
-CSS 
-JavaScript
-Jquery
-HTML

###Web Application

I have created validationsUser.js for validations. The onclick function is called when the user submit and then using sweet alerts to disply warning, error messages.

Form. All the validation is carried out in user side. After you submit a form Data goes to DB.

Responsiveness. For a Responsive website, I used bootstrap Framework.
