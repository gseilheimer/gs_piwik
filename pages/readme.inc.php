<?php

// AddOn-PIWIK

   //////////////////////////////////////////////////////////////////////////////////
   // CONFIG
   //////////////////////////////////////////////////////////////////////////////////

   // GET PARAMS
   ////////////////////////////////////////////////////////////////////////////////
   $page 	   = rex_request('page', 'string');
   $subpage 	= rex_request('subpage', 'string');
   #$func    	= rex_request('func', 'string');
   #$oid     	= rex_request('oid', 'int');

   //////////////////////////////////////////////////////////////////////////////////
   // SUBPAGES
   //////////////////////////////////////////////////////////////////////////////////

?>

   <div class="rex-addon-output">
      <h2 class="rex-hl2"><?php echo $I18N->msg($page.'_subpage_readme_txt_01'); ?></h2>

      <div class="rex-addon-content">
         <p class="rex-code">
         <code><span style="color: #000000">
         <?php
            echo $I18N->msg($page.'_subpage_readme_txt_01_01') . "<br />";
         ?>
         </span></code>
         </p>
      </div>
   </div>

   <div class="rex-addon-output">
      <h2 class="rex-hl2"><?php echo $I18N->msg($page.'_subpage_readme_txt_02'); ?></h2>

      <div class="rex-addon-content">
         <p class="rex-code">
         <code><span style="color: #000000">
         <?php
            echo $I18N->msg($page.'_subpage_readme_txt_02_01') . "<br />";
            echo $I18N->msg($page.'_subpage_readme_txt_02_02') . "<br />";
            echo $I18N->msg($page.'_subpage_readme_txt_02_03') . "<br />";
            echo $I18N->msg($page.'_subpage_readme_txt_02_04') . "<br />";
            echo $I18N->msg($page.'_subpage_readme_txt_02_05') . "<br />";
         ?>
         </span></code>
         </p>
      </div>
   </div>

   <div class="rex-addon-output">
      <h2 class="rex-hl2"><?php echo $I18N->msg($page.'_subpage_readme_txt_03'); ?></h2>

      <div class="rex-addon-content">
         <p class="rex-code">
         <code><span style="color: #000000">
         <?php
            echo $I18N->msg($page.'_subpage_readme_txt_03_01') . "<br />";
            echo $I18N->msg($page.'_subpage_readme_txt_03_02') . "<br />";
            echo $I18N->msg($page.'_subpage_readme_txt_03_03') . "<br />";
            echo $I18N->msg($page.'_subpage_readme_txt_03_04') . "<br />";
         ?>
         </span></code>
         </p>
      </div>
   </div>

   <div class="rex-addon-output">
      <h2 class="rex-hl2"><?php echo $I18N->msg($page.'_subpage_readme_txt_04'); ?></h2>

      <div class="rex-addon-content">
         <p class="rex-code">
         <code><span style="color: #000000">
         <?php
            echo $I18N->msg($page.'_subpage_readme_txt_04_01') . "<br />";
         ?>
         </span></code>
         </p>
      </div>
   </div>

   <div class="rex-addon-output">
      <h2 class="rex-hl2"><?php echo $I18N->msg($page.'_subpage_readme_txt_05'); ?></h2>

      <div class="rex-addon-content">
         <p class="rex-code">
         <code><span style="color: #000000">
         <?php
         echo $I18N->msg($page.'_subpage_readme_txt_05_01') . "<br />";
         ?>
         </span></code>
         </p>
      </div>
   </div>

