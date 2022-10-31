<?php

declare(strict_types=1);

namespace Passport;


use DateInterval;
use DateTimeImmutable;
use Glavfinans\Core\Passport\DateOfIssue;
use PHPUnit\Framework\TestCase;

/**
 *  Class DateOfIssueTest - Unit тест для объекта DateOfIssue
 */
class DateOfIssueTest extends TestCase
{
    /**
     * Тест корректного создания объектов DateOfIssue
     *
     * @covers DateOfIssue::__construct
     */
    public function testCreation()
    {
        $arrayOfDatesOfIssueAndBirth = [
            ['2015-01-01', '1970-01-01'],
            ['2010-01-01', '1990-01-01'],
            ['2015-01-01', '1990-01-01'],
            ['2020-01-01', '2000-01-01']
        ];

        foreach ($arrayOfDatesOfIssueAndBirth as [$dateOfIssue, $dateOfBirth]) {
            $dateOfIssue = new DateTimeImmutable($dateOfIssue);
            $dateOfBirth = new DateTimeImmutable($dateOfBirth);
            $this->assertEquals($dateOfIssue, (new DateOfIssue($dateOfIssue, $dateOfBirth))->getValue());
        }
    }

    /**
     * Тест метода isEqual
     *
     * @covers DateOfIssue::isEqual
     */
    public function testIsEqual()
    {
        $firstDateOfIssue = new DateOfIssue(new DateTimeImmutable('2015-01-01'), new DateTimeImmutable('1970-01-01'));
        $secondDateOfIssue = new DateOfIssue(new DateTimeImmutable('2010-01-01'), new DateTimeImmutable('1990-01-01'));

        $this->assertTrue($firstDateOfIssue->isEqual(clone $firstDateOfIssue));
        $this->assertFalse($firstDateOfIssue->isEqual($secondDateOfIssue));
    }

    /**
     * Тестирует метод getDateNextChangePassport
     *
     * @covers DateOfIssue::getDateNextChangePassport
     */
    public function testGetDateNextChangePassport()
    {
        $dateOfBirthAfter45 = new DateTimeImmutable('1970-01-01'); // Больше 45 лет
        $dateOfIssueAfter45 = new DateOfIssue(new DateTimeImmutable('2016-01-01'), $dateOfBirthAfter45);
        $this->assertEquals(null, $dateOfIssueAfter45->getDateNextChangePassport());

        $dateOfBirthAfter20 = new DateTimeImmutable('2000-01-01'); // Между 20 и 45 годиками
        $dateOfIssueAfter20 = new DateOfIssue(new DateTimeImmutable('2022-01-01'), $dateOfBirthAfter20);
        $this->assertEquals($dateOfBirthAfter20->add(new DateInterval('P45Y')), $dateOfIssueAfter20->getDateNextChangePassport());

        $dateOfBirthAfter14 = new DateTimeImmutable('2003-01-01'); // Меньше 20 лет
        $dateOfIssueAfter14 = new DateOfIssue(new DateTimeImmutable('2018-01-01'), $dateOfBirthAfter14);
        $this->assertEquals($dateOfBirthAfter14->add(new DateInterval('P20Y')), $dateOfIssueAfter14->getDateNextChangePassport());
    }

    /**
     * Тестирует метод getCountDaysUntilChangePassport
     *
     * @covers DateOfIssue::getCountDaysUntilChangePassport
     */
    public function testGetCountDaysUntilChangePassport()
    {
        $dateOfBirthAfter45 = new DateTimeImmutable('1970-01-01'); // Больше 45 лет
        $dateOfIssueAfter45 = new DateOfIssue(new DateTimeImmutable('2016-01-01'), $dateOfBirthAfter45);
        $this->assertEquals(null, $dateOfIssueAfter45->getCountDaysUntilChangePassport());

        $dateOfBirthAfter20 = new DateTimeImmutable('2000-01-01'); // Между 20 и 45 годиками
        $dateOfIssueAfter20 = new DateOfIssue(new DateTimeImmutable('2022-01-01'), $dateOfBirthAfter20);
        $this->assertEquals((new DateTimeImmutable())->diff($dateOfBirthAfter20->add(new DateInterval('P45Y')))->days,
            $dateOfIssueAfter20->getCountDaysUntilChangePassport());

        $dateOfBirthAfter14 = new DateTimeImmutable('2003-01-01'); // Меньше 20 лет
        $dateOfIssueAfter14 = new DateOfIssue(new DateTimeImmutable('2018-01-01'), $dateOfBirthAfter14);
        $this->assertEquals((new DateTimeImmutable())->diff($dateOfBirthAfter14->add(new DateInterval('P20Y')))->days,
            $dateOfIssueAfter14->getCountDaysUntilChangePassport());
    }

    /**
     * Тестирует метод getPlannedDateOfIssue
     *
     * @covers DateOfIssue::getPlannedDateOfIssue
     */
    public function testGetPlannedDateOfIssue()
    {
        $dateOfBirthAfter45 = new DateTimeImmutable('1970-01-01'); // Больше 45 лет
        $dateOfIssueAfter45 = new DateOfIssue(new DateTimeImmutable('2016-01-01'), $dateOfBirthAfter45);
        $this->assertEquals($dateOfBirthAfter45->add(new DateInterval('P45Y')), $dateOfIssueAfter45->getPlannedDateOfIssue());

        $dateOfBirthAfter20 = new DateTimeImmutable('2000-01-01'); // Между 20 и 45 годиками
        $dateOfIssueAfter20 = new DateOfIssue(new DateTimeImmutable('2022-01-01'), $dateOfBirthAfter20);
        $this->assertEquals($dateOfBirthAfter20->add(new DateInterval('P20Y')), $dateOfIssueAfter20->getPlannedDateOfIssue());

        $dateOfBirthAfter14 = new DateTimeImmutable('2003-01-01'); // Меньше 20 лет
        $dateOfIssueAfter14 = new DateOfIssue(new DateTimeImmutable('2018-01-01'), $dateOfBirthAfter14);
        $this->assertEquals($dateOfBirthAfter14->add(new DateInterval('P14Y')), $dateOfIssueAfter14->getPlannedDateOfIssue());
    }
}
