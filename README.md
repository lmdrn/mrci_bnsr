## régler le nom de la base de donnée du projet

au besoin, dans docker/docker-compose.yml :

modifier les valeurs de (pour y mettre dans les 2 cas le nom de bdd souhaité :

MYSQL_DATABASE

WORDPRESS_DB_NAME


## faire tourner le projet avec docker en local

`cd docker`

démarrer le container --> `sudo docker-compose up -d`

stopper le container -->  ` sudo docker-compose down`

stopper tous les containers --> `sudo docker stop $(sudo docker ps -a -q)
`
## mettre à jour la base de donnée via docker

`sudo docker exec -i docker_db-wordpress_1 mysql -uroot -psomewordpress NOM-BDD < FICHIER-SQL-A-UTILISER.sql`
