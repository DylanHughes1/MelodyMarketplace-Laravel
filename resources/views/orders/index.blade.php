@extends("layouts.app")
@section('Pedidos', 'Orders')
@section('content')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">

                <div class="relative overflow-x-auto shadow-sm sm:rounded-lg">

                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Direccion
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Direccion
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$order->id}}
                                </th>
                                <td class="px-6 py-4">
                                    {{$order->delivery_address}}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="orders/{{$order->id}}" id="seeMore" type="button" class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-2">Ver Más</a>
                                </td>
                            </tr>
                            @endforeach
                            {{ $orders->links() }}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection