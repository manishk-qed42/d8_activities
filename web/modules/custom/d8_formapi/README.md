# Form API in Drupal 8
Activity
Create a route & render a simple form on the page.
##### Steps:
 - Create a new route for rendering the form at /simple-form.
 - Create a form by extending Formbase class including the following fields:
 - Name: textfield with a minimum of 5 characters (validation for the same)
 - On submission, data entered in Name field should be displayed on top of the page as a success message else validation warning should be displayed.


# Form API Extended: DIC & Database
Activity
Create a new form with fields as : first name, last name & email. Create a new route **/dic-form** to render these fields.
##### Steps:
- Use the install file to create DB schema for the table: d8_demo with columns first_name, last_name & email.
- Create a new service to fetch & write the data into the table. Inject DB connection service into this one. Fetcher service should fetch the last value submitted in DB & populate the same as default values on the form.
- Inject the service added above into the form by overriding the create Method provided by containerInjectionInterface.
- Use this service in the submit callback to save the first name, last name & email value in the table created in step 1.


# Form API Extended: #states & AJAX
Activity
- Use form #states to toggle field visibility
- User AJAX with form to populate field values dynamically.

##### Steps:
- Add a select list to the Form: Qualification: U.G/P.G/Other
- Selecting other option should display another text-field: If others, please specify
- Add a select list named country: with values as India & UK.
- Selecting either of the 2 should display another select-list field & populate it with states in the country.(The source of this dependency data will be hard-coded as an array in the module itself).
- We should be able to track the last submission time for this form. (Hint: Use states API in Drupal 8 https://www.drupal.org/docs/8/api/state-api )


# Config Forms with Drupal 8
Activity
Create an admin config form & save its data back into DB.
##### Steps:
- Create a new route **admin/weather-config**.
- Add a text field to the form: with title as App ID.
- Make sure the configuration is saved into a config variable **your_module.settings.appid**.
- Load the value from DB if there is one saved else, load the default value from **config/install**.

