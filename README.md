Agile

![alt text](img/grimace-1_2462_w620.jpg)


Documentation API

##routing :

### RSS :

    NAME : poster un article
    TYPE : POST
    URL : "url"/rss
    PARAMETER : un article ou plusieurs articles 
    RESPONSE : 200 OK !

    NAME : récupérer tout les articles
    TYPE : GET
    URL : "url"/rss/
    PARAMETER : Aucun
    RESPONSE : 200 OK ! récupération de tout les articles

    NAME : récupérer un article
    TYPE : GET
    URL : "url"/rss/{id}
    PARAMETER : id dans l'URL 
    RESPONSE : 200 OK ! récupération d'un article

### TWITTER

    NAME : poster un twitt
    TYPE : POST
    URL : "url"/twitter
    PARAMETER : un twitt ou plusieurs twitt 
    RESPONSE : 200 OK !

    NAME : récupérer tout les twitt
    TYPE : GET
    URL : "url"/twitter/
    PARAMETER : Aucun
    RESPONSE : 200 OK ! récupération de tout les twitt

    NAME : récupérer un twitt
    TYPE : GET
    URL : "url"/twitter/{id}
    PARAMETER : id dans l'URL 
    RESPONSE : 200 OK ! récupération d'un twitt
    
### LOGIN

    NAME : Créer un compte
    TYPE : POST
    URL : "url"/account
    PARAMETER : login et mdp
    RESPONSE : 200 OK !

    NAME : Vérifier que le compte existe
    TYPE : GET
    URL : "url"/account
    PARAMETER : login and password
    RESPONSE : 200 OK ! Details du compte + favoris + toussa
