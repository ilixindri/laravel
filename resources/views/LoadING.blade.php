<link rel="stylesheet" href="{{ asset('css/LoadING.css') }}">
<link rel="stylesheet" href="{{ asset('css/ReSet.css') }}">
<div class="loading-container">
    <div class="loading"></div>
</div>
<script src="{{ asset('js/Get.js') }}"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        @isset($Route)
            get('/{{ $Route }}');
            window.history.pushState({}, '', '/{{ $Route }}');
        @endisset
    });
</script>