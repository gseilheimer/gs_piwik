<?php

/**
 * gs_piwik
 * @author gilbert.seilheimer[at]contic[dot]de Gilbert Seilheimer
 * @author <a href="http://www.contic.de">www.contic.de</a>
 */

// AddOn-PIWIK

   //////////////////////////////////////////////////////////////////////////////////
   // CONFIG
   //////////////////////////////////////////////////////////////////////////////////

   // VARs
   $mypage = "gs_piwik";

   // MSG
   $msg = '';

   //////////////////////////////////////////////////////////////////////////////////
   // CHECKS
   //////////////////////////////////////////////////////////////////////////////////

   if ($REX['VERSION'] != '4' || $REX['SUBVERSION'] < '6') {
      $msg = $I18N->msg('install_redaxo_version_problem', '4.6');

   } elseif (version_compare(PHP_VERSION, '5.5.0', '<')) {
      $msg = $I18N->msg('install_checkphpversion', PHP_VERSION);

   }


   //////////////////////////////////////////////////////////////////////////////////
   // INSTALL
   //////////////////////////////////////////////////////////////////////////////////

   if ($msg != '') {
      $REX['ADDON']['installmsg'][$mypage] = $msg;

   } else {

      //////////////////////////////////////////////////////////////////////////////////
      // UPDATE/INSERT (DB)
      //////////////////////////////////////////////////////////////////////////////////

      $sql = rex_sql::factory();

      $sql->debugsql = 0; //Ausgabe Query

      $sql_table = $REX['TABLE_PREFIX']."template";

      $sql->setQuery("SELECT * FROM $sql_table WHERE name LIKE '%tpl : addon gs_piwik (js)%'");
      $sql->setTable($sql_table);

      if( $sql->getRows() != 0 )
      {
         $sql_id = $sql->getValue('id');
         $sql->setWhere('id = '.$sql_id);
         $sql->setValue("content", "<!-- GS:PIWIK-START -->\r\n<script>\r\n   var pkBaseURL = ((\"https:\" == document.location.protocol) ? \"https://SRV.DOMAIN.TLD\" : \"http://SRV.DOMAIN.TLD/\");\r\n   document.write(unescape(\"%3Cscript src=\'\" + pkBaseURL + \"piwik.js\' type=\'text/javascript\'%3E%3C/script%3E\"));\r\n</script>\r\n\r\n<script>\r\n   var domain_website = window.location.hostname;\r\n   var id_website = PIWIK-ID; //Konstante für MultiDomain-Support\r\n\r\nif (domain_website == \"SRV.DOMAIN.TLD\") {\r\n   id_website = 1;\r\n}\r\nelse if (domain_website == \"SRV.DOMAIN.TLD\") {\r\n   id_website = 2;\r\n}\r\nelse if (domain_website == \"SRV.DOMAIN.TLD\") {\r\n   id_website = 3;\r\n}\r\n\r\ntry {\r\n   var piwikTracker = Piwik.getTracker(pkBaseURL + \"piwik.php\", id_website);\r\n   piwikTracker.trackPageView();\r\n   piwikTracker.enableLinkTracking();\r\n} \r\ncatch( err ) {\r\n}\r\n</script>\r\n<!-- GS:PIWIK-ENDE -->");

         if ( $sql->update() )
         {
            echo rex_info("Template mit ID : $sql_id erfolgreich aktuallisiert. <br />");
         }
      }
      else
      {
         $sql->setValue("name", "tpl : addon gs_piwik (js)");
         $sql->setValue("content", "<!-- GS:PIWIK-START -->\r\n<script>\r\n   var pkBaseURL = ((\"https:\" == document.location.protocol) ? \"https://SRV.DOMAIN.TLD\" : \"http://SRV.DOMAIN.TLD/\");\r\n   document.write(unescape(\"%3Cscript src=\'\" + pkBaseURL + \"piwik.js\' type=\'text/javascript\'%3E%3C/script%3E\"));\r\n</script>\r\n\r\n<script>\r\n   var domain_website = window.location.hostname;\r\n   var id_website = PIWIK-ID; //Konstante für MultiDomain-Support\r\n\r\nif (domain_website == \"SRV.DOMAIN.TLD\") {\r\n   id_website = 1;\r\n}\r\nelse if (domain_website == \"SRV.DOMAIN.TLD\") {\r\n   id_website = 2;\r\n}\r\nelse if (domain_website == \"SRV.DOMAIN.TLD\") {\r\n   id_website = 3;\r\n}\r\n\r\ntry {\r\n   var piwikTracker = Piwik.getTracker(pkBaseURL + \"piwik.php\", id_website);\r\n   piwikTracker.trackPageView();\r\n   piwikTracker.enableLinkTracking();\r\n} \r\ncatch( err ) {\r\n}\r\n</script>\r\n<!-- GS:PIWIK-ENDE -->");

         if ( $sql->insert() )
         {
            echo rex_info("Template 'tpl : addon gs_piwik (js)' erfolgreich eingetragen. <br />");
         }
      }


      //////////////////////////////////////////////////////////////////////////////////
      // INSTALL - FINISHING
      //////////////////////////////////////////////////////////////////////////////////

      if ( $sql->hasError() ) {
         $msg = 'MySQL-Error: ' . $sql->getErrno() . '<br />';
         $msg .= $sql->getError();

         $REX['ADDON']['install'][$mypage] = FALSE;
         $REX['ADDON']['installmsg'][$mypage] = $msg;

      } else {
         $REX['ADDON']['install'][$mypage] = TRUE;

      }

   }

