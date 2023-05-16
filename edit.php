<?php
include "db_conn.php";
$id = isset($_GET['id']) ? $_GET['id'] : null;
if (!is_numeric($id)) {
    // Handle invalid ID
}


if (isset($_POST["submit"])) {
  $full_name = $_POST['full_name'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $date = $_POST['date'];
  $message = $_POST['message'];
  $user_name = $_POST['user_name'];
  $status = $_POST['status'];
  $sql = "UPDATE `req_form` SET `full_name`='$full_name',`email`='$email',`mobile`='$mobile',`date`='$date', `message`='$message', `user_name`='$user_name', `status`='$status' WHERE id = $id";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: z_SA.php?msg=Data updated successfully");
  } else {
    echo "Failed: " . mysqli_error($conn);
  }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>edit appointment</title>
</head>

<body>

  <div class="container">
    <div class="text-center mb-4">
      <h3>Edit appointment<h3>
      <p class="text-muted">updated appointment</p>
    </div>

    <?php
    $sql = "SELECT * FROM `req_form` WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;" enctype="multipart/form-data">
        <div class="row mb-3">
          <div class="col">
		  
		   <label class="form-label">id:</label>
            <input type="id" class="form-control" name="id" value="<?php echo $row['id'] ?>">
          </div>
		  
            <label class="form-label">full_name:</label>
            <input type="full_name" class="form-control" name="full_name" value="<?php echo $row['full_name'] ?>">
          </div>

          <div class="col">
            <label class="form-label">email:</label>
            <input type="email" class="form-control" name="email" value="<?php echo $row['email'] ?>">
          </div>

          <div class="col">
            <label class="form-label">mobile:</label>
            <input type="text" class="form-control" name="mobile" value="<?php echo $row['mobile'] ?>">
          </div>

          <div class="col">
            <label class="form-label">date_today:</label>
            <input type="date_today" class="form-control" name="date" value="<?php echo $row['date'] ?>">
          </div>

          <div class="col">
            <label class="form-label">User Name:</label>
            <input type="user_name" class="form-control" name="user_name" value="<?php echo $row['username'] ?>">
          </div>

          <div class="col">
  <label class="form-label">Status:</label>
  <select class="form-select" name="status">
    <option value="pending" <?php if ($row['status'] == 'pending') echo 'selected'; ?>>Pending</option>
    <option value="cancelled" <?php if ($row['status'] == 'cancelled') echo 'selected'; ?>>Cancelled</option>
    <option value="approved" <?php if ($row['status'] == 'approved') echo 'selected'; ?>>Approved</option>
  </select>
</div>


        </div>

        <div class="mb-3">
          <label class="form-label">message:</label>
          <input type="message" class="form-control" name="message" value="<?php echo $row['message'] ?>">
        </div>
        <div>
          <button type="submit" id="update" class="btn btn-success" name="submit">Update</button>
          <script>
    document.getElementById("update").addEventListener("click", function() {
      window.open("appointment.php", "_blank");
    });
  </script>
          <button name="back" id= "back" type="submit" class="btn btn-primary rounded-0 btn-block">Back</button>
            <script>
    document.getElementById("back").addEventListener("click", function() {
      window.open("appointment.php", "_blank");
    });
  </script>        
  </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>