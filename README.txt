Déploiement 

Afin de déployer ce projet il vous suffit de de dézipper le fichier projet.zip dans votre serveur web dans le dossier /var/www/html/  

Une fois le fichier dézipper, vous pouvez supprimer l’archive projet.zip 

Il faut à présent paramétrer la base de données, pour cela il vous suffit de modifier le fichier (accessible en écriture) dbh.inc.php contenu dans le dossier includes (projet/includes/bdh.inc.php) 

Il vous suffit de paramétrer la base de donnée selon vos données.

Enfin il vous faudra éxecuté un script sql fourni (script.sql) afin de créer les tables nécessaires à la l’application dans la base de donnée. 
 
Finalement, il vous suffit de vous connecter à votre serveur web /projet pour accéder à la page index.php afin de vous enregistrer et d’utiliser l’application. 