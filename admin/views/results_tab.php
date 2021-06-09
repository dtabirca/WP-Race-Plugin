<table id="results" class="display">
    <thead>
        <tr>
            <th>Position</th>
            <th>Bib</th>
            <th>Name</th>
            <th>Category</th>
            <th>Time</th>
            <th>Pace/Speed</th>
            <th>Certificate</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($data['race_results'] as $position => $competitor) {
        echo '<tr>
            <td>' . ($position + 1) . '</td>
            <td>' . $competitor->bib . '</td>
            <td>' . $competitor->name . '</td>
            <td>' . (!empty($competitor->category) ? $runRaceCategories[$competitor->category] : '-') . '</td>
            <td>' . $competitor->time . '</td>
            <td>' . time2pace($competitor->time, $data['race_options']['distance']) . ' / ' .
                    time2speed($competitor->time, $data['race_options']['distance']) . '</td>
            <td>-</td>
        </tr>';
        }
        ?>
    </tbody>
</table>