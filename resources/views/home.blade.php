@include('base.main')
@section('content')
    <div class="container">
        <div class="pt-3 justify-center align-center w-full max-w-xs">
            <form method="POST" action="{{ route('home.show') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                        Username
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="username" name="username" type="text" placeholder="Username">
                </div>

                <div class="flex items-center justify-between">
                    <button class="font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Get comments
                    </button>

                </div>
            </form>
        </div>
        @if (isset($data))

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Username</th>
                        <th scope="col">Country</th>
                        <th scope="col">Rating</th>
                        <th scope="col">Time Ago</th>
                        <th scope="col">User Comment</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <th scope="row">{{$loop->index + 1}}</th>
                            <td>{{$item['username']}}</td>
                            <td>{{$item['country']}}</td>
                            <td>{{$item['stars']}}</td>
                            <td>{{$item['time_ago']}}</td>
                            <td>{{$item['user_comment']}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        @endif
    </div>
