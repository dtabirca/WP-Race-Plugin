<form method="POST" action="<?php echo admin_url('admin.php'); ?>">
    <input type="hidden" name="action" value="rr_registered_competitors" />
    
    <table id="registered" class="display">
        <thead>
            <tr>
                <th>#</th>
                <th>Bib</th>
                <th>Name</th>
                <th>Age</th>
                <th>Category</th>
                <th>Validated</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data['race_competitors'] as $competitor) {
            echo '<tr>
                <td>' . $competitor->id . '</td>
                <td>' . $competitor->bib . '</td>
                <td>' . $competitor->name . '</td>
                <td>' . $competitor->age . '</td>
                <td>';
            if ($rrCategory = ageSexToCategory(
                    $competitor->age,
                    $competitor->sex,
                    $data['race_options']['categories']
                )
            ) {
                echo $runRaceCategories[$rrCategory];                
            } else {
                echo '<select name="_" class="form-control">';
                // in reverse, to show 
                foreach ($data['race_options']['categories'] as $roCateg) {
                    echo '<option value="' . $roCateg . '">' . $runRaceCategories[$roCateg] . '</option>';
                }
                echo '</select>';
            }
            echo '</td>
                <td>
                    <input name="status[]" type="checkbox" value="' . $competitor->bib . '"' . (((int)$competitor->status === 1) ? ' checked' : '') . '/>
                </td>
            </tr>';
            }
            ?>
        </tbody>
    </table>

    <input type="submit" value="Save" class="btn btn-primary" />

</form>  