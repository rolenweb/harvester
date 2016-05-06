<?php
/**
 * @var \omnilight\scheduling\Schedule $schedule
 */

// Place here all of your cron jobs
namespace console\config;

use common\models\ScheduleYp;


$list = ScheduleYp::find()->where(['status' => ScheduleYp::ACTIVE])->all();
if ($list != NULL) {
	foreach ($list as $item) {
		$var = 'yp '.$item->id;
		$schedule->command($var)->cron('* * * * *');
	}
}


//$schedule->command($var1)->cron('* * * * *');
//$schedule->command('notice')->cron('* * * * *');
//$schedule->command('contract-nonconformance')->cron('* * * * *');
//$schedule->command('contract-nonconformance')->everyThirtyMinutes();
//$schedule->command('update-currency-rate')->dailyAt('10:25');
//$schedule->command('update-xero-invoice')->dailyAt('01:00');
//$schedule->command('update-xero-credit-notes')->dailyAt('02:00');
//$schedule->command('update-xero-cache-journal')->dailyAt('03:00');