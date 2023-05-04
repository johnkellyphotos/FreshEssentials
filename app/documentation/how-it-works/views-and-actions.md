# Fresh Views and Actions

*Actions* are the methods inside [Controllers](/Documentation/controllers/) that handle any of your data, models, and classes. The action finishes by displaying the appropriate *view*, or compiled HTML.

In an url request to the example path **/Home/sample-page/**, The 'Home' controller should have an 'action' called 'samplePage'. Note, the action name should be camel case, while the url path should be dash case.

```php
    class HomeController extends AppController
    {
        public function __construct() 
        {
            parent::__construct();
        }
        
        public function samplePage(): void
        {
            $this->display();
        }        
    }
```