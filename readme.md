# Laravel DD Aproach

First approach to view capabilities of DDD on Laravel
### Events
Events are published on RabbitMQ Server. For the moment, there are two different queues
to send the event information: _Debugger_ and _Default_.

To run the listeners to the events, you need to execute in shell: 

`php artisan queue:work --queue=debugger,default`
