<form method="POST" enctype="multipart/form-data" action="<?php echo admin_url('admin.php'); ?>">
    <input type="hidden" name="action" value="rr_import_competitors" />
    <div class="form-group">
        <div class="custom-file col-sm-5">
            <label class="custom-file-label">Import Competitors</label>
            <input type="file" class="custom-file-input" name="import_competitors">
        </div>
        <input type="submit" value="Go!" class="btn btn-primary" />
    </div>
</form>

<form method="POST" enctype="multipart/form-data" action="<?php echo admin_url('admin.php'); ?>">
    <input type="hidden" name="action" value="rr_import_results" />
    <div class="form-group">
        <div class="custom-file col-sm-5">
            <label class="custom-file-label">Import Results</label>
            <input type="file" class="custom-file-input" name="import_results">
        </div>
        <input type="submit" value="Go!" class="btn btn-primary" />
    </div>
</form>

<form method="POST" enctype="multipart/form-data" action="<?php echo admin_url('admin.php'); ?>">
    <input type="hidden" name="action" value="rr_export_competitors" />
    <div class="form-group">
        <input type="submit" value="Export Competitors" class="btn btn-primary" />
    </div>
</form>

<form method="POST" enctype="multipart/form-data" action="<?php echo admin_url('admin.php'); ?>">
    <input type="hidden" name="action" value="rr_export_results" />
    <div class="form-group">
        <input type="submit" value="Export Results" class="btn btn-primary" />
    </div>
</form>

<small>TODO:
- preview and column matching.
- Connect external services through API (Live results).
</small>