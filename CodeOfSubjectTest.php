<?php

namespace Passport;


use Glavfinans\Core\Passport\CodeOfSubject;
use PHPUnit\Framework\TestCase;

/**
 * Тест ValueObject'а кода субъекта региона
 */
class CodeOfSubjectTest extends TestCase
{
    /**
     * Тест функции getCode
     *
     * @return void
     * @covers CodeOfSubject::getCode
     */
    public function testGetCode(): void
    {
        foreach (CodeOfSubject::getCodeList() as $code) {
            $codeOfSubject = new CodeOfSubject($code);
            $this->assertEquals($code, $codeOfSubject->getCode());
        }
    }

    /**
     * Тест метода getCodeList
     * Проверяет, что значения кодов субъектов регионов существуют и имеют тип string
     *
     * @covers CodeOfSubject::getCodeList
     */
    public function testGetCodeList()
    {
        $codeList = CodeOfSubject::getCodeList();
        $this->assertGreaterThan(0, count($codeList));

        foreach ($codeList as $code) {
            $this->assertIsString($code);
        }
    }

    /**
     * Тестирует, что название субъекта региона не пустое
     *
     * @covers CodeOfSubject::getTitle
     */
    public function testGetTitle()
    {
        foreach (CodeOfSubject::getCodeList() as $code) {
            $codeOfSubject = new CodeOfSubject($code);
            $this->assertNotEmpty($codeOfSubject->getTitle(), 'Название окато кода региона не может быть пустым. Код:' . $code);
        }
    }

    /**
     * Тест метода getList
     * Проверяет, что объекты кодов субъектов регионов существуют и являются экземплярами класса CodeOfSubject
     *
     * @covers CodeOfSubject::getList
     */
    public function testGetList()
    {
        $list = CodeOfSubject::getList();
        $this->assertGreaterThan(0, count($list));

        foreach ($list as $codeOfSubject) {
            $this->assertInstanceOf(CodeOfSubject::class, $codeOfSubject);
        }
    }

    /**
     * Тест функции isEqual
     *
     * @covers CodeOfSubject::isEqual
     */
    public function testIsEqual()
    {
        $codeOfSubject = new CodeOfSubject(CodeOfSubject::getCodeList()[0]);
        $otherCodeOfSubject = new CodeOfSubject(CodeOfSubject::getCodeList()[1]);

        $this->assertTrue($codeOfSubject->isEqual(clone $codeOfSubject));
        $this->assertFalse($codeOfSubject->isEqual($otherCodeOfSubject));
    }
}
