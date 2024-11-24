<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pricing</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="max-w-7xl mx-auto py-12 sm:px-6 lg:px-8">
        <h1 class="text-center text-4xl font-bold mb-8">Choose Your Plan</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Monthly Plan -->
            <div class="bg-white shadow rounded-lg p-6 text-center">
                <h2 class="text-xl font-semibold mb-4">Monthly Plan</h2>
                <p class="text-gray-700 mb-4">100k Rupiah / month</p>
                <a href="/payment-details?plan=monthly" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Select Plan
                </a>
            </div>
            <!-- Middle Class Plan -->
            <div class="bg-white shadow rounded-lg p-6 text-center">
                <h2 class="text-xl font-semibold mb-4">Middle Class</h2>
                <p class="text-gray-700 mb-4">550k Rupiah / 6 months</p>
                <a href="/payment-details?plan=middle_class" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Select Plan
                </a>
            </div>
            <!-- Annual Plan -->
            <div class="bg-white shadow rounded-lg p-6 text-center">
                <h2 class="text-xl font-semibold mb-4">Annual Plan</h2>
                <p class="text-gray-700 mb-4">1000k Rupiah / 12 months</p>
                <a href="/payment-details?plan=annual" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Select Plan
                </a>
            </div>
        </div>
    </div>
</body>
</html>