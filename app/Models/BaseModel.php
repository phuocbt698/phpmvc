<?php
    class BaseModel extends Database{

        protected $conn;
        use QueryBuilder;

        public function __construct()
        {
           $this->conn = $this->connection();
        }

        /*
        **
        ** Lấy ra tất cả bản ghi
        ** 
        */
        public function getAll($table, $select, $orderBy, $limit){
            if(is_array($select)){
                $select = implode(', ', $select);
            }else{
                $select = $select;
            }
            
            $sql = "SELECT ${select} FROM ${table}";
            
            if(!empty($orderBy)){
                $orderBy = implode(' ', $orderBy);
                $sql .= " ORDER BY ${orderBy} ";
            }

            if(!empty($limit)){
                $sql .= " LIMIT ${limit}";
            }
            $query = $this->query($sql);
            $data = [];
            while($row = mysqli_fetch_assoc($query)){
                $data[] = $row;
            }
            return $data;
        }

        /*
        **
        ** Lấy ra một bản ghi theo ID
        ** 
        */
        public function getById($table, $id){
            $sql = "SELECT * FROM ${table} WHERE id = ${id} LIMIT 1";
            $data = $this->query($sql)->fetch_assoc();
            return $data;
        }

        /*
        **
        ** Thêm mới một bản ghi
        ** 
        */
        public function create($table, $data = []){
            $column = implode(', ', array_keys($data));
            $valueString = array_map(function ($value){
                return "'" . $value . "'";
            }, array_values($data));
            $values = implode(', ', array_values($valueString));
            $sql = "INSERT INTO ${table}(${column}) VALUES (${values})";
            return $this->query($sql);
        }

        /*
        **
        ** Cập nhật một bản bản ghi
        ** 
        */
        public function update($table, $id, $data = []){
            $dataUpdate = [];
            foreach($data as $key => $value){
                $dataUpdate[] = $key . ' = ' . "'" . $value . "'";
            }
            $dataUpdate = implode(', ', $dataUpdate);
            $sql = "UPDATE ${table} SET ${dataUpdate} WHERE id = ${id}";
            return $this->query($sql);
        }

        /*
        **
        ** Xóa một bản ghi bản ghi
        ** 
        */
        public function delete($table, $id){
            $sql = "DELETE FROM ${table} WHERE id = ${id}";
            return $this->query($sql);
        }

        /*
        **
        ** Lấy ra id mới nhất (sau khi thực hiện câu lệnh select)
        ** 
        */
        public function getLastId(){
            return mysqli_insert_id($this->conn);
        }

        /*
        **
        ** Thực hiện câu truy vấn
        ** 
        */
        public function query($sql){
           return mysqli_query($this->conn, $sql);
        }

    }
?>