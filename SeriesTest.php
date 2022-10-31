<?php

declare(strict_types=1);

namespace Passport;

use Glavfinans\Core\Exception\EmptyValueException;
use Glavfinans\Core\Passport\Okato;
use Glavfinans\Core\Passport\Series;
use Glavfinans\Core\Passport\YearOfPrint;
use OutOfBoundsException;
use PHPUnit\Framework\TestCase;


/**
 * Class SeriesTest - Unit тест для объекта Series
 */
class SeriesTest extends TestCase
{
    /** @var array|string[] $arrayOfSeries - массив валидных серий паспорта */
    private array $arrayOfSeries = [
        '0405',
        '0315',
        '0101',
        '0320'
    ];

    /**
     * Тест корректного создания объектов Series
     *
     * @covers Series::__construct
     */
    public function testCreation()
    {
        foreach ($this->arrayOfSeries as $series) {
            $this->assertEquals($series, (new Series($series))->getValue());
        }
    }

    /**
     * Тест некорректного создания объектов Series
     *
     * @covers Series::__construct
     */
    public function testFailedCreation()
    {
        $arrayOfFailedSeries = [
            '13АА',
            '310000',
            '0000//',
            '0015'
        ];

        foreach ($arrayOfFailedSeries as $series) {
            $this->expectException(OutOfBoundsException::class);
            new Series($series);
        }

        $this->expectException(EmptyValueException::class);
        new Series('');
    }

    /**
     * Тест метода isEqual
     *
     * @covers Series::isEqual
     */
    public function testIsEqual()
    {
        $firstSeries = new Series('0315');
        $secondSeries = new Series('0304');

        $this->assertTrue($firstSeries->isEqual(clone $firstSeries));
        $this->assertFalse($firstSeries->isEqual($secondSeries));
    }

    /**
     * Тест метода GetOKATO, проверяет что getOkato вернет объект класса Okato
     *
     * @covers Series::getOKATO
     */
    public function testGetOKATO()
    {
        foreach ($this->arrayOfSeries as $series) {
            $series = new Series($series);
            $this->assertInstanceOf(Okato::class, $series->getOKATO());
        }
    }

    /**
     * Тест метода GetYearOfPrint, проверяет что getOkato вернет объект класса Okato
     *
     * @covers Series::getYearOfPrint
     */
    public function testGetYearOfPrint()
    {
        foreach ($this->arrayOfSeries as $series) {
            $series = new Series($series);
            $this->assertInstanceOf(YearOfPrint::class, $series->getYearOfPrint());
        }
    }

    /**
     * Тест метода getFormattedValue
     *
     * @covers Series::getFormattedValue
     */
    public function testGetFormattedValue()
    {
        foreach ($this->arrayOfSeries as $series) {
            $this->assertEquals(substr($series, 0, 2) . ' ' . substr($series, 2, 2),
                (new Series($series))->getFormattedValue());
        }
    }
}
