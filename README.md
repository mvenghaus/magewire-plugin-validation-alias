# Magewire Plugin - Validation Alias

Although it is possible on magewire to translate the error messages when using the form component, it needs a little more effort than it should.

### Example

Consider you have 2 fields "name" and "email", both have the rule "required".

To translate the error message you have to add both complete messages to your translation file:

```
"The name is required"
"The email is required"
```

The Rakit Validation module which handles the errors in the background comes with much more error messages.

```
"The :attribute is required","The :attribute is required"
"The :attribute is not valid email","The :attribute is not valid email"
"The :attribute only allows alphabet characters","The :attribute only allows alphabet characters"
"The :attribute must be numeric","The :attribute must be numeric"
...
```

So instead of translating the whole message we just translate the field name. The original error message with placeholders is translated by this module.

Rakit Validation has already the functionality to do this .. called "alias".

### How to translate?

Just use the ValidationAlias class to add the aliases before you validate.

```
$validationAlias = ObjectManger::getInstance()->get(\MVenghaus\MagewirePluginValidationAlias\Model\ValidationAlias::class);

$validationAlias->add('name', __('name'));
$validationAlias->add('email', __('email'));

// or all at once
$validationAlias->addMultiple([
    'name' => __('name'),
    'email' => __('email'),
]);
```
