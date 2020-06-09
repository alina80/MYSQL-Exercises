# MySQL - homework
> Complete all exercises in the prepared files. Database queries should be assigned to variables prepared for them.

> Additional exercises are for volunteers

**IMPORTANT - do not change the file structure or filenames and use the prepared variables**

**To connect to the database, in each exercise file use the previously prepared `config.php` file and constants contained therein, attach it to the exercise file**

**The second day exercises are based on the database and tables from the first day**

#### Setup and information

In `config.php`, you will find prepared constants with database settings. Complete them with your data.

**To connect to the database, in each exercise file use the previously prepared `config.php` file and constants contained therein**  

In queries saved in variables you do not have to place a semicolon `;` at the end, you do not need to add a database name in queries, only the name of a table, e.g.
```php
$q1 = 'SELECT * FROM database1.table1';// -- WRONG - database name written directly in the query
$q2 = 'SELECT * FROM table1;';// - WRONG - semicolon at the end
$q3 = 'SELECT * FROM table1';// - GOOD - no database name
$q4 = 'SELECT * FROM ' . DB_DB . '.table1';// - GOOD - database name passed as a constant from config.php file
```

#### Exercise 1

Add appropriate relations described below to the `2` tables from the first day.
```SQL
* images (1-to-many relation with offers table [offer_id]):
  * offer_id: int unsigned -> foreign key
* users_companies (1-to-1 relation with users table [user_id]):
  * user_id: int unsigned -> foreign key -> remember that this is 1-to-1 relation
```

Save the queries in appropriate variables prepared in the file named `exercise1.php```

#### Exercise 2

**The displayed messages/texts must be completely identical to those from exercise description**    

1. In`exercise2.php` write a form (`POST`) for adding a user to the database (only `name` and `email` fields). `name` attributes of `input` fields should be **identical** with the column names in the table.
2. The `salt` field should be generated as `6` random characters, and `password` - as `sha-256` hash of a string with `name` and `salt`. Generate it in `php` after the form is submitted - hint: `hash('sha256', 'string_to_hash')`
3. After adding the user to the database (remember to add the `password` and `salt` as well) a message should be displayed on the page, e.g. `Added user with id: 34`. The id should match the `id` in the database.

#### Exercise 3

**The displayed messages/texts must be completely identical to those from exercise description**    

1. In `php` add code that will cause the following effect: after calling the page with the exercise and sending `GET` parameter `showUser` as user `id` in the database, the username and email will be displayed on the page in te format: `Alex Nodeland (alexnod85@yahoo.com)`.
2. If `showUser` is not a number, display the message: `Incorrect showUser parameter`.
3. If a user with `showUser` `id` does not exist in the table,  display the message: `User is not in the database`.

#### Exercise 4

**The displayed messages/texts must be completely identical to those from exercise description**    

1. Write a form (`POST`) for adding links to images in offers. The `name` attributes of form fields must be **identical** as column names in the table.
2. Add a `select` field to the form with a list of offers loaded from `offers` table. An `option` should be a single offer, use a loop in `php`; **only** offer title should be visible in the `option` field, and the value of this field is the `id` of the offer, e.g. `<option value="42">Sample title</option>`  
   Add `<option value=""> -- Wybierz --</option>` at the beginning - as the first element.
3. Add appropriate `input` fields to the image link and dimensions.
4. After the form is submitted, add an appropriate record to the database and display the message on the page: `Image was added to offer ID`, where `ID` should be substituted with offer `id`.

#### Exercise 5 - additional

**The displayed messages/texts must be completely identical to those from exercise description**  

1. Write `php` code that will return a list of records that meet the conditions from the parameters when the file for this exercise is called with parameters `GET` `table` `column` `value` `show`.
2. Example of a call: `exercise6.php?table=users&column=email&value=sonia52@gajewski.pl&show=name`,  
   should return record/s from the `users` table, **display data from the `name` column**, as a list, one by one. The records should meet the condition where the value of `email` column is `sonia52@gajewski.pl`;
   list template and comments can be found in the file for this exercise.

#### Exercise 6 - additional

**The displayed messages/texts must be completely identical to those from exercise description**  

1. The file prepared for this exercise contains a form (`POST`) with `1` `select` field with `name=daysToEnd` attribute and `option` values: `1, 3, 7, 30`.
2. After the form is sent, a list of **offer titles** should be displayed on the page for offers with expiration date is greater than current date but less than current date + number of days sent in the form.
3. For example, the value of `7` sent in the form should return **title list**, for offers that expire in the next `7` days;  
list template and comments can be found in the file for this exercise.

#### Exercise 7 - additional

**The displayed messages/texts must be completely identical to those from exercise description**  

1. The file prepared for this exercise contains a form (`POST`) with 1 `input` field with `name=price` attribute.
2. After the form is sent, a list of offers should be displayed on the page - **titles only**, where the price (`price` column) is **equal to or greater than** the value sent through the form.
3. Additionally, **under** the list there should be information with the sum of offer prices placed in a `div` with `offersPriceSum` class, that were loaded in point 2. The information should appear **only** after the form was submitted.
4. For example, the value of `2543.93` sent in the form should result in displaying a message: `<div class="offersPriceSum">Calculated offer sum: 85879.49 USD</div>`, where `85879.49` is the sum of offers which price is equal to or greater than `2543.93`. You can calculate the sum in `php` or try to do it with a query to the database - hint: [SUM()][mysql_sum]
5. The sum **should be rounded** to `2` decimal places, even if it is `0` - then the sum will be `0.00 USD`,
list template and comments can be found in the file for this exercise.

<!-- Links -->
[mysql_concat]: https://dev.mysql.com/doc/refman/5.7/en/string-functions.html#function_concat
[mysql_sha2]: https://dev.mysql.com/doc/refman/5.6/en/encryption-functions.html#function_sha2
[mysql_between]: https://dev.mysql.com/doc/refman/5.7/en/comparison-operators.html#operator_between
[mysql_sum]: https://dev.mysql.com/doc/refman/5.7/en/group-by-functions.html#function_sum
[mysql_substring]: https://dev.mysql.com/doc/refman/5.7/en/string-functions.html#function_substring
[mysql_count]: https://dev.mysql.com/doc/refman/5.7/en/counting-rows.html
[mysql_avg]: https://dev.mysql.com/doc/refman/5.7/en/group-by-functions.html#function_avg
[mysql_round]: https://dev.mysql.com/doc/refman/5.7/en/mathematical-functions.html#function_round
[mysql_date_add]: https://dev.mysql.com/doc/refman/5.5/en/date-and-time-functions.html#function_date-add
[mysql_current_timestamp]: https://dev.mysql.com/doc/refman/5.5/en/date-and-time-functions.html#function_current-timestamp
[mysql_from_unixtime]: https://dev.mysql.com/doc/refman/5.5/en/date-and-time-functions.html#function_from-unixtime
[stack_mysql_domain]: http://stackoverflow.com/a/2440458/3668159
