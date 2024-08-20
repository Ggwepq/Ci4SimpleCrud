<?php
$this->extend('layout/main');
$this->section('body');
?>

<h1>Edit Student</h1>

<form action="students/update/<?= $students['id'] ?>" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="studentName" class="form-label">Student Name</label>
        <input type="text" class="form-control" name="studentName" value="<?= $students['student_name']; ?>">
    </div>
    <div class="mb-3">
        <label for="studentID" class="form-label">Student ID</label>
        <input type="text" class="form-control" name="studentID" value="<?= $students['student_id'] ?>" readonly>
    </div>
    <div class="mb-3">
        <label for="studentCourse" class="form-label">Student Course</label>
        <input type="text" class="form-control" name="studentCourse" value="<?= $students['student_course']; ?>">
    </div>
    <div class="mb-3">
        <label for="studentSection" class="form-label">Student Section</label>
        <input type="text" class="form-control" name="studentSection" value="<?= $students['student_section']; ?>">
    </div>
    <div class="mb-3">
        <label for="studentBatch" class="form-label">Student Batch</label>
        <input type="text" class="form-control" name="studentBatch" value="<?= $students['student_batch']; ?>">
    </div>
    <div class="mb-3">
        <label for="studentYear" class="form-label">Student Year</label>
        <input type="text" class="form-control" name="studentYear" value="<?= $students['student_year']; ?>">
    </div>
    <div class="mb-3">
        <label for="studentProfile" class="form-label">Student Profile</label>
        <input type="file" class="form-control" name="studentProfile">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="students/" class="btn btn-danger">Back</a>
</form>

<?php $this->endSection(); ?>
