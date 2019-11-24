<?php

namespace UiferCalhas\SrcClasses;

class ConfigDeclarations
{

    /*
    Define todas as configurações dos diretórios do projeto
     */

    const RAIZ = "http://localhost/UiferCalhas/view/";
    const CSS = self::RAIZ . "css/";
    const JS = self::RAIZ . "js/";
    const IMAGENS = self::RAIZ . "imagens/";
    //const MAILER = "src/PHPMailer";
    

    /*
    Define todas as configurações para a conexão com banco de dados
     */
    
    const DB_HOST = "localhost";
    const DB_NAME = "uifercalhas";
    const DB_USER = "root";
    const DB_PASS = "96578396";
    const DB_CHARSET = "utf-8";

}
