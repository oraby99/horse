<?php 
namespace App\Enums;
 
enum AdvertismentStatus: string
{
    case NORMAL = 'normal';
    case SPECIAL = 'special';
    case FIXED = 'fixed';

}