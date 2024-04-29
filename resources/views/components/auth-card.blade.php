
<div class="row">
        <div class="p-5 flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div class="row w-75">
             <div class="col-md-6 d-flex items-center">
               {{$content}}
             </div>
             <div class="col-md-6">

                 <div class="w-full sm:max-w-md px-6 overflow-hidden sm:rounded-lg">
                     {{ $slot }}
                 </div>
             </div>
         </div>

    </div>
</div>


