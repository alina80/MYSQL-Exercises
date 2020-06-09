<img alt="Logo" src="http://coderslab.pl/svg/logo-coderslab.svg" width="400">

#  One-to-one relations

>Perform all database queries in the **console**, additionally, save the contents of queries in **php** files prepared for each exercise.  

**Some of the exercises expect you to create a relation between tables, in which case you can and even must modify the table structure and add new columns or new tables**

**IMPORTANT - do not change the file structure or filenames and use the prepared variables**

#### Exercise 1 - done with the lecturer

Create the following table in the database named ```products_ex```:
```SQL
* ClientAddress:
  * client_id: int
  * city: string
  * street: string
  * house_nr: string
```

The ```ClientAddress``` table should be connected by a one-to-one relation with ```Clients``` table.
Write 5 SQL queries that will add addresses for existing users.

-------------------------------------------------------------------------------

#### Exercise 2 - database import

If you do not have the `cinemas_ex` database or it is incomplete, delete it and create a new database named ```cinemas_ex```.  
Then, import the data from **cinema.sql** to it. Those are tables filled with a lot of data. Just like in the previous day's exercises but without the payment table.

#### Exercise 3

Work on `cinemas_ex` database.  

Create a database for payments.  
It should have the same data as in the exercises from the previous day.
```SQL
 * Payments:
   * id: int
   * type: string
   * date: date
 ```

It should be connected with the `Tickets` table by a one-to-one relation.  
There is the following relation between ticket and payment:
* a ticket has `1` or `0` payments (not paid for)
* payment must be assigned to a ticket **(add an appropriate column to the `Payments` table while creating it)**

#### Exercise 4

Work on `cinemas_ex` database.  

**The form in this exercise is sent to the address of the file from which `action=""` is called.**

The file named **exercise4.php** contains a form for buying a ticket, where quantity, price, and payment method can be entered (the last is optional). Write ``php`` code that will handle this form. Remember to create two entries in the database if the user chose payment method:
* An entry in **Tickets** table,
* An entry in **Payments** table, maintaining the relation with the newly created ticket (ticket id in `tickets` table should be the same as id of created ticket).

#### Exercise 5

Work on `cinemas_ex` database.  

In the file named **exercise5.php**, write ``php`` code that will allow the user to see all ticket paid for using:
* card,
* cash,
* transfer,
* not paid for (those which do not have a payment assigned).  

Try to do the exercise in the same way as exercises `5` and `6` from `2_Adding_extracting_data`.  
Buttons are ready.
