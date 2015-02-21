<?php


/**
 * @param string $type
 * @param bool   $time
 *
 * @return int
 *
 * @author Will
 */
function flat_date($type = 'day', $time = false)
{
    if ( $time === false ) {
        $time = time();
    }
    switch ( $type ) {
        default:
        case 'day':
            return mktime(0, 0, 0, date("n", $time), date("j", $time), date("Y", $time));
            break;
        case 'hour':
            return mktime(date("G", $time), 0, 0, date("n", $time), date("j", $time), date("Y", $time));
            break;
    }
}