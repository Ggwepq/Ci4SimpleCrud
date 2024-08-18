<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\StudentsModel;

class StudentsController extends BaseController
{
    public function listStudentRecord()
    {
        // List all student record 

        $getStudents = new StudentsModel();
        $data['students'] = $getStudents->findAll();

        return view('Student/list', $data);
    }

    public function createStudentRecord()
    {
        // Create or Add new student record

        $data['studentID'] = '2024_' . uniqid();

        return view('Student/add', $data);
    }

    public function storeStudentRecord()
    {
        // Store the student record
        $insertStudent = new StudentsModel();

        $imgName = null;

        if ($img = $this->request->getFile('studentProfile')) {
            if ($img->isValid() && ! $img->hasMoved()) {
                $imgName = $img->getRandomName();
                $img->move('uploads/', $imgName);
            }
        }

        // Get data from user input and store it to the array
        $data = array(
            'student_name' => $this->request->getVar('studentName'),
            'student_id' => $this->request->getVar('studentID'),
            'student_course' => $this->request->getVar('studentCourse'),
            'student_section' => $this->request->getVar('studentSection'),
            'student_batch' => $this->request->getVar('studentBatch'),
            'student_year' => $this->request->getVar('studentYear'),
            'student_profile' => $imgName,
            'is_deleted' => 0,
        );

        // Insert data to Database
        $insertStudent->insert($data);

        return redirect()->to('/student')->with('success', 'Student Added Successfully');
    }

    public function editStudentRecord($id)
    {
        // Show details of a student to be edited
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
