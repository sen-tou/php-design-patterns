# Memento Pattern

With the Memento pattern we can realize a simple undo mechanic. This is just one implementation, there are other approaches as well.

## Implementation 

Lets look at the `Booking`. It represents a very basic booking model with two properties `number` and `date`.

Now we want to be able to undo actions after they occurred to the model. However we don't want to violate the single responsibility principle. A booking model should not care about keeping track of its changes. Therefore we need to introduce a different approach to save the booking states and restore them if needed.

We do this by using a `History` that holds a list of states. It is generic meaning that we depend on an interface `StateInterface`. With that we could easily track different models if we wanted to.

This interface is empty but we could easily define methods that all state implementations should have. For example making all states serializeable so that we can export them to some sort of cache or database.

To track the state we need to implement a concrete class that holds the booking state. The `BookingState` (memento) will receive the concrete `Booking` model and saves its state. 

`Booking` and `BookingState` are tightly coupled. In this simple example its find. However if you want to support multiple states with different structures you likely want to use a proper interface.

To track a change we save the current state to a `BookingState` and `push()` it to the `History`.

Right after we `undo()` the change and get back the previous state.

To apply this state to the booking model we `restore()` the state of the `BookingState` (memento) by giving it to the `restore()` method.

This way the `Booking` is dependent to the `BookingState` but loosely coupled because we don't need it in order to full fill the business logic of the `Booking`. As already mentioned we could decouple them by using an interface.

## Some things to note

PHP doesn't support real Generics like other programming languages do. With the current implementation we can't make sure that exactly one concrete type of `StateInterface` is inserted/handled by the `History`. This leaves it error prone. We can however use libraries like [Psalm](https://psalm.dev/) to check for that. But this would to go beyond the scope of this example.

In the example we don't handle the case of no changes in the history. This would throw errors because we can't restore a previous state if there is no previous state. How you would handle the error would depend on your needs.