<?php

namespace App\Enum;

enum VisitationType:string {
    case PRIBADI = 'pribadi';
    case DINAS = 'dinas';
    case BUSINESS = 'business';
    case PRIVATE = 'private';
}
