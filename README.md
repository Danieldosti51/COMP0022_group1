# COMP0022_group1

To build the containers, run `docker-compose up`. Run `docker-compose down` to remove them.
All updates made to the php file should be visible to localhost.

To fully configure the containers, first hop into the web container by running `docker exec -it <webserver_container_id> bash`, and execute the command `docker-php-ext-install mysqli` followed by `apachectl restart`. This should install the necessary MySQL extension. Finally, hop into the db container by running `docker exec -it <db_container_id> mysql -u root -p` (the password is root) and running the command `ALTER USER 'root' IDENTIFIED WITH mysql_native_password BY 'root';`.