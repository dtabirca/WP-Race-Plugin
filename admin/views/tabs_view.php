<div class="wrap">
    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>

    <div id="tabs">
        <ul>
            <li><a href="#tabs-1">Course Details</a></li>
            <li><a href="#tabs-2">Route & Profile</a></li>
            <li><a href="#tabs-3">Registered Competitors</a></li>
            <li><a href="#tabs-4">Results/Certificates</a></li>
            <li><a href="#tabs-5">Data Import/Export</a></li>
            <li><a href="#tabs-6">Shortcodes</a></li>
        </ul>
        <div id="tabs-1">
            <?php 
                include_once 'options_tab.php';
            ?>
        </div>
        <div id="tabs-2">
            <?php 
                include_once 'route_tab.php';
            ?>
        </div>        
        <div id="tabs-3">
            <?php 
                include_once 'competitors_tab.php';
            ?>            
        </div>
        <div id="tabs-4">
            <?php 
                include_once 'results_tab.php';
            ?>
        </div>            
        <div id="tabs-5">
            <?php 
                include_once 'data_tab.php';
            ?>
        </div>
        <div id="tabs-6">
            <?php 
                include_once 'shortcodes_tab.php';
            ?>
        </div>        
    </div>  
</div>