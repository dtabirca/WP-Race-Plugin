<?php
    $runRaceCategories = array(
        'm_19-99' => 'Men Open',
        'w_19-99' => 'Women Open',
        'm_19-29' => 'Men 19-29',
        'w_19-29' => 'Women 19-29',
        'm_30-39' => 'Men 30-39',
        'w_30-39' => 'Women 30-39',
        'm_40-49' => 'Men 40-49',
        'w_40-49' => 'Women 40-49',
        'm_50-59' => 'Men 50-59',
        'w_50-59' => 'Women 50-59',
        'm_60-69' => 'Men 60-69',
        'w_60-69' => 'Women 60-69',
        'm_70-79' => 'Men 70-79',
        'w_70-79' => 'Women 70-79',
        'm_80-99' => 'Men 80+',
        'w_80-99' => 'Women 80+',
        'k_1-6' => 'Kids under 6',
        'k_7-8' => 'Kids 7-8',
        'k_9-10' => 'Kids 9-10',
        'k_11-13' => 'Kids 11-13',
        'j_14-15' => 'Juniors 14-15',
        'j_16-17' => 'Juniors 16-17',
        'j_18-19' => 'Juniors 18-19',
        's_20-39' => 'Seniors 20-39',
        'v_40-99' => 'Veterans 40+',
        'p_19-99' => 'Professional',
        'sc_1-99' => 'Special Category',
    );
?>
<select name="race_categories[]" multiple size="10" class="form-control col-sm-3">
<?php 
    foreach ($runRaceCategories as $rrCategVal => $rrCategTxt) {
        echo '<option value="' . $rrCategVal . '"' .
            (in_array($rrCategVal, $data['race_options']['categories']) ? 'selected' : '') .
            '>' . $rrCategTxt . '</option>';
    }
?>
</select>
