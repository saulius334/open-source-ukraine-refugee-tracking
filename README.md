<p align="center"><a href="https://war.ukraine.ua/" target="_blank"><img width="400" src="https://upload.wikimedia.org/wikipedia/commons/0/0f/Outline_of_Ukraine.svg" alt="Laravel Logo"></a></p>

<p align="center">
For more info and how YOU can help please visit the official website of Ukraine <a href="https://war.ukraine.ua/" target="_BLANK">war.ukraine.ua</a>
</p>

## About Open Source Ukraine Refugee Tracking Project

This project helps to track refugee camps for Ukrainian people fleeing the war.

- Add refugee Centre, Capacity, Rooms and Volunteers
- Refugee Registration, Family, Pets, Destination
- Register aid they received
- Register their health condition, mood
- Register beds they are sleeping in

## Dependencies  
  
This project depends on MySQL database management system.
  
## Quickstart  

Clone the repository  
  
```git clone git@github.com:saulius334/laravel-project1.git```  
  
Switch to the repo folder  
  
```cd laravel-project1```  
  
Install all the dependencies using composer  
  
```composer install```  
  
  
Copy the example env file and make the required configuration changes in the .env file  
  
```cp .env.example .env```  
  
Generate a new application key  
  
```php artisan key:generate```  
  
Start Apache and MySQL servers  
Set the database connection in .env before migrating  
  
```php artisan migrate```  
  
Start the local server  
  
```npm run dev```
```php artisan serve```  
  
You can now access the server at http://localhost:8000/home




  
  
## License

This project is open-sourced under the [MIT license](https://opensource.org/licenses/MIT).  
Feel free to use it.
