<?php
//error_reporting(0);
//ini_set(“display_errors”, 0 );
error_reporting(E_ALL);
#ini_set(“display_errors”, 1 );


/*


Definimos  de início error_reporting para ser zero, com isso nenhum erro é reportado. Logo em seguida atribuimos ao display_errors 
o valor zero, poderia ser também true ou false, um e zero, respectivamente. O código acima fará com que o PHP não exiba nenhum tipo 
de erro na tela. Para exibir todos os erros novamente utilize o código abaixo:
[ mostra_erros.php ]
<?php
error_reporting(E_ALL);
ini_set(“display_errors”, 1 );
?>
Veremos a seguir, algumas outras combinações, para ser exibido somente o erro desejado. Primeiro vamos entender o que cada erro mais comum do PHP quer dizer:
( Definições completas disponíveis no manual PHP.net: )
E_ERROR: Estes indicam erros que não podem ser recuperados, como problemas de alocação de memória. A execução do script é interrompida.
E_WARNING: Avisos em tempo de execução (erros não fatais). A execução do script não é interrompida.
E_PARSE: Erro em tempo de compilação. Erros gerados pelo interpretador.
E_NOTICE: Indica que o script encontrou alguma coisa que pode indicar um erro, mas que também possa acontecer durante a execução normal do script.
E_STRICT: Permite ao PHP sugerir mudanças ao seu código as quais irão assegurar melhor interoperabilidade e compatibilidade futura do seu código.
E_ALL: Todos erros e avisos, como suportado, exceto de nível E_STRICT
Caso você deseje exibir apenas os erros de tipo E_WARNING deve ser usado o seguinte código:
[ mostra_erros.php ]
<?php
error_reporting(E_WARNING);
ini_set(“display_errors”, 1 );
?>
Observe que agora atribuimos ao display_errors o valor 1 ( true ), para reportamos apenas os erros E_WARNING, como definimos na função error_reporting.
Podemos ainda utilizar as seguinte combinações:
[ mostra_erros.php ]
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
ini_set(“display_errors”, 1 );
?>
Desta forma apenas os erros do tipo E_ERROR, E_WARNING e E_PARSE serão exibidos na tela. Uma outra forma seria:
[ mostra_erros.php ]
<?php
error_reporting(E_ALL ^ E_WARNING);
ini_set(“display_errors”, 1 );
?>
Com isso, todos os erros serão mostrados ( E_ALL ), com exceção do E_WARNING.
Já temos nosso arquivo de configuração ( mostra_erros.php ), agora basta chamar o arquivo de configuração nas páginas em que gostaria de alterar a configuração.
<?php
include “mostra_erros.php”;
?>
Adicione a ‘include’ acima no inicio das páginas PHP,  para que seja definido os parametros antes da página ser 
carregada. Quando precisar depurar algum erro nos códigos, ou acrescentar 
mais linhas ao código, basta alterar o arquivo mostra_erros.php e habilitar a exibição dos erros conforme foi apresentado nos exemplos acima.








 * 
 * 
 * 
 * 
 * */


?>