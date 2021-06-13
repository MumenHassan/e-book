@if(session('success'))
<script>

    {{--Swal.fire({--}}
    {{--    position: 'top-center',--}}
    {{--    icon: 'success',--}}
    {{--    title: '{{session("success")}}',--}}
    {{--    showConfirmButton: false,--}}
    {{--    timer: 2000--}}
    {{--})--}}

    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    Toast.fire({
        icon: 'success',
        title: '{{session("success")}}',
    })
</script>
    @endif
