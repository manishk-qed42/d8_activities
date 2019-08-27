# Services, Dependency Injection & Dependency Injection Container(DIC)
Activity
Make a sample PHP application more re-usable, independent & testable.
#### Steps
 - Clone the application from Github: git clone git@github.com:piyuesh23/di_demo
 - Create two services one for notify and another for subscriber.
 - Send email notification to only subscriber user when new article is created.
 - Create a constructor & initialize **@database** service dependencies in it. Create function **getSubscribers()** that will return list of subscribers in JSON format on **/get-subscriber** url.
