  <?php
  include('../includes/header.php');
  if (!(isset($_SESSION["logged"]) && $_SESSION["logged"] === true)) {
  ?>
    <script type="text/javascript">
      console.log('script');
    </script>
  <?php
  }

  $link = mysqli_connect("localhost", "root", "", "university_db");

  if (mysqli_connect_errno())
    exit("خطاي با شرح زير رخ داده است :" . mysqli_connect_error());
    $lessonid = $_POST['LessonId'];
    $studentid = $_POST['studentid'];
    $query = "INSERT INTO studentlesson_schema (StudentId , LessonId ) VALUES ('$studentid' , '$lessonid')";
    $result = mysqli_query($link, $query);
  if ($result) {
    header("Location: /university/student/panel.php");
  } else
    echo ("<p style='color:red;'><b></b></p>");
  mysqli_close($link);
  ?>