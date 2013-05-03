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
   // UPDATE/INSERT (DB)
   //////////////////////////////////////////////////////////////////////////////////

   $sql_table = $REX['TABLE_PREFIX']."template";

   $sql = rex_sql::factory();
   $sql->debugsql = 0; //Ausgabe Query
   $sql->setQuery("SELECT * FROM $sql_table WHERE name LIKE '%gs : piwik (jquery)%'");
   $sql_id = $sql->getValue('id');
   $sql->setTable($sql_table);

   if( $sql->getRows() )
   {
      $sql->setWhere('id = '.intval($sql_id));
      $sql->setValue("content", "<!-- GS:PIWIK-START -->\r\n<script type=\"text/javascript\">\r\n   var pkBaseURL = ((\"https:\" == document.location.protocol) ? \"https://SRV.DOMAIN.TLD\" : \"http://SRV.DOMAIN.TLD/\");\r\n   document.write(unescape(\"%3Cscript src=\'\" + pkBaseURL + \"piwik.js\' type=\'text/javascript\'%3E%3C/script%3E\"));\r\n</script>\r\n\r\n<script type=\"text/javascript\">\r\n\r\nvar domain_website = window.location.hostname;\r\nvar id_website = PIWIK-ID; //Konstante oder automatisch fuer MultiDomain-Support\r\n\r\nif (domain_website == \"SRV.DOMAIN.TLD\") \r\n{\r\n   id_website = 1;\r\n}\r\nelse if (domain_website == \"SRV.DOMAIN.TLD\")\r\n {\r\n   id_website = 2;\r\n}\r\nelse if (domain_website == \"SRV.DOMAIN.TLD\") \r\n{\r\n   id_website = 3;\r\n}\r\n\r\ntry {\r\n   var piwikTracker = Piwik.getTracker(pkBaseURL + \"piwik.php\", id_website);\r\n   piwikTracker.trackPageView();\r\n   piwikTracker.enableLinkTracking();\r\n} \r\ncatch( err ) \r\n{\r\n}\r\n</script>\r\n<!-- GS:PIWIK-ENDE -->");
      $sql->update();

      if ( $sql->update() )
      {
         echo 'Zeile mit id '.intval($id).' erfolgreich aktuallisiert.';
      }
   }
   else
   {
      $sql->setValue("name", "gs : piwik (jquery)");
      $sql->setValue("content", "<!-- GS:PIWIK-START -->\r\n<script type=\"text/javascript\">\r\n   var pkBaseURL = ((\"https:\" == document.location.protocol) ? \"https://SRV.DOMAIN.TLD\" : \"http://SRV.DOMAIN.TLD/\");\r\n   document.write(unescape(\"%3Cscript src=\'\" + pkBaseURL + \"piwik.js\' type=\'text/javascript\'%3E%3C/script%3E\"));\r\n</script>\r\n\r\n<script type=\"text/javascript\">\r\n\r\nvar domain_website = window.location.hostname;\r\nvar id_website = PIWIK-ID; //Konstante oder automatisch fuer MultiDomain-Support\r\n\r\nif (domain_website == \"SRV.DOMAIN.TLD\") \r\n{\r\n   id_website = 1;\r\n}\r\nelse if (domain_website == \"SRV.DOMAIN.TLD\")\r\n {\r\n   id_website = 2;\r\n}\r\nelse if (domain_website == \"SRV.DOMAIN.TLD\") \r\n{\r\n   id_website = 3;\r\n}\r\n\r\ntry {\r\n   var piwikTracker = Piwik.getTracker(pkBaseURL + \"piwik.php\", id_website);\r\n   piwikTracker.trackPageView();\r\n   piwikTracker.enableLinkTracking();\r\n} \r\ncatch( err ) \r\n{\r\n}\r\n</script>\r\n<!-- GS:PIWIK-ENDE -->");
      $sql->insert();
      if ( $sql->insert() )
      {
         echo 'Zeile mit id '.intval($id).' erfolgreich eingetragen.';
      }
   }

   //////////////////////////////////////////////////////////////////////////////////
   // INSTALL
   //////////////////////////////////////////////////////////////////////////////////
   if ($page_check_status)
   {
      $REX['ADDON']['install'][$page] = TRUE;
   }

?>