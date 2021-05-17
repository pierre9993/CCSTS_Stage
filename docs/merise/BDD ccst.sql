CREATE TABLE actualite(
   actu_id INT NOT NULL AUTO_INCREMENT,
   actu_img_un VARCHAR(100),
   actu_description_image_deux VARCHAR(100),
   actu_paragraphe_deux VARCHAR(500),
   actu_image_trois VARCHAR(100),
   actu_date_creation DATE,
   actu_description_image_trois VARCHAR(100),
   actu_paragraphe_trois VARCHAR(500),
   actu_auteur VARCHAR(100),
   actu_titre VARCHAR(100) NOT NULL,
   actu_paragraphe_un VARCHAR(500) NOT NULL,
   actu_image_deux VARCHAR(100),
   PRIMARY KEY(actu_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE realisation(
   real_id INT NOT NULL AUTO_INCREMENT,
   real_logo VARCHAR(100),
   real_titre VARCHAR(100) NOT NULL,
   real_paragraphe_un VARCHAR(500) NOT NULL,
   real_paragraphe_deux VARCHAR(500),
   lieu VARCHAR(100),
   real_cout VARCHAR(100),
   real_img_un VARCHAR(100),
   real_date_debut DATE,
   real_date_fin DATE,
   real_img_trois VARCHAR(100),
   real_img_quatre VARCHAR(100),
   real_img_cinq VARCHAR(100),
   real_img_deux VARCHAR(100),
   PRIMARY KEY(real_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE service(
   service_id INT NOT NULL AUTO_INCREMENT,
   service_titre VARCHAR(100) NOT NULL,
   service_image_un VARCHAR(100),
   service_description VARCHAR(500),
   PRIMARY KEY(service_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE admin(
   admin_id INT NOT NULL AUTO_INCREMENT,
   admin_login VARCHAR(50) NOT NULL,
   admin_password VARCHAR(100) NOT NULL,
   PRIMARY KEY(admin_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE recrutement(
   recrut_id INT NOT NULL AUTO_INCREMENT,
   recrut_titre VARCHAR(100) NOT NULL,
   recrut_image_un VARCHAR(100),
   recrut_description VARCHAR(500) NOT NULL,
   recrut_competence VARCHAR(500),
   PRIMARY KEY(recrut_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE employe(
   employe_id INT NOT NULL AUTO_INCREMENT,
   employe_nom VARCHAR(100) NOT NULL,
   employe_prenom VARCHAR(100),
   employe_image_un VARCHAR(100),
   employe_titre VARCHAR(100),
   employe_description VARCHAR(500),
   PRIMARY KEY(employe_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE reference(
   reference_id INT NOT NULL AUTO_INCREMENT,
   reference_titre VARCHAR(100) NOT NULL,
   reference_image_un VARCHAR(100),
   reference_valeur VARCHAR(100),
   PRIMARY KEY(reference_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE service_real(
   real_id INT,
   service_id INT,
   PRIMARY KEY(real_id, service_id),
   FOREIGN KEY(real_id) REFERENCES realisation(real_id),
   FOREIGN KEY(service_id) REFERENCES service(service_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE actu_real(
   actu_id INT,
   real_id INT,
   PRIMARY KEY(actu_id, real_id),
   FOREIGN KEY(actu_id) REFERENCES actualite(actu_id),
   FOREIGN KEY(real_id) REFERENCES realisation(real_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
