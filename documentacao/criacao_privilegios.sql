CREATE USER editarleito IDENTIFIED BY sjc_sta_20220401_0829_pepita;

GRANT CREATE SESSION TO editarleito;
GRANT CREATE PROCEDURE TO editarleito;
GRANT CREATE TABLE TO editarleito;
GRANT CREATE VIEW TO editarleito;
GRANT UNLIMITED TABLESPACE TO editarleito;
GRANT CREATE SEQUENCE TO editarleito;

GRANT EXECUTE ON dbasgu.FNC_MV2000_HMVPEP TO editarleito;

GRANT SELECT ON dbasgu.USUARIOS TO editarleito;
GRANT SELECT ON dbasgu.PAPEL_USUARIOS TO editarleito;
GRANT SELECT ON dbamv.ATENDIME TO editarleito;
GRANT SELECT ON dbamv.tip_acom TO editarleito;
GRANT SELECT ON dbamv.unid_int TO editarleito;
GRANT SELECT ON dbamv.copa TO editarleito;
GRANT SELECT ON dbamv.tip_acom_uti_sus TO editarleito;
GRANT SELECT ON dbamv.tip_acom_uti_sus TO editarleito;
GRANT SELECT ON dbamv.tip_acom_uti_sus TO editarleito;

GRANT SELECT ON dbamv.leito TO editarleito;
GRANT UPDATE ON dbamv.leito TO editarleito;

CREATE TABLE editarleito.leito_log AS
SELECT * FROM pgrme.leito_log;


CREATE OR REPLACE FUNCTION editarleito.VALIDA_SENHA_FUNC_EDIT_LEITO(var_login IN VARCHAR2,
                                                    var_senha IN VARCHAR2)
  RETURN VARCHAR2 IS
  --DECLARANDO VARIAVEL DE RETORNO
  var_retorno VARCHAR2(200);

  --DECLARANDO VARIAVEL PARA VERIFICAR FUNCIONARIO
  var_login_func INT;

BEGIN

  --VERIFICA SE EXISTE O LOGIN NA TABELA FUNCIONARIO
  -- 0 - N¿o existe / 1 - Existe
  SELECT COUNT(*)
    INTO var_login_func
    FROM dbasgu.USUARIOS usu
    LEFT JOIN dbasgu.PAPEL_USUARIOS pu
      ON usu.CD_USUARIO = pu.CD_USUARIO
   WHERE pu.CD_PAPEL IN (338)
     AND usu.CD_USUARIO = var_login;

  IF FNC_MV2000_HMVPEP(PUSUARIO => var_login, PSENHA => var_senha) =
     'USUARIO NAO CADASTRADO'

   THEN
    var_retorno := 'Usuário não cadastrado';

  ELSIF FNC_MV2000_HMVPEP(PUSUARIO => var_login, PSENHA => var_senha) =
        'SENHA INVALIDA'

   THEN
    var_retorno := 'Senha inválida';

  ELSIF var_login_func = 0

   THEN
    var_retorno := 'Usuário não possui papel';

  ELSIF LENGTH(FNC_MV2000_HMVPEP(PUSUARIO => var_login, PSENHA => var_senha)) = 30 AND
        var_login_func > 0

   THEN
    var_retorno := 'Login efetuado com sucesso';

  ELSE
    var_retorno := 'Erro Desconhecido';

  END IF;

  RETURN var_retorno;

EXCEPTION
  WHEN OTHERS THEN
    raise_application_error(-20001,
                            'An error was encountered - ' || SQLCODE ||
                            ' -ERROR- ' || SQLERRM);
END;

