<div>

    @section('title')
        Vendor Dashboard
    @endsection
    
            <ul class="navbar-nav">
    <section class="px-3">
        <div class="border-b bordr-1 py-3 bg-gray-300 flex justify-start items-center">
            
            <div class="">
                <img src="" alt="">
            </div>
            
            <div>
                <h1 class="text-3xl ">Welcome Back! </h1>
                <h1 class="text-xl bg-green-950 font-bold">{{ Auth::user()->name }}</h1>
            </div>


        </div>
    </section>
</div>
