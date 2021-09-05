<?php
/**
 * Created by PhpStorm.
 * User: Matveev.Andrey
 * Date: 05.09.2021
 * Time: 15:12
 */

use yii\base\Application;

/**
 * Yii bootstrap file.
 * Used for enhanced IDE code autocompletion.
 */
class Yii extends \yii\BaseYii
{
    /**
     * @var \yii\console\Application|\yii\web\Application|Application the application instance
     */
    public static $app;
}

/**
 * Class BaseApplication
 * Used for properties that are identical for both WebApplication and ConsoleApplication
 *
 */
abstract class BaseApplication extends Application
{
}
