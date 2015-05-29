CREATE TABLE kayttaja (
	kayttajatunnus VARCHAR(20) PRIMARY KEY,
	salasana VARCHAR(20) NOT NULL
);

CREATE TABLE profiili (
	kayttajatunnus VARCHAR(20) REFERENCES kayttaja(kayttajatunnus) PRIMARY KEY,
	ika INTEGER NOT NULL,
	etunimi VARCHAR(20),
	sukunimi VARCHAR(20),
	sukupuoli VARCHAR(20),
	esittelyteksti VARCHAR(500),
	hakee VARCHAR(20),
	status VARCHAR(20)
);

CREATE TABLE yksprofiili (
	id SERIAL PRIMARY KEY,
	kayttaja VARCHAR(20) REFERENCES kayttaja(kayttajatunnus) NOT NULL,
	kinostukset VARCHAR(50),
	puh INTEGER,
	email VARCHAR(30),
	esittely2 VARCHAR(2000)
);

CREATE TABLE yhteisosivu (
	id SERIAL PRIMARY KEY,
	nimi VARCHAR(20) NOT NULL,
	yllapitaja VARCHAR(20) REFERENCES kayttaja(kayttajatunnus) NOT NULL,
	esittely VARCHAR(2000)
);

CREATE TABLE jasenet (
	id SERIAL PRIMARY KEY,
	yhteiso INTEGER REFERENCES yhteisosivu(id),
	kayttajatunnus VARCHAR(20) REFERENCES kayttaja(kayttajatunnus)
);

CREATE TABLE viesti (
	id SERIAL PRIMARY KEY,
	lahettaja VARCHAR(20) REFERENCES kayttaja(kayttajatunnus) NOT NULL,
	vastaanottaja VARCHAR(20) REFERENCES kayttaja(kayttajatunnus) NOT NULL,
	aihe VARCHAR(50) NOT NULL,
	sisalto VARCHAR(500) NOT NULL,
	lahetetty TIMESTAMP,
	luettu BOOLEAN NOT NULL
);

