CREATE TABLE kayttaja (
	kayttajatunnus VARCHAR(20) PRIMARY KEY,
	salasana VARCHAR(20) NOT NULL
);

CREATE TABLE profiili (
	id SERIAL PRIMARY KEY,
	kayttajatunnus VARCHAR(20) REFERENCES kayttaja(kayttajatunnus) NOT NULL,
	syntymaaika DATE NOT NULL,
	etunimi VARCHAR(20),
	sukunimi VARCHAR(20),
	sukupuoli VARCHAR(20),
	esittelyteksti VARCHAR(500),
	email VARCHAR(30)
);

CREATE TABLE viesti (
	id SERIAL PRIMARY KEY,
	lahettaja VARCHAR(20) REFERENCES kayttaja(kayttajatunnus) NOT NULL,
	vastaanottaja VARCHAR(20) REFERENCES kayttaja(kayttajatunnus) NOT NULL,
	aihe VARCHAR(50),
	sisalto VARCHAR(500) NOT NULL,
	lahetetty DATE NOT NULL DEFAULT GETDATE()
);