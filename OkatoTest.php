<?php

namespace Passport;

use Glavfinans\Core\Passport\Okato;
use PHPUnit\Framework\TestCase;

/**
 * Тест ValueObject'а Окато кодов регионов
 */
class OkatoTest extends TestCase
{
    /**
     * Тест функции getCode
     *
     * @return void
     * @covers Okato::getCode
     */
    public function testGetCode(): void
    {
        foreach (Okato::getCodeList() as $code) {
            $okato = new Okato($code);
            $this->assertEquals($code, $okato->getCode());
        }
    }

    /**
     * Тест метода getCodeList
     * Проверяет, что значения okato кодов регионов существуют и имеют тип string
     *
     * @covers Okato::getCodeList
     */
    public function testGetCodeList()
    {
        $codeList = Okato::getCodeList();
        $this->assertGreaterThan(0, count($codeList));

        foreach ($codeList as $code) {
            $this->assertIsString($code);
        }
    }

    /**
     * Тестирует, что название окато региона не пустое
     *
     * @covers Okato::getTitle
     */
    public function testGetTitle()
    {
        foreach (Okato::getCodeList() as $code) {
            $okato = new Okato($code);
            $this->assertNotEmpty($okato->getTitle(), 'Название окато кода региона не может быть пустым. Код:' . $code);
        }
    }

    /**
     * Тест метода getList
     * Проверяет, что объекты okato кодов регионов существуют и являются экземплярами класса Okato
     *
     * @covers Okato::getList
     */
    public function testGetList()
    {
        $list = Okato::getList();
        $this->assertGreaterThan(0, count($list));

        foreach ($list as $okato) {
            $this->assertInstanceOf(Okato::class, $okato);
        }
    }

    /**
     * Тест функции isEqual
     *
     * @covers Okato::isEqual
     */
    public function testIsEqual()
    {
        $okato = new Okato(Okato::getCodeList()[0]);
        $otherOkato = new Okato(Okato::getCodeList()[1]);

        $this->assertTrue($okato->isEqual(clone $okato));
        $this->assertFalse($okato->isEqual($otherOkato));
    }
}
