# Strategy Pattern

The strategy pattern allows a client to perform tasks that are similar and is able to choose between them. Or in other words, a client can pick between different but similar algorithms.

## Implementation

Let's imagine an app that lets you decide which notifications you want. You can choose between all, just critical or no notifications.

Your `Notification`s consist of a message and a `Type`. However, there is no "all", "critical" or "no" type. You also don't want to add them because "all" is not a type for a notification and "no" just means no notifications.

You come to the conclusion that you want to remind people with the notifications they choose. So you abstract that functionality in a `Reminder` interface. It contains a method `getHandledNotifications` that returns the notifications that the users wants.

You further decide to create a `ReminderService` that sends the notifications. 

After that you implement the reminder cases that were specified in the first sentence. These are `AllReminder`, `CriticalReminder` and `NoReminder`.

One of those reminders is now handed over to the `ReminderService` which then calls the `getHandledNotifications` and sends the notifications.

## Some things to note

Although this example shows the strategy pattern we use a variety of other patterns.

Namely, the NullObject Pattern. Can you guess which class represents a NullObject? Sure the `NoReminder`. It represents a state where a user wants no notifications. No == null. The big advantage of this pattern is that the `ReminderService` does not have to deal with a null case. If we want no notifications sent than we can just use the `NoReminder`.

If you look at the index.php you may ask yourself: That is a lot of setup. How could this be useful in a real application?

The information which kind of notification the user wants is likely saved in a database of some sort. What you would do is using a factory (@see FactoryMethod) that would dynamically create `Reminder` objects based on the information that was saved. 

For example: You have a db field `notifications` and the value of that field is `all`. The factory will now create a `AllReminder` object that is later passed to the `ReminderService`.