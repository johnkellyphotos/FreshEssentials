<div {if isset($wrapperClass)}class="form-wrapper"{/if}>
    {if isset($label)}<label for="{$id}" class="form-label">{$label}</label>{/if}
    <div class="input-group mb-3">
        <input type="text" id="{$id}" {if isset($attributeString)}{$attributeString}{/if}/>
        {if isset($description)}<span>{$description}</span>{/if}
    </div>
</div>