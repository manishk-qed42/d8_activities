# Permissions in Drupal 8
Activity
Create the permission "Access training content" & use it in the Routing activity.

Hint: All sort of metadata that existed in Drupal7 has been moved in form of YAML.

Extras:
 - Allow everyone: _access: TRUE
 - Check if user is logged in: _user_is_logged_in: TRUE
 - Check if a user has a permission: _permission: 'permission name'
 - Check if a user has a role:
   -  _role: 'role1,role2' {AND}
   - _role: 'role1+ role2) {OR}


# Permissions Extended: Creating custom access check - 1
Activity
Create a custom access checker based on current node. If the author & currently logged in user match, allow access else deny.

Apply this permission to list/{node} page.
Hints:
 - Create a custom service tagged with access_check
 - Implement [AccessInterface](https://api.drupal.org/api/drupal/core!lib!Drupal!Core!Routing!Access!AccessInterface.php/interface/AccessInterface/8.2.x) & add logic to access method.


# Permissions Extended: Creating custom access check - 2
Activity
- Move the logic for access check added as a part of **Permissions Extended: Creating custom access check - 1** into the controller created as a part of **Routing in Drupal 8**.
- Update routing.yml to use this access check for route list/{node} page.

Discuss which one is useful & when?
