# Adapter Pattern

With the adapter pattern we can make interfaces/implementations compatible that would otherwise be incompatible.

This is a super powerful concept that uses composition in order to extend functionality. It is a good example for the open closed principle.

## Implementation

Let's imagine you write a CMS where users can manage pages. These pages should be shown in a list. We use the class `ProjectTree` to build a tree that we can display.

Now for simplicity we don't nest pages, so we only have one level. All children of a tree with no further children are called leafs, so we create an interface `Leaf` to represent them.

We decide to implement two `Leaf` types. More concrete: `Page` and `SymLink`. 

Now we are able to `add()` new pages and symlinks to the `ProjectTree`.

After that we want to `display()` the tree. All fine and good. 

A while later someone suggested that we also need to display directories in the tree. However, the concept of a directory is already implemented in the form of `Directory`.

For some reason we can't change the `Directory` class and make it compatible with the `Leaf` interface (`Directory` could be a third party). We also don't want to change the `PageTree` because we only want to process `Leaf`s and nothing else.

This the part where the adapter pattern comes into play. Instead of changing the hole system we introduce a `DirectoryLeafAdapter` that makes the `Directory` class compatible with the `Leaf` interface.

The `DirectoryLeafAdapter` implements the `Leaf` interface which makes it a valid leaf. It also receives a `Directory` in the constructor.

The directory has no concept of a title or type, but we can map these by implementing the interface in the adapter class. In the class we map the basename of the directory to the title of the leaf, and we assign it a type although the directory doesn't have a type.

To make it short: The `DirectoryLeafAdapter` pretends to be a `Leaf` on the outside but is a `Directory` on the inside. ("is a" is not meant as the UML like "is a")

## Some things to note

See how the open closed principle shines here? We extend our system by introducing a new class `DirectoryLeafAdapter` instead of changing multiple files (`PageTree`, `Directory`).

