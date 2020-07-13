<?php
    define('HOST','localhost');
    define('USER','root');
    define('PASS','');
    define('BASE','sys');

    class DB{
        private static $instancia;
        
        public static function getInstancia(){
            if(!isset(self::$instancia)){
                try{
                    self::$instancia = new PDO('mysql:host='.HOST.';dbname='.BASE.';charset=utf8;',USER,PASS);
                    self::$instancia->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    self::$instancia->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);  
                    self::$instancia->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);              
                }catch(PDOException $erro){
                    echo $erro->getMessage(); 
                    echo "Erro na instancia da conexao";                 
                }
            }
            
            return self::$instancia;
        }
        public static function prepare($sql){
            return self::getInstancia()->prepare($sql);
        }
    }
?>