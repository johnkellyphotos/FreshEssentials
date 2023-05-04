# Inputs

Component inputs make standardizing inputs across your application incredibly easy. Inside your view template (.tpl), simply invoke the `Input` class method for the corresponding input type.

## Example

```php
<h2>Sample text input inside the template</h2>

{Input::text([
    Input::WRAPPER_CLASS => 'form-wrapper',
    Input::LABEL => 'Text Input',
    Input::ATTRIBUTES => [
        Input::PLACEHOLDER => 'Enter some text'
    ]
])}
```

In the code above, 'Input' contains static properties and methods accessible to Smarty. `Input::text()` is a static method which returns the HTML for a text input. You can pass an optional array to any of the inputs to specify attributes and formatting. Each input will automatically generate a unique ID, you cannot specify an ID.

The code above will output HTML as follows:

```php
<h2>Sample text input inside the template</h2>

<div class="form-wrapper">
    <label for="text-6435e30b5f5e3" class="form-label">Text Input</label>
    <div class="input-group mb-3">
        <input type="text" id="text-6435e30b5f5e3" placeholder="Enter some text" class="form-control form-control" name="text-6435e30b5f5e3">
    </div>
</div>
```
Which will show in a browser as seen below:

<div class="form-wrapper">
    <label for="text-6435e30b5f5e3" class="form-label">Text Input</label>
    <div class="input-group mb-3">
        <input type="text" id="text-6435e30b5f5e3" placeholder="Enter some text" class="form-control form-control" name="text-6435e30b5f5e3">
    </div>
</div>

It is important to note that a trailing comma (,) at the end of an array or array values passed to an `Input` method will break the Smarty parses and throw an error.


## Input types

### Text
`Input::Text()` accepts an array of parameters. ALL parameters are optional. The 'attributes' parameter will ONLY accept attributes listed below. All others will be ignored. 
```php
    Input::Text([
        Input::ATTRIBUTES (array) => [
            Input::AUTOCOMPLETE (boolean) => false,
            Input::CLASSNAME (array) => ['add', 'a-lib', 'name']
            Input::DATA_API_URL (string) =>  '/API/path/to/endpoint/'
            Input::DATA_ATTR (array) => ['custom-attr' => '123' ],
            Input::DATA_TRIGGER_EVENT (array) => ['click', 'keydown'],
            Input::NAME (string) => 'input-name',
            Input::PLACEHOLDER (string) => 'Enter some text...',
            Input::REQUIRED (boolean) => false,
            Input::STYLE (array) => ['font-size' => '13px', 'font-style' => 'italic'],
            Input::VALUE (string) => 'Prefill a value here'
        ],
        Input::WRAPPER_CLASS (array) => [
            'add-a-lib-to-wrap-the-entire-input',
            'add-another-lib'
        ],
        Input::LABEL (string) => 'Add a label to your input',
        Input::DESCRIPTION (string) => 'Add a description to your input',
    ]);
```

2. Select Inputs

3. File Inputs