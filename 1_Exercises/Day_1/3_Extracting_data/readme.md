<img alt="Logo" src="http://coderslab.pl/svg/logo-coderslab.svg" width="400">

#  Extracting data

>Perform all database queries in the **console**, additionally, save the contents of queries in **php** files prepared for each exercise.  

**IMPORTANT - do not change the file structure or filenames and use the prepared variables**

#### Exercise 1 - done with the lecturer

1. Write a page that will display all products in the database named ```products_ex```.  
2. If the product description is longer than 20 characters, the page should show the first 20 characters and ```...``` at the end.  
3. Add a product with a long description to your database to test how your code works.

#### Exercise 2 - done with the lecturer

1. Write a page that will display film ranking.
2. The ranking should display films whose rating is greater than the average rating of all films.
3. First, calculate the average rating of films and then download films with a rating greater than the average.
4. The lecturer will show you how to calculate the average rating with the help of SQL query and `AVG()` function.
5. Note that another way to do this exercise is to extract all films, save them in a table, and then calculate average rating and filter the table so that it contains only the films that we are interested in.

-------------------------------------------------------------------------------

#### Exercise 3

In the file named **exercise3.php**, write SQL queries that will:

1. Choose all films with names starting with the letter `W`.
2. Choose all tickets with price greater than **15.30**.  
3. Choose all ticket records with ticket quantity greater than **3**.  
4. Choose all films with rating greater than **6.5**.  

#### Exercise 4

1. In the file named **exercise4.php**, you will find a partially prepared ``html`` and ``php`` code - analyze it.
2. Write a script that will display all movies, cinemas, tickets and payments on the website - only if appropriate GET data are transmitted.  
3. Each entry in each table should be displayed as a link that leads to the file named **exercise5_table_info.php** where you should send table name and the id of the row whose data you want to download using `GET`.

Example of links:  
```HTML
<a href="exercise5_table_info.php?table=cinemas&id=43" target="_blank">Cinema with id 43</a>
<a href="exercise5_table_info.php?table=tickets&id=11" target="_blank">Ticket with id 11</a>
```

#### Exercise 5

1. In the file named **exercise5_table_info.php**, write ``php`` code that will extract the data sent using `GET` from links from exercise 4.
2. Then display all the information about the element whose `id` was sent.
   Remember to read the data from an appropriate table (its name is also sent by `GET`).


[ref-multiple-forms]: http://stackoverflow.com/a/14071321
