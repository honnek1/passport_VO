<?php

namespace Glavfinans\Core\Passport;

use Cycle\Database\Injection\ValueInterface;
use DateFmt;
use Glavfinans\Core\Exception\EmptyValueException;
use OutOfBoundsException;
use PDO;

/**
 * Объект-значение Серия паспорта
 */
class Series implements ValueInterface
{
    /** @var Okato $okato - Окато код региона, где напечатан паспорт */
    protected Okato $okato;

    /** @var YearOfPrint $yearOfPrint - Год печати бланка паспорта */
    protected YearOfPrint $yearOfPrint;

    /** @var string $value - значение серии паспорта */
    protected string $value;

    /**
     * Конструктор Серии паспорта.
     * Содержит необходимые проверки для безопасного конструирования объекта
     * Запись в свойства okato, yearOfPrint, value(series)
     *
     * @throws EmptyValueException
     */
    public function __construct(string $series)
    {
        $series = trim($series);

        if (empty($series)) {
            throw new EmptyValueException('Серия паспорта не может быть пустой');
        }

        if (!is_numeric($series)) {
            throw new OutOfBoundsException('Серия паспорта должна содержать только цифры, Серия: ' . $series);
        }

        if (strlen($series) !== 4) {
            throw new OutOfBoundsException('В Серии паспорта должно быть только 4 символа, Серия: ' . $series);
        }

        // Окато код региона это 1 и 2 цифры серии паспорта
        $this->okato = new Okato(substr($series, 0, 2));

        // Последние две цифры года печати бланка паспорта это 3 и 4 цифры серии
        $this->yearOfPrint = new YearOfPrint(substr($series, 2, 2));

        $this->value = $series;
    }

    /**
     * Возвращает значение серии паспорта
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
     * @param Series $series
     * @return bool
     */
    public function isEqual(Series $series): bool
    {
        return $this->getValue() === $series->getValue();
    }

    /**
     * Возвращает серию в формате '12 34'
     *
     * @return string
     */
    public function getFormattedValue(): string
    {
        return $this->getOKATO()->getCode() . ' ' . substr($this->getYearOfPrint()->getValue()->format(DateFmt::D_DB), 2, 2);
    }

    /**
     * Возвращает объект ОКАТО-кода региона, где напечатали бланк паспорта.
     *
     * @return Okato
     */
    public function getOKATO(): Okato
    {
        return $this->okato;
    }

    /**
     * Возвращает объект года печати бланка
     *
     * @return YearOfPrint
     */
    public function getYearOfPrint(): YearOfPrint
    {
        return $this->yearOfPrint;
    }

    /**
     * Возвращает строковое значение Серии
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
