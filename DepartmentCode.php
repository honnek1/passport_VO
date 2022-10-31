<?php

namespace Glavfinans\Core\Passport;

use Cycle\Database\Injection\ValueInterface;
use Glavfinans\Core\Exception\EmptyValueException;
use OutOfBoundsException;
use PDO;

/**
 * Объект-значение "Код подразделения"
 */
class DepartmentCode implements ValueInterface
{
    /** @var LevelOfDepartment $level - уровень подразделения выдавшего паспорт (третья цифра кода подразделения) */
    protected LevelOfDepartment $level;

    /** @var CodeOfSubject $codeOfSubject - код региона субъекта выдавшего паспорт (Первые две цифры кода подразделения) */
    protected CodeOfSubject $codeOfSubject;

    /** @var string $value - значение кода подразделения */
    protected string $value;

    /**
     * Конструктор Код подразделения паспорта.
     * Содержит необходимые проверки для безопасного конструирования объекта
     *
     * @throws EmptyValueException
     */
    public function __construct(string $departmentCode)
    {
        if (empty($departmentCode)) {
            throw new EmptyValueException(message: 'Значение "Код подразделения" не может быть пустым');
        }

        if (0 == preg_match('/^\d{3}(-)\d{3}$/', $departmentCode)) {
            throw new OutOfBoundsException(message: 'Некорректный код подразделения: ' . $departmentCode);
        }

        // Код субъекта выдавшего паспорт это 1,2 цифры кода подразделения
        $this->codeOfSubject = new CodeOfSubject(substr($departmentCode, 0, 2));

        // Уровень подразделения выдавшего паспорт это третья цифра кода подразделения
        $this->level = new LevelOfDepartment($departmentCode[2]);

        $this->value = $departmentCode;
    }

    /**
     * Возвращает значение кода подразделения
     *
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * Возвращает true, если значения объектов равны
     *
     * @param DepartmentCode $departmentCode
     * @return bool
     */
    public function isEqual(DepartmentCode $departmentCode): bool
    {
        return $this->getValue() === $departmentCode->getValue();
    }

    /**
     * Возвращает объект кода субъекта региона, где находится выдавшее паспорт подразделение
     *
     * @return CodeOfSubject
     */
    public function getCodeOfSubject(): CodeOfSubject
    {
        return $this->codeOfSubject;
    }

    /**
     * Возвращает объект уровня подразделения, выдавшее паспорт
     *
     * @return LevelOfDepartment
     */
    public function getLevel(): LevelOfDepartment
    {
        return $this->level;
    }

    /**
     * Возвращает строковое значение объекта "Код подразделения"
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->getValue();
    }

    /**
     * @inheritDoc
     */
    public function rawValue(): string
    {
        return $this->__toString();
    }

    /**
     * @inheritDoc
     */
    public function rawType(): int
    {
        return PDO::PARAM_STR;
    }
}
