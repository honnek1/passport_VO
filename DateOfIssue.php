<?php

namespace Glavfinans\Core\Passport;

use DateInterval;
use DateTimeImmutable;
use DateTimeInterface;
use Exception;
use Glavfinans\Core\Age\Age;

/**
 * Класс Дата выдачи паспорта
 */
class DateOfIssue
{
    /** @var DateTimeInterface $plannedDateOfIssue - плановая дата выдачи паспорта */
    protected DateTimeInterface $plannedDateOfIssue;

    /** @var DateTimeInterface|null $dateChangePassport - Дата следующей замены паспорта */
    protected ?DateTimeInterface $dateNextChangePassport;

    /** @var DateTimeInterface $value - значение даты выдачи */
    protected DateTimeInterface $value;

    /**
     * Конструктор Даты выдачи паспорта.
     * Запись в свойства value(dateOfIssue), dateNextChangePassport и plannedDateOfIssue
     *
     * @param DateTimeInterface $dateOfIssue
     * @param DateTimeInterface $dateOfBirth
     * @throws Exception
     */
    public function __construct(DateTimeInterface $dateOfIssue, DateTimeInterface $dateOfBirth)
    {
        /** @var $age - текущий возраст */
        $age = (new Age($dateOfBirth))->getAge();
        $this->value = $dateOfIssue;
        $plannedDateOfIssue = clone $dateOfBirth;

        if ($age < 20) {
            // Если возраст клиента меньше 20 лет, то
            // следующая дата выдачи паспорта - (дата рождения + 20 лет)
            // дата выдачи сейчас в паспорте должна быть - (Дата рождения + 14 лет)
            $this->dateNextChangePassport = $dateOfBirth->add(new DateInterval('P20Y'));
            $this->plannedDateOfIssue = $plannedDateOfIssue->add(new DateInterval('P14Y'));

        } elseif ($age > 45) {
            // Если возраст клиента больше 45 лет, то
            // следующая дата выдачи паспорта - null
            // дата выдачи сейчас в паспорте должна быть - (Дата рождения + 45 лет)
            $this->dateNextChangePassport = null;
            $this->plannedDateOfIssue = $plannedDateOfIssue->add(new DateInterval('P45Y'));

        } else {
            // Если возраст клиента находится между 20 и 45 годами, то
            // следующая дата выдачи паспорта - (дата рождения + 45 лет)
            // дата выдачи сейчас в паспорте должна быть - (Дата рождения + 20 лет)
            $this->dateNextChangePassport = $dateOfBirth->add(new DateInterval('P45Y'));
            $this->plannedDateOfIssue = $plannedDateOfIssue->add(new DateInterval('P20Y'));
        }
    }

    /**
     * Возвращает дату следующей замены паспорта или null если возраст больше 45
     *
     * @return DateTimeInterface|null
     */
    public function getDateNextChangePassport(): ?DateTimeInterface
    {
        return $this->dateNextChangePassport;
    }

    /**
     * Функция подсчитывает количество дней до замены паспорта в 20 или 45 лет
     *
     * @return null|int Количество дней до замены паспорта,
     * null если возраст превышает 45 лет или дата рождения не задана
     */
    public function getCountDaysUntilChangePassport(): ?int
    {
        if (null === $this->getDateNextChangePassport()) {
            return null;
        }

        return (new DateTimeImmutable())->diff($this->getDateNextChangePassport())->days;
    }

    /**
     * Возвращает значение даты выдачи
     *
     * @return DateTimeInterface
     */
    public function getValue(): DateTimeInterface
    {
        return $this->value;
    }

    /**
     * Возвращает плановую дату выдачи паспорта
     *
     * @return DateTimeInterface
     */
    public function getPlannedDateOfIssue(): DateTimeInterface
    {
        return $this->plannedDateOfIssue;
    }

    /**
     * Возвращает true, если значения объектов равны
     *
     * @param DateOfIssue $dateOfIssue
     * @return bool
     */
    public function isEqual(DateOfIssue $dateOfIssue): bool
    {
        return $this->getValue() === $dateOfIssue->getValue();
    }
}
