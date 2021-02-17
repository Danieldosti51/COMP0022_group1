# COMP0022_group1

To build the containers, run `docker-compose up`. Run `docker-compose down` to remove them.
All updates made to the php file should be visible to localhost.

## IMPORTANT

For some reason, the `apache2 -D FOREGROUND` command does not run properly depending on the folder name (possibly hates multiple words? It works when I name it something simple like 'mrs'. I will look into why this is the case.).
