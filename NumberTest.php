<?php

declare(strict_types=1);

namespace Passport;


use Glavfinans\Core\Exception\EmptyValueException;
use Glavfinans\Core\Passport\Number;
use OutOfBoundsException;
use PHPUnit\Framework\TestCase;

/**
 *  Class NumberTest - Unit тест для объекта Number
 */
class NumberTest extends TestCase
{
    /**
     * Тест корректного создания объектов Number
     *
     * @covers Number::__construct
     */
    public function testCreation()
    {
        $arrayOfNumber = [
            '011100',
            '031500',
            '011111',
            '153558'
        ];

        foreach ($arrayOfNumber as $number) {
            $this->assertEquals($number, (new Number($number))->getValue());
        }
    }

    /**
     * Тест некорректного создания объектов Number
     *
     * @covers Number::__construct
     */
    public function testFailedCreation()
    {
        $arrayOfNumber = [
            '000011',
            '03150A',
            '0AV000',
            '153558000'
        ];

        foreach ($arrayOfNumber as $number) {
            $this->expectException(OutOfBoundsException::class);
            new Number($number);
        }

        $this->expectException(EmptyValueException::class);
        new Number('');
    }

    /**
     * Тест метода isEqual
     *
     * @covers Number::isEqual
     */
    public function testIsEqual()
    {
        $firstNumber = new Number('031500');
        $secondNumber = new Number('030400');

        $this->assertTrue($firstNumber->isEqual(clone $firstNumber));
        $this->assertFalse($firstNumber->isEqual($secondNumber));
    }
}
