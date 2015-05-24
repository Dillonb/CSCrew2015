<?php



/**
 * Skeleton subclass for representing a row from the 'user' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.cscrew
 */
class User extends BaseUser
{
    // Override getName to return their NetID if they do not have a name in LDAP
    function getName() {
        $name = parent::getName();
        if ($name == " " || $name == null) {
            return parent::getNetid();
        }
        return $name;
    }
}
