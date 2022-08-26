<?php
include('../includes/header.php');
$link = mysqli_connect("localhost", "root", "", "university_db");
$studentid = $_SESSION["id"];
if (mysqli_connect_errno())
  exit("خطاي با شرح زير رخ داده است :" . mysqli_connect_error());
$studentid = $_SESSION["id"];
$query = "SELECT * FROM proffesorlesson_schema 
INNER JOIN lesson_schema ON proffesorlesson_schema.LessonId = lesson_schema.id
INNER JOIN professor_schema ON proffesorlesson_schema.ProffessorId = professor_schema.id";
$result = mysqli_query($link, $query);
?>
<div class="container">
  <div class="row mb-5 pb-5 mt-4">
    کلاس های ارایه شده برای دانشجو
  </div>
  <form action="../actions/getLesson.php" method="post" name="login">
    <div class="row">
      <?php
      for ($i = 0; $row = mysqli_fetch_array($result); $i += 1) {
      ?>
        <div class="col-3">
          <div class="shadow p-3 mb-5 bg-body rounded">
            <img class="class__image" src="../public/images/classGetLesson.jpg" />
            <p>نام درس: <?php echo ($row["Name"]) ?></p>
            <p>ایدی درس: <?php echo ($row["LessonId"]) ?></p>
            <p>ایدی دانشجو: <?php echo ($studentid) ?></p>
            <p>نام استاد ارایه دهنده: <?php echo ($row["ProffesorName"]) ?></p>
            <input type="hidden" name="LessonId" value="<?php echo $row["LessonId"]; ?>">
            <input type="hidden" name="studentid" value="<?php echo $studentid; ?>">
            <button type="submit" class="btn btn-primary">اخذ درس</button>
          </div>
        </div>
      <?php
      }
      ?>
    </div>
  </form>
</div>

<?php
include('../includes/footer.php');
?>