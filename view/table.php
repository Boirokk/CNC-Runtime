<?php include('header.php');?>

<br>
 <form class="no-mobile" action="." method="post">
  <input id="response" type="hidden" name="action" value="">
  <input onclick="myFunction()" class="btn btn-lg btn-success btn-block" type="submit" name="export_excel" value="Export to Excel">
 </form>
 <br>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Operator</th>
      <th scope="col">Job #</th>
      <th scope="col">Description</th>
      <th scope="col">Total Runtime</th>
      <th scope="col">&nbsp</th>
    </tr>
  </thead>
  <tbody>
    <?php $array_start = array();
           $array_stop = array();
     ?>
    <?php foreach ($entries as $entry): ?>
      <?php array_push($array_start, $entry['start_time']);
        array_push($array_stop, $entry['stop_time']);
       ?>
      <tr>
      <td><?php echo htmlspecialchars($entry['initials']); ?></td>
      <td><?php echo htmlspecialchars($entry['part_number']); ?></td>
      <td><?php echo htmlspecialchars($entry['description']); ?></td>
      <td>
        <?php
          $id = $entry['start_id'];
          $time = get_row($id);
          $datetime1 = new DateTime($time['stop_time']);
          $datetime2 = new DateTime($time['start_time']);
          $interval = $datetime1->diff($datetime2);
          echo $interval->format('%H:%I:%S');
         ?>
      </td>
      <td>
        <form class="" action="." method="post">
          <input type="hidden" name="action" value="delete_entry">
          <input type="hidden" name="delete_entry" value="<?php echo htmlspecialchars($entry['start_id']); ?>">
          <input class="btn btn-sm btn-danger" type="submit" name="" value="Delete">
        </form>
      </td>

      </tr>

    <?php endforeach; ?>
  </tbody>
</table>
<?php
  $datetime1 = new DateTime(end($array_stop));
  $datetime2 = new DateTime(current($array_start));
  $interval_total = $datetime1->diff($datetime2);

  echo 'Total Operating Time: <br />'.$interval_total->format('%H:%I:%S');
  echo "<br /> <br />This app is brought to you by, Chad Czilli. &copy 2018";
 ?>
 <script>
 function myFunction() {
     var txt = document.getElementById('response');
     var r = confirm("This will erase the current data.\nDo you wish to proceed?\nThis cannot be undone!");
     if (r == true) {
         txt.value = "excel";
     } else {
         txt.value = "table";
     }
     document.getElementById("demo").innerHTML = txt;
 }
 </script>
<?php include('footer.php') ?>
