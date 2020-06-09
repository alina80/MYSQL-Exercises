<img alt="Logo" src="http://coderslab.pl/svg/logo-coderslab.svg" width="400">

#  Modifying and deleting tables

>Perform all database queries in the **console**, additionally, save the contents of queries in **php** files prepared for each exercise.  

**IMPORTANT - do not change the file structure or filenames and use the prepared variables**

#### Exercise 1 - done with the lecturer

Work on `cinemas_ex` database.  

1. Add `priceUSD` column to the `Tickets` table for storing ticket price in `USD`.
2. Add `director` column with `char(80)` type to the `Movies` table for storing name and surname of the director.
3. In `Movies` table, change the `director` column type to `varchar(50)`.
4. Delete `priceUSD` column from the `Tickets` table.

#### Exercise 2 - done with the lecturer

Work on `cinemas_ex` database.  

Write the following database queries:

1. One that changes the address to `National Stadium` in cinemas with names ending with the letter `Z`.
2. One that deletes payments with dates earlier than `4` days from current date measured with an accuracy of one second.
3. One that changes film rating to `5.4` in films with description longer than `40` characters - try to find a `MySQL` function that checks character count.
4. One that changes the price of a ticket by `50%` if quantity exceeds `10`, do it as a single `SQL` query.

-------------------------------------------------------------------------------

#### Exercise 3

Work on `cinemas_ex` database.  

Write the following database queries:

1. One that adds `watchCount` column to `Movies` table for storing the number of film displays.
2. One that adds `isTop` column to `Movies` table for storing `tinyint` value (which is `0` by default) informing whether the film is a hit or not.
3. One that updates `Movies` table in such a way that `isTop` column will have the value of `1` if `watchCount > 100`, otherwise it will be `0`.
4. One that adds `openTime` column to `Cinemas` table for storing opening times of cinemas.
5. One that adds `closeTime` column to `Cinemas` table for storing closing times of cinemas.

#### Exercise 4

Work on `cinemas_ex` database.  

**The form in this exercise is sent to the address of an external file `action="exercise4_form.php"`.**

1. In the file for this exercise, there is a `html` form with a `select` field for choosing columns of the `Movies` table.
2. The form also contains 2 `input` fields for the name and type of a new column.
3. The form also contains 2 buttons: `REMOVE` and `ADD` - for deleting a chosen column from the table, and for adding a new column in `Movies` table according to the data from `input` fields.
4. Add `php` code that will cause the handling of adding and deleting columns in `Movies` table depending on the clicked button.
   In exercises from the previous day, you will find a description of how to determine which button was clicked.
