<?php
//---------- Find type of user from personalID
// 0 - student 1 - teacher 2 - staff 3 - undefined
function findUserType($id,$db) {
  $type=3;
  // 0 - student 1 - teacher 2 - staff 3 - undefined
  $type_list = array("student","teacher","staff");
  for($i=0;$i<3;$i++) {
     $count = "SELECT * FROM {$type_list[$i]} WHERE {$type_list[$i]}.personalID = $id";
     $result = mysqli_query($db, $count);
     if($result->num_rows >0) {
        $type = $i;
        break;
     }
  }
  return $type_list[$type];
}
?>
