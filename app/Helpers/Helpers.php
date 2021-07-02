<?php
function array_remove_empty($haystack)
{
    foreach ($haystack as $key => $value) {
        if (is_array($value)) {
            $haystack[$key] = array_remove_empty($haystack[$key]);
        }

        if (empty($haystack[$key])) {
            unset($haystack[$key]);
        }
    }

    return $haystack;
}
