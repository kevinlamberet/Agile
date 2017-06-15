
# CECI EST LA LISTE DES REQUETES AVEC UN TITRE
## INCROYABLE :

### REQUETES RSS

### REQUETES TWITTER

### REQUETES FAVORIS

### REQUETES LOGIN

SELECT `user` WHERE `user` = $user AND `password` = $password;

Exemple avec des valeurs

SELECT `user` WHERE `user` = 'zzz' AND `password` = 'password';

### REQUETES INSCRIPTION

INSERT INTO `user` (`first_name`, `last_name`, `password`, `theme_color`, `theme_font`, `theme_font_color`, `creation_date`, `updating_date`, `username`, `email`) VALUES
($first_name, $last_name, $password$, $theme_color, $theme_font, $theme_font_color, $creation_date, $updating_date, $username, $email);

Exemple avec des valeurs:

INSERT INTO `user` (`first_name`, `last_name`, `password`, `theme_color`, `theme_font`, `theme_font_color`, `creation_date`, `updating_date`, `username`, `email`) VALUES
('zzz', 'last_name', 'password', 'theme_color', '$theme_font', '$theme_font_color', '$creation_date', '$updating_date', '$username', '$email');
