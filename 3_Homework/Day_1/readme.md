# MySQL - homework
> Complete all exercises in the prepared files. Database queries should be assigned to variables prepared for them.

> Additional exercises are for volunteers

**IMPORTANT - do not change the file structure or filenames and use the prepared variables**

#### Setup and information

In `dump.sql`, you will find a dump of 2 tables from the database filled with data on which you will work. Import it to your database.  

The structure and meaning of individual columns in the table:

Table named `users`:
* `id` - user id
* `name` - username
* `email` - user mail
* `password` - user password (hash **sha-256**)
* `salt` - "salt" used to generate user password

Table named `offers`:
* `id` - offer id
* `owner` - user id, relation with `users` table
* `status` - offer status: `0` - verification, `1` - active, `2` - rejected
* `price` - offer price
* `promoted` - `0/1` - is offer promoted
* `title` - offer title
* `description` - offer description
* `phone` - phone for the offer
* `expire` - offer expiration - if offer was inactive in the past
* `promoted_to` - offer promotion time - if offer was not promoted in the past
* `activation_token` - token for activating offer

In `config.php`, you will find constants with database settings. Complete them with your data.

**To connect to the database, in each exercise file use the previously prepared `config.php` file and constants contained therein, attach it to the exercise file**


In queries saved in variables you do not have to place a semicolon `;` at the end, you do not need to add a database name in queries, only the name of a table, e.g.
```php
$q1 = 'SELECT * FROM database1.table1';// -- WRONG - database name written directly in the query
$q2 = 'SELECT * FROM table1;';// - WRONG - semicolon at the end
$q3 = 'SELECT * FROM table1';// - GOOD - no database name
$q4 = 'SELECT * FROM ' . DB_DB . '.table1';// - GOOD - database name passed as a constant from config.php file
```

#### Exercise 1

The `exercise1.php` file contains variables. Assign `SQL` queries to them which will:

1. Return users whose name is `Julia`
2. Return a list of `5` users sorted by email, descending
3. Return a list of users whose email is in the `@yahoo.com` domain and starts with the letter `L`
4. Return a list of users whose `SHA2(name.salt)` is is compatible with the `password` column - hint: [SHA2()][mysql_sha2], [CONCAT()][mysql_concat]
5. Return a list of **ids** and **titles** of offers with price greater than `500000`
6. Return a list of **ids** and **prices** of offers that do not have an activation token and have a price between `2000` and `400000` - hint: [BETWEEN()][mysql_between]
7. Return a list of **titles**, **prices** and **phones** of offers that end within `10` days and are active (**their expiration date is greater than current time and they have an appropriate value in the `status` column**) - hint: [DATE_ADD()][mysql_date_add], [CURRENT_TIMESTAMP()][mysql_current_timestamp], [FROM_UNIXTIME()][mysql_from_unixtime]
8. Return a list of offers that have the word `violent` in descriptions, a phone number containing `2` and a price greater than `50000`
9. Return a list of offers that **are not** promoted and their price is less than `300000` and their title **ends** with `LLC`
10. Increase the price by `1000` in offers where the owner's `id` is between `20` and `25`
11. Delete offers that expired `3` or more days ago, e.g. for current date `2016-11-05 12:45:03` offers older than `2016-11-02 12:45:03` will be deleted - hint: [DATE_ADD()][mysql_date_add], [NOW()][mysql_now]
12. Delete offers with phone number beginning with `+48` that are promoted (**appropriate value in the `promoted` column**) and active (**their expiration date is greater than current time and they have an appropriate value in the `status` column**)
13. Change promotion status to `1` and add promotion end in `23` days in offers where `3th` and `4th` digits of phone number are `48`, that are not promoted currently - hint: [SUBSTRING()][mysql_substring]
14. Return promoted offers where the price multiplied by `2` is less than `50000` (**promoted means that their promotion end dates are in the future and they have appropriate values in the `promoted` column**)
15. Change the word `executed` to `founded` in offer descriptions but only in those where the phone number contains `(` or `)` and the price is greater than `400000`
16. Return the number of active offers (**their expiration date is greater than current time and they have an appropriate value in the `status` column**) as `sum_active` alias - hint: [COUNT()][mysql_count]

    ```
    Example
    +------------+
    | sum_active |
    +------------+
    |         59 |
    +------------+
    ```

17. **additional** Return the number of active offers (**their expiration date is greater than current time and they have an appropriate value in the `status` column**) as `sum_user` alias, owned by user. The returned list should contain all users - hint: `GROUP BY`, `WHERE`, `COUNT()`

    ```
    Example
    +-------+----------+
    | owner | sum_user |
    +-------+----------+
    |     2 |        9 |
    |     3 |       21 |
    |     5 |        1 |
    |    10 |        1 |
    |   ... |      ... |
    |    13 |        2 |
    +-------|----------|
    ```

18. **additional** Return the number of offers **only the active and rejected ones** returned as `type` and `counter` columns. `2` records should be returned.

    ```
    Example
    +------+---------+
    | type | counter |
    +------+---------+
    |    1 |      14 |
    |    2 |      42 |
    +------+---------+
    ```

19. **additional** Return the **sum** of prices of inactive offers (**with past expiration time** and active `status=1`) that were not promoted as `sum_nonactive_nopromoted` alias - hint: [SUM()][mysql_sum]
20. **additional** Return average offer price as `avg_price` rounded to `2` decimal places, taking into account only active (**their expiration date is greater than current time and they have an appropriate value in the `status` column**) and **promoted** offers with price exceeding `44645.04` - hint: [AVG()][mysql_avg], [ROUND()][mysql_round]

    ```
    Example
    +-----------+
    | avg_price |
    +-----------+
    | 523168.97 |
    +-----------+
    ```

#### Exercise 2

Save the queries that form tables in appropriate variables in `php`.

Create the following tables in the database:
```SQL
* images:
  * id: int unsigned auto_increment primary key
  * offer_id: int unsigned
  * src: varchar(100) (link to image)
  * dimension: varchar(10) (e.g. 400x832)
* users_companies:
  * id: int unsigned auto_increment primary key
  * user_id: int unsigned unique
  * name: varchar(30)
  * nip: int
  * street: varchar(50)
  * street_nr: mediumint
  * phone: char(9)
  * post_code: char(6)
  * capital: decimal(7,2)
  * rate: decimal(5,4)
  * created_at: datetime
```

#### Exercise 3

1. Write queries that add `5` records to each table created in the previous exercise (remember not to exceed the character limit for columns, e.g. `dimension`).  
2. Save the queries in appropriate variables in the `exercise3.php` file.


#### Exercise 4 - additional

**The displayed messages/texts must be completely identical to those from exercise description**  

The task is to create a page where a list of users from the `users` table will be displayed, but with the use of pagination,
which means displaying a certain number of records per page depending on which page we are on.

By default, `15` records are displayed per page.
Page `1` - records `1-15`  
Page `2` - records `16-30`  
Page `3` - records `31-45`  
etc...
In this case, records from `31` to` 45` should appear on page `3`.

1. Save **all** records from `users` table, sorted by name **in ascending order**, in a variable.
2. Calculate how many pages there should be for this number of extracted records.
3. Generate links at the bottom of the page containing the number of the next page and a link to the file with the exercise, **example of a link is in a comment**.
4. Check if the `page` parameter was sent using `GET`. If not, the default page is page `1` or the one chosen using `GET`.
5. If a page was chosen, choose those records from the extracted record list that match the given page and generate `li` elements for them **as shown in the code in comment**.
6. If the passed parameter is not a number, display the message on the page: `Incorrect page - this is not a number`.
7. If the chosen page number is equal to or less than `0` **or** the passed parameter is not a number, display the message on the page: `Incorrect page - below the range`.
8. If the chosen page number is greater than the highest possible page number, display the message on the page: `Incorrect page - above the range`.
9. **additional** - add the possibility of passing the `perPage` parameter using `GET` that shows how many records will be displayed per page. Remember that this will determine the number of links to pages displayed at the bottom of the page.
10. **additional** - instead of loading all records from the database, use `LIMIT` in the query to load just a part of the table.

#### Exercise 5 - additional

**The displayed messages/texts must be completely identical to those from exercise description**  

1. Write a form (POST) with 1 `select` field with `name=domain` attribute. The form is partly written.
2. The `option` fields should be a list of email domains extracted from the `users` table. To do this, load all emails, retrieve from them all characters that occur  **after** the `@` sign, e.g. john.granger@**yahoo.com**. Then extract unique values and generate `option` fields using a loop in `php`.
3. To retrieve all unique domains from the database using the query, see the hint on [StackOverflow][stack_mysql_domain]
4. When the form is submitted, a list of users who have an email in a given domain should be displayed one by one, in the format `Alex Springfield (alexspf11@msn.com)`.
5. The list of users should be displayed in a place reserved for it in the code.

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
[mysql_now]: https://dev.mysql.com/doc/refman/5.6/en/date-and-time-functions.html#function_now
[stack_mysql_domain]: http://stackoverflow.com/a/2440458/3668159
