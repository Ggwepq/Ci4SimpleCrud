<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\StudentsModel;

class StudentsController extends BaseController
{

    public function changeSiteName($siteName)
    {
        $data['siteName'] = $siteName;
        view('layout/main', $data);
    }

    public function listStudentRecord()
    {
        // List all student record 

        $getStudents = new StudentsModel();
        $data['students'] = $getStudents->findAll();
        $this->changeSiteName('Student List');

        return view('Student/list', $data);
    }

    public function createStudentRecord()
    {
        // Create or Add new student record

        $data['studentID'] = '2024_' . uniqid();
        $this->changeSiteName('Add New Student');

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

        /*$testData = json_encode($data);*/
        /**/
        /*echo $testData;*/

        return redirect()->to('/students')->with('success', 'Student Added Successfully');
    }

    public function editStudentRecord($id)
    {
        // Show details of a student to be edited

        $getStudents = new StudentsModel();

        $data['students'] = $getStudents->find($id);
        $this->changeSiteName('Edit Student');

        return view('Student/edit', $data);
    }

    public function updateStudentRecord($id)
    {
        // Update the student record on the Database

        $updateStudents = new StudentsModel();
        $db = db_connect();

        if ($img = $this->request->getFile('studentProfile')) {
            if ($img->isValid() && ! $img->hasMoved()) {
                $imgName = $img->getRandomName();
                $img->move('uploads/', $imgName);
            }
        }

        // Check if a file is uploaded, get the name and update it in the db
        if (!empty($_FILES['studentProfile']['name'])) {
            $db->query("UPDATE tbl_students SET student_profile = '$imgName' WHERE id = '$id'");
        }

        // Get updated data from user input and store it to the array
        $data = array(
            'student_name' => $this->request->getPost('studentName'),
            'student_id' => $this->request->getPost('studentID'),
            'student_course' => $this->request->getPost('studentCourse'),
            'student_section' => $this->request->getPost('studentSection'),
            'student_batch' => $this->request->getPost('studentBatch'),
            'student_year' => $this->request->getPost('studentYear'),
        );

        $updateStudents->update($id, $data);

        return redirect()->to('/students')->with('success', 'Student Updated Successfully');
    }

    public function deleteStudentRecord($id)
    {
        // delete a student record on the Database

        $deleteStudent = new StudentsModel();
        $hmm = $deleteStudent->find($id);

        $hmm['is_deleted'] = 1;

        $deleteStudent->update($id, $hmm);
        /*db_connect()->query("UPDATE tbl_students SET is_deleted = 1 WHERE id = '$id'");*/
        return redirect()->to('/students')->with('success', 'Student Deleted Successfully');
    }
}
