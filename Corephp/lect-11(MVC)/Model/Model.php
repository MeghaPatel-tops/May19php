<?php
 class Model{
    public $con;
    
    public function __construct(){
        $this->con = new mysqli("localhost","root","","may19php");
        if(isset($this->con)){
            // echo "success";
        }

    }
    
    public function insertData($table,$data){
        //['username'=>$username,"email"=>$email,"pswd"=>$pswd]
        //insert into tbalename()values();
        $key = implode(",",array_keys($data));
        $values=implode("','",array_values($data));
        $query = "insert into $table($key)values('$values')"; 
        $result = $this->con->query($query);
        return $result;
    }

    public function selectAll($table){
        $query= "select * from $table";
        $req= $this->con->query($query);
        while($row=$req->fetch_object()){
            $rw[]=$row;
        }
        return $rw??[];
    }

    public function deleteData($id){
        $query= "delete from users where id=$id";
        $req= $this->con->query($query);
        return $req;
    }

    public function selectWhere($table,$where){
        //[id=>$id];
        $query="select * from $table where 1=1";
        foreach($where as $key=>$values){
            $query.=" And ".$key ."='".$values."'";
        }
         $req= $this->con->query($query);
        while($row=$req->fetch_object()){
            $rw[]=$row;
        }
        return $rw??[];
    }

    public function updateData($table,$data,$where){
        $query="update $table set ";
        $count= count($data);
        $i=1;
        foreach($data as $key =>$value){
            if($i<$count){
                $query.= $key ."='".$value."',";
            }
            else{
                $query.= $key ."='".$value."'";
            }
            $i++;
        }
        $query.="where 1=1  ";
        foreach($where as $key=>$value){
            $query.=" And ".$key ."='".$value."'";
        }
         $result = $this->con->query($query);
        return $result;
    }

 }



?>