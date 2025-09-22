<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professional Form Showcase</title>
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Tailwind CSS for utility classes and rapid UI development -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom styles to enhance the professional look and feel */
        body {
            font-family: 'Inter', sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Styling for the range input track */
        input[type="range"]::-webkit-slider-runnable-track {
            background-color: #e5e7eb; /* gray-200 */
            height: 0.5rem;
            border-radius: 0.25rem;
        }

        input[type="range"]::-moz-range-track {
            background-color: #e5e7eb; /* gray-200 */
            height: 0.5rem;
            border-radius: 0.25rem;
        }

        /* Styling for the range input thumb */
        input[type="range"]::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            margin-top: -0.25rem;
            background-color: #3b82f6; /* blue-500 */
            height: 1rem;
            width: 1rem;
            border-radius: 9999px;
            cursor: pointer;
        }

        input[type="range"]::-moz-range-thumb {
            border: none;
            background-color: #3b82f6; /* blue-500 */
            height: 1rem;
            width: 1rem;
            border-radius: 9999px;
            cursor: pointer;
        }

        /* Focus state for the range input thumb */
        input[type="range"]:focus::-webkit-slider-thumb {
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.5);
        }
        
        input[type="range"]:focus::-moz-range-thumb {
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.5);
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen p-4 sm:p-6 lg:p-8">

    <div class="w-full max-w-4xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="p-8">
            <!-- Form Header -->
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Comprehensive Form</h1>
            <p class="text-gray-600 mb-8">An example of every major HTML5 form input type.</p>

            <!-- Form Element -->
            <form action="#" method="POST" class="space-y-8">
                
                <!-- Grid for layout -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">

                    <!-- Text Input -->
                    <div>
                        <label for="text-input" class="block text-sm font-medium text-gray-700">Text Input</label>
                        <input type="text" id="text-input" name="text-input" placeholder="e.g., John Doe" class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition duration-150 ease-in-out">
                    </div>

                    <!-- Email Input -->
                    <div>
                        <label for="email-input" class="block text-sm font-medium text-gray-700">Email Address</label>
                        <input type="email" id="email-input" name="email-input" placeholder="you@example.com" class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition duration-150 ease-in-out">
                    </div>

                    <!-- Password Input -->
                    <div>
                        <label for="password-input" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" id="password-input" name="password-input" placeholder="••••••••" class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition duration-150 ease-in-out">
                    </div>

                    <!-- Telephone Input -->
                    <div>
                        <label for="tel-input" class="block text-sm font-medium text-gray-700">Phone Number</label>
                        <input type="tel" id="tel-input" name="tel-input" placeholder="+1 (555) 987-6543" class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition duration-150 ease-in-out">
                    </div>

                    <!-- Number Input -->
                    <div>
                        <label for="number-input" class="block text-sm font-medium text-gray-700">Number Input (Age)</label>
                        <input type="number" id="number-input" name="number-input" min="0" max="120" placeholder="25" class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition duration-150 ease-in-out">
                    </div>

                    <!-- URL Input -->
                    <div>
                        <label for="url-input" class="block text-sm font-medium text-gray-700">URL / Website</label>
                        <input type="url" id="url-input" name="url-input" placeholder="https://example.com" class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition duration-150 ease-in-out">
                    </div>

                    <!-- Date Input -->
                    <div>
                        <label for="date-input" class="block text-sm font-medium text-gray-700">Date</label>
                        <input type="date" id="date-input" name="date-input" class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition duration-150 ease-in-out text-gray-500">
                    </div>

                    <!-- Time Input -->
                    <div>
                        <label for="time-input" class="block text-sm font-medium text-gray-700">Time</label>
                        <input type="time" id="time-input" name="time-input" class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition duration-150 ease-in-out text-gray-500">
                    </div>
                     
                    <!-- Datetime-local Input -->
                    <div>
                        <label for="datetime-local-input" class="block text-sm font-medium text-gray-700">Date and Time</label>
                        <input type="datetime-local" id="datetime-local-input" name="datetime-local-input" class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition duration-150 ease-in-out text-gray-500">
                    </div>

                    <!-- Month Input -->
                    <div>
                        <label for="month-input" class="block text-sm font-medium text-gray-700">Month</label>
                        <input type="month" id="month-input" name="month-input" class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition duration-150 ease-in-out text-gray-500">
                    </div>

                    <!-- Week Input -->
                    <div>
                        <label for="week-input" class="block text-sm font-medium text-gray-700">Week</label>
                        <input type="week" id="week-input" name="week-input" class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition duration-150 ease-in-out text-gray-500">
                    </div>

                    <!-- Search Input -->
                    <div>
                        <label for="search-input" class="block text-sm font-medium text-gray-700">Search</label>
                        <input type="search" id="search-input" name="search-input" placeholder="Search..." class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition duration-150 ease-in-out">
                    </div>
                </div>

                <!-- Section for full-width elements -->
                <div class="space-y-6">
                    <!-- Textarea -->
                    <div>
                        <label for="textarea-input" class="block text-sm font-medium text-gray-700">Text Area</label>
                        <textarea id="textarea-input" name="textarea-input" rows="4" placeholder="Write a brief message..." class="mt-1 block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition duration-150 ease-in-out"></textarea>
                    </div>

                    <!-- Select Dropdown -->
                    <div>
                        <label for="select-input" class="block text-sm font-medium text-gray-700">Select an Option</label>
                        <select id="select-input" name="select-input" class="mt-1 block w-full pl-3 pr-10 py-2 text-base bg-gray-50 border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md transition duration-150 ease-in-out">
                            <option>Option 1</option>
                            <option>Option 2</option>
                            <option>Option 3</option>
                        </select>
                    </div>

                    <!-- Range Input -->
                    <div>
                        <label for="range-input" class="block text-sm font-medium text-gray-700">Range Slider</label>
                        <input type="range" id="range-input" name="range-input" min="0" max="100" value="50" class="mt-1 w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer">
                    </div>

                    <!-- Color Picker -->
                    <div>
                        <label for="color-input" class="block text-sm font-medium text-gray-700">Color Picker</label>
                        <input type="color" id="color-input" name="color-input" value="#3b82f6" class="mt-1 h-10 w-full block bg-gray-50 border border-gray-300 rounded-md cursor-pointer">
                    </div>

                    <!-- File Input -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">File Upload</label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600">
                                    <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                        <span>Upload a file</span>
                                        <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                            </div>
                        </div>
                    </div>

                    <!-- Checkboxes -->
                    <fieldset>
                        <legend class="text-base font-medium text-gray-900">Checkboxes</legend>
                        <div class="mt-4 space-y-4">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="checkbox-1" name="checkbox-1" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="checkbox-1" class="font-medium text-gray-700">Checkbox 1</label>
                                </div>
                            </div>
                             <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="checkbox-2" name="checkbox-2" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="checkbox-2" class="font-medium text-gray-700">Checkbox 2</label>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <!-- Radio Buttons -->
                    <fieldset>
                        <legend class="text-base font-medium text-gray-900">Radio Buttons</legend>
                        <div class="mt-4 space-y-4">
                             <div class="flex items-center">
                                <input id="radio-1" name="radio-group" type="radio" checked class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                <label for="radio-1" class="ml-3 block text-sm font-medium text-gray-700">Radio Option A</label>
                            </div>
                             <div class="flex items-center">
                                <input id="radio-2" name="radio-group" type="radio" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                <label for="radio-2" class="ml-3 block text-sm font-medium text-gray-700">Radio Option B</label>
                            </div>
                        </div>
                    </fieldset>
                </div>

                <!-- Form Actions -->
                <div class="pt-5 border-t border-gray-200">
                    <div class="flex justify-end items-center space-x-4">
                        <button type="reset" class="py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                            Reset
                        </button>
                        <button type="submit" class="py-2 px-6 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                            Submit
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</body>
</html>
