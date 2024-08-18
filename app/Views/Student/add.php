<?php
$this->extend('layout/main');
$this->section('body');
?>

<h1>Add Students</h1>
<div class="mb-3">
    <label for="studentName" class="form-label">Student Name</label>
    <input type="text" class="form-control" id="studentName">
</div>
<div class="mb-3">
    <label for="studentID" class="form-label">Student ID</label>
    <input type="text" class="form-control" id="studentID">
</div>
<div class="mb-3">
    <label for="studentCourse" class="form-label">Student Course</label>
    <input type="text" class="form-control" id="studentCourse">
</div>
<div class="mb-3">
    <label for="studentSection" class="form-label">Student Section</label>
    <input type="text" class="form-control" id="studentSection">
</div>
<div class="mb-3">
    <label for="studentBatch" class="form-label">Student Batch</label>
    <input type="text" class="form-control" id="studentBatch">
</div>
<div class="mb-3">
    <label for="studentYear" class="form-label">Student Year</label>
    <input type="text" class="form-control" id="studentYear">
</div>
<div class="mb-3">
    <label for="studentProfile" class="form-label">Student Profile</label>
    <input type="file" class="form-control" id="studentProfile">
</div>
<button type="submit" class="btn btn-primary">Submit</button>

<?php $this->endSection(); ?>
