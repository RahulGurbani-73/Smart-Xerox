<?php

include "conn.php";


$token = intval($_GET['token']);

try {
  
  $result = mysqli_query($conn, "DELETE FROM upload WHERE token=$token") or die(mysqli_error($conn));
} catch (Exception $e) {
  
  echo 'Caught exception: ', $e->getMessage();
}


?>
<script type="text/javascript">
  window.location = "admin.php";
</script>