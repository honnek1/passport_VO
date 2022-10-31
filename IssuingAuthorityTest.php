<?php

declare(strict_types=1);

namespace Passport;

use Glavfinans\Core\Exception\EmptyValueException;
use Glavfinans\Core\Passport\IssuingAuthority;
use OutOfBoundsException;
use PHPUnit\Framework\TestCase;


/**
 * Class IssuingAuthorityTest - Unit тест для объекта IssuingAuthority
 */
class IssuingAuthorityTest extends TestCase
{
    /**
     * Тест корректного создания объектов IssuingAuthority
     *
     * @throws EmptyValueException
     * @covers IssuingAuthority::__construct
     */
    public function testCreation()
    {
        $arrayOfIssuingAuthority = [
            'ПВС ОВД западного округа',
            'Северский район',
            'Отделение милиции пос. Крымск',
            'Центральный ОВД'
        ];

        foreach ($arrayOfIssuingAuthority as $IssuingAuthority) {
            $this->assertEquals($IssuingAuthority, (new IssuingAuthority($IssuingAuthority))->getValue());
        }
    }

    /**
     * Тест некорректного создания объектов IssuingAuthority
     *
     * @covers IssuingAuthority::__construct
     * @throws EmptyValueException
     */
    public function testFailedCreation()
    {
        $arrayOfIssuingAuthority = [
            'ПВС ОВД западного округа$$$',
            'Северский Незалежный № 4 ',
            'Отделение милиции пос. Крымск **',
            'Центральный%% ОВД'
        ];

        foreach ($arrayOfIssuingAuthority as $IssuingAuthority) {
            $this->expectException(OutOfBoundsException::class);
            new IssuingAuthority($IssuingAuthority);
        }

        $this->expectException(EmptyValueException::class);
        new IssuingAuthority('');
    }

    /**
     * Тест метода isEqual
     *
     * @covers IssuingAuthority::isEqual
     */
    public function testIsEqual()
    {
        $firstIssuedBy = new IssuingAuthority('Центральный ОВД');
        $secondIssuedBy = new IssuingAuthority('ПВС ОВД');

        $this->assertTrue($firstIssuedBy->isEqual(clone $firstIssuedBy));
        $this->assertFalse($firstIssuedBy->isEqual($secondIssuedBy));
    }
}
