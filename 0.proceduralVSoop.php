<?php

class User
{
    public int $age = 0;
}

$someUser = new User();

function procedural_HasLegalAge(int $userAge): bool
{
    return $userAge > 18;
}

procedural_HasLegalAge($someUser->age);

function oop_HasLegalAge(User $user): bool
{
    return $user->age > 18;
}

oop_HasLegalAge($someUser);