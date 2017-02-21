<?php
/**
 * This file is part of the Yasumi package.
 *
 * Copyright (c) 2015 - 2017 AzuyaLabs
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Sacha Telgenhof <stelgenhof@gmail.com>
 */

namespace Yasumi\tests\UnitedKingdom;

use DateTime;
use DateTimeZone;
use Yasumi\Holiday;
use Yasumi\tests\YasumiTestCaseInterface;

/**
 * Class for testing the Spring Bank Holiday in the United Kingdom.
 */
class SpringBankHolidayTest extends UnitedKingdomBaseTestCase implements YasumiTestCaseInterface
{
    /**
     * The name of the holiday
     */
    const HOLIDAY = 'springBankHoliday';

    /**
     * The year in which the holiday was first established
     */
    const ESTABLISHMENT_YEAR = 1965;

    /**
     * Tests the holiday defined in this test.
     */
    public function testHoliday()
    {
        $year = 1988;
        $this->assertHoliday(self::REGION, self::HOLIDAY, $year,
            new DateTime("$year-5-30", new DateTimeZone(self::TIMEZONE)));
    }

    /**
     * Tests the holiday defined in this test before establishment.
     */
    public function testHolidayBeforeEstablishment()
    {
        $this->assertNotHoliday(self::REGION, self::HOLIDAY,
            $this->generateRandomYear(1000, self::ESTABLISHMENT_YEAR - 1));
    }

    /**
     * Tests the translated name of the holiday defined in this test.
     */
    public function testTranslation()
    {
        $this->assertTranslatedHolidayName(self::REGION, self::HOLIDAY,
            $this->generateRandomYear(self::ESTABLISHMENT_YEAR), [self::LOCALE => 'Spring Bank Holiday']);
    }

    /**
     * Tests type of the holiday defined in this test.
     */
    public function testHolidayType()
    {
        $this->assertHolidayType(self::REGION, self::HOLIDAY, $this->generateRandomYear(self::ESTABLISHMENT_YEAR),
            Holiday::TYPE_BANK);
    }
}