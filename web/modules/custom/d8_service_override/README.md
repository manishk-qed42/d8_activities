# Overriding Services in Drupal 8 with ServiceProvideBase
Activity
Override **user.auth** service and add **database** services as argument. Create new function **dbConnection()** that will return database connection and **entityTypeManager()** that will return Entity type manager in new service.
