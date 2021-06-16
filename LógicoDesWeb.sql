/* Lógico_desWeb: */

CREATE TABLE Paciente (
    nome VARCHAR(220),
    telefone VARCHAR(30),
    cpf VARCHAR(30),
    endereço VARCHAR(220),
    cep VARCHAR(30),
    email VARCHAR(30),
    idpaciente INTEGER PRIMARY KEY
);

CREATE TABLE events (
    title VARCHAR(220),
    color VARCHAR(10),
    start DATE,
    end DATE,
    fk_idpaciente INTEGER,
    id INTEGER PRIMARY KEY
);

CREATE TABLE Usuario (
    idusuario INTEGER PRIMARY KEY,
    nome VARCHAR(220),
    nivel VARCHAR(30),
    usuario VARCHAR(30),
    senha VARCHAR(35)
);
