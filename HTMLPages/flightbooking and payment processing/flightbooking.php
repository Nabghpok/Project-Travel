<?php
// Initialize variables with default or posted values
$departureAirport = $_POST['departureAirport'] ?? '';
$arrivalAirport = $_POST['arrivalAirport'] ?? '';
$departureDate = $_POST['departureDate'] ?? '';
$returnDate = $_POST['returnDate'] ?? '';
$passengers = $_POST['passengers'] ?? '1';
$paymentMethod = $_POST['paymentMethod'] ?? '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate inputs (basic example, you should add more thorough validation)
    if (empty($departureAirport) || empty($arrivalAirport) || empty($departureDate) || empty($paymentMethod)) {
        $error = "Please fill in all required fields.";
    } else {
        // Process the booking (this is where you'd integrate with your booking system)
        $success = "Booking processed successfully!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Booking</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="max-w-md mx-auto p-6 bg-white rounded-lg shadow-md mt-10">
        <h2 class="text-2xl font-bold mb-6 text-center">Book Your Flight</h2>
        
        <?php if (isset($error)): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline"><?php echo htmlspecialchars($error); ?></span>
            </div>
        <?php endif; ?>

        <?php if (isset($success)): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline"><?php echo htmlspecialchars($success); ?></span>
            </div>
        <?php endif; ?>

        <form method="POST" action="" class="space-y-4">
            <div class="flex space-x-4">
                <div class="flex-1">
                    <label for="departure" class="block text-sm font-medium text-gray-700">From</label>
                    <input type="text" id="departure" name="departureAirport" placeholder="Departure Airport" value="<?php echo htmlspecialchars($departureAirport); ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="flex-1">
                    <label for="arrival" class="block text-sm font-medium text-gray-700">To</label>
                    <input type="text" id="arrival" name="arrivalAirport" placeholder="Arrival Airport" value="<?php echo htmlspecialchars($arrivalAirport); ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
            </div>
            <div class="flex space-x-4">
                <div class="flex-1">
                    <label for="departureDate" class="block text-sm font-medium text-gray-700">Departure Date</label>
                    <input type="date" id="departureDate" name="departureDate" value="<?php echo htmlspecialchars($departureDate); ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="flex-1">
                    <label for="returnDate" class="block text-sm font-medium text-gray-700">Return Date</label>
                    <input type="date" id="returnDate" name="returnDate" value="<?php echo htmlspecialchars($returnDate); ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
            </div>
            <div>
                <label for="passengers" class="block text-sm font-medium text-gray-700">Passengers</label>
                <select id="passengers" name="passengers" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <option value="<?php echo $i; ?>" <?php echo $passengers == $i ? 'selected' : ''; ?>>
                            <?php echo $i . ' ' . ($i == 1 ? 'Passenger' : 'Passengers'); ?>
                        </option>
                    <?php endfor; ?>
                </select>
            </div>
            <div>
                <label for="paymentMethod" class="block text-sm font-medium text-gray-700">Payment Method</label>
                <select id="paymentMethod" name="paymentMethod" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="">Select a payment method</option>
                    <option value="credit_card" <?php echo $paymentMethod == 'credit_card' ? 'selected' : ''; ?>>Credit Card</option>
                    <option value="paypal" <?php echo $paymentMethod == 'paypal' ? 'selected' : ''; ?>>PayPal</option>
                    <option value="bank_transfer" <?php echo $paymentMethod == 'bank_transfer' ? 'selected' : ''; ?>>Bank Transfer</option>
                </select>
            </div>
            <button type="submit" class="w-full px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Search and Book Flight
            </button>
        </form>
    </div>
</body>
</html>