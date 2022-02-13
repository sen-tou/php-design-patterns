# Observer Pattern

With the observer pattern we can watch objects that perform certain tasks.

## Implementation

For this example we have a `Battery` that can be charged or discharged using the `setCharge()` method.

When that happens we want to notify other parts of the application to perform a variety of tasks.

Now the single responsibility principle (SCP) states that a method should only do one thing. In our case setting a
charge to the battery.

The open closed principle (OCP) states that a class or method should be open for addition but closed for change. Meaning
that the logic that is performed on that change cannot be defined in that method because we would need to change this
method if the logic changes.

If we apply the SRP and OCP to our battery we come to the conclusion that we cannot put that logic inside
the `setCharge()` method.

So instead we introduce a mechanism to dynamically register observers that get notified if the charge of the battery
changes.

For that the battery implements the `Observerable` interface that contains a method to `register()` observers and
a `notify()` method to invoke the observers.

Each `Observer` has a method `onNotification` that is invoked when the observable triggers a notification.
The `onNotification` method gets an optional `Payload` with information about the change. It can then perform its
actions on that payload.

## Some things to note

The `Payload` is a generic because a payload could be anything from a string to an object. This way the implementor can
specify a concrete type that the payload will handle which makes working with it much more predictable.

This implementation is using the push model meaning that the observable pushes the changes to the observers. We could
also have implemented the opposite way where the observers ask the observables for changes. This would be called pull
model. I found this article
on ["Push vs Pull in Software Development"](https://mattlaw.dev/blog/push-vs-pull-in-software-development/) that
explains the two a little more if you're interested.

## Real life examples

A famous implementation of the observer pattern is
the [Symfony EventDispatcher Component](https://symfony.com/doc/current/components/event_dispatcher.html).