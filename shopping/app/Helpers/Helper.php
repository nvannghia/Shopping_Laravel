<?php
// namespace App\Helpers

use App\Models\Setting;

function getConfigValueByConfigKey($configKey)
{
    $settingInstance = Setting::Where('config_key', $configKey)->first();
    if ($settingInstance != null) {
        return $settingInstance->config_value;
    }
    return null;
}
