<!-- ADD -->
<div class="modal fade" id="add">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><span class="fa fa-plus"></span> New Course</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form method="POST" action="course_add.php">
        <div class="modal-body">
          <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" name="COURSE_NAME" required>
          </div>
          <div class="form-group">
            <label>Description</label>
            <input type="text" class="form-control" name="DESCRIPTION" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">
            <i class="fa fa-times"></i> Close
          </button>
          <button type="submit" class="btn btn-primary btn-sm" name="submit">
            <i class="fa fa-save"></i> Save
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- EDIT -->
<div class="modal fade" id="edit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><span class="fa fa-edit"></span> Edit Course</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form method="POST" action="course_edit.php">
        <div class="modal-body">
          <input type="hidden" class="id" name="id">
          <div class="form-group">
            <label>Title</label>
            <input type="text" id="edit_title" class="form-control" name="COURSE_NAME" required>
          </div>
          <div class="form-group">
            <label>Description</label>
            <input type="text" id="edit_description" class="form-control" name="DESCRIPTION" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">
            <i class="fa fa-times"></i> Close
          </button>
          <button type="submit" class="btn btn-primary btn-sm" name="submit">
            <i class="fa fa-save"></i> Update
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- DELETE -->
<div class="modal fade" id="delete">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><span class="fa fa-question-circle"></span> Delete Record?</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form method="POST" action="course_delete.php">
        <div class="modal-body">
          <input type="hidden" class="id" name="ID">
          <p>Course Title: <strong><span class="del_title"></span></strong></p>
          <p>Description: <strong><span class="del_description"></span></strong></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">
            <i class="fa fa-times"></i> Cancel
          </button>
          <button type="submit" class="btn btn-danger btn-sm" name="submit">
            <i class="fa fa-trash"></i> Delete
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
