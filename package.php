<?php

require_once 'PEAR/PackageFileManager2.php';

$version = '0.9.5';
$notes = <<<EOT
see ChangeLog
EOT;

$description =<<<EOT
Classes specific to building store websites.

* Built on top of Swat and Site packages
* An OO-style API
EOT;

$package = new PEAR_PackageFileManager2();
PEAR::setErrorHandling(PEAR_ERROR_DIE);

$result = $package->setOptions(
	array(
		'filelistgenerator' => 'svn',
		'simpleoutput'      => true,
		'baseinstalldir'    => '/',
		'packagedirectory'  => './',
		'dir_roles'         => array(
			'Store' => 'php'
		),
	)
);

$package->setPackage('Store');
$package->setSummary('Classes for building store websites');
$package->setDescription($description);
$package->setChannel('pear.silverorange.com');
$package->setPackageType('php');
$package->setLicense('LGPL', 'http://www.gnu.org/copyleft/lesser.html');

$package->setReleaseVersion($version);
$package->setReleaseStability('stable');
$package->setAPIVersion('0.0.1');
$package->setAPIStability('stable');
$package->setNotes($notes);

$package->addIgnore('package.php');

$package->addMaintainer('lead', 'nrf', 'Nathan Fredrickson', 'nathan@silverorange.com');
$package->addMaintainer('lead', 'gauthierm', 'Mike Gauthier', 'mike@silverorange.com');

$package->setPhpDep('5.1.5');
$package->setPearinstallerDep('1.4.0');
$package->addPackageDepWithChannel('required', 'Swat', 'pear.silverorange.com', '0.9.6');
$package->addPackageDepWithChannel('required', 'Site', 'pear.silverorange.com', '0.9.7');
$package->addPackageDepWithChannel('required', 'XML_RPCAjax', 'pear.silverorange.com', '0.9.1');
$package->addPackageDepWithChannel('required', 'MooFx', 'pear.silverorange.com', '0.9.2');
$package->addPackageDepWithChannel('required', 'Crypt_GPG', 'pear.silverorange.com', '0.3.3');
$package->addPackageDepWithChannel('required', 'Text_Password', 'pear.php.net', '1.1.0');
$package->addPackageDepWithChannel('required', 'Image_Transform', 'pear.php.net', '0.9.0');
$package->addPackageDepWithChannel('required', 'Validate_Finance_CreditCard', 'pear.php.net', '0.5.2');
$package->generateContents();

if (isset($_GET['make']) || (isset($_SERVER['argv']) && @$_SERVER['argv'][1] == 'make')) {
	$package->writePackageFile();
} else {
	$package->debugPackageFile();
}

?>
