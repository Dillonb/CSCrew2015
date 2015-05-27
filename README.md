# CSCrew2015
New CS Crew website for 2015

## Setup instructions

(Note: Must be run on Zoo.)

1. Copy _htaccess to .htaccess and edit the REWRITE_BASE to be correct for your install location.
2. Copy build.properties-template and and runtime-conf-template.xml to build.properties and runtime-conf.xml respectively. Then edit both files with the correct database information.
3. Run ./propel-gen to generate data files, then ./propel-gen insert-sql to insert the base database schema.
