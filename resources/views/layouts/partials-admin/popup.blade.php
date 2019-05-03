
<script>
    var confirmDelete = "{{ __('admin.areYouSure') }}";
    var csrf_token    = "{{ csrf_token()  }}";
</script>
<div id="popup" class="popup" style="display:none">
    <div id="popupContent">
    </div>
</div>