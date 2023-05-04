<h1>You currently have {if !empty($currentColorSelection)}chosen the color '<span style="color:{$currentColorSelection};">{$currentColorSelection}</span>'{else}not chosen a color{/if}.</h1>

{Form::open()}

{Input::select([
    Input::WRAPPER_CLASS => 'form-wrapper',
    Input::LABEL => 'Select a color',
    Input::OPTIONS => $colors,
    Input::ATTRIBUTES => [
        Input::VALUE => {$currentColorSelection},
        Input::NAME => 'color-picker'
    ]
])}

{Input::Submit()}

{Form::close()}