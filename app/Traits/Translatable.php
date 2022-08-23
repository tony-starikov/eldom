<?php

namespace App\Traits;

use Illuminate\Support\Facades\App;

trait Translatable
{
    protected $defaultLocale = 'ua';

    public function __($fieldName)
    {

        if (App::getLocale() !== null) {
            $locale = App::getLocale();
        } else {
            $locale = $this->defaultLocale;
        }

        if ($locale === 'ua') {
            $fieldName .= '_ua';
        } else {
            $fieldName .= '_ru';
        }

        return $this->$fieldName;
    }

}
