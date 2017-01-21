<?php

$phoneBook = [
    ["Adini Ada", "111-11-11"],
    ["Bigelow Bam Bam", "222-11-11"],
    ["Chanel Coco", "333-11-11"],
    ["Donovan Landon", "444-11-11"],
    ["Eagleman John", "555-11-11"],
    ["Fabozzi Robert", "666-11-11"]
];


$phone = binarySearch($phoneBook, "Eagleman John");

function binarySearch(array $phoneBook, string $lookupPerson)
{
    $middlePair = getMiddleRecord($phoneBook);
    $middlePerson = $middlePair[0];
    if ($middlePerson == $lookupPerson) {
        $phone = $middlePair[1];
        return $phone;
    } elseif ($middlePerson > $lookupPerson) {
        return binarySearch(getFirstHalf($phoneBook), $lookupPerson);
    } elseif ($middlePerson < $lookupPerson) {
        return binarySearch(getSecondHalf($phoneBook), $lookupPerson);
    }
}

function getMiddleRecord($phoneBook)
{
    $middleIndex = getMiddleIndex($phoneBook);
    return $phoneBook[$middleIndex];
}

function getMiddleIndex($phoneBook)
{
    return floor(count($phoneBook) / 2);
}

function getFirstHalf($phoneBook)
{
    return array_slice($phoneBook, 0, getMiddleIndex($phoneBook));
}

function getSecondHalf($phoneBook)
{
    return array_slice($phoneBook, getMiddleIndex($phoneBook), count($phoneBook));
}