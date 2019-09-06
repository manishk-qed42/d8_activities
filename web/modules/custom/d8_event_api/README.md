# Event API: Tapping into page request process in Drupal 8
Activity
Inject access-control-allow-origin:* header to a page response, if the path is prefixed with /node.
##### Steps:
 - Subscribe to kernel::response event & attach your custom listener.
 - The listener should extract the path information & check if its prefixed with /node.
 - The header should be injected into the request header.

Discuss about the events available with Drupal 8 core. https://api.drupal.org/api/drupal/core!core.api.php/group/events/8.2.x



# Event API extended: Creating custom events & subscribing to them in Drupal 8
Activity
Create a custom event called as node.insert.
##### Steps:
 - Dispatch the event whenever a new node is created on Drupal site via hook_node_insert().
 - Event dispatcher should be responsible for sending the node object to the event listeners.
 - Subscribe to this event & attach another listener. This listener should add a watchdog log entry with the node title being created.
