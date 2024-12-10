<x-layout-admin title="Admin">

    <section class="w-full py-10 px-5 ">
    
        <!-- Grid for primary metrics -->
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <!-- Users Card -->
            <div class="flex flex-col items-center bg-white p-6 rounded-lg shadow-md shadow-gray-500">
                <h2 class="text-lg font-semibold text-blue-700">Users</h2>
                <p class="text-3xl font-bold text-gray-800 mt-3">{{ count($users) }}</p>
            </div>
    
            <!-- Orders Card -->
            <div class="flex flex-col items-center bg-white p-6 rounded-lg shadow-md shadow-gray-500">
                <h2 class="text-lg font-semibold text-green-700">Orders</h2>
                <p class="text-3xl font-bold text-gray-800 mt-3">{{ count($orders) }}</p>
            </div>
    
            <!-- Products Card -->
            <div class="flex flex-col items-center bg-white p-6 rounded-lg shadow-md shadow-gray-500">
                <h2 class="text-lg font-semibold text-red-700">Products</h2>
                <p class="text-3xl font-bold text-gray-800 mt-3">{{ count($products) }}</p>
            </div>
    
            <!-- Revenue Card -->
            <div class="flex flex-col items-center bg-white p-6 rounded-lg shadow-md shadow-gray-500">
                <h2 class="text-lg font-semibold text-purple-700">Revenue</h2>
                <p class="text-3xl font-bold text-gray-800 mt-3">${{ $revenue }}</p>
            </div>
        </div>
    
        <!-- Grid for additional metrics -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 mt-10 gap-6">
            <!-- Users Without Address Card -->
            <div class="flex flex-col items-center bg-white p-6 rounded-lg shadow-md shadow-gray-500">
                <h2 class="text-lg font-semibold text-blue-700">Users Without Address</h2>
                <p class="text-3xl font-bold text-gray-800 mt-3">{{ $usersWithoutAddress }}</p>
            </div>
    
            <!-- Most Paying User -->
            <div class="flex flex-col items-center bg-white p-6 rounded-lg shadow-md shadow-gray-500">
                <h2 class="text-lg font-semibold text-yellow-700">Most Paying User</h2>
                @if ($mostPayingUser)
                    <p class="text-xl font-semibold text-gray-800 mt-3">{{ $mostPayingUser['user']->name }} (${{ $mostPayingUser['totalSpent'] }})</p>
                @else
                    <p class="text-xl font-semibold text-gray-800 mt-3">No data available</p>
                @endif
            </div>
    
            <!-- Most Ordered Product -->
            <div class="flex flex-col items-center bg-white p-6 rounded-lg shadow-md shadow-gray-500">
                <h2 class="text-lg font-semibold text-red-700">Most Ordered Product</h2>
                @if ($mostOrderedProduct)
                    <p class="text-xl font-semibold text-gray-800 mt-3">{{ $mostOrderedProduct['product']->name }} ({{ $mostOrderedProduct['orderedCount'] }} orders)</p>
                @else
                    <p class="text-xl font-semibold text-gray-800 mt-3">No data available</p>
                @endif
            </div>
    
            <!-- Most Sold Product -->
            <div class="flex flex-col items-center bg-white p-6 rounded-lg shadow-md shadow-gray-500">
                <h2 class="text-lg font-semibold text-green-700">Most Sold Product</h2>
                @if ($mostSoldProduct)
                    <p class="text-xl font-semibold text-gray-800 mt-3">{{ $mostSoldProduct['product']->name }} ({{ $mostSoldProduct['soldCount'] }} sold)</p>
                @else
                    <p class="text-xl font-semibold text-gray-800 mt-3">No data available</p>
                @endif
            </div>
        </div>
    
    </section>
    
    </x-layout-admin>
    