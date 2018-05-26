<?php include('header.php'); ?>
<div class="card text-white bg-success mb-3" style="margin-top: 40px; max-width: 40rem;">
  <div class="card-header"><?php echo $title; ?></div>
  <div class="card-body">
    <div class="" align="left">
      <form class="" action="." method="post">
        <input type="hidden" name="action" value="add">
        <div class="form-group">
          <label class="col-form-label" for="inputDefault">Part #</label>
          <input autofocus type="text" name="part_number" class="form-control" placeholder="Example: 016-1234" id="inputDefault">
        </div>

        <div class="form-group">
          <label class="col-form-label" for="inputDefault">Description</label>
          <input type="text" name="description" class="form-control" placeholder="model#, area, material, etc." id="inputDefault">
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
      </form>
      <br>
      <?php if (!empty($msg)): ?>
        <div class="alert alert-dismissible alert-warning">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <h4 class="alert-heading"><?php echo $msg; ?></h4>
          <p class="mb-0">has been added to your inventory.</p>
        </div>
      <?php endif; ?>

    </div><!-- close box1 -->

    <div class="box1 bg-warning" align="left">
      <form class="" action="." method="post">
        <input type="hidden" name="action" value="delete">
        <div class="form-group">
          <label class="col-form-label" for="inputDefault">Chris Craft Part# and Description</label>
          <select name="ID" class="custom-select">
            <option selected="">Open this select menu</option>
            <?php foreach ($models as $model): ?>
              <option value="<?php echo $model['ID']; ?>"><?php echo $model['part_number']." ".$model['description']; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <button type="submit" class="btn btn-danger">Delete</button>
      </form>
      <br>
      <?php if (!empty($msg_deleted)): ?>
        <div class="alert alert-dismissible alert-danger">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <h4 class="alert-heading"><?php echo $msg_deleted; ?></h4>
        </div>
      <?php endif; ?>
    </div><!-- close box1 -->
  </div>

<?php include('footer.php'); ?>
