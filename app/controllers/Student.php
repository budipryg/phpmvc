<?php

class Student extends Controller
{
    public function index()
    {
        $data['title'] = 'Student';
        $data['students'] = $this->model('Student_model')->getAllStudents();
        $this->view('templates/header', $data);
        $this->view('students/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['title'] = 'Student Detail';
        $data['student'] = $this->model('Student_model')->getStudentById($id);
        $this->view('templates/header', $data);
        $this->view('students/detail', $data);
        $this->view('templates/footer');
    }

    public function create()
    {
        if ($this->model('Student_model')->createStudent($_POST) > 0) {
            Flasher::setFlash('succeed', 'add', 'success');
            header('Location: ' . BASEURL . '/student');
            exit;
        } else {
            Flasher::setFlash('failed', 'add', 'danger');
            header('Location: ' . BASEURL . '/student');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('Student_model')->deleteStudentById($id) > 0) {
            Flasher::setFlash('succeed', 'delete', 'success');
            header('Location: ' . BASEURL . '/student');
            exit;
        } else {
            Flasher::setFlash('failed', 'delete', 'danger');
            header('Location: ' . BASEURL . '/student');
            exit;
        }
    }

    public function edit()
    {
        echo json_encode($this->model('Student_model')->getStudentById($_POST['id']));
    }

    public function update()
    {
        if ($this->model('Student_model')->updateStudentById($_POST) > 0) {
            Flasher::setFlash('succeed', 'edit', 'success');
            header('Location: ' . BASEURL . '/student');
            exit;
        } else {
            Flasher::setFlash('failed', 'edit', 'danger');
            header('Location: ' . BASEURL . '/student');
            exit;
        }
    }

    public function search()
    {
        $data['title'] = 'Student';
        $data['students'] = $this->model('Student_model')->searchStudent($_POST);
        $this->view('templates/header', $data);
        $this->view('students/index', $data);
        $this->view('templates/footer');
    }
}