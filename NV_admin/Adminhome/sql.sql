CREATE TABLE userss(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(255) NOT NULL,
    type_de_compte ENUM('admin', 'manager', 'chef_dot', 'agent_CM', 'agent_CH', 'agent_RB', 'agent_RA') NOT NULL ,
    date_de_creation DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    date_de_mise_a_jour DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    DOT ENUM(
        'Adrar',
        'AIN DEFLA',
        'AIN TEMOUCHENT',
        'ALGER CENTRE',
        'ALGER EST',
        'ALGER OUEST',
        'ANNABA',
        'BATNA',
        'BECHAR',
        'BEJAIA',
        'BISKRA',
        'BLIDA',
        'BORDJ BOUARRERIDJ',
        'BOUIRA',
        'BOUMERDES',
        'CHLEF',
        'CONSTANTINE',
        'DJELFA',
        'EL BAYADH',
        'EL OUED',
        'EL TAREF',
        'GHARDAIA',
        'GUELMA',
        'ILLIZI',
        'JIJEL',
        'KHENCHELA',
        'LAGHOUAT',
        'MASCARA',
        'MEDEA',
        'MILA',
        'MOSTAGANEM',
        'M SILA',
        'NAAMA',
        'Oran',
        'OUARGLA',
        'OUM EL BOUAGHI',
        'RELIZANE',
        'SAIDA',
        'SETIF',
        'SIDI BEL ABBES',
        'SKIKDA',
        'SOUK AHRAS',
        'TAMANRASSET',
        'TEBESSA',
        'TIARET',
        'TINDOUF',
        'TIPAZA',
        'TISSEMSILT',
        'TIZI OUZOU',
        'TLEMCEN',
        'BENI ABBES',
        'BORDJ BADJI MOKHTAR',
        'DJANET',
        'EL MEGHAIER',
        'EL MENIAA',
        'IN GUEZZAM',
        'IN SALAH',
        'OULED DJELLAL',
        'TIMIMOUN',
        'TOUGGOURT'
    ) DEFAULT NULL,
    Etat_de_compte ENUM('Activer', 'Deactive') DEFAULT 'Activer');




CREATE TABLE connexions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255),
    prenom VARCHAR(255),
    email VARCHAR(255),
    date_connexion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
