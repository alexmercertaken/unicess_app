<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Document</title>
</head>
<body>


    <div class="container">
    <div class="row">
    <div class="col-mid-2"></div>
    <div class="col-mid-8">

    <input type="text" name="search" id="search" class="mb-3 form-control" placeholder="Search here...">
    lowell
    <div class="table-data">
    <table class="table table-bordered">

        <thead>
          <tr>

            <th scope="col">First</th>
            <th scope="col">Middle</th>
            <th scope="col">Last</th>
            <th scope="col">Gender</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">Contact</th>
            <th scope="col">Faculty</th>
            <th scope="col">Role</th>
            <th scope="col">Authorize</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($users as $user )

          <tr>
            <td>{{ $user->first_name }}</td>
            <td>{{ $user->middle_name }}</td>
            <td>{{ $user->last_name }}</td>
            <td>{{ $user->gender }}</td>
            <td>{{ Str::limit($user->email, 15) }}</td>
            <td>{{ Str::limit($user->address, 10) }}</td>
            <td>{{ Str::limit($user->contact_number, 5) }}</td>
            <td>{{ $user->faculty == null ? 'Beneficiary/Partners' : $user->faculty->name }}</td>

            <td>
                @if (!empty($user->getRoleNames()))
                   @foreach ($user->getRoleNames() as $role )
                       <span class=" text-yellow-500  rounded-lg ">{{ $role }}</span>
                   @endforeach
               @endif
           </td>

            <td>
                @if ($user->authorize == '2')
                    <span class="text-violet-500">declined</span>
                @elseif($user->authorize == '1')
                    <span class="text-green-500">approved</span>
                @else
                    <span class="text-red-600">pending</span>
                @endif


            </td>

            <td>
                <a href="" class="btn btn-success"><i class="las la-edit"></i></a>
                <a href="" class="btn btn-danger delete_user" data-id = "{{ $user->name }}"><i class="las la-times"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    {{ $users->links()}}
</div>
</div>
</div>



    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>


    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>


    <script>
    $(document).on('keyup', function(e){
        e.preventDefault();
        let search_string = $('#search').val();
        $.ajax({
            url:"{{ route('live.search') }}",
            method: 'GET',
            data: {search_string:search_string},
            success:function(res){
                $('.table-data').html(res);
                if(res.status == 'nothing_found'){
                    $('.table-data').html('<span class="text-danger">'+'Nothing Found '+' </span>');
                }
            }
        })
    })

    </script>


</body>
</html>
