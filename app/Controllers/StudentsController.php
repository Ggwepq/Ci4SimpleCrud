<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class StudentsController extends BaseController
{
    public function listStudentRecord()
    {
        // List all student record 
        return view('Student/list');
    }

    public function createStudentRecord()
    {
        // Create or Add new student record
        return view('Student/add');
    }

    public function storeStudentRecord()
    {
        // Store the student record
    }

    public function editStudentRecord($id)
    {
        // Show details to be edited in the view.php
        return view('Student/edit');
    }

    public function updateStudentRecord($id)
    {
        // Update the student record on the Database
    }

    public function deleteStudentRecord($id)
    {
        // delete a student record on the Database
    }
}
