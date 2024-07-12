Github Rules
Ici les règles à respecter pour le dév collaboratif ! 

On va utiliser les commandes Git 😉

Règles à respecter quand on créer  une nouvelle feature : 

On se place sur sa branche  de son prenom local : git checkout prenom
On pull la branche main de Github : git pull origin main
On vérifie si tout est bon : git status
On crée sa branche sur laquelle on va travailler : git checkout -b  nom-de-la-branche

Règles à respecter quand on push/partage son travail :

On add, commit , et push sa branche :
git add .
git commit -m ‘un message clair du commit’
git push origin le-nom-de-la-branche
git status , voir si le push a marché
Aller sur Github et faire le merge la-bas:
Creer un pull request
Gerer les conflit
❗Faire valider sa branche par un autre membre
Merger
Retourner sur sa branche main local : git checkout main
Récupérer son travail: git pull origin main
