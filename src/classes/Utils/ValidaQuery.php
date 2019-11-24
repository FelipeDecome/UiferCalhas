<?php

namespace UiferCalhas\SrcClasses\classes\Utils;

class ValidaQuery
{

    public function static prepareFunction(): String 
    {
        switch ($this->function) {
            case 'INSERT':
                return "INSERT INTO {$this->table}{$this->data}";
                break;
            
            case 'SELECT' :
                return "SELECT {$this->fields} FROM {$this->table}{$this->params}";
                break;

            case 'UPDATE' :
                return "UPDATE {$this->table} SET {$this->data}{$this->Params}";
                break;

            case 'DELETE' :
                return "DELETE FROM {$this->table}{$this->params}";
                break;

            default:
                throw new CrudException("Função requisitada não existe, ou não foi adcionada ao sistema. Contate o Desenvolvedor. Função requisitada: " . strtoupper($this-function), 20);
                
                break;
        }
    }

}