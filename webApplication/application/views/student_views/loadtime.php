<!DOCTYPE html>
<html>
<?php
session_start();
echo "Timer: " . $_SESSION['Exam_timer'];
if ($_SESSION['Exam_timer'] > 0) $_SESSION['Exam_timer']--;

else if ($_SESSION['Exam_timer'] == 0) {


    // header("Location:" . URL . "test/submitExam");
   
    // require '../../controller/test.php';
    // $testcontroll = new test();
    // $testcontroll->submitExam();

    // echo "<script>window.location.href = \"<?php e
    $_SESSION['Exam_timer'] = -1;
}
?>

</html>