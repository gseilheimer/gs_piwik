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

   // Installationsbedingungen pruefen
   $page_check_rex = '4.5';
   $page_check_php = 5;
   #$page_check_addons = array('');
   $page_check_status = true;

   //////////////////////////////////////////////////////////////////////////////////
   // CHECKS
   //////////////////////////////////////////////////////////////////////////////////

   // REX VERSION
   $page_check_rex = $REX['VERSION'].'.'.$REX['SUBVERSION'].'.'.$REX['MINORVERSION'] = "1";
   if(version_compare($page_check_rex, $page_check_rex, '<'))
   {
      $REX['ADDON']['installmsg'][$page] = 'Dieses Addon ben&ouml;tigt Redaxo Version '.$page_check_rex.' oder h&ouml;her.';
      $REX['ADDON']['install'][$page] = 0;
      $page_check_status = false;
   }

   // PHP VERSION
   if (intval(PHP_VERSION) < $page_check_php)
   {
      $REX['ADDON']['installmsg'][$page] = 'Dieses Addon ben&ouml;tigt mind. PHP '.$page_check_php.'!';
      $REX['ADDON']['install'][$page] = 0;
      $page_check_status = false;
   }

   // CHECK ADDONS
   /*
   foreach($page_check_addons as $a)
   {
      if (!OOAddon::isInstalled($a))
      {
         $REX['ADDON']['installmsg'][$page] = '<br />Addon "'.$a.'" ist nicht installiert.  >>> <a href="index.php?page=addon&addonname='.$a.'&install=1">jetzt installieren</a> <<<';
         $page_check_status = false;
      }
      else
      {
         if (!OOAddon::isAvailable($a))
         {
            $REX['ADDON']['installmsg'][$page] = '<br />Addon "'.$a.'" ist nicht aktiviert.  >>> <a href="index.php?page=addon&addonname='.$a.'&activate=1">jetzt aktivieren</a> <<<';
            $page_check_status = false;
         }
      }
   }
   */

   //////////////////////////////////////////////////////////////////////////////////
   // DUMP
   //////////////////////////////////////////////////////////////////////////////////

   # $uninstall = dirname(__FILE__) . '/uninstall.sql';
   # rex_install_dump($uninstall);

   //////////////////////////////////////////////////////////////////////////////////
   // INSTALL
   //////////////////////////////////////////////////////////////////////////////////
   if ($page_check_status)
   {
      $REX['ADDON']['install'][$page] = TRUE;
   }

?>