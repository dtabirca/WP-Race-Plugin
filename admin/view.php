<?php
//
?>
<div class="wrap">
    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>

    <div id="tabs">
        <ul>
            <li><a href="#tabs-1">Course Options</a></li>
            <li><a href="#tabs-2">Registered Competitors</a></li>
            <li><a href="#tabs-3">Results/Certificates</a></li>
            <li><a href="#tabs-4">Data Import/Export</a></li>
        </ul>
        <div id="tabs-1">
            <form method="POST" action="<?php echo admin_url('admin.php'); ?>">
                <p>
                    <input type="hidden" name="action" value="rr_course_options" />
                    <ul>
                        <li>
                            <label>Race Name</label>
                            <input name="race_name" value="<?php echo $data['race_name']; ?>">
                        </li>
                        <li>
                            <label>Distance</label>
                            <input name="race_distance" value="<?php echo $data['race_options']['distance']; ?>"> km
                        </li>                        
                        <li>
                            <label>Registration limit</label>
                            <input name="participants_limit" value="<?php echo $data['race_options']['participants_limit']; ?>"> participants
                        </li>
                        <li>
                            <label>Race time limits/penalties</label>
                            <input name="time_limit" value="<?php echo $data['race_options']['time_limit']; ?>"> min
                        </li>
                        <li>
                            <label>Units settings</label>
                            <select name="units">
                                <option value="metric" <?php echo ($data['race_options']['units'] == 'metric') ? 'selected' : ''; ?>>metric</option>
                                <option value="imperial" <?php echo ($data['race_options']['units'] == 'imperial') ? 'selected' : ''; ?>>imperial</option>
                            </select>
                        </li>
                        <li>TODO...</li>  
                        <li>
                            <input type="radio" checked name="racetype"> <label>Real Race (Mass/Wave/Individual Start,...)</label><br>
                              <input type="radio" name="racetype"> <label>Virtual Race (GPX Validation, ...)</label>
                          </li>
                        <li>...</li>              
                        <li><input type="checkbox" name="team"> <label>Team Scoring</label></li>                      
                        <li>...</li>              

                        <li>Laps, Intermediary Checkpoint definition</li>
                        <li>...</li>            
                    </ul>
                    <input type="submit" value="Save" />
                </p>
            </form>    
        </div>
        <div id="tabs-2">
            <table id="registered" class="display">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Bib</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Sex</th>
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
            <td>' . $competitor->sex . '</td>
            <td>' . $competitor->status . '</td>
        </tr>';
}
?>
                </tbody>
            </table>
        </div>
        <div id="tabs-3">
            <table id="results" class="display">
                <thead>
                    <tr>
                        <th>Position</th>
                        <th>Bib</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Time</th>
                        <th>Certificate</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>101</td>
                        <td>Zgăbeață Iftode</td>
                        <td>40-49 men</td>
                        <td>02:55:10</td>
                        <td>link</td>                                                
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>102</td>
                        <td>John Doe</td>
                        <td>18-29 men</td>
                        <td>03:15:33</td>
                        <td>link</td>
                    </tr>
                </tbody>
            </table>
        </div>            
        <div id="tabs-4">
            <form method="POST" enctype="multipart/form-data" action="<?php echo admin_url('admin.php'); ?>">
                <input type="hidden" name="action" value="rr_import_competitors" />
                <ul>
                    <li>
                        <label>Import Competitors from csv/xls</label>
                        <input type="file" name="import_competitors" />
                    </li>
                    <li>
                        <input type="submit" value="Import" />
                        TODO preview and column matching
                    </li>
                    <li>Export Competitors as csv/xls/pdf</li>
                    <li>...</li>
                    <li>Import Results from csv/xls</li>
                    <li>...</li>
                    <li>Export Results as csv/xls/pdf</li>
                    <li>...</li>
                    <li>Connect external services through API (Live results).</li>
                    <li>...</li>                
                </ul>
            </form>
        </div>
    </div>  
</div>