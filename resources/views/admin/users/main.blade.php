<x-admin-layout>

    <div class="">
        <livewire:user-show>
    </div>


    @section('script')
    <script>
        window.addEventListener('close-modal', event => {
            $('#userModal').modal('hide');
            $('#updateUserModal').modal('hide');
            $('#deleteUserModal').modal('hide');
        })


    </script>
    @endsection




</x-admin-layout>
