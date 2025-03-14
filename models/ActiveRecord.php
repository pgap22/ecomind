<?php  

class ActiveRecord {
    protected static $db;
    protected static $table = '';
    protected static $dbColumn = [];
    protected static $errors = [];

    public $id = null;
    
    public static function setDB(mysqli $db){
        self::$db = $db;
    }

    public static function find($id) : static|bool {
        //Verificar si es un numero valido
        if(!is_numeric($id)) return false;

        //Crear el query dependiendo de la tabla del objeto hijo
        $query = 'SELECT * FROM '. static::$table . " WHERE id = $id";
        
        //Preparar la declaracion de la consulta
        $stmt = self::$db->prepare($query);


        //Ejecutar el query
        $stmt->execute();

        //Obtener resultados
        $result = $stmt->get_result();

        //Ordenar en un arreglo asociativo los resultados
        $result = $result->fetch_assoc();

        //Si hay resultados los retornamos
        if($result) return self::createObj($result);

        //Si no hay resultados retornamos falso
        return false;
    }

    public static function all(){
        //Crear query que obtengamos todos los registro de una tabla
        $query = "SELECT * FROM ". static::$table;

        //Declarar el query

        $stmt = self::$db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        
        while ($row = $result->fetch_assoc()) {
            $arr[] = self::createObj($row);
        }

        if(isset($arr[0])){
           return $arr;
        }
        return [];
    }

    /**
     * @return static[]|static
     */
    public static function where($column, $reg ,$limit = 1) : array|static{
        //Detectar si es un string
        $reg = self::getSqlValue(self::sanitize($reg));

        //Crear query
        $query = "SELECT * FROM " . static::$table ." WHERE $column = $reg "; 

        //Detectar si hay limites añadirlos al query
        $query.= (!$limit) ? "" : " LIMIT $limit";

        //Preparar consultas con el fin de obtener su tipos de datos
        $stmt = self::$db->prepare($query);
        $stmt->execute();
        $stmt = $stmt->get_result();

        //Guardamos en memoria todos los resultados
        while ($row = $stmt->fetch_assoc()) {
            $result[] = $row;
        }    

        
        if(!isset($result[0])){
            return [];
        }

        //Si el limite es 1 solo se entrega un objeto
        if($limit == 1){
            return static::createObj($result[0]);
        }
        
        //Convertimos los arreglos en objetos
        foreach($result as $key => $value){
            $result[$key] = static::createObj($result[$key]);
        }
        
        return $result;

    }

    public function save(){
        if(!$this->id){
        //Obtener las columnas y los valores para el query
        $data = static::getAttributes();
        //Guardando en memoria los arreglos convertidos a string
        $value = $data['value'];
        $atr = $data['atr'];


        //Crear el query
        $query = "INSERT INTO ". static::$table;
        $query .= " (";
        $query .= $atr;
        $query .= " )";
        $query .= " VALUES(";
        $query .= $value;
        $query .= ")";

        self::$db->query($query);
        }
        else{
            //Obtener las columnas y los valores para el query
            $data = static::getAttributes();
            
            $value = $data['arr-1'];
            $atr = $data['arr-2'];

            
            //Construyendo el query
            $query = "UPDATE " . static::$table;
            $query .= " SET ";
            $lastData = count($value);

            foreach($value as $key =>$values){
                if($lastData == $key){
                    $query .= $atr[$key] . "=" . self::getSqlValue($values);
                }
                else{
                    $query .= $atr[$key] . "=" . self::getSqlValue($values) .", ";
                }
            }

            //Asignando a la consulta quien se va actualizar
            $query .= " WHERE id = $this->id";
            //Ejecutar query
            self::$db->query($query);
        }
     
    }

    public static function getErrors(){
        return static::$errors;
    }
    
    public function getAttributes(){
        $result["atr"] = static::$dbColumn;
        $result["value"]  = [];
        foreach($result["atr"] as $key => $value){
            $result["value"][] = $this->$value;
        }
        //Eliminar el id
        unset($result["value"][0]);
        unset($result["atr"][0]);


        //El Arreglo pasarlo a string de forma que porcada item se separe por una coma igual q un query
        $atr = join(",",$result["atr"]);

        //Obtener el arreglo de valores y sanitizarlo
        $value = self::sanitizeAttributes($result["value"]);

        //Arreglar Valores si son string o int
        for ($i=0; $i < count($value); $i++) { 
            $value[$i] = self::getSqlValue($value[$i]);
        }


        //Pasar los valores ya formateados para que el query sea un exito
        
        $value = join(",",$value);
        
        $result["arr-1"] = $result["value"];
        $result["arr-2"] = $result["atr"];
        
        $result["atr"] = $atr;
        $result["value"] = $value;   

        return $result;

    }


    public static function getSqlValue($data){
         //Obtener que tipo de valor es
         $dataType = gettype($data);

         if($dataType == 'string'){
             //Si es string agregar las comillas
             $data = '"'.self::sanitize($data).'"';
            
        }
        return $data;
    }

    public static function createObj($arr) : static{
        return new static($arr);
    }

    public function setData($property,$data){
        $this->$property = $data;
    }

    public function delete(){
        if(!$this->id){
            throw new \Exception("No existe ese registro en la bd", 1);
        }


        $query = "DELETE FROM ".static::$table." WHERE id =  $this->id";
        if(self::$db->query($query)) return true;
        return false;
    }

    public static function executeSQL($query) : bool|mysqli_result{

        $stmt= self::$db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result;
        
    }

    public static function sanitize($dato){
        if(gettype($dato) == 'string') return self::$db->escape_string($dato);
        return $dato;
    }

    public static function sanitizeAttributes($arr){
        foreach ($arr as $key => $value) {
            $sanitized[] = self::sanitize($value);
        }
        return $sanitized;
    }

    public static function fetchResultSQL($result){
        return $result->fetch_assoc();
    }

    public function getData($property){
        return $this->$property;
    }
}

?>