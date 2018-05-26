
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Start Time</th>
        <th scope="col">Stop Time</th>
        <th scope="col">Operator</th>
        <th scope="col">Job #</th>
        <th scope="col">Description</th>
        <th scope="col">Total Runtime</th>
        <th scope="col">&nbsp</th>
      </tr>
    </thead>
    <tbody>

      <?php foreach ($entries as $entry): ?>

        <tr>
        <td><?php echo $entry['start_time']; ?></td>
        <td><?php echo $entry['stop_time']; ?></td>
        <td><?php echo $entry['initials']; ?></td>
        <td><?php echo $entry['part_number']; ?></td>
        <td><?php echo $entry['description']; ?></td>
        <!-- <td><?php echo $entry['start_time']; ?></td>
        <td><?php echo $entry['stop_time']; ?></td> -->
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
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <?php
    $tdate = date("Y-m-d");
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=cnc_daily_time.xls");
    // delete_all_stop();
    // delete_all_start();
   ?>
