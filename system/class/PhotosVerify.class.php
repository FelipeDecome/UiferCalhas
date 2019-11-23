<?php

/**
 * @copyright (c) 2017, Felipe Decome
 */
class PhotosVerify {

    private $MaxSize = 1 * 1024 * 1024;
    private $PermittedTypes = array("jpg", "jpeg", "png", "bmp");
    private $Size;
    private $Type;
    public $Name;
    public $IsValid;
    public $Err_Msg;
    
    /**
     * [pt-br] Sistema de Upload de Arquivos.
     * 
     * @param String $Name - [pt-br] Nome que será usado na nova imagem.
     * @param String $Type - [pt-br] Formato do arquivo enviado.
     * @param String $Size - [pt-br] Tamanho do arquivo enviado.
     * @param String $Img - [pt-br] Número da Imagem que está sendo enviada (Para casos onde tenham mais de 1 upload simultâneo).
     * @param boolean $UseData - [pt-br] Define se vai ser usado data no nome do arquivo.
     */

    function __construct($Name, $Type, $Size, $Img, $UseData = false) {
        $this->Size = $this->VerSize($Size, $Img);
        $this->Name = $this->VerName($Name, $Type, $UseData);
        $this->Type = $this->VerType($Type, $Img);
        if ($this->Size === true && isset($this->Name) && $this->Type === true) {
            $this->IsValid = true;
        } else {
            $this->IsValid = false;
        }
    }
    
    //[pt-br] Verifica se o tamanho do arquivo está dentro do permitido.
    private function VerSize($Size, $Img) {
        $Img = (isset($Img) && $Img != null) ? "$Img " : null;
        if (isset($Size) && $Size != null) {
            if ($Size < $this->MaxSize) {
                return true;
            } else {
                $this->Err_Msg['size'] = "Tamanho da imagem {$Img}excede 1mb, tente uma imagem menor.";
                return false;
            }
        } else {
            $this->Err_Msg['size'] = "Tamanho da imagem {$Img}não definido, contate o administrador do site.";
            return false;
        }
    }
    
    //[pt-br] Verifica se o formato do arquivo é permitido.
    private function VerType($Type, $Img) {
        $Img = (isset($Img) && $Img != null) ? "$Img " : null;
        if (isset($Type) && $Type != null) {
            $Type = explode('/', $Type);
            switch ($Type[1]) {
                case $this->PermittedTypes[0]:
                    return true;
                case $this->PermittedTypes[1]:
                    return true;
                case $this->PermittedTypes[2];
                    return true;
                case $this->PermittedTypes[3]:
                    return true;
                default:
                    $this->Err_Msg['type'] = "Formato da Imagem {$Img}/" . strtoupper($Type[1]) . "/ não permitido, apenas os seguintes formatos são aceitos: .{$this->PermittedTypes[0]}|.{$this->PermittedTypes[1]}|.{$this->PermittedTypes[2]}|.{$this->PermittedTypes[3]}.";
            }
        } else {
            $this->Err_Msg['type'] = "O Formato da Imagem {$Img}não foi definida, contate o administrador do site.";
        }
    }
    
    //[pt-br] Gera o nome para o arquivo de acordo com o que foi definido.
    private function VerName($Name, $Type, $UseData) {
        $Type = explode("/", $Type);
        if (isset($Name) && $Name != null && $UseData != true) {
            $Type = $Type[1];
            return $Name . "." . $Type;
        } else {
            $Name = date("d.m.Y-H:i:s-").$Name;
            $Type = $Type[1];
            return $Name . "." . $Type;
        }
    }

}
