<script>
    (function() {
        if (typeof(Swal) != "undefined") {
            window.swal = Swal
            return
        } else if (typeof(swal) != "undefined") {
            window.swal = swal
            return
        } else {
            console.error(
                "Sweetalert is missing. see https://github.com/akhled/livewire-sweetalert#1-include-javascript");
        }
    })()

    function SwalConfirm(params) {
        var options = params.options,
            event;

        if (options.event) {
            event = options.event
            delete options.event
        }

        window.swal.fire(options).then(function(result) {
            if (result.value && event) {
                return Livewire.dispatch(event)
            }
        })
    }

    function SwalAlert(data) {
        window.swal.fire({
            toast: true,
            position: 'bottom-end',
            showConfirmButton: false,
            timer: data.timeout,
            titleText: data.titleText,
            icon: data.icon,
            timerProgressBar: true,
            didOpen: function(toast) {
                toast.addEventListener('mouseenter', window.swal.stopTimer)
                toast.addEventListener('mouseleave', window.swal.resumeTimer)
            }
        })
    }

    document.addEventListener('DOMContentLoaded', function() {
        if (Livewire == undefined) return;

        Livewire.on('swal:fire', function(data) {
            window.swal.fire(data)
        })

        Livewire.on('swal:confirm', function(data) {
            SwalConfirm(data)
        })

        Livewire.on('swal:toast', function(data) {
            SwalAlert(data)
        })
    })
</script>
