USE Appli_Garage_Attens ;


INSERT INTO ville(id_ville, nom, code_postal )
    VALUES (1, 'Rennel', '54300'),
    (2, 'ulke', '83400'),
    (3, 'Moorfield', '68707'),
    (4, 'Cosslett', '72150');
   

INSERT INTO vehicule(id_vehicule, immatriculation, marque)
    VALUES (1, '430BP72', 'Audi'),
    (2, '531QJ53', 'Mercedes'),
    (3, '891UE91', 'Ford');
    



INSERT INTO client(id_client, id_ville, id_vehicule, date_create, adresse, tel, email, nom, prenom)
    VALUES (21, 2, 3, '2020-07-13', '6946 Hallows Lane', '209-782-3631', 'relliker0@mail.ru', 'Elliker', 'Renata'),
           (22, 2, 2, '2021-10-25', '87 Brown Hill', '422-431-7422', 'mwressell1@berkeley.edu', 'Wressell', 'Mala'),
           (23, 2, 3, '2020-08-04', '54199 Oneill Lane', '323-886-3489', 'ctuffield2@yahoo.com', 'Tuffield', 'Christian'),
           (24, 3, 1, '2020-07-01', '11672 Meadow Vale Trail', '469-490-3516', 'tomaszkiewicz3@rakutjp', 'Tomaszkiewicz', 'Sunny'),
           (25, 3, 3, '2021-11-24', '9507 Katie Center', '891-118-0183', 'jparren4@blogtalkradio.com', 'Parren', 'Jere');


INSERT INTO employe(id_employe, id_ville, mot_de_passe, adresse, `role`, statut, nom, prenom, tel, email)
    VALUES (1, 1, '$2y$10$TAKX1SZl.o3bi3jzCcYB5.wtW7iLMoZNE3fLGnwXWUkxu.xjjKSE6','11 rue Janne Clair 85200 Rennel', 'Manager', 'actif', 'Attens', 'Charles', '0242516583', 'charles-attens@gmail.com'),
          (2, 2, '$2y$10$6A6fIk3bqpMIGlRF5JdSFeZyhiqr76nFVoGfJtKBvvJIDj89xtGzS','20 rue Janne Clair 85200 Rennel', 'Manager', 'actif', 'Attens', 'John', '0272513694', 'john-attens@gmail.com'),
          (3, 3, '$2y$10$w9B4BzpfpHi5Sc9e7rukHOC9OaukSMiBp3Y4xb7dTXqdNCpZG/pFO', '102 Alpine Trail', 'Employe', 'actif', 'Derry', 'Cloris', '840-480-8132', 'cderry0@geocities.jp'),
          (4, 4, '$2y$10$dIHZw52.beRNkfwtErys4OR.Rv9QIUqAmburwp2nBRruztR4bZCR.', '802 Dakota Lane', 'Employe', 'actif', 'Gosnold', 'Daron', '896-873-8337', 'dgosnold1@hugedomains.com');


INSERT INTO intervention(id_client,id_inter, desc_long, desc_court, date_create, date_heure, dure)
    VALUES(21, 1, 'Ambulation and gait training', 'Ambulat & gait training', '2020-08-06', '2010-03-17 8:33', '3:09'),
          (25, 2, 'Artificial pacemaker rate check', 'Pacemaker rate check', '2021-03-11', '2012-10-22 4:22', '12:40'),
          (23, 3, 'Injection or instillation of radioisotopes', 'Isotope inject/instill', '2020-04-12', '2018-14-31 4:43', '4:14');


INSERT INTO employe_interv(id_employe, id_intervention)
    VALUES(2, 2),
          (1, 1),
          (3, 2),
          (4, 3);