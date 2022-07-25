<?php
    class RoleModel extends BaseModel{

        const table = 'tbl_role';

        public function getData($select = ['*'], $orderBy = [], $limit = ''){
            return $this->getAll(self::table, $select, $orderBy, $limit);
        }

        public function find($id){
            return $this->getById(self::table, $id);
        }

        public function store($data = []){
           return  $this->create(self::table, $data);
        }

        public function edit($id, $data = [])
        {
            return $this->update(self::table, $id, $data);
        }

        public function destroy($id){
            return $this->delete(self::table, $id);
        }
    }
?>