<div class="d-none" id="upload-attachment">
    {{ Form::file('attachment', ["id" => "attachment"]) }}
</div>
<a id="upload-button"
   onClick="
        $('#attachment').click();
        $('#upload-attachment').toggle();
        //$('#upload-button').hide()"
   class="pointer float-sm-right mt-3 mt-sm-0 btn btn-accent text-white">
    @iconMaterial(attach_file) {{ __('admin.attachFile') }}
</a>
<div class="attachment-selected float-right font-italic text-secondary text-right pr-4"></div>

