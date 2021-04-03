<?php

class About extends Controller
{
    public function index($name = 'Budi', $job = 'Engineer')
    {
        $data['title'] = 'About';
        $data['name'] = $name;
        $data['job'] = $job;
        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }

    public function page()
    {
        $data['title'] = 'Pages';
        $this->view('templates/header', $data);
        $this->view('about/page');
        $this->view('templates/footer');
    }
}