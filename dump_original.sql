
-- -----------------------------------------------------
-- Table 'usuario'
-- -----------------------------------------------------
CREATE  TABLE 'usuario' (
  'idusuario' INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  'nome' VARCHAR(15) NULL ,
  'sobrenome' VARCHAR(15) NULL ,
  'CPF' VARCHAR(12) NULL ,
  'email' VARCHAR(64) NULL ,
  'senha' VARCHAR(45) NULL ,
  'apelido' VARCHAR(15) NULL ,
  PRIMARY KEY ('idusuario') );


-- -----------------------------------------------------
-- Table 'perfil'
-- -----------------------------------------------------
CREATE  TABLE 'perfil' (
  'idperfil' INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  'usuario_idusuario' INT UNSIGNED NOT NULL ,
  'tipo_produto' VARCHAR(45) NULL ,
  'caracteristicas' VARCHAR(45) NULL ,
  PRIMARY KEY ('idperfil', 'usuario_idusuario') ,
  INDEX 'fk_perfil_usuario1_idx' ('usuario_idusuario' ASC) ,
  CONSTRAINT 'fk_perfil_usuario1'
    FOREIGN KEY ('usuario_idusuario' )
    REFERENCES 'usuario' ('idusuario' )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table 'amizade'
-- -----------------------------------------------------
CREATE  TABLE 'amizade' (
  'idamizade' INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  'usuario_idusuario' INT UNSIGNED NOT NULL ,
  'usuario_idamigo' INT UNSIGNED NOT NULL ,
  'grau' ENUM('Melhor Amigo', 'Amigo', 'Conhecido', 'Não Conheço') NULL ,
  PRIMARY KEY ('idamizade', 'usuario_idusuario', 'usuario_idamigo') ,
  INDEX 'fk_amigo_usuario_idx' ('usuario_idusuario' ASC) ,
  INDEX 'fk_amizade_usuario1_idx' ('usuario_idamigo' ASC) ,
  CONSTRAINT 'fk_amigo_usuario'
    FOREIGN KEY ('usuario_idusuario' )
    REFERENCES 'usuario' ('idusuario' )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT 'fk_amizade_usuario1'
    FOREIGN KEY ('usuario_idamigo' )
    REFERENCES 'usuario' ('idusuario' )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table 'fabricante'
-- -----------------------------------------------------
CREATE  TABLE 'fabricante' (
  'idfabricante' INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  'nome' VARCHAR(45) NULL ,
  'nacionalidade' VARCHAR(45) NULL ,
  PRIMARY KEY ('idfabricante') );


-- -----------------------------------------------------
-- Table 'fornecedor'
-- -----------------------------------------------------
CREATE  TABLE 'fornecedor' (
  'idfornecedor' INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  'nome' VARCHAR(45) NULL ,
  PRIMARY KEY ('idfornecedor') );


-- -----------------------------------------------------
-- Table 'loja'
-- -----------------------------------------------------
CREATE  TABLE 'loja' (
  'idloja' INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  'nome' VARCHAR(45) NULL ,
  'fisico' ENUM('Sim','Nao') NULL ,
  PRIMARY KEY ('idloja') );


-- -----------------------------------------------------
-- Table 'produtoNote'
-- -----------------------------------------------------
CREATE  TABLE 'produtoNote' (
  'idproduto' INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  'descricao' VARCHAR(255) NULL ,
  'fabricante_idfabricante' INT UNSIGNED NOT NULL ,
  'fornecedor_idfornecedor' INT UNSIGNED NOT NULL ,
  'loja_idloja' INT UNSIGNED NOT NULL ,
  'marca_proc' INT(2) NOT NULL ,
  'vel_proc' INT(2) NOT NULL ,
  'memoria' INT(2) NOT NULL ,
  'preco' INT(2) NOT NULL ,
  PRIMARY KEY ('idproduto', 'fabricante_idfabricante', 'fornecedor_idfornecedor', 'loja_idloja') ,
  INDEX 'fk_produtoNote_fabricante1_idx' ('fabricante_idfabricante' ASC) ,
  INDEX 'fk_produtoNote_fornecedor1_idx' ('fornecedor_idfornecedor' ASC) ,
  INDEX 'fk_produtoNote_loja1_idx' ('loja_idloja' ASC) ,
  CONSTRAINT 'fk_produtoNote_fabricante1'
    FOREIGN KEY ('fabricante_idfabricante' )
    REFERENCES 'fabricante' ('idfabricante' )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT 'fk_produtoNote_fornecedor1'
    FOREIGN KEY ('fornecedor_idfornecedor' )
    REFERENCES 'fornecedor' ('idfornecedor' )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT 'fk_produtoNote_loja1'
    FOREIGN KEY ('loja_idloja' )
    REFERENCES 'loja' ('idloja' )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table 'caracteristica'
-- -----------------------------------------------------
CREATE  TABLE 'caracteristica' (
  'idcaracteristica' INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  'nome' VARCHAR(45) NULL ,
  'codigo' VARCHAR(45) NULL ,
  'valor' VARCHAR(45) NULL ,
  'tipo_produto' VARCHAR(45) NULL ,
  PRIMARY KEY ('idcaracteristica') );


-- -----------------------------------------------------
-- Table 'fabricante'
-- -----------------------------------------------------
CREATE  TABLE 'fabricante' (
  'idfabricante' INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  'nome' VARCHAR(45) NULL ,
  'nacionalidade' VARCHAR(45) NULL ,
  PRIMARY KEY ('idfabricante') );