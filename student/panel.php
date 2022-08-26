<?php
include("../includes/header.php");
$link = mysqli_connect("localhost", "root", "", "university_db");

if (mysqli_connect_errno())
  exit("خطاي با شرح زير رخ داده است :" . mysqli_connect_error());
$studentid = $_SESSION["id"];
$query = "SELECT * FROM studentlesson_schema INNER JOIN 
lesson_schema ON studentlesson_schema.LessonId = lesson_schema.id
INNER JOIN student_schema ON studentlesson_schema.StudentId = student_schema.id 
WHERE StudentId = '$studentid'";
$result = mysqli_query($link, $query);
?>

<div class="container">
  <div class="row mb-5 pb-5 mt-4">
    کلاس های شما
  </div>
  <div class="row">
    <?php
    for ($i = 0; $row = mysqli_fetch_array($result) ; $i += 1) {
    ?>
      <div class="col-3">
        <div class="shadow p-3 mb-5 bg-body rounded">
          <img class="class__image" src="../public/images/class.jfif" />
          <p>نام درس: <?php echo($row["Name"]) ?></p>
          <p>نام دانشجو: <?php echo($row["StudentName"]) ?></p>
        </div>
      </div>
    <?php
    }
    ?>
  </div>
</div>

<?php

include("../includes/footer.php")
?>