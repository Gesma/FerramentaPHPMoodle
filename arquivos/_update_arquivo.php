<?php

	include_once "funcoes.php";
	include_once "../config.php";

	session_start();

		$curso = $_REQUEST['curso'];

		$atividade = $_REQUEST['atividade'];

		$assunto = $_REQUEST['assunto'];

		$tipo = $_REQUEST['informacao'];
		
//		echo var_dump($_FILES);

		if($tipo == "Arquivo" || $tipo == "File"){

			$fname = $_FILES["arquivo"]["name"];
			$ftmpname = $_FILES["arquivo"]["tmp_name"];

			$t = time();

			$path = "/var/www/moodle_uece/files/".$t."/".$fname;

			mkdir("/var/www/moodle_uece/files/".$t);
	
			$content = file_get_contents($ftmpname);
			
			$pc = file_put_contents($path, $content);
			
			$af = alterarFile($_SESSION['USER']->id, $fname, $path, $curso, $atividade, $assunto, $_SESSION['id_arquivo'], $_FILES['arquivo']['type']);

			//echo "af>".$af."<br/>";
			if($pc && $af){
				mensagem($strings['sucesso']);
				unset($_SESSION['step']);
				unset($_SESSION['step1']);
				unset($_SESSION['step2']);
				unset($_SESSION['step3']);
				unset($_SESSION['step4']);
				unset($_SESSION['step5']);
				unset($_SESSION['step6']);
				redirecionar("index.php?protocolo=controle&id_curso=".$_SESSION['id_curso']);
			} else {
				mensagem($strings['falha']);
				unset($_SESSION['step5']);
				$_SESSION['step'] = 5;
				redirecionar("index.php");
			}

		}else if($tipo == "Link"){

			$titulo = $_REQUEST['titulo'];
			$link = $_REQUEST['link'];



			$al = alterarLink($_SESSION['USER']->id, $titulo, $link, $curso, $atividade, $assunto, $titulo, $link, $_SESSION['id_arquivo']);


			if($al){

				mensagem($strings['sucesso']);
				unset($_SESSION['step']);
				unset($_SESSION['step1']);
				unset($_SESSION['step2']);
				unset($_SESSION['step3']);
				unset($_SESSION['step4']);
				unset($_SESSION['step5']);
				unset($_SESSION['step6']);
				redirecionar("index.php?protocolo=controle&id_curso=".$_SESSION['id_curso']);
			}
		}
		
	#}



	redirecionar("index.php");

?>
