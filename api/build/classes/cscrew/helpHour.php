<?php



/**
 * Skeleton subclass for representing a row from the 'helphour' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.cscrew
 */
class helpHour extends BasehelpHour
{
	function onWeekday($day) {
		$day = strtolower($day);
		switch ($day) {
			case 'monday':
				return $this->getMonday();
			case 'tuesday':
				return $this->getTuesday();
			case 'wednesday':
				return $this->getWednesday();
			case 'thursday':
				return $this->getThursday();
			case 'friday':
				return $this->getFriday();
			case 'saturday':
				return $this->getSaturday();
			case 'sunday':
				return $this->getSunday();
		}
	}
}
