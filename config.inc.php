<?php

 /** 
 * PIWIK
 *
 * @author gilbert.seilheimer@contic.de
 *
 * @package redaxo4
 * @version svn:$Id$
 */

// AddOn-PIWK

	//////////////////////////////////////////////////////////////////////////////////
	// CONFIG
	//////////////////////////////////////////////////////////////////////////////////

	// VARs
	$addon_name = "gs_piwik";

	// Sprachdateien anhaengen
	if(TRUE == $REX['REDAXO'])
	{
		$I18N->appendFile($REX['INCLUDE_PATH'].'/addons/'.$addon_name.'/lang/');
	}
			
	$REX['ADDON']['rxid'][$addon_name] 			= '622';
	$REX['ADDON']['page'][$addon_name] 			= "piwik";
	
	if(TRUE == $REX['REDAXO'])
	{
		$REX['ADDON']['name'][$addon_name] 		= $I18N->msg("addon_name");
	}
	
	// Recht um das AddOn ueberhaupt einsehen zu koennen
	$REX['ADDON']['perm'][$addon_name] 			= 'piwik[1]';
	
	// Credits
	$REX['ADDON']['version'][$addon_name] 		= '1.9';
	$REX['ADDON']['author'][$addon_name] 		= 'Gilbert Seilheimer';
	$REX['ADDON']['supportpage'][$addon_name] 	= 'forum.redaxo.org';
	
	// *************
	#$REX['PERM'][] = 'piwik[1]';
	#$REX['PERM'][] = 'piwik[2]';
	
	// Fuer Benutzervewaltung
	#$REX['EXTPERM'][] = 'piwik[3]';

	//////////////////////////////////////////////////////////////////////////////////
	// SUBPAGES
	//////////////////////////////////////////////////////////////////////////////////
	
	if(TRUE == $REX['REDAXO'])
	{
		$REX['ADDON'][$addon_name]['SUBPAGES'] = 
		array(
			  array('readme', $I18N->msg('addon_subpage_readme'))
		);
	}
?>