<?php
	
	/* Created by Gabriel A. Barbosa */
	date_default_timezone_set('America/Campo_Grande');
	
	/* Incluindo o autoload do Composer para carregar a biblioteca */
	require_once 'class/Mysqldump.php';
	 
	/* Incluindo a classe que criamos para controlar o backup */
	require_once 'class/controlBackup.class.php';
	 
	/* Como a geração do backup pode ser demorada, retiramos */
	/* o limite de execução do script */
	set_time_limit(0);
	
	/* Utilizando a classe para gerar um backup na pasta 'backups' */
	/* e manter os últimos dez arquivos */
	$backup = new BackupDatabase('/home/namecpanel/public_html/AutoBackupMysql/backups', 20);
	$backup->setDatabase('localhost', 'user', 'databasename', 'senha');
	$backup->generate();
	
	/* Setar a pasta no ftp com permissao 770 para todos os arquivos e pastas - para não ficar public */
	
	/* Cron Config Cpanel */
	/* 0	0	*	*	*	/usr/local/bin/php /home/namecpanel/public_html/AutoBackupMysql/index.php */

?>