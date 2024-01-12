<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
@include('common.nav');
<div class="my-12 table w-full p-2">
    <h5>Authenticate User List</h5>
    <table class="w-full border">
        <thead>
            <tr class="bg-gray-50 border-b">
                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                    <div class="flex items-center justify-center">
                        S.No
                    </div>
                </th>
                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                    <div class="flex items-center justify-center">
                        Name
                    </div>
                </th>
                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                    <div class="flex items-center justify-center">
                        Email
                    </div>
                </th>
                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                    <div class="flex items-center justify-center">
                        Action
                    </div>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($userData as $data)
                <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                    <td class="p-2 border-r">{{ $data->id }}</td>
                    <td class="p-2 border-r">{{ $data->name }}</td>
                    <td class="p-2 border-r">{{ $data->email }}</td>
                    <td>
                        @if (!empty(Auth::user()->id))
                            <a href="{{ 'register' . $data->id }}"
                                class="bg-blue-500 p-2 text-white hover:shadow-lg text-xs font-thin">Edit</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

</html>
