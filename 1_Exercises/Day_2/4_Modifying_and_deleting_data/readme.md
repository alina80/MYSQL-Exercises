Exercise<img alt="Logo" src="http://coderslab.pl/svg/logo-coderslab.svg" width="400">

#  Modifying and deleting data

>Perform all database queries in the **console**, additionally, save the contents of queries in **php** files prepared for each exercise.  

**IMPORTANT - do not change the file structure or filenames and use the prepared variables**

#### Exercise 1 - done with the lecturer

Work on `cinemas_ex` database.  

1. In the file named **exercise1.php**, load film `id` and `title` from the database, and generate a list of links in the file named **exercise1_getmovie.php** passing film `id`as `GET` parameter.
2. Switch to an appropriate, prepared file using `GET` method, extract the data of a chosen film to the prepared variables. The data will be put as values of the film editing form.
3. After sending the editing form using the `POST` method, edit an appropriate database entry **remembering not to change the data of all films**, then display an appropriate message on the page.

#### Exercise 2 - done with the lecturer

Work on `cinemas_ex` database.  

1. In the file for this exercise, you will find a form for deleting a film.
2. The form has a `select` field for choosing from a list of available films. `option` fields must be generated in `php` based on the list of films in the database.
3. When the form is submitted, the selected movie should be deleted and an appropriate message should be displayed.
4. Sending a form without choosing an option in the `select` field, should result in displaying an error message.

-------------------------------------------------------------------------------

#### Exercise 3

Work on `cinemas_ex` database.  

**The form in this exercise is sent to the address of the file from which `action=""` is called, the code handling the form is included in the main file**

1. In the file named **exercise3.php**, extract ids and names of all cinemas in the database, and generate a list of links to the file named **exercise3_getcinema.php** passing cinema `id` as `GET` parameter.
2. Follow the same steps to download and edit a cinema, just like in exercise 1.

#### Exercise 4

Work on `cinemas_ex` database.  

**The form in this exercise is sent to the address of an external file `action="exercise4_remove.php"`, the code handling the form is written in the external file, thus the form is handled in that file - which is another way of dealing with forms**

1. In the file for this exercise, you will find a form with `select` for choosing a table from the database.
2. Additionally, the form contains an `input` field with `id`.
3. Write `php` code that will extract data from the form and delete a record with a given `id` from a given table.
   After deleting, the code should display the id of deleted element, **or information that an element with such id does not exist in the database**.
4. Sending a form without choosing an option in the `select` field or without entering an `id`, should result in displaying an error message.
