1. we declare the event
2. we use implement the dispatcher somewhere (in this case in the form_submit)
3. we hook there and change the saved data with service class (event subscriber) 
event subscriber could have a random name (webhamsubscriber) 
Since WebhamSubscirber is a service - it has to be registered as a service.