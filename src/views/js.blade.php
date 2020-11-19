<script>
    // const SwalConfirm = (icon, title, html, confirmButtonText, method, params, callback) => {
    //     Swal.fire({
    //         icon,
    //         title,
    //         html,
    //         showCancelButton: true,
    //         confirmButtonColor: '#3085d6',
    //         cancelButtonColor: '#d33',
    //         confirmButtonText,
    //         reverseButtons: true,
    //     }).then(result => {
    //         if (result.value) {
    //             return livewire.emit(method, params)
    //         }

    //         if (callback) {
    //             return livewire.emit(callback)
    //         }
    //     })
    // }

    function SwalAlert(data) {
        Swal.fire({
            toast: true,
            position: 'bottom-end',
            showConfirmButton: false,
            timer: data.timeout,
            titleText: data.titleText,
            icon: data.icon,
            timerProgressBar: true,
            didOpen: function(toast) {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
    }

    document.addEventListener('DOMContentLoaded', function() {
        if (Livewire == undefined) return;

        Livewire.on('swal:fire', function(data) { Swal.fire(data) })

        // this.livewire.on('swal:confirm', data => {
        //     SwalConfirm(data.icon, data.title, data.text, data.confirmText, data.method, data.params, data.callback)
        // })

        Livewire.on('swal:toast', function(data) { SwalAlert(data) })
    })
</script>