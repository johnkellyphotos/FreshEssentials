{Input::text([
    Input::WRAPPER_CLASS => 'form-wrapper',
    Input::LABEL => 'Text Input',
    Input::ATTRIBUTES => [
        Input::PLACEHOLDER => 'Enter some text'
    ]
])}

{Input::select([
    Input::WRAPPER_CLASS => 'form-wrapper',
    Input::LABEL => 'Select Input',
    Input::OPTIONS => [
        'Option1' => 'Option 1',
        'Option2' => 'Option 2',
        'Option3' => 'Option 3'
    ],
    Input::ATTRIBUTES => [
        Input::VALUE => 'Option2'
    ]
])}

{Input::file([
    Input::WRAPPER_CLASS => 'form-wrapper',
    Input::LABEL => 'Select Input'
])}