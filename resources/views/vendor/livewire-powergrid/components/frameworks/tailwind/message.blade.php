@if ($message = Session::get('success'))
<div class="message">
    <div class="bg-green-100 mb-4 px-5 py-4 w-full border-l-4 border-green-500">
        <div class="flex justify-between">
            <div class="flex space-x-3">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                     class="flex-none fill-current text-green-500 h-4 w-4">
                    <path
                        d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-1.25 16.518l-4.5-4.319 1.396-1.435 3.078 2.937 6.105-6.218 1.421 1.409-7.5 7.626z"/>
                </svg>
                <div class="flex-1 leading-tight text-sm text-green-700 font-medium">
                        {{ session('success') }}
                </div>
            </div>
            <div class="flex justify-end mr-2">
                <svg onclick="document.getElementsByClassName('message')[0].style.display = 'none'"
                    class="w-6 h-6 text-green-500 fill-current" role="button" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"><title>Close</title>
                    <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
                </svg>
            </div>
        </div>
    </div>
</div>
@endif

