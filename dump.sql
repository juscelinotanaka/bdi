-- -----------------------------------------------------
-- Table usuario
-- -----------------------------------------------------
CREATE  TABLE usuario (
  idusuario SERIAL ,
  nome VARCHAR(15) NULL ,
  sobrenome VARCHAR(15) NULL ,
  CPF VARCHAR(12) NULL ,
  email VARCHAR(64) NULL ,
  senha VARCHAR(45) NULL ,
  apelido VARCHAR(15) NULL ,
  PRIMARY KEY (idusuario) );


-- -----------------------------------------------------
-- Table perfil
-- -----------------------------------------------------
CREATE  TABLE perfil (
  idperfil SERIAL ,
  usuario_idusuario INTEGER ,
  tipo_produto VARCHAR(45) NULL ,
  caracteristicas VARCHAR(45) NULL ,
  PRIMARY KEY (idperfil, usuario_idusuario) ,
  CONSTRAINT fk_perfil_usuario1
    FOREIGN KEY (usuario_idusuario)
    REFERENCES usuario (idusuario)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table amizade
-- -----------------------------------------------------
CREATE  TABLE amizade (
  idamizade SERIAL ,
  usuario_idusuario INTEGER ,
  usuario_idamigo INTEGER ,
  grau INTEGER NULL ,
  PRIMARY KEY (idamizade, usuario_idusuario, usuario_idamigo) ,
  CONSTRAINT fk_amigo_usuario
    FOREIGN KEY (usuario_idusuario )
    REFERENCES usuario (idusuario )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_amizade_usuario1
    FOREIGN KEY (usuario_idamigo )
    REFERENCES usuario (idusuario )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table fabricante
-- -----------------------------------------------------
CREATE  TABLE fabricante (
  idfabricante SERIAL ,
  nome VARCHAR(45) NULL ,
  nacionalidade VARCHAR(45) NULL ,
  PRIMARY KEY (idfabricante) );


-- -----------------------------------------------------
-- Table fornecedor
-- -----------------------------------------------------
CREATE  TABLE fornecedor (
  idfornecedor SERIAL ,
  nome VARCHAR(45) NULL ,
  PRIMARY KEY (idfornecedor) );


-- -----------------------------------------------------
-- Table loja
-- -----------------------------------------------------
CREATE  TABLE loja (
  idloja SERIAL ,
  nome VARCHAR(45) NULL ,
  fisico BOOLEAN NULL ,
  PRIMARY KEY (idloja) );


-- -----------------------------------------------------
-- Table produtoNote
-- -----------------------------------------------------
CREATE  TABLE produtoNote (
  idproduto SERIAL ,
  descricao VARCHAR(255) NULL ,
  fabricante_idfabricante INTEGER ,
  fornecedor_idfornecedor INTEGER ,
  loja_idloja INTEGER ,
  marca_proc INTEGER NOT NULL ,
  vel_proc INTEGER NOT NULL ,
  memoria INTEGER NOT NULL ,
  preco INTEGER NOT NULL ,
  PRIMARY KEY (idproduto, fabricante_idfabricante, fornecedor_idfornecedor, loja_idloja) ,
  CONSTRAINT fk_produtoNote_fabricante1
    FOREIGN KEY (fabricante_idfabricante )
    REFERENCES fabricante (idfabricante )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_produtoNote_fornecedor1
    FOREIGN KEY (fornecedor_idfornecedor )
    REFERENCES fornecedor (idfornecedor )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_produtoNote_loja1
    FOREIGN KEY (loja_idloja )
    REFERENCES loja (idloja )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table caracteristica
-- -----------------------------------------------------
CREATE  TABLE caracteristica (
  idcaracteristica SERIAL ,
  nome VARCHAR(45) NULL ,
  codigo VARCHAR(45) NULL ,
  valor VARCHAR(45) NULL ,
  tipo_produto VARCHAR(45) NULL ,
  PRIMARY KEY (idcaracteristica) );


-- -----------------------------------------------------
-- Table fabricante
-- -----------------------------------------------------
CREATE  TABLE fabricante (
  idfabricante SERIAL ,
  nome VARCHAR(45) NULL ,
  nacionalidade VARCHAR(45) NULL ,
  PRIMARY KEY (idfabricante) );
