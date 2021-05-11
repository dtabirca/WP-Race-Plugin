<?php 

?>
<div class="wrap">
	<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

	<div id="tabs">
		<ul>
			<li><a href="#tabs-1">Course Options</a></li>
			<li><a href="#tabs-2">Registered Competitors</a></li>
			<li><a href="#tabs-3">Results/Certificates</a></li>
			<li><a href="#tabs-4">Data Import/Export</a></li>
		</ul>
		<div id="tabs-1">
		    <p>
		    	<ul>
		    		<li>
		    			<input type="radio" checked name="racetype"> <label>Real Race (Mass/Wave/Individual Start,...)</label><br>
		  				<input type="radio" name="racetype"> <label>Virtual Race (GPX Validation, ...)</label>
		  			</li>
		    		<li>...</li>  			
		    		<li><input type="checkbox" name="team"> <label>Team Scoring</label></li>		  			
		    		<li>...</li>  			
		    		<li>Registration (requirements, limits)</li>
		    		<li>...</li>
		    		<li>Race time limits/penalties</li>
		    		<li>...</li>    		
		    		<li>Laps, Intermediary Checkpoint definition</li>
		    		<li>...</li>    		
		    		<li>Units settings</li>
		    		<li>...</li>
		    	</ul>
		    </p>
		</div>
		<div id="tabs-2">
			<table id="registered" class="display">
			    <thead>
			        <tr>
			            <th>#</th>
			            <th>Bib</th>
			            <th>Name</th>
			            <th>Category</th>
			            <th>Validated</th>
			        </tr>
			    </thead>
			    <tbody>
			        <tr>
			            <td>1</td>
			            <td>101</td>
			            <td>Zgăbeață Iftode</td>
			            <td>40-49 men</td>
			            <td>yes</td>			            			            
			        </tr>
			        <tr>
			            <td>2</td>
			            <td>102</td>
			            <td>John Doe</td>
			            <td>18-29 men</td>
			            <td>yes</td>
			        </tr>
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
			<ul>
		    	<li>Import Competitors from csv/xls</li>
		    	<li>...</li>
		    	<li>Export Competitors as csv/xls/pdf</li>
		    	<li>...</li>
		    	<li>Import Results from csv/xls</li>
		    	<li>...</li>
		    	<li>Export Results as csv/xls/pdf</li>
		    	<li>...</li>
		    	<li>Connect external services through API (Live results).</li>
		    	<li>...</li>		    	
		    </ul>
		</div>
	</div>  
</div>