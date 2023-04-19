
CREATE TABLE CON010_TPCUENTA (
       CD_TPCUENTA          CHAR(2) NOT NULL,
       ST_TPCUENTA          CHAR(2) NOT NULL,
       CD_PAIS              CHAR(2) NOT NULL,
       NB_TPCUENTA          VARCHAR(100),
       PRIMARY KEY (CD_TPCUENTA)
);


CREATE TABLE CON020_TPOLIZA (
       CD_TPOLIZA           CHAR(2) NOT NULL,
       ST_TPOLIZA           CHAR(2) NOT NULL,
       CD_PAIS              CHAR(2),
       NB_TPOLIZA           VARCHAR(100) NOT NULL,
       PRIMARY KEY (CD_TPOLIZA)
);


CREATE TABLE CON030_TPAGO (
       CD_TPAGO             CHAR(2) NOT NULL,
       ST_TPAGO             CHAR(2) NOT NULL,
       CD_PAIS              CHAR(2) NOT NULL,
       NB_PAGO              VARCHAR(60) NOT NULL,
       PRIMARY KEY (CD_TPAGO)
);


CREATE TABLE CON040_CONCEPTO (
       CD_CONCEPTO          CHAR(3) NOT NULL,
       ST_CONCEPTO          CHAR(2) NOT NULL,
       CD_PAIS              CHAR(2),
       NB_CONCEPTO          VARCHAR(256) NOT NULL,
       PRIMARY KEY (CD_CONCEPTO)
);


CREATE TABLE CON050_TPCOMPROB (
       CD_TPCOMPROBANTE     CHAR(3) NOT NULL,
       CD_PAIS              CHAR(2) NOT NULL,
       ST_TPCOMPROB         CHAR(2) NOT NULL,
       NB_TPCOMPROB         VARCHAR(256) NOT NULL,
       PRIMARY KEY (CD_TPCOMPROBANTE)
);


CREATE TABLE CON060_ESTADO (
       CD_ESTADO            CHAR(2) NOT NULL,
       CD_PAIS              CHAR(2) NOT NULL,
       NB_ESTADO            VARCHAR(60) NOT NULL,
       PRIMARY KEY (CD_ESTADO)
);


CREATE TABLE CON070_PAIS (
       CD_PAIS              CHAR(2) NOT NULL,
       NB_PAIS              VARCHAR(60) NOT NULL,
       PRIMARY KEY (CD_PAIS)
);


CREATE TABLE CON100_EMPRESA (
       CD_EMPRESA           CHAR(3) NOT NULL,
       CD_PAIS              CHAR(2) NOT NULL,
       ST_EMPRESA           CHAR(2) NOT NULL,
       PO_IVA               NUMERIC(3,2) NOT NULL,
       CD_RFC               VARCHAR(20),
       NU_TELEFONO          VARCHAR(20) NOT NULL,
       NB_EMPRESA           VARCHAR(100) NOT NULL,
       TX_DIRECCION         VARCHAR(256) NOT NULL,
       LK_LOGOHEADER        VARCHAR(256) NOT NULL,
       PRIMARY KEY (CD_EMPRESA)
);


CREATE TABLE CON110_EJERCICIO (
       CD_EMPRESA           CHAR(10) NOT NULL,
       CD_EJERCICIO         CHAR(4) NOT NULL,
       ST_EJERCICIO         CHAR(2) NOT NULL,
       FH_INICIO            DATE NOT NULL,
       FH_TERMINO           DATE NOT NULL,
       PRIMARY KEY (CD_EMPRESA, CD_EJERCICIO)
);


CREATE TABLE CON120_PARAMETRO (
       CD_EMPRESA           CHAR(3) NOT NULL,
       CD_PARAMETRO         CHAR(3) NOT NULL,
       ST_PARAMETRO         CHAR(2) NOT NULL,
       NB_PARAMERO          VARCHAR(100) NOT NULL,
       TX_VALOR             VARCHAR(256) NOT NULL,
       PRIMARY KEY (CD_EMPRESA, CD_PARAMETRO)
);


CREATE TABLE CON130_MES (
       CD_EMPRESA           CHAR(10) NOT NULL,
       CD_EJERCICIO         CHAR(4) NOT NULL,
       NU_MES               CHAR(2) NOT NULL,
       ST_CORTE             CHAR(2) NOT NULL,
       CD_USUARIO           CHAR(8),
       NB_MES               VARCHAR(20) NOT NULL,
       PRIMARY KEY (CD_EMPRESA, CD_EJERCICIO, NU_MES)
);


CREATE TABLE CON140_SALDO (
       CD_EMPRESA           CHAR(10) NOT NULL,
       CD_EJERCICIO         CHAR(4) NOT NULL,
       NU_MES               CHAR(2) NOT NULL,
       CD_CUENTA            INTEGER NOT NULL,
       ST_SALDO             CHAR(2) NOT NULL,
       CD_USUARIO_ACT       CHAR(8),
       FH_ACTUALIZADO       DATE NOT NULL,
       IM_DEBE_ACTUAL       NUMERIC(13,2) NOT NULL,
       IM_HABER_ACTUAL      NUMERIC(13,2) NOT NULL,
       IM_DEBE_INICIAL      NUMERIC(13,2) NOT NULL,
       IM_HABER_INICIAL     NUMERIC(13,2) NOT NULL,
       TO_DEBE_MOVTOS       NUMERIC(13,2) NOT NULL,
       TO_HABER_MOVTOS      NUMERIC(13,2) NOT NULL,
       TX_COMMENT           VARCHAR(256) NOT NULL,
       PRIMARY KEY (CD_EMPRESA, CD_EJERCICIO, NU_MES, CD_CUENTA)
);


CREATE TABLE CON150_CUENTA (
       CD_EMPRESA           CHAR(3) NOT NULL,
       CD_EJERCICIO         CHAR(4) NOT NULL,
       CD_CUENTA            INTEGER NOT NULL,
       NU_NIVEL             CHAR(1) NOT NULL,
       ST_CUENTA            CHAR(2) NOT NULL,
       TP_NATURALEZA        CHAR(2) NOT NULL,
       TP_CUENTA            CHAR(2) NOT NULL,
       NU_CUENTA            VARCHAR(30) NOT NULL,
       NB_CUENTA            VARCHAR(100) NOT NULL,
       TX_COMMENT           VARCHAR(256) NOT NULL,
       CD_CTAGENERAL        INTEGER NOT NULL,
       CD_CTACIERRE         INTEGER,
       PRIMARY KEY (CD_EMPRESA, CD_EJERCICIO, CD_CUENTA)
);


CREATE TABLE CON160_POLIZA (
       CD_EMPRESA           CHAR(6) NOT NULL,
       CD_EJERCICIO         CHAR(4) NOT NULL,
       CD_POLIZA            INTEGER NOT NULL,
       NU_MES               CHAR(2) NOT NULL,
       ST_POLIZA            CHAR(2) NOT NULL,
       CD_TPOLIZA           CHAR(2),
       CD_TPAGO             CHAR(2),
       FH_CREADA            DATE NOT NULL,
       FH_ACTUALIZADA       DATE NOT NULL,
       CD_USUARIO_CREO      CHAR(8),
       CD_USUARIO_ACT       CHAR(8),
       NB_POLIZA            VARCHAR(100) NOT NULL,
       LK_POLIZA            VARCHAR(256) NOT NULL,
       TX_COMMENT           VARCHAR(256) NOT NULL,
       PRIMARY KEY (CD_EMPRESA, CD_EJERCICIO, CD_POLIZA)
);


CREATE TABLE CON170_MOVIMIENTO (
       CD_EMPRESA           CHAR(6) NOT NULL,
       CD_EJERCICIO         CHAR(4) NOT NULL,
       CD_POLIZA            INTEGER NOT NULL,
       CD_MOVIMIENTO        INTEGER NOT NULL,
       NU_MES               CHAR(2) NOT NULL,
       ST_MOVIMIENTO        CHAR(2) NOT NULL,
       ST_ACTUALIZADO       CHAR(2) NOT NULL,
       CD_CONCEPTO          CHAR(3) NOT NULL,
       CD_TPCOMPROBANTE     CHAR(3),
       CD_CUENTA            INTEGER NOT NULL,
       FH_CREADO            DATE NOT NULL,
       FH_ACTUALIZADO       DATE NOT NULL,
       IM_PARCIAL           NUMERIC(13,2) NOT NULL,
       IM_DEBE              NUMERIC(13,2),
       IM_HABER             NUMERIC(13,2) NOT NULL,
       NU_COPROBANTE        VARCHAR(20) NOT NULL,
       NB_MOVIMIENTO        VARCHAR(100) NOT NULL,
       LK_COMPROBANTE       VARCHAR(256) NOT NULL,
       TX_COMMENT           VARCHAR(256) NOT NULL,
       PRIMARY KEY (CD_EMPRESA, CD_EJERCICIO, CD_POLIZA, 
              CD_MOVIMIENTO)
);


CREATE TABLE CON180_CLIENTE (
       CD_EMPRESA           CHAR(3) NOT NULL,
       CD_CLIENTE           CHAR(6) NOT NULL,
       CD_ESTADO            CHAR(2),
       ST_CLIENTE           CHAR(2) NOT NULL,
       ST_IVA               CHAR(2) NOT NULL,
       PO_IVA               NUMERIC(3,2) NOT NULL,
       CD_RFC               VARCHAR(20) NOT NULL,
       NU_TELEFONO          VARCHAR(20) NOT NULL,
       NB_CLIENTE           VARCHAR(256) NOT NULL,
       NB_RAZONSOCIAL       VARCHAR(256) NOT NULL,
       TX_DIRECCION         VARCHAR(256) NOT NULL,
       PRIMARY KEY (CD_EMPRESA, CD_CLIENTE)
);


CREATE TABLE CON190_DOCTO_CLIENTE (
       CD_EMPRESA           CHAR(3) NOT NULL,
       CD_CLIENTE           CHAR(6) NOT NULL,
       CD_DOCUMENTO         CHAR(6) NOT NULL,
       ST_DOCUMENTO         CHAR(2) NOT NULL,
       NB_DOCUMENTO         VARCHAR(100) NOT NULL,
       LK_DOCUMENTO         VARCHAR(256) NOT NULL,
       PRIMARY KEY (CD_EMPRESA, CD_CLIENTE, CD_DOCUMENTO)
);


CREATE TABLE CON200_CONTACTO_CLIENTE (
       CD_EMPRESA           CHAR(3) NOT NULL,
       CD_CLIENTE           CHAR(6) NOT NULL,
       CD_CONTACTO          CHAR(3) NOT NULL,
       PRIMARY KEY (CD_EMPRESA, CD_CLIENTE, CD_CONTACTO)
);


CREATE TABLE CON210_CONTACTO (
       CD_EMPRESA           CHAR(3) NOT NULL,
       CD_CONTACTO          CHAR(3) NOT NULL,
       ST_CONTACTO          CHAR(2) NOT NULL,
       NU_TELEFONO          VARCHAR(20) NOT NULL,
       NU_MOVIL             VARCHAR(20) NOT NULL,
       NB_CONTACTO          VARCHAR(60) NOT NULL,
       TX_DIRECCION         VARCHAR(256) NOT NULL,
       TX_COMMENT           VARCHAR(256) NOT NULL,
       PRIMARY KEY (CD_EMPRESA, CD_CONTACTO)
);


CREATE TABLE CON220_CONTACTO_PROVEEDOR (
       CD_EMPRESA           CHAR(3) NOT NULL,
       CD_PROVEEDOR         CHAR(6) NOT NULL,
       CD_CONTACTO          CHAR(3) NOT NULL,
       PRIMARY KEY (CD_EMPRESA, CD_PROVEEDOR, CD_CONTACTO)
);


CREATE TABLE CON230_DOCTO_PROVEEDOR (
       CD_EMPRESA           CHAR(3) NOT NULL,
       CD_PROVEEDOR         CHAR(6) NOT NULL,
       CD_DOCUMENTO         CHAR(3) NOT NULL,
       ST_DOCUMENTO         CHAR(2) NOT NULL,
       NB_DOCUMENTO         VARCHAR(100) NOT NULL,
       LK_DOCUMENTO         VARCHAR(256) NOT NULL,
       PRIMARY KEY (CD_EMPRESA, CD_PROVEEDOR, CD_DOCUMENTO)
);


CREATE TABLE CON240_PROVEEDOR (
       CD_EMPRESA           CHAR(3) NOT NULL,
       CD_PROVEEDOR         CHAR(6) NOT NULL,
       ST_PROVEEDOR         CHAR(2) NOT NULL,
       ST_APLICARIVA        CHAR(2) NOT NULL,
       ST_RETENERIVA        CHAR(2) NOT NULL,
       ST_RETENERISR        CHAR(2) NOT NULL,
       CD_ESTADO            CHAR(2),
       PO_IVA               NUMERIC(15,2) NOT NULL,
       CD_RFC               VARCHAR(20) NOT NULL,
       NU_TELEFONO          VARCHAR(20),
       NB_PROVEEDOR         VARCHAR(150) NOT NULL,
       NB_RAZONSOCIAL       VARCHAR(150) NOT NULL,
       TX_DIRECCION         VARCHAR(256) NOT NULL,
       TX_COMMENT           VARCHAR(256) NOT NULL,
       PRIMARY KEY (CD_EMPRESA, CD_PROVEEDOR)
);


CREATE TABLE CON400_USUARIO_EMPRESA (
       CD_EMPRESA           CHAR(3) NOT NULL,
       CD_USUARIO           CHAR(8) NOT NULL,
       ST_USUARIO_EMPRESA   CHAR(2) NOT NULL,
       CD_PERFIL            CHAR(3),
       TX_COMMENT           VARCHAR(256) NOT NULL,
       PRIMARY KEY (CD_EMPRESA, CD_USUARIO)
);


CREATE TABLE CON410_USUARIO (
       CD_USUARIO           CHAR(8) NOT NULL,
       ST_USUARIO           CHAR(2) NOT NULL,
       CD_PASSWORD          CHAR(8) NOT NULL,
       NB_USUARIO           VARCHAR(60) NOT NULL,
       TX_EMAIL             VARCHAR(100) NOT NULL,
       NB_EMPRESA           VARCHAR(100) NOT NULL,
       PRIMARY KEY (CD_USUARIO)
);


CREATE TABLE CON420_PERFIL (
       CD_EMPRESA           CHAR(3) NOT NULL,
       CD_PERFIL            CHAR(3) NOT NULL,
       ST_PERFIL            CHAR(2) NOT NULL,
       NB_PERFIL            VARCHAR(100) NOT NULL,
       PRIMARY KEY (CD_EMPRESA, CD_PERFIL)
);


CREATE TABLE CON430_PERFILFUNCION (
       CD_EMPRESA           CHAR(3) NOT NULL,
       CD_MODULO            CHAR(3) NOT NULL,
       CD_FUNCION           CHAR(3) NOT NULL,
       CD_PERFIL            CHAR(3) NOT NULL,
       ST_TODO              CHAR(2) NOT NULL,
       ST_CONSULTA          CHAR(2) NOT NULL,
       ST_AGREGAR           CHAR(2) NOT NULL,
       ST_MODIFICA          CHAR(2) NOT NULL,
       ST_ELIMINA           CHAR(2) NOT NULL,
       PRIMARY KEY (CD_EMPRESA, CD_MODULO, CD_FUNCION, CD_PERFIL)
);


CREATE TABLE CON440_FUNCION (
       CD_MODULO            CHAR(3) NOT NULL,
       CD_FUNCION           CHAR(3) NOT NULL,
       NU_ORDEN             CHAR(2) NOT NULL,
       ID_ENSISTEMA         CHAR(10) NOT NULL,
       NB_LABEL             VARCHAR(20) NOT NULL,
       NB_FUNCION           VARCHAR(60) NOT NULL,
       TX_URL               VARCHAR(250) NOT NULL,
       TX_COMMENT           VARCHAR(256) NOT NULL,
       PRIMARY KEY (CD_MODULO, CD_FUNCION)
);


CREATE TABLE CON450_MODULO (
       CD_MODULO            CHAR(3) NOT NULL,
       ID_ENSISTEMA         CHAR(10) NOT NULL,
       NB_LABEL             VARCHAR(20) NOT NULL,
       NB_MODULO            VARCHAR(60) NOT NULL,
       TX_COMMENT           VARCHAR(256) NOT NULL,
       PRIMARY KEY (CD_MODULO)
);


CREATE TABLE CON460_SESSION (
       CD_SESSION           CHAR(20) NOT NULL,
       CD_EMPRESA           CHAR(3) NOT NULL,
       CD_USUARIO           CHAR(8) NOT NULL,
       CD_PERFIL            CHAR(3) NOT NULL,
       FH_SESSION           DATE NOT NULL,
       PRIMARY KEY (CD_SESSION)
);


ALTER TABLE CON010_TPCUENTA
       ADD FOREIGN KEY (CD_PAIS)
                             REFERENCES CON070_PAIS
                             ON DELETE RESTRICT;


ALTER TABLE CON020_TPOLIZA
       ADD FOREIGN KEY (CD_PAIS)
                             REFERENCES CON070_PAIS
                             ON DELETE SET NULL;


ALTER TABLE CON030_TPAGO
       ADD FOREIGN KEY (CD_PAIS)
                             REFERENCES CON070_PAIS
                             ON DELETE RESTRICT;


ALTER TABLE CON040_CONCEPTO
       ADD FOREIGN KEY (CD_PAIS)
                             REFERENCES CON070_PAIS
                             ON DELETE SET NULL;


ALTER TABLE CON050_TPCOMPROB
       ADD FOREIGN KEY (CD_PAIS)
                             REFERENCES CON070_PAIS
                             ON DELETE RESTRICT;


ALTER TABLE CON060_ESTADO
       ADD FOREIGN KEY (CD_PAIS)
                             REFERENCES CON070_PAIS
                             ON DELETE RESTRICT;


ALTER TABLE CON100_EMPRESA
       ADD FOREIGN KEY (CD_PAIS)
                             REFERENCES CON070_PAIS
                             ON DELETE RESTRICT;


ALTER TABLE CON110_EJERCICIO
       ADD FOREIGN KEY (CD_EMPRESA)
                             REFERENCES CON100_EMPRESA
                             ON DELETE RESTRICT;


ALTER TABLE CON120_PARAMETRO
       ADD FOREIGN KEY (CD_EMPRESA)
                             REFERENCES CON100_EMPRESA
                             ON DELETE RESTRICT;


ALTER TABLE CON130_MES
       ADD FOREIGN KEY (CD_USUARIO)
                             REFERENCES CON410_USUARIO
                             ON DELETE SET NULL;


ALTER TABLE CON130_MES
       ADD FOREIGN KEY (CD_EMPRESA, CD_EJERCICIO)
                             REFERENCES CON110_EJERCICIO
                             ON DELETE RESTRICT;


ALTER TABLE CON140_SALDO
       ADD FOREIGN KEY (CD_USUARIO_ACT)
                             REFERENCES CON410_USUARIO
                             ON DELETE SET NULL;


ALTER TABLE CON140_SALDO
       ADD FOREIGN KEY (CD_EMPRESA, CD_EJERCICIO, CD_CUENTA)
                             REFERENCES CON150_CUENTA
                             ON DELETE RESTRICT;


ALTER TABLE CON140_SALDO
       ADD FOREIGN KEY (CD_EMPRESA, CD_EJERCICIO, NU_MES)
                             REFERENCES CON130_MES
                             ON DELETE RESTRICT;


ALTER TABLE CON150_CUENTA
       ADD FOREIGN KEY (CD_EMPRESA, CD_EJERCICIO)
                             REFERENCES CON110_EJERCICIO
                             ON DELETE RESTRICT;


ALTER TABLE CON150_CUENTA
       ADD FOREIGN KEY (CD_EMPRESA, CD_EJERCICIO, CD_CTACIERRE)
                             REFERENCES CON150_CUENTA
                             ON DELETE SET NULL;


ALTER TABLE CON150_CUENTA
       ADD FOREIGN KEY (CD_EMPRESA, CD_EJERCICIO, CD_CTAGENERAL)
                             REFERENCES CON150_CUENTA
                             ON DELETE RESTRICT;


ALTER TABLE CON150_CUENTA
       ADD FOREIGN KEY (CD_EMPRESA)
                             REFERENCES CON100_EMPRESA
                             ON DELETE RESTRICT;


ALTER TABLE CON160_POLIZA
       ADD FOREIGN KEY (CD_USUARIO_ACT)
                             REFERENCES CON410_USUARIO
                             ON DELETE SET NULL;


ALTER TABLE CON160_POLIZA
       ADD FOREIGN KEY (CD_USUARIO_CREO)
                             REFERENCES CON410_USUARIO
                             ON DELETE SET NULL;


ALTER TABLE CON160_POLIZA
       ADD FOREIGN KEY (CD_TPAGO)
                             REFERENCES CON030_TPAGO
                             ON DELETE SET NULL;


ALTER TABLE CON160_POLIZA
       ADD FOREIGN KEY (CD_TPOLIZA)
                             REFERENCES CON020_TPOLIZA
                             ON DELETE SET NULL;


ALTER TABLE CON160_POLIZA
       ADD FOREIGN KEY (CD_EMPRESA, CD_EJERCICIO, NU_MES)
                             REFERENCES CON130_MES
                             ON DELETE SET NULL;


ALTER TABLE CON170_MOVIMIENTO
       ADD FOREIGN KEY (CD_EMPRESA, CD_EJERCICIO, CD_CUENTA)
                             REFERENCES CON150_CUENTA
                             ON DELETE SET NULL;


ALTER TABLE CON170_MOVIMIENTO
       ADD FOREIGN KEY (CD_EMPRESA, CD_EJERCICIO, CD_POLIZA)
                             REFERENCES CON160_POLIZA
                             ON DELETE RESTRICT;


ALTER TABLE CON170_MOVIMIENTO
       ADD FOREIGN KEY (CD_TPCOMPROBANTE)
                             REFERENCES CON050_TPCOMPROB
                             ON DELETE SET NULL;


ALTER TABLE CON170_MOVIMIENTO
       ADD FOREIGN KEY (CD_CONCEPTO)
                             REFERENCES CON040_CONCEPTO
                             ON DELETE SET NULL;


ALTER TABLE CON180_CLIENTE
       ADD FOREIGN KEY (CD_ESTADO)
                             REFERENCES CON060_ESTADO
                             ON DELETE SET NULL;


ALTER TABLE CON180_CLIENTE
       ADD FOREIGN KEY (CD_EMPRESA)
                             REFERENCES CON100_EMPRESA
                             ON DELETE RESTRICT;


ALTER TABLE CON190_DOCTO_CLIENTE
       ADD FOREIGN KEY (CD_EMPRESA, CD_CLIENTE)
                             REFERENCES CON180_CLIENTE
                             ON DELETE RESTRICT;


ALTER TABLE CON200_CONTACTO_CLIENTE
       ADD FOREIGN KEY (CD_EMPRESA, CD_CONTACTO)
                             REFERENCES CON210_CONTACTO
                             ON DELETE RESTRICT;


ALTER TABLE CON200_CONTACTO_CLIENTE
       ADD FOREIGN KEY (CD_EMPRESA, CD_CLIENTE)
                             REFERENCES CON180_CLIENTE
                             ON DELETE RESTRICT;


ALTER TABLE CON210_CONTACTO
       ADD FOREIGN KEY (CD_EMPRESA)
                             REFERENCES CON100_EMPRESA
                             ON DELETE RESTRICT;


ALTER TABLE CON220_CONTACTO_PROVEEDOR
       ADD FOREIGN KEY (CD_EMPRESA, CD_CONTACTO)
                             REFERENCES CON210_CONTACTO
                             ON DELETE RESTRICT;


ALTER TABLE CON220_CONTACTO_PROVEEDOR
       ADD FOREIGN KEY (CD_EMPRESA, CD_PROVEEDOR)
                             REFERENCES CON240_PROVEEDOR
                             ON DELETE RESTRICT;


ALTER TABLE CON230_DOCTO_PROVEEDOR
       ADD FOREIGN KEY (CD_EMPRESA, CD_PROVEEDOR)
                             REFERENCES CON240_PROVEEDOR
                             ON DELETE RESTRICT;


ALTER TABLE CON240_PROVEEDOR
       ADD FOREIGN KEY (CD_ESTADO)
                             REFERENCES CON060_ESTADO
                             ON DELETE SET NULL;


ALTER TABLE CON240_PROVEEDOR
       ADD FOREIGN KEY (CD_EMPRESA)
                             REFERENCES CON100_EMPRESA
                             ON DELETE RESTRICT;


ALTER TABLE CON400_USUARIO_EMPRESA
       ADD FOREIGN KEY (CD_EMPRESA, CD_PERFIL)
                             REFERENCES CON420_PERFIL
                             ON DELETE SET NULL;


ALTER TABLE CON400_USUARIO_EMPRESA
       ADD FOREIGN KEY (CD_USUARIO)
                             REFERENCES CON410_USUARIO
                             ON DELETE RESTRICT;


ALTER TABLE CON400_USUARIO_EMPRESA
       ADD FOREIGN KEY (CD_EMPRESA)
                             REFERENCES CON100_EMPRESA
                             ON DELETE RESTRICT;


ALTER TABLE CON420_PERFIL
       ADD FOREIGN KEY (CD_EMPRESA)
                             REFERENCES CON100_EMPRESA
                             ON DELETE RESTRICT;


ALTER TABLE CON430_PERFILFUNCION
       ADD FOREIGN KEY (CD_EMPRESA, CD_PERFIL)
                             REFERENCES CON420_PERFIL
                             ON DELETE RESTRICT;


ALTER TABLE CON430_PERFILFUNCION
       ADD FOREIGN KEY (CD_MODULO, CD_FUNCION)
                             REFERENCES CON440_FUNCION
                             ON DELETE RESTRICT;


ALTER TABLE CON440_FUNCION
       ADD FOREIGN KEY (CD_MODULO)
                             REFERENCES CON450_MODULO
                             ON DELETE RESTRICT;


ALTER TABLE CON460_SESSION
       ADD FOREIGN KEY (CD_EMPRESA, CD_PERFIL)
                             REFERENCES CON420_PERFIL
                             ON DELETE SET NULL;


ALTER TABLE CON460_SESSION
       ADD FOREIGN KEY (CD_EMPRESA, CD_USUARIO)
                             REFERENCES CON400_USUARIO_EMPRESA
                             ON DELETE SET NULL;



