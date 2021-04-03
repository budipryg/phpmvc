<?php

class Student_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllStudents()
    {
        $this->db->query('select * from students');
        return $this->db->resultSet();
    }

    public function getStudentById($id)
    {
        $this->db->query('select * from students where id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function createStudent($data)
    {
        $query = "insert into students values ('',:name,:nim,:email,:major)";
        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('major', $data['major']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteStudentById($id)
    {
        $this->db->query('delete from students where id=:id');
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateStudentById($data)
    {
        $query = "update students set name = :name, nim = :nim, email = :email,major = :major where id = :id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('name', $data['name']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('major', $data['major']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function searchStudent($data)
    {
        $keyword = $data['keyword'];
        $this->db->query('select * from students where name like :keyword');
        $this->db->bind('keyword', "%$keyword%");
        $this->db->execute();
        return $this->db->resultSet();
    }
}