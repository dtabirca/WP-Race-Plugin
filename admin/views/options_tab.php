<form method="POST" action="<?php echo admin_url('admin.php'); ?>">
    <input type="hidden" name="action" value="rr_course_options" />

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Race Name</label>
        <div class="col-sm-10">
            <input type="text" name="race_name" value="<?php echo $data['race_name']; ?>"
            class="form-control col-sm-5" required>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Race Type</label> 
        <div class="form-inline col-sm-10">   
            <input type="radio" checked name="race_type" class="form-control">
            &nbsp;Real Race
            <input type="radio" name="race_type" class="form-control ml-2">
            &nbsp;Virtual Race (GPX upload)
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">&nbsp;</label> 
        <div class="form-inline col-sm-10"> 
            <input type="radio" checked name="team_event" value="0" class="form-control">
            &nbsp;Individual
            <input type="radio" name="team_event" value="1" class="form-control ml-2">
            &nbsp;Team
        </div>
    </div>    
    
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Start Type</label>
        <div class="form-inline col-sm-10">        
            <select name="race_distance_unit"
            value="<?php echo $data['race_options']['race_type_start']; ?>"
            class="form-control">
                <option value="mass">Mass</option>
                <option value="wave">Wave</option>
                <option value="team">Team</option>
                <option value="individual">Individual</option>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Distance</label>
        <div class="form-inline col-sm-10">
            <input type="text" name="race_distance"
            value="<?php echo $data['race_options']['distance']; ?>"
            class="form-control col-sm-1">&nbsp;
            <select name="race_distance_unit"
            value="<?php echo $data['race_options']['distance_unit']; ?>"
            class="form-control col-sm-1">
                <option value="km">km</option>
                <option value="mile">mile</option>
                <option value="m">m</option>
                <option value="yard">yard</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Registration limit</label>
        <div class="form-inline col-sm-10">
            <input type="text" name="participants_limit"
            value="<?php echo $data['race_options']['participants_limit']; ?>"
            class="form-control col-sm-1">&nbsp;participants 
        </div>            
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Age limits</label>
        <div class="form-inline col-sm-10">
            <input type="text" name="age_limits[]"
            value="<?php echo $data['race_options']['age_limits'][0]; ?>"
            class="form-control col-sm-1">
            &nbsp;-&nbsp;
            <input type="text" name="age_limits[]"
            value="<?php echo $data['race_options']['age_limits'][1]; ?>"
            class="form-control col-sm-1"> 
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Time limits</label>
        <div class="form-inline col-sm-10">
            <input type="text" name="time_limit"
            value="<?php echo $data['race_options']['time_limit']; ?>"
            class="form-control col-sm-1">
            &nbsp;minutes
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Categories</label>
        <div class="form-inline col-sm-10">
            <?php 
                include_once 'category_select.php';
            ?>
        </div>
    </div>

    <input type="submit" value="Save" class="btn btn-primary" />

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">TODO: Laps, Intermediary Checkpoints, Penalties ...</label>
        <div class="form-inline col-sm-10">
        </div>
    </div>

</form>   