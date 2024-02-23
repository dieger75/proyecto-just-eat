CREATE TABLE restaurantes (
    'id_rest' INT UNSIGNED NOT NULL AUTO_INCREMENT,
    'name_rest' TEXT NOT NULL,
    'dir_rest' text NOT NULL,
    'tel_rest' text NOT NULL, 
    'mail_rest' VARCHAR(255) NOT NULL,
    'web_rest' text NOT NULL,
    'logo_rest' text NOT NULL,
    'carta_rest' LONGTEXT NOT NULL,

    PRIMARY KEY (id)

);

CREATE TABLE 'just-eat'.'usuarios' (
    'id_user' INT UNSIGNED NOT NULL AUTO_INCREMENT,
    'name_user' TEXT NOT NULL,
    'password_user' VARCHAR(8) NOT NULL,
    'mail_user' VARCHAR(255) NOT NULL,
    'type_user' TEXT NOT NULL,
    PRIMARY KEY ('id')
)


CREATE TABLE pedidos (
    id_ped smallint unsigned NOT NULL auto_increment,
    name_user varchar (255) NOT NULL,
    name_rest varchar (255) NOT NULL,

    PRIMARY KEY (id)
);

INSERT INTO `restaurantes`(`name_rest`, `dir_rest`, `tel_rest`, `mail_rest`, `web_rest`, `logo_rest`, `carta_rest`) VALUES
('Dominos Pizza',
'Calle de Juan XXIII, 9, 28934 Móstoles, Madrid',
'916141727',
'acliente@dominos.es',
'https://www.dominospizza.es/',
'assets/img/logos_rest/dominos-150.png',
'italiana'),
('Ginos',
'Paseo de Arroyomolinos, 33, 28938 Móstoles, Madrid',
'916477981',
'acliente@ginos.es',
'https://www.ginos.es/',
'assets/img/logos_rest/ginos-150.png',
'italiana'),
('Hong Kong',
'Avenida Carlos V 41, 28937 Mostoles - Madrid',
'916460438',
'acliente@ginos.es',
'https://www.hongkongmostoles.com/',
'assets/img/logos_rest/hong-kong-150.png',
'asiatica'),