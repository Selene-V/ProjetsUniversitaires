cordova.define('cordova/plugin_list', function(require, exports, module) {
  module.exports = [
    {
      "id": "cordova-plugin-datetimepicker.plugin",
      "file": "plugins/cordova-plugin-datetimepicker/www/plugin.js",
      "pluginId": "cordova-plugin-datetimepicker",
      "clobbers": [
        "DateTimePicker"
      ],
      "runs": true
    },
    {
      "id": "cordova-plugin-splashscreen.SplashScreen",
      "file": "plugins/cordova-plugin-splashscreen/www/splashscreen.js",
      "pluginId": "cordova-plugin-splashscreen",
      "clobbers": [
        "navigator.splashscreen"
      ]
    },
    {
      "id": "cordova-sqlite-storage.SQLitePlugin",
      "file": "plugins/cordova-sqlite-storage/www/SQLitePlugin.js",
      "pluginId": "cordova-sqlite-storage",
      "clobbers": [
        "SQLitePlugin"
      ]
    }
  ];
  module.exports.metadata = {
    "cordova-plugin-datetimepicker": "1.0.0",
    "cordova-plugin-splashscreen": "5.0.3",
    "cordova-plugin-whitelist": "1.3.4",
    "cordova-sqlite-storage": "4.0.0"
  };
});