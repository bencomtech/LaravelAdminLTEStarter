<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    const MAX_EXECUTION_TIME = 60 * 5;
    const USER_TIMEZONE = "Asia/Bangkok";
    const USER_LANGUAGE = "th_TH";

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->setPHPini();
        $this->createCarbonMacros();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    private function setPHPini()
    {
        ini_set('max_execution_time', self::MAX_EXECUTION_TIME);
    }

    private function createCarbonMacros()
    {
        $userTimezone = self::USER_TIMEZONE;
        $userLanguage = self::USER_LANGUAGE;

        Carbon::macro('thFormat', static function ($format) use ($userTimezone, $userLanguage) {
            $date = self::this()->copy()->tz($userTimezone)->locale($userLanguage);
            $year = $date->formatLocalized('%Y') + 543;
            return Carbon::create($year, $date->month, $date->day, $date->hour, $date->minute, $date->second, $date->tz)->format($format);
        });

        Carbon::macro('usFormat', static function ($format) use ($userTimezone, $userLanguage) {
            $date = self::this()->copy()->tz($userTimezone)->locale($userLanguage);
            $year = $date->formatLocalized('%Y') - 543;
            return Carbon::create($year, $date->month, $date->day, $date->hour, $date->minute, $date->second, $date->tz)->format($format);
        });
    }
}
