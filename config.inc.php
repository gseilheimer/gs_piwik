<?php

/**
 * gs_piwik
 * @author gilbert.seilheimer[at]contic[dot]de Gilbert Seilheimer
 * @author <a href="http://www.contic.de">www.contic.de</a>
 *
 * @package redaxo4
 * @version svn:$Id$
 */
/**
 * piwik lib
 * @link https://github.com/piwik/piwik
 * @version 2.x
 */

// AddOn-PIWIK

    //////////////////////////////////////////////////////////////////////////////////
    // CONFIG
    //////////////////////////////////////////////////////////////////////////////////

    // VARs
    $mypage = "gs_piwik";
    $mypage_root = $REX['INCLUDE_PATH'] . '/addons/' . $mypage . '/';

    // VARs - ADDON
    $REX['ADDON']['name'][$mypage] = 'Piwik';
    $REX['ADDON']['rxid'][$mypage] = '622';
    $REX['ADDON']['page'][$mypage] = $mypage;
    $REX['ADDON']['version'][$mypage] = '2.0.0';
    $REX['ADDON']['author'][$mypage] = 'Gilbert Seilheimer';
    $REX['ADDON']['supportpage'][$mypage] = 'forum.redaxo.org';
    $REX['ADDON']['perm'][$mypage] = $mypage . '[]';
    $REX['PERM'][] = $mypage . '[]';


    if ($REX['REDAXO'] && $REX['USER']) {

        //////////////////////////////////////////////////////////////////////////////////
        // INCLUDES
        //////////////////////////////////////////////////////////////////////////////////

        #require_once($mypage_root .'/classes/class.rex_gs_piwik_utils.inc.php');


        //////////////////////////////////////////////////////////////////////////////////
        // FUNCTIONS
        //////////////////////////////////////////////////////////////////////////////////

        /*
        // default settings (user settings are saved in data dir!)
        $REX['ADDON'][$mypage]['settings'] = array(
            'foo' => 'bar',
            'foo2' => true,
        );

        // overwrite default settings with user settings
        rex_gs_piwik_utils::includeSettingsFile();
        */

        //////////////////////////////////////////////////////////////////////////////////
        // SUBPAGES
        //////////////////////////////////////////////////////////////////////////////////

        // Sprachdateien anhaengen
        $I18N->appendFile($REX['INCLUDE_PATH'] . '/addons/' . $mypage . '/lang/');

        // add subpages
        $REX['ADDON'][$mypage]['SUBPAGES'] =
            //        subpage, label, perm, params, attributes
            array(
                array('', $I18N->msg($mypage . '_subpage_index'), '', '', ''),
                array('readme', $I18N->msg($mypage . '_subpage_readme'), '', '', ''),
                array('settings', $I18N->msg($mypage . '_subpage_settings'), '', '', '')
            );

    }