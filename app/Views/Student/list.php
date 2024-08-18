<?php
$this->extend('layout/main');
$this->section('body');
?>

<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
            <use xlink:href="#check-circle-fill" />
        </svg>
        <div>
            <?= session()->getFlashKeys('success') ?>
        </div>
    </div>
<?php endif; ?>


<h1>Student List</h1>
<a href="students/create" class="btn btn-primary">Add Student</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Student Name</th>
            <th scope="col">Student Number</th>
            <th scope="col">Student Course</th>
            <th scope="col">Student Section</th>
            <th scope="col">Student Batch</th>
            <th scope="col">Student Year</th>
            <th scope="col">Student Profile</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($students as $student): ?>
            <?php if ($student['is_deleted'] == 0): ?>
                <tr>
                    <th scope="row"><?= $student['id'] ?></th>
                    <td><?= $student['student_name'] ?></td>
                    <td><?= $student['student_id'] ?></td>
                    <td><?= $student['student_course'] ?></td>
                    <td><?= $student['student_section'] ?></td>
                    <td><?= $student['student_batch'] ?></td>
                    <td><?= $student['student_year'] ?></td>
                    <td><?= $student['student_year'] ?></td>
                    <td><img src="upload/<?= $student['student_profile'] ?>" alt="<?= $student['student_profile'] ?>" width="100" /> </td>
                    <td>
                        <a href="students/edit/<?= $student['id'] ?>" class="btn btn-primary">Edit</a>
                        <a href="students/delete/<?= $student['id'] ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
    </tbody>
</table>

<?php $this->endSection(); ?>
