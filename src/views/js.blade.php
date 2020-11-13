<script>
    // const SwalModal = (icon, title, html) => {
    //     Swal.fire({
    //         icon,
    //         title,
    //         html
    //     })
    // }

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

    function SwalAlert(icon, title, timeout = 7000) {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: timeout,
            onOpen: function() {
                // Toast.addEventListener('mouseenter', Swal.stopTimer)
                // Toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon,
            title
        })
    }

    document.addEventListener('DOMContentLoaded', function() {
        // this.livewire.on('swal:modal', data => {
        //     SwalModal(data.icon, data.title, data.text)
        // })

        // this.livewire.on('swal:confirm', data => {
        //     SwalConfirm(data.icon, data.title, data.text, data.confirmText, data.method, data.params, data.callback)
        // })

        Livewire.on('swal:toast', function(data) {
            SwalAlert(data.icon, data.title, data.timeout)
        })
    })
</script>