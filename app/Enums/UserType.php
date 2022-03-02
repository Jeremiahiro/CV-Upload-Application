<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Admin()
 * @method static static Recruiter()
 * @method static static Jobseeker()
 */
final class UserType extends Enum
{
    const Admin =   0;
    const Recruiter =   1;
    const Jobseeker = 2;
}
