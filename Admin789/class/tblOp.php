<?php
define("TBLOP_EXECUTE_SELECT", 1);
define("TBLOP_EXECUTE_INSERT", 2);
define("TBLOP_EXECUTE_UPDATE", 3);
define("TBLOP_EXECUTE_DELETE", 4);

//Connect to DB using Connection Class
/* * *************** Table Operations Class ************** */
class tblOp {

    private $db = DB_DATABASE;
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $now = "0000-00-00 00:00:00";
    private $table = "";
    private $primaryKey = "";
    private $fields = array();
    private $insert_id = 0;
    private $arrFormData = array();
    private $errorString = '';

    function __construct($table) {
        $this->connection = $this->connect();
        $this->table = $table;
        $this->primaryKey = $this->getPrimaryKey($table);
        $this->fields = $this->optimiseFields($table);
        $this->now = date("Y-m-d h:i:s");
        $this->insert_id = 0;
    }

    function connect() {
        $connection = @mysqli_connect($this->host, $this->user, $this->pass) or die("<span style='font-family:Arial, Helvetica, sans-serif; color:#FF0000; font-size:12px; font-weight:bold;'>An error occured :</span>" . mysqli_connect_errno());
        @mysqli_select_db($this->db)or die("<span style='font-family:Arial, Helvetica, sans-serif; color:#FF0000; font-size:11px; font-weight:bold;'>An error occured :</span>" . mysqli_connect_errno());
        return $connection;
    }

    function optimiseFields($table) {
        $result = mysqli_query("SHOW COLUMNS FROM " . $table);
        if (!$result) {
            die('An error occured :' . mysqli_connect_error());
        }
        if (mysqli_num_rows($result) > 0) {
            $structure = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $structure[$row['Field']] = '';
            }
        }
        return $structure;
    }

    function getPrimaryKey($table) {
        $result = mysql_query("SHOW COLUMNS FROM " . $table);
        if (!$result) {
            die('An error occured :' . mysqli_connect_error());
        } else {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row['Key'] == 'PRI') {
                        $primaryKey = $row['Field'];
                    }
                }
                return $primaryKey;
            }
        }
    }

    function setError($str) {
        $this->errorString = $str;
    }

    function getError() {
        return $this->errorString;
    }

    function execute($values = NULL, $mode = TBLOP_EXECUTE_INSERT, $where = NULL, $order = NULL) {
        if (($mode == TBLOP_EXECUTE_INSERT || $mode == TBLOP_EXECUTE_UPDATE) && (!is_array($values) || count($values) == 0)) {
            //echo  "No Data for Insertion / Updation";
            $this->setError('An error occured : Invalid Arguments Supplied');
            return false;
        }

        //$values = $this->ArrRemoveXSS($values);


        $values = $this->clearArray($values);

        $sql = $this->buildQuery($values, $mode, $where, $order);

        $res = $this->query($sql);
        if (!$res) {
            $this->setError('An error occured :' . mysqli_connect_error());
            return false;
        }
        $this->insert_id = mysqli_insert_id();
        return true;
    }

    function execute_video($values = NULL, $mode = TBLOP_EXECUTE_INSERT, $where = NULL, $order = NULL) {
        if (($mode == TBLOP_EXECUTE_INSERT || $mode == TBLOP_EXECUTE_UPDATE) && (!is_array($values) || count($values) == 0)) {
            //echo  "No Data for Insertion / Updation";
            $this->setError('An error occured : Invalid Arguments Supplied');
            return false;
        }
        //$values = $this->ArrRemoveXSS($values);
        $values = $this->clearArray($values);
        $sql = $this->buildQuery($values, $mode, $where, $order);
        $res = $this->query($sql);
        if (!$res) {
            $this->setError('An error occured :' . mysql_error());
            return false;
        }
        $this->insert_id = mysql_insert_id();
        return true;
    }

    function clearArray($array) { //Will Clear the repeated Elements from array
        if (!is_array($array) || count($array) == 0) {
            $this->setError('An error occured : Invalid Arguments Supplied');
            return false;
        }
        foreach ($array as $key => $val) {
            if (!array_key_exists($key, $this->fields))
                unset($array[$key]);
        }
        return $array;
    }

    function buildQuery($value = NULL, $mode = TBLOP_EXECUTE_SELECT, $where = FALSE, $order = FALSE) {
        $where = ($where) ? " WHERE $where " : "";
        $order = ($order) ? " ORDER BY $order " : " ORDER BY {$this->primaryKey} ";
        $temp = "";
        switch ($mode) {
            case TBLOP_EXECUTE_SELECT:
                $temp = implode(",", array_keys($this->fields));
                //echo "SELECT $temp FROM {$this->table} $where $order ";  
                return "SELECT $temp FROM {$this->table} $where $order ";

            case TBLOP_EXECUTE_UPDATE:
                array_walk($value, "alter");
                $temp = implode(", ", array_values($value));
                //echo "UPDATE {$this->table} SET $temp $where "; exit;
                return "UPDATE {$this->table} SET $temp $where ";

            case TBLOP_EXECUTE_INSERT:
                $tempF = implode(",", array_keys($value));
                $tempV = implode("', '", array_values($value));
                //echo "<br> INSERT INTO {$this->table} ($tempF) VALUES ('$tempV')";
                return  "INSERT INTO {$this->table} ($tempF) VALUES ('$tempV')";

            case TBLOP_EXECUTE_DELETE:
                //echo "DELETE FROM {$this->table} $where ";	
                return "DELETE FROM {$this->table} $where ";
            //default:
            //echo " No operations performed ";
        }
    }

    function getRowByFields($fields, $where = NULL, $order = NULL) {
        $fields = ($fields) ? " $fields " : " * ";
        $where = ($where) ? " WHERE $where " : "";
        $order = ($order) ? " ORDER BY '$order' " : " ORDER BY {$this->primaryKey} ";
      $sql = "SELECT $fields FROM {$this->table} $where ;";
//        echo $sql;
        $query = $this->query($sql);
        if ($query) {
            //$array = mysql_fetch_array($query, MYSQL_ASSOC);
            $array = mysqli_fetch_array($query);
            mysqli_free_result($query);

            return $array;
        } else {
            return false;
        }
    }
    function getAllByFields($fields, $where = NULL, $order = NULL) {
        $res = '';
        $fields = ($fields) ? " $fields " : " * ";
        $where = ($where) ? " WHERE $where " : "";
        $order = ($order) ? " ORDER BY '$order' " : " ORDER BY {$this->primaryKey} ";
        $sql = "SELECT $fields FROM {$this->table} $where ;";
//        echo $sql;
         $query = mysqli_query($sql);
        if ($query) { 
            //while ($array = mysql_fetch_array($query, MYSQL_ASSOC))
            while ($array = mysqli_fetch_array($query)) {
                $res[] = $array;
            }

            mysqli_free_result($query);
            
            return $res;
            
        } else {
            return false;
        }
    }

    function query($sql) {

         $res = mysqli_query($sql);
        if (!$res) {
            $this->setError('An error occured :' . mysqli_connect_error());
            return false;
        } else {
            return $res;
        }
    }


    function getAll($where = NULL, $order = NULL) {
        $res = '';
         $sql = $this->buildQuery(NULL, TBLOP_EXECUTE_SELECT, $where, $order);
//        $msc = microtime(true);
        $query = $this->query($sql);
//        $msc = microtime(true) - $msc;
//        echo $msc . ' seconds'; // in seconds
//echo $sql;
        if (!$query) {
            return false;
        } else {
            //while ($array = mysql_fetch_array($query, MYSQL_ASSOC))
            while ($array = mysqli_fetch_array($query)) {
                $res[] = $array;
            }

            mysqli_free_result($query);
            return $res;
        }
    }
	function getRowByid($where , $order = NULL) {
        $res = '';
        $sql = $this->buildQuery(NULL, TBLOP_EXECUTE_SELECT, $where, $order);
//      $msc = microtime(true);
        $query = $this->query($sql);
//      $msc = microtime(true) - $msc;
//      echo $msc . ' seconds'; // in seconds
//      echo $sql;
        if (!$query) {
            return false;
        } else {
           // while ($array = mysql_fetch_array($query, MYSQL_ASSOC))
            while ($array = mysqli_fetch_array($query)) {
                $res[] = $array;
            }

            mysqli_free_result($query);
            return $res;
        }
    }

    function insert($array) {  //onSuccess Return 'success'  
        return $this->execute($array);
    }

    function insert_video($array) {  //onSuccess Return 'success'  
        return $this->execute_video($array);
    }

    function delete($cond) {   //onSuccess Return 'success'  
        return $this->execute($array = "", TBLOP_EXECUTE_DELETE, $cond);
    }

    function update($array, $cond) { //onSuccess Return 'success'  
        return $this->execute($array, TBLOP_EXECUTE_UPDATE, $cond);
    }
 
    function update_video($array, $cond) { //onSuccess Return 'success'  
        return $this->execute_video($array, TBLOP_EXECUTE_UPDATE, $cond);
    }

    function updateField($array, $cond) { //onSuccess Return 'success'  
        return $this->execute($array, TBLOP_EXECUTE_UPDATE, $cond);
    }

    function insertId() {
        return $this->insert_id;
    }

//onSuccess Return 'success'  

    function count($where = NULL) {

        $where = ($where) ? " WHERE $where " : "";
        $sql = "SELECT $this->primaryKey FROM {$this->table} $where";
        $result = $this->query($sql);
        if ($result) {
            $res = mysqli_num_rows($result);
            //mysql_free_result($query); 
            return $res;
        } else {
            return false;
        }
    }

    function recordCount($sql) {

        $result = $this->query($sql);
        if ($result) {
            $res = mysqli_num_rows($result);
            return $res;
        } else {
            return false;
        }
    }

    function getFields($fields, $where = NULL, $order = NULL) {
        $fields = ($fields) ? " $fields " : " * ";
        $where = ($where) ? " WHERE $where " : "";
        $order = ($order) ? " ORDER BY $order " : " ORDER BY {$this->primaryKey} ";
        $sql = "SELECT $fields FROM {$this->table} $where $order;";
        $query = $this->query($sql);
        if ($query) {
           // while ($array = mysql_fetch_array($query, MYSQL_ASSOC))
            while ($array = mysqli_fetch_array($query)) {
                $res[] = $array;
            }
            mysqli_free_result($query);
            return $res;
        } else {
            return false;
        }
    }

    function getRow($where = NULL, $order = NULL) {
        $sql = $this->buildQuery(NULL, TBLOP_EXECUTE_SELECT, $where, $order);

        $query = $this->query($sql);
        if ($query) {
            //$array = mysql_fetch_array($query, MYSQL_ASSOC);
            $array = mysqli_fetch_array($query);
            mysqli_free_result($query);

            return $array;
        } else {
            return false;
        }
    }

    function getOptions($strKey, $strVal, $selected = NULL, $where = NULL, $order = NULL) {

        $strOptions = "";
        $where = ($where) ? " WHERE $where " : "";
        $order = ($order) ? " ORDER BY $order " : " ORDER BY {$this->primaryKey} ";
        $sql = "SELECT * FROM {$this->table} $where $order;";
        $query = $this->query($sql);
        if ($query) {
          //  while ($array = mysql_fetch_array($query, MYSQL_ASSOC))
            while ($array = mysqli_fetch_array($query)) {
                $res[] = $array;
            }
            mysqli_free_result($query);
            if ($res)
                foreach ($res as $key => $val) {
                    $strOptions .= "<option value='{$val[$strKey]}' " . (($val[$strKey] == $selected) ? "selected" : "") . ">{$val[$strVal]}</option>\r\n";
                }
            return $strOptions;
        } else {
            return false;
        }
    }

    /*function getLimit($from, $count = 5, $where = NULL, $order = NULL) {
        $sql = $this->buildQuery(NULL, TBLOP_EXECUTE_SELECT, $where, $order);
        //$to = $from + $count;
        $sql.="LIMIT  $from,$count ";
        //echo $sql."<br>";
        $query = $this->query($sql);
//        echo $sql;
        if ($query) {
            while ($array = mysql_fetch_array($query, MYSQL_ASSOC)) {
                $res[] = $array;
            }
            mysql_free_result($query);
            return $res;
        } else {
            return false;
        }
    }*/


    function getByLimitOffset($where = NULL, $order = NULL, $limit, $offset) {
        $sql = $this->buildQuery(NULL, TBLOP_EXECUTE_SELECT, $where, $order);
        $sql.="LIMIT  $limit OFFSET $offset";
        $query = $this->query($sql);
        if ($query)
        {
           // while ($array = mysql_fetch_array($query, MYSQL_ASSOC))
            while ($array = mysqli_fetch_array($query)){
                $res[] = $array;
            }
            mysqli_free_result($query);
            if(isset($res))
            {
                return $res;
            }
            else
            {
                return false;
            }
        } 
        else
        {
            return false;
        }
    }


    function getPageLink($pgNo, $totPage, $url, $count = "5") {

        $intPre = $pgNo - 1;
        $intNex = $pgNo + 1;

        $intFirst = $pgNo - $count;
        $intLast = $pgNo + $count;

        if ($intFirst <= 0) {
            $intFirst = 1;
        }

        if ($intLast >= $totPage) {
            $intLast = $totPage;
        }

        if ($intPre <= 0) {
            $intPre = 1;
            $strReturn = str_replace("{pgTxt}", "<", $strReturn);
        } else {
            $strReturn = str_replace("{pgNo}", "$intPre", $url);
            $strReturn = str_replace("{pgTxt}", "<", $strReturn);
        }

        for ($i = $intFirst; $i <= $intLast; $i++) {
            if ($i != $pgNo) {
                $strTemp = str_replace("{pgNo}", "$i", $url);
                $strReturn .= str_replace("{pgTxt}", "$i", $strTemp);
            } else {
                //$strReturn        .= "$i";
                $strTemp = str_replace("{pgNo}", "$i", $url);
                $strReturn .= str_replace("{pgTxt}", "$i", $strTemp);
            }
        }
        if ($intNex > $totPage) {
            $intNex = $totPage;
            $strReturn .= str_replace("{pgTxt}", ">", $strTemp);
        } else {
            $strTemp = str_replace("{pgNo}", "$intNex", $url);
            $strReturn .= str_replace("{pgTxt}", ">", $strTemp);
        }
        return $strReturn;
    }

    function joinQueryRecord($sql) {
        $query = $this->query($sql);
        if ($query) {
           // while ($array = mysql_fetch_array($query, MYSQL_ASSOC))
            while ($array = mysqli_fetch_array($query)) {
                $res[] = $array;
            }
            mysqli_free_result($query);
            return $res[0];
        } else {
            return false;
        }
    }

    function joinQuery($sql) {
        $query = $this->query($sql);
        if ($query) {
          //  while ($array = mysql_fetch_array($query, MYSQL_ASSOC))
            while ($array = mysqli_fetch_array($query)) {
                $res[] = $array;
            }
            mysqli_free_result($query);
            return $res;
        } else {
            return false;
        }
    }

    function limitQuery($sql, $from, $COUNT) {

        $sql.=" LIMIT  $from,$COUNT ";
        //echo $sql."<br>";
        $query = $this->query($sql);
        if ($query) {
          //  while ($array = mysql_fetch_array($query, MYSQL_ASSOC))
            while ($array = mysqli_fetch_array($query)) {
                $res[] = $array;
            }
            mysqli_free_result($query);
            return $res;
        } else {
            return false;
        }
    }

    function joinQueryOne($sql) {
        //echo $sql."<br>";
        $query = $this->query($sql);
        if ($query) {
          //  $array = mysql_fetch_array($query, MYSQL_NUM);
            $array = mysqli_fetch_array($query);
            return $array[0];
        } else {
            return false;
        }
    }

    function _setFormData($array) {
        $this->arrFormData = $array;
    }

    function getFormData() {
        if ($this->arrFormData)
            return $this->arrFormData;
    }

    function _clearArray($array) {
        if (!is_array($array) || count($array) == 0)
            return $this->raiseError(TBLOP_ERROR_INVALID_ARGUMENT, array("file" => __FILE__, "line" => __LINE__));
        foreach ($array as $key => $val) {
            if (!array_key_exists($key, $this->fields))
                unset($array[$key]);
        }

        return $array;
    }

    function isExist($where , $tablename ) {

        $where = ($where) ? " WHERE $where " : "";
        $tablename = ($tablename) ? $tablename : $this->table;
        $sql = "SELECT count(1) count FROM $tablename $where ;";
        $res = $this->getOne($sql);
        //if (DB::isError($res))
        //return $this->raiseError($res);
        if ($res >= 1)
            return true;
        return false;
    }

    function getOne($sql) {
        $query = $this->query($sql);
        if (!$query) {
            return false;
        } else {
            $res = mysqli_fetch_assoc($query);
            mysqli_free_result($query);
            return $res['count'];
        }
    }

    function getPostStats($id) {
        //global $db;
        $sql = "SELECT MAX(postdate) AS lastpost "
                . "FROM df_posts AS P, df_topics AS T, df_forums AS F "
                . "WHERE F.ctg_id = '$id' "
                . "AND T.forum_id = F.forum_id AND P.topic_id = T.topic_id";

        //$res	= $this->getRow($sql, DB_FETCHMODE_ASSOC);
        $query = $this->query($sql);
        if ($query) {
            //$array = mysql_fetch_array($query, MYSQL_ASSOC);
            $array = mysqli_fetch_array($query);
            mysqli_free_result($query);
            return $array;
        } else {
            return false;
        }
        //if (DB::isError($res))
        //return $this->raiseError($res);
        //return ($res);
    }

    function getSplFields($fields, $where = NULL, $order = NULL) {
        $fields = ($fields) ? " $fields " : " * ";
        $where = ($where) ? " WHERE $where " : "";
        $order = ($order) ? " ORDER BY '$order' " : " ORDER BY {$this->primaryKey} ";

        $sql = "SELECT $fields FROM {$this->table} $where $order ;";
        $query = $this->query($sql);
        if ($query) {
           // $array = mysql_fetch_array($query, MYSQL_ASSOC);
            $array = mysqli_fetch_array($query);
            mysqli_free_result($query);
            return $array;
        } else {
            return false;
        }
    }

    function monthname($n) {

        $monthName = date("F", mktime(0, 0, 0, $n, 10));
        return $monthName;
    }

    /* End Class */
}

function alter(&$val, $key) {
    $val = "$key = '$val'";
}

function pre($val) {
    echo "<pre>";
    print_r($val);
    echo "</pre>";
}

function pree($val) {
    echo "<pre>";
    print_r($val);
    echo "</pre>";
    exit;
}

function dateDisplay($date) {
    return(date("d-m-Y", strtotime($date)));
}

function dateMDisplay($date) {
    return(date("d-M-Y", strtotime($date)));
}

function getLimitedText($str, $limit = 0, $moreChar = "...") {
    $str = trim($str);
    if ($limit > 0) {
        if (strlen($str) > $limit)
            return substr($str, 0, $limit) . $moreChar;
        else
            return $str;
    } else
        return $str;
}

function getBetween($content, $start, $end) {
    $r = explode($start, $content);

    if (isset($r[1])) {
        $r = explode($end, $r[1]);
        $nos = preg_replace('/[^0-9]/', "", $r[0]);
        $leter = explode($nos, $r[0]);

        $excelval['excelcolum'] = $leter[0];
        $excelval['excelrow'] = $nos;
        return $excelval;
    }
    return '';
}
function compress($source, $destination, $quality) {
            
    $info = getimagesize($source);
    if ($info['mime'] == 'image/jpeg') 
    $image = imagecreatefromjpeg($source);
    elseif ($info['mime'] == 'image/gif') 
    $image = imagecreatefromgif($source);
    elseif ($info['mime'] == 'image/png') 
    $image = imagecreatefrompng($source);
    imagejpeg($image, $destination, $quality);
    return $destination;
}
function plancheck(){
    $client_id=$_SESSION["clientid"];
    $f="../images/$client_id";
    $size = 0;
    foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator( $f)) as $file){
        $size+=$file->getSize();
    }
    return $size;
}
function autoGenerate(){
    $alphabet = 'ABCDEFGHIJKLMNPQRSTUVWXYZ123456789';
    $string = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $string[] = $alphabet[$n];
    }
    $string= implode($string);
    return $string;
}

?>