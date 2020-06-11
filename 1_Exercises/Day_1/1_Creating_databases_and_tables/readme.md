<img alt="Logo" src="http://coderslab.pl/svg/logo-coderslab.svg" width="400">

#  Creating database and tables

>Perform all database queries in the **console**, additionally, save the contents of queries in ``php`` files prepared for each exercise.  
>Exercises done with the lecturer and the ones to do on your own will be performed on **2 different** databases.

**IMPORTANT - do not change the file structure or filenames and use the prepared variables**

#### Exercise 1

1. Create a new database named ```products_ex```.  
2. Then write a PHP script that will create a connection to this database.

#### Exercise 2

In the database named ```products_ex```, create the following tables:
```SQL
* Products:
  * id: int
  * name: string
  * description: string
  * price: decimal (2 decimal places)
* Orders:
  * id:int
  * description: string
* Clients:
  * id: int
  * name: string
  * surname: string
```

Write SQL queries in the prepared file.

**Remember to use appropriate data types for each column in the database.**

-------------------------------------------------------------------------------

#### Exercise 3

1. Create a new database named ```cinemas_ex```. Remember that if a database already exists, it cannot be created.  
2. Then write a PHP script that will create a connection to this database.

#### Exercise 4

In the database named ```cinemas_ex``` create the following tables (if a database already exists, it cannot be created - SQL will return an error):
```SQL
* Cinemas:
  * id: int
  * name: string
  * address: string
* Movies:
  * id: int
  * name: string
  * description: string
  * rating: decimal (2 decimal places)
* Tickets:
  * id: int
  * quantity: int
  * price: decimal (2 decimal places)
* Payments:
  * id: int
  * type: string
  * date: date
```

Write SQL queries in the prepared file.
Remember to:  
1. Give fields appropriate attributes (e.g. each **id** should be the primary key and be automatically numbered).  
2. **Use appropriate data types for each column in the database.**  
3. **Read carefully error codes returned by MySQL.**  
