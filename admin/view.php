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
		    			<input type="radio" checked name="racetype"> <label>Real Race (Normal/Wave Start,...)</label><br>
		  				<input type="radio" name="racetype"> <label>Virtual Race (GPX Validation, ...)</label>
		  			</li>
		    		<li>...</li>  			
		    		<li>Registration (requirements, limits)</li>
		    		<li>...</li>
		    		<li>Race time limits</li>
		    		<li>...</li>    		
		    		<li>Checkpoint definition</li>
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
			            <td>40-49</td>
			            <td>yes</td>			            			            
			        </tr>
			        <tr>
			            <td>2</td>
			            <td>102</td>
			            <td>John Doe</td>
			            <td>18-29</td>
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
			            <th>Certificate</th>
			        </tr>
			    </thead>
			    <tbody>
			        <tr>
			            <td>1</td>
			            <td>101</td>
			            <td>Zgăbeață Iftode</td>
			            <td>40-49</td>
			            <td>link</td>			            			            
			        </tr>
			        <tr>
			            <td>2</td>
			            <td>102</td>
			            <td>John Doe</td>
			            <td>18-29</td>
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
		    	<li>Connect external services through API.</li>
		    	<li>...</li>		    	
		    </ul>
		</div>
	</div>  
</div>