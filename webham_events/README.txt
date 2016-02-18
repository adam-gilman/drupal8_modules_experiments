1. we declare the event (/src/DemoEvent.php)

2. we use the dispatcher somewhere (in this case in the submitForm in /src/Form/DummyEntityForm.php) with the declared event

3. we hook there and change the saved data with event subscriber (service class), registered here webham_events/webham_events.services.yml and declared here /src/EventSubscriber/WebhamSubscriber.php


