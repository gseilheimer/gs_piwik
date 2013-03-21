<?php

/**
 * PIWIK
 *
 * @author gilbert.seilheimer[at]contic[dot]de Gilbert Seilheimer
 * @author <a href="http://www.contic.de">www.contic.de</a>
 *
 * @package redaxo4
 * @version svn:$Id$
 */
/**
 * piwik lib
 * @link https://github.com/piwik/piwik
 * @version 1.x
 */

// AddOn-PIWIK

   //////////////////////////////////////////////////////////////////////////////////
   // CONFIG
   //////////////////////////////////////////////////////////////////////////////////

   // VARs
   $page = "gs_piwik";
   $page_root = $REX['INCLUDE_PATH'].'/addons/'.$page.'/';

   // VARs - ADDON
   $REX['ADDON']['name'][$page]          = 'Piwik';
   $REX['ADDON']['rxid'][$page]          = '622';
   $REX['ADDON']['page'][$page]          = $page;
   $REX['ADDON']['version'][$page]       = '1.0.9';
   $REX['ADDON']['author'][$page]        = 'Gilbert Seilheimer';
   $REX['ADDON']['supportpage'][$page]   = 'forum.redaxo.org';
   $REX['ADDON']['perm'][$page]          = $page.'[]';
   $REX['PERM'][]                        = $page.'[]';


   if($REX['REDAXO'] && $REX['USER'])
   {
      //////////////////////////////////////////////////////////////////////////////////
      // SUBPAGES
      //////////////////////////////////////////////////////////////////////////////////

      // Sprachdateien anhaengen
      $I18N->appendFile($REX['INCLUDE_PATH'].'/addons/'.$page.'/lang/');

      $REX['ADDON'][$page]['SUBPAGES'] =
         //        subpage,    label,                                  perm,   params, attributes
         array(
             array('',           $I18N->msg($page.'_subpage_index'),      '',     '',     ''),
             array('readme',     $I18N->msg($page.'_subpage_readme'),     '',     '',     '')
         );

      //////////////////////////////////////////////////////////////////////////////////
      // INCLUDES
      //////////////////////////////////////////////////////////////////////////////////
      #require_once $addon_root.'.......inc.php';


      //////////////////////////////////////////////////////////////////////////////////
      // FUNCTIONS
      //////////////////////////////////////////////////////////////////////////////////

   }

?>