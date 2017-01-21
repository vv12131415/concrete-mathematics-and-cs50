<?php

$phoneBook = [
    ["Абалаев Иван", "111-11-11"],        // элемент списка №0
    ["Баранов Сергей", "222-11-11"],      // элемент списка №1
    ["Волкова Ольга", "333-11-11"],       // элемент списка №2
    ["Громов Пётр", "444-11-11"],         // элемент списка №3
    ["Добрая Анна", "555-11-11"],         // элемент списка №4
    ["Ежова Елизавета", "666-11-11"]      // элемент списка №5
];


$tmp = binarySearch($phoneBook, "Добрая Анна");

function binarySearch(array $phoneBook, string $lookupPerson)
{
    $middlePair = getMiddleRecord($phoneBook);
    $middlePerson = $middlePair[0];
    if ($middlePerson == $lookupPerson) {
        //$phone = $middlePair[1];
        return $middlePair;
    } elseif ($middlePerson > $lookupPerson) {
        $halfOfTheTask = getFirstHalf($phoneBook);
        return binarySearch($halfOfTheTask, $lookupPerson);
    } elseif ($middlePerson < $lookupPerson) {
        $halfOfTheTask = getSecondHalf($phoneBook);
        return binarySearch($halfOfTheTask, $lookupPerson);
    }
}

function getMiddleRecord($phoneBook)
{
    $middleIndex = getMiddleIndex($phoneBook);
    return $phoneBook[$middleIndex];
}

function getMiddleIndex($phoneBook)
{
    return floor(count($phoneBook)/2);
}

function getFirstHalf($phoneBook)
{
    return array_slice($phoneBook, 0, getMiddleIndex($phoneBook));
}

function getSecondHalf($phoneBook)
{
    return array_slice($phoneBook, getMiddleIndex($phoneBook), count($phoneBook));
}