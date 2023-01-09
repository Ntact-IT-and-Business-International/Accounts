<script src="{{ asset('dist/js/jquery.min.js')}}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{ asset('dist/js/bootstrap.bundle.min.js')}}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{ asset('dist/js/perfect-scrollbar.jquery.min.js')}}"></script>
<!--Wave Effects -->
<script src="{{ asset('dist/js/waves.html')}}"></script>
<!--Menu sidebar -->
<script src="{{ asset('dist/js/sidebarmenu.js')}}"></script>
<!--Custom JavaScript -->
<script src="{{ asset('dist/js/custom.min.js')}}"></script>
<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->
<!--morris JavaScript -->
<script src="{{ asset('dist/js/raphael-min.js')}}"></script>
{{--<script src="{{ asset('dist/js/morris.min.js')}}"></script>--}}
<script src="{{ asset('dist/js/jquery.sparkline.min.js')}}"></script>
<!-- Popup message jquery -->
<script src="{{ asset('dist/js/jquery.toast.js')}}"></script>
<!-- Alpine v3 -->
<script defer src="{{asset('livewire_asset/cdn.js')}}"></script>
<link href="{{asset('livewire_asset/tailwind.css')}}" rel="stylesheet">
@livewireScripts
@livewire('livewire-ui-modal')