<?php include('header.php'); ?>
<div class="card text-black bg-secondary mb-3" style=" margin-top: 40px; max-width: 40rem;">
  <div class="card-header"><?php echo $title ?></div>
  <div class="card-body">
    <div class="" align="left">
      <form  class="" action="." method="post">
        <div class="form-group">
          <label class="col-form-label" for="inputDefault">Operater Initials <?php if (!empty($msg)) {echo "<span class='badge badge-pill badge-success'>".$msg."</span>";} ?></label>
          <input autofocus type="text" name="initials" class="form-control" value="<?php echo htmlspecialchars($_SESSION['initials']); ?>" placeholder="Enter your Initials" id="inputDefault">
        </div>

<!-- Diplay Chris Craft Form -->
      <?php if ($action == 'chris_craft'): ?>
        <input type="hidden" name="action" value="chris_craft">
        <?php foreach ($models as $model): ?>
          <input type="hidden" name="desc" value="<?php echo htmlspecialchars($model['description']); ?>">
        <?php endforeach; ?>
        <div class="form-group">
          <label class="col-form-label" for="inputDefault">Chris Craft Part# and Description</label>
          <select name="part" class="custom-select">
            <option value="|">Open this select menu</option>
            <?php foreach ($models as $model): ?>
              <option value="<?php echo $model['part_number']."|".$model['description']; ?>"><?php echo htmlspecialchars($model['part_number']." ".$model['description']); ?></option>
            <?php endforeach; ?>
          </select>
        </div>

<!-- Display the custom form -->
      <?php else: ?>
            <input type="hidden" name="action" value="custom">
            <div class="form-group">
              <label class="col-form-label" for="inputDefault">WO# | SO#</label>
              <input type="text" name="part_number" class="form-control" value="<?php echo htmlspecialchars($_SESSION['part_number']); ?>" placeholder="Enter the WO# or SO#" id="inputDefault">
            </div>

            <div class="form-group">
              <label class="col-form-label" for="inputDefault">Description</label>
              <input type="text" name="description" class="form-control" value="<?php echo htmlspecialchars($_SESSION['description']); ?>" placeholder="Template, Esthec, Bullsose, etc." id="inputDefault">
            </div>
      <?php endif; ?>
          <button <?php if ($_SESSION['toggle'] == 'Timer Running'){echo "autofocus";}?> type="submit" name="submit" class="btn btn-primary"><?php if($_SESSION['toggle'] == 'Timer Running'){echo 'Stop';} else {echo 'Start';}?></button>
      </form>
      <br>
    </div>

    <br>

    <?php if (!empty($_SESSION['toggle'])): ?>
      <div class="alert alert-dismissible <?php if($_SESSION['toggle'] == 'Timer Running'){echo "alert-success";}else{echo "alert-danger";} ?>">
        <button  type="button" class="close" data-dismiss="alert">&times;</button>
        <strong><?php echo $_SESSION['toggle']; ?></strong><?php if ($_SESSION['toggle'] == 'Timer Running'): ?>
                <img style="width:20px" src="images/lg.discuss-ellipsis-preloader.gif" alt="">
                <?php endif; ?></a>
      </div>
    <?php endif; ?>


  </div>
</div>



<?php include('footer.php'); ?>
