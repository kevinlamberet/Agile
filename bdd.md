
# CECI EST LA LISTE DES REQUETES AVEC UN TITRE
## INCROYABLE :

### REQUETES RSS
INSERT INTO document (url, title, body) VALUES (:item_link,:item_title,:item_desc)

### REQUETES TWITTER
INSERT INTO document (url, title, body) VALUES (:url_site, :title_site, :content_site)

### REQUETES FAVORIS

### REQUETES LOGIN

SELECT `username` FROM user WHERE `username` = $user AND `password` = $password;

Exemple avec des valeurs

SELECT `username` FROM user WHERE `username` = 'zzz' AND `password` = 'password';

### REQUETES INSCRIPTION

INSERT INTO `user` (`first_name`, `last_name`, `password`, `theme_color`, `theme_font`, `theme_font_color`, `creation_date`, `updating_date`, `username`, `email`) VALUES
($first_name, $last_name, $password$, $theme_color, $theme_font, $theme_font_color, $creation_date, $updating_date, $username, $email);

Exemple avec des valeurs:

INSERT INTO `user` (`first_name`, `last_name`, `password`, `theme_color`, `theme_font`, `theme_font_color`, `creation_date`, `updating_date`, `username`, `email`) VALUES
('zzz', 'last_name', 'password', 'theme_color', '$theme_font', '$theme_font_color', '$creation_date', '$updating_date', '$username', '$email');
