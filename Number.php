<?php

namespace Glavfinans\Core\Passport;

use Cycle\Database\Injection\ValueInterface;
use Glavfinans\Core\Exception\EmptyValueException;
use OutOfBoundsException;
use PDO;

/**
 * Объект-значение Номер паспорта
 */
class Number implements ValueInterface
{
    /** @var string $value - значение Номера паспорта */
    protected string $value;

    /**
     * Конструктор Номера паспорта.
     * Содержит необходимые проверки для безопасного конструирования объекта
     *
     * @throws OutOfBoundsException
     * @throws EmptyValueException
     */
    public function __construct(string $number)
    {
        $number = trim($number);

        if (empty($number)) {
            throw new EmptyValueException('"Номер паспорта" не может быть пустым');
        }

        if (!is_numeric($number)) {
            throw new OutOfBoundsException('"Номер паспорта" должен содержать только цифры ' . $number);
        }

        if (strlen($number) !== 6) {
            throw new OutOfBoundsException('В номере паспорта должно быть только 6 символов ' . $number);
        }

        if ($number < 101) {
            throw new OutOfBoundsException('Неправильный формат номера паспорта ' . $number);
        }

        $this->value = $number;
    }

    /**
     * Возвращает значение номера паспорта
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
     * @param Number $number
     * @return bool
     */
    public function isEqual(Number $number): bool
    {
        return $this->getValue() === $number->getValue();
    }

    /**
     * Возвращает строковое значение Номера
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
        return PDO::PARAM_INT;
    }
}
