<img alt="Logo" src="http://coderslab.pl/svg/logo-coderslab.svg" width="400">

#  One-to-many relations

>Perform all database queries in the **console**, additionally, save the contents of queries in **php** files prepared for each exercise.  

**Some of the exercises expect you to create a relation between tables, in which case you can and even must modify the table structure and add new columns or new tables**

**IMPORTANT - do not change the file structure or filenames and use the prepared variables**

#### Exercise 1 - done with the lecturer

Create the following table in the database named ```products_ex```:
```SQL
* Opinions:
  * description: string
```

1. The ```Opinions``` table should be connected by a one-to-many relation with ```Products``` table (a product has many opinions, an opinion is assigned to one product).
2. Write `5` queries for each of the `3` existing products that will add opinions.  
3. In the prepared file `exercise1_product_opinions.php`, add code for displaying all products. Under each product its opinions should be displayed.

-------------------------------------------------------------------------------

#### Exercise 2

Create the following table in the database named ```products_ex```:
```SQL
* Categories:
  * id: int
  * name: string
* Categories_sub:
  * id: int
  * main_id: int -- relation with main category id
  * name: string
```
Connect the tables `Categories` and `Categories_sub` with a many-to-one relation (one category can have many subcategories, one subcategory has one parent category).

#### Exercise 3

Work on `products_ex` database.

**The form in this exercise is sent to the address of an external file `action="exercise3_add_main.php"`.**

1. The file named **exercise3.php** contains a form with `1` `input` for category name - analyze it.
2. Add handling of adding categories in the database.

#### Exercise 4

Work on `products_ex` database.

**The form in this exercise is sent to the address of an external file `action="exercise4_add_sub.php"`.**

1. The file named **exercise4.php** contains an unfinished form for adding subcategories.
2. Add appropriate code for generating `option` elements with main categories that are in the database.
3. Add handling of adding subcategories in the database.
