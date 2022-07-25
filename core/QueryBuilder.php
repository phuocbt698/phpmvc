<?php
    trait QueryBuilder{
        public $table = '';
        public $where = '';
        public $selectField = '*';
        public $limit = '';
        public $orderBy = '';
        public $innerJoin = '';
        public $leftJoin = '';
        public $rightJoin = '';
        public $crossJoin = '';
        public $lastId = '';

        public function table($table = ''){
            $this->table = $table;
            return $this;
        }

        public function insertData($data){
            $tableName = $this->table;
            $insertStatus = $this->create($tableName, $data);
            if($insertStatus){
                return true;
            }
            return false;
        }

        public function updateData($data){
            $whereUpdate = str_replace("WHERE id =", '', $this->where);
            $whereUpdate = str_replace("'", '', $whereUpdate);
            $whereUpdate = trim($whereUpdate);
            $updateStatus = $this->update($this->table, $whereUpdate, $data);
            if($updateStatus){
                return true;
            }
            return false;
        }

        public function deleteData(){
            $whereUpdate = str_replace("WHERE id =", '', $this->where);
            $whereUpdate = str_replace("'", '', $whereUpdate);
            $whereUpdate = trim($whereUpdate);
            $deleteStatus = $this->delete($this->table, $whereUpdate);
            if($deleteStatus){
                return true;
            }
            return false;;
        }

        public function select($field = '*'){
            $this->selectField = $field;
            return $this;
        }

        public function where($column, $comparison, $value){
            if(empty($this->where)){
                $this->operator = ' WHERE ';
            }else{
                $this->operator = " AND ";
            }
            $this->where .= $this->operator . $column . " ". $comparison . " '" . $value . "'";
            return $this;
        }

        public function orWhere($column, $comparison, $value){
            if(empty($this->where)){
                $this->operator = ' WHERE ';
            }else{
                $this->operator = " OR ";
            }
            $this->where .= $this->operator . $column . " ". $comparison . " '" . $value . "'";
            return $this;
        }

        public function likeWhere($column, $value){
            if(empty($this->where)){
                $this->operator = ' WHERE ';
            }else{
                $this->operator = " AND ";
            }
            $this->where .= $this->operator . $column . " ". 'LIKE' . " '" . $value . "'";
            return $this;
        }

        public function limit($limit = '', $offset = 0){
            $this->limit = " LIMIT " . $limit . ' OFFSET ' . $offset;
            return $this;
        }
        
        public function orderBy($column, $orderBy = ''){
            $this->orderBy = ' ORDER BY ' . $column . ' ' . strtoupper($orderBy);
            return $this;
        }

        public function innerJoin($table, $relatioship){
            $this->innerJoin .= ' INNER JOIN ' . $table . ' ON ' . $relatioship . ' ';
            return $this;
        }

        public function leftJoin($table, $relatioship){
            $this->innerJoin .= ' LEFT JOIN ' . $table . ' ON ' . $relatioship . ' ';
            return $this;
        }

        public function rightJoin($table, $relatioship){
            $this->innerJoin .= ' RIGHT JOIN ' . $table . ' ON ' . $relatioship . ' ';
            return $this;
        }

        public function crossJoin($table){
            $this->innerJoin .= ' CROSS JOIN ' . $table . ' ';
            return $this;
        }

        public function lastId(){
            return $this->getLastId();
        }

        public function get(){
            $data = [];
            $sql = "SELECT " . $this->selectField . " FROM " . $this->table . $this->innerJoin . $this->where . $this->limit . $this->orderBy;
            $query = $this->query($sql);
            $this->resetQuery();
            if(!empty($query)){
                while(($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) != null){
                    $data[] = $row;
                }
                return $data;
            }
            return false;
        }

        public function first(){
            $data = null;
            $sql = "SELECT " . $this->selectField . " FROM " . $this->table . $this->where;
            $query = $this->query($sql);
            $this->resetQuery();
            if(!empty($query)){
               $data = mysqli_fetch_assoc($query);
               return $data;
            }
            return false;
        }

        public function resetQuery(){
            $this->table = '';
            $this->where = '';
            $this->selectField = '';
            $this->limit = '';
            $this->orderBy = '';
            $this->innerJoin = '';
            $this->leftJoin = '';
            $this->rightJoin = '';
            $this->crossJoin = '';
            $this->lastId = '';
        }
    }
?>