<img alt="Logo" src="http://coderslab.pl/svg/logo-coderslab.svg" width="400">

#  Adding data

>Perform all database queries in the **console**, additionally, save the contents of queries in ``php`` files prepared for each exercise.  

**IMPORTANT - do not change the file structure or filenames and use the prepared variables**

#### Exercise 1 - done with the lecturer

1. In the file named **exercise1.php**, write SQL queries in order to fill each table in the ```products_ex``` database with 5 entries, perform the queries in the console to add entries to the database.
2. In the file named **exercise1.php** you will find a ```html``` form that adds new **products** to the database - analyze its code.
3. Add ```php``` code that handles the form and adds a new product to the database to **exercise1_form.php** file and add that file to **exercise1.php** in the right place.  
   The code should display an appropriate message (only if the form was submitted) about adding the product to the database or an error adding it.

#### Exercise 2 - done with the lecturer

1. In the file named **exercise2.php** you will find database queries.
2. The queries contain errors - find and correct them, and save the correct queries in the prepared variables.
3. Queries relate to databases and tables created in the previous chapter: `1_Creating_database_and_tables`.  

-------------------------------------------------------------------------------

#### Exercise 3

1. In the file named **exercise3.php**, write SQL queries in order to fill **each** table in the ```cinemas_ex``` database with 5 records.
2. In the file named **exercise3_form.php**, you will find a form for creating new records in the tables. Analyze the ```html``` code. **In this exercise, the form is sent to the address of the file from which it is called (note that the `action` attribute is empty - this is one of the forms processing practices)**  
3. Write ``php`` code that will add sent information to appropriate tables in MySQL.  
   The code should display an appropriate message only if the form was submitted) about adding the product to the database or an error adding it.  
4. Validate the entered data in ```php```:
  * Rating of a `Film` must be in the range from **0.00** to **10.00**.
  * Price of a `Ticket` must be greater than **0**.
  * Type of `Payment` must be one of the following strings:
    * Card,
    * Cash,
    * Transfer.

Hint:  
Note that you can distinguish which form has been sent, thanks to the fact that submit fields named ```submit``` have different values for each form (hint: use ```switch```).

If you want to read about other ways to distinguish many forms on one page, go to [this page][ref-multiple-forms].

[ref-multiple-forms]: http://stackoverflow.com/a/14071321
