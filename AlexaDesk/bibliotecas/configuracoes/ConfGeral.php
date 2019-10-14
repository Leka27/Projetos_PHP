<?php

class confGeral{
    private $dbDatabase;
    private $dbHost;
    private $dbUser;
    private $dbPass;
    private $pathRaiz;
    private $urlRaiz;

    function __construct()
    {
        include('confEmpresa.php');
        $this->setDbDatabase($confEmpresa['dbDatabase']);
        $this->setDbHost($confEmpresa['dbHost']);
        $this->setDbPass($confEmpresa['dbUser']);
        $this->setDbUser($confEmpresa['dbPass']);
        $this->setUrlRaiz($confEmpresa['urlRaiz']);
    }

    public function setDbDatabase($dbDatabase){
        $this->dbDatabase = $dbDatabase;
    }
    
    public function getDbDatabase(){
        return $this->dbDatabase;
    }

    public function setDbHost($dbHost){
        $this->dbHost = $dbHost;
    }
    
    public function getDbHost(){
        return $this->dbHost;
    }

    public function setDbUser($dbUser){
        $this->dbUser = $dbUser;
    }
    
    public function getDbUser(){
        return $this->dbUser;
    }

    public function setDbPass($dbPass){
        $this->dbPass = $dbPass;
    }
    
    public function getDbPass(){
        return $this->dbPass;
    }

    public function setPathRaiz($pathRaiz){
        $this->pathRaiz = $pathRaiz;
    }
    
    public function getPathRaiz(){
        return $this->pathRaiz;
    }

    public function setUrlRaiz($urlRaiz){
        $this->urlRaiz = $urlRaiz;
    }
    
    public function getUrlRaiz(){
        return $this->urlRaiz;
    }


}
