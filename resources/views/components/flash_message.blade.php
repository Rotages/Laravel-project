@if(session()->has('message'))
    <div x-data="{show:true}" x-init="setTimeout(() => show = false, 5000)" 
        x-show="show" 
        class="rounded fixed top-5 left-1/2 transform -translate-x-1/2 bg-laravel text-white px-48
    py-3">
        <p>
            {{session('message')}}
    </div>
@endif