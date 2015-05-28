INSERT INTO kayttaja (kayttajatunnus, salasana) VALUES ('Tuomo', 'tuomokka');
INSERT INTO kayttaja (kayttajatunnus, salasana) VALUES ('Adonis', 'kaljaa');
INSERT INTO kayttaja (kayttajatunnus, salasana) VALUES ('Adoniina', 'elamaa');

INSERT INTO profiili (kayttajatunnus, ika, etunimi, sukupuoli) VALUES ('Tuomo', 22, 'Tuono', 'Mies');
INSERT INTO profiili (kayttajatunnus, ika, etunimi, sukupuoli, status, hakee) VALUES ('Adonis', 35, 'Aapeli', 'Mies', 'Naimisissa', 'Nainen');
INSERT INTO profiili (kayttajatunnus, ika, etunimi, sukunimi, sukupuoli, esittelyteksti) VALUES ('Adoniina', 10, 'Niina', 'Niinanen', 'Mies', 'Olen herttainen');

INSERT INTO viesti (lahettaja, vastaanottaja, sisalto, luettu) VALUES ('Tuomo', 'Tuomo', 'Tuomo olet kaikista kaunein mies!', false);
INSERT INTO viesti (lahettaja, vastaanottaja, sisalto, luettu) VALUES ('Tuomo', 'Adoniina', 'Adoniina, olet likainen valehtelija', false);
INSERT INTO viesti (lahettaja, vastaanottaja, sisalto, luettu) VALUES ('Adonis', 'Adoniina', 'Olit minulle vain tyhmä reikä', false);

INSERT INTO yksprofiili (kayttaja, puh) VALUES ('Tuomo', 0849518);
INSERT INTO yksprofiili (kayttaja, puh) VALUES ('Adonis', 29518);
INSERT INTO yksprofiili (kayttaja, email) VALUES ('Adoniina', 'adoniina@adon.thor');

INSERT INTO yhteisosivu (yllapitaja, nimi) VALUES ('Adonis', 'Adoniinan vihaajat');

INSERT INTO jasenet (yhteiso, kayttajatunnus) VALUES (1, 'Tuomo');
