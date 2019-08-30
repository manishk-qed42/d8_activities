<?php

namespace Drupal\d8_custom_block\Services\Weather;

/**
 * Weather data manager interface.
 */
interface WeatherManagerInterface {
  /**
   * Get weather details.
   * 
   * @param string $city_name
   *   City Name for fetch weather data.
   */
  public function getWeatherDetails($city_name);

}
