<?php

namespace Passport;

use DateFmt;
use DateTimeImmutable;
use Glavfinans\Core\Exception\NotFoundException;
use Glavfinans\Core\Passport\DateOfIssue;
use Glavfinans\Core\Passport\DepartmentCode;
use Glavfinans\Core\Passport\IssuingAuthority;
use Glavfinans\Core\Passport\Number;
use Glavfinans\Core\Passport\Passport;
use Glavfinans\Core\Passport\Series;
use OutOfBoundsException;
use PHPUnit\Framework\TestCase;

/**
 * Class PassportTest - Unit тест для объекта Passport
 */
class PassportTest extends TestCase
{

    /** @var array|array[] $arrayOfPassportData - Массив валидных значений полей паспорта */
    private array $arrayOfPassportData = [
        ['0315', '120432', ['2015-01-01', '1970-01-01'], 'ПВС Запорожской области', '230-002'],
        ['0320', '120005', ['2010-01-01', '1990-01-01'], 'МВД города Москва', '450-221'],
        ['0515', '458402', ['2015-01-01', '1990-01-01'], 'УВД города Краснодара', '320-256'],
        ['9915', '234231', ['2021-01-01', '2000-01-01'], 'ПВС УВД и ОВД города Санкт-Петербурга', '330-565'],
        ['0520', '123450', ['2022-01-01', '2000-01-01'], 'Все отделения полиции города Мариуполя', '410-511'],
    ];

    /**
     * Тест успешного создания валидного паспорта
     *
     * @covers Passport::isValid
     */
    public function testCreationValidPassport()
    {
        foreach ($this->arrayOfPassportData as [$series, $number, [$dateOfIssue, $dateOfBirth], $issuingAuthority, $departmentCode]) {
            $this->assertEquals($series, (new Series($series))->getValue());
            $this->assertEquals($number, (new Number($number))->getValue());
            $this->assertEquals($dateOfIssue, (new DateOfIssue(new DateTimeImmutable($dateOfIssue),
                new DateTimeImmutable($dateOfBirth)))->getValue()->format(DateFmt::D_DB));
            $this->assertEquals($issuingAuthority, (new IssuingAuthority($issuingAuthority))->getValue());
            $this->assertEquals($departmentCode, (new DepartmentCode($departmentCode))->getValue());
        }
    }

    /**
     * Тест создания невалидного паспорта
     *
     * @covers Passport::isValid
     */
    public function testCreationInvalidPassport()
    {
        $validSeries = new Series('0315');
        $validNumber = new Number('120432');
        $validDateOfIssue = new DateOfIssue(new DateTimeImmutable('2011-01-01'), new DateTimeImmutable('1990-01-01'));
        $validIssuingAuthority = new IssuingAuthority('ПВС ОВД западного округа');
        $validDepartmentCode = new DepartmentCode('230-005');

        // Проверка на существование Окато кода региона
        $this->expectException(NotFoundException::class);
        (new Passport(new Series('7415'), $validNumber, $validDateOfIssue, $validIssuingAuthority, $validDepartmentCode))->isValid();

        // Дата печати должна быть с 1997 по (текущий год + 3года)
        $this->expectException(OutOfBoundsException::class);
        (new Passport(new Series('0395'), $validNumber, $validDateOfIssue, $validIssuingAuthority, $validDepartmentCode))->isValid();

        // Если плановая дата выдачи позже реальной даты выдачи, то кидаем Исключение
        $invalidDateOfIssueByPlannedDate = new DateOfIssue(new DateTimeImmutable('2005-01-01'), new DateTimeImmutable('2000-01-01'));
        $this->expectException(OutOfBoundsException::class);
        (new Passport($validSeries, $validNumber, $invalidDateOfIssueByPlannedDate, $validIssuingAuthority, $validDepartmentCode))->isValid();

        // Проверка на существование кода субъекта региона
        $this->expectException(NotFoundException::class);
        (new Passport($validSeries, $validNumber, $validDateOfIssue, $validIssuingAuthority, new DepartmentCode('973-005')))->isValid();

        // Проверка на существование такого уровня подразделения выдавшего паспорт
        $this->expectException(NotFoundException::class);
        (new Passport($validSeries, $validNumber, $validDateOfIssue, $validIssuingAuthority, new DepartmentCode('124-005')))->isValid();

        // Проверка даты печати бланка паспорта
        $this->expectException(OutOfBoundsException::class);
        (new Passport(new Series('0398'), $validNumber, $validDateOfIssue, $validIssuingAuthority, $validDepartmentCode))->isValid();
    }

    /**
     * Тестирует метод getSeriesAndNumber
     *
     * @covers Passport::getSeriesAndNumber
     */
    public function testGetSeriesAndNumber()
    {
        foreach ($this->arrayOfPassportData as [$series, $number, [$dateOfIssue, $dateOfBirth], $issuingAuthority, $departmentCode]) {
            $this->assertEquals($series . $number, (new Passport(
                new Series($series),
                new Number($number),
                new DateOfIssue(new DateTimeImmutable($dateOfIssue), new DateTimeImmutable($dateOfBirth)),
                new IssuingAuthority($issuingAuthority),
                new DepartmentCode($departmentCode)
            ))->getSeriesAndNumber());
        }
    }

    /**
     * Тестирует метод getSeriesNumberCode
     *
     * @covers Passport::getSeriesNumberCode
     */
    public function testGetSeriesNumberCode()
    {
        foreach ($this->arrayOfPassportData as [$series, $number, [$dateOfIssue, $dateOfBirth], $issuingAuthority, $departmentCode]) {
            $this->assertEquals('серия: ' . $series . ' номер: ' . $number . ' код подразделения: ' . $departmentCode,
                (new Passport(
                new Series($series),
                new Number($number),
                new DateOfIssue(new DateTimeImmutable($dateOfIssue), new DateTimeImmutable($dateOfBirth)),
                new IssuingAuthority($issuingAuthority),
                new DepartmentCode($departmentCode)
            ))->getSeriesNumberCode());
        }
    }

    /**
     * Тестирует метод getMaskedPassportSeriesNumber
     *
     * @covers Passport::getMaskedPassportSeriesNumber
     */
    public function testGetMaskedPassportSeriesNumber()
    {
        foreach ($this->arrayOfPassportData as [$series, $number, [$dateOfIssue, $dateOfBirth], $issuingAuthority, $departmentCode]) {
            $this->assertEquals(substr($series, 0, 2) . '** '
                . '***' . substr($number, 3),
                (new Passport(
                    new Series($series),
                    new Number($number),
                    new DateOfIssue(new DateTimeImmutable($dateOfIssue), new DateTimeImmutable($dateOfBirth)),
                    new IssuingAuthority($issuingAuthority),
                    new DepartmentCode($departmentCode)
                ))->getMaskedPassportSeriesNumber());
        }
    }

    /**
     * Тестирует метод getPassportDataForDocuments
     *
     * @covers Passport::getPassportDataForDocuments
     */
    public function testGetPassportDataForDocuments()
    {
        foreach ($this->arrayOfPassportData as [$series, $number, [$dateOfIssue, $dateOfBirth], $issuingAuthority, $departmentCode]) {
            $this->assertEquals('Серия: ' . $series .
                ' Номер: ' . $number . ', ' .
                'Код подразделения: ' . $departmentCode . ', ' .
                'Выдан ' . (new DateTimeImmutable($dateOfIssue))->format(DateFmt::D_APP_NEW) . ' г. ' .
                $issuingAuthority . ' ',

                (new Passport(
                    new Series($series),
                    new Number($number),
                    new DateOfIssue(new DateTimeImmutable($dateOfIssue), new DateTimeImmutable($dateOfBirth)),
                    new IssuingAuthority($issuingAuthority),
                    new DepartmentCode($departmentCode)
                ))->getPassportDataForDocuments());
        }
    }

    /**
     * Тестирует метод getFormattedSeriesAndNumber
     *
     * @covers Passport::getFormattedSeriesAndNumber
     */
    public function testGetFormattedSeriesAndNumber()
    {
        foreach ($this->arrayOfPassportData as [$series, $number, [$dateOfIssue, $dateOfBirth], $issuingAuthority, $departmentCode]) {
            $this->assertEquals(substr($series, 0, 2) . ' '
                . substr($series, 2, 2) . ' '
                . $number,

                (new Passport(
                    new Series($series),
                    new Number($number),
                    new DateOfIssue(new DateTimeImmutable($dateOfIssue), new DateTimeImmutable($dateOfBirth)),
                    new IssuingAuthority($issuingAuthority),
                    new DepartmentCode($departmentCode)
                ))->getFormattedSeriesAndNumber());
        }
    }
}
