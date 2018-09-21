<form action="index.php" method="post" name="formy">
    <input type="hidden" name="visited" value="" />
    <div class="row">
          <div class="col-md-3">
              <div class="form-group">
                  <select class="custom-select" name="category" onchange="hidens3tab(), showns3tab()" required="required"><!-- onchange="openCategory(this)" -->
                    <option value="">Select Category</option>
                    <option <?php echo ((isset($_POST['category']) && $_POST['category'] == "shops_and") ? "selected" : "")?> value="shops_and">Shops And Establishment</option>
                    <option <?php echo ((isset($_POST['category']) && $_POST['category'] == "factory") ? "selected" : "")?> value="factory">Factory</option>
                    <option <?php echo ((isset($_POST['category']) && $_POST['category'] == "hotels_and") ? "selected" : "")?> value="hotels_and">Hotels And Restorant</option>
                    <option <?php echo ((isset($_POST['category']) && $_POST['category'] == "agriculture") ? "selected" : "")?> value="agriculture">Agriculture</option>
                  </select>
              </div>
            </div>
            <div class="col-md-3">
                 <div class="form-group">
                    <input type="text" name="date" class="form-control" value="<?php if(isset($_POST['date'])){echo $_POST['date'];} ?>" id="idate" placeholder="dd-mm-yyyy" required="required" autocomplete="off" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])-(0[1-9]|1[012])-[0-9]{4}" title="Date format is dd-mm-yyyy.">
                  </div>
            </div>

            <div class="col-md-3">
                  <button type="submit" name="btnsubmit" class="btn btn-primary" onclick="check_states()">Submit</button>
            </div>
    </div>

</form>