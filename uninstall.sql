#*********************************************
#
# UNINSTALLTION
#
# Autor: 	G.Seilheimer
# Company:	contic.de
# Version: 	1.0.9
# Update:	2013-03-21
# CMS:		Redaxo 4.4.1
#
#*********************************************


#*********************************************
#
# delete values from rex_template
#
#*********************************************

DELETE FROM `%TABLE_PREFIX%template` WHERE `name` LIKE '%gs : piwik (jquery)%' LIMIT 1;