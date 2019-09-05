# Custom Blocks in Drupal 8
Activity
Create a custom block to display weather data using data from http://api.openweathermap.org/

##### Steps:
- Create a custom block that takes in a configuration for city name.
- Create a service to pull data from http://api.openweathermap.org/data/2.5/weather?q=<City name>&appid=<APPID>. (Hint: use Guzzle library included in drupal 8). The service should be able to return the following attributes as a response:
    - temp_min
    - temp_max
    - pressure
    - humidity
    - wind -> speed
- Use the app id config form created Config Forms with Drupal 8 to store the APP ID configuration (Use 2ae6e13f8875b87d47454e897e6da198 as a dummy APP id.)
- Create a theme function using hook_theme().
- Write a twig template to render the data collected above using <div> & <span> with appropriate classes.
- Place the block at 2 different places with configuration for city name as: London & Mumbai.


# Injecting JS & CSS in Drupal 8
Activity
Attaching Css & Js under different circumstances to Drupal 8.
##### Steps
- Case 1:
  - Add CSS to render the block created in Custom Blocks in Drupal 8 with a border of 1 px & background-color: Blue.
  - Add https://nnattawat.github.io/flip/ library & custom js to flip the blocks created.
- Case 2:
  - Add CSS to render a border on all the images appearing on your website.
