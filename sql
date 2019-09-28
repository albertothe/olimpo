---Criado em 13/09/2019

CREATE OR REPLACE FUNCTION atualizaestoque(
    character,
    integer,
    integer,
    character,
    integer,
    character,
    integer)
  RETURNS void AS
$BODY$

    DECLARE
	e_s2 alias for $1;
	codproduto2 alias for $2;
	qntestoque2 alias for $3;
	grade2 alias for $4;
	codmovimento2 alias for $5;
	tipomovimento2 alias for $6;
	codigousuario2 alias for $7;
	registro record;
    BEGIN

	SELECT INTO registro* FROM grades WHERE codproduto = codproduto2 AND TRIM(grade) = grade2;

	IF found THEN
  		IF e_s2 = 'S' THEN
			UPDATE grades SET qntestoque = qntestoque - qntestoque2 WHERE codproduto = codproduto2 AND TRIM(grade) = grade2;
		ELSIF e_s2 = 'E' THEN
			UPDATE grades SET qntestoque = qntestoque + qntestoque2 WHERE codproduto = codproduto2 AND TRIM(grade) = grade2;
		END IF;
		UPDATE estoques SET qntestoque = (SELECT sum(qntestoque) FROM grades WHERE codproduto = codproduto2) WHERE codproduto = codproduto2;
		INSERT INTO kardex (codmovimento, tipomovimento, codproduto, datakardex, qntmov, e_s, usuario, grade) VALUES (codmovimento2, tipomovimento2, codproduto2, CURRENT_DATE, qntestoque2, e_s2, codigousuario2, grade2);
	ELSE
		raise exception 'Produto ou grade não localizado.';
	END IF;
			
    END;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;


