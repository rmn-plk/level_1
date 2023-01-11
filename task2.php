<?php
function daysTillBirthday(string $date) : int
{
    $isDateValid = date_parse($date);
    if ($isDateValid["error_count"])
        throw new Error('Wrong date format');
    $birthday = new DateTime($date);
    $now = new DateTime(date('d-m-Y'));
    if ($now > $birthday)
        throw new Error("Date is not correct");
    $diff = $now->diff($birthday);
    return $diff->days;
}

echo daysTillBirthday('28-01-2023');