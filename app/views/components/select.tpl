<div {if isset($wrapperClass)}class="form-wrapper"{/if}>
    {if isset($label)}<label for="{$id}" class="form-label">{$label}</label>{/if}
    <div class="input-group mb-3">
        <select {if isset($attributeString)}{$attributeString}{/if}>
            {if isset($options)}
                {foreach $options as $value => $display}
                    <option
                            {if $value == $attributes.value}selected{/if}
                            value="{$value}"
                    >{$display}</option>
                {/foreach}
            {/if}
        </select>
    </div>
</div>