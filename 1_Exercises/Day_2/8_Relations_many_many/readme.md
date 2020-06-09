<img alt="Logo" src="http://coderslab.pl/svg/logo-coderslab.svg" width="400">

#  Many-to-many relations

>Perform all database queries in the **console**, additionally, save the contents of queries in **php** files prepared for each exercise.  

**Some of the exercises expect you to create a relation between tables, in which case you can and even must modify the table structure and add new columns or new tables**

**IMPORTANT - do not change the file structure or filenames and use the prepared variables**

#### Exercise 1 - done with the lecturer

Work on `products_ex` database.

Connect the tables ```Products``` and ```Orders``` with a many-to-many relation.  
Name the new table `Products_Orders`.  
Write a few queries that will connect existing products with orders.

In **exercise1_ord_prod.php** write a page that will display:
* all orders,
* all products in an order (under an appropriate order), e.g.:
```
Order with id 6:
* Product o id 1
* Product o id 3
* Product o id 7
```

In **exercise1_prod_ord.php** write a page that will display:
* all products,
* orders which contain the product (under an appropriate product), e.g.:
```
Product with id 12:
* Order with id 5
* Order with id 6
* Order with id 11
```

#### Exercise 2 - done with the lecturer

Work on `products_ex` database.

1. The file named **exercise2_new_order.php** contains a form for adding new orders by entering order description and choosing products for the order from a list (products should be displayed as checkboxes).
2. Analyze the code and add missing ``php`` code that will enable the user to choose products.
3. Next, add ``php`` code that will handle the form (adding to the database the new order, as well as all relations between this order and chosen products).

-------------------------------------------------------------------------------

#### Exercise 3

Work on `cinemas_ex` database.


**The form in this exercise is sent to the address of the file from which `action=""` is called**

1. Connect the tables `Cinemas` and `Movies` by a many-to-many relation (film can be screened in many cinemas, a cinema can have many films). Name the additionally created table `Screenings`.
2. The file named **exercise3_new_screening.php** contains a form for adding new screenings choosing a cinema and a film - drop-down of cinemas and of films (data loaded from database).
3. Analyze the code and add missing ``php`` code that will allow the user to choose cinemas and films.
4. Next, add ``php`` code that will handle the form (by adding a screening to database).

#### Exercise 4

Work on `cinemas_ex` database.

**The form in this exercise is sent to the address of the file from which `action=""` is called**

1. The file named **exercise4_show_cinemas_by_movie.php** contains a form for choosing any film that is in the database.  
   Analyze the form and add missing ``php`` code that will allow the user to choose films.  
   Then, add code that will handle the form (by displaying all cinemas that have screenings of the chosen film).
2. The file named **exercise4_show_movies_by_cinema.php** contains a form for choosing any cinema that is in the database.  
   Analyze the form and add missing ``php`` code that will allow the user to choose cinemas.  
   Then, add code that will handle the form (by displaying all films that can be seen in the chosen cinema).
