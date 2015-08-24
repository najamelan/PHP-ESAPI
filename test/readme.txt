How to run the unit tests
=========================

Requirements
------------

- phpunit
- xdebug (if you want to have code coverage analysis)


Usage
-----

From the root of the project, call:

   phpunit --configuration test/AllTests.xml


In order to get code coverage, run:

   phpunit --configuration test/AllTests.xml --coverage-text


ESAPI Logging File
------------------
A log file named 'ESAPI_logging_file_test', located in trunk/test/testoutput/ is
created and appended to when executing any unit tests in trunk/test/ that use
trunk/test/testresources/ESAPI.xml as their SecurityConfiguration.
Backups of the logfile will be created in the same directory.
