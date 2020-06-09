<img alt="Logo" src="http://coderslab.pl/svg/logo-coderslab.svg" width="400">

# MySQL - Snippets
> Short pieces of code that solve various problems, illustrate dependencies, or show how to use some more complicated functions.

#### 1. How to connect with MySQL in PHP?

```PHP
$pdo = new PDO("mysql:host=localhost;dbname=database", 'username', 'password');
```
To change the database engine e.g. to SQLite, we only change the constructor's arguments without having to change used methods.

#### 2. What is the difference between `utf8_general_ci` encoding and `utf8_polish_ci`?

The difference occurs when sorting data, in `utf8_general_ci` words starting from a Polish character will land at the end of the sorting list, e.g. the cities `Białystok, Łódź, Kraków, Arłamów, Zabrze` will be sorted in the following way:  
* `utf8_general_ci` - sorted cities: `Arłamów, Białystok, Kraków, Zabrze, Łódź`
* `utf8_polish_ci` - sorted cities: `Arłamów, Białystok, Kraków, Łódź, Zabrze`

#### 3. How to connect to a database from the console?

```SQL
mysql -u userName -p dbName <- this command interactively asks us for a password
```

We can also switch to the database by ourselves:
```SQL
use dbName;
```
To check the number of tables in the database:
```SQL
show tables;
```

#### 4. How to delete all records from a table?

```SQL
DELETE FROM tableName;
```
The query above also resets the `auto_increment` counter automatically

#### 5. How to add a new user to the database from the console?

First, we add the user:  
```SQL
CREATE USER 'username'@'localhost' IDENTIFIED BY 'password';
```

Then we have to give the user access to the selected database/table:
```SQL
GRANT ALL ON database.* TO 'username'@'localhost';
```

These queries are general queries to add any permissions to a user of a database, for more detailed permissions - see the documentation.

#### 6. How to extract detailed information (keys, etc.) from downloaded records?

We add `EXPLAIN` at the beginning of our query, e.g.  
```SQL
EXPLAIN SELECT * FROM users;
```

#### 7. How to calculate the number of records in a table?

```SQL
SELECT COUNT(anyColumnName) as count FROM tableName;
```

#### 8. What range of data does the `varchar` type store?

In the latest versions of MySQL, `varchar` can accept` 65.535` characters. The difference occurs in the memory that a record occupies - if the type is maximally `varchar (255)`, the length of the field takes 1 byte, and in case of any longer field size, e.g. `varchar (1500)`, the length of the field takes 2 bytes.

#### 9. Can numbers be stored as `text`?

Yes, but you should not do this. Data types for numbers, e.g. `int`, operate much faster when it comes to sorting and downloading data.

#### 10. What type of data should I use to store a price?

**Definitely** `decimal` because it stores the exact value and there will be no problems with arithmetic operations.
E.g. definition `decimal(6,2)` means that the number should have `6` digits in total (before and after the comma), including the `2` after the decimal point.

#### 11. How to make a database backup?

**Backup of a single database**
```Shell
mysqldump -u root -pPASSWORD DB_NAME > backup.sql
```
Syntax
```Shell
mysqldump -u root -p[root_password] [database_name] > dumpfilename.sql
```

**Backup of multiple databases**
```Shell
mysqldump -u root -pPASSWORD --databases DB_NAME_1 DB_NAME_2 > backup_multi.sql
```
**Backup of all databases**
```Shell
mysqldump -u root -pPASSWORD --all-databases > backup_all.sql
```
**Backup of a single table**
```Shell
mysqldump -u root -pPASSWORD DB_NAME TABLE_NAME > backup_table_in_db.sql
```    

#### 12. How to restore a database backup?
```Shell
mysql -u root -pPASSWORD DB_NAME < /tmp/backup.sql
```
Syntax
```Shell
mysql -u root -p[root_password] [database_name] < dumpfilename.sql
```

#### 13. How to generate `sql` code that creates a selected table?

```SQL
SHOW CREATE TABLE table_name;
```

#### 14. How to replace a string in all records in one column at the same time?

```SQL
UPDATE   TABLE
SET      COLUMN = REPLACE(COLUMN, search_string, replace_string)
WHERE    COLUMN LIKE '%search_string%'
```
np.
```SQL
UPDATE   DatabaseName.TableName
SET      PDF_NAME = REPLACE(PDF_NAME, '+', '_')
WHERE    PDF_NAME LIKE '%+%'
```

#### 15. How do I add the condition `x days` ago in `where`?

```SQL
WHERE my_date >= DATE_SUB(CURRENT_DATE(), INTERVAL 5 DAY)
```


#### 16. How to delete records with duplicate value of the selected column, leaving one record with the given value?

Let's assume that our table looks the following way:
```SQL
+----+--------+
| id | name   |
+----+--------+
| 1  | google |
| 2  | yahoo  |
| 3  | msn    |
| 4  | google | <-- duplicate
| 5  | google | <-- duplicate
| 6  | yahoo  | <-- duplicate
+----+--------+
```

We want to achieve:
```SQL
+----+--------+
| id | name   |
+----+--------+
| 1  | google |
| 2  | yahoo  |
| 3  | msn    |
+----+--------+
```

We make a query:
```SQL
DELETE n1 FROM names n1, names n2 WHERE n1.id > n2.id AND n1.name = n2.name
```

Where:
```
n1, n2 - aliases of the same table
n1.name = n2.name - comparing if record values are the same; name is the name of the column in which we are searching for duplicates
n1.id > n2.id - removes records, leaving a single record with the lowest id
```

#### 17. How to download a unique record?

If we want to check whether there is any `user` with `city` value of `Warsaw` in our table,
instead of:
```SQL
SELECT * FROM user WHERE city = 'Warsaw';
```
let's choose the more efficient:
```SQL
SELECT * FROM user WHERE city = 'Warsaw' LIMIT 1;
```

`LIMIT 1` will stop further searching of the table after finding the first record that meets the condition `WHERE`.

#### 18. How to make queries on text columns with an index?

If we added an index to a text column, the index will be used only if the `LIKE` query does not have the symbol of any character (`%`) at the beginning of the pattern.

Will not use index:
```SQL
SELECT * FROM user WHERE city LIKE '%War%';
```
Will use index:
```SQL
SELECT * FROM user WHERE city LIKE 'War%';
```

#### 19. Is there a difference between using `varchar(10)` and `text` for strings up to 10 characters long?

Yes, always use the smallest possible range of data in which the assumed value lies.
The smaller range means less memory used as well as faster searching.

#### 20. How to choose random records?

In `MySQL` there is a `RAND()` function, which we can use in the following way:
```SQL
SELECT username FROM user ORDER BY RAND() LIMIT 1
```

Such a query using `RAND()` is very inefficient, and with large data sets the query will run for a long time.

It is better to use the following method:
```PHP
$r = mysql_query("SELECT count(*) FROM user");
$d = mysql_fetch_row($r);
$rand = mt_rand(0,$d[0] - 1);

$r = mysql_query("SELECT username FROM user LIMIT $rand, 1");
```

#### 21. How to correctly extract data from tables?

If possible, do not download all columns of a table, so instead of:
```SQL
SELECT * FROM users
```
use
```SQL
SELECT col1, col2, col3 FROM users
```

As a result, less data will be sent which will optimize the speed of the operation.

#### 22. Which type should I use for the order status column?

 If our column stores several constant values, e.g. order status:
 * placed
 * paid
 * processed
 * sent

we can use the `varchar` type, but `enum` will definitely be better and more efficient here.

#### 23.How to store user's IP address in the database?

An IP address consists of a minimum of 7 characters `1.1.1.1` and a maximum of 15 characters` 192.168.154.199`.
The first type that comes to mind for the use in a column is `varchar`.
A better solution is to use the `int` type here and the `MySQL` `INET_ATON` function which will change an IP address from the text form to an integer, and `INET_NTOA` which will convert an integer to an IP address.
The numerical value is always more efficient when sorting and searching.

#### 24. Database analysis tools for optimization:
* https://github.com/major/MySQLTuner-perl
* https://github.com/RootService/tuning-primer
